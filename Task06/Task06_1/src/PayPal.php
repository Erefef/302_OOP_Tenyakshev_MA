<?php

namespace App;

class PayPal
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function transfer($email, $amount)
    {
        return "Paypal Success!";
    }

    public function __get($property)
    {
        return $this->$property;
    }
}
