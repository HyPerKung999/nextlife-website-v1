<?php

session_start();
require_once '../config/db.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error-login'] = 'กรุณาเข้าสู่ระบบก่อน';
    header('location: ../_login&signup_page/login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผนที่</title>
    <link rel="icon" type="image/x-icon" href="../img/nextlife-logo-icon.png">

    <link rel="stylesheet" href="../assets/css/home-one.css">
    <link rel="stylesheet" href="../assets/css/dropdown-one.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/8ebe3f6657.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-light text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"></svg>
                    <span class="fs-4">NextLife City</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="../index.php" class="nav-link"><i class="fa-solid fa-house-chimney"></i> หน้าหลัก</a></li>
                    <li class="nav-item"><a href="shop.php" class="nav-link"><i class="fa-solid fa-basket-shopping"></i> ร้านค้า</a></li>
                    <li class="nav-item"><a href="rules.php" class="nav-link"><i class="fa-solid fa-scale-balanced"></i> กฏต่างๆ</a></li>
                    <li class="nav-item"><a href="how.php" class="nav-link"><i class="fa-solid fa-graduation-cap"></i> คู่มือการเล่น</a></li>
                    <li class="nav-item"><a href="crafting-table.php" class="nav-link"><i class="fa-solid fa-hammer"></i> โต๊ะคราฟ</a></li>
                    <li class="nav-item"><a href="" class="nav-link active" aria-current="page"><i class="fa-solid fa-map-location-dot"></i> แผนที่</a></li>
                    <li class="nav-item"><a href="_profile_page/home-profile.php" class="nav-link"><i class="fa-solid fa-user"></i> โปรไฟล์</a></li>
                    <li class="nav-item"><a href="_login&signup_page/logout.php" class="nav-link-logout"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                </ul>
            </header>
        </div>
    </header>
</body>

</html>