<?php
if(empty($_POST)) {
echo '<form method="post" action="" enctype="multipart/form-data">

<input type="hidden" name="sign_Up_form" value="assignment1234">

<label for="firstname"><b>FirstName</label>
<input type="text" name="firstname" value=""><br>

<label for="lastname"><b>LastName</label>
<input type="text" name="lastname" value=""><br>

<label for="email"><b>Email</b></label>
<input type="email" name="email" value=""><br>

<label for="password"><b>Password</b></label>
<input type="password" name="password" value=""><br>

<label for="repeat_psw"><b>Confirm Password</b></label>
<input type="password" name="repeat_psw" value=""><br>

<label for="photo"><b>Photo</b></label>
<input type="file" name="photo"><br>
<button type="submit" name="SignUp">Sign Up
</button>
</form>';

  $servername = "localhost";
  $username = "root";
  $password= "";
  $db = "TestDB";
  // create connection
  $conn = new mysqli($servername, $username, $password, $db);
  // get connection error
if($conn->connect_error){
 die("Connection failed:" .$conn->connect_error);
 }else{
   echo "Connected Successfully";
}
// sql query
$sql = "select id ,firstname,lastname,email from Users_form";
// fetching data from database
$result = mysqli_query($conn, $sql);
$num  =  mysqli_num_rows($result);
if($num>0){
  // output data of each rows
    while($rows =mysqli_fetch_assoc($result)){
    //echo var_dump($rows);
    echo "Name: ". $rows["firstname"]. " " . $rows["lastname"].PHP_EOL ."Email:" .$rows["email"]. "<br>";
    echo "<br>";

    } 
}else{
    echo "0 results";
}


}
else{
//print_r($_POST);
//var_dump($_POST);
//var_dump($_FILES);

if(!empty($_POST['sign_Up_form']) && $_POST['sign_Up_form'] === 'assignment1234') {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['repeat_psw'];
$photo = $_FILES['photo']['name'];

$is_valid_email = filter_var($email,FILTER_VALIDATE_EMAIL);
  
if(empty($firstname)) {
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
if(!empty($firstname)  && !empty($email) && !empty($password)  && !empty($confirm_password) && !empty($photo) && $password == $confirm_password){
  $servername = "localhost";
  $username = "root";
  $password= "";
  $db = "TestDB";
  // create connection
  $conn = new mysqli($servername, $username, $password, $db);
  // get connection error
if($conn->connect_error){
 die("Connection failed:" .$conn->connect_error);
  }else{
   echo "Connected Successfully";
}
  if(isset($_POST['SignUp'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['photo']['name'];
    
    
    //print_r($_POST);
    // insert query
    $insert = "INSERT INTO Users_form (firstname, lastname, email, password, photo)
    VALUES ('$firstname', '$lastname', '$email', '$password', '$photo')";
    if($conn->query($insert) === TRUE){
    echo "Data stored in a database successfully";
    }else{
    echo "Error:" .$sql. ",<br>" .$conn->error;
    }
   }
}
  }

?>
