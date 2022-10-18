<?php 

// create database connection using config file
include_once("config.php");

//fetch all company details from database
$result = mysqli_query($mysqli,"select * from company order by id desc");

?>
<html>
    <head>
        <title>Homepage</title>
    </head>  
        <body>
            <a href="add.php">Add New Company</a><br/><br/>
            <table width='80%' border=1>
                <tr>
                    <th>CompanyName</th>
                    <th>CompanyMobile</th>
                    <th>CompanyEmail</th>
                    <th>Action</th>
                </tr>
                  <?php
                  while($company_data= mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$company_data['company_name']."</td>";
                    echo "<td>".$company_data['company_mobile']."</td>";
                    echo "<td>".$company_data['company_email']."</td>";
                    echo "<td><a href='edit.php?id=$company_data[id]'>Edit</a> | <a href='delete.php?id= $company_data[id]'>Delete</a></td></tr>";

                  }
                  ?>
             </table>
         </body>
 </html>    


