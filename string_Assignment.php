<?php
  $original_value = readline("Enter Original String :");
 $replace_value = readline("Enter String to replace :");
  $start_position = readline("Enter Start Position : ");
  $end_Position = readline("Enter End Position : ");
echo substr_replace($original_value,$replace_value,5,0).PHP_EOL;

?>