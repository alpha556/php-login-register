<?php
session_start();
require_once 'db_connect.php';
function loggedin(){
   if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){
       return true;
   } else{
       return false;
   }
}
?>