<?php

//switch-case is more like if else statement but slightly diff
$size = "L";

switch($size){
    case "S":
    case "M":
        echo "Small or medium size\n";
        break;
    case "L":
    case "XL":
        echo "Large or extra large size\n";
        break;
    default:
        echo "Unknown size\n";
}

//comparing switch case with if else 

if($size == "S" || $size == "M"){
    echo "Small or medium size";
} elseif($size == "L" || $size == "XL"){
    echo "Large or extra large size\n";
} else {
    echo "Unknown size\n";
}

//Why we use it? I think it's not good enough but it can be use on various situation like this one.

$badAttempts = 3;

switch($badAttempts){
    case 3:
        echo "You are blocked";
        break;
    default:
        echo "Bad attempts detected.";
}