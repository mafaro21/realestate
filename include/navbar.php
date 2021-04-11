<?php

use Stripe\Terminal\Location;

include 'include/session.php'; ?>



<nav class="navbar navbar-expand-lg sticky-top navbar-light ">
    <div class="container">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">Real<strong>Estate</strong> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- search bar -->
        <!-- <form class="form-inline col-md-3" method="POST" action="result.php">
            <div class="content">
                <input class="search form-control" name="user_query" placeholder="Search">

                <button class="btn btn-dark " type="submit" name="search">Search</button>
            </div>
        </form> -->
    </div>


    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>

        <?php

        if ($_SERVER['REQUEST_URI'] ===  "/realestate/houses.php") {
            echo '<a class="nav-item nav-link white active1" href="houses.php">Houses </a>';
        } else {
            echo '<a class="nav-item nav-link white " href="houses.php">Houses </a>';
        }
        ?>

        <!-- <a class="nav-item nav-link white black" href="houses.php">Houses </a> -->

        <?php

        if ($_SERVER['REQUEST_URI'] ===  "/realestate/apartments.php") {
            echo '<a class="nav-item nav-link white active1 " href="apartments.php">Apartments </a>';
        } else {
            echo '<a class="nav-item nav-link white  " href="apartments.php">Apartments </a>';
        }
        ?>

        <!-- <a class="nav-item nav-link white black " href="apartments.php">Apartments </a> -->



        <!-- <a class="nav-item nav-link white active" href="user.php">My Account </a> -->

        <!-- displaying name of logged in user -->
        <?php if (isset($_SESSION['email'])) { ?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
            <!-- <a class="nav-item nav-link white " href="user.php"><?php echo $_SESSION['email']; ?> </a> -->

            <?php
            if ($_SERVER['REQUEST_URI'] ===  "/realestate/user.php") {
                echo '<a class="nav-item nav-link active1 " href="user.php">' . $_SESSION['email'] . '</a>';
            } else {
                echo '<a class="nav-item nav-link white " href="user.php">' . $_SESSION['email'] . '</a>';
            }
            ?>

        <?php }; ?>


        <?php

        // changing outlook when user is logged in
        if (isset($_SESSION['email'])) {
            echo '<hr>
            
            ';
        } else {


            if ($_SERVER['REQUEST_URI'] ===  "/realestate/signup.php") {
                echo '<a class="nav-item nav-link active1 " href="signup.php">Sign Up</a>';
            } else {
                echo '<a class="nav-item nav-link white " href="signup.php">Sign Up</a>';
            }

            if ($_SERVER['REQUEST_URI'] ===  "/realestate/login.php") {
                echo '<a class="nav-item nav-link active1 " href="login.php">Log In</a>';
            } else {
                echo '<a class="nav-item nav-link white " href="login.php">Log In</a>';
            }

            // echo '

            // <a class="nav-item nav-link white " href="signup.php">Sign Up</a>
            // <a class="nav-item nav-link white " href="login.php">Log In</a> ';
        }
        ?>
    </div>
</nav>




<!-- -->



<?php include 'include/scripts.php'; ?>
<!-- < src="script.js"></> -->

<script>
    const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');

    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);

        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script>