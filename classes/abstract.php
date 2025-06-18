<?php

//Abstract class = common logic(shared) + force child to complete some parts.
//Interface = only force structure, no logic allowed.

//Here’s the quick rule:
//Abstract classes cannot be used directly.
//You must create a child class that extends the abstract class.
//Only the child class can create an object

interface PaymentProcessor{
    public function processPayment(float $amount): bool;
    public function refundPayment(float $amount): bool;
}

abstract class OnlinePaymentProcessor implements PaymentProcessor{
    public function __construct(
        protected string $apiKey //protected - accessible is base and child classes (abstract and extends)
    ){}

    //want some logic for interfaces. we need to implements those methods
    public function processPayment(float $amount): bool{

    }
    public function refundPayment(float $amount): bool{

    }
}

//concrete class - that means it implements all the interface and abstract method. By extending the online payment processor it actually also implements that interface. So this is all inherited

class StripeProcessor extends OnlinePaymentProcessor{} //so apiKey can be accessible
class PayPalProcessor extends OnlinePaymentProcessor{} //so apiKey can be accessible

$processor = new StripeProcessor("KEY_");
