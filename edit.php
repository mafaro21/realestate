<?php include 'include/header.php';
include 'include/navbar.php';


if (!$_SESSION['email']) {
    header('Location: index.php');
}
?>


<body class=" text">
    <div class="container-fluid top text text-dark">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse"></nav>
            <div class="sidebar-sticky pt-3 ">
                <ul class="nav flex-column">
                    <li class="nav-item ">
                        <a class="active" href="user.php">
                            <span data-feather="home"></span>
                            <h5 class="text">Dashboard</h5> <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <hr style="border: 1px solid ">
                    <li class="nav-item">
                        <a href="edit.php">
                            <span data-feather="file"></span>
                            <h5 class=" text">Edit Profile</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="saved.php">
                            <span data-feather="file"></span>
                            <h5 class=" text" href="saved.php">Saved Houses</h5>
                        </a>
                    </li>

                </ul>



            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4  ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h2 class="text">WELCOME <?php echo $_SESSION['email']; ?></h2>

                </div>

                <div>
                    <h2 class="text">You Can Modify Your Account Details Here</h2>
                </div>
                <?php

                $k = $_SESSION['email'];
                $sql = "SELECT * FROM users WHERE email = '$k'; ";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <br>

                    <form method="POST" action="">
                        <div class="table-responsive table-bordered container">
                            <table class="table table-striped table-sm text">
                                <br>
                                <tr>
                                    <td>Firstname</td>
                                    <td><input type="text" class="form form-control mr-sm-2 field" maxlength="20" name="firstname" value="<?php echo $row['firstname']; ?>" required /></td>
                                </tr>
                                <tr>
                                    <td>Lastname</td>
                                    <td><input type="text" class="form form-control mr-sm-2 field" maxlength="20" name="lastname" value="<?php echo $row['lastname']; ?>" required /></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" class="form form-control mr-sm-2 field" maxlength="50" name="email" value="<?php echo $row['email']; ?>" required /></td>
                                </tr>


                            </table>
                            <tr>
                                <button type="submit" name="edit" value="Edit" class="btn btn-outline-primary " />Edit</button>
                            </tr>
                        </div>
                    </form>




                    <br>

                    <!-- <input type="button" name="answer" value="Show Div" onclick="showDiv()" /> -->

                    <input id="myButton" type="button" name="answer" class="btn text" value="Change Password Here" />
                    <div id="myDiv" style="display:none;" class="answer_list container mt-3"> WELCOME
                        <br>
                        <form method="POST" action="">
                            <div class="table-responsive table-bordered container ">
                                <table class="table table-striped table-sm text">
                                    <br>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" class="form form-control mr-sm-2 field" maxlength="50" name="email" value="<?php echo $row['email']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td>Old Password</td>
                                        <td><input type="password" class="form form-control mr-sm-2 field" maxlength="50" name="oldPass" placeholder="enter your old password" required /></td>
                                    </tr>
                                    <tr>
                                        <td>New Password</td>
                                        <td><input type="password" class="form form-control mr-sm-2 field" maxlength="50" name="newPass" placeholder="a new password" required /></td>
                                    </tr>
                                </table>
                                <tr>
                                    <button type="submit" name="pass" value="Password" class="btn btn-outline-primary" />Change Password</button>
                                </tr>
                            </div>
                        </form>
                    </div>
                <?php } ?>


            </main>
        </div>
    </div>
</body>

<!-- change password moving div -->
<script>
    $('#myButton').click(function() {
        $('#myDiv').toggle('slow', function() {
            // Animation complete.
        });
    });
</script>

<!-- change basic details -->
<?php
if (isset($_POST['edit'])) {

    $k = $_SESSION['email'];


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = "UPDATE users 
            SET `firstname` = '$firstname',  
                `lastname` = '$lastname', 
                `email` = '$email'
                WHERE email = '$k'; ";


    if (mysqli_query($conn, $sql)) {
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;

        echo '<script>alert("Your Details Have Been Edited");</script>';
        echo '<script>window.open("edit.php","_self");</script>';
    } else {
        echo "we have a problem" . mysqli_connect_error();
    }
}
?>

<!-- change password -->
<?php
if (isset($_POST['pass'])) {

    $k = $_SESSION['email'];

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $oldPass = mysqli_real_escape_string($conn, md5($_POST['oldPass']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$oldPass' ;";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);


    if ($rows == 1) {
        $newPass = md5($_POST['newPass']);

        if ($oldPass == $newPass) {
            echo "<script>window.alert('Old & New Passwords Are Identical ')</script>";
            echo "<script>window.open('edit.php?samepasswords', '_self')</script>";
            // header("Location:../edit.php");
            exit();
        } else {
            $pass = "UPDATE users 
            SET `password` = '$newPass',  
                `email` = '$email'
                WHERE email = '$email'; ";

            if (mysqli_query($conn, $pass)) {
                $_SESSION['email'] = $email;
                echo "<script>alert('Your Password Has Been Changed')</script>";
                echo "<script>window.open('edit.php', '_self')</script>";
            }
        }
    } else {
        echo "<script>alert('Username or Password is Incorrect')</script>";
        echo "<script>window.open('edit.php', '_self')</script>";
        exit();
    }
}
