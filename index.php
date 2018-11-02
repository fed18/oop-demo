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
// Vi kan skapa två helt olika miniräknare som 
// håller sitt egna tillstånd 'total'
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
    /**
     * Istället för att kalla enbart på $pdo så måste vi kalla
     * på $this->pdo för att komma åt databasuppkopplingen
     * databasuppkopplingen blir injecerad när vi skapar vår cart
     * $cart = new Cart($pdo);
     */
    $statement = $this->pdo->prepare("SELECT * FROM cart");
    $statement->execute();
    $all_products_in_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
    /**
     * $all_products_in_cart är inte tillgängligt utanför
     * denna funktion, för att kunna använda arrayen
     * som vi får tillbaka från databasen måste vi returnera
     * array från funktionen.
     */
    return $all_products_in_cart;
  }

  /**
   * add() tar in en produkt som ett argument på samma sätt
   * som när vi använder $_POST-variablen. Vi behöver inte
   * returnera något från denna funktion då den enbart
   * ska skicka in data i databasen
   */
  function add($product)
  {
    $statement = $this->pdo->prepare("INSERT INTO cart (title) VALUES (:title)");
    $statement->execute([":title" => $product["title"]]);
  }
}

/**
 * För att använda `fetchAll` samt `add` måste vi först
 * skapa en cart. För att kunna använda $pdo måste vi skicka
 * med $pdo variablen in som ett argument till new Cart()
 */
$cart = new Cart($pdo);
var_dump($cart->fetchAll());

$cart->add(["title" => "New Product"]);