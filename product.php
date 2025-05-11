<?php
class product{
    public $name;
    public $price ;
    public $discription;
    private $image;

    public function uploadImage($image){
        $this->image = $image;
    }

    public function calcPrice(){
        return $this->price;
    }
}