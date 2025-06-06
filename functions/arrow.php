<?php

$numbers = [1, 2, 3, 4, 5];
$multiplier = 3;

//array_map(...) This function applies the given function to every element in the array. //array_map() is a built-in PHP function that takes: A function (this tells it what to do to each element).
$squared = array_map(function ($n) use ($multiplier){
    return $n * $multiplier;
}, $numbers);

//Now we are going to use arrow function 
//Arrow functions inherits varibale from the parent scope. So that we dont need to use 'use'
$squared2 = array_map(fn($n) => $n * $multiplier, $numbers);

var_dump($numbers, $squared, $squared2);