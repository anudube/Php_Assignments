<?php
// $rc= 5;
// $sc= 1;
// $bs= 8;
// for($row =0; $row<$rc;$row++){
//     for($i=0; $i<$sc; $i++){
// 	    echo "*";
//     }
//     for($j=0; $j<$sc; $j++){
// 	    echo " ".PHP_EOL;
//     }
//     for($k= 0;$k<$sc; $k++){
//         echo "*";
//     }
//     echo " ".PHP_EOL;
//     $bs = $bs -2;
//     $sc = $sc +1;
// }

$number= 0;
$num1= 0;
$num2= 1;
echo "Fibonacci series are:";

 echo $num1. ' '.$num2.' ';

 while($number<10){
    $num3= $num2 + $num1;
    echo $num3.' ';

    $num1 = $num2;

    $num2= $num3;

    $number = $number +1;
 }

?>
