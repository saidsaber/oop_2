<?php
include "product.php";
class babycar extends product{
    public $age;
    public $weight;
    public array $materials;
    public $specialTax = .11;

    public function __construct( $materials){
        array_push($this->materials, $materials);
    }
    public function setMaterial( $materials){
        array_push($this->materials, $materials);
    }

    function getFinalPrice(){
        $this->price += $this->price * $this->specialTax;
    }
}