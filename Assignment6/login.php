<?php
include_once('config.php');
$usernameErr= $passwordErr="";

if(!empty($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $spassword= md5($password);
    $error=FALSE;
    if(empty($username)){
        $usernameErr="Username is required";
        $error=TRUE;
    }
    if(empty($password)){
        $passwordErr="Password should not be empty";
        $error=TRUE;
    }

    if($error!=TRUE){
    $sql_query = "select * from users where user_name='".$username."' AND password='".$spassword."'";
    //print_r($sql_query);die();
    $result = mysqli_query($mysqli,$sql_query);
    $row= mysqli_fetch_array($result);
    //print_r(var_dump($row));die();

    if(isset($row['status']) && $row['status'] ==1){
        header("location:dashboard.php");
    }
    elseif(isset($row['status']) && $row['status'] ==0){
        echo "You are not a verified User, you should contact with Admin!! ";
    }   
    else{
         
         echo "<p><center>You are not Registered User,Please Sign Up!!</center></p>";
         
         
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
  height: 320px;
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
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <span class="error"  style="color:red"><?php echo $usernameErr ?></span></td>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="error"  style="color:red"><?php echo $passwordErr ?></span></td>
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div class="form-group">
                                
                           <p style="font-size: 12px">Not an User!<a href='Sign_Up.php'> Sign Up</a></p>
                            </div>
                            
                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>