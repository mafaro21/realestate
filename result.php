<?php include 'include/header.php' ?>


<body>
    <?php include 'include/navbar.php' ?>
    <div class="top container">
        <div class="row card0">
            <?php

            if (isset($_GET['search'])) {

                $keyword = $_GET['user_query']; //user_query

                $sql = "SELECT * FROM products WHERE `location` LIKE '%$keyword%' ";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
            ?>
                    <div class="col-md-4">


                        <div>
                            <div>
                                <a href="product.php?id=<?php echo $row['id']; ?>">
                                    <div class="card p-3 mb-4 bg-white rounded">
                                        <img src="images/<?php echo $row['images']; ?> " width="315px" height="200px" class="rounded img-fluid" />
                                        <p>
                                            <h5><?php echo $row['location']; ?> </h5>
                                            <h5 class="price"><?php echo "$" . $row['buy']; ?> </h5>
                                        </p>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
            <?php }
            } else {
                echo "that shit doesn't exist";
            } ?>
        </div>
    </div>
</body>