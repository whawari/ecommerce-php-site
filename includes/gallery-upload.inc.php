<?php
    if(isset($_POST['submit'])) {

        $newFileName = $_POST['filename'];
        if(empty($_POST['filename'])) {
            $newFileName = "gallery"; 
        } else {
            $newFileName = strtolower(str_replace(" ", "-", $newFileName)); 
            // the above line is to transform the file name into lowecase and to replace 
            // spaces with dashes
        }
        $imgTitle = $_POST['filetitle'];
        $imgDesc = $_POST['filedesc'];

        $file = $_FILES["file"]; 
        // the above line is to grab the information of the file we are going to uplaod
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        // the above line takes the last index of the array using end() method and transforms it to lower case
        $allowed = array("jpg", "jpeg", "png");

        if(in_array($fileActualExt, $allowed)) {
            // in_array() method checks if fileActualExt is in the array allowed
            if($fileError === 0) {
                if($fileSize < 2000000) {
                    // checking if the file is less than 20000kb -> 20mb
                    $imgFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                    $fileDestination = "../img/gallery/" . $imgFullName;

                    include_once "dbh.inc.php";
                    if(empty($imgTitle) || empty($imgDesc)) {
                        header("Location: ../products.php?upload=empty");
                        exit();
                    } else {
                        $sql = "SELECT * FROM gallery;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rowCount = mysqli_num_rows($result);
                            $setImageOrder = $rowCount + 1;

                            $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery,orderGallery) 
                            VALUES (?, ?, ?, ?);";
                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "SQL statement failed";

                            } else {
                                mysqli_stmt_bind_param($stmt, "ssss", $imgTitle, $imgDesc, $imgFullName, $setImageOrder);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestination);

                                header("Location: ../products.php?upload=success");
                            }
                        }
                    }

                } else {
                    echo "file size is too big!";
                    exit();
                }
            } else {
                echo "You had an error!";
                exit();
            }
        } else {
            echo "You need to upload a proper file type!";
            exit();
        }


    }