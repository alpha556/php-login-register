<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Manpreet Singh">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="register.css" rel="stylesheet"> </head>

<body>
    <div class="container">
        <h2>Create a new account:</h2>
        <p>Already have an account.<a href="login-form.php">Sign-in</a></p>
        <form method="post" action="register-form.php" role="form" class="form-horizontal">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-md-3 control-label">Email:</label>
                <div class="col-sm-9 col-md-9 ">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autofocus maxlenght="40"> </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-md-3 control-label">Username:</label>
                <div class="col-sm-9 col-md-9">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Enter your name" required maxlength="25"> </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-md-3 control-label">Password:</label>
                <div class="col-sm-9 col-md-9">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required maxlength="15"> </div>
            </div>
            <div class="form-group row">
                <label for="confirm-passowrd" class="col-sm-3 col-md-3 control-label">Confirm Password:</label>
                <div class="col-sm-9 col-md-9">
                    <input type="password" id="confirm-password" class="form-control" placeholder="Confirm your password" required maxlength="15"> </div>
            </div>
            <div id="error_message" class="text-danger"></div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg center-block"><i class="fa fa-hand-o-right"></i> Register</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <script src="validate.js" type="text/javascript"></script>
</body>

</html>
<?php
include 'core.php';
if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['username'])&&isset($_POST['submit'])){
     $username=test_input($_POST['username']);
     $password=test_input($_POST['password']);
     $email=test_input($_POST['email']);
     $hash=password_hash($password,PASSWORD_BCRYPT);    
     if(!empty($username)&&!empty($password)&&!empty($email)){
        $dup_query=mysqli_query($dbc,"select * from login where user_name='$username'");
        $rows=mysqli_num_rows($dup_query);
        if($rows<1){
              $query="INSERT into login (user_name,user_email,user_password) VALUES('$username', '$email', '$hash')";
            if($run_query=mysqli_query($dbc,$query)){
                ?>
                <p style="text-align:center" class="lead">You have been succesfully registered.Click <a href="login-form.php">here</a> to login</p>
                <?php
            } else{
                echo "ERROR INSERTING DATA TRY AGAIN";
            }
        }
        
    } else{
        echo 'Empty data fields';
    }
    
} 

 function test_input($input) {
  $data = trim($input);
  $data = stripslashes($input);
  $data = htmlspecialchars($input);
  return $input;
}
?>