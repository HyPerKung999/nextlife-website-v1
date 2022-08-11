<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/login&register.css">
    <link rel="stylesheet" href="../assets/css/background/background-two.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="../img/nextlife-logo-icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
    <div class="container">
        <div class="modal modal-tour position-static d-block py-5 modal-login-position" tabindex="-1" role="dialog" id="modalTour">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-body p-5">
                        <h1 class="head-text-position head-text-color-loginsuccess">เข้าสู่ระบบ</h1>
                        <form action="../_login&signup_page/login_db.php" method="post">
                            <?php if (isset($_SESSION['error-check'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-check'];
                                    unset($_SESSION['error-check']);
                                    ?>  
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณายืนยันตัวตน!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-password'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-password'];
                                    unset($_SESSION['error-password']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "รหัสผ่านไม่ถูกต้อง!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-login'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-login'];
                                    unset($_SESSION['error-login']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณาเข้าสู่ระบบ!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-username'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-username'];
                                    unset($_SESSION['error-username']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "ชื่อผู้ใช้ไม่ถูกต้อง!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-null'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-null'];
                                    unset($_SESSION['error-null']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "ไม่พบข้อมูลในระบบ!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notusername'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notusername'];
                                    unset($_SESSION['error-notusername']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณากรอกชื่อผู้ใช้! (ชื่อที่แสดงบนหน้าโปรไฟล์)", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notpassword'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notpassword'];
                                    unset($_SESSION['error-notpassword']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-passwordshort'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-passwordshort'];
                                    unset($_SESSION['error-passwordshort']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "เข้าสู๋ระบบสำเร็จ!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "success", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "login.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">ชื่อผู้ใช้ (ชื่อที่แสดงบนหน้าโปรไฟล์)</label></i>
                                <input type="nickname" class="form-control" name="nickname" aria-describedby="nickname">

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="g-recaptcha" data-sitekey="6LdPXlUhAAAAADwX-7hL0WVnr4YryvN2zUHn8dT1"></div>

                            <button type="submit" name="signin" class="containerbutton containerbutton-green">
                                เข้าสู่ระบบ »
                                <div class="fill-green"></div>
                            </button>
                            <div class="containerbutton containerbutton-yellow">
                                <a href="../_login&signup_page/signup.php" role="button">
                                    <button>
                                        สมัครสมาชิก »
                                        <div class="fill-yellow"></div>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>