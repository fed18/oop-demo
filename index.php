<?php

class Calculator
{

	public $total = 0;

	function add($number){
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