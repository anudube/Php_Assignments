<?php 
// create database connection using config file
include_once("config.php");

//fetch all company details from database
$result = mysqli_query($mysqli,"select * from company order by id desc");
?>
<html>
  <head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>  
  <body>
  <div class="container mt-3">
  <a href="add.php">Add New Company</a><br/><br/>
  <table class="table" width='80%' border=1>
  <thead>
  <tr>
    <th>CompanyName</th>
    <th>CompanyMobile</th>
    <th>CompanyEmail</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>
  <?php
   while($company_data= mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$company_data['company_name']."</td>";
      echo "<td>".$company_data['company_mobile']."</td>";
      echo "<td>".$company_data['company_email']."</td>";
      echo "<td><a href='edit.php?id=$company_data[id]'>Edit</a> | <a href='delete.php?id= $company_data[id]'>Delete</a></td></tr>";
     }
  ?>
  </td>
  </tr>
  </tbody>
  </table>
  </div>
  </body>
 </html>    


