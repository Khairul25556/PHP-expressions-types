<?php

//A class is like a blueprint for creating objects (for example, a person with a name and age).

//The class Person can store a name and age.
//The introduce() method can introduce the person using their name and age.
class Person{
    // public string $name; //public means this property can be accessed from anywhere.
    // public int $age;

    //A constructor is a special function inside a class that automatically runs when you create an object.
    public function __construct(public string $name, public int $age){
    //     $this->name = $name;
    //     $this->age = $age;
    }

    public function introduce(): string{ //$this means "this current object" inside the class.
        return "Hi, I'm {$this -> name} and I'm {$this -> age} years old.\n"; //-> means access the method or property inside the object.
    }
}   

//The constructor runs first when you create the object with new Person("Khairul", 25).
//After that, the echo works to print the result from the introduce() method.

$person = new Person("Khairul", 25);
echo $person -> introduce();
$person = new Person("Rick", 100);
echo $person -> introduce();


//Another example
class Products{
    public function __construct(public string $productName, public int $price){}
    
    public function details() {
        return "This {$this -> productName} price is {$this -> price}.\n"; //this → refers to the current object you created.
    }
}

$info = new Products("MSI Monitor 22", 30000);
echo $info -> details();
$info = new Products("HP Wireless Mouse", 2200);
echo $info -> details();


//Another example

class Sub{
    public function __construct(public string $subName, public string $subRequirement, public string $results){}

    public function studentSub(){
        return "The requirement of {$this -> subName} are ({$this -> subRequirement}) and student must be get {$this -> results} on the final exam.\n"; //this → refers to the current object you created.
    }
}

$studentInfo = new Sub("EEE", "Basic knowledge of Electronices, and power", "A");
echo $studentInfo -> studentSub();


