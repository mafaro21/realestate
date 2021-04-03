<?php
include '../include/session.php';

include '../include/connect.php';

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = "DELETE FROM users WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<div class=" to" style="background-color: green; color: white">user successfully deleted</div>';
    } else {

        header('Location: adUsers.php?failedtodeleted');
    }
}
