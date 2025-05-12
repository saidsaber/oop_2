<?php
include 'product.php';
class book extends product
{
    private array $publishers;
    public string $writer;
    public string $color;
    public string $supplier;

    public function __construct($publisher_name, $name, $price, $discription, $image)
    {
        parent::__construct($name, $price, $discription, $image);
        $this->publishers[] = $publisher_name;
    }

    public function setPublisher($name)
    {
        array_push($this->publishers, $name);
    }

    public function showAllPublishers()
    {
        return $this->publishers;
    }

    public function choosePublisher()
    {
        return $this->publishers[array_rand($this->publishers, 1)];
    }

    function getAllData(){
        $data[] = [
            "name" => $this->name,
            "price" => $this->price,
            "discription" => $this->discription,
            "image" => $this->getImage(),
            "book" =>[
                "writer" => $this->writer,
                "color" => $this->color,
                "supplier" => $this->supplier,
                "publishers" => $this->showAllPublishers(),
                "selectedPublisher" => $this->choosePublisher()
            ]
        ];
        return $data;
    }
}

$book1 = new book("دار المعارف", "رواية 1984", 120, "رواية ديستوبية كلاسيكية تحذر من مخاطر الحكم الشمولي", "books.png");
$book1->setPublisher("دار الشروق");
$book1->setPublisher("المكتبة الحديثة");
$book1->writer = "جورج أورويل";
$book1->color = "أحمر";
$book1->supplier = "مكتبة النهضة";

$book2 = new book("دار الفكر", "العادات الذرية", 150, "كتاب عن تطوير العادات الصغيرة لتحقيق تغييرات كبيرة", "atomic_habits.jpg");
$book2->setPublisher("دار التنوير");
$book2->writer = "جيمس كلير";
$book2->color = "أزرق";
$book2->supplier = "مكتبة العصرية";

// echo "<pre>";
// print_r($book1->getAllData());
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الكتب</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .book-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
        }
        .book-image {
            width: 200px;
            margin-left: 20px;
        }
        .book-image img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .book-info {
            flex: 1;
        }
        .book-title {
            color: #2c3e50;
            margin-top: 0;
            font-size: 24px;
        }
        .book-price {
            font-size: 20px;
            color: #e74c3c;
            margin: 10px 0;
        }
        .book-meta {
            margin: 15px 0;
        }
        .book-meta div {
            margin-bottom: 8px;
        }
        .meta-label {
            font-weight: bold;
            color: #2c3e50;
            display: inline-block;
            width: 100px;
        }
        .publishers {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin-top: 15px;
        }
        .publisher-tag {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            margin: 3px;
            font-size: 14px;
        }
        .selected-publisher {
            background: #27ae60;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center; color: #2c3e50;">قائمة الكتب</h1>
        
        <?php foreach ($book1->getAllData() as $book): ?>
        <div class="book-card">
            <div class="book-image">
                <img src="<?= $book['image'] ?>" alt="<?= $book['name'] ?>">
            </div>
            <div class="book-info">
                <h2 class="book-title"><?= $book['name'] ?></h2>
                <div class="book-price">السعر: <?= $book['price'] ?> جنيه</div>
                
                <div class="book-meta">
                    <div><span class="meta-label">الكاتب:</span> <?= $book["book"]["writer"] ?></div>
                    <div><span class="meta-label">اللون:</span> <?= $book["book"]["color"] ?></div>
                    <div><span class="meta-label">المورد:</span> <?= $book["book"]["supplier"] ?></div>
                    <div><span class="meta-label">الوصف:</span> <?= $book['discription'] ?></div>
                </div>
                
                <div class="publishers">
                    <strong>الناشرون المتاحون:</strong><br>
                    <?php foreach ($book["book"]["publishers"] as $publisher): ?>
                        <span class="publisher-tag <?= $publisher ? 'selected-publisher' : '' ?>">
                            <?= $publisher ?>
                        </span>
                    <?php endforeach; ?>
                    <div style="margin-top: 10px;">
                        <strong>الناشر المختار:</strong> <?= $book['book']['selectedPublisher'] ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>