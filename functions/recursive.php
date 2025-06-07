<?php

//Recursion in PHP (or any programming language) is when a function calls itself in order to solve a smaller part of a problem — usually until it reaches a base case that stops the recursion.

//At first recursion keeps digging down to find the stopping point (the base case like condition)
// It pauses at each step, waiting for the result from the next one
//Once the base is reached it returns and starts multiplying on the way back up
//The 

//Factorial example

function factorial(int $n): int{
    echo "$n\n";
    if($n === 0 || $n === 1){
        return 1;
    }
    return $n * factorial($n - 1);
}

var_dump(factorial(5));

//Fibonacci Sequence example

function fibonacci(int $num): int{
    if($num === 0) return 0;
    if($num === 1) return 1;
    return fibonacci($num - 1) + fibonacci($num - 2);
}

for($i = 0; $i < 10; $i++){
    echo fibonacci($i)." ";
}