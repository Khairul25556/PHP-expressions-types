<?php
declare(strict_types=1);

function sum(int ...$numbers): int{
    var_dump($numbers);
    $sum = 0;
    foreach($numbers as $number){
        $sum += $number;
    }
    return $sum;
}

var_dump(sum());
var_dump(sum(10,20));
var_dump(sum(20, 30, 50));
//Destructuring
$num = [100, 300, 400];
var_dump(sum(...$num));

//Another examples

$num = [10, 20, 40];
function total(...$num){
    foreach($numb as $num){
        $sum = 0;
        $sum+=$num;
    }
    echo $sum;
}

//Another example
function introduceTeam(string $teamName, string ...$members): void{ //if we dont want to add a return 
    var_dump($members);
    echo "Team: ", $teamName;
    echo "Members: " . implode(", ", $members) . "\n"; //implode conv array to string
}

introduceTeam("A-Team ", "Rick", "Morty");

//Destructuring
$name = ["Khairul", "Rifat"];
introduceTeam("B-Team ", ...$name);

