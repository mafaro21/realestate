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

                <div>
                    <h2>Edit Existing Products</h2>
                </div>
                <br>

                <?php

                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id = '$id'; ";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>


                    <h2>Edit Item <?php echo $row['id']; ?></h2>

                    <form method="POST" action="">
                        <div class="table-responsive table-bordered container">
                            <table class="table table-striped table-sm ">
                                <br>
                                <tr>
                                    <td>Product type</td>
                                    <td><input type="text" class="form form-control mr-sm-2 field" name="type" value="<?php echo $row['type']; ?>" required /></td>
                                </tr>

                                <tr>
                                    <td>Product Description</td>
                                    <td>
                                        <textarea rows="4" cols="10" class="form form-control mr-sm-2 field" name="description" required><?php echo $row['description']; ?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Location</td>
                                    <td><input type="text" class="form form-control mr-sm-2 field" name="location" value="<?php echo $row['location']; ?>" required /></td>
                                </tr>

                                <tr>
                                    <td>Images</td>
                                    <td><input name="images" type="file" class="btn btn-outline-primary" required /> <?php echo $row['images']; ?></td>
                                </tr>

                                <tr>
                                    <td>Price(Buy)($)</td>
                                    <td><input name="buy" type="text" class="form form-control mr-sm-2 field" value="<?php echo $row['buy']; ?>" maxlength="30" onkeypress="return" required /></td>
                                </tr>

                                <tr>
                                    <td>Price(Rent)($)</td>
                                    <td><input name="rent" type="text" class="form form-control mr-sm-2 field" value="<?php echo $row['rent']; ?>" maxlength="20" onkeypress="return" required /></td>
                                </tr>




                            </table>
                            <tr>
                                <button type="submit" name="add" value="Add Item" class="btn btn-outline-primary" />Edit</button>
                            </tr>
                        </div>
                    </form>
                <?php } ?>
            </main>
        </div>



    </div>

</body>
<?php
if (isset($_POST['add'])) {

    $id = $_GET['id'];

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $images = mysqli_real_escape_string($conn, $_POST['images']);
    $buy = mysqli_real_escape_string($conn, $_POST['buy']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $down = $buy * 0.05;


    $sql = "UPDATE products 
            SET `type` = '$type',  
                `description` = '$description', 
                `location` = '$location',
                `images` = '$images',  
                `buy` = '$buy',
                `rent` = '$rent',
                `down` = '$down'
                WHERE id = '$id'; ";


    if (mysqli_query($conn, $sql)) {

        echo '<script>alert("Product Has Been Edited");</script>';
        echo '<script>window.open("adView.php","_self");</script>';
        exit();
    } else {
        echo "we have a problem" . mysqli_connect_error();
    }
}
