<?php
    $currentPage = 'ViewUser';
    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/db_connection.php';
    $connection = OpenCon();

    $s = "SELECT users._id as '_id', users.userId as 'User ID', users.nickname as 'Nickname', users.email as 'Email', users.password as 'Password', users.birthday as 'Birthday', users.createdDate as 'CreatedDate', users.type as 'Type', COUNT(comments._id) as 'No. of Comments', COUNT(notices._id) as 'No. of Notices' FROM users LEFT JOIN ( notices LEFT JOIN ( comments ) on comments.notice_id = notices._id ) on users._id = notices.userId GROUP BY users._id;";

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
    }

    CloseCon($connection);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminPage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php include "header.php";?>
        <div class="container mt-3">
            <h2>Registered User</h2>
            <table class="table">
                <thead>
                <tr>
                    <?php
                        foreach($fields as $field){
                            echo "<th>$field</th>";
                        }
                    ?>
                    <!-- <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($allUsers as $user){
                        echo '<tr>';
                        foreach($user as $key => $val) {
                            echo "<td>$val</td>";
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>