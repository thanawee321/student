<?php 
session_start();
require 'connect.php';
require 'checkSession.php';
include('querySQL.php');

$pass_student = $_POST['pass_student'];
 
$first_word = $_POST['first_word'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$level_class = $_POST['level_class'];
$grade = $_POST['grade'];
$phone = $_POST['phone'];
$phone;

$sql = "INSERT INTO student.student_member(id_student,number_student,first_student,name_student,sur_student,level_student,phone_student,grade_student) VALUES('$pass_student','$number','$first_word','$name','$surname','$level_class','$phone','$grade')";
query_insert($sql);

Header("Refresh:0; url=admin.php");

?>