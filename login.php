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


