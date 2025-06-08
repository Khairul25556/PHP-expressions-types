<?php

//Without using reference

$largeArray = range(1, 1_000_000);
$startTime = microtime(true);
$startMemory = memory_get_usage();

$arrayOut = [];
foreach($largeArray as $value){
    $arrayOut[] = $value * 2;
}

$endTime = microtime(true);
$endMemory = memory_get_usage();

echo "Time: " . ($endTime - $startTime) . "seconds\n";
echo "Memory: " . round(($endMemory - $startMemory)/1024/1024) . "MB\n";

//Using reference

$largeArray1 = range(1, 1_000_000);
$startTime1 = microtime(true);
$startMemory1 = memory_get_usage();

foreach($largeArray1 as &$value){
    $value = $value * 2;
}

$endTime1 = microtime(true);
$endMemory1 = memory_get_usage();

echo "Time: " . ($endTime1 - $startTime1) . "seconds\n";
echo "Memory: " . round(($endMemory1 - $startMemory1)/1024/1024) . "MB";
