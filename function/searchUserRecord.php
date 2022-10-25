<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/db_connection.php';
    $connection = OpenCon();
    $id = $_POST['userId'];
    $s = "SELECT users.userId as 'User ID', users.nickname as 'Nickname', users.email as 'Email', users.password as 'Password', users.birthday as 'Birthday', users.createdDate as 'CreatedDate', users.type as 'Type', COUNT(comments._id) as 'No. of Comments', COUNT(notices._id) as 'No. of Notices' FROM users LEFT JOIN ( notices LEFT JOIN ( comments ) on comments.notice_id = notices._id ) on users._id = notices.userId WHERE users.userId = '$id' GROUP BY users._id;";

    $result = mysqli_query($connection, $s);
    $fieldinfo = mysqli_fetch_fields($result);

    $fields = array();
    foreach($fieldinfo as $field){
        array_push($fields, $field->name);
    }
    $allUsers = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($allUsers, $i);
        }

        echo json_encode($allUsers);
    }else{
        echo 'Nothing';
    }

    CloseCon($connection);
}


?>