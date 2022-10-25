<?php
    include 'db_connection.php';
    $errMsg = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();

        // $username = $_POST['username'];
        $userId = $_POST['userId'];
        $birthday = $_POST['birthday'];
        // echo $userId;
        // echo $password;
    
        $s = "SELECT * FROM users WHERE userId = '$userId' && birthday = '$birthday'";
    
        $result = mysqli_query($connection, $s);
        // print_r($result);
        // echo mysqli_num_rows($result);
    
        
        if(mysqli_num_rows($result) == 1){
            while($i = mysqli_fetch_assoc($result)) {
                header("location: resetPassword.php?userId=$userId");
            }
        }else{
            $errMsg = 'User ID or birthday not correct!';
            // header('location:../pages/login.php');
        }
    }
?>