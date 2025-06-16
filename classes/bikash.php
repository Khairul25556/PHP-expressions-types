<?php

class bikashAcnt {

    private float $balance = 2000;

    function getBalance(){
        sleep(1);
        return "You have {$this -> balance} Tk on your bikash account.\n";
    }

    function cashIn(float $money){
        if($money > 0){
            sleep(1);
            $this -> balance += $money;
            return "{$money} Tk Added successfully to your bikash acoount.\nNow your total balance is {$this -> balance}.\n";
        } else{
            return "Invalid money entered!\n";
        }
    }

    function cashOut($money){
        if($this -> balance > $money && $money > 0){
            sleep(1);
            $this -> balance -= $money;
            return "{$money}tk cash out successfully.\n" . "Remaining balance {$this -> balance}.";
        } else{
            return "Invalid money entered!\n";
        }
    }
}

$account = new bikashAcnt;

echo $account -> getBalance();
echo $account -> cashIn(6000);
echo $account -> cashOut(600);