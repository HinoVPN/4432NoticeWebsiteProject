<?php
    // include '../function/db_connection.php';
    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/registation.php';
    

    $formInfo = array(
        array("User ID","text","userId","Please enter you user ID",''),
        array("Nickname","text","nickname","Please enter you nickname",''),
        array("Email","email","email","Please enter you email,",''),
        array("Password","password","password","Please enter you password",''),
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

        // $formInfo[4][5] = $birthdayErr;
        // $formInfo[5][5] = $profileImageDirErr;
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RegistationPage</title>
    <link href="../style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <?php include "../head.php"; ?>
</head>
<body>
    <div class="loginSection section">
        <div class="loginContainer container">
            <div class="loginLeft">
                <h1 class="loginTitle" >Find Your Item</h1>
                <img class="loginLogo" style="" src="https://img.icons8.com/pastel-glyph/512/000000/box--v1.png"/>
            </div>
            <div class="loginRight">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Register Yourself</h5>
                        
                        <form action="signUp.php" method="post" enctype="multipart/form-data">
                            <?php
                                
                                for($i = 0 ; $i < count($formInfo); $i++){
                                    $title = $formInfo[$i][0];
                                    $type = $formInfo[$i][1];
                                    $name = $formInfo[$i][2];
                                    $placeholder = $formInfo[$i][3];
                                    $error = $formInfo[$i][4];
                                    echo "
                                        <div class='mb-3'>
                                            <label for='$type' class='form-label'>$title<span style='color: red;'>*</span></label>
                                            <input type='$type' name='$name' class='form-control' id='$name' placeholder='$placeholder' >
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
                                <input class="form-control" type="date" name="birthday" id="birthday" >
                                <p style='color: red;'> <?php echo $birthdayErr ?> </p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="registerButton text-center">
                                <button type="button" onclick="route('login')" class="btn btn-link">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>