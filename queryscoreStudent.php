<?php
session_start();
require 'connect.php';
require 'checkSession.php';
include('querySQL.php');

$number = count($_POST['score']);
echo $id_student = $_POST['id_student'];
$subject = $_POST['subject_item'];
for($i=0;$i<$number;$i++){

    if(trim($_POST['score'][$i]) != 0 ){

        $query = "INSERT INTO student.student_score(id_score,id_student,id_subject,score_subject) VALUES ('','$id_student','".mysqli_real_escape_string($connect,$subject[$i])."','".mysqli_real_escape_string($connect,$_POST['score'][$i])."')";
        $result = mysqli_query($connect,$query);
        if($result){
            echo "insert successfully....";
        }else {
            echo "ERROR insert";
        }
        echo trim($_POST['subject_item'][$i]." = ".$_POST['score'][$i])."<br>";
    }
}

//Header("Location: detailStudent.php");

?>