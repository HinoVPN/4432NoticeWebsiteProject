<?php
    $currentPage = 'Notice';

    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/db_connection.php';
    $connection = OpenCon();

    $_id = $_GET['_id'];
    $q = "SELECT * FROM notices WHERE _id = '$_id'";

    $result = mysqli_query($connection, $q);

    $singleNotice = null;
    if(mysqli_num_rows($result) == 1){
        while($i = mysqli_fetch_assoc($result)) {
            $singleNotice =  $i;
        }
    }


    $q2 = "SELECT * FROM comments WHERE notice_id = '$_id'";

    $result2 = mysqli_query($connection, $q2);

    $comments = array();
    if(mysqli_num_rows($result2) > 0){
        while($i = mysqli_fetch_assoc($result2)) {
            array_push($comments,$i);
        }
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NoitcePage</title>
        <link href="../style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php include "../header.php";?>
        
        <?php
            if($singleNotice){
                include $_SERVER['DOCUMENT_ROOT'] . "/project/components/noticeContent.php";
            }else{
                echo "<div class='container'><h1>Error</h1></div>";
            }
        ?>

        <script>
            $('#comment').keyup(function() {
                console.log($('#comment').val())
                if($('#comment').val() == ""){
                    $('#submitComment').attr('disabled','disabled');
                }else{
                    $('#submitComment').removeAttr('disabled');
                }
            });
        </script>
        

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</html>