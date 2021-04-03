<?php include 'include/session.php';

require 'include/connect.php';
require_once 'config.php';

if (!$_SESSION['email']) {
    echo "<script>alert('You need to have an account to be able to make a purchase')</script>";
    header('Location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = '$id'; ";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $down = $row['down'];
    $email = $_SESSION['email'];
    $location = $row['location'];

    $k = "INSERT INTO payments (`email`, `location`, `down`) VALUES ('$email', '$location','$down')";


    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount'   => $down,
        'currency' => 'usd',
    ]);



    echo "<h1>Successfully charged $ $down!</h1>";
}
