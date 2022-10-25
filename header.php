<?php
    if(!isset($_COOKIE['_id'])){
        header("location:/project/pages/signIn.php");
    }
    $icon = null;
    $currentPage = $currentPage? $currentPage: null;
    $home = "Home";
    $notices = "Notices";
    $myNotice = "MyNotice";
    $createNotice = "CreateNotice";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="/project/" class="d-flex align-items-center loginTitle navbar-brand text-dark text-decoration-none">
        <img style="width: 30px;" src=<?php echo "/project/assets/logo.png"?> alt="FYI"> <span>Find Your Item</span> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a 
                href="/project/pages/notices.php"
                class="nav-link <?php echo $currentPage==$notices? "text-dark fw-bolder":"fw-normal"?>"
                >
                <?php echo $notices?>
            </a>
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
            <a 
                href="/project/pages/myNotice.php"
                class="nav-link <?php echo $currentPage==$myNotice? "text-dark fw-bolder":"fw-normal"?>"
                >
                <?php echo $myNotice?>
            </a>
        </li>
        <li class="nav-item">
            <a 
                href="/project/pages/createNotice.php"
                class="nav-link <?php echo $currentPage==$createNotice? "text-dark fw-bolder":"fw-normal"?>"
                >
                <?php echo $createNotice?>
            </a>
        </li>
        <?php
            if($_COOKIE['type'] == 'admin'){
                echo "
                <li>
                    <a href='/project/admin'><button type='button' class='btn btn-primary'>Dashboard</button></a>
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
                <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
                <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
                <li><a class="dropdown-item" href=<?php echo "http://".$_SERVER['HTTP_HOST']."/project/pages/profile.php"?>>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href=<?php echo "http://".$_SERVER['HTTP_HOST']."/project/function/logout.php"?>>Sign out</a></li>
            </ul>
        </div>
    </div>
  </div>
</nav>
<div class="space"></div>