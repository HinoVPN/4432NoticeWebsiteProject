<?php
    include "../function/noticeCreate.php";
    $currentPage = 'CreateNotice';
    echo $lostDateErr;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HomePage</title>
        <link href="../style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <?php include "../head.php"; ?>
    </head>
    <body>
        <?php include "../header.php";?>

        <div class="createNoticeSection">
            <div class="createNoticeConatiner container card">
                <div class="formContainer card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <legend>Create Notice</legend>
                    <div class="form-group">
                        <label for="date">Lost Date</label> 
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fa fa-calendar-o"></i>
                            </div>
                        </div> 
                        <input id="lostDate" name="lostDate" type="datetime-local" class="form-control">
                        </div>
                        <?php echo "<p style='color: red;'> $lostDateErr </p>"?>
                    </div>

                    <div class="form-group">
                        <label for="venue">Venue</label> 
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fa fa-bank"></i>
                            </div>
                        </div> 
                            <input id="venue" name="venue" placeholder="Please Enter the venue" type="text" class="form-control">
                        </div>
                        <?php echo "<p style='color: red;'> $venueErr </p>"?>

                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label> 
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fa fa-phone-square"></i>
                            </div>
                        </div> 
                            <input id="contact" name="contact" placeholder="(e.g. phone number)" type="text" class="form-control">
                        </div>
                        <?php echo "<p style='color: red;'> $contactErr </p>"?>
                    </div>

                    <div class="form-group">
                        <label>Type</label> 
                        <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="type" id="type_0" type="radio" class="custom-control-input" value="lost" required="required"> 
                            <label for="type_0" class="custom-control-label">Lost</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="type" id="type_1" type="radio" class="custom-control-input" value="found" required="required"> 
                            <label for="type_1" class="custom-control-label">Found</label>
                        </div>
                        </div>
                        <?php echo "<p style='color: red;'> $typeErr </p>"?>
                    </div>

                    <div class="form-group">
                        <label for="text">Description</label> 
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fa-regular fa-clipboard"></i>
                            </div>
                            <textarea name="description" class="form-control" aria-label="With textarea" rows="7"></textarea>
                            
                        </div>
                        <?php echo "<p style='color: red;'> $descriptionErr </p>"?>
                    </div>



                    <div class="form-group">
                        <label for="text">Image</label> 
                        <div class="input-group mb-3">
                            <!-- <label class="input-group-text" for="inputGroupFile01">Upload</label> -->
                            <input name="noticeImg" type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <?php echo "<p style='color: red;'> $noticeImgErr </p>"?>
                    </div>

                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
        
        

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</html>