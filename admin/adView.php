<?php
include 'adHeader.php';
include 'adNavbar.php';


if (!$_SESSION['name']) {
    header('Location: adLogin.php');
}

?>

<body class="adminBody admin-text">



    <div class="container-fluid top admin-text ">
        <div class="row">
            <?php include 'adSidebar.php'; ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="admin-text">Admin Dashboard</h1>

                </div>

                <div>
                    <h2>These Are All The Products </h2>
                </div>
                <br>



                <h2>Products Table</h2>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-sm admin-text">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Images</th>
                                <th>Buy($)</th>
                                <th>Rent($)</th>
                                <th>Downpayment($)</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php $query = mysqli_query($conn, "SELECT * FROM products ; ");

                        while ($row = mysqli_fetch_array($query)) { ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['location']; ?></td>
                                    <td><?php echo $row['images']; ?></td>
                                    <td><?php echo $row['buy']; ?></td>
                                    <td><?php echo $row['rent']; ?></td>
                                    <td><?php echo $row['down']; ?></td>
                                    <td class="content">
                                        <form action="" method="post">
                                            <button value="<?php echo $row['id']; ?>" class="btn btn-danger prodDel" name="delete">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                </svg>Delete</button>
                                        </form>
                                        <a href="adEdit.php?id=<?php echo $row['id']; ?>">
                                            <button value="<?php echo $row['id']; ?>" class="btn btn-success prodDel" name="edit">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </main>
        </div>




    </div>

</body>

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = "DELETE FROM products WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo '<script>alert("Product Has Been Removed");</script>';
        echo '<script>window.open("adView.php","_self");</script>';
    } else {

        header('Location: adView.php?failedtodeleted');
    }
}
?>