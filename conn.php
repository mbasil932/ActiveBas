<?php
$dbhost="localhost";$dbuser="root";$dbpass="";$db="activebas";
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db($con,$db);
?>