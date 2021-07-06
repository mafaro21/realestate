<?php include 'include/header.php';
require_once 'config.php';
?>

<body>
    <?php include 'include/navbar.php' ?>
    <div class="mt-4">

        <?php

        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = '$id'; ";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <h2 class="text"><?php echo $row['location']; ?></h2>

            <div class="container to">
                <div class="product-content">
                    <div>
                        <img src="images/<?php echo $row['images']; ?> " class="product-img" />
                        <!-- width="700px" height="400px"-->
                    </div>
                    <div class="left to">
                        <p>
                        <h4> FOR SALE: $<?php echo $row['buy']; ?></h4>

                        <h4> FOR RENT: $<?php echo $row['rent']; ?>/mo</h4>

                        <h4> DOWNPAYMENT: $<?php echo $row['down']; ?></h4>
                        </p>
                        <p>
                        <h5>Description:</h5>

                        <?php echo $row['description']; ?>
                        </p>

                    </div>
                </div>
                <br>



                <div class="content">
                    <form method="POST" action="">
                        <button type="submit" name="cart" class="btn btn-primary btnlog">Add to Cart</button>
                    </form>

                    <div class="left">
                        <form action="pay.php?id=<?php echo $row['id']; ?>" method="post">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-description="Downpayment" data-amount="<?php echo $row['down']; ?>00" data-locale="auto"></script>
                        </form>
                    </div>

                    <!-- this was supposed to restrict a user who isn't logged in from purchasing  -->
                    <!-- <?php
                            $payid = $row['id'];
                            $payStripe = $stripe['publishable_key'];
                            $paydown = $row['down'];

                            if (isset($_SESSION['email'])) {
                                echo '
	        				<form action="pay.php?id=$payid" method="post">
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="$payStripe" data-description="Downpayment" data-amount="$paydown 00" data-locale="auto"></script>
                            </form> 

	        				';
                            } else {
                                echo '
	        					<h5>You need to <a href="login.php">Login</a> to checkout.</h5>
	        				';
                            }
                            ?> -->
                </div>

                <br>

                <?php
                $l = $row['location'];
                $k = "SELECT * FROM `agents` WHERE `location` LIKE '%$l%'; ";
                $q = mysqli_query($conn, $k);
                while ($d = mysqli_fetch_array($q)) {
                ?>

                    <p></p>IF YOU ARE INTERESTED YOU CAN CONTACT <a href="#"><?php echo $d['firstname'] . ' ' . $d['lastname']; ?></a> at <a href="#"><?php echo $d['contact']; ?></a></p>
                <?php } ?>
            </div>
        <?php } ?>
        <br>


        <div class="container">
            <!-- comment count -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT COUNT(*) AS count FROM comments WHERE prodId = '$id';";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <h3>
                    <?php echo $row['count'] ?> 
                    <?php echo $row['count'] == 1 ?  'Comment' :  'Comments' ;?>
                    <hr>
                </h3>

            <?php } ?>


            <!-- comment display -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM comments WHERE prodId = '$id'; ";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $test = $row['time'];

                $date = date("d-M-Y H:i", strtotime($test));
            ?>
                <div>
                    <div class="content">
                        <p><?php echo $row['email']; ?></p>
                        <br>
                        <p class="left comment-date"><?php echo $date ?></p>
                    </div>
                    <p><?php echo $row['comment']; ?></p>
                    <hr>
                </div>

            <?php } ?>

            <!-- user input for comments -->
            <?php
            if (isset($_SESSION['email'])) {
                echo "
                    <form action='' method='POST'>
                    <textarea rows='4' cols='10' class='form form-control mr-sm-2 field' name='comments' placeholder='Share Your Opinion' ></textarea>
                    <br>
                    <button type='submit' name='comment' class='btn btn-primary'>Post Comment</button>
                    </form>
                ";
            } else {
                echo "<a href='signup.php'><button class='btn btn-primary'>Sign up/Log in to post a comment</button></a>";
            }
            ?>
        </div>

    </div>
</body>
<?php include 'include/footer.php'; ?>

<!-- send comment to database -->
<?php
if (isset($_POST['comment'])) {


    $comments = $_POST['comments'];
    $email = $_SESSION['email'];
    $id = $_GET['id'];

    $sql = "INSERT INTO comments (`prodId`,`email`, `comment`, `time` ) VALUES ('$id', '$email', '$comments', CURRENT_TIMESTAMP())";


    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Your Comment Has Been Sent!");</script>';
        echo "<meta http-equiv='refresh' content='0'>"; //refresh page once
        exit();
    } else {
        echo "we have a problem" . mysqli_connect_error();
    }
}
?>

<!-- add item to cart -->
<?php
if (isset($_POST['cart'])) {

    $email = $_SESSION['email'];
    $id = $_GET['id'];

    $k = "SELECT * FROM cart WHERE email = '$email' && prodId = '$id';";
    $result = mysqli_query($conn, $k);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        echo "<script>window.alert('Property Is Already In Cart');</script>";
        echo "<script>window.open('product.php?id=$id','_self');</script>";
        exit();
    } else {

        $sql = "INSERT INTO `cart` (`email`,`prodId`) VALUES ('$email','$id')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Property Added To Cart!");</script>';
            echo "<script>window.open('product.php?id=$id','_self');</script>";

            exit();
        } else {
            echo "we have a problem" . mysqli_connect_error();
        }
    }
}
