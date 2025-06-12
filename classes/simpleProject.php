<?php

class Books{
    public function __construct(public string $bookName, public string $author, public int $price){}
    public function info(){
        return "\nThis {$this -> bookName} book is written by {$this -> author}. The price of this book is {$this -> price} BDT.\n";
    }
}

$books = new Books("Devil's Hour", "Nilam Strong", 800);
echo $books -> info();

class Offer extends Books{
    public function __construct(public string $bookName, public string $author, public int $price, public int $offer){}

    public function info(){
        $discountPrice = $this -> price - ($this -> price * ($this -> offer)/100);
        return "\n" . parent::info() . "You got {$this -> offer}% offer for this book. This discount price is {$discountPrice} BDT.\n";
    }
}

$offerBooks = new Offer("Inside Job", "Netflix", 2500, 10);
echo $offerBooks -> info();

// Polymorphic function: can accept Books or Offer objects

//step1: Create an array of book objects 
$totalBooks = [
    new Books("Rick & Morty", "Rick Greyson", 600),
    new Offer("Death of Soul", "Morty Rival", 3600, 20),
    new Books("Shadow Hunter", "Lara Night", 900),
    new Offer("Mystery of Mind", "Jason Crick", 1500, 15),
    new Books("Silent Echo", "Anna Frost", 1200),
    new Offer("Dark Realm", "Victor Shade", 2000, 25),
    new Books("Whispered Secrets", "Emily Starr", 700)
];

//step3: Define a function that accepts a Books object (or subclass) and echoes its info
function info(Books $allBooks){
    echo $allBooks -> info();
}

//step2: Loop through the array and call info() for each object
foreach($totalBooks as $tBooks){
    info($tBooks);
}

