<?php
    include 'db_connection.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    $connection = OpenCon();

    $commentErr = "";

    $_id = $notice_id = $userId = $content = $createdDate = '';
    $reply = 'null';
    $reply_id = 'null';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_id = uniqid();
        $notice_id = $_POST["notice_id"];
        $userId = $_COOKIE["_id"];
        $content = $_POST["comment"];
        $dateTime = new DateTime();
        $createdDate = $dateTime -> format('m/d/Y g:i A');

        
        $req = "
        INSERT INTO comments(
            _id,
            notice_id,
            userId,
            reply,
            reply_id,
            content,
            createdDate
            ) VALUES (
                '$_id',
                '$notice_id',
                '$userId',
                $reply,
                $reply_id,
                '$content',
                '$createdDate'
            )";

        $final = mysqli_query($connection, $req);

        $reg2 = "UPDATE notices SET type = 'found', foundDate = '$createdDate'  WHERE _id = '$notice_id'";
        mysqli_query($connection, $reg2);


        header('location:/project/pages/notice.php?mode=view&_id='.$notice_id);
        
        
    }
    CloseCon($connection)
    
?>