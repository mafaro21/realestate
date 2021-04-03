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
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
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
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4  ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h1 class="text">Admin Dashboard</h1>

                </div>

                <div>
                    <h2>You Can Log Out As Admin, But Will Be Sent Back To Homepage</h2>
                </div>
                <br>

                <a>
                    <button type="button" class="btn btn-warning" href="../function/logout.php">Log Out</button>
                </a>


            </main>

            <script src="../jquery-3.5.1.min.js"></script>

            <!-- sweet alert for the pop up windows for a response -->
            <script src="../sweetalert2.all.min.js"></script>
            <script>
                $('.btn').on('click', function(e) {
                    e.preventDefault();
                    // stops program from doing what original php does

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

        </div>
    </div>
</body>