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

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 top ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom top">
                    <h1 class="text">Admin Dashboard</h1>

                </div>

                <div>
                    <h2>Welcome Admin, anything new today?</h2>
                </div>
                <br>


            </main>
        </div>
    </div>
</body>




<?php include '../include/scripts.php'; ?>