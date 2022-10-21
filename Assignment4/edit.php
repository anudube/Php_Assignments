<?php
// include database connection file
include_once("config.php");

//check if form is submitted for company update, then redirect to homepage after update
if(isset($_POST['update'])){
    $id= $_POST['id'];
    $company_name= $_POST['company_name'];
    $company_mobile= $_POST['company_mobile'];
    $company_email= $_POST['company_email'];

    //update company data
    $result= mysqli_query($mysqli, "update company set company_name='$company_name',company_mobile= '$company_mobile',company_email='$company_email' where id=$id");

    //redirect to homepage to display updated company in list
    header("Location:index.php");
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//fetch company data based on id
$result= mysqli_query($mysqli,"select * from company where id= $id");

while($company_data= mysqli_fetch_array($result)){
    $company_name= $company_data['company_name'];
    $company_mobile= $company_data['company_mobile'];
    $company_email =$company_data['company_email'];
}
?>
<html>
 <head>
    <title>Edit Company Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 <div class="container mt-3">
    <a href="index.php">Home</a>
    <br/><br/>

    <form name= "update_company" method="post" action="edit.php">
        <table border ="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="company_name" value=<?php echo $company_name;?>></td>
            </tr>

            <tr>
                <td>Mobile</td>
                <td><input type="text" name="company_mobile" value=<?php echo $company_mobile;?>></td>
            </tr>

            <tr>
            <td>Email</td>
                <td><input type="email" name="company_email" value=<?php echo $company_email;?>></td>
            </tr>

            <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>