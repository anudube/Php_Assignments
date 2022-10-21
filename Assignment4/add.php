<?php
// define variables and set to empty values
$nameError= $emailError="";

// define variables
$input_companyName= $input_mobile= $input_email="";

// check if form submitted, insert add form data into company table
if(isset($_POST['submit'])){
    $company_name = $_POST['company_name'];
    $company_mobile = $_POST['company_mobile'];
    $company_email= $_POST['company_email'];
    $error=FALSE;

    //validation of form
    $is_valid_email = filter_var($company_email,FILTER_VALIDATE_EMAIL);
    if(empty($company_name)) {
        $nameError= "Enter Valid Name";
        $error= TRUE;
      }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$company_name)){
        $nameError="Enter Valid Name";
        $error = TRUE;
      }
    if($is_valid_email === false) {
        $emailError="Email should be Valid ";
        $error= TRUE;
      }
    if($error!==TRUE){
        $input_companyName =$_POST['company_name'];
        $input_mobile= $_POST['company_mobile'];
        $input_email= $_POST['company_email'];
        
    //include database connection file
    include_once("config.php");
      
    // insert company data into table
    $result=mysqli_query($mysqli,"insert into company(company_name,company_mobile,company_email) values('$company_name', '$company_mobile', '$company_email')");
    }
    // show message when company added
    echo "Company added successfully.<a href='index.php'>View Companies</a>"; 
    
}
?>
<html>
    <head>
        <title>Add Company</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <div class="container mt-3">
        <a href="index.php">Go to Home</a>
        <br/><br/>
        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="company_name" value="<?php echo $input_companyName ?>">
                    <span class="error"  style="color:red"><?php echo $nameError ?></span></td>
                </tr>

                <tr>
                 <td>Mobile</td>
                 <td><input type="text" name="company_mobile" value="<?php echo $input_mobile ?>"></td>
                </tr>

                <tr>
                 <td>Email</td>
                <td><input type="text" name="company_email" value="<?php echo $input_email ?>">
                <span class="error" style="color:red"><?php echo $emailError ?></span></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add"></td>
                </tr>
            </table>
        </form>
</div>
</body>
</html>