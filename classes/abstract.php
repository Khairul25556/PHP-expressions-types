<?php

//Abstract class = common logic(shared) + force child to complete some parts.
//Interface = only force structure, no logic allowed.

//Here’s the quick rule:
//Abstract classes cannot be used directly.
//You must create a child class that extends the abstract class.
//Only the child class can create an object

//BASE INTERFACE (structure only, no logic)
interface PaymentProcessor{
    public function processPayment(float $amount): bool;
    public function refundPayment(float $amount): bool;
}

//BASE ABSTRACT CLASS (shared logic + forces child to complete some parts)
abstract class OnlinePaymentProcessor implements PaymentProcessor{
    public function __construct( //🟡 BASE
        protected string $apikey //protected - accessible is base and child classes (abstract and extends)
    ){}

    //Forces child classes to create their own API key validation logic.
    //every child class MUST have its own API key validation logic or whatever logic we define.
    abstract protected function validateApiKey(): bool; //🟡 BASE (MUST be completed by child)
    abstract protected function executePayment(float $amount): bool;
    abstract protected function executeRefund(float $amount): bool;

    //want some logic for interfaces. we need to implements those methods
    // Shared logic for all children
    public function processPayment(float $amount): bool{
        if(!$this -> validateApiKey()){
            throw new Exception("Invalid API key"); //Immediately stop further code execution if the API key is invalid.
        }
        return $this->executePayment($amount);
    }

    public function refundPayment(float $amount): bool{
        if(!$this->validateApiKey()){
            throw new Exception("Invalid API key");
        }
        return $this->executeRefund($amount);
    }
}

//concrete class - that means it implements all the interface and abstract method. By extending the online payment processor it actually also implements that interface. So this is all inherited
//CHILD CLASS (concrete, fully working class)
class StripeProcessor extends OnlinePaymentProcessor{ // 🟢 CHILD
    protected function validateApiKey(): bool{
        return strpos($this->apikey, 'sk_')===0; //strpos menas string position. api key 'sk' position is 0 then it would be true. so like abc_sk_123. here sk position 4. so 4 != 0
    }
} //so apiKey can be accessible

//CHILD CLASS (concrete, fully working class)
class PayPalProcessor extends OnlinePaymentProcessor{ // 🟢 CHILD
    protected function validateApiKey(): bool{
        return strlen($this->apikey) === 32;
    }
} //so apiKey can be accessible

//directly implements the interface and does not need to extends
class CashPaymentProcessor implements PaymentProcessor{
    public function processPayment(float $amount): bool{
        echo "Cash payment...";
        return true;
    }
    public function refundPayment(float $amount): bool{
        echo "Cash refund...";
        return true;
    }
}

// Creating an object from the CHILD class
$processor = new StripeProcessor("sk_"); //🟢 CHILD OBJECT //we can not create objects from abstract classes. so that we have to use child object
var_dump($processor -> processPayment(500)); // Runs processPayment from base, uses validateApiKey from child
var_dump($processor -> refundPayment(1000)); //refund 1000 but first need to validate API KEY

$processor = new PayPalProcessor("12345678901234567890123456789012");
var_dump($processor -> processPayment(500)); //paying 500 but first need to validate API KEY 
var_dump($processor -> refundPayment(1000)); //refund 1000 but first need to validate API KEY




