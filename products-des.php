<?php
include_once 'user.php';
// $sql = "CREATE TABLE cart(
//     cart_id INT(7) UNSIGNED AUTO_INCREMENT,
//     iduser INT(7) UNSIGNED NOT NULL,
//     itemDescription LONGTEXT not null,
//     itemPrice LONGTEXT not null,
//     itemImgName LONGTEXT not null,
//     quantity INT(2) UNSIGNED not null,
//     PRIMARY KEY (cart_id)
//   )ENGINE=InnoDB";
// if($connection->query($sql) === true){
//     echo "</br>table created";
//     }
//     else
//         echo "error creating table. " . $connection->error;
// $sql = "ALTER TABLE `cart` ADD CONSTRAINT `UserForeignKey` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
// if($connection->query($sql) === true){
//     echo "</br>table created";
//     }
//     else
//         echo "error creating table. " . $connection->error;
// 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="products-des.css">
    <script src="https://kit.fontawesome.com/75745b36f2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <title>items</title>
</head>
<body>
<header class="header">
        <div class="image" onclick="window.location.href = 'final.php';"></div>
        <div class="categories">
            <a href="products.php">jackets</a>
            <a href="">suits</a>
            <a href="">pants</a>
            <a href="">shirts</a>
            <a href="">ties</a>
        </div>
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
                    echo '<a class="fas fa-shopping-basket"></a>';
                }
            ?>
        </div> 
    </header>
    <section>
        <?php echo '<div class="photo" style="background-image: URL(img/gallery/' . $_GET["img"] . ');"></div>'; ?>
        <div>
            <?php
            echo '<h3>' . $_GET["h3"] . '</h3>';
            echo '<p>' . $_GET["p"] . '</p>';
            if(!isset($_SESSION['id'])) { ?>
                <form action="login.php" method="POST">
                    <input type="submit" value="Add to cart">
                </form>
                <?php
            } else {
                ?>
                <form method="POST">
                    <input type="submit" value="Add to cart" name="cartadd">
                </form>
                <?php
            }
            ?>
            
        </div>
    </section>
</body>
</html>
<?php 
    if(isset($_SESSION['id']) && $_SESSION['id'] !== "" && isset($_POST['cartadd'])){
        $description = $_GET['h3'];
        $price = $_GET["p"];
        $img = $_GET["img"];
        $sql = "INSERT INTO cart (iduser, itemDescription, itemPrice, itemImgName)
        VALUES ($id, '$description', '$price', '$img');";
        header("Location: basket.php");
        if($connection->query($sql) === true){
            echo "</br>table created";
            }
            else
                echo "error creating table. " . $connection->error;
    }
?>