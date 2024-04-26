<?php

namespace App;

class CreditCardAdapter implements PaymentAdapterInterface
{
    private $creditCard;

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function collectMoney($amount): bool
    {
        return $this->creditCard->authorizeTransaction($amount);
    }

    public function __get($property)
    {
        return $this->$property;
    }
}
