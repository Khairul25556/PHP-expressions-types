<?php

$name = "John";
$client = &$name;
var_dump($name, $client);

$client = "Rick";
var_dump($name, $client);

$name = "Morty";
var_dump($name, $client);

//Warning⚠: Don't use it. Accidentally data can be modify. It's not a good choice to use references.