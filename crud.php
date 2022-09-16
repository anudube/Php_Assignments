<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";


var_dump($action.$user_id);
$servername = "localhost";
$username = "root";
$password= "";
$db = "TestDB";
$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
die("Connection failed:" .$conn->connect_error);
}else{
echo "Connected Successfully";
}
// create database Test
/*$sql = "CREATE DATABASE TestDB";
if($conn->query($sql) === TRUE){
echo "Database created Successfully";
}else{
echo "Error occurs while creating database:" .$conn->error;
}*/

// create table Users
/*$sql = "CREATE TABLE Users_form(
id int(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname varchar(20) NOT NULL,
lastname varchar(20) ,
email varchar(40) NOT NULL,
password varchar(20) NOT NULL,
photo varchar(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON update CURRENT_TIMESTAMP
)";
if($conn->query($sql) === TRUE){
echo "Table create Successfully";
}else{
echo "Error occurs while creating Table:" .$conn->error; 
}*/
// insert values
/*$sql = "INSERT INTO Users_form (firstname, lastname, email, password, photo)
values ('Anu','Dubey','anu.dubey@gmail.com','1234','abc.jpg')";
if($conn->query($sql) === TRUE){
echo "New record inserted Successfully";
}else{
echo "Error:" .$sql. ",<br>" .$conn->error;
}*/
///////////////// insert data from SignUp_form to database


////////////////// fetching data from database 

if($action==='update' ){
    ////////////////// update
    $sql = "UPDATE Users_form SET lastname = '' WHERE id = $user_id";
    if($conn->query($sql)=== TRUE){
        echo " record updated successfully";
    }
    else{
        echo "Error updating record:" .$conn->error;
    }
}
    //////////////// delete
    if($action ==='delete'){
    $sql = "DELETE FROM Users_form WHERE ID = $user_id";
    if($conn->query($sql)=== TRUE){
        echo " record deleted successfully";
    }
    else{
        echo "Error deleting record:" .$conn->error;
    }
}
if($action ==='list'){
    $sql = "select id ,firstname,lastname,email from Users_form";
// fetching data from database
$result = mysqli_query($conn, $sql);
$num  =  mysqli_num_rows($result);
if($num>0){
  // output data of each rows
    while($rows =mysqli_fetch_assoc($result)){
    //echo var_dump($rows);
    echo "Name: ". $rows["firstname"]. " " . $rows["lastname"].PHP_EOL ."Email:" .$rows["email"]. "<br>";
    echo "<br>";

    } 
}else{
    echo "0 results";
}

}

$conn->close();

?>