<?php
include 'adHeader.php';
include 'adNavbar.php';

if (!$_SESSION['name']) {
    header('Location: adLogin.php');
}
?>

<body class="adminBody">



    <div class="container-fluid top text  text-dark">
        <div class="row">
            <?php include 'adSidebar.php'; ?>
            <!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="active" href="admin.php">
                                <span data-feather="home"></span>
                                <h5 class="text-dark">Dashboard</h5> <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <hr style="border: 1px solid ">
                        <li class="nav-item">
                            <a href="adAdd.php">
                                <span data-feather="file"></span>
                                <h5 class="color text-dark">Add items</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adView.php">
                                <span data-feather="shopping-cart"></span>
                                <h5 class="text-dark">View Products</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adUsers.php">
                                <span data-feather="users"></span>
                                <h5 class="text-dark">Users</h5>
                            </a>
                        </li>
                        <li>
                            <a href="adAccount.php">
                                <span data-feather="users"></span>
                                <h5 class="text-dark">Account</h5>
                            </a>
                        </li>

                    </ul>



                </div>
            </nav> -->

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="text">Admin Dashboard</h1>

                </div>

                <div>
                    <h2>Edit Existing Products</h2>
                </div>
                <br>

                <?php

                $id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE id = '$id'; ";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>

                    <form method="POST" action="">
                        <div class="table-responsive table-bordered container">
                            <table class="table table-striped table-sm ">
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
                                <button type="submit" name="edit" value="Edit" class="btn btn-outline-primary" />Edit</button>
                            </tr>
                        </div>
                    </form>

                <?php } ?>

            </main>
        </div>
    </div>
</body>

<?php
if (isset($_POST['edit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = "UPDATE users 
            SET `firstname` = '$firstname',  
                `lastname` = '$lastname', 
                `email` = '$email'
                WHERE email = '$email'; ";


    if (mysqli_query($conn, $sql)) {
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;

        echo '<script>alert("User Has Been Edited");</script>';
        echo '<script>window.open("adUsers.php","_self");</script>';
    } else {
        echo "we have a problem" . mysqli_connect_error();
    }
}
