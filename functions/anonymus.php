<?php

$greet = function ($name){
    return "Hello, $name\n";
};

echo $greet("Ghost");


//Another example
$numbers = [2,4,5];

$squared = array_map(function($num){ //array_map() is used to create a new array by applying a function to each element of an existing array.
    return $num * $num;
}, $numbers);

var_dump($numbers, $squared);

//Another example
$names = ["Rick", "Morty", "Beth"];
$info = array_map(function($name){
    return $name . " John";
}, $names);

echo implode(", ", $info);//conv array to string

//Another example
$message = "Bye";
$greet2 = function ($identity) use($message){
    return "\n$message, $identity";
};

echo $greet2("Yellowstone");

//Another example like previouse one but make some changes to the inside
$message = "Bye";
$greet2 = function ($identity) use(&$message){ //'&' is using for see the changes outside of the function that happened inside function
    $message = $message . "!";
    return "\n$message, $identity";
};

echo $greet2("Yellowstone");
echo "\n" . $message;

//Compare it to the normal function
//PHP functions do not have access to external variables by default (they have local scope).
$message2 = "Hi";
function greet3($nickName){
    global $message2; //So we need to use global.
    return "\n$message2, $nickName";
};

echo greet3("Soap");


