<?php
session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error-login'] = 'กรุณาเข้าสู่ระบบก่อน';
    header('location: index-not-login.php');
}
?>

<?php
include('./home-fivem-config.php');
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link rel="icon" type="image/x-icon" href="img/nextlife-logo-icon.png">

    <link rel="stylesheet" href="assets/css/home-one.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/8ebe3f6657.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="header">
        <div class="inner-header flex">
            <?php
            if (isset($_SESSION['admin_login'])) {
                $user_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <header class="p-3 text-bg-dark">
                <div class="container">
                    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-light text-decoration-none">
                            <svg class="bi me-2" width="40" height="32"></svg>
                            <span class="fs-4">NextLife City</span>
                        </a>
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a href="" class="nav-link active" aria-current="page"><i class="fa-solid fa-house-chimney"></i> หน้าหลัก</a></li>
                            <li class="nav-item"><a href="_page/shop.php" class="nav-link"><i class="fa-solid fa-basket-shopping"></i> ร้านค้า</a></li>
                            <li class="nav-item"><a href="_page/rules.php" class="nav-link"><i class="fa-solid fa-scale-balanced"></i> กฏต่างๆ</a></li>
                            <li class="nav-item"><a href="_page/how.php" class="nav-link"><i class="fa-solid fa-graduation-cap"></i> คู่มือการเล่น</a></li>
                            <li class="nav-item"><a href="_page/crafting-table.php" class="nav-link"><i class="fa-solid fa-hammer"></i> โต๊ะคราฟ</a></li>
                            <li class="nav-item"><a href="_page/map.php" class="nav-link"><i class="fa-solid fa-map-location-dot"></i> แผนที่</a></li>
                            <li class="nav-item"><a href="_profile_page/home-profile.php" class="nav-link"><i class="fa-solid fa-user"></i> โปรไฟล์</a></li>
                            <li class="nav-item"><a href="_login&signup_page/logout.php" class="nav-link-logout"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </header>
                </div>
            </header>
        </div>
    </div>

    <main>
        <section class="server-info" id="server-status">
            <div class="server-info-container">
                <div class="server-stat-title">
                    <h4>Server status:</h4>
                </div>
                <div class="server-stat ellipse-grey">Loading</div>
                <div class="server-stat-title">
                    <h4>Online Players:</h4>
                </div>
                <div class="server-stat ellipse-grey">0</div>
                <div class="server-stat-title">
                    <h4>IP Address:</h4>
                </div>
                <div class="server-stat ellipse-grey"><?php echo $serverIP; ?></div>
            </div>
        </section>
        <section class="online-players" id="player-cards">
        </section>
    </main>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1">By.HyPerKung | Copyright © 2022 - NextLife City</p>
        </div>
    </footer>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

<script>
    // --------- FiveM Status --------- //
    $(document).ready(function() {
        $("#server-status").load("./home-fivem-server-info.php");
        var intervalId = window.setInterval(function() {
            $("#server-status").load("./home-fivem-server-info.php");
        }, <?php echo $updateFrequency; ?>);
    });
    console.log('%cphp FiveM Server Info', 'color: white; font-size: 24px;'); // Do NOT remove or modify this part, removal or modification of this part will lead to violation of product rules. Removal only allowed with approval from Fredney#3776
    console.log('%cOriginally uploaded to https://fivemods.net', 'color: white; font-size: 16px;'); // Do NOT remove or modify this part, removal or modification of this part will lead to violation of product rules. Removal only allowed with approval from Fredney#3776
    console.log('%cMade by Fredney#3776 and Awesome_core1#4619', 'color: white; font-size: 16px;'); // Do NOT remove or modify this part, removal or modification of this part will lead to violation of product rules. Removal only allowed with approval from Fredney#3776
</script>