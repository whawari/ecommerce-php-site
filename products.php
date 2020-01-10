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
    <title>products</title>
</head>
<body>
    <header class="header">
        <div class="image" onclick="window.location.href = 'final.php';"></div>
        <div class="categories">
            <a href="">jackets</a>
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
                if(isset($_SESSION['id'])) {
                    echo '<a href="basket.php" class="fas fa-shopping-basket"></a>';
                } else {
                    echo '<a class="fas fa-shopping-basket"></a>';
                }
            ?>
        </div> 
    </header>
    <hr>
    <div class="afterheadertext">
        <h1>
            SMART OR CASUAL JACKETS FOR MEN
        </h1>
        <p>
            Men's jackets for this season include a variety of styles.</br> 
            Classic leather and shearling pieces never go out of fashion. </br>
            Discover original designs with jacquard fabrics, bold prints and unique embroidery.</br>
            Explore the complete collection and find the jacket for you.</br>
        </p>
    </div>
    <hr>
    <section class="wrapper">
        <div class="gallery-container">
            <?php
                include_once "includes/dbh.inc.php";
                $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = $result->fetch_assoc()) {
                        echo '<a href="products-des.php?img='.$row["imgFullNameGallery"] .'
                        &h3='.$row["titleGallery"].'&p='.$row["descGallery"].'">
                        <div class="photo" style="background-image: URL(img/gallery/' . $row["imgFullNameGallery"] . ');"></div>
                        <h2>' . $row["titleGallery"] . '</h2>
                        <p>' . $row["descGallery"] . '</p>
                        </a>';
                    }
                }  
            ?>
        </div>
    </section>
    <?php
    if(isset($_SESSION['id']) && $admin == 'walid' && $adminPass == 'UniqueP@$$321') {
        ?>
    <div class="gallery-upload">
        <form action="includes/gallery-upload.inc.php" method="POST" enctype="multipart/form-data">
            <!-- the enctype is used becuase we want to upload files -->
            <input type="text" name="filename" placeholder="file name...">
            <input type="text" name="filetitle" placeholder="image title...">
            <input type="text" name="filedesc" placeholder="image description...">
            <input type="file" name="file" class="custom-file-input">
            <button type="submit" name="submit">UPLOAD</button>
        </form> 
    </div>
    <?php } else {}
    ?>
</body>
</html>