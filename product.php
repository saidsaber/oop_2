<?php
class product{
    public $name;
    public $price ;
    public $discription;
    protected $image;

    public function __construct($name, $price, $discription , $image){
        $this->name = $name;
        $this->price = $price;
        $this->discription = $discription;
        $this->image = $image;
    }

    public function uploadImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

    public function calcPrice(){
        return $this->price;
    }
}

    // $pro = new product("test" , 999 , "test" , "test");
    // echo $pro->calcPrice();