<?php
    // session_start();
    // header("location:login.php");
    include 'db_connection.php';
    $errMsg = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();

        // $username = $_POST['username'];
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        // echo $userId;
        // echo $password;
    
        $s = "SELECT * FROM users WHERE userId = '$userId' && password = '$password'";
    
        $result = mysqli_query($connection, $s);
        // print_r($result);
        // echo mysqli_num_rows($result);
    
        
        if(mysqli_num_rows($result) == 1){
            while($i = mysqli_fetch_assoc($result)) {
                setcookie("_id", $i["_id"], time() + (86400 * 30), "/");
                setcookie("userId", $i["userId"], time() + (86400 * 30), "/");
                setcookie("nickname", $i["nickname"], time() + (86400 * 30), "/");
                setcookie("email", $i["email"], time() + (86400 * 30), "/");
                setcookie("password", $i["password"], time() + (86400 * 30), "/");
                setcookie("profileImageDir", $i["profileImageDir"], time() + (86400 * 30), "/");
                setcookie("birthday", $i["birthday"], time() + (86400 * 30), "/");
                setcookie("type", $i["type"], time() + (86400 * 30), "/");
            }
            if($i["type"] == "admin"){
                header("location:../admin/index.php");
            }else{
                header("location:notices.php");
            }
        }else{
            $errMsg = 'User ID or password not correct!';
            // header('location:../pages/login.php');
        }
    }
?>