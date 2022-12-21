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
      $query = mysqli_query($conn, "select * from users where user_name='$user_name'");
        if(mysqli_num_rows($query)>0){
          //errorLog("SUCCESS","Email already use",__FILE__,__LINE__);
        } 
        else{
        // insert query
        $insert = "INSERT INTO users(user_name, password)
        VALUES ('$user_name', '$password')";
         echo "Sign Up sucsessfully go to Login Page!!".PHP_EOL;die();
         echo "<a href='login.php'>Login</a>";
        if($conn->query($insert) === TRUE){
          errorLog("SUCCESS","Sign Up Successfully",__FILE__,__LINE__);
        //   if(isset($hide)==1){
        //     echo "Sign Up sucsessfully go to Login Page!!".PHP_EOL;die();
        //    echo "<a href='login.php'>Login</a>";
         // }
        }else{
          echo "Error:" .$sql. ",<br>" .$conn->error;
        }
        } 
      }
     } 
    }
    ?>
    <html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 350px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
<!------ Include the above in your HEAD tag ---------->
</head>   
<body>
    <div id="login">
    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="sign_Up_form" value="assignment1234">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Sign Up</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <span class="error"  style="color:red"><?php echo $nameErr ?></span></td>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="error"  style="color:red"><?php echo $pwdErr ?></span></td>
                            </div>
                            <div class="form-group">
                                <label for="repeat_psw" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="repeat_psw" id="password" class="form-control">
                                <span class="error"  style="color:red"><?php echo $confirm_pwdErr ?></span></td>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>