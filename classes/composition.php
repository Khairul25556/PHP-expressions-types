<?php

class FlyBehavior{
    public function fly(){
        echo "Flying....";
    }
}


class Bird {
    //passing an object by constructor is called 'composition'
    public function __construct(private ?FlyBehavior $flyBehavior){} 
    // '?FlyBehavior This variable can be either: a FlyBehavior object Or null
    
    public function tryToFly(){
        if($this->flyBehavior){
            $this->flyBehavior->fly();
        } else{
            echo "Can't fly.\n";
        }
    }
}

//fly behavior exist or not

$eagle = new Bird(new FlyBehavior());
$eagle->tryToFly();

echo "\n";

$penguin = new Bird(null);
$penguin->tryToFly();

//Another Example

class Gpus{
    public function __construct(private string $model){}

    public function game(){
        echo "Games will run on {$this->model} gpu at 100FPS\n";
    }

    public function getModel(){
        return $this->model;
    }
}

class PC{
    //passing an object by constructor is called 'composition'
    public function __construct(private ?Gpus $gpus){}

    public function tryToRun(){
        if($this->gpus && $this->gpus->getModel() === "RTX"){
            $this->gpus->game();
        } else{
            echo "Games wont run on {$this->gpus->getModel()} at 100FPS\n";
        }
    }
}

$rtx = new PC(new Gpus("RTX"));
$rtx->tryToRun();

$gtx = new PC(new Gpus("GTX"));
$gtx->tryToRun();

