<?php

//An enum is a special type in PHP (from PHP 8.1+) that lets you define a fixed set of constant values — like a list of options.
//Think of it like: “Here are the only allowed values this type can have.”

enum DaysOfWeek{
    case MONDAY;
    CASE TUESDAY;
    CASE WEDNESDAY;
    CASE THURSDAY;
    CASE FRIDAY;
    CASE SATURDAY;
    CASE SUNDAY;
}

$today = DaysOfWeek::SUNDAY;

if($today === DaysOfWeek::SUNDAY){
    echo "It is Sun\n";
}


//Another Example
enum Colour:string {
    case RED = '#FF0000';
    case GREEN = '#00FF00';
    case BLUE = '#0000FF';
}

echo Colour::RED->value;

//Another Example
function isWeekend(DaysOfWeek $day): bool{
    return $day === DaysOfWeek::FRIDAY || $day === DaysOfWeek::SATURDAY;
}
echo "\n";
echo isWeekend(DaysOfWeek::MONDAY) ? 'Weekend: YES' : 'Weekend: NO';


//simple array example to know the feature of Enum
$fruits = ['Mango', 'Orange'];

function isFruits(array $fruit){
    if (in_array('Orange', $fruit)){
        echo "\nOrange is so delicious\n";
    } else {
        echo "\nFuck the fruits\n";
    }
}

isFruits($fruits);

enum Foods: string{
    case item1 = "BBQ";
    case item2 = "Fish";
    case item3 = "Fruits";
    case item4 = "Vegetables";
    case item5 = "Biriyani";
}

echo "Welcome to the Bangla Khabar\n";

function selectItems(Foods $food): string{
    if($food === Foods::item1 || $food === Foods::item2){
        echo "Your $food->value price is 500 TK";
    } elseif($food === Foods::item3 || $food === Foods::item4){
        echo "Your $food->value price is 350 Tk";
    } elseif($food === Foods::item5){
        echo "Your $food->value price is 450 TK";
    } else{
        echo "Nothing is selected!";
    } 

    return $food->value;
}

selectItems(Foods::item1);
