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
    <script src="https://kit.fontawesome.com/75745b36f2.js" crossorigin="anonymous"></script>
    <title>basket</title>
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
    <section class="items-wrapper">
        <h1>Shopping bag</h1>
        <?php 
            if(isset($_SESSION["id"])) {
                $sql = "SELECT * FROM cart WHERE iduser = $id";
                $result = $connection->query($sql);
            
                echo '<div class="wrapper-two">';
                    
                if($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()){
                        echo '<div>';
                        echo '<div class="picture" style="background-image: URL(img/gallery/'. 
                        $row["itemImgName"].')";></div>';
                        echo '<h2 class="imgdes">'. $row["itemDescription"] . '</h2>';
                        echo '<p class="price">'. $row["itemPrice"] . '</p>';
                        echo '</div>';
                    }
                }
                echo '</div>';
            }
        ?>
    </section>
</body>
</html>