<?php


class Person{
    public function __construct(public string $name, public int $age){}
    public function introduce(){
        return "Hi! I'm {$this -> name}. I'm {$this -> age} years old.\n";
    }
}

$person = new Person("Khairul", 23);
echo $person -> introduce();

//Now inheritance process

class Employee extends Person{
    public function __construct(
        public string $name,
        public int $age,
        public string $position
    ){}

    public function introduce(): string {
        return parent::introduce() ."I work as a {$this -> position}.";
    }
}

$employee = new Employee("Morty", 14, "Manager");
echo $employee -> introduce();

//Step 1: Create an Array of Objects
$people = [
    new Employee("Dexter", 60, "Killer"),
    new Person("Vader", 100)
];

//Step 3: Function Call and Echo
function introduce(Person $person){
    echo $person -> introduce() . "\n";
}

//Step 2: Loop Through the Array
foreach($people as $person){
    introduce($person);
}
