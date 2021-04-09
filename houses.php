<?php include 'include/header.php' ?>


<body>
    <?php include 'include/navbar.php' ?>

    <div class="container top ">

        <p style="font-weight: bold;">
        <h2 class="text">ALL HOUSES</h2>
        </p>
        <div class="row card0">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM products WHERE type = 'house'; ");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4">


                    <div>
                        <div>
                            <a href="product.php?id=<?php echo $row['id']; ?>">
                                <div class="card p-3 mb-4 bg-white rounded">
                                    <img src="images/<?php echo $row['images']; ?> " card-img class="rounded img-fluid" />
                                    <p>
                                    <h5><?php echo $row['location']; ?> </h5>
                                    <h5 class="price"><?php echo "$" . $row['buy']; ?> </h5>
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php include 'include/footer.php'; ?>