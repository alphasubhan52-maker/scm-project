<?php
require_once "stripe/stripe-php-master/init.php";

$publishableKey = "pk_test_51QlZAxKHhmy7oK9pMopByZJCoxgRiaPry0KNKpuEilNZNKKUxxfyWdbg5UTQdPJR8nNSqvDPcgrp4qAepO4QBRzI00k3osEnl1";

$secretKey = getenv('STRIPE_SECRET_KEY');
// \Stripe\Stripe::setApiKey($secretKey);
