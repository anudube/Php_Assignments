<?php
/**
 * using mysqli_connect for database
 */

 $databaseServername= 'localhost';
 $databaseName= 'assignments';
 $databaseUsername= 'root';
 $databasePassword= '';
 $mysqli = mysqli_connect($databaseServername, $databaseUsername, $databasePassword, $databaseName);
 $sql = "CREATE TABLE IF NOT EXISTS company(
    id int(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name varchar(100) NOT NULL,
    company_mobile varchar(20) NOT NULL ,
    company_email varchar(100) NOT NULL UNIQUE,
    photo varchar(50) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON update CURRENT_TIMESTAMP
    )";
   
?>