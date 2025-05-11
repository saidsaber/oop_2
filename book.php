<?php
include 'product.php';
class book extends product{
    private array $publishers;
    public string $writer ;
    public string $color;
    public string $supplier;

    public function __construct($name){
        array_push($this->publishers,$name);
    }

    public function setPublisher($name){
        array_push($this->publishers,$name);
    }

    public function showAllPublishers(){
        return $this->publishers;
    }

    public function choosePublisher($name){
        return array_rand($this->publishers,1);
    }
}