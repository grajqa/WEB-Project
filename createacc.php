<?php
include_once "dbcon.php";

if(isset($_POST['signupbutton'])){
    $username = $_POST['username'];   
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmtinsert = $db->prepare($sql);
    if (!$stmtinsert) {
        print_r($db->errorInfo());
    }
    $result = $stmtinsert->execute([$username, $email, $password]); 
    if (!$result) {
        print_r($stmtinsert->errorInfo());
    }else{
        header('Location: login.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account | Sephora</title>
    <link rel="stylesheet" href="createacc.css">
        <script>
            function alertUser(){
                if(username!=null && email!=null && password!=null){
                    alert("Your account has been succsesfully created.");

                }
            }

        document.addEventListener("DOMContentLoaded", function () {
            const form=document.getElementById("registrationForm");

            form.addEventListener("submit", function (event) {
            event.preventDefault();

            const username=document.getElementById("username").value;
            const email=document.getElementById("email").value;
            const password=document.getElementById("password").value;
                
                if (!validoU(username)) {
                    alert("Please enter a valid username (3-20 characters, letters, numbers and special characters).");
                    return;
                }
                if (!validoE(email)) {
                    alert("Please enter a valid email address.");
                    return;
                }
                if (!validoP(password)) {
                    alert("Please enter a valid password (Should contain at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character).");
                    return;
                }
                alert("Registration successful!");
                window.location.href = "sephora.php";
            });
            function validoU(username) {
                const usernameRegex = /^.{3,20}$/;
                return usernameRegex.test(username);
            }
            function validoE(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            function validoP(password) {
                const passwordRegex = /^.{8,}$/;
                return passwordRegex.test(password);
            }
        });
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