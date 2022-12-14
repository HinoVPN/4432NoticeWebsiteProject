<?php
    include 'db_connection.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    $connection = OpenCon();
    
    $userIdErr = $nicknameErr = $emailErr = $passwordErr = $birthdayErr = $profileImageDirErr = "";
    $_id = $userId = $nickname = $email = $password = $birthday = $profileImageDir = $createdDate = $type = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_id = uniqid();
        $dateTime = new DateTime();
        $createdDate = $dateTime -> format('m/d/Y g:i A');
        $type = 'user';

        if (empty($_POST["userId"])) {
            $userIdErr = "User ID is required";
        } else {
            $userId = test_input($_POST["userId"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^([A-z0-9!@#$%^&*().,<>{}[\]<>?_=+\-|;:\'\"\/])*[^\s]\1*$/",$userId)) {
            $userIdErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        $s = "SELECT * FROM users WHERE userId = '$userId' or email = '$email'";

        $result = mysqli_query($connection, $s);

        if(mysqli_num_rows($result) > 0){
            $userIdErr =  'Usename Already Taken';
        }else{
            if (empty($_POST["nickname"])) {
                $nicknameErr = "Nickname is required";
            } else {
                $nickname = test_input($_POST["nickname"]);
            }
            
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);

                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_iv = "1234567891011121";
                $encryption_key = "hino";

                $encryptedPassword = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
            }

            if (empty($_POST["birthday"])) {
                $birthdayErr = "Birthday is required";
            } else {
                $birthday = test_input($_POST["birthday"]);
            }
            // print_r($_FILES["profileImage"]);
            if(isset($_FILES["profileImage"])){
                //Taking the files from input
                $file = $_FILES["profileImage"];
                //Getting the file name of the uploaded file
                $fileName = $_FILES["profileImage"]['name'];
                //Getting the Temporary file name of the uploaded file
                $fileTempName = $_FILES["profileImage"]['tmp_name'];
                //Getting the file size of the uploaded file
                $fileSize = $_FILES["profileImage"]['size'];
                //getting the no. of error in uploading the file
                $fileError = $_FILES["profileImage"]['error'];
                //Getting the file type of the uploaded file
                $fileType = $_FILES["profileImage"]['type'];

                //Getting the file ext
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));

                //Array of Allowed file type
                $allowedExt = array("jpg","jpeg","png");
                
                //Checking, Is file extentation is in allowed extentation array
                if(in_array($fileActualExt, $allowedExt)){
                    //Checking, Is there any file error
                    if($fileError == 0){
                        //Checking,The file size is bellow than the allowed file size
                        if($fileSize < 10000000){
                            //Creating a unique name for file
                            $fileNemeNew = $_id.".".$fileActualExt;
                            //File destination
                            $fileDestination = '../uploads/profileImg/'.$fileNemeNew;
                            $profileImageDir = '/project/uploads/profileImg/'.$fileNemeNew;

                            //function to move temp location to permanent location
                            $result = move_uploaded_file($fileTempName, $fileDestination);
                        }else{
                            $profileImageDirErr = "File Size Limit beyond acceptance";
                        }
                    }else{
                        $profileImageDirErr = "Something Went Wrong Please try again!";
                    }
                    
                }else{
                    $profileImageDirErr = "Invalid File Format";
                }
                
            } else {
                $profileImageDirErr = "Profile Image is required";
            }

            $userIdErr = $encryptedPassword;
            if(
                empty($userIdErr) &&
                empty($nicknameErr) &&
                empty($emailErr) &&
                empty($passwordErr) &&
                empty($birthdayErr) &&
                empty($profileImageDirErr)
            ){

                $_id = test_input($_id);
                $userId = test_input($userId);
                $nickname = test_input($nickname);
                $email = test_input($email);
                $encryptedPassword = test_input($encryptedPassword);
                $profileImageDir = test_input($profileImageDir);
                $birthday = test_input($birthday);
                $createdDate = test_input($createdDate);
                $type = test_input($type);


                $req = "
                INSERT INTO users(
                    _id,
                    userId,
                    nickname,
                    email,
                    password,
                    profileImageDir,
                    birthday,
                    createdDate,
                    type
                    ) VALUES (
                        '$_id',
                        '$userId',
                        '$nickname',
                        '$email',
                        '$encryptedPassword',
                        '$profileImageDir',
                        '$birthday',
                        '$createdDate',
                        '$type'
                    )";
                    $final = mysqli_query($connection, $req);
                    header('location:../pages/signIn.php');
            }

        }
    }

    CloseCon($connection)
    
?>