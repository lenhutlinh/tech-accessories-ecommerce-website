<?php
require_once('../database/config.php');
require_once('../database/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="header.css">

    <title>Đăng nhập</title>
</head>
<body>
    <div id="wrapper" style="padding-bottom: 4rem;">
    <header>
            <div class="container">
                <section class="logo">
                    <a href="../index.php"><img src="../images/thegioiphukien.png" alt=""></a>
                </section>
                <nav style="padding: 15px 10px;">
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
                                <a href="changePass.php"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>
                                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
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
        <div class="container">
            <form action="" method="POST">
                <h1 style="text-align: center;">Đổi mật khẩu</h1>
                <div class="form-group">
                    <label for="">Mật khẩu hiện tại:</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu hiện tại">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới:</label>
                    <input type="password" name="password-new" class="form-control" placeholder="Mật khẩu mới">
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu mới:</label>
                    <input type="password" name="repassword-new" class="form-control" placeholder="Nhập lại mật khẩu mới">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Thay đổi">
                    <p style="padding-top: 1rem;"><a href="forget.php">Quên mật khẩu?</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php require_once('../database/config.php'); ?>
    <?php require_once('../database/dbhelper.php'); ?>
    <?php
    if (isset($_POST["submit"]) && $_POST["password"] != '' && $_POST["password-new"] != '' && $_POST["repassword-new"] != '') {
        $password = $_POST["password"];
        $passwordnew = $_POST["password-new"];
        $repasswordnew = $_POST["repassword-new"];
        $sql = "SELECT * FROM user WHERE password ='$password'";
        execute($sql);
        if (isset($_COOKIE['password'])) {
            if ($password == $_COOKIE['password']) {
                if ($passwordnew != $repasswordnew) {
                    echo '<script language="javascript">
                                      alert("Nhập không trùng mật khẩu, vui lòng nhập lại!");
                                      window.location = "changePass.php";
                                </script>';
                    die();
                } else {
                    if (isset($_COOKIE['username'])) {
                        $username = $_COOKIE['username'];
                        $sql = "UPDATE user SET password = '$passwordnew' WHERE username = '$username'";
                        execute($sql);
                        echo $username;
                        echo $passwordnew;
                        echo '<script language="javascript">
                        alert("Đổi mật khẩu thành công !");
                        window.location = "login.php";
                        </script>';

                        session_start();
                        if (isset($_COOKIE['username']) && ($_COOKIE['username'])) {
                            setcookie("username", "", time() - 30 * 24 * 60 * 60, '/');
                            setcookie("password", "", time() - 30 * 24 * 60 * 60, '/');

                            setcookie("username", $username, time() + 30 * 24 * 60 * 60, '/');
                            setcookie("password", $passwordnew, time() + 30 * 24 * 60 * 60, '/');


                            header('Location: ../index.php');
                        }
                    }
                }
            } else {
                echo '<script language="javascript">
                        alert("Mật khẩu không chính xác !");
                        window.location = "login.php";
                     </script>';
            }
        }
    }
    ?>
</body>

</html>