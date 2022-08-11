<?php
define('SecretKey', '6LdPXlUhAAAAAFR6HjDMqT5JWjmXRDI3qM5z2cK_');
$query_params = [
    'secret' => SecretKey,
    'response' => filter_input(INPUT_POST, 'g-recaptcha-response'),
    'remoteip' => $_SERVER['REMOTE_ADDR']
];
$url = 'https://www.google.com/recaptcha/api/siteverify?' . http_build_query($query_params);
$result = json_decode(file_get_contents($url), true);
if ($result['success']) {

    session_start();
    require_once '../config/db.php';

    if (isset($_POST['signin'])) {
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];


        if (empty($nickname)) {
            $_SESSION['error-notusername'] = '';
            header("location: ../_login&signup_page/login.php");
        } else if (empty($password)) {
            $_SESSION['error-notpassword'] = '';
            
            header("location: ../_login&signup_page/login.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error-passwordshort'] = '';
            header("location: ../_login&signup_page/login.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM users WHERE nickname = :nickname");
                $check_data->bindParam(":nickname", $nickname);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($nickname == $row['nickname']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: ../_login&signup_page/admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: ../_login&signup_page/loginsuccess.php");
                            }
                        } else {
                            $_SESSION['error-password'] = '';
                            header("location: ../_login&signup_page/login.php");
                        }
                    } else {
                        $_SESSION['error-username'] = '';
                        header("location: ../_login&signup_page/login.php");
                    }
                } else {
                    $_SESSION['error-null'] = "";
                    header("location: ../_login&signup_page/login.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
} else {
    session_start();
    require_once '../config/db.php';
    $_SESSION['error-check'] = "";
    header("location: ../_login&signup_page/login.php");
}
