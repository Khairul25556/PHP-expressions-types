<?php

function doubleValue(int &$number): int{
    $number *= 2;
    return $number;
}

$original = 5;
doubleValue($original);

var_dump($original); //We are passing $original global varibale . So we use &$number as a ref .Now it will show int(10)

//It's not a good practice