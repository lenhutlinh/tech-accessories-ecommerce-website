<?php require "layout/header.php"; ?>
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from product where id=' . $id;
    $product = executeSingleResult($sql);
    if ($product == null) {
        header('Location: index.php');
        die();
    }
}
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=264339598396676&autoLogAppEvents=1" nonce="8sTfFiF4"></script>
<!-- END HEADR -->
<main>
    <div class="container">
        <div id="ant-layout">
        <section class="search-quan">
                <i class="fas fa-search"></i>
                <form action="product.php" method="GET">
                    <input name="search" type="text" placeholder="Tìm sản phẩm">
                </form>
            </section>
        </div>
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="oder-product">
                <div class="title">
                    <section class="main-order">
                        <h1><?= $product['title'] ?></h1>
                        <div class="box">
                            <img src="<?='admin/product/'.$product['thumbnail'] ?>" alt="">
                            <div class="about">
                                <p><?= $product['content'] ?></p>
                                <div class="number">
                                    <span class="number-buy">Số lượng:</span>
                                    <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
                                </div>

                                <p class="price">Giá: <span id="price"><?= number_format($product['price'], 0, ',', '.') ?></span><span> VNĐ</span><span class="gia none"><?= $product['price'] ?></span></p>
                                
                                <button class="add-cart" onclick="addToCart(<?= $id ?>)"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                                
                                <button class="buy-now" onclick="buyNow(<?= $id ?>)">Mua ngay</button>

                                <script>
                                    function updatePrice() {
                                        var price = document.getElementById('price').innerText;
                                        var num = document.querySelector('#num').value;
                                        var gia1 = document.querySelector('.gia').innerText;
                                        var gia = price.match(/\d/g);
                                        gia = gia.join("");
                                        var tong = gia1 * num;
                                        document.getElementById('price').innerHTML = tong.toLocaleString();
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="fb-comments" data-href="http://localhost/PROJECT/details.php" data-width="750" data-numposts="5"></div>

                    </section>
                </div>
        </section>
    </div>
</main>
<?php require_once('layout/footer.php'); ?>
</div>
<script type="text/javascript">
function addToCart(id) {
    var num = document.querySelector('#num').value;
    
    // Kiểm tra số lượng hợp lệ
    if (num < 1) {
        alert('Số lượng phải lớn hơn 0');
        return;
    }

    // Gửi dữ liệu qua AJAX
    $.post('api/cookie.php', {
        'action': 'add',
        'id': id,
        'num': num
    }, function(data) {
        // Chuyển hướng đến trang giỏ hàng
        location.assign("cart.php");
    }).fail(function() {
        alert('Thêm vào giỏ hàng không thành công. Vui lòng thử lại.');
    });
}

function buyNow(id) {
    var num = document.querySelector('#num').value;

    // Kiểm tra số lượng hợp lệ
    if (num < 1) {
        alert('Số lượng phải lớn hơn 0');
        return;
    }

    // Gửi dữ liệu qua AJAX
    $.post('api/cookie.php', {
        'action': 'add',
        'id': id,
        'num': num
    }, function(data) {
        // Chuyển hướng đến trang thanh toán
        location.assign("checkout.php");
    }).fail(function() {
        alert('Mua ngay không thành công. Vui lòng thử lại.');
    });
}
</script>
</body>
<style>
    main section.search-quan input{
        margin-top: 15px;
        width: 400px;
        font-size:15px;
    }
    
    #ant-layout i{
        margin-top:7px;
        margin-left:0px;
    }
    section.main section.oder-product {
  display: grid;
  grid-template-columns: 100%;
}
</style>
</html>