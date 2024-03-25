<?php
include "dbcon.php";

$sql = "SELECT products.*, categories.name AS category_name FROM products 
        INNER JOIN categories ON products.category_id = categories.id";
$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="dashProducts.css">
   
</head>
<body>
<div class="container">
    <h2>Product Management</h2>
    <a class="newbutton" href="createProduct.php" role="button">New Product</a>
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Admin</th> 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        include "getP.php";

        if (!empty($products)) {
            foreach($products as $product) {
                echo 
                "
                <tr>
                    <td>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['category_name']}</td>
                    <td><img src='{$product['photo']}' alt='Product Photo' style='max-width: 100px;'></td>
                    <td>{'user']['username']}</td>
                    <td>
                        <a href='edit.php?id={$product['id']}' class='editbutton'>Edit</a>
                        <a href='delete.php?id={$product['id']}' class='deletebutton'>Delete</a>
                    </td>
                </tr>
                ";
            }
        } else {
            echo ">No products found";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
