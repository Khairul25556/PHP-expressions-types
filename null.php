<?php

$abc = null;
$db = $abc ?? "default"; //If $abc is null or not set, then assign "default" to $db.
var_dump(
    null == null,
    null == false,
    null == 0,
    null == '',
    null == [],
    $abc,
    isset($abc), //Returns **true** if $abc exists and is not null.
    is_null($abc),
    $db,
    empty([]) //is null or not
);

function greet(?string $name){ // '?string' is called a nullable type declaration.
    echo "Hello " . ($name ?? "Stranger") . "!\n"; 
}

greet("Rick");
greet(null);

var_dump(
    array_filter([1, null, "", [], 3]) //By default, array_filter() removes all "falsey" values from the array 
);