<?php

//Step 1: Create the Class Structure (Nothing Runs Yet)
//Step 2: Create an Object (This is Where Execution Starts!)
//Step 3: Call the Method

//1. Define class 
//2. Run new Laptop() → constructor runs 
//3. Call details() → string is created 
//4. Echo → string is printed 

class Laptop{
    public function __construct(public string $laptopName, public int $price){}
    
    public function details(){
        return "The {$this -> laptopName} price is: {$this -> price} BDT. \n";
    }
}

$laptop = new Laptop("MSI Gaming", 80000);
echo $laptop -> details();

//Now inheritance process
class Gpu extends Laptop{
    public function __construct(public string $laptopName, public int $price, public string $gpuName){}

    public function details(){
        return parent::details() . "This {$this -> gpuName} gpu is better than any other gpus." . "\n";
    }
}


$gpu = new Gpu("HP Laptop", 70000, "NVDIA MX 130 2GB");
echo $gpu -> details();

//Step 1: Create an Array of Objects
$allProducts = [
    new Laptop("Acer pro max", 60000),
    new Gpu("Asus TUF", 120000, "NVIDIA RTX 4070")
];

//Step 3: Function Call and Echo
function details(Laptop $laptop){
    echo $laptop -> details();
}

//Step 2: Loop Through the Array
foreach($allProducts as $products){
    details($products);
}


