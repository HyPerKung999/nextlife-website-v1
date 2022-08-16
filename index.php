<?php
session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error-login'] = 'กรุณาเข้าสู่ระบบก่อน';
    header('location: index-not-login.php');
}
?>

<?php
require_once('./home-fivem-config.php');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $serverIP . "/players.json");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$json;
$serverStatus = 0;

$output = curl_exec($curl);

if (curl_exec($curl) === false) {
    $serverStatus = 2;
    echo '<script> console.log("Curl error: ' . curl_error($curl) . '")</script>';
} elseif (!empty(curl_exec($curl)) && !empty($output)) {
    $serverStatus = 1;
    $json = json_decode($output, TRUE, 512, JSON_BIGINT_AS_STRING);
} else {
    $serverStatus = 0;
    echo '<script> console.log("Curl error: ' . curl_error($curl) . '")</script>';
}


curl_close($curl);
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
    <link rel="stylesheet" href="assets/css/fivem-status.css">
    <link rel="stylesheet" href="assets/css/discord-home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/8ebe3f6657.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">

</head>

<body>
    <!----- Head Menu ----->
    <div class="header">
        <div class="inner-header flex">
            <?php
            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
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
                            <?php
                            if ($row['admin'] == 'superadmin') {
                                echo '<li class="nav-item"><a href="_page/admin.php" class="nav-link"><i class="fa-solid fa-lock"></i>  เมนูแอดมิน</a></li>';
                            }
                            ?>
                            <li class="nav-item"><a href="_login&signup_page/logout.php" class="nav-link-logout"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </header>
                </div>
            </header>
        </div>
    </div>

    <!----- Head Text ----->
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">ข่าวสาร & อัพเดต</h1>
                    <p class="lead text-muted">สามารถติดตามข่าวสารและอัพเดตต่างๆได้ที่นี่เลย</p>
                </div>
            </div>
        </section>
    </main>


    <!----- FiveM Status ----->
    <section class="fivem-col">
        <h1 class="fivem-text-top">NEXTLIFE SERVER</h1>
        <div class="fivem-box">
            <div class="fivem-head-text-box">
                <p>สถานะ</p>
            </div>
            <div class="fivem-card">
                <?php
                require_once('./config/admin_one.php');
                if ($admin_fivem_status_control == "A") {
                    if ($serverStatus === 1) {
                        echo '<div">ออนไลน์</div>';
                    } elseif ($serverStatus === 2) {
                        echo '<div">ออฟไลน์</div>';
                    } elseif ($serverStatus === 99) {
                        echo '<div">กำลังปรับปรุง</div>';
                    } else {
                        echo '<div">กำลังโหลด</div>';
                    }
                } elseif ($admin_fivem_status_control == "M");
                if ($admin_fivem_status == "online") {
                    echo '<div">ออนไลน์</div>';
                } elseif ($admin_fivem_status == "offline") {
                    echo '<div">ออฟไลน์</div>';
                } elseif ($admin_fivem_status == "edit") {
                    echo '<div ">กำลังปรับปรุง</div>';
                } else {
                    echo '<div">กำลังโหลด</div>';
                }
                ?>
            </div>
        </div>
        <div class="fivem-box">
            <div class="fivem-head-text-box">
                <p>จำนวนผู้เล่น</p>
            </div>
            <div class="fivem-card fivem-card-player">
                <?php if ($serverStatus === 2) {
                    echo '<div>' . count($json) . ' คน</div>';
                } else {
                    echo '<div>0 คน</div>';
                } ?>
            </div>
        </div>
        <div class="fivem-box">
            <div class="fivem-head-text-box-ip">
                <p>ที่อยู่เซิร์ฟเวอร์</p>
            </div>
            <div class="fivem-card-ip">
                <div>IP : 49.231.43.58</div>
                <button class="button-copy-fivem">คัดลอก</button>
            </div>
        </div>
        <button title="button title" class="button-open-fivem" onclick=" window.open('fivem://connect/49.231.43.58:30120', '_blank'); return sfalse;">กดเพื่อเข้าร่วมเซิร์ฟเวอร์</button>
    </section>


    <!----- Discord ----->
    <div class="discord-box">
        <p class="Discord-Head-Text">DISCORD</p>
        <div class="discord-widget">
            <iframe src="https://discord.com/widget?id=1007469968692101243&theme=dark" width="250" height="380" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
        </div>
        <p class="Discord-Text">สามารถติดตามเรื่องราวต่างๆของประเทศได้ที่ Discord : NEXTLIFE CITY [NEWGEN]</p>
        <button title="button title" class="button-link-discord" onclick=" window.open('https://discord.io/NextLifeCity/', '_blank'); return sfalse;">กดเพื่อเข้าร่วม Discord</button>
    </div>

    <!----- Copyright ----->
    <footer class="text-muted py-5 ">
        <div class="container">
            <p class="mb-1">By.HyPerKung | Copyright © 2022 - NextLife City</p>
        </div>
    </footer>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
<!----- FiveM Copy Button ----->
<script>
    const button = document.querySelector(".fivem-card-ip button");

    button.addEventListener("click", () => {
        copyToClipBoard();
    });

    function copyToClipBoard() {
        const textarea = document.createElement("textarea");
        textarea.setAttribute("readonly", "");
        textarea.value = 'connect 49.231.43.58';
        textarea.style.position = "absolute";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
    }
</script>

<!----- FiveM Status ----->
<script>
    $(document).ready(function() {
        $("#server-status").load("./home-fivem-server-info.php");
        var intervalId = window.setInterval(function() {
            $("#server-status").load("./home-fivem-server-info.php");
        }, <?php echo $updateFrequency; ?>);
    });
</script>