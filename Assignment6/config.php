<?php
/**
 * using mysqli_connect for database
 */

 $databaseServername= 'localhost';
 $databaseName= 'assignments';
 $databaseUsername= 'root';
 $databasePassword= '';
 $mysqli = mysqli_connect($databaseServername, $databaseUsername, $databasePassword, $databaseName);
 $sql = "CREATE TABLE IF NOT EXISTS users(
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(100) NOT NULL,
    password varchar(100) NOT NULL ,
    status boolean NOT NULL default 0,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON update CURRENT_TIMESTAMP
    )";
   
?>