<?php
if(empty($_POST)) {
    echo '<form method="post" action="" enctype="multipart/form-data">

    <input type="hidden" name="sign_Up_form" value="assignment1234">

    <label for="fName"><b>FirstName</label>
    <input type="text" name="fName" value=""><br>

    <label for="email"><b>Email</b></label>
    <input type="email" name="email" value=""><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" name="psw" value=""><br>

    <label for="repeat_psw"><b>Confirm Password</b></label>
    <input type="password" name="repeat_psw" value=""><br>

    <label for="photo"><b>Photo</b></label>
    <input type="file" name="photo"><br>

    <button type="submit">Sign Up
    </button>
    </form>';
}
else{
    //print_r($_POST);
    var_dump($_POST);
    var_dump($_FILES);
    
    if(!empty($_POST['sign_Up_form']) && $_POST['sign_Up_form'] === 'assignment1234') {
      
      $first_name = $_POST['fName'];
      $email = $_POST['email'];
      $password = $_POST['psw'];
      $confirm_password = $_POST['repeat_psw'];
      $photo = $_FILES['photo']['name'];

      $is_valid_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        
      if(empty($first_name)) {
         echo "First Name should not be empty";
        }

      if(empty($email)) {
         echo "Email should not be empty";
        }

      if($is_valid_email === false) {
         echo "Email should be Valid ";
        }

      if(empty($password) && empty($confirm_password)) {
         echo "Password & confirm Password should not be empty";
        }

      if($password !== $confirm_password) {
        echo "Password & confirm password should be same";
       }

      if(empty($photo)) {
        echo "Photo should not be empty";
       }

    } 
 if(!empty($first_name)  && !empty($email) && !empty($password)  && !empty($confirm_password) && !empty($photo) && $password == $confirm_password){
        echo "Success"; 
        
      }
    
     
    }

?>
