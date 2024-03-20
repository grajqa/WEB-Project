<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup, Skincare, Fragrance, Hair & Beauty Products | Sephora</title>
    <link rel="stylesheet" href="sephora.css">

</head>
<body>
    <?php
    include "navigationBar.php";
    ?>
<div class="ad">
    <img src="fotot/Marketing-mix-of-Sephora-3.jpg" alt="Ad" class="ad-image">
    <a href="makeup.php" class="shop-button">SHOP NOW</a>
</div>
<div class="slideri">
<div class="slideri-items">
    <div class="items">
        <img src="s1.jpg" alt="photo1">
    </div>
    <div class="items">
        <img src="s2.jpg" alt="photo2">
    </div>
    <div class="items">
        <img src="s3.jpg" alt="photo3">
    </div>
    <div class="items">
        <img src="s4.jpg" alt="photo4">
    </div>
    <div class="items">
        <img src="s6.jpg" alt="photo5">
    </div>
</div>
<button class="previous-button" onclick="showPreviousPhoto()"><</button>
<button class="next-button" onclick="showNextPhoto()">></button>
</div>

<script>
    let i=0;

    const fotot=["s1.jpg", "s2.jpg", "s3.jpg", "s4.jpg", "s6.jpg"];
    const s=document.querySelector('.slideri-items');

    function showNextPhoto(){
        i=(i+1)%fotot.length
        update();
    }
    function showPreviousPhoto(){
        i=(i-1+fotot.length)%fotot.length;
        update();
    }
    function update(){
        s.style.transform = `translateX(-${i * 100}%)`;

    }
</script>
    
</body>
</html>