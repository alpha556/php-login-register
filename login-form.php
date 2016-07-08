<?php
include_once 'core.php';
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(!empty($username)&&!empty($password)){
        $query="Select user_id,user_password from login where user_name='$username'";
        $run_query=mysqli_query($dbc,$query);
        $result=mysqli_fetch_array($run_query,MYSQLI_ASSOC);
        if($result){
          if(password_verify($password,$result['user_password'])){
            $_SESSION['id']=$result['user_id'];
              $_SESSION['username']=$username;
              header('LOCATION:welcome.php');
            } else{
          echo "INCOREECT USERNAME OR PASSWORD";  
            }
        } else{
          echo "INCOREECT USERNAME OR PASSWORD";  
        }
        
    }else{
        echo "ENTER ALL FIELDS";
    }
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Manpreet Singh">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>Signin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet"> </head>

<body>
    <div class="container">
        <form role="form" method="post" action="login-form.php" class="form-signin">
            <h2 class="form-signin-heading">Please sign in</h2>
            <p>Don't have an account.Register <a href="register-form.php" class="link">here</a></p>
            <div class="form-group">
                <label for="username">Username:</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus> </div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                    <div class="input-group-addon"> <i class="fa fa-key" aria-hidden="true"></i></div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required> </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="fa fa-square-o" value="remember-me"> Remember me </label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg center-block "><i class="fa fa-sign-in"> Sign-in</i> </button>
        </form>
    </div>
</body>
</html>
