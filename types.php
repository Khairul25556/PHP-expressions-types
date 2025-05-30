<?php
$a = -7;
var_dump($a, true, $a == true);
echo "\n";


$num1 = "15";
$num2 = 10;
echo $sum = $num1 + $num2;
echo "\n";
var_dump($num1);
var_dump($num2);
echo $num1===$num2 ? "Int" : "Diff";

$arr = [10, 20, "30", (int)"40.01"];
$cal = $arr[0] + $arr[1] + $arr[2] + $arr[3];
echo "\n";
// var_dump($arr, $arr[0], $arr[1], $arr[2], $arr[3]);
// var_dump ($cal);
echo "The total cost is: $cal"; //Only works on double quotes