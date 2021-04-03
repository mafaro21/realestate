<?php
require_once('vendor/autoload.php');

$stripe = [
    "secret_key"      => "sk_test_51HkjSSJ6y6buq2RF0rjZkKydDIPu1Q6F4Lx4SVGi0k1KAbDZCmmszvXtDS4PdqETRJwQfMLCqcDIDq5DGL7sJ1YU00ydAO1Ovj",
    "publishable_key" => "pk_test_51HkjSSJ6y6buq2RFdyPwdf8lN6BDYpC9Rn3D0AL3HkUjJ4bZiyIfkRx0INeRQ0VjeTzC7gPsucFhBP36qlCznNED00Wgovze4Q",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
