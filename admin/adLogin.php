<?php include 'adHeader.php'; ?>

<body style="background-image: url('images/img6.jpg');">

    <?php include 'adNavbar.php'; ?>
    <div class="text container justify-content-center ">
        <br />
        <br />

        <div class="container width border border-primary login">


            <h1>
                <p class="accent">Admin Log in </p>
            </h1>
            <br>
            <!--log in form-->
            <form method="POST" action="" class="sign container">

                <div class="form-group">
                    <input type="text" class="form form-control mr-sm-2 field" name="name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form form-control mr-sm-2 field" name="password" placeholder="Password" required>
                </div>



                <div>
                    <button type="submit" class="btn btn-outline-primary" name="adLogin"><i class="fa fa-pencil"></i> Log In</button>
                </div>

                <br />

                <p class="text accent">Go back to user <a href="../signup.php">sign up</a> or <a href="../login.php">log in</a></p>
            </form>

        </div>
    </div>

</body>


<?php

if (isset($_POST['adLogin'])) {
    if ($_POST['name'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['name'] = 'admin';


        header("Location:../admin/admin.php?login=success");
        exit();
    } else {
        header("Location:adLogin.php?error=userdoesntexist.or.passwordincorrect");
        exit();
    }
}
