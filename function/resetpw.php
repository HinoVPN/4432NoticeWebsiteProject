<?php
    include 'db_connection.php';
    $errMsg = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();
        $userId = $_GET['userId'];
        $password = $_POST['password'];
        $passwordAgain = $_POST["passwordAgain"];
        if(strcmp($password,$passwordAgain)){
            $req = "UPDATE users SET password='$password' WHERE BINARY userId='$userId'";
            $result = mysqli_query($connection, $req);
            header("location: signIn.php");
        }else{
            $errMsg = 'Passwords are not the same';
        }
    }
?>