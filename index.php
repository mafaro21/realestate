<?php include 'include/header.php' ?>


<body>
    <?php include 'include/navbar.php' ?>



    <!-- the slides that show up on the home page -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade index" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>


        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/img10.jpg" class="bd-placeholder-img-lg d-block w-100 home-img img-fluid" color="#555" background="#777" text="First slide" />
                <div class="carousel-caption d-none d-md-block ">
                    <h3>Let us Guide You To A New Home</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/img12-1.jpg" class="bd-placeholder-img-lg d-block w-100 home-img img-fluid" color="#444" background="#666" text="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Cozy Homes Because You And Your Family Are Worth It</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/img9.jpg" class="bd-placeholder-img-lg d-block w-100 home-img img-fluid" color="#333" background="#555" text="Third slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Click Or Call We Do It All!</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/adam-winger.jpg" class="bd-placeholder-img-lg d-block w-100 home-img img-fluid" color="#333" background="#555" text="Fourth slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Click Or Call We Do It All!</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/stephen-zoo.jpg" class="bd-placeholder-img-lg d-block w-100 home-img img-fluid" color="#333" background="#555" text="Fifth slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Click Or Call We Do It All!</h3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- products, or atleast for the future -->
    <div class="container top ">

        <p style="font-weight: bold;">FEATURED HOUSES</p>
        <div class="row card0">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM products ORDER BY 'houseS' LIMIT 3; ");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4">


                    <div>
                        <div>
                            <a href="product.php?id=<?php echo $row['id']; ?>">
                                <div class="card  p-3 mb-4 card-back rounded">

                                    <img src="images/<?php echo $row['images']; ?> " card-img class="rounded img-fluid" />

                                    <div class="content">
                                        <div>
                                            <p>
                                            <h5><?php echo $row['location']; ?> </h5>
                                            <h5 class="price"><?php echo "$" . $row['buy']; ?> </h5>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            <?php } ?>
        </div>

        <BR>
        <div>
            <p style=" font-weight: bold;">FEATURED APARTMENTS</p>
            <div class="row card0">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM products WHERE type = 'apartment'; ");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-md-4">


                        <div>
                            <div>
                                <a href="product.php?id=<?php echo $row['id']; ?>">
                                    <div class="card  p-3 mb-4 card-back rounded">

                                        <img src="images/<?php echo $row['images']; ?> " card-img class="rounded img-fluid" />

                                        <div class="content">
                                            <div>
                                                <p>
                                                <h5><?php echo $row['location']; ?> </h5>
                                                <h5 class="price"><?php echo "$" . $row['buy']; ?> </h5>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>





</body>
<?php include 'include/footer.php'; ?>

<?php include 'include/scripts.php'; ?>



</html>