<?php

//Abstract class = common logic + force child to complete some parts.
//Interface = only force structure, no logic allowed.

//PHP interface clasees: Any class that implements me must have these specific functions with these exact names and parameters. 
//interfaces define methods but never implement them
// It doesn't define how the functions work — it just says:
// You must have these functions.
// You must follow this structure.

//Example 1
interface PaymentProcessor{
    public function processPayment(float $amount): bool;
    public function refundPayment(float $amount): bool;
}

//implementing interface to write the exact logic
class BikashPayment implements PaymentProcessor{
    public function processPayment(float $amount): bool{
        echo "Processing payment of $amount through Bkash\n";
        return true;
    }

    public function refundPayment(float $amount): bool{
        echo "Processing refund of $amount through Bkash\n";
        return true;
    }
};

$payment = new BikashPayment();
var_dump($payment -> processPayment(500));
var_dump($payment -> refundPayment(400));


