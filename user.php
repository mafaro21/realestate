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
                            <a class="active" href="#">
                                <span data-feather="home"></span>
                                <h5 class="text-dark">Dashboard</h5> <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <hr style="border: 1px solid ">
                        <li class="nav-item">
                            <a href="edit.php">
                                <span data-feather="file"></span>
                                <h5 class="color text-dark">Edit Profile</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="saved.php">
                                <span data-feather="file"></span>
                                <h5 class="color text-dark">Saved Houses</h5>
                            </a>
                        </li>

                    </ul>



                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 top ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h2>WELCOME <?php echo $_SESSION['email']; ?></h2>

                </div>

                <div>
                    <h2>User Panel</h2>
                </div>
                <br>

                <div class="text-center top">
                    <div class="btn-group  " role="group">

                        <a>
                            <button type="button" class="btn btn-outline-warning btnlog" href="function/logout.php">Log Out</button>
                        </a>
                        <a>
                            <button type="button" class="btn btn-outline-danger btndel" href="function/deleteuser.php">Deactivate Account</button>
                        </a>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>




<script src="../jquery-3.5.1.min.js"></script>
<script src="../sweetalert2.all.min.js"></script>
<script>
    $('.btnlog').on('click', function(e) {
        e.preventDefault();
        // stops program from submitting

        const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure you want to log out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>

<script>
    $('.btndel').on('click', function(e) {
        e.preventDefault();
        // stops program from doing what original php does

        const href = $(this).attr('href')
        Swal.fire({
            title: 'Are you sure you want to deactivate your account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'timer: 2000', //supposed to be the delay before being sent back to homepage
                    'success'

                )
                document.location.href = href;

            }
        })
    })
</script>

</body>