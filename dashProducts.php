<?php
session_start();
include_once('dbcon.php');

function is_logged_in() {
    return isset($_SESSION['user']);
}
function is_admin() {
    return (is_logged_in() && $_SESSION['user']['role'] === 'admin');
}
function logout() {
    unset($_SESSION['user']);
}
if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffe6e6; 
    }
    .container {
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff; 
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: #ff69b4; 
    }
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .product-table th, .product-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    .product-table th {
        background-color: #ff69b4; 
        color: #fff; 
    }
    .product-table tbody tr:nth-child(even) {
        background-color: #fff; 
    }
    .product-table tbody tr:nth-child(odd) {
        background-color: #ffe6e6; 
    }
    .editbutton, .deletebutton, .newbutton {
    background-color: #ff69b4; 
    color: #fff; 
    border: none;
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none;
    display: inline-block; 
    margin-bottom: 10px;
}
.editbutton:hover, .deletebutton:hover, .newbutton:hover {
        background-color: #ff4d94; 
}
    </style>
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
        if (!empty($products)) {
            foreach($products as $product) {
                echo 
                "
                <tr>
                    <td>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['category_id']}</td>
                    <td><img src='{$product['photo']}' alt='Product Photo' style='max-width: 100px;'></td>
                    <td>{$_SESSION['user']['username']}</td>
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
