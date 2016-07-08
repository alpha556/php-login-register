<?php
include 'core.php';
if(loggedin()){
 header('Location:welcome.php');
}else{
 include 'login-form.php';
}

?>