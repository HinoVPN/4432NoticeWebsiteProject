<?php
    include '../function/db_connection.php';
    $currentPage = 'Statistics';

    $connection = OpenCon();

    $noticeQ = mysqli_query($connection, "SELECT * FROM `notices`");

    $chart_data="";
    $ageCounts = [
        '10-19' => 0,
        '20-29' => 0,
        '30-39' => 0,
        '40-49' => 0,
        '50-59' => 0,
    ];

    while ($notice = mysqli_fetch_array($noticeQ)) { 
        $userQ = mysqli_query($connection, "SELECT * FROM `users` WHERE `_id` = '".$notice['userId']."';");
        
        while ($user = mysqli_fetch_array($userQ)) { 
            $currentDate = date("Y-m-d");
             
            $age = date_diff(date_create($user['birthday']), date_create($currentDate));

            if ($age->format("%y") >= 10 and $age->format("%y") <= 19 ){
                $ageCounts['10-19'] +=1;
            }
    
            elseif($age->format("%y") >= 20 and $age->format("%y") <= 29 ){
                $ageCounts['20-29'] +=1;
            }
    
            elseif($age->format("%y") >= 30 and $age->format("%y") <= 39 ){
                $ageCounts['30-39'] +=1;
            }
    
            elseif($age->format("%y") >= 40 and $age->format("%y") <= 49 ){
                $ageCounts['40-49'] +=1;
            }
    
            elseif($age->format("%y") >= 50 and $age->format("%y") <= 59 ){
                $ageCounts['50-59'] +=1;
            }
        }
    }
 
    $keys = array_keys($ageCounts);

    foreach($ageCounts as $key=>$value)
    {
        $ageGroup[]  = $key;
        $count[] = $value;
    }
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
        <div class="container">
            <div style="width:60%;hieght:20%;text-align:center">
                <h2 class="page-header" >System Statistics</h2>
                <div>Product</div>
                <canvas  id="chartjs_bar"></canvas> 
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($ageGroup); ?>,
                datasets: [{
                    backgroundColor: [
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ],
                    data:<?php echo json_encode($count); ?>,
                }]
            },
            options: {
                legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
            }
        });
    </script>

</html>