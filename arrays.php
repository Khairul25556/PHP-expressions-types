<?php

$simpleArray = [1, 2, 3, 4, 5]; //Auto numeric (0, 1, 2…) keys

$associativeArray = [
    'name' => 'Rick',
    'age' => 30,
    'city' => 'New York'
];

//echo $simpleArray[0];
//echo $associativeArray['name']; //'name', 'age', 'city' custom string keys

//Adding element to simple array
$simpleArray[] = 6;
$associativeArray['country'] = 'USA'; 

//multiple arrays
$matrix = [
    [1, 2, 3],
    [4, 5, 6]
];

//echo $matrix[1][1];

//For simple array sorting
$fruits = ['apple', 'banana', 'orange', 'mango'];
var_dump(count($fruits)); //count() tells you how many items are in the array.

sort($fruits); //it sorts the array in ascending order
var_dump($fruits); 

rsort($fruits); //it sorts the array in decending order
var_dump($fruits);

//for associative Array sorting
var_dump($associativeArray);

asort($associativeArray); //array sort by value
var_dump($associativeArray);

ksort($associativeArray); //array sort by key
var_dump($associativeArray); 

//Array filter, array map, range
$numbers = range(1, 5);
var_dump($numbers);

//array filter, array map they will create new arrays
$squared = array_map(fn($n) => $n ** 2, $numbers);
var_dump($squared);

$evenNumbers = array_filter(
    $numbers,
    fn($n) => $n % 2 == 0
);

var_dump($evenNumbers);

$oddNumbers = array_filter(
    $numbers,
    fn($n) => $n % 2 != 0
);

var_dump($oddNumbers);

//Array reduce function //array_reduce(array, callback, initial_value);
$sum = array_reduce(
    $numbers,
    fn($carry, $n) => $carry + $n,
    0
);

var_dump($sum);

//Destructuring or Array unpacking
$moreNumbers = [0, ...$numbers, 6];
var_dump($moreNumbers);

//Another example
[$first, ,$second] = $fruits;
var_dump($first, $second);

//intersect and diff
$set1 = [1, 2, 3, 4, 5];
$set2 = [3, 4, 5, 6, 7];

var_dump(
    array_intersect($set1, $set2),
    array_intersect($set2, $set1),
    array_diff($set1, $set2),
    array_diff($set2, $set1)
);

//showing only keys and values 
$accessKeys = array_keys($associativeArray);
$keyModify = array_map(
    fn($key) => ucfirst($key), $accessKeys
);

$values = array_values($associativeArray);

var_dump($keyModify, $values);

var_dump(
    array_key_exists('name', $associativeArray), //key exists
    in_array('Rick', $associativeArray) //if value exist
);

//convert array to string
$fruitString = implode(', ',  $fruits);

//convert string to array
$backToArray = explode(', ', $fruitString);
var_dump($fruitString, $backToArray);

//merging array by using array_merge()
$mergeArray = array_merge($set1, $set2);
$mergeAssociated = array_merge($associativeArray, ['country' => 'Dhaka']); //overwrite 
var_dump(
    $mergeArray,
    $mergeAssociated
);

//mergin with union operator
$mergeArray1 = $set1 + $set2;
//$mergeAssociated1 = $associativeArray + ['country' => 'Rajshahi']; //union operator doesn't overwrite
$mergeAssociated1 = $associativeArray + ['place' => 'near Tangail'];
var_dump(
    $mergeArray1,
    $mergeAssociated1
);


//merging with spread operator
$mergeArray2 = [...$set1, ...$set2];
$mergeAssociated2 = [...$associativeArray, ...['place' => 'near Natore']]; //spread operator overwrite
var_dump(
    $mergeArray2,
    $mergeAssociated2
);

//slice of the array
var_dump(
    array_slice($set1, 1, 3) //1 is starting index and 3 is how many elements I want to see
);

//Search in an array
var_dump(
    array_search('banana', $fruits)
);
