<?php
/**
 * En mall för hur en miniräknare ska se ut
 * Stor bokstav i början på en klass
 * Klassen gör ingenting förens vi skapar en miniräknare
 */
class Calculator
{

  // Public property / publik egenskap
  // Använd public/private/protected
  public $total = 0;
  public $model = "";
  
  function __construct($model)
  {
    $this->model = $model;
  }

	function add($number){
    /**
     * $this används för att komma åt värden
     * inuti själva klassen
     * dollartecken ligger på this och inte
     * på själva variabelnamnet
     * Ta in ett argument och lagra detta
     * i objektets 'total'
     */
	   $this->total = $this->total + $number;
  }
  
	function subtract($number) {
	    $this->total = $this->total - $number;
  }
  
	function divide($number) {
	    $this->total = $this->total / $number;
  }
  
	function multiply($number) {
	    $this->total = $this->total * $number;
  }
}
// Mellan paranteserna ska det som ska till
// __construct skickas
$calculator = new Calculator("TI-82");
$calculator->add(5);
$calculator->subtract(10);
var_dump($calculator);

$second_calculator = new Calculator("TI-85");
$second_calculator->add(10);
var_dump($second_calculator);


// Det är såhär jag använder klasser för det mesta
$pdo = new PDO(
  "mysql:host=localhost;dbname=fed18;charset=utf8",
  "root",
  "root"
);

// Skapa en klass som anropar databasen
// och hämtar data via PDO
class Cart
{
  public $pdo;
  //! DEPENDENCY INJECTION
  function __construct($pdo)
  {
    $this->pdo = $pdo;
  }
  // Varje gång du är inuti en funktion
  // så måste ett värde retureras om du
  // vill använda det i framtiden
  function fetchAll()
  {
    $statement = $this->pdo->prepare("SELECT * FROM animals");
    $statement->execute();
    $all_products_in_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $all_products_in_cart;
  }

  function add($product)
  {
    $statement = $this->pdo->prepare("INSERT INTO cart (title) VALUES (:title)");
    $statement->execute([":title" => $product["title"]]);
  }
}

$cart = new Cart($pdo);
var_dump($cart->fetchAll());

$cart->add(["title" => "New Product"]);