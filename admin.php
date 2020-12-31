<?php
session_Start();
require 'connect.php';
include('checkSession.php');

$query = "SELECT * FROM student.student_member";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('head.html'); ?>

</head>

<body>
    <?php include('menubar.php'); ?>

    <div class="container-fluid">
        <h1>รายชื่อนักเรียน</h1>
        
        <table class="table table-hover table-striped table-borderless" id="viewStudent">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>รหัสนักเรียน</th>
                    <th>เลขที่</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ระดับชั้น</th>
                    <th>เบอร์โทร</th>
                    <th>เกรดเฉลี่ย</th>

                    <th>รายละเอียด</th>
                    <th>ลบ</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td class="text-center table-primary"><?php echo $row['id_student']; ?></td>
                        <td class="text-center"><?php echo $row['number_student']; ?></td>
                        <td class="text-center"><?php echo $row['first_student'];?></td>
                        <td><?php echo $row['name_student']; ?></td>
                        <td><?php echo $row['sur_student']; ?></td>
                        <td class="text-center"><?php echo $row['level_student']; ?></td>
                        <td class="text-center table-danger"><?php echo $row['phone_student'];?></td>
                        <td class="text-center"><?php echo $row['grade_student']; ?></td>

                        <td class="text-center"><a href="detailStudent.php?id_student=<?php echo $row['id_student'];?>"  class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                        <td class="text-center"><button  class="btn btn-danger btndeleteStudent" id="<?php echo $row['id_student']; ?>" data-bs-toggle="modal" data-bs-target="#deleteStudent"><i class="fas fa-trash"></i></button></td>
                        <td class="text-center"><button  class="btn btn-warning btnupdateStudent" id="<?php echo $row['id_student']; ?>"><i class="fas fa-edit"></i></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>



                </div>
    </div>

    <div class="overlay"></div>
    


    <!-- Modal delete student-->
    <div class="modal fade" id="deleteStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การยืนยัน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณต้องการที่จะลบรายการนี้หรือไม่?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-danger cfdeleteStudent">ตกลง</button>
                </div>
            </div>
        </div>
    </div>







    <!-- Modal update student-->
    <div class="modal fade" id="updateStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล|<span id="nameStudent"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="queryupdateStudent.php">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-10">
                                        <label>รหัสนักเรียน</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="updatePass_student" id="updatePass_student">
                                    </div>
                                </div>
                            </div><br>



                            <div class="row">
                                <div class="col">
                                    <label>ชื่อและนามสกุล</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center">
                                    <select class="form-control dropdown-toggle " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="updateFirst_word" id="updateFirst_word">
                                        <option value="ด.ช.">ด.ช.</option>
                                        <option value="ด.ญ.">ด.ญ.</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="updateName" id="updateName">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="updateSurname" id="updateSurname">
                                </div>
                            </div><br>



                            <div class="row">
                                <div class="col-3">
                                    <label>เลขที่</label>
                                </div>
                                <div class="col">
                                    <label>ระดับชั้น</label>
                                </div>
                                <div class="col">
                                    <label>เกรดเฉลี่ย</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="form-control" name="updateNumber" id="updateNumber">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="updateLevel_class" id="updateLevel_class">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="updateGrade" id="updateGrade" step="0.01">
                                </div>
                            </div><br>




                            <div class="row">
                                    <div class="col">
                                        <label>เบอร์โทร</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="tel" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12"  title="Ten digits code"  name="updatePhone" id="updatePhone" required>
                                    </div>
                                </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary" value="ยกเลิก">
                    <input type="submit" class="btn btn-warning" value="บันทึก">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
<?php include('footer.html'); ?>

</html>