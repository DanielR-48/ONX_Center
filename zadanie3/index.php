<?php
class RankingTable {
    public $players = array();
    
    public function __construct($players) {
        $i=0;
        foreach ($players as $player) {
            $this->players[$player] = array(              
                'score' => 0,
                'gamesPlayed' => 0,
                'index' =>$i,
                'name' => $player
            );
            $i++;
        }
    }
    
    public function recordResult($player, $score) {
        $this->players[$player]['score'] += $score;
        $this->players[$player]['gamesPlayed'] += 1;
    }
    
    
    public function playerRank($rank) {
        $this->playerSort();
        return $this->players[$rank-1]['name'];
    }

    private function playerSort(){
        usort($this->players,function($a,$b){
            if ($a['score'] === $b['score']) {
                if ($a['gamesPlayed'] === $b['gamesPlayed']) {
                    
                    return $a['index'] <=> $a['index'];
                }
                return $a['gamesPlayed'] <=> $b['gamesPlayed'];
            }
            return $b['score'] <=> $a['score'];
        });
    }  
}
$table = new RankingTable(array('Jan', 'Monika', 'Maks'));

$table->recordResult('Jan', 2);
$table->recordResult('Monika', 3);
$table->recordResult('Maks', 3);

echo $table->playerRank(1);
?>