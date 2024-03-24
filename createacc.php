<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account | Sephora</title>
    <link rel="stylesheet" href="createacc.css">
    <script>
        function alertUser() {
            alert("Account has been created succsesfully. Please log in.");
        }
    </script>
</head>
<body>
    <?php include "navigationBar.php"; ?>

    <div class="registerforma">
        <form action="createacc.php" method="post" id="signupForm">
            <h2>Sign Up</h2>
            <div class="inputi">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="inputi">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="inputi">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button class="signupbutton" name="signupbutton" type="submit" onclick="alertUser()">Sign Up</button>
        </form>
    </div>

    <?php include "footeri.php"; ?>
    
</body>
</html>