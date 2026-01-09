<?php require_once('database/dbhelper.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="category/index.php">Thống kê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category/index.php">Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product/">Quản lý sản phẩm</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="dashboard.php">Quản lý đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Thoát</a>
                </li>
            </ul>
        </header>
        <div class="container">
            <main>
                <h1>Bảng thống kê</h1>
                <section class="dashboard">
                    <div class="table">
                        <a href="category/">
                                <div class="sp dm">
                                        <p>Danh mục sản phẩm</p>
                                        <?php
                                        $sql = "SELECT * FROM `category`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                    </div>
                                </a>
                                <a href="product/">
                                    <div class="sp">
                                        
                                            <p>Danh sách sản phẩm</p>
                                            <?php
                                            $sql = "SELECT * FROM `product`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                    </div> 
                                </a>
                        <a href="">
                            <div class="sp kh">
                                
                                <p>Khách hàng</p>
                                <?php
                                $sql = "SELECT * FROM `user`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                                
                            </div>
                        </a>
                        <a href="dashboard.php">
                            <div class="sp dh">
                                <p>Đơn hàng</p>
                                <?php
                                $sql = "SELECT * FROM `order_details`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                            </div>
                         </a>
                    </div>
                </section>
                <section class="new-order">
                    <h4>Đơn hàng mới</h4>
                    <table>
                        <tr class="bold">
                            <td>STT</td>
                            <td>Tên</td>
                            <td>Tên sản phẩm/Số lượng</td>
                            <td>Giá sản phẩm</td>
                            <td>Địa chỉ</td>
                            <td>Số điện thoại</td>
                        </tr>
                        <?php
                            try {

                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $limit = 10;
                                $start = ($page - 1) * $limit;

                                $sql = "SELECT * from orders, order_details, product
                                where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $start,$limit ";
                                $order_details_List = executeResult($sql);
                                $total = 0;
                                $count = 0;
                                foreach ($order_details_List as $item) {
                                    echo '
                                        <tr style="text-align: center;">
                                            <td>' . (++$count) . '</td>
                                            <td>' . $item['fullname'] . '</td>
                                            <td>' . $item['title'] . '<br>(<strong>' . $item['num'] . '</strong>)</td>
                                            <td class="b-500 red">' . number_format($item['num'] * $item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                                            <td>' . $item['address'] . '</td>
                                            <td class="b-500">' . $item['phone_number'] . '</td>
                                        </tr>
                                    ';
                                }
                            } catch (Exception $e) {
                                die("Lỗi thực thi sql: " . $e->getMessage());
                            }
                            ?>
                    </table>
                </section>
            </main>
        </div>
    </div>
</body>
<style>
    #wrapper{
        padding-bottom: 5rem;
    }
    .b-500 {
        font-weight: 500;
    }

    .red {
        color: red;
    }

    .green {
        color: green;
    }
            {
        color:black;
        background: #aaffe8;
        border:1px solid black;
        
    }
    .dashboard .table .sp p>a {
        color:black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
    }
    .dashboard .table .sp>p {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:20px;
    }
    .dashboard .table .sp span{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .dashboard .table .sp{
        height: 100px;
    }
</style>

</html>