<div class="container">
    <hr class="bg-dark border-2 border-top border-dark">
</div>

<div class="text">
    <h3>Recent comments </h3>
</div>

<?php

foreach($comments as $comment){
    $_id = $comment["_id"];
    $userId = $comment['userId'];
    $content = $comment['content'];
    $createdDate = date("Y-m-d H:i:s", strtotime($comment['createdDate']));

    $user_info = null;
    $connection = OpenCon();
    $s = "SELECT * FROM users WHERE _id = '$userId'";
    $result = mysqli_query($connection, $s);
    if(mysqli_num_rows($result) == 1){
        while($i = mysqli_fetch_assoc($result)) {
            $user_info = $i;
        }
    }
    
    $user_name = $user_info['nickname'];
    $avatar = $user_info['profileImageDir'];
    CloseCon($connection);

    // echo "
    //     <div class='container p-3'>
    //         <h5 class='card-title'>User: $user_name</h5>
    //         <p class='card-text'>Comment: </p>
    //         <p class='card-text'>$content</p>
    //         <p class='card-text'><small class='text-muted'>$createdDate</small></p>
    //     </div>

    // ";

    echo "
    
    <div class='d-flex flex-start'>
        <img class='rounded-circle shadow-1-strong me-3'
        src=$avatar alt='avatar' width='60' height='60' />
        <div>
            <h6 class='fw-bold mb-1'>$user_name</h6>
            <div class='d-flex align-items-center mb-3'>
                <p class='mb-0'>
                $createdDate
                </p>
            </div>
            <p class='mb-0'>
                $content 
            </p>
        </div>
    </div>
    
    ";
}

?>