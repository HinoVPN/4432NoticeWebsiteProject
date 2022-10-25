<?php
    if(!isset($_COOKIE['type'])){
        if($_COOKIE['type'] != "admin"){
            header("location:/project/pages/signIn.php");
        }
    }
    $icon = null;
    $currentPage = $currentPage? $currentPage: null;
    $viewUser = "ViewUser";
    $viewNotice = "ViewNotice";
    $serachUser = "SerachUser";
    $statistics = "Statistics";
?>
<header class="p-3 bg-secondary text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/project/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img style="width: 30px;" src=<?php echo "/project/assets/slogo.png"?> alt="">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a 
                    href="/project/admin/"
                    class="nav-link px-2 <?php echo $currentPage==$viewUser? "text-dark":"text-white";?>"
                    >
                    <?php echo $viewUser;?>
                    </a>
                </li>
                <li>
                    <a 
                    href="/project/admin/viewNotice.php"
                    class="nav-link px-2 <?php echo $currentPage==$viewNotice? "text-dark":"text-white";?>"
                    >
                    <?php echo $viewNotice;?>
                    </a>
                </li>
                <li>
                    <a 
                    href="/project/admin/serachUser.php"
                    class="nav-link px-2 <?php echo $currentPage==$serachUser? "text-dark":"text-white";?>"
                    >
                    <?php echo $serachUser;?>
                    </a>
                </li>
                <li>
                    <a 
                    href="/project/admin/statistics.php"
                    class="nav-link px-2 <?php echo $currentPage==$statistics? "text-dark":"text-white";?>"
                    >
                    <?php echo $statistics;?>
                    </a>
                </li>
                <?php
                    if($_COOKIE['type'] == 'admin'){
                        echo "
                        <li>
                            <a href='/project/'><button type='button' class='btn btn-primary'>Go to Site</button></a>
                        </li>
                        ";
                    }
                ?>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fw-bold">Welcome </span>
                    <span class="fw-normal"><?php echo $_COOKIE["nickname"]; ?></span>
                    <img src="<?php echo $icon? $icon: $_COOKIE["profileImageDir"]; ?>" alt="icon" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href=<?php echo "http://".$_SERVER['HTTP_HOST']."/project/pages/profile.php"?>>Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href=<?php echo "http://".$_SERVER['HTTP_HOST']."/project/function/logout.php"?>>Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="space"></div>