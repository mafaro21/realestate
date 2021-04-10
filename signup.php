<?php include 'include/header.php'; ?>

<body style="background-image: url('images/img13.jpg');">
    <?php include 'include/navbar.php'; ?>
    <div class="text container  form">
        <br />
        <br />

        <div class="width login container border border-primary p-3">

            <h1>
                <p>Create a New Account</p>
            </h1>
            <br>

            <!--sign up form-->
            <form action="function/signTest.php" method="POST" class="sign">
                <div class="form-row form-group col-xs-4">
                    <div class="col">
                        <input type="text" class="form form-control mr-sm-2 field" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form form-control mr-sm-2 field" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <input type="email" class="form form-control mr-sm-2 field" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form form-control mr-sm-2 field" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form form-control mr-sm-2 field" name="repassword" placeholder="Re-Enter Password" required>
                </div>
                <br />


                <div>
                    <input type="submit" value="Sign Up" class="btn btn-outline-primary " name="signup"><i class="fa fa-pencil"></i>
                </div>

                <br />

                <p class="text"><a href="login.php">Already have an account?</a></p>

            </form>
        </div>





    </div>


</body>


<?php include 'include/scripts.php'; ?>