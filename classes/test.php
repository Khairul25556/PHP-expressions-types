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

    protected function executePayment(float | int $amount): bool{
        echo "Processing Stripe payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount): bool{
        echo "processing stripe refund of $amount\n";
        return true;
    }
} //so apiKey can be accessible here 

//CHILD CLASS (concrete, fully working class)
class PayPalProcessor extends OnlinePaymentProcessor{ // 🟢 CHILD
    protected function validateApiKey(): bool{
        return strlen($this->apikey) === 32;
    }

    protected function executePayment(float | int $amount): bool{
        echo "Processing PayPal payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount): bool{
        echo "Processing Paypal refund of $amount\n";
        return true;
    }
} //so apiKey can be accessible

//This is a SIMPLE CLASS.
//directly implements the interface and does not need to  (Possible)
class CashPaymentProcessor implements PaymentProcessor{
    public function processPayment(float $amount): bool{
        echo "Cash payment...\n";
        return true;
    }
    public function refundPayment(float $amount): bool{
        echo "Cash refund...\n";
        return true;
    }
}

//passing an object by constructor is called 'composition'
//It accepts payment processor means It depends on PaymentProcessor
//(Handles any payment system)
//this means that the order processor can work with any of the payment processors that we have stripe, paypal, cash
class OrderProcessor{
    public function __construct(private PaymentProcessor $paymentProcessor){}

    public function processOrder(float | int $amount, string | array $items): void{
        if(is_array($items)){ //Is $items an array If yes → it goes inside the if block.If no → it goes to the else block.
            $itemsList = implode(', ', $items); //array to string
        } else {
            $itemsList = $items;
        }

    echo "Processing order for items: $itemsList\n";

        if($this->paymentProcessor->processPayment($amount)){
            echo "Order processed successfully\n";
        } else {
            echo "Order processing failed\n";  
        }
    }

    public function refundOrder(float | int $amount): void{
        if($this->paymentProcessor->refundPayment($amount)){
            echo "Order refunded successfully\n";
        } else {
            echo "Order refund failed\n";
        }
    }
}
//Create payment processors (Stripe, PayPal, Cash)
$stripeProcessor = new StripeProcessor("sk_test_123456"); //🟢 CHILD OBJECT //we can not create objects from abstract classes. so that we have to use child object
$paypalProcessor = new PayPalProcessor("a9f84b3c7e5d42a18f6c1b47e8d4f29b");
$cashProcessor = new CashPaymentProcessor();

//Inject the payment system into the order system
$stripeOrder = new OrderProcessor($stripeProcessor);
$paypalOrder = new OrderProcessor($paypalProcessor);
$cashOrder = new OrderProcessor($cashProcessor);

//Processing Orders
$stripeOrder->processOrder(100.00, "Book");
$paypalOrder->processOrder(150.00, ["Book", "Movie"]);
$cashOrder->processOrder(50.00, ["Apple", "Orange"]);

//Processing Orders
$stripeOrder->refundOrder(25.00);
$paypalOrder->refundOrder(50.00);
$cashOrder->refundOrder(10.00);




