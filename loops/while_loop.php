<?php

//Simple game
echo "The game is simple. You have to write without any space (YearDayMonth) of the dark night of the Bangladesh. Ex: '202530May'🏴\n";
$secret = "197126March";
$attempts = 0;
$maxAttempts = 5;
while($attempts < $maxAttempts){
    echo "Guess the secret key: ";
    $guess = trim(fgets(STDIN));
    $attempts++;
    if($guess == $secret){
        echo "Correct! You have unlocked the treasure!💎\n";
        break;
    } 

    elseif($guess == "1971"){
        echo "Bruh almost unlocked. Try hard! 🔒\n";
    }
    elseif($attempts == $maxAttempts){
        echo "\nShit Man! Out of luck! 😭";
    }
    else{
        echo "\nTry Agaian💀.Attempts Left: ", $maxAttempts-$attempts, "⚡\n";
    }
}