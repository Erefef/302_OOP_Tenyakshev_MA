#!/usr/bin/env php
<?php

namespace App;

$autoloadPath = __DIR__ . '/../vendor/autoload.php';


if (file_exists($autoloadPath)) {
    require_once($autoloadPath);
}

function collectMoney(PaymentAdapterInterface $paymentSystem, $amount)
{
    if ($paymentSystem->collectMoney($amount)) {
        echo "Платеж {$amount} прошел\n";
    }
}

$paypal = new PayPal('customer@aol.com', 'password');
$cc = new CreditCard(1234567890123456, "09/22");

collectMoney(new PayPalAdapter($paypal), 100);
collectMoney(new CreditCardAdapter($cc), 200);
