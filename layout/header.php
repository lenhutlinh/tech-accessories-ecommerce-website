<!DOCTYPE html>
<html lang="en">
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Thế giới phụ kiện</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <section class="logo">
                    <a href="index.php"><img src="images/thegioiphukien1.png" alt="" ></a>
                </section>
                <nav>
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li class="nav-cha">
                            <a href="product.php?page=product">Sản phẩm</a>
                            <ul class="nav-con">
                                <?php
                                    $sql="SELECT * FROM category";
                                    $result=executeResult($sql);
                                    foreach($result as $item){
                                        echo '<li><a href="product.php?id_category=' . $item['id'] . '">'.$item['name'].'</a></li>';
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="sendMail.php">Liên hệ</a></li>
                    </ul>
                </nav>
                <section class="menu-right">
                    <div class="cart">
                        <a href="cart.php"><img src="images/icon/cart.svg" alt=""></a>
                        
                    </div>
                    <div class="login">
                        <?php
                        if (isset($_COOKIE['username'])) {
                            $username=$_COOKIE['username'];
                            if ($username == 'AdminThanh'|| $username == 'admin') {
                                echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                                <div class="logout">
                                    <a href="admin/"><i class="fas fa-user-edit"></i>Admin</a> <br>
                                    <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
                            }
                            else{
                                echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                            <div class="logout">
                                <a href="login/changePass.php"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>
                                <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                            </div>
                            ';
                            }
                        } 
                        else {
                            echo '<a href="login/login.php"">Đăng nhập</a>';
                        }

                        ?>
                    </div>
                </section>
            </div>
        </header>
<style>
    #wrapper header {
  width: 100%;
  margin: 0px auto;
  padding: 10px 0;
  background-color: rgb(19, 134, 169);
  
}
#wrapper header .container section.menu-right .login a {
 color:#1e1e1e;
}
#wrapper header .container {
  width: 90%;
  margin: 0px auto;
  display: grid;
  grid-template-columns: 20% auto auto;
}

header section.logo {
  display: flex;
  align-items: center;
}

header section.logo a img {
  width: 40%;
}

#wrapper header .container nav {
  text-align: left;
}

#wrapper header .container nav ul {
  display: flex;
}

#wrapper header .container nav ul li {
  padding: 10px;
  list-style: none;
}

#wrapper header .container nav ul li a {
  text-decoration: none;
  color: rgb(43, 38, 38);
  padding: 10px;
  /* background-color:rgb(247, 247, 247); */
  text-transform: uppercase;
  font-weight: 700;
  font-family: Muli, Futura, Helvetica, Arial, sans-serif;
  position: relative;
}

#wrapper header .container nav ul li a::after {
  content: "";
  position: absolute;
  bottom: 8px;
  left: 0px;
  height: 3px;
  width: 100%;
  background-color: #1e1e1e;
  display: none;
}

#wrapper header .container nav ul li a:hover:after {
  display: block;
}

/* MENU CON - CHA  */
#wrapper header .container nav ul li.nav-cha {
  position: relative;
  transition: all 0.4s;
}

#wrapper header .container nav ul li ul {
  position: absolute;
  display: flex;
  flex-flow: column;
  left: 0;
  top: 35px;
  width: 150%;
  background-color: rgb(255, 255, 255);
  box-shadow: 0px 0px 5px 0px rgb(212, 212, 212);
  z-index: 100;
  padding: 0;
  border-radius: 5px;
}

#wrapper header .container nav ul li ul li {
  text-align: center;
  padding: 10px 0px;
  display: none;
  transition: all 0.4s;
}

#wrapper header .container nav ul li ul li a {
  text-decoration: none;
  margin: 10px 0;
  color: black;
  font-weight: bold;
}

#wrapper header .container nav ul li.nav-cha:hover ul li {
  display: block;
}

/* MENU CON - CHA  */

#wrapper header .container section.menu-right {
  display: flex;
  align-items: center;
}

#wrapper header .container section.menu-right .cart {
  padding: 5px;
  border: 1px solid rgb(196, 196, 196);
  border-radius: 3px;
  margin: 0 10px;
  position: relative;
}

#wrapper header .container section.menu-right .cart span {
  position: absolute;
  top: 0px;
  right: 0;
  font-weight: 500;
  color: rgb(122, 115, 115);
}

#wrapper header .container section.menu-right .cart:hover {
  box-shadow: 0px 0px 3px 0px grey;
  cursor: pointer;
}

#wrapper header .container section.menu-right .cart:hover .history {
  opacity: 1;
}

#wrapper header .container section.menu-right .cart a {
  padding: 5px;
  text-decoration: none;
}

#wrapper header .container section.menu-right .cart .history {
  transition: all 0.5s;
  opacity: 0;
  margin-top: 0.7rem;
  display: flex;
  text-align: center;
  flex-flow: column;
  padding: 5px 0;
  border-radius: 10%;
  width: 100px;
  position: absolute;
  left: -75%;
  top: 1.3rem;
  z-index: 10;
}

#wrapper header .container section.menu-right .cart .history a {
  font-weight: 600;
  color: black;
}

#wrapper header .container section.menu-right .cart .history a:hover {
  color: rgb(41, 39, 39);
}

#wrapper header .container section.menu-right .login {
  padding: 7px;
  border: 1px solid rgb(196, 196, 196);
  border-radius: 3px;
  margin: 0 10px;
  position: relative;
}

#wrapper header .container section.menu-right .login:hover {
  box-shadow: 0px 0px 3px 0px grey;
  cursor: pointer;
}

#wrapper header .container section.menu-right .login a {
  padding: 5px;
  text-decoration: none;
  font-weight: 500;
}

#wrapper header .container section.menu-right .login:hover .logout {
  display: block;
}

#wrapper header .container section.menu-right .login .logout {
  display: none;
  position: absolute;
  top: 30px;
  left: 0px;
  z-index: 10;
  width: 200%;
  border: none;
}

#wrapper header .container section.menu-right .login .logout a {
  color: black;
  font-weight: 500;
  border-radius: 5px;
  padding: 0;
}


</style>