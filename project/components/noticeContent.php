<div class="allNoticeSection">
            <div class="allNoticeContainer container d-grid gap-3">
                <h1>Notice</h1>
                
                <div class="itemSection">
                    <div class="itemContainer container">
                        <div class="items d-grid gap-3">
                            <div class="row mb-2" style="display: flex;justify-content: space-around;">

                                <?php
                                        $type = $singleNotice['type'];
                                        $contact = $singleNotice['contact'];
                                        $lostDate = date("Y-m-d H:i:s", strtotime($singleNotice['lostDate']));
                                        $description = $singleNotice["description"];
                                        $venue = $singleNotice["venue"];
                                        $_id = $singleNotice["_id"];
                                        $link = $singleNotice["imageDir"];
                                        $createdDate = $singleNotice["createdDate"];

                                        $commentErr = '';
                                ?>

                                <div class="container d-grid gap-3">
                                    <div class="container-fluid d-flex justify-content-center">
                                        <img style="min-height: 140px; max-height: 400px" src=<?php echo $link;?> class="img-fluid" alt="...">
                                    </div>
                                    <div class="container">
                                        <div class="text">
                                            <h5>Lost Date: <?php echo $lostDate;?></h5>
                                        </div>
                                        <div class="text">
                                            <h3>Venue: <?php echo $venue;?></h3>
                                        </div>
                                        <hr class="bg-dark border-2 border-top border-dark">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <p class="fw-normal text-muted">Created Date: <?php echo $createdDate;?></p>
                                            </div>
                                            <div class="col">
                                                <p class="text-end fw-normal text-muted">State: <?php echo $type;?></p>
                                            </div>
                                        </div>

                                        <div class="fs-4 fw-normal">Description</div>

                                        <p class="lh-lg"><?php echo $description;?></p>
                                        
                                        
                                    </div>
                                </div>

                                

                                <div class="container">
                                    <!-- Button trigger modal -->
                                    <?php 
                                        if($type == 'lost'){
                                            echo "
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#commentModal'>
                                                Comment
                                            </button>
                                            ";
                                        }
                                    ?>
                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                action="/project/function/createComment.php" 
                                                method="post" 
                                                enctype="multipart/form-data"
                                                >
                                                    <input type="hidden" name="notice_id" value=<?php echo $_id;?>>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <i class="fa-regular fa-clipboard"></i>
                                                            </div>
                                                            <textarea id="comment" name="comment" class="form-control" aria-label="With textarea" rows="7"></textarea>
                                                            
                                                        </div>
                                                        <?php echo "<p style='color: red;'> $commentErr </p>"?>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id='submitComment' type="submit" class="btn btn-primary" disabled>Post Comment</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    if(!$singleNotice){
                                        echo "";
                                    }
                                    else if($comments){
                                        include $_SERVER['DOCUMENT_ROOT'] . "/project/components/noticeComment.php";
                                    }else{
                                        echo "<div class='container'><h5>No Comment </h5></div>";
                                    }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>