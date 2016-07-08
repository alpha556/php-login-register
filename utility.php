<?php
include_once 'core.php';
if(isset($_POST['input'])){
$username=$_POST['input'];
$check=mysqli_query($dbc,"SELECT user_name from login where user_name='$username'");
$check_result=mysqli_num_rows($check);
if($check_result>=1){
    echo true;
}else{
    echo false;
} 
}

?>