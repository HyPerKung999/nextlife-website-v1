<?php 

    session_start();
    unset($_SESSION['user_login']);
    unset($_SESSION['admin_login']);
    header('location: ../_login&signup_page/login.php');

?>