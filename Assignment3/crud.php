<?php
//check comment params
$action = isset($_GET['action']) ? $_GET['action'] : "";
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

//check value insertion
var_dump($action.$user_id);

//declare database variables
$servername = "localhost";
$username = "root";
$password= "";
$db = "assignments";

//check connection to database
$conn = new mysqli($servername, $username, $password, $db);
    if($conn->connect_error){
     die("Connection failed:" .$conn->connect_error);
    }else{
     echo "Connected Successfully";
    }

// create database table if not exit
    $sql = "CREATE TABLE IF NOT EXISTS users(
        id int(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name varchar(20) NOT NULL,
        last_name varchar(20) ,
        email varchar(40) NOT NULL UNIQUE,
        password varchar(20) NOT NULL,
        photo varchar(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON update CURRENT_TIMESTAMP
        )";
    if($conn->query($sql) === TRUE){
        echo "Table create Successfully";
    }else{
        echo "Error occurs while creating Table:" .$conn->error; 
    } 

//check action
switch($action){

    case 'update':
        update();
        break;

     case 'delete':
        delete();
        break;  
        
     case 'details':
        details();
        break;   
}

// update function
function update(){
    //$user_id = $GLOBALS['user_id'];
    //$conn= $GLOBALS['conn'];
    global $user_id;
    global $conn;
    $sql = "UPDATE users SET last_name = '' WHERE id = $user_id";
    if($conn->query($sql)=== TRUE){
        echo " record updated successfully";
    }
    else{
        echo "Error updating record:" .$conn->error;
    }
}
// delete function
function delete(){
    $user_id = $GLOBALS['user_id'];
    $conn= $GLOBALS['conn'];
    $sql = "DELETE FROM users WHERE ID = $user_id";
    if($conn->query($sql)=== TRUE){
        echo "record deleted successfully";
    }
    else{
        echo "Error deleting record:" .$conn->error;
    }
}
// fetching list of data
function details(){
    $user_id = $GLOBALS['user_id'];
    $conn= $GLOBALS['conn'];
    $sql = "select id ,first_name,last_name,email from users";

// fetching data from database
    $result = mysqli_query($conn, $sql);
    $num  =  mysqli_num_rows($result);
    if($num>0){  
// output data of each rows
    while($rows =mysqli_fetch_assoc($result)){
     echo "Name: ". $rows["first_name"]. " " . $rows["last_name"].PHP_EOL ."Email:" .$rows["email"]. "<br>";
        echo "<br>";
    } 
    }else{
        echo "0 results";
    }
}
$conn->close();

?>