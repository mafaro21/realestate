<?php
include '../include/session.php';

require '../include/connect.php';

$email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];

$sql = "DELETE FROM users WHERE email = '$email' ";

if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php');
    session_destroy();
    exit();
} else {
    header('Location:user.php?error=failed-to-delete-account');
    exit();
}

//working at the moment