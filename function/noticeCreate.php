<?php
    include 'db_connection.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    };
    $connection = OpenCon();
    
    $lostDateErr = $venueErr = $contactErr = $typeErr = $descriptionErr = $noticeImgErr = "";
    $_id = $userId = $lostDate = $venue = $contact = $type = $description = $noticeImgDir = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_id = uniqid();
        $userId = $_COOKIE["_id"];
        $dateTime = time();
        $createdDate = date('Y-m-d H:i:s', time());
        if (empty($_POST["lostDate"])) {
            $lostDateErr = "Lost Date is required";
        }else{
            $lostDate = $_POST["lostDate"];
        }

        if (empty($_POST["venue"])) {
            $venueErr = "Venue is required";
        }else{
            $venue = $_POST["venue"];
        }

        if (empty($_POST["contact"])) {
            $contactErr = "Contact is required";
        }else{
            $contact = $_POST["contact"];
        }

        if (empty($_POST["type"])) {
            $typeErr = "Type is required";
        }else{
            $type = $_POST["type"];
        }

        if (empty($_POST["description"])) {
            $descriptionErr = "Description is required";
        }else{
            $description = $_POST["description"];
        }
        // print_r($_FILES["profileImage"]);
        if(isset($_FILES["noticeImg"])){
            //Taking the files from input
            $file = $_FILES["noticeImg"];
            //Getting the file name of the uploaded file
            $fileName = $_FILES["noticeImg"]['name'];
            //Getting the Temporary file name of the uploaded file
            $fileTempName = $_FILES["noticeImg"]['tmp_name'];
            //Getting the file size of the uploaded file
            $fileSize = $_FILES["noticeImg"]['size'];
            //getting the no. of error in uploading the file
            $fileError = $_FILES["noticeImg"]['error'];
            //Getting the file type of the uploaded file
            $fileType = $_FILES["noticeImg"]['type'];
            //Getting the file ext
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            //Array of Allowed file type
            $allowedExt = array("jpg","jpeg","png","pdf");
            //Checking, Is file extentation is in allowed extentation array
            if(in_array($fileActualExt, $allowedExt)){
                //Checking, Is there any file error
                if($fileError == 0){
                    //Checking,The file size is bellow than the allowed file size
                    if($fileSize < 10000000){
                        //Creating a unique name for file
                        $fileNemeNew = $_id.".".$fileActualExt;
                        //File destination
                        $fileDestination = '../uploads/noticeImg/'.$fileNemeNew;
                        $noticeImgDir = '/project/uploads/noticeImg/'.$fileNemeNew;

                        //function to move temp location to permanent location
                        $result = move_uploaded_file($fileTempName, $fileDestination);
                    }else{
                        $noticeImgDirErr = "File Size Limit beyond acceptance";
                    }
                }else{
                    $noticeImgDirErr = "Something Went Wrong Please try again!";
                }
                
            }else{
                $noticeImgDirErr = "Invalid File Format";
            }
            
        } else {
            $noticeImgDirErr = "Notice Image is required";
        }

        if(
            empty($lostDateErr) &&
            empty($venueErr) &&
            empty($contactErr) &&
            empty($typeErr) &&
            empty($descriptionErr) &&
            empty($noticeImgErr)
        ){

            $_id = test_input($_id);
            $userId = test_input($userId);
            $createdDate = test_input($createdDate);
            $type = test_input($type);
            $lostDate = test_input($lostDate);
            $venue = test_input($venue);
            $contact = test_input($contact);
            $description = test_input($description);
            $noticeImgDir = test_input($noticeImgDir);

            $req = "
            INSERT INTO notices(
                _id,
                userId,
                createdDate,
                type,
                foundDate,
                lostDate,
                venue,
                contact,
                description,
                imageDir
                ) VALUES (
                    '$_id',
                    '$userId',
                    '$createdDate',
                    '$type',
                    null,
                    '$lostDate',
                    '$venue',
                    '$contact',
                    '$description',
                    '$noticeImgDir'
                )";
                $final = mysqli_query($connection, $req);
                header('location:../pages/notices.php');
        }
    }
?>