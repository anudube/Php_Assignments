<html>
  <head>
    <link rel="Stylesheet" type="text/css" href="style.css">
  </head>

  <?php

    // define variables and set to empty values
    $nameErr= $emailErr = $emailvalidErr= $pwdErr= $confirm_pwdErr= $photoErr ="";

    if(!empty($_POST)){
      if(!empty($_POST['sign_Up_form']) && $_POST['sign_Up_form'] === 'assignment1234') {
      $first_name = $_POST['firstname'];
      $last_name = $_POST['lastname'];
      $email = $_POST['email'];
      $pwd = $_POST['password'];
      $password=md5($pwd);
      $confirm_pwd = $_POST['repeat_psw'];
      $confirm_password= md5($confirm_pwd);
      $photo = $_FILES['photo']['name'];
      $error = FALSE;

      // validate the form
      $is_valid_email = filter_var($email,FILTER_VALIDATE_EMAIL);
      if(empty($first_name)) {
        $nameErr="First Name should not Empty";
        $error= TRUE;
      }
      if(!preg_match("/^[a-zA-Z-' ]*$/",$first_name) || !preg_match("/^[a-zA-Z-' ]*$/",$last_name)){
        $nameErr="Please Enter Name As Only string";
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
      if($pwd !== $confirm_pwd) {
        $confirm_pwdErr="Password & confirm password should be Same";
        $error= TRUE;
      }
      if(empty($photo)) {
        $photoErr="Photo should not be Empty";
        $error= TRUE;
      }

      if($error!==TRUE){
        $servername = "localhost";
        $username = "root";
        $password= "";
        $db = "assignments";
      // create connection
        $conn = new mysqli($servername, $username, $password, $db);

      // get connection error
        if($conn->connect_error){
         die("Connection failed:" .$conn->connect_error);
        }else{
          echo "Connected Successfully";
        }
        if(isset($_POST['SignUp'])){
            $first_name = $_POST['firstname'];
            //print_r($first_name);
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $password= md5($pass);
            $photo = $_FILES['photo']['name'];

          // upload image into folder
          if(isset($_FILES['photo'])){
          $name= $_FILES['photo']['name'];
          $tmp_name= $_FILES['photo']['tmp_name'];
          $local_image= "image_folder/";
          move_uploaded_file($tmp_name,$local_image.$name);
          }

          //check if email is already exits
          $query = mysqli_query($conn, "select * from users where email='$email'");
          if(mysqli_num_rows($query)>0){
            echo "Email already use";
          } 
          else{

          // insert query
          $insert = "INSERT INTO users(first_name, last_name, email, password, photo)
          VALUES ('$first_name', '$last_name', '$email', '$password', '$photo')";
            if($conn->query($insert) === TRUE){
              echo "Data stored in a database successfully";
            }else{
              echo "Error:" .$sql. ",<br>" .$conn->error;
            }
        } 
      }
} 
}   
}
echo '<form method="post" action="" enctype="multipart/form-data">
  
<input type="hidden" name="sign_Up_form" value="assignment1234">
<div class="container">
<div class="title">
  Sign Up Form
</div>

<div class="form">
<div class="input_field">
<label for="firstname"><b>FirstName</b></label>
<input type="text" name="firstname" value="" class="input"><br>
<span style="color:red" class="error">'.$nameErr.'</span>
</div>

<div class="input_field">
<label for="lastname"><b>LastName</b></label>
<input type="text" name="lastname" value="" class="input"><br>
</div>

<div class="input_field">
<label for="email"><b>Email</b></label>
<input type="email" name="email" value="" class="input"><br>
<span style="color:red" class="error">'.$emailErr.'</span>
</div>

<div class="input_field">
<label for="password"><b>Password</b></label>
<input type="password" name="password" value="" class="input"><br>
<span style="color:red" class="error">'.$pwdErr.'</span>
</div>

<div class="input_field">
<label for="repeat_psw"><b>Confirm Password</b></label>
<input type="password" name="repeat_psw" value="" class="input"><br>
<span style="color:red" class="error">'.$confirm_pwdErr.'</span>
</div>

<div class="input_field">
<label for="photo"><b>Photo</b></label>
<div class="file">
<input type="file" name="photo" class="input"><br>
<span style="color:red" class="error">'.$photoErr.'</span>
</div>
</div>

<div class="input_field">
<button type="submit" name="SignUp" class="btn">Sign Up
</button>
</div>
</div>
</div>
</form>';
  
?>
</html>