<?php
    session_start();


    $dbserverName = "127.0.0.1";
    $dbUsername = "walid";
    $dbPassword = "HAWARI321";
    $dbName = "dbsignup";
    $connection = new mysqli($dbserverName, $dbUsername, $dbPassword, $dbName);

    $id = "";
    if(isset($_SESSION['id']))
        $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $connection->query($sql);
    $user = "";     
    $admin = "";
    $adminPass = "";       
    if($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
            $user = $row["firstname"];
            //email column will later be adjusted to unique
            if($row["firstname"] == "walid" && $row["pass"] == "UniqueP@$$321") {
                $admin = $row["firstname"];
                $adminPass = $row["pass"];
            } else {
                $admin = "";
                $adminPass = "";
            }
        }
    }
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
    }