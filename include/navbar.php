<?php include 'include/session.php'; ?>



<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-primary">
    <div class="container">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">Real<strong>Estate</strong> </a>
        </div>

        <!-- search bar -->
        <!-- <form class="form-inline col-md-3" method="POST" action="result.php">
            <div class="content">
                <input class="search form-control" name="user_query" placeholder="Search">

                <button class="btn btn-dark " type="submit" name="search">Search</button>
            </div>
        </form> -->
    </div>


    <div class="collapse container navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <a class="nav-item nav-link white active" href="houses.php">Houses </a>

        <a class="nav-item nav-link white active" href="apartments.php">Apartments </a>

        <!-- <a class="nav-item nav-link white active" href="user.php">My Account </a> -->

        <!-- displaying name of logged in user -->
        <?php if (isset($_SESSION['email'])) { ?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
            <a class="nav-item nav-link white " href="user.php"><?php echo $_SESSION['email']; ?> </a>

        <?php }; ?>


        <?php

        // changing outlook when user is logged in
        if (isset($_SESSION['email'])) {
            echo '<hr>
            
            ';
        } else {
            echo '
            <a class="nav-item nav-link white " href="signup.php">Sign Up</a>
            <a class="nav-item nav-link white " href="login.php">Log In</a> ';
        }
        ?>
    </div>
</nav>




<!-- -->



<?php include 'include/scripts.php'; ?>
<script src="script.js"></script>