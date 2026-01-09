<?php require "layout/header.php"; ?>
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>
<!-- END HEADR -->
<main>
    <div class="container">
        <div id="ant-layout">
            <section class="search-quan">
                <form action="product.php" method="GET">
                    <input name="search" type="text" placeholder="Tìm sản phẩm   " >
                    <i class="fas fa-search" class="icon"></i>
                </form>
            </section> 
        </div>
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="restaurants">
                <div class="title">
                    <h1>Danh sách sản phẩm</h1>
                </div>
                <div class="product-restaurants">
                    <div class="row">
                        <?php
                        try {
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $limit = 12;
                            $start = ($page - 1) * $limit;
                            $sql = "SELECT * FROM product limit $start,$limit";
                            executeResult($sql);
                            $productList = executeResult($sql);

                            $index = 1;
                            foreach ($productList as $item) {
                                echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="admin/product/'. $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.6</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>15 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                            }
                        } catch (Exception $e) {
                            die("Lỗi thực thi sql: " . $e->getMessage());
                        }
                        ?>
                    </div>
                    <div class="pagination">
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `product`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                $numrow = mysqli_num_rows($result);
                                $current_page = ceil($numrow / 12);
                            }
                            for ($i = 1; $i <= $current_page; $i++) {

                                if ($i == $current_page) {
                                    echo '
                                    <li><a href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '
                                    <li><a href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </div>
</main>
<?php require_once('layout/footer.php'); ?>
<style>
    main section.search-quan input{
        margin-top: 15px;
        width: 400px;
        font-size:15px;
    }
    #ant-layout i{
        margin-top:7px;
        margin-left:-5px;
    }
    .pagination ul li {
        background: #f7f7f7;
    }
    .pagination ul li a{
        color: #1e1e1e;
    }
</style>
</div>