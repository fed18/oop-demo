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

