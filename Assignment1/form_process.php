  <?php
  // define variables and set to empty values
  $firstnameErr  = $lastnameErr = $mobilenoErr = $birthdateErr = $emailErr ="";
  $firstname  = $lastname = $mobileno = $birthdate = $email =$message  =$success = "";
  $error=FALSE;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
      $firstnameErr = "First_Name is required";
      $error =TRUE;
    
    } else {
      $firstname = $_POST["firstname"];
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $firstnameErr = "Only letters and white space allowed";
        $error =TRUE;
        
      }
    }
    
    if (empty($_POST["lastname"])) {
      $lastnameErr = "Last_Name is required";
      $error =TRUE;
      
    } else {
      $lastname = $_POST["lastname"];
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed";
        $error =TRUE;
        
      }
    }
    if (empty($_POST["mobileno"])) {
      $mobilenoErr = " Mobile_No is required";
      $error =TRUE;
      
    } else {
      $mobileno = $_POST["mobileno"];
      // check if mobileno syntax is valid 
      if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$mobileno)) {
        $mobilenoErr = "Invalid Phone Number";
        $error =TRUE;
        
      }
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      $error =TRUE;
    
    } else {
      $email = $_POST["email"];
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $error =TRUE;
        
      }
  
    if (empty($_POST["message"])) {
      $message = "";
    } else {
      $message = $_POST["message"];
    }
  }
  
  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  if($error!==TRUE){
    if(!empty($_POST)){
      if(isset($_POST['submit'])){
       $firstname= $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        echo " Hello " .$firstname.' '.$lastname;
        echo "<br>Thank You for Contacting us!";
        echo "<br>";
        $email = $_REQUEST['email'];
        echo "Email:".$email;
        echo"<br>";
        $mobileno = $_REQUEST['mobileno'];
        echo "Mobile:".$mobileno;
        echo"<br>";
        $birthdate = $_REQUEST['birthdate'];
      if(date('d-m-yy',strtotime($birthdate))==date('d-m-yy')){
        echo "Today is your birthday " .$birthdate.PHP_EOL;
        echo "Happy Birthday $firstname $lastname";
        echo "</br>";
      }
      $message = $_REQUEST['message'];
      echo "Message:".$message;
      $hide=1;
    }
  }
}