<?php

$str = "Hello!,World";

//echo $str[0];
//echo $str[-1];

//echo substr($str, 0, 6); //From index 0, take 6 characters
//echo substr($str, 5); //From index 5, go till the end

//echo strtoupper($str);
//echo strtolower($str);

//echo ucfirst(strtolower($str));

$greeting = "Hello, " . "World";
$greeting .= "How are you?"; //This is a shorthand for: $greeting = $greeting . "How are you?";

echo $greeting;
