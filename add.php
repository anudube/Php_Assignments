<html>
    <head>
        <title>Add Company</title>
    </head>
    <body>
        <a href="index.php">Go to Home</a>
        <br/><br/>
        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="company_name"></td>
                </tr>

                <tr>
                 <td>Mobile</td>
                 <td><input type="text" name="company_mobile"></td>
                </tr>

                <tr>
                 <td>Email</td>
                <td><input type="text" name="company_email"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add"></td>
                </tr>
            </table>
        </form>
<?php

// check if form submitted, insert form data into company table
if(isset($_POST['submit'])){
    $company_name = $_POST['company_name'];
    $company_mobile = $_POST['company_mobile'];
    $company_email= $_POST['company_email'];

    //include database connection file
    include_once("config.php");

    // insert company data into table
    $result=mysqli_query($mysqli,"insert into company(company_name,company_mobile,company_email) values('$company_name', '$company_mobile', '$company_email')");

    // show message when company added
    echo "Company added successfully.<a href='index.php'>View Companies</a>";
}
?>
</body>
</html>