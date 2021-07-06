<?php
include 'adHeader.php';
include 'adNavbar.php';


if (!$_SESSION['name']) {
    header('Location: adLogin.php');
}

?>

<body class="adminBody">



    <div class="container-fluid top admin-text  text-dark">
        <div class="row">
            <?php include 'adSidebar.php'; ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 top ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom top">
                    <h1 class="">Admin Dashboard</h1>

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