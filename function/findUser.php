<?php
    include 'db_connection.php';
    $errMsg = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = OpenCon();
        $userId = $_POST['userId'];
        $birthday = $_POST['birthday'];
        $s = "SELECT * FROM users WHERE BINARY userId = '$userId' && birthday = '$birthday'";
        $result = mysqli_query($connection, $s);
        if(mysqli_num_rows($result) == 1){
            while($i = mysqli_fetch_assoc($result)) {
                header("location: resetPassword.php?userId=$userId");
            }
        }else{
            $errMsg = 'User ID or birthday not correct!';
        }
    }
?>