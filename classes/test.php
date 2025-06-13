<?php

class BankAccount{
    private float $balance = 0;

    public function getBalance(){
        return $this -> balance;
    }

    public function deposit(float $amount): void{
        if($amount > 0){
            $this -> balance += $amount;
        }
    }

    public function withdraw(float $amount){
        if($amount > 0 && $this -> balance >= $amount){
            $this -> balance -= $amount;
            return true;
        }
        return false;
    }
}

$account = new BankAccount();

var_dump(
    $account -> deposit(10000),
    $account -> withdraw(500),
    $account -> getBalance()
);