<?php

//normal function //Return full array
function countdown(int $num){
    $random = [];
    for($i = $num; $i > 0; $i--){
        echo "Generating Numbers\n";
        $random[] = random_int(1, 100);
    }
    return $random;
}

$rand = countdown(5);

foreach($rand as $numbers){
    echo "Echoing number...\n";
    echo "$numbers\n";
}

echo "\n";

//generator function (Using this would be better for mrmory efficient and when we will work on a large data) 
//One value at a time

function countdown2(int $num): Generator{
    for($i = $num; $i > 0; $i--){
        echo "Generating Numbers\n";
        yield random_int(1, 100);
    }
}

$rand2 = countdown2(5);

foreach($rand2 as $numbers){
    echo "Echoing number...\n";
    echo "$numbers\n";
}