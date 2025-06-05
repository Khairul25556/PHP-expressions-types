<?php

declare(strict_types=1);

function processInput(int|float|string $input){
    return match (true) {
        is_int($input) => "Integer: ". $input * 2,
        is_float($input) => "Float: " . round($input, 2),
        is_string($input) => "String: ". strtoupper($input),
        default => "Unknown Types!"
    };
};

$inputs = [10, 20.54545, "Morty", 300, "Ghost", 100.454];

foreach($inputs as $input){
    echo processInput($input) ."\n";
};