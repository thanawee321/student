<?php 
if(!$_SESSION['userid'] || !$_SESSION['name']){

    Header('Location: index.php');
}else if($_SESSION['status']=="student"){
    Header('Location: index.php');
}
?>