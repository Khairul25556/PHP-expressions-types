<?php

$str = "The quick brown fox";

//find and replace
var_dump(str_replace("quick", "lazy", $str));

//posiion check
$pos = strpos($str, "quick");
var_dump($pos);

//Proper way to search without replacing
preg_match_all('/\w{5}/', $str, $matches); 
//This line is using Regular Expressions (regex) to find all 5-letter words in the string $str.
//   /.../Delimiters (standard in regex)
// \w	Matches any word character (letters, numbers, and underscores)
//{5}	Matches exactly 5 word characters in a row
var_dump($matches);

//Another example

$str2 = "Walter White is pure evil";

//search and replace
var_dump(str_replace("Walter White", "Jesse Pinkman", $str2));

//position searching
$pos2 = strpos($str2, "pure evil");
var_dump($pos2);

preg_match_all('/[A-Z][a-z]+\s[A-Z][a-z]+/', $str2, $matches2);

var_dump($matches2);

