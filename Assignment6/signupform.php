<html>
  <head>
  <link rel="Stylesheet" type="text/css" href="style.css">
  </head>
<?php
  include_once('common.php');
    // define variables and set to empty values
    $nameErr= $pwdErr= $confirm_pwdErr="";

    if(!empty($_POST)){
      if(!empty($_POST['sign_Up_form']) && $_POST['sign_Up_form'] === 'assignment1234') {
      $user_name = $_POST['username'];
     
      $pwd = $_POST['password'];
      //print_r($pwd);
      $password=md5($pwd);
      //print_r($password);
      $confirm_pwd = $_POST['repeat_psw'];
      $confirm_password= md5($confirm_pwd);
     
      $error = FALSE;
      $hide=1;
      
      if(empty($user_name)) {
        $nameErr= "Enter Valid Name";
        $error= TRUE;
      }
    
      if(!preg_match("/^[a-zA-Z-' ]*$/",$user_name)){
        $nameErr="Enter Valid Username";
        $error = TRUE;
      }
       if(empty($pwd) && empty($confirm_pwd)) {
        $pwdErr="Password & confirm Password should not be Empty";
        $error= TRUE;
      }
      if($password !== $confirm_password) {
        $confirm_pwdErr="Password & confirm password should be Same";
        $error= TRUE;
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
      $query = mysqli_query($conn, "select * from user where user_name='$user_name'");
        if(mysqli_num_rows($query)>0){
          //errorLog("SUCCESS","Email already use",__FILE__,__LINE__);
        } 
        else{
        // insert query
        $insert = "INSERT INTO user(user_name, password)
        VALUES ('$user_name', '$password')";
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
   echo "Sign Up sucsessfully go to Login Page!!".PHP_EOL;
    echo "<a href='login.php'>Login</a>";
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
<label for="username" class="required"><b>Username</b></label>
<input type="text" name="username" value="" class="input">
<span class="error">'.$nameErr.'</span>
</div>


<div class="input_field">
<label for="password" class="required"><b>Password</b></label>
<input type="password" name="password" value="" class="input">
<span class="error">'.$pwdErr.'</span>
</div>

<div class="input_field">
<label for="repeat_psw" class="required"><b>Confirm Password</b></label>
<input type="password" name="repeat_psw" value="" class="input">
<span class="error">'.$confirm_pwdErr.'</span>
</div>
<br>

<button type="submit" name="SignUp" class="btn">Sign Up
</button>
</div>
</div>
</form>';
}
?>
</html>