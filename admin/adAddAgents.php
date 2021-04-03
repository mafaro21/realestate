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
                            <a href="adAgents.php">
                                <span data-feather="users"></span>
                                <h5 class="text-dark">Agents</h5>
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

                <!-- <div>
                    <h2>You Can Add New Products Here</h2>
                </div> -->
                <br>



                <h2>Add Agents</h2>

                <form method="POST" action="">
                    <div class="table-responsive table-bordered container">
                        <table class="table table-striped table-sm ">

                            <tr>
                                <td>Agent Firstname</td>
                                <td><input name="firstname" type="text" class="form form-control mr-sm-2 field" placeholder="Enter Firstname" required /></td>
                            </tr>

                            <tr>
                                <td>Agent Lastname</td>
                                <td><input name="lastname" type="text" class="form form-control mr-sm-2 field" placeholder="Enter Lastname" required /></td>

                            </tr>

                            <tr>
                                <td>Location</td>
                                <td><input name="location" type="text" class="form form-control mr-sm-2 field" placeholder="Enter Location" required /></td>
                            </tr>

                            <tr>
                                <td>Contact</td>
                                <td><input name="contact" type="text" class="form form-control mr-sm-2 field" placeholder="Enter Contact Number" onkeypress="return" required /></td>
                            </tr>

                            <tr>
                                <td>Commission($)</td>
                                <td><input name="commission" type="number" class="form form-control mr-sm-2 field" placeholder="Enter Price" maxlength="30" onkeypress="return" required /></td>
                            </tr>

                            <tr>
                                <td>Salary($)</td>
                                <td><input name="salary" type="number" class="form form-control mr-sm-2 field" placeholder="Enter Price" maxlength="20" onkeypress="return" required /></td>
                            </tr>

                            <tr>
                                <td>Hire Date</td>
                                <td><input name="hireDate" type="date" class="form form-control mr-sm-2 field" placeholder="Enter Hire Date" required /></td>
                            </tr>



                        </table>
                        <tr>
                            <button type="submit" name="add" value="Add Item" class="btn btn-outline-primary" />Add</button>
                        </tr>
                    </div>
                </form>


        </div>

</body>
<?php
if (isset($_POST['add'])) {


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $commission = mysqli_real_escape_string($conn, $_POST['commission']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $hireDate = mysqli_real_escape_string($conn, $_POST['hireDate']);



    $sql = "INSERT INTO agents (`firstname`, `lastname` , `location` ,`contact` , `commission` , `salary`, `hireDate` ) VALUES ('$firstname','$lastname','$location', '$contact', '$commission' ,'$salary', '$hireDate')";




    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("The Agent Has Been Added");</script>';
        echo '<script>window.open("adAgents.php","_self");</script>';
    } else {
        echo "we have a problem" . mysqli_connect_error();
    }
}
