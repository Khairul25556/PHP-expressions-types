<?php

$basket = [
    "Apple" => 5,
    "Orange" => 10,
    "Banana" => 20
];

$totalItems = 0;
foreach($basket as $item => $quantity){
    echo "$item: $quantity\n";
    $totalItems += $quantity;
}

echo "The total items quantity are: $totalItems";