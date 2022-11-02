<?php
    $currentPage = 'MyNotice';

    include '../function/searchAllNotices.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Notice</title>
        <link href="../style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php include "../header.php";?>
        <div class="allNoticeSection">
            <div class="allNoticeContainer container d-grid gap-3">
                <h1>My Notice</h1>
                
                <div class="itemSection">
                    <div class="itemContainer container">
                        <div class="items d-grid gap-3">
                            <div class="row mb-2" style="display: flex;justify-content: space-around;">

                                <?php
                                    foreach($myNotices as $notice){
                                        $type = $notice['type'];
                                        $contact = $notice['contact'];
                                        $lostDate = date("Y-m-d H:i:s", strtotime($notice['lostDate']));
                                        $description = $notice["description"];
                                        $venue = $notice["venue"];
                                        $_id = $notice["_id"];
                                        $link = $notice["imageDir"];
                                        $color = $type == 'found'? 'badge-success' : 'badge-danger';
                                        echo "
                                            <div class='card mb-3 ' style='max-width: 540px; height:fit-content;'>
                                                <div class='row g-0'>
                                                    <div class='col-md-4' style='padding: 0;'>
                                                    <img style='width:100%; height:250px; object-fit: cover;' src=$link class='img-fluid rounded-start' alt='...'>
                                                    </div>
                                                    <div class='col-md-8'>
                                                    <div class='card-body' style='height: 100%;>
                                                        <h5 class='card-title'>$venue</h5>
                                                        <p class='card-text JQellipsis'>$description</p>
                                                        <p class='card-text'><small class='text-muted'>$lostDate</small></p>
                                                        <a href='notice.php?mode=view&_id=$_id' class='btn btn-primary stretched-link'>Learn more...</a>
                                                        <span class='badge $color'>$type</span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        

        <script>
            $(function(){
                var len = 100;
                $(".JQellipsis").each(function(i){
                    if($(this).text().length>len){
                        $(this).attr("title",$(this).text());
                        var text=$(this).text().substring(0,len-1)+"...";
                        $(this).text(text);
                    }
                });
            });
        </script>
        

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</html>