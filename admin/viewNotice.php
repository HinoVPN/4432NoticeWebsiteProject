<?php
    $currentPage = 'ViewNotice';
    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/db_connection.php';
    $connection = OpenCon();

    $s = "SELECT * FROM `notices` WHERE type = 'lost'";

    $result = mysqli_query($connection, $s);
    $fieldinfo = mysqli_fetch_fields($result);

    $fields = array();
    foreach($fieldinfo as $field){
        array_push($fields, $field->name);
    }
    $allLost = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($allLost, $i);
        }
    }

    $s2 = "SELECT * FROM `notices` WHERE type = 'found'";

    $result2 = mysqli_query($connection, $s2);
    $fieldinfo2 = mysqli_fetch_fields($result2);

    $fields2 = array();
    foreach($fieldinfo2 as $field){
        array_push($fields2, $field->name);
    }
    $allFound = array();
    if(mysqli_num_rows($result2) > 0){
        while($i = mysqli_fetch_assoc($result2)) {
            array_push($allFound, $i);
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
        <h2>Pending</h2>
        <div class="card">

        </div>
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
                foreach($allLost as $lost){
                    echo '<tr>';
                    foreach($lost as $key => $val) {
                        if($key == "imageDir"){
                            echo "<td><img src=$val /></td>";
                        }else{
                            echo "<td>$val</td>";
                        }
                        
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>

        <div class="container mt-3">
        <h2>Completed</h2>
        <div class="card">

        </div>
        <table class="table">
            <thead>
            <tr>
                <?php
                    foreach($fields2 as $field){
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
                foreach($allFound as $found){
                    echo '<tr>';
                    foreach($found as $key => $val) {
                        if($key == "imageDir"){
                            echo "<td><img src=$val /></td>";
                        }else{
                            echo "<td>$val</td>";
                        }
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