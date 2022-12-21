
strlen()
str_count_word()
lcfirst()
ucfirst()
strtolower()
strtoupper()
///////////constraints///////////
not null
default
autoincrement
primary key
foreign key
unique
//////session//////////
SESSION_START()
//////////connectivity//////////////
$servername= "localhost";
$usrname="root";
$password="";
$db= "test";
 $conn= mysqli_query($servername,$username,$password,$db);
$sql= "Select * from user where last_month = 3;
if($mysql($conn,$sql)){
	die("Data Display Successfull");
}else{
	echo"Connection fail";
}
//////////date//////////////
 $date= readline("Enter first date:);
 $first_date= date("y-m-d",$date);
 $last_date= date("y-m-d",$date);
 $bt_Date = strtotime($first_date,$last_date);
 echo "$bt_date";
///////////star_patterns///////////////////

<?php

for($row= 0;$row<=7;$row++){
for($col= 0; $col<=7;$col++){
  if ((($col == 1 or $col == 5) and $row != 0) or (($row == 0 or $row == 3) and ($col > 1 and $col < 5))){
   	echo "*";    
      }else  
            echo " ";     
	}        
  echo "\n";
}

?>

////////////////select/////////////////
select * from customers where country in('Maxico','USA');

////////////////php_database_connection////////

/////////////inheritance/////
class A{
function display(){
	echo "A";
}
}
class B extends C{
function display(){
	echo "B";
}

}
class D extends B,C{
function display(){
	echo "B";
}

}
display();
/////////////////////star patterns///////////////////
<?php

$rc= 5;
$sc= 1'
$bs= 8;
for($row = 0; $row<rc;$row++){

for($i= 0;i<sc;$i++){
	echo "*";
}
for($j= 0;$j<sc;$j++){
	echo "*";
	echo "\n";

$bs = $bs -2;
$sc = $sc +1;
}
}
?>
////////////////////////Fibonacci series/////////////////////////////////////////////

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


















