<?php
    // include '../function/db_connection.php';
    include $_SERVER['DOCUMENT_ROOT'] .'/project/function/login.php';

    if(isset($_COOKIE['_id'])){
        if($_COOKIE['type'] == "admin"){
            header("location:/project/admin/index.php");
        }else{
            header("location:/project/pages/signIn.php");
        }
    }

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LoginPage</title>
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
                        <!-- <h3 class="card-title">Sign In</h5> -->
                        <form action="" method="post">
                            <div class="mb-3">
                                <!-- <label for="inputUserId" class="form-label fw-bold">User ID</label> -->
                                <input type="text" 
                                name="userId" 
                                class="form-control form-control-lg" 
                                id="inputUserId" 
                                placeholder= "Please enter user ID"
                                >
                            </div>
                            <div class="mb-3">
                                <!-- <label for="inputPassword" class="form-label fw-bold">Password</label> -->
                                <input 
                                type="password" 
                                name="password" 
                                class="form-control form-control-lg" 
                                id="inputPassword"
                                placeholder= "Please enter password"
                                >
                            </div>
                            <p style='color: red;'> <?php echo $errMsg ?> </p>
                            <button type="submit" class="btn btn-primary btn-block text-center btn-lg fw-bold">Log In</button>
                        </form>
                    </div>
                    <div class="registerButton text-center d-flex flex-column">
                        <button type="button" onclick="route('forget')" class="btn btn-link">Forgotten password?</button>
                    </div>
                    <div class="container">
                        <hr class="bg-dark border-2 border-top border-dark">
                    </div>
                    <div class="container text-center d-flex justify-content-center">
                        <button type="button" onclick="route('registation')" class="btn btn-success btn-lg fw-bold">Create an account</button>
                    </div>
                    <div style="height:20px;" class="space"></div>
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