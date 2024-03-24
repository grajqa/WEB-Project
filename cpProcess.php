<?php
if(isset($_POST['create_product'])){
    include "dbcon.php";
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $uploadDirectory  = "products/";
    $uploadedFilePath  = $uploadDirectory  . basename($_FILES["photo"]["name"]);

    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadedFilePath )) {
  
        $sql = "INSERT INTO products (name, description, price, category_id, photo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $description, $price, $category_id, $uploadedFilePath ]);

        header("Location: dashProducts.php");
        exit();
    } else {
        echo '<script>alert("there was an error uploading your file");</script>';
    }
}
?>
