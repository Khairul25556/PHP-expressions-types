<?php

// class MathUtils{
//     public static float $pi = 3.1416;
//     public static function square(float $num): float{
//         return $num * $num;
//     }

// }

// var_dump(
//     MathUtils::$pi,
//     MathUtils::square(22)
// );

//Another Example
//this not possible because its private. so we can do another way by using static

// class Connection{
//     private function __construct(){}
// }

// $connection = new Connection();

//This is an example of the Singleton Design Pattern in PHP. It ensures that only one object of the class can ever exist at a time.
class Connection{
    private static $instance = null; //static → Belongs to the class, not to objects.
    private function __construct(){}

    public static function singleton(){
        if(null === Connection::$instance){
            Connection::$instance = new Connection();
        }
        return Connection::$instance;
    }
}

$connection = Connection::singleton();

// $connection = new Connection();

//Another Example

class Admin{
    private static $instance = null; //$instance remembers the one and only object. 

    private static $name = "Ghost";
    private static $pass = 12324;

    private function __construct(){} //No one can create an object from outside the class. I am  blocking new object creation directly. make sure only one object will be created

    public static function getInstance(){ //if no admin exists yet, I will create one. If already exists, I will return the same one.
        if(self::$instance === null){ //self" means this class's own $name (like $this -> name)
            self::$instance = new Admin(); //object created
        } 
        return self::$instance;
    }

    public function logIn(){
        if("Ghost" === Admin::$name && 12324 === Admin::$pass){
            return "Admin is logged in";
        } 

        return "Log in failed! Try Again";
    }
}

$admin = Admin::getInstance(); //I am getting the singleton object
// $admin2 = Admin::getInstance();
// if($admin1 === $admin2){
//     echo "Both are same";
// } else {
//     echo "They are not same";
// }

echo $admin -> logIn(); // Calls the logIn function, prints result


//Another example

class Server{
    private static $instance = null;

    private static $ip = "192.178.60";

    private function __construct(){}

    public static function getInstance(){
        if(self::$ip === null){
            self::$ip = new Server();
        }

        return self::$ip;
    }

    public static function connection(){
        if(self::$ip === "192.178.60"){
            return "\nServer is connected!";
        } 
        return "\nServber lost connection!";
    }
}

$connection = Server::connection();

echo $connection;

//Another example
class PowerPlant{
    private static $instance = null;
    private function __construct(){}

    private static $boiler = "Start";
    private static $cooler = "Run";
    private static $transformer = "on";

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new PowerPlant();
        }

        return self::$instance;
    }

    public static function start(){
        if(self::$boiler === "Start" && self::$cooler === "Run"){
            return "Boiler in running. ";
        } 
        return "Failed to run the boiler!. ";
    }

    public static function TS(){
        $power = 220;
        $current = 100;
        if(self::$transformer === "on"){
            return "{$power}-{$current} Transformer is connected. ";
        } 
        return "{$power}-{$current} failed to run. The whole power plant is shutting down!";
    }
}

$powerplant_init = PowerPlant::start();
$powerplant_push = PowerPlant::TS();

echo $powerplant_init;
echo $powerplant_push;