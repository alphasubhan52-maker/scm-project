<?php
require('config.php');
\Stripe\Stripe::setVerifySslCerts(false);
$token=$_POST['stripetoken'];
$data= \Stripe\Charge::create(array(
    "amount"=> "2000",
    "currency"=>"usd",
    "description"=> "Gold",
    "source"=>$token,
));
