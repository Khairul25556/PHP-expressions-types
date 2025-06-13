<?php

// What are Class Members?
//Class members include:
//Properties (also called Fields or Attributes)
//Methods (also called Functions inside a class)

//$this means "this current object" inside the class.
class BankAccount{
    //Private Only accessible inside the class. (You can’t directly access it from outside the class.)
    // This is a class member: Property
    private float $balance = 0;

    // This is a class member: Method
    public function getBalance(){
        return $this -> balance; //Access the balance property that belongs to this object.
    }

    // This is a class member: Method
    public function deposit(float $amount): void {
        if($amount > 0){
            $this -> balance += $amount;
        }
    }

    // This is a class member: Method
    public function withdraw(float $amount): bool{
        if($amount > 0 && $this -> balance >= $amount){
            $this -> balance -= $amount;
            return true;
        }
        return false;
    }
}


//Creates a new object (instance) of the BankAccount class.
//PHP reserves memory for this object.
//It gives the object its own private balance and its own copy of the methods.

$account = new BankAccount();
// echo $account -> balance = -400; //possible if the $balance is public
var_dump(
    $account -> deposit(1000),
    $account -> withdraw(500),
    $account -> getBalance()
);

