<?php

function query_insert($sql)
{

    require 'connect.php';
    $query = $sql;
    $result = mysqli_query($connect, $query);

    if ($result) {
        Header("Location: admin.php");
    } else {
        $errorMessage = mysqli_error($connect);
        echo "<script>alert('$errorMessage');</script>";
        Header("Location: admin.php");
    }
}

function query_delete($sql)
{

    require 'connect.php';
    $query = $sql;
    $result = mysqli_query($connect, $query);

    if ($result) {
        Header("Location: admin.php");
    } else {
        $errorMessage = mysqli_error($connect);
        echo "<script>alert('$errorMessage');</script>";
        Header("Location: admin.php");
    }
}

function dynamic_fill_dropdown(){

    require 'connect.php';
    $querySubject = "SELECT id_subject,name_subject FROM student.subject";
    $resultSubject = mysqli_query($connect, $querySubject);

     while ($row = mysqli_fetch_array($resultSubject)) { ?>
        <option value="<?php echo $row['id_subject']; ?>"><?php echo $row['name_subject']; ?></option>
    <?php } 




}


?>
