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


            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="">Admin Dashboard</h1>

                </div>

                <div>
                    <h2>You Can Add New Products Here</h2>
                </div>
                <br>



                <h2>Add Items</h2>

                <form method="POST" action="">
                    <div class="table-responsive table-bordered container">
                        <table class="table table-striped table-sm ">

                            <tr>
                                <td>Product type</td>
                                <td><input type="text" class="form form-control mr-sm-2 field" name="type" required /></td>
                            </tr>

                            <tr>
                                <td>Product Description</td>
                                <td>
                                    <textarea rows="4" cols="10" class="form form-control mr-sm-2 field" name="description" required><p></p></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>Location</td>
                                <td><input type="text" class="form form-control mr-sm-2 field" name="location" required /></td>
                            </tr>

                            <tr>
                                <td>Images</td>
                                <td><input name="images" type="file" class="btn btn-outline-primary" required /></td>
                            </tr>

                            <tr>
                                <td>Price(Buy)($)</td>
                                <td><input name="buy" type="number" class="form form-control mr-sm-2 field" placeholder="Enter Price" maxlength="30" onkeypress="return" required /></td>
                            </tr>

                            <tr>
                                <td>Price(Rent)($)</td>
                                <td><input name="rent" type="number" class="form form-control mr-sm-2 field" placeholder="Enter Price" maxlength="20" onkeypress="return" required /></td>
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


    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $images = mysqli_real_escape_string($conn, $_POST['images']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $buy = mysqli_real_escape_string($conn, $_POST['buy']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $down = $buy * 0.08;



    $sql = "INSERT INTO products (`type`, `description` , `location` ,`images`  , `buy`, `rent`,`down` ) VALUES ('$type','$description','$location', '$images','$buy', '$rent', '$down')";




    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Product Has Been Added");</script>';
        echo '<script>window.open("adView.php","_self");</script>';
    } else {
        echo "we have a problem" . mysqli_error($conn);
    }
}
