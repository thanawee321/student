<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "student";

$connect = mysqli_connect($host,$username,$password,$database) or die ("ERROR : ".mysqli_error($connect));


?>