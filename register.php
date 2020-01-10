<?php
    $dbserverName = "127.0.0.1";
    $dbUsername = "walid";
    $dbPassword = "HAWARI321";
    $dbName = "dbsignup";
    $connection = new mysqli($dbserverName, $dbUsername, $dbPassword, $dbName);

    $name = $last = $pwd = $pwdconf = $mail = $phone = "";
  if(isset($_POST['btn'])) {
    if(isset($_POST['first'])) {
      $name = strtolower($_POST['first']);
    }else {
      $name = "";
    }
    if(isset($_POST['last'])) {
      $last = strtolower($_POST['last']);
    }
    if(isset($_POST['pwd'])) {
      $pwd = $_POST['pwd'];
      $firstLength =  strlen($pwd);
      $result = preg_split('/[-\s+=*\/()|?!%~\'\"]/', $pwd , -1, PREG_SPLIT_NO_EMPTY); 
      //splits the password into an array
      $secondLength = strlen(implode($result));
      $lower = $upper = $num = FALSE;
      if($firstLength != $secondLength || ($firstLength < 8 || $firstLength > 30)) {
          //return "";
          $pwd = "";
      }else {
        $result = preg_split('//', $pwd , -1, PREG_SPLIT_NO_EMPTY);
        foreach($result as $value) {
          //$result is the array passed to the foreach function
          //$value, assigning every element in the array to a $value 
          if(ctype_upper($value)) {
            //check if the value is of uppercase
            $upper = TRUE;
          }
          if(ctype_lower($value)) {
            //check if the value is of lowerrcase
            $lower = TRUE;
          }
          if(is_numeric($value)) {
            //check if the value is a number
            $num = TRUE;
          }
        }
        if($num == TRUE && $lower == TRUE && $upper == TRUE) {
          //give it the value
          $pwd = $_POST['pwd']; 
        }else {
          //return "";
          $pwd = "";
        }
      }
      if(isset($_POST['pwdconf'])) {
        $pwdconf = $_POST['pwdconf'];
        if($pwd == $pwdconf && $pwd != '') {
          $pwdconf = $_POST["pwdconf"];
        }
      }
    }
    if(isset($_POST['mail'])) {
      $mail = $_POST['mail'];
      $firstLength = strlen($mail); //the length of the first element before exploding 
      $result = explode("@", $mail);
      $secondLength = strlen(implode($result)); //the length of the second element after exploding
      if($secondLength == ($firstLength - 1) && count($result) == 2 && $result[0] != ""){
        //cheking if the first element is valid or not 
        //it must be the same length as before exploding @
        $elementZeroLengthBefore = strlen($result[0]);
        $resultZero = preg_split('/[-\s+=*\/()|?!%~\'\"#$^&\`]/', $result[0] , -1, PREG_SPLIT_NO_EMPTY);
        //hayde hone 3am na3mel check eno mamno3 ykon fe hawde l symbols abel l @
        $elementZeroLengthAfter = strlen(implode($resultZero));
        if($elementZeroLengthBefore != $elementZeroLengthAfter) {
          $mail = "";
        }else {
          $secondElement = explode(".", $result[1]); //exploding the second element
          $secondElementFirstLength = strlen($result[1]);
          //hon 3am na3mel check eza ba3ed l @ is of form gmail.com aw hotmail.com aw outlook.com
          //8er hek l form mesh ra7 ye2bal l email
          $secondElementSecondLength = strlen(implode($secondElement));
          if($secondElementSecondLength == ($secondElementFirstLength - 1) && count($secondElement) == 2
          && ($secondElement[0] = "hotmail" || $secondElement[0] == "gmail" || $secondElement[0] == "outlook") 
          && ($secondElement[1] == "com")) {
            $mail = $_POST['mail'];
          }else {
            $mail = "";
          }
        }   
      }else {
        $mail = "";
      }  
    }
    if(isset($_POST["phone"])) {
      if(is_numeric($_POST["phone"])) {
        $phone = $_POST["phone"];
      }else {
        $phone = "";
      } 
    }
    if($name != "" && $last != "" && $pwd != "" && $pwdconf != "" && $mail != ""){
      $sql = "INSERT INTO users (firstname, lastname, pass, passconf, email, phonenumber)
      VALUES ('$name', '$last', '$pwd', '$pwdconf', '$mail', '$phone');";
      $connection->query($sql);
      header("Location: login.php");
    }  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/75745b36f2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="products.js"></script>
    <title>signup</title>
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
                if(isset($_SESSION['id'])) {
                    echo '<a href="basket.php" class="fas fa-shopping-basket"></a>';
                } else {
                    echo '<a class="fas fa-shopping-basket"></a>';
                }
            ?>
        </div> 
    </header>
    <section>
        <h1>Write your personal details</h1>
        <div class="right-div">
            <form action="register.php" method="POST" name="signform"> 
              <!-- onsubmit="return validate()" try this in the form -->
                <span class="first">
                    <input type="text" placeholder="first name" name="first">
                </span>
                <span class="last">
                    <input type="text" placeholder="last name" name="last"> 
                </span>
                <span class="pwd" pass-des="At least 8 characters long, containing uppercase and lowercase letters and numbers">
                    <input type="password" placeholder="password" name="pwd">
                </span>
                <span class="pwdconf">
                    <input type="password" placeholder="confirm password" name="pwdconf">
                </span>
                <span class="mail" mail-des="in the form of: example@gmail.com">
                    <input type="text" placeholder="email" name="mail">
                </span>
                <span class="phone" phone-des="optional field">
                    <input type="text" placeholder="phone" name="phone">
                </span>
                <!-- <span class="phonespan">optional</span> -->
                <input type="submit" value="Sign Up" name="btn">                
            </form>
        </div>
    </section>
</body>
</html>