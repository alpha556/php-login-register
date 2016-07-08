<?php
include_once 'core.php';
if(loggedin()){
    session_destroy();
}
header('Location:login-form.php');
?>