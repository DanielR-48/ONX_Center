<?php
interface Input {
  public function add($text);
  public function getValue();
}

class TextInput implements Input {
  private $value;

  public function add($text) {
    $this->value .= $text;
  }

  public function getValue() {
    return $this->value;
  }
}

class NumericInput extends TextInput {
  public function add($text) {
    if (is_numeric($text)) {
      parent::add($text);
    }
  }
}

$text1 = new TextInput();
$text1->add('abcd');
$text1->add('1234');
echo $text1->getValue();

echo "<br>"; 

$text2 = new NumericInput();
$text2->add('abcd');
$text2->add('1234');
echo $text2->getValue();
?>