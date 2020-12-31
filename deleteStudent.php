<?php 
session_start();
require 'connect.php';
include('querySQL.php');

$id_student = $_POST['id_student'];

$sql = "DELETE FROM student.student_member WHERE id_student = '$id_student'";
query_delete($sql);


?>