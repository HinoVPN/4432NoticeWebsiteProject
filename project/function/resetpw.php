<?php
    include 'db_connection.php';
    $errMsg = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();
        $userId = $_GET['userId'];
        // $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $userId;
        // echo $password;
    
        $req = "UPDATE users SET password='$password' WHERE userId='$userId'";
    
        $result = mysqli_query($connection, $req);
        print_r($result);
        if($result){
            header("location: signIn.php");
        }else{
            // $errMsg = 'User ID or birthday not correct!';
            // header('location:../pages/login.php');
        }
    }
?>