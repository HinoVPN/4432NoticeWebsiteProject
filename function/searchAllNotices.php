<?php
    include '../function/db_connection.php';
    $connection = OpenCon();
    $q = "SELECT * FROM notices WHERE type = 'lost'";

    $result = mysqli_query($connection, $q);
    $allNotices = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($allNotices, $i);
        }
    }

    CloseCon($connection);
?>

<?php
    $user_id = $_COOKIE['_id'];
    $connection = OpenCon();
    $q2 = "SELECT * FROM notices WHERE type = 'lost' AND userId = '$user_id'";

    $result = mysqli_query($connection, $q2);
    $myNotices = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($myNotices, $i);
        }
    }
    CloseCon($connection);
?>