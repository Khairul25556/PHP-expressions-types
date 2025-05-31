<?php

declare(strict_types=1); //To verify data_types everywhere 
function add(int $num1, int $num2): int{
    return $num1 + $num2;
}

echo add(10, 30);
