<?php
// enter the string
  $original_value = readline("Enter Original String :");

// enter the string which you want to replace
  $replace_value = readline("Enter String to replace :");

//enter the start position of string
  $start_position = readline("Enter Start Position : ");
// enter the end position of string 
  $end_Position = readline("Enter End Position : ");

// print the data
  echo substr_replace($original_value,$replace_value,$start_position,$end_Position).PHP_EOL;

?>