<?php
include "product.php";
class babycar extends product{
    public $age;
    public $weight;
    public array $materials;
    public $specialTax = .11;

    public function __construct( $materials ,$name, $price, $discription , $image){
        parent::__construct($name, $price, $discription , $image);
        $this->materials[] = $materials;
    }
    public function setMaterial( $materials){
        array_push($this->materials, $materials);
    }

    function getFinalPrice(){
        return $this->price += $this->price * $this->specialTax;
    }

    function getAllData(){
        // return $this->calcPrice();
        $data[] = [
            "name" => $this->name,
            "price" => $this->price,
            "discription" => $this->discription,
            "image" => $this->getImage(),
            "babyCar" => [
                "age" => $this->age,
                "weight" => $this->weight,
                "materials" => $this->materials,
                "finalPrice" => $this->getFinalPrice(),
                "tax" => $this->specialTax
            ],
        ];
        return $data;
    }
}

$baby1 =new babycar("test" , "name" , 999 , "discription" , "babycar.png");

$baby1->setMaterial("test2");
$baby1->setMaterial("test3");
$baby1->setMaterial("test4");
$baby1->age = 20;
$baby1->weight = 3;



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربة أطفال - تفاصيل المنتج</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .product-image {
            text-align: center;
            margin: 20px 0;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .product-info {
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
            color: #2c3e50;
        }
        .info-value {
            flex: 1;
        }
        .price {
            font-size: 24px;
            color: #e74c3c;
            text-align: center;
            margin: 20px 0;
        }
        .original-price {
            text-decoration: line-through;
            color: #95a5a6;
            margin-left: 10px;
            font-size: 16px;
        }
        .materials {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .material {
            background: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }
        .tax-badge {
            background: #27ae60;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 14px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php
        foreach($baby1->getAllData() as $baby1){
    ?>
    
    <div class="container">
        <h1><?= $baby1["name"]?></h1>
        
        <div class="product-image">
            <img width="800" src="<?= $baby1["image"]?>" alt="عربة أطفال فاخرة">
        </div>
        
        <div class="price">
            السعر: <?= $baby1["babyCar"]["finalPrice"]?>.00 جنيه
            <span class="original-price"><?= $baby1["price"]?>.00 جنيه</span>
            <span class="tax-badge">+<?= 100*$baby1["babyCar"]["tax"]?>% ضريبة</span>
        </div>
        
        <div class="product-info">
            <div class="info-row">
                <div class="info-label">الوصف:</div>
                <div class="info-value"><?= $baby1["discription"]?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">العمر :</div>
                <div class="info-value">  <?= $baby1["babyCar"]["age"]?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">الوزن:</div>
                <div class="info-value"><?= $baby1["babyCar"]["weight"]?> كجم</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">المواد:</div>
                <div class="info-value materials">
                    <?php
                    
                    foreach($baby1["babyCar"]["materials"] as $material){
                        echo "<span class='material'>$material</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>