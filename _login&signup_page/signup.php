<?php

session_start();
require_once '../config/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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
</head>

<body>
    <div class="container">
        <div class="modal modal-tour position-static d-block py-5 modal-signup-position" tabindex="-1" role="dialog" id="modalTour">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-body p-5">
                        <h1 class="head-text-position">สมัครสมาชิก</h1>
                        <form action="signup_db.php" method="post">
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
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notfirstname'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notfirstname'];
                                    unset($_SESSION['error-notfirstname']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณากรอกชื่อ! (IC)", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notlastname'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notlastname'];
                                    unset($_SESSION['error-notlastname']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณากรอกนามสกุล! (IC)", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notemail'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notemail'];
                                    unset($_SESSION['error-notemail']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณากรอกอีเมล!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-filteremail'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-filteremail'];
                                    unset($_SESSION['error-filteremail']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "รูปแบบอีเมลไม่ถูกต้อง!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
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
                                                title: "กรุณากรอกรหัสผ่าน!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
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
                                                title: "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-passwordconfirm'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-passwordconfirm'];
                                    unset($_SESSION['error-passwordconfirm']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "กรุณายืนยันรหัสผ่าน!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-notmathpassword'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-notmathpassword'];
                                    unset($_SESSION['error-notmathpassword']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "รหัสผ่านไม่ตรงกัน!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "warning", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
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
                                                title: "สมัครสมาชิกเรียบร้อยแล้ว!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
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
                            <?php if (isset($_SESSION['error-error'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-error'];
                                    unset($_SESSION['error-error']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "มีบางอย่างผิดพลาด!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error-haveacc'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-haveacc'];
                                    unset($_SESSION['error-haveacc']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "มีบัญชีนี้อยู่ในระบบแล้ว!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
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
                            <?php if (isset($_SESSION['error-error'])) { ?>
                                <div class="alert-invisible" role="alert">
                                    <?php
                                    echo $_SESSION['error-error'];
                                    unset($_SESSION['error-error']);
                                    ?>
                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "มีบางอย่างผิดพลาด!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                text: "กำลังโหลดกรุณารอสักครู่...", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: "error", //success, warning, danger, error
                                                timer: 1500, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function() {
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
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
                                                window.location.href = "signup.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            });
                                        });
                                    </script>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">ชื่อผู้ใช้ (ชื่อที่แสดงบนหน้าโปรไฟล์)</label>
                                <input type="text" class="form-control" name="nickname" aria-describedby="nickname">
                            </div>
                            <div class="mb-3">
                                <label for="firstnameic" class="form-label">ชื่อจริง (IC)</label>
                                <input type="text" class="form-control" name="firstnameic" aria-describedby="firstnameic">
                            </div>
                            <div class="mb-3">
                                <label for="lastnameic" class="form-label">นามสกุล (IC)</label>
                                <input type="text" class="form-control" name="lastnameic" aria-describedby="lastnameic">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">อี-เมล</label>
                                <input type="email" class="form-control" name="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm password" class="form-label">ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control" name="c_password">
                            </div>
                            <div class="g-recaptcha g-recaptcha-positon" data-sitekey="6LdPXlUhAAAAADwX-7hL0WVnr4YryvN2zUHn8dT1"></div>

                            <button type="submit" name="signup" class="containerbutton containerbutton-green">
                                สมัครสมาชิก »
                                <div class="fill-green"></div>
                            </button>

                            <div class="containerbutton containerbutton-blue">
                                <a href="../_login&signup_page/login.php" role="button">
                                    <button>
                                        เข้าสู่ระบบ »
                                        <div class="fill-blue"></div>
                                    </button>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>