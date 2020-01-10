<?php
session_start();
//setting up the connection to the database
$dbserverName = "127.0.0.1";
$dbUsername = "walid";
$dbPassword = "HAWARI321";
$dbName = "dbsignup";
$connection = new mysqli($dbserverName, $dbUsername, $dbPassword, $dbName);
// $sql = "CREATE TABLE users(
//     id INT(7) UNSIGNED AUTO_INCREMENT,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     pass VARCHAR(30) NOT NULL,
//     passconf VARCHAR(30) NOT NULL,
//     email VARCHAR(60) NOT NULL,
//     phonenumber VARCHAR(16),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     PRIMARY KEY (id)
//     )ENGINE=InnoDB";
//     if($connection->query($sql) === true){
//         echo "</br>table created";
//         }
//         else
//             echo "error creating table. " . $connection->error;
// $sql = "CREATE TABLE basket(
//     basket_id INT(7) UNSIGNED AUTO_INCREMENT,
//     userid INT(7) UNSIGNED NOT NULL,
//     jacket VARCHAR(30),
//     suit VARCHAR(30),
//     shirt VARCHAR(30),
//     pants VARCHAR(30),
//     ties VARCHAR(30),
//     PRIMARY KEY (basket_id)
//   )ENGINE=InnoDB";
//   if($connection->query($sql) === true){
//     echo "</br>table created";
//     }
//     else
//         echo "error creating table. " . $connection->error;
// $sql = "ALTER TABLE `basket`
// ADD CONSTRAINT `ForigenKey` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) 
// ON DELETE CASCADE ON UPDATE CASCADE;";
// if($connection->query($sql) === true){
//     echo "</br>table created";
// } else
//     echo "error creating table. " . $connection->error;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>login</title>
</head>
<body>
    <header class="header">
        <div class="image" onclick="window.location.href = 'final.php';">

        </div>    
    </header>
    <div class="about">
        <p class="span">about</p>
    </div>
    <section class="login">
        <h3>I already have a user account</h3>
        <p>Please enter your e-mail address and password to identify yourself.</p>
        <form action="login.php" method="POST">
            <input type="text" placeholder="E-mail" name="mail">
            <input type="password" placeholder="Password" name="pwd">
            <p>Have you forgotten your password?</p>
            <input type="submit" placeholder="login" value="LOG IN" name="submit">
        </form>
    </section>
    <section class="signup">
        <h3>New user</h3>
        <p>If you still don't have an account, use this option to access the registration form.</p>
        <p>By giving us your details, purchasing in <b>walids.com</b> will be faster and an enjoyable experience.</p>
        <button onclick="window.location.href = 'register.php';">CREATE ACCOUNT</button>
    </section>
</body>
</html>
<?php

//select the data form the databases
$sql = "SELECT * FROM users";
$result = $connection->query($sql);
//cheking if there are users in the database
$redirect = "";
if($result->num_rows > 0) {  
    //checking if the data fields have been filled
    if(empty($_POST['mail']) || empty($_POST['pwd'])) {
        // echo "<p> please fill out the data<p>";
    }else if(!empty($_POST['mail']) && !empty($_POST['pwd'])) {
        //loop over the users to check if the user is found in the databas
        while($row = $result->fetch_assoc()) {
            if($row['email'] == $_POST['mail'] && $row['pass'] == $_POST['pwd']) {
                //create a session for the user with his id in the database 
                $_SESSION["id"] = $row['id'];
                if(!(isset($_SESSION['id'])) && isset($_SESSION['id'])=="") {
                    $redirect = "login.php";
                    break;
                }
                $redirect = "final.php"; 
                break;
            } else {
                $redirect = "login.php";
            }
        }
    }
}
header("Location: $redirect");