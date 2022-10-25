<?php
    $currentPage = 'SerachUser';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/project/style.css">
    <?php include "../head.php"; ?>
</head>
<body>
    <?php include "header.php";?>
    <div style="height: 20px;" class="space"></div>
    <div class="container">
        <div class="input-group rounded">
        <input type="search" id='serachId' class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        
        <span class="input-group-text border-0" id="search-addon">
            <button id='serachBtn' style="border:0;">
                <i class="fas fa-search"></i>
            </button>
        </span>
        </div>
    </div>
    <div class="resultTable container mt-3">
            <h2 id="title"></h2>
            <table class="table">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


    
    
    

</body>
<script>
    function showResult(str) {
        if (str.length==0) {
            return;
        }
        $.ajax({
            url: "http://" + window.location.host + "/project/function/searchUserRecord.php",
            type: "POST",
            dataType: "json",
            data: {"userId": str},
            success: function(data){
                console.log(data);
                $('#title').empty();
                $('thead').empty();
                $('tbody').empty();
                $('#title').append('Result')
                let record = data[0]
                for(let key in record){
                        let newHead = document.createElement( "th" )
                        newHead.innerHTML = key
                        $('thead').append(newHead)
                }
                data.forEach(record => {
                    let newRow = document.createElement( "tr" )
                    for(let key in record){
                        let newCell = document.createElement( "td" )
                        newCell.innerHTML = record[key]
                        newRow.appendChild(newCell)
                        // newRow.innerHTML += newCell
                    }
                    $('tbody').append(newRow)
                });
            },
            error: function(error){
                console.log("Error:");
                console.log(error);
                $('thead').empty();
                $('tbody').empty();
                $('#title').empty();
                $('#title').append('No Record Found!');
            }
        });
    }

    $('#serachBtn').click(function() {
        showResult($('#serachId').val())
    });
    
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>