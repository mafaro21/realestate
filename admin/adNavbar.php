<?php include '../include/session.php'; ?>



<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-primary">
    <div class="container">
        <div class="container">
            <a class="navbar-brand" href="admin.php">Real<strong>Estate</strong> </a>
        </div>
    </div>

    <div class="collapse container navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="theme-switch visible">
            <div class="switch"></div>
        </div>


        <!-- displaying name of logged in user -->
        <?php if (isset($_SESSION['name'])) { ?>
            <div class="dropdown " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-item nav-link white" href="admin.php">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-diagram-3-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z" />
                    </svg> <?php echo $_SESSION['name']; ?> </a>

            </div>
        <?php }; ?>


        <!-- <?php

                // changing outlook when user is logged in
                if (isset($_SESSION['name'])) {
                    echo '<hr>
            
            ';
                } else {
                    echo '
            <a class="nav-item nav-link" href="login.php">Log In</a> ';
                }
                ?> -->
    </div>
</nav>




<!-- -->



<?php include '../include/scripts.php'; ?>
<script src="../script.js"></script>