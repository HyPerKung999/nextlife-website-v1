<?php
require_once('./home-fivem-config.php');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $serverIP . "/players.json");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$json;
$serverStatus = 0;

$output = curl_exec($curl);

if (curl_exec($curl) === false){
    $serverStatus = 1;
    echo '<script> console.log("Curl error: ' . curl_error($curl) . '")</script>';
} elseif (!empty(curl_exec($curl)) && !empty($output)) {
    $serverStatus = 2;
    $json = json_decode($output, TRUE, 512, JSON_BIGINT_AS_STRING);
} else {
    $serverStatus = 0;
    echo '<script> console.log("Curl error: ' . curl_error($curl) . '")</script>';
}


curl_close($curl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info</title>
</head>
<body>
    <div class="server-info-container">
    <div class="server-stat-title"><h4>สถานะเซิร์ฟเวอร์:</h4>
    <?php if ($serverStatus === 2){ echo '<div class="server-stat ellipse-green">ออนไลน์</div>'; } elseif ($serverStatus === 1) { echo '<div class="server-stat ellipse-red">ออฟไลน์</div>'; } elseif ($serverStatus === 99) { echo '<div class="server-stat ellipse-red">กำลังปรับปรุง</div>'; } else { echo '<div class="server-stat ellipse-grey">Loading</div>'; } ?>
</div>
    <div class="server-stat-title"><h4>จำนวนผู้เล่น:</h4></div>    
    <?php if ($serverStatus === 2){ echo '<div class="server-stat ellipse-indigo">' . count($json) . '</div>'; } else { echo '<div class="server-stat ellipse-grey">0</div>'; } ?>
    <div class="server-stat-title"><h4>ที่อยู่เซิร์ฟเวอร์:</h4></div>
    <div class="server-stat ellipse-grey"><?php echo $serverIP;?></div>
    </div>
</body>
</html>