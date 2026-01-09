<?php require('connect.php') ?>
<?php
require_once('../database/dbhelper.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">

    <link rel="stylesheet" href="header.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <section class="logo">
                    <a href="../index.php"><img src="../images/thegioiphukien1.png" alt=""></a>
                </section>
                <nav>
                    <ul>
                        <li><a href="../index.php">Trang chủ</a></li>
                        <li class="nav-cha">
                            <a href="../product.php?page=product">Sản phẩm</a>
                            <ul class="nav-con">
                                <?php
                                $sql = "SELECT * FROM category";
                                $result = executeResult($sql);
                                foreach ($result as $item) {
                                    echo '<li><a href="../product.php?id_category=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="../sendMail.php">Liên hệ</a></li>
                    </ul>
                </nav>
                <section class="menu-right">
                    <div class="cart">
                        <a href="../cart.php"><img src="../images/icon/cart.svg" alt=""></a>
                        <?php
                        $cart = [];
                        if (isset($_COOKIE['cart'])) {
                            $json = $_COOKIE['cart'];
                            $cart = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count += $item['num']; // đếm tổng số item
                        }
                        ?>
                    </div>
                    <div class="login">
                        <?php
                        if (isset($_COOKIE['username'])) {
                            echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                            <div class="logout">
                                <a href="./changePass.php"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>
                                <a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                            </div>
                            ';
                        } else {
                            echo '<a href="login.php"">Đăng nhập</a>';
                        }

                        ?>


                    </div>
                </section>
            </div>
        </header>
        <h2 style="text-align: center;">Quên mật khẩu</h2>
        <div class="container">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Tên của bạn:</label>
                    <input class="form-control" type="text" name="name" required="required" />
                </div>
                <div class="form-group">
                    <label>Gmail của bạn:</label>
                    <input class="form-control" type="email" name="email" required="required" />
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input class="form-control" type="text" name="subject" required="required" />
                </div>
                <div class="form-group">
                    <label>Lý do:</label>
                    <textarea class="form-control" name="message" id="" cols="30" rows="4"></textarea>
                </div>
                <button name="send" class="btn btn-primary">Khôi phục</button>
                <?php
                $previous = "javascript:history.go(-1)";
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }
                ?>
                <a href="<?= $previous ?>" class="btn btn-warning">Quay lại</a>
            </form>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);


            $sql = "SELECT * FROM user WHERE email= '$email'";
            $kq = $conn->query($sql);
            $numrows_email = $kq->rowCount();
            if ($numrows_email == 1) {
                foreach ($kq as $item) {
                    $message = 'Xin chào ' . '<strong>' . $item['username'] . '</strong>' . '<br>Mật khẩu của bạn là: ' . '<strong>' . $item['password'] . '</strong>';
                }
            } else {
                echo '<script language="javascript">
                        alert("Tài khoản không tồn tại !");
                        window.location = "changePass.php";
                     </script>';
            }
            try {
                $mail->isSMTP();
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true; 
                $nguoigui = 'hellook332@gmail.com';
                $matkhau = 'thanh1010';
                $mail->SMTPSecure = 'ssl'; 
                $mail->Port = 465;               
                $mail->addAddress($to, $to_name);
                $mail->isHTML(true);
                $mail->Subject = 'Khôi phục mật khẩu';

                $mail->send();
                echo '<script language="javascript">
                        alert("Mật khẩu của bạn đã được gửi đến Email !");
                        window.location = "login.php";
                     </script>';
            }
            catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }
        }
        ?>
    </div>
</body>

</html>