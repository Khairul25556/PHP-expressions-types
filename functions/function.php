<?php

function greet($name){
    return "Hello, $name!\n";
}

echo greet("Khairul");

function greetWithTime($name, $time = 'day'){
    return "Good $time, $name\n";
}

echo greetWithTime("Ghost");
echo greetWithTime("Morty", "Night");