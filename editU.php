<?php
include "dbcon.php";

if (!isset($_GET['id'])) {
    echo 'error';
    exit;
}

$userId = $_GET['id'];


$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo 'error';
    exit;
}
if(isset($_POST['editbutton'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmtupdate = $db->prepare($sql);
    
    $result = $stmtupdate->execute([$username, $email, $password, $id]); 

    if($result){
        header("Location: dashUser.php");
        exit;
    } else {
        echo "Error updating user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
    <h3>Edit User</h3>
    <form action="" id="" method="post">
        <input type="text" name="id"  value="<?=$user['id']?>" readonly> <br> <br>
        <input type="text" name="username"  value="<?=$user['username']?>"> <br> <br>
        <input type="text" name="email"  value="<?=$user['email']?>"> <br> <br>
        <input type="text" name="password"  value="<?=$user['password']?>"> <br> <br>

        <input type="submit" name="editbutton" value="save"> <br> <br>
    </form>
</body>
</html>

<?php 

if(isset($_POST['editbutton'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository->updateUser($username,$email,$password);
    header("location:dashUser.php");
}


?>