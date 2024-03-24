<?php
include "dbcon.php";

$sql = "SELECT * FROM products WHERE category_id = 5"; 
$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools & Brushes | Sephora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "navigationBar.php";
    ?>

    <div class="fotot">
        <div class="productsdiv">
            <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?php echo $product['photo']; ?>" alt="<?php echo $product['name']; ?>">
                <p><?php echo $product['name']; ?></p>
                <p><?php echo $product['description']; ?></p>
                <p> <?php echo $product['price']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    include "footeri.php";
    ?>
</body>
</html>