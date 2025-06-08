<?php

$mb_string = "凯鲁尔";
var_dump(mb_strlen($mb_string)); //the PHP extension that provides functions for handling multi-byte strings //strlen() counts bytes and mb_strlen() counts character

//URL
$url = "https://www.youtube.com/";
var_dump(urlencode($url)); //urlencode() in PHP converts a string into a safe format for URLs by replacing special characters with percent-encoded values.
var_dump(urldecode(urlencode($url)));

//html

$html = "<p>This is 'quoted' text & a <a href='#'>link</a></p>";
var_dump(htmlentities($html)); //htmlentities converts special characters in the string into HTML entities. So the HTML is shown as plain text in the browser — not executed.

$text = base64_encode("hello Rick!");

var_dump(base64_decode($text));
