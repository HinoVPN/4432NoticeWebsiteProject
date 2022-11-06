<?php
    include 'db_connection.php';
    $errMsg = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();
        $userId = $_GET['userId'];
        $password = $_POST['password'];
        $passwordAgain = $_POST["passwordAgain"];
        if(!strcmp($password,$passwordAgain)){
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $encryption_iv = "1234567891011121";
            $encryption_key = "hino";

            $encryptedPassword = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

            $req = "UPDATE users SET password='$encryptedPassword' WHERE BINARY userId='$userId'";
            $result = mysqli_query($connection, $req);
            header("location: signIn.php");
        }else{
            $errMsg = 'Passwords are not the same';
        }
    }
?>