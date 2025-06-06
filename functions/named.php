<?php 

function greet(string $name, string $greeting = "Hello", bool $shout = false): string{
    $message = "$greeting, $name";
    return $shout ? strtoupper($message) : $message;
};

//this is the normal way to call function but it's not a good practice
echo greet("Khairul") . "\n";
echo greet("Rick", "Hi") . "\n";
echo greet("Morty", "Hey" ,true) . "\n";

//so we need to call function like this. So that we can follow the sequence easily. 
echo greet(name: "Ghost", greeting: "Thanks", shout: true);
