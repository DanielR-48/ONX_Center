<?php
class Pipeline {
  public static function make(...$functions) {
    return function ($arg) use ($functions) {
      $var = $arg;
      foreach ($functions as $function) {
        $var = $function($var);
      }
      return $var;
    };
  }
}

$pipeline = Pipeline::make(function($var) { return $var * 3; }, 
    function($var) { return $var + 1; },
    function($var) { return $var / 2; });
$result = $pipeline(3);
echo $result;
?>