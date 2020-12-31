<?php 
require 'connect.php';


?>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <h3>Student System Report</h3>
        </div>

        <ul class="list-unstyled components">
            <h5 class="text-center">
                <li><a href="admin.php">หน้าหลัก</a></li>
            </h5>
            <li class="active ">
                <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false">เพิ่มข้อมูล</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#insert_student">เพิ่มข้อมูลนักเรียน</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">เช็คชื่อนักเรียน</a>
            </li>
            <li class="active">
                <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="logout.php" style="width:100%" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logout"><i class="fas fa-sign-out-alt "></i> ออกจากระบบ</a>
            </li>
            <li>
                <p class="text-center"><small>Copyright © BY จ๊ะเอ๋ตัวเอง</small></p>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn swingHorizontal ">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="nav navbar-nav  ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link active swingHorizontal" href="checkStudent.php">เช็คชื่อนักเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link swingHorizontal" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link swingHorizontal" href="#">Page</a>
                        </li>
                        <li class="nav-item dropdown dropstart"> <!--เพิ่ม dropdown dropstart เข้าไป-->
                           
                            <a class="nav-link dropdown-toggle swingHorizontal" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">การตั้งค่า</a>
                            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">เพิ่มรายวิชา</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Modal input new student-->
        <div class="modal fade" id="insert_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลนักเรียน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form method="POST" action="querynewStudent.php">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-10">
                                            <label>รหัสนักเรียน</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="pass_student" id="pass_student">
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
                                        <select class="form-control dropdown-toggle " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="first_word" id="first_word">
                                            <option value="ด.ช.">ด.ช.</option>
                                            <option value="ด.ญ.">ด.ญ.</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="surname" id="surname">
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
                                        <input type="number" class="form-control" name="number" id="number">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="level_class" id="level_class">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="grade" id="grade" step="0.01">
                                    </div>
                                </div><br>




                                <div class="row">
                                    <div class="col">
                                        <label>เบอร์โทร</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="tel" class="form-control" maxlength="12" title="Ten digits code" name="phone" id="phone">
                                    </div>
                                </div>







                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary" value="ยกเลิก">
                        <input type="submit" class="btn btn-primary" value="ตกลง">
                    </div>
                </div>
                </form>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">การยืนยัน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        คุณต้องการออกจากระบบหรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <a href="logout.php" class="btn btn-danger">ตกลง</a>
                    </div>
                </div>
            </div>
        </div>