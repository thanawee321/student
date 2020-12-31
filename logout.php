<?php 
session_start();

session_destroy();
Header('Refresh:0; url=index.php');
?>