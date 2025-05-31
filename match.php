<?php

//'match' statement is strict compariosn like ===
$status = 700;

$message = match($status){
    200, 300 => "Success",
    400, 404, 500 => "Error",
    default => "Unknown Status"
};

echo "$message";