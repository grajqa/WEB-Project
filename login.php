<?php
include_once "dbcon.php";
include_once "authentication.php";
function login($username, $password) {

    global $db;
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user'] = $user;
        return true; 
    } else {
        return false; 
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        header('Location: sephora.php');
        exit();
    } else {
        $error = "invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Sephora</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php include "navigationBar.php"; ?>
    
    <div class="forma">
        <h2>Log In</h2>
        <form action="login.php" method="post">
            <div class="inputi">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="inputi">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button class="loginbutton" type="submit" name="login">Log In</button>
        </form>
        <div class="registerforma">
            <p>Don't have an account? <a href="createacc.php">Register</a></p>
        </div>
    </div>

    <?php include "footeri.php"; ?>
</body>
</html>


