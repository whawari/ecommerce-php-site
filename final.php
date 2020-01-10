<?php 
    include_once 'user.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eccomerce shop</title>
    <link rel="stylesheet" type="text/css" href="final.css">
    <script src="https://kit.fontawesome.com/75745b36f2.js" crossorigin="anonymous"></script>
</head>
<body><section class="desktop"> 
        <header class="header">
            <div>
                <a href="" >Home</a>
            </div>
            <div>
                <a href="products.php">Products</a>
            </div>
            <div>
                <a href="">Engage</a>
            </div>
            <div>
            <?php 
            if(isset($_SESSION['id'])) {
                echo '<a href="account.php">' . $user . '</a>';
            }else {
                echo '<a href="login.php">login</a>';
            }
            ?>
            </div>
        </header>
        <div class="img1">
            <div class="text1">
                <span class="border">
                    Welcome to<br>
                    our store
                </span>
            </div>
        </div>
        <div class="text-container">
            <h1>
                you always have a choice
            </h1>
            <div></div>
            <p>
                Selected men's clothing, shoes and accessories at special prices.<br> Fashionable 
                garments offering comfort and <br>practicality in a range of styles and fits.<br>
                Discover this season's fashion trends for men at great value prices.
            </p>
            <div></div>
        </div>
        <div class="img2">
            <div class="text2">
                <span class="border">
                    Elegance is elimination.
                </span>
            </div>
        </div>
        <div class="cards-wrapper">
            <div class="card-wrap">
                <div class="card">
                    <div class="profile-img-wrapper">
                        
                    </div>
                    <p class="profile-name">
                        walid hawari
                    </p>
                    <q class="abbr">
                        Online shopping has become more trendy and fast forward
                    </q>
                    <div class="shop">
                        <span>shop now</span>
                        <a href="products.php">products</a>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="profile-img-wrapper">
                        
                    </div>
                    <p class="profile-name">
                        walid hawari
                    </p>
                    <q class="abbr">
                        Online cloth stores are always updated with the new fashion.
                    </q>
                    <div class="shop">
                        <span>shop now:</span>
                        <a href="products.php">products</a>
                    </div>
                </div>
            </div>
            <div class="card-wrap">
                <div class="card">
                    <div class="profile-img-wrapper">
                        
                    </div>
                    <p class="profile-name">
                        walid hawari
                    </p>
                    <q class="abbr">
                        Todays the world is very technical. Shop & save time!
                    </q>
                    <div class="shop">
                        <span>shop now</span>
                        <a href="products.php">products</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="img3">
            <div class="text3">
                <span class="border">
                    Enjoy life. Enjoy dressing elegantly.
                </span>
            </div>
        </div>
        <div class="text-container">
            <h1>
                Your clothes should be as important as your skin.
            </h1>
            <p>
                Reinvent your look with the latest in men's <br>clothes, shoes and accessories.
                Discover seasonal pieces in<br> a range of styles and fits, updated weekly.
            </p>
        </div>
        <div class="img4">
            <div class="text4">
                <span class="border">
                    The joy of dressing is an art.
                </span>
            </div>
        </div>
        <footer class="footer">
            <div class="follow-us">
                <span class="follow">follow us</span>
                <a href="https://www.facebook.com/whawari" class="fab fa-facebook"></a>
                <a href="https://www.instagram.com/whawari/" class="fab fa-instagram"></a>
                <a class="fab fa-youtube"></a>
            </div>
            <div class="rights">
                © rights reserved
            </div>
        </footer>
    </section> 
</body>
</html>