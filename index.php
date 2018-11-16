<?php

function pretty($data){
  highlight_string("<?php =\n" . var_export($data, true) . ";\n?>");
}

// $pdo = new PDO(
//   "mysql:host=localhost;dbname=fed18;charset=utf8",
//   "root",
//   "root"
// );

// $fetch_all_statement = $pdo->prepare("SELECT * FROM employees");
// $fetch_all_statement->execute();
// $all_employees = $fetch_all_statement->fetchAll(PDO::FETCH_ASSOC);


// class PDO{
//   // Class properties
//   public $connection;
//   public $username;
//   public $password;
//   // Belongs only to PDO, not '$pdo'
//   public static $FETCH_ASSOC; // :: used when static

//   // Class method
//   // Constructor runs when object is created
//   public function __construct($connection, $username, $password)
//   {
//     // Store parameters to the object $this
//     $this->connection = $connection;
//     $this->username = $username;
//     $this->password = $password;
//     return $connection;
//   }

//   // $pdo->prepare
//   public function prepare($sqlQuery)
//   {
//     return $statement;
//   }
// }

// class Statement 
// {
//   public function execute()
//   {

//   }

//   public function fetchAll()
//   {

//   }
// }



class Car {

  public $color = "red";
  public static $numberOfWheels = 4;

  public function __construct($color)
  {
    $this->color = $color;
  }

  public static function wroom(){
    echo "WROOM";
  }
}

// Access static property
pretty(Car::$numberOfWheels);
Car::wroom();

// // Access regular property
// $new_car = new Car("red");
// $new_car2 = new Car("green");
// // pretty($new_car->color);

// pretty($new_car->color);
// pretty($new_car2->color);



/**************************
 *  Lönehanteringssystem  *
 **************************/

class Employee
{
  public $salary;

  public function __construct($salary)
  {
    $this->salary = $salary;
  }

  public function work()
  {
    echo "Hard work work";
  }
}

// A contract for every class that uses it
interface FixStuff {
  public function doComputing();
}

class ITGuy extends Employee implements FixStuff
{
  public $adminComputerRights;
  
  public function __construct($salary){
      parent::__construct($salary);
      $this->salary = $salary;
      $this->adminComputerRights = true;
  }

  public function doComputing()
  {
    echo "Bleep bloop it's fixed";
  }
}

class Android implements FixStuff
{
  public function doComputing()
  {
    echo "Wahoop";
  }
}


$new_employee = new Employee(25000);
$new_ITGuy = new ITGuy(10000);

$new_ITGuy->work();
$android = new Android();
pretty($new_employee);
pretty($android);


interface CommonActions
{
  public function getAll();
  public function create();
}

class Posts implements CommonActions
{
  public function getAll(){

  }
  public function create(){

  }
}

define('SHOUT', 'HELLO!');

class Comments implements CommonActions
{
  const SHOUT = "HELLO!";
  private $pdo;
  // Everytime we want to call the database
  public function __construct($pdo){
    $this->pdo = $pdo;
  }

  public function getAll(){}
  public function create(){}
}


define('PI', 3.14);
echo PI;