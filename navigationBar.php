<?php 
include_once "authentication.php";

if (isset($_POST['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigationBar.css">
    <script src="https://kit.fontawesome.com/8084ad0cee.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1>
        <a href="ad.php" class="linku">
            <span class="normal-text">Get your beauty in as little as&nbsp;</span>
            <span class="bold-text">two hours with Same-Day Delivery.&nbsp;</span>
            <span class="normal-text">Learn More.</span>
        </a>
    </h1>
    
    <div class="header">
        <div class="contenth">
            <a href="sephora.php" class="logo">
                <img src="fotot/logo.png" alt="Sephora Logo" width="120px" height="120px" class="logo">
            </a>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                <div>
                    <div class="btns">
                        <button onclick="location.href='dashUser.php'" class="dashbtn">Users Dashboard</button>
                        <button onclick="location.href='dashProducts.php'" class="dashbtn">Products Dashboard</button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="user-actions">
                <button id="shfaqMenu" class="sh-m"><i class="fa fa-reorder" style="font-size:20px;color:black"></i></button>
                    <i class="fas fa-heart" style="font-size:20px;color:black;margin-right:10px"></i>
                </a>
                    <i class="fas fa-shopping-basket" style="font-size:20px;color:black;margin-right:10px"></i>
                </a>
                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="login.php">
                        <i class="fa fa-user-circle" style="font-size:20px;color:black;margin-right:10px"></i>
                    </a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <form id="logoutForm" action="" method="post">
                        <button id="logoutBtn" type="submit" name="logout"><i class="fa fa-sign-out-alt" style="font-size:15px;"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav id="navigimi" class="nav">
        <ul>
            <li><a href="makeup.php">Makeup</a></li>
            <li><a href="skincare.php">Skincare</a></li>
            <li><a href="hair.php">Hair</a></li>
            <li><a href="fragrance.php">Fragrance</a></li>
            <li><a href="t&b.php">Tools & Brushes</a></li>
            <li><a href="b&b.php">Bath & Body</a></li>
            <li><a href="minisize.php">Mini Size</a></li>
        </ul>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var shfaqMenu = document.getElementById("shfaqMenu");
            var navigimi = document.getElementById("navigimi");

            shfaqMenu.addEventListener("click", function() {
                if (navigimi.classList.contains("show")) {
                    navigimi.classList.remove("show");
                } else {
                    navigimi.classList.add("show");
                }
            });
        });
    </script>
</body>
</html>
