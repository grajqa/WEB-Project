<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h3{
            text-align: center;
            margin-top: 20px;
        }
        form{
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        textarea,
        select{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea{
            height: 100px;
        }
        select{
            cursor: pointer;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: palevioletred;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        </style>
</head>
<body>
    <h3>Create Product</h3>
    <?php
    include "cpProcess.php";
    ?>
    <form action="cpProcess.php" method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Product Name"> <br> <br>
        <textarea name="description" placeholder="Product Description"></textarea> <br> <br>
        <input type="text" name="price" placeholder="Product Price"> <br> <br>

        <select name="category_id">
            <option value="1">Makeup</option>
            <option value="2">Skincare</option>
            <option value="3">Hair</option>
            <option value="4">Fragrance</option>
            <option value="5">Tools & Brushes</option>
            <option value="6">Bath & Body</option>
            <option value="7">Mini Size</option>
        </select>
        <br> 
        <br>

        <input type="file" name="photo" id="photo"> <br> <br>
        <input type="submit" name="create_product" value="Create Product">
    </form>
</body>
</html>
