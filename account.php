<?php 
    include_once 'user.php';    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="products.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/75745b36f2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="products.js"></script>
    <title>account</title>
</head>
<body>
    <header class="header">
        <div class="image" onclick="window.location.href = 'final.php';"></div>
        
        <div class="about">
        <?php 
            if(isset($_SESSION['id'])) {
                echo '<a href="account.php">' . $user . '</a>';
            }else {
                echo '<a href="login.php">login</a>';
            }
            ?>
            <a>about</a>
            <?php 
                if(isset($_SESSION['cart']) || isset($_SESSION['id'])) {
                    echo '<a href="basket.php" class="fas fa-shopping-basket"></a>';
                } else {
                    echo '<a  class="fas fa-shopping-basket"></a>';
                }

            ?>
        </div> 
    </header>
    <form action="final.php" method="POST">
        <input type="submit" name="logout" value="Log Out">
    </form>
</body>
</html>