<?php
include_once "dbcon.php";

if (!isset($_GET['id'])) {
    echo 'error';
    exit;
}

$productId = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$product) {
    echo 'error';
    exit;
}
if(isset($_POST['editbutton'])){
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];


    $sql = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ? WHERE id = ?";
    $stmtupdate = $db->prepare($sql);
    

    $result = $stmtupdate->execute([$name, $description, $price, $category_id, $id]); 

    if($result){
        header("Location: dashProducts.php");
        exit;
    } else {
        echo "Error updating product.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #ffe6e6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        h3 {
            text-align: center;
            color: #ff69b4;
        }
        form {
            margin-top: 20px;
            text-align: center; 
        }
        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #ff69b4;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff4d94;
        }
    </style>
</head>
<body>
    <h3>Edit Product</h3>
    <form action="edit.php?id=<?= $product['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>"> 
        <input type="text" name="name" value="<?= $product['name'] ?>"> <br> <br>
        <textarea name="description"><?= $product['description'] ?></textarea> <br> <br>
        <input type="text" name="price" value="<?= $product['price'] ?>"> <br> <br>

        <select name="category_id">
            <?php
            $query = "SELECT id, name FROM categories";
            $stmt = $db->query($query);
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $category) {
        
                $selected = ($category['id'] == $product['category_id']) ? 'selected' : '';
                echo "<option value=\"{$category['id']}\" $selected>{$category['name']}</option>";
            }
            ?>
        </select> <br> <br>
        
        <input type="submit" name="editbutton" value="Save"> <br> <br>
    </form>
</body>
</html>