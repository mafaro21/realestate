<?php
include '../include/session.php';

require '../include/connect.php';

if (isset($_POST['login'])) {


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ;";
    $result = mysqli_query($conn, $sql);

    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['email'] = $email;

        echo "<script>window.alert('Successfully Logged In')</script>";
        echo "<script>window.open('../index.php','_self');</script>";
        exit();
    } else {
        echo "<script>window.alert('Username or Password is Incorrect')</script>";
        echo "<script>window.open('../login.php','_self');</script>";
        exit();
    }
}
