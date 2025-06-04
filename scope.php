<?php

//Global Scope
$superhero = "Superman";

function revealidentity(){
    global $superhero; //using global inside a function it's not a good practice. It could be dangerous
    $message = "real name is Clark Kent\n";
    $superhero = "Spiderman "; // I can change the global varibale from inside a function. So using global inside function is very inconvenient.
    echo "$superhero $message";
}

revealidentity();
echo "$superhero\n"; //now the $superhero changed to spiderman. so avoid this 

//Static Scope

function countVisitors(){
    static $visitorCounts = 0; //Static scope store previous data.
    $visitorCounts++;
    echo "Visitor #$visitorCounts has arrived!\n";
}

countVisitors();
countVisitors();
countVisitors();