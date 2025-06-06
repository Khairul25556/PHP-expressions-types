<?php

$users = [
    ['id' => 1, 'name' => 'Rick', 'role' => 'admin'],
    ['id' => 2, 'name' => 'Morty', 'role' => 'user'],
    ['id' => 3, 'name' => 'Ghost', 'role' => 'user']
];

//$item is the current user (like ['name' => 'Rick', 'role' => 'admin'])
// $key and $value ('role' and 'admin') are coming from the parent function — and arrow functions automatically capture them 
function createFilter($key, $value){
    return fn($item) => $item[$key] === $value; //admin === admin "this is happening here"
}

$isAdmin = createFilter('role', 'admin');
$isMorty = createFilter('name', 'Morty');
$morty = array_filter($users, $isMorty);
$admins = array_filter($users, $isAdmin);
var_dump($admins, $morty);

//array_filter() loops through $users
//It applies the $isAdmin function to each user
//Keeps only users where it returns true

//Another Example


$info = [
    ['id' => '001', 'department' => 'EEE'],
    ['id' => '002', 'department' => 'ICE'],
    ['id' => '003', 'department' => 'CSE']
];

function createFilter2($key, $value){
    return fn($receieved) => $receieved[$key] === $value;
}

$isEEE = createFilter2('department', 'CSE');
$EEE = array_filter($info, $isEEE);

$isId = createFilter2('id', '001');
$id = array_filter($info, $isId); 
var_dump($EEE, $id);
