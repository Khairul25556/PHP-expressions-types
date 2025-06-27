<?php

//traits is just a simple way to add methods to classes
//traits don't necessarily have to be used with an interface

//This says: “Any class that uses me must have a method called log()
//it's like Hey, if you use this interface, I expect you to have a log() method.
interface Logger{
    public function log(string $message): void;
}

//A trait is a reusable block of code.
//It gives you a ready-made method (log() here) that any class can use.
//So you don’t have to write the same method in every class.

trait Loggable{
    public function log(string $message): void{
        echo "Logging: $message\n";
    }
}

//implements Logger: This means: “I will follow the Logger interface and provide a log() method.”
//use Loggable;: This means: “Take the log() method from the trait and include it here.”
class User implements Logger{
    use Loggable;
    public function __construct(public string $name){}

    //log() is intended to output or record a message.
    //You must define it — either inside the class, a parent class, or a trait.
    //If you don’t define it, you’ll get a fatal error.

    public function save(): void{
        $this->log("User {$this->name} saved"); //for recorded custome message
    }
}

$test = new User("Khairul");
$test->save();

//Example 2

interface PublicAccount{
    public function log(string $message): void;
}

trait AccountMethod{
    public function log(string $message): void{
        echo "Logging: $message";
    }
}

class User2 implements PublicAccount{
    use AccountMethod;
    public function __construct(public string $name){}

    public function save(): void{
    $this->log("user $this->name logged in\n");
    }
    

}

class Admin implements PublicAccount{
    use AccountMethod;

    public function __construct(public string $name, public string $password){}

    public function save(): void{
        if($this->password === "Admin4561"){
            $this->log("Admin $this->name logged in.\n");
        } else{
            echo "Access denied for $this->name!\n";
        }
    }
    
}

$test3 = new User2("Rex");
$test3->save();

$test4 = new Admin("Rick", "Admin4561");
$test4->save();