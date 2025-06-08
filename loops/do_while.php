<?php

do{
    $diceRoll = rand(1, 6);
    echo "You rolled $diceRoll\n";
    if(6 == $diceRoll){
        echo "Congrates! You hit the jackpot. 🎉\n";
    } 
    echo "Roll Again? (y/n): ";
    $rollAgain = trim(fgets(STDIN));
} while('y' == $rollAgain);

//A do-while loop: this loop always runs at least once, and then repeats only if the condition ('y' == $rollAgain) is true.