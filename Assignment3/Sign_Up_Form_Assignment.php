<html>
  <head>
  <link rel="Stylesheet" type="text/css" href="style.css">
  </head>
<?php
  include_once('common.php');
    // define variables and set to empty values
    $nameErr= $lnameErr= $emailErr = $emailvalidErr= $pwdErr= $confirm_pwdErr= $photoErr ="";

    if(!empty($_POST)){
      if(!empty($_POST['sign_Up_form']) && $_POST['sign_Up_form'] === 'assignment1234') {
      $first_name = $_POST['firstname'];
      $last_name = $_POST['lastname'];
      $email = $_POST['email'];
      $pwd = $_POST['password'];
      //print_r($pwd);
      $password=md5($pwd);
      //print_r($password);
      $confirm_pwd = $_POST['repeat_psw'];
      $confirm_password= md5($confirm_pwd);
      $photo = $_FILES['photo']['name'];
      $error = FALSE;
      //$hide=1;

      // validate the form
      $is_valid_email = filter_var($email,FILTER_VALIDATE_EMAIL);
      if(empty($first_name)) {
        $nameErr= "Enter Valid Name";
        $error= TRUE;
      }
      if(empty($last_name)==="" || !preg_match("/^[a-zA-Z-' ]*$/",$last_name)){
        $lnameErr= "Last Name Should be Valid";
        $error= TRUE;
        
      } 
      if(!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
        $nameErr="Enter Valid Name";
        $error = TRUE;
      }
      if(empty($email)) {
        $emailErr="Email should not be Empty";
        $error= TRUE;
      }
      if($is_valid_email === false) {
        $emailvalidErr="Email should be Valid ";
        $error= TRUE;
      }
      if(empty($pwd) && empty($confirm_pwd)) {
        $pwdErr="Password & confirm Password should not be Empty";
        $error= TRUE;
      }
      if($password !== $confirm_password) {
        $confirm_pwdErr="Password & confirm password should be Same";
        $error= TRUE;
      }
      if(empty($photo)) {
        $photoErr="Photo should not be Empty";
        $error= TRUE;
      }
       // check file extension
       $allowed_extension = array('gif','png','jpg','pdf','jpeg');
       $file_extension = pathinfo($photo,PATHINFO_EXTENSION);
       if(!in_array($file_extension,$allowed_extension)){
           $photoErr= "Please Upload the valid photo";
           $error= TRUE;  
       }
       else{
       // upload image into folder
       if(isset($_FILES['photo'])){
           $name= $_FILES['photo']['name'];
           $tmp_name= $_FILES['photo']['tmp_name'];
           $local_image= "image_folder/";
           move_uploaded_file($tmp_name,$local_image.$name);
       }
       }

      if($error!==TRUE){
        $servername = "localhost";
        $username = "root";
        $dbpassword= "";
        $db = "assignments";
        // create connection
        $conn = new mysqli($servername, $username, $dbpassword, $db);

      // get connection error
      if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
      }else{
        errorLog("SUCCESS","Connected Successfully",__FILE__,__LINE__);
      }
            
      //check if email is already exits
      $query = mysqli_query($conn, "select * from users where email='$email'");
        if(mysqli_num_rows($query)>0){
          //echo "Email already use";
          errorLog("SUCCESS","Email already use",__FILE__,__LINE__);
        } 
        else{
        // insert query
        $insert = "INSERT INTO users(first_name, last_name, email, password, photo)
        VALUES ('$first_name', '$last_name', '$email', '$password', '$photo')";
        if($conn->query($insert) === TRUE){
          errorLog("SUCCESS","Sign Up Successfully",__FILE__,__LINE__);
        }else{
          echo "Error:" .$sql. ",<br>" .$conn->error;
        }
        } 
      }
     } 
    }
if(isset($hide)==1){
   echo "Sign Up sucsessfully!!";
}
else{
  echo '<form method="post" action="" enctype="multipart/form-data">
  
<input type="hidden" name="sign_Up_form" value="assignment1234">
<div class="container">
<div class="title">
  Sign Up Form
</div>

<div class="form">
<div class="input_field">
<label for="firstname"><b>First Name *</b></label>
<input type="text" name="firstname" value="" class="input">
<span class="error">'.$nameErr.'</span>
</div>

<div class="input_field">
<label for="lastname"><b>Last Name</b></label>
<input type="text" name="lastname" value="" class="input">
<span class="error">'.$lnameErr.'</span>
</div>

<div class="input_field">
<label for="email"><b>Email *</b></label>
<input type="email" name="email" value="" class="input">
<span class="error">'.$emailErr.'</span>
</div>

<div class="input_field">
<label for="password"><b>Password*</b></label>
<input type="password" name="password" value="" class="input">
<span class="error">'.$pwdErr.'</span>
</div>

<div class="input_field">
<label for="repeat_psw"><b>Confirm Password</b></label>
<input type="password" name="repeat_psw" value="" class="input">
<span class="error">'.$confirm_pwdErr.'</span>
</div>

<div class="input_field">
<label for="photo"><b>Photo *</b></label>
<div class="file">
<input type="file" name="photo" class="input"><br>
<span class="error">'.$photoErr.'</span><br>
</div>
</div>

<button type="submit" name="SignUp" class="btn">Sign Up
</button>
</div>
</div>
</form>';
}
?>
</html>