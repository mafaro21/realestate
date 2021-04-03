<?php
include '../include/session.php';

require '../include/connect.php';

if (isset($_POST['signup'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $repassword = mysqli_real_escape_string($conn, md5($_POST['repassword']));

    $k = "SELECT * FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $k);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) { //email in use
        echo "<script>window.alert('Email Is Already In Use');</script>";
        echo "<script>window.open('../signup.php','_self');</script>";
    } else if ($password != $repassword) { //passwords not matching
        echo "<script>window.alert('Passwords Didn\'t Match');</script>";
        echo "<script>window.open('../signup.php','_self');</script>";
    } else {
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email ', '$password')";


        if (mysqli_query($conn, $sql)) { //account creation

            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            echo "<script>window.alert('Account Created Successfully');</script>";
            echo "<script>window.open('../index.php','_self');</script>";
            exit();
        } else {
            mysqli_connect_error();
            exit();
        }
    }
}

