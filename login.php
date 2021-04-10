<?php include 'include/header.php'; ?>

<body style="background-image: url('images/img2.jpg');">

    <?php include 'include/navbar.php'; ?>
    <div class="text container justify-content-center ">
        <br />
        <br />



        <div class="container width border border-primary login p-3">


            <h1>
                <p class="accent ">Log In</p>
            </h1>
            <br>
            <!--log in form-->
            <form method="POST" action="function/logTest.php" class="sign">

                <div class="form-group">
                    <input type="email" class="form form-control mr-sm-2 field" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form form-control mr-sm-2 field" name="password" placeholder="Password" required>
                </div>



                <div>
                    <button type="submit" class="btn btn-outline-primary" name="login"><i class="fa fa-pencil"></i> Log In</button>
                </div>

                <br />

                <p class="text"><a href="signup.php">Don't have an account ?</a></p>



                <p class="text"><a href="admin/adLogin.php">Log In as an Admin right here</a></p>


            </form>

        </div>
    </div>


</body>


<?php include 'include/scripts.php'; ?>