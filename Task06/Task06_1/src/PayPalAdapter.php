<?php

namespace App;

class PayPalAdapter implements PaymentAdapterInterface
{
    private $paypal;

    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function collectMoney($amount): bool
    {
        return $this->paypal->transfer($this->paypal->email, $amount);
    }

    public function __get($property)
    {
        return $this->$property;
    }
}
