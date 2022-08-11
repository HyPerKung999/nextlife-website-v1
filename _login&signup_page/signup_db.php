<?php
define('SecretKey', '6LdPXlUhAAAAAFR6HjDMqT5JWjmXRDI3qM5z2cK_');
$query_params = [
	'secret' => SecretKey,
	'response' => filter_input(INPUT_POST, 'g-recaptcha-response'),
	'remoteip' => $_SERVER['REMOTE_ADDR']
];
$url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($query_params);
$result = json_decode(file_get_contents($url), true);
if ($result['success']) {

    session_start();
    require_once '../config/db.php';

    if (isset($_POST['signup'])) {
        $nickname = $_POST['nickname'];
        $firstnameic = $_POST['firstnameic'];
        $lastnameic = $_POST['lastnameic'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($nickname)) {
            $_SESSION['error-notusername'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (empty($firstnameic)) {
            $_SESSION['error-notfirstname'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (empty($lastnameic)) {
            $_SESSION['error-notlastname'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (empty($email)) {
            $_SESSION['error-notemail'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error-filteremail'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (empty($password)) {
            $_SESSION['error-notpassword'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error-passwordshort'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if (empty($c_password)) {
            $_SESSION['error-passwordconfirm'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else if ($password != $c_password) {
            $_SESSION['error-notmathpassword'] = '';
            header("location:  ../_login&signup_page/signup.php");
        } else {
            try {

                $check_nickname = $conn->prepare("SELECT nickname FROM users WHERE nickname = :nickname");
                $check_nickname->bindParam(":nickname", $nickname);
                $check_nickname->execute();
                $row = $check_nickname->fetch(PDO::FETCH_ASSOC);

                if ($row['nickname'] == $nickname){
                    $_SESSION['error-haveacc'] = "";
                    header("location:  ../_login&signup_page/signup.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(nickname,firstnameic, lastnameic, email, password, urole) 
                                            VALUES(:nickname, :firstnameic, :lastnameic, :email, :password, :urole)");
                    $stmt->bindParam(":nickname", $nickname);
                    $stmt->bindParam(":firstnameic", $firstnameic);
                    $stmt->bindParam(":lastnameic", $lastnameic);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "";
                    header("location:  ../_login&signup_page/signup.php");
                } else {
                    $_SESSION['error-error'] = "";
                    header("location:  ../_login&signup_page/signup.php");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}else{
    session_start();
    require_once '../config/db.php';
    $_SESSION['error-check'] = "";
    header("location:  ../_login&signup_page/signup.php");
}
?>