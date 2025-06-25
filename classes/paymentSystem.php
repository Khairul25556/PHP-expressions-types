<?php

//interface
interface PaymentProcessor{
    public function processPayment(float $amount): bool;
    public function refundPayment(float $amount): bool;
}

//BASE ABSTRACT CLASS (shared logic + forces child to complete some parts)
abstract class OnlinePaymentProcessor implements PaymentProcessor{
    public function __construct(
        protected string $apikey
    ){}
    
    //If we dont use this(Abstract Method) programmes will run without any error but its basically for safety and strickness
    //Forces child classes to create their own logic.
    abstract protected function validateApikey():bool;
    abstract protected function executePayment(float $amount):bool;
    abstract protected function executeRefund(float $amount):bool;

    public function processPayment(float $amount): bool{
        if(!$this->validateApikey()){
            throw new Exception("Invalid API key");
        }
        return $this->executePayment($amount); //mathay
    }

    public function refundPayment(float $amount): bool{
        if(!$this->validateApikey()){
            throw new Exception("Invalid API key");
        }
        return $this->executeRefund($amount); //mathay
    }
}

//to run object in abstract class we need to use child classs

class BikashSystem extends OnlinePaymentProcessor{
    protected function validateApikey():bool{
        return strpos($this->apikey, 'bksh_')===0;
    }

    protected function executePayment(float | int $amount):bool{
        echo "Processing Bikash payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount):bool{
        echo "Processing Bikash refund of $amount\n";
        return true;
    }
}

class NagadSystem extends OnlinePaymentProcessor{
    protected function validateApikey(): bool{
        return $this->apikey[2] === 'N';
    }

    protected function executePayment(float | int $amount):bool{
        echo "Processing Nagad payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount):bool{
        echo "Processing Nagd refund of $amount\n";
        return true;
    }
}

class RocketSystem extends OnlinePaymentProcessor{
    protected function validateApikey(): bool{
        return $this->apikey === "Rocket_123098";
    }

    protected function executePayment(float | int $amount): bool{
        echo "processing Rocket payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount): bool{
        echo "Processing Rocket refund of $amount\n";
        return true;
    }
}

class CashSystem implements PaymentProcessor{
    public function processPayment(float $amount): bool{
        echo "Processing Cash payment $amount\n";
        return true;
    }
    public function refundPayment(float $amount): bool{
        echo "Processing Cash refund $amount\n";
        return true;
    }
}

//creating class which can work with any of the payment processors that we have
class OrderProcessor{
    public function __construct(private PaymentProcessor $paymentprocessor){}

    public function processOrder(float | int $amount, string | array $items): void{
        if(is_array($items)){
            $itemsList = implode(", ", $items);
        } else{
            $itemsList = $items;
        }

        echo "Processing order for items: $itemsList\n";

        if($this->paymentprocessor->processPayment($amount)){
            echo "Order processed successfully\n";
        } else {
            echo "Order processed failed!\n";
        }
    }

    public function refundOrder(float | int $amount): void{
        if($this->paymentprocessor->refundPayment($amount)){
            echo "Order refund sucessfull\n";
        } else {
            echo "Order refund failed\n";
        }
    }

}



$bikash = new BikashSystem("bksh_1223434");
$nagad = new NagadSystem("12Nagad_12123");
$rocket = new RocketSystem("Rocket_123098");
$cash = new CashSystem();

$bikashOrder = new OrderProcessor($bikash);
$nagadOrder = new OrderProcessor($nagad);
$rocketOrder = new OrderProcessor($rocket);
$cashOrder = new OrderProcessor($cash);

$bikashOrder->processOrder(350.56, ["Book", "7up", "Biscuit"]);
$nagadOrder->processOrder(3000, "Colmi V2 Smart Watch");
$rocketOrder->processOrder(50000, ["Intel Core - i5 1035G1 Processor", "Ram - 8GB", "Hard Disk- 500GB"]);
$cashOrder->processOrder(150.67, "Brush");

$bikashOrder->refundOrder(10);
$nagadOrder->refundOrder(100);
$rocketOrder->refundOrder(2000);
$cashOrder->refundOrder(50);


