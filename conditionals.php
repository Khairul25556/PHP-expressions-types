<?php

$score = 66;

if($score >= 80){
    echo "A+";
} 

elseif($score >= 70){
    echo "A";
}

elseif ($score >= 60){
    echo "B";
}
elseif($score >= 50){
    echo "C";
}

elseif ($score >= 40){
    echo "D";
}

else{
    echo "F";
}

//Even odd check

$num = -11;
if($num % 2 == 0){
    echo "\nThis is a even num\n";
} else {
    echo "\nThis is a odd num\n";
}

//Positive or neg even odd check

if($num > 0){
    if($num % 2 == 0){
        echo "\nPositive even numbers\n";
    } else{
        echo "\nPositive odd numbers\n";
    }
} else{
    if($num % 2 == 0){
        echo "Negative even numbers";
    } else{
        echo "Negative odd numbers";
    }
}


//username and pass 
$username = "admin";
$password = "Password123";

if($username == "admin" && $password == "Password123"){
    echo "\nSuccess";
} else{
    echo "\nFail";
} 
