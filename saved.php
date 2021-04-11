<?php include 'include/header.php';
include 'include/navbar.php';


if (!$_SESSION['email']) {
    header('Location: index.php');
}
?>


<body class=" text">
    <div class="container-fluid top text  text-dark">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
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
                                <h5 class="color text">Edit Profile</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#">
                                <span data-feather="file"></span>
                                <h5 class="color text" href="saved.php">Saved Houses</h5>
                            </a>
                        </li>

                    </ul>



                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4  ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom text">
                    <h2>WELCOME <?php echo $_SESSION['email']; ?></h2>

                </div>

                <div>
                    <h2 class="text">Here Are All Your Saved Houses</h2>
                </div>
                <br>
                <?php
                $email = $_SESSION['email'];
                $k = "SELECT * FROM cart WHERE email = '$email' ;";
                $result = mysqli_query($conn, $k);
                $l = mysqli_num_rows($result);

                if ($l == 0) {
                    echo "<h4 class='text'>There Seem To Be No Items In Your Cart, Go And Explore!</h4>";
                } else {
                    $email = $_SESSION['email'];
                    $sql = "SELECT * FROM cart, products WHERE cart.prodId = products.id AND cart.email = '$email';";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {

                ?>

                        <div class="content">
                            <div class="table-responsive table-bordered">
                                <table class="table table-striped table-sm text">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Images</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Buy($)</th>
                                            <th>Rent($)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><img src="images/<?php echo $row['images']; ?> " width="300px" height="200px" /></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['buy']; ?></td>
                                            <td><?php echo $row['rent']; ?></td>
                                            <td class="content">
                                                <a href=" product.php?id=<?php echo $row['id']; ?>"">
                                                <button value=" <?php echo $row['id']; ?>" class="btn btn-success prodDel" name="view">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                                    </svg>View</button>
                                                </a>
                                                <form action="" method="post">
                                                    <button value="<?php echo $row['id']; ?>" class="btn btn-danger prodDel" name="remove">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                        </svg>Remove</button>
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                            </div>
                    <?php }
                } ?>

            </main>
        </div>
    </div>
</body>

<?php
if (isset($_POST['remove'])) {
    $id = $_POST['remove'];

    $sql = "DELETE FROM cart WHERE prodId = '$id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo '<script>alert("Property Deleted From Cart");</script>';
        echo `<script>open("saved.php");</script>`;
    } else {

        echo '<script>alert("Property Failed To Delete");</script>';
    }
}
?>