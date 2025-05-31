<?php

$arr = [
    "pc" => 30,
    "laptop" => 20,
    "table" => 50
];

$totalQuantity = 0;
foreach($arr as $items=>$quantity){
    echo "$items: $quantity\n";
    $totalQuantity += $quantity;
}

echo "The total quantity of items are: $totalQuantity";