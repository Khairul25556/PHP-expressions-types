<?php
//Pure function - (Predictable, Testable, reusable)
//If a function is pure, then you can store (cache) its result and reuse it later, instead of running the function again.

//Pure functions
function add(int $num1, int $num2): int{
    return $num1 + $num2;
}

var_dump(add(2, 3), add(3,2));

//Unpure functions

$total = 0;

function addToTotal($value) {
    global $total;
    $total += $value;
    return $total;
}

var_dump(addToTotal(3), addToTotal(3));