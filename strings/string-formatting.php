<?php

$name = "Khairul";
$age = 30;

printf("%s is %d years old.\n", $name, $age);

$csv = "apple,banana,orange"; //CSV = Comma-Separated Values;

$fruits = explode(",", $csv); //explode() function in PHP is used to split a string into an array
var_dump($fruits);
var_dump(implode(", ",$fruits)); //implode() function in PHP is used to split a array into an string
//print_r($fruits);

//Example of padding

$heredoc = <<<EDO
- "Hello" → your original string.
- 11 → the final length you want.
- '-' → the character you want to pad with (add around the string).
- STR_PAD_BOTH → add dashes on both sides (left and right).
- calculation:
    - "Hello" → 5 characters
    - You want total length = 11
    - So 11 - 5 = 6 → You need 6 padding characters
    - STR_PAD_BOTH → Pads evenly on both sides
→ 3 dashes left, 3 dashes right
EDO;

//padding
$padded = str_pad("Hello", 11, '-', STR_PAD_BOTH);
echo $padded . "\n";

//removing extra space or white space
var_dump(trim("    Hello!   "));