<?php
//include database connection file
include_once("config.php");

//get id from url to delete that company data
$id= $_GET['id'];

//delete company row from table based on given id
$result= mysqli_query($mysqli, "delete from company where id= $id");

//after deletion redirec to the home page
header("Location:index.php");
?>