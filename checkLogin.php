<html>

<head>
    <?php include('head.html'); ?>
</head>

<body>
    <?php
    session_start();
    require 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['username'])) {

        $query = "SELECT * FROM student.login WHERE username_login='$username' AND password_login='$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id_login'];
            $_SESSION['name'] = $row['name_login'] . " " . $row['sur_login'];
            $_SESSION['status'] = $row['status_login'];

            if ($_SESSION['status'] == "admin") {

                Header('Location: admin.php');
            } else if ($_SESSION['status'] == "student") {

                Header('Location: sutdent.php');
            }
        } else { 
            Header('Location: index.php');
        }
    }else {

        Header('Location: index.php');

    }
    ?>
</body>
<?php include('footer.html') ?>

</html>