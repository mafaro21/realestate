<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="sidebar-sticky pt-3 ">
                    <ul class="nav flex-column">
                        

                        <hr style="border: 1px solid " class="mt-5">
                        <li class="nav-item ">
                            <a class="active" href="user.php">
                                <?php

        if ($_SERVER['REQUEST_URI'] ===  "/realestate/user.php") {
            echo '<h5 class="color text active1" href="saved.php">Dashboard</h5>';
        } else {
            echo '<h5 class="color text" href="saved.php">Dashboard</h5>';
        }
        ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="edit.php">
                                <?php

        if ($_SERVER['REQUEST_URI'] ===  "/realestate/edit.php") {
            echo '<h5 class="color text active1" href="saved.php">Edit Profile</h5>';
        } else {
            echo '<h5 class="color text" href="saved.php">Edit Profile</h5>';
        }
        ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="saved.php">
                                <?php

        if ($_SERVER['REQUEST_URI'] ===  "/realestate/saved.php") {
            echo '<h5 class="color text active1" href="saved.php">Saved Houses</h5>';
        } else {
            echo '<h5 class="color text" href="saved.php">Saved Houses</h5>';
        }
        ?>
                            </a>
                        </li>

                    </ul>



                </div>
            </nav>

            