<?php
$domain="localhost";
$db_name="testing";
$db_user="root";
$db_pass="";

    $dbc = mysqli_connect($domain, $db_user,'', $db_name) or die('Error connecting to MySQL server');
?>