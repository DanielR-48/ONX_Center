<?php
class Thesaurus{
    public $words=array();

    public function __construct($words){
        $this->words=$words;
    }

    public function getSynonyms($word){
        $synonym ='{"word":"';
        foreach ($this->words as $key => $val) {
            if ($key == $word) {
                $synonym.=$key.'",synonyms:[';
                foreach ($val as $syn) {
                    if($syn!=null)
                        $synonym.='"'.$syn.'", ';
                }
                if($syn!=null)
                    $synonym=substr($synonym,0,strlen($synonym)-2);
                $synonym.=']}'; 
            }
        }
        return $synonym;
    }
}

$words = array(
    "market" => array("trade"), 
    "small" => array("little", "compact"), 
    "asleast" => array("")
);

$thesaurus = new Thesaurus($words);

echo $thesaurus->getSynonyms("small")."<br>";
echo $thesaurus->getSynonyms("market")."<br>";
echo $thesaurus->getSynonyms("asleast");
?>