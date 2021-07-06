<?php
include 'adHeader.php';
include 'adNavbar.php';


if (!$_SESSION['name']) {
    header('Location: adLogin.php');
}

?>

<body class="adminBody">



    <div class="container-fluid top text ">
        <div class="row">
        <?php include 'adSidebar.php'; ?>


            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4  ">
                <div class="align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h1 class="">Admin Dashboard</h1>

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