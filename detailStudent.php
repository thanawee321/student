<?php
session_start();
require 'checkSession.php';
require 'connect.php';
include('querySQL.php');

$id_student = $_REQUEST['id_student'];



$querySubject = "SELECT name_subject FROM student.subject";
$resultSubject = mysqli_query($connect, $querySubject);


//นับรายวิชา
$querycountSubject = "SELECT count(*) AS total FROM student.subject";
$resultcountSubject = mysqli_query($connect, $querycountSubject);
$row = mysqli_fetch_assoc($resultcountSubject);
$count = $row['total'];





$querydetailStudent = "SELECT * FROM student.student_member WHERE id_student='$id_student'";
$resultdetailStudent = mysqli_query($connect, $querydetailStudent);

while ($row = mysqli_fetch_array($resultdetailStudent)) {

    $first = $row['first_student'];
    $name = $row['name_student'];
    $surname = $row['sur_student'];
    $level_class = $row['level_student'];
}

$queryonlyStudent = "SELECT student_score.id_score,student_member.first_student,student_member.name_student,student_member.sur_student,subject.name_subject,subject.unit_subject,student_score.score_subject FROM student_score,student_member,subject
WHERE student_score.id_student = student_member.id_student AND student_score.id_subject=subject.id_subject AND student_score.id_student='$id_student'";
$resultonlyStudent = mysqli_query($connect, $queryonlyStudent);

/*SELECT student_score.id_score,student_member.first_student,student_member.name_student,student_member.sur_student,subject.name_subject,student_score.score_subject FROM student_score,student_member,subject
WHERE student_score.id_student = student_member.id_student AND student_score.id_subject=subject.id_subject*/

$queryonlyStudentAct = "SELECT act_student.id_act,student_member.first_student,student_member.name_student,student_member.sur_student,act_student.come_act,act_student.onleave_act,act_student.late_act,act_student.sickleave_act 
FROM act_student INNER JOIN student_member ON act_student.id_student = student_member.id_student AND student_member.id_student = '$id_student'";
$resultonlyStudentAct = mysqli_query($connect, $queryonlyStudentAct);



/*SELECT act_student.id_act,student_member.first_student,student_member.name_student,student_member.sur_student,act_student.come_act,act_student.onleave_act,act_student.late_act,act_student.sickleave_act 
FROM act_student INNER JOIN student_member ON act_student.id_student = student_member.id_student AND student_member.id_student = '5866632491'*/

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('head.html'); ?>
</head>

<body>
    <?php include('menubar.php'); ?>
    <div class="container">

        <h2><u>รายละเอียดนักเรียน</u></h2>

        <div class="row">
            <div class="col-4">
                <img src="image/wed-blog-shutterstock_1703194387_low_nwm.jpg" alt="Snow" style="width:250px">
            </div>
            <div class="col-2">
                <h4>รหัสนักเรียน</h4>
                <h4>ชื่อ</h4>
                <h4>โรงเรียน</h4>
                <h4>การศึกษาระดับชั้น</h4>
                <h4>ครูประจำชั้น</h4>

            </div>
            <div class="col">
                <h4><?php echo $id_student; ?></h4>
                <h4><?php echo $first . " " . $name . " " . $surname; ?></h4>
                <h4>วัดหนองโคกอิเลิ้ง วิทยา</h4>
                <h4><?php echo $level_class ?> </h4>
                <h4>อ. จอดี้ เญลโปย่า</h4>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-4">

                <h4><u>ประวัติการ ขาด/ลา/มา/สาย</u></h4><br>
                <table class="table text-center table-bordered border-danger" style="width:80%">

                    <tr>
                        <th>มา</th>
                        <th>ลากิจ</th>
                        <th>สาย</th>
                        <th>ลาป่วย</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($resultonlyStudentAct)) { ?>
                        <tr>
                            <td><?php echo $row['come_act']; ?></td>
                            <td><?php echo $row['onleave_act']; ?></td>
                            <td><?php echo $row['late_act']; ?></td>
                            <td><?php echo $row['sickleave_act']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="col">
                <h4><u>ประวัติเรียน</u></h4><br>
                <table class="table text-center table-bordered border-primary" style="width:50%">
                    <tr>
                        <th>วิชา</th>
                        <th>หน่วยกิจ</th>
                        <th>คะแนน</th>
                        <th>ลบ</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($resultonlyStudent)) { ?>
                        <tr>
                            <td hidden><?php echo $row['id_score']; ?></td>
                            <td><?php echo $row['name_subject']; ?></td>
                            <td><?php echo $row['unit_subject']; ?></td>
                            <td><?php echo $row['score_subject']; ?></td>

                            <td><button class="btn btn-danger">ลบ</button></td>
                        </tr>
                    <?php } ?>

                </table>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertscoreSubject"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล</button>
            </div>
        </div>







    </div>
    </div>
    </div>
    <div class="overlay"></div>






    <!-- Modal -->
    <div class="modal fade" id="insertscoreSubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ใส่คะแนน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <form method="POST" action="queryscoreStudent.php">
                            <div class="row">
                                <div class="col">
                                    <input hidden type="text" value="<?php echo $id_student; ?>" name="id_student" id="id_student">
                                    <table class="table table-bordered " id="add_field">
                                        <?php for ($i = 1; $i <= $count; $i++) { ?>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="subject_item[]" id="subject_item[]">
                                                        <?php dynamic_fill_dropdown(); ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="score[]" id="score[]" step="0.01">
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <input type="submit" class="btn btn-primary" value="ตกลง">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
<?php include('footer.html'); ?>

</html>