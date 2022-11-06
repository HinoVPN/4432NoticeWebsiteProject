<?php
    $currentPage = "Profile";
    $_id = $_COOKIE["_id"];
    $userId = $_COOKIE["userId"];
    $nickName = $_COOKIE["nickname"];
    $email = $_COOKIE["email"];

    $password = $_COOKIE["password"];

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = "1234567891011121";
    $decryption_key = "hino";

    $encryptedPassword = openssl_decrypt($password, $ciphering, $decryption_key, $options, $decryption_iv);

    $profileImageDir = $_COOKIE["profileImageDir"];
    $birthday = $_COOKIE["birthday"];
    include $_SERVER['DOCUMENT_ROOT'] . '/project/function/updateProfile.php';
    
?>

<?php
    $formInfo = array(
        array("User ID","text","userId","Please enter you user ID",'',$userId),
        array("Nickname","text","nickname","Please enter you nickname",'',$nickName),
        array("Email","email","email","Please enter you email,",'',$email),
        array("Password","password","password","Please enter you password",'',$encryptedPassword),
    );

    if(
        !empty($userIdErr) ||
        !empty($nicknameErr) ||
        !empty($emailErr) ||
        !empty($passwordErr) ||
        !empty($birthdayErr) ||
        !empty($profileImageDirErr)
    ){
        $formInfo[0][4] = $userIdErr;
        $formInfo[1][4] = $nicknameErr;
        $formInfo[2][4] = $emailErr;
        $formInfo[3][4] = $passwordErr;

    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link rel="stylesheet" href="../assets/css/profile.css?v=<?php echo time(); ?>">
        <?php include "../head.php"; ?>
    </head>
    <body>
    <?php include "../header.php";?>
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
            <div class="card p-4"> 
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    <img src=<?php echo $profileImageDir?> height="100" width="100" />
                    <span class="name mt-3"><?php echo $nickName?></span> 
                    <span class="idd"><?php echo $email?></span> 
                     <div class=" d-flex mt-2"> 
                        <button class="btn1 btn-dark" data-bs-toggle='modal' data-bs-target='#profileModal'>Edit Profile</button> 
                    </div> 
                    <div class=" px-2 rounded mt-4 date "> 
                        <span class="join"><?php echo $birthday?></span> 
                    </div> 
                </div>
            </div> 
        </div>
    </div>

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form
                    action="" 
                    method="post" 
                    enctype="multipart/form-data"
                    >
                        <?php
                            
                            for($i = 0 ; $i < count($formInfo); $i++){
                                $title = $formInfo[$i][0];
                                $type = $formInfo[$i][1];
                                $name = $formInfo[$i][2];
                                $placeholder = $formInfo[$i][3];
                                $error = $formInfo[$i][4];
                                $value = $formInfo[$i][5];
                                echo "
                                    <div class='mb-3'>
                                        <label for='$type' class='form-label'>$title<span style='color: red;'>*</span></label>
                                        <input type='$type' name='$name' class='form-control' value='$value' id='$name' placeholder='$placeholder' >
                                        <p style='color: red;'> $error </p>
                                    </div>
                                ";
                                
                            }
                        ?>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Profile Image<span style='color: red;'>*</span></label>
                            <input class="form-control" type="file" name="profileImage" id="profileImage" >
                            <p style='color: red;'> <?php echo $profileImageDirErr ?> </p>
                        </div>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Birthday<span style='color: red;'>*</span></label>
                            <input class="form-control" type="date" name="birthday" value=<?php echo $birthday ?> id="birthday" >
                            <p style='color: red;'> <?php echo $birthdayErr ?> </p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id='submitComment' type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    

    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
</html>