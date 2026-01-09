<footer>
    <div class="row">
        <div class="grid-column">
            <div class="boxfooter1 color">
                <h3>Tổng đài hỗ trợ</h3>
                <ul>
                    <li>
                        <p>21004020</p>
                    </li>
                    <li>
                        <p>21004020</p>
                    </li>
                    <li>
                        <a href="#" onclick="showWarrantyAlert()">Chính sách bảo hành</a>
                    </li>
                </ul>
            </div>
            <div class="boxfooter2 color">
                <h3 class="footer_heading">Địa chỉ cửa hàng</h3>
                <ul>
                    <li>
                        73 Nguyễn Huệ, phường 2, thành phố Vĩnh Long, tỉnh Vĩnh Long
                    </li>
                </ul>
            </div>
            <div class="boxfooter3 color">
                <h3 class="footer_heading">Theo dõi</h3>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/vlute.edu.vn?locale=vi_VN" class="footer-item__link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-square"></i>
                            Facebook
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/your-instagram-page-link" class="footer-item__link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram-square"></i>
                            Instagram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<style>
    /* -----footer-------- */
    footer {
        float: left;
        width: 100%;
        min-height: 130%;
        background-color:rgba(70, 90, 137, 0.35);
        padding-top: 5px;
        margin-top: 20px;
    }
    .row {
        float: left;
        width: 100%;
        margin-bottom: 20px;
    }
    .grid-column {
        width: 50%;
        margin: 0 auto;
        font-size: 17px;
        border-top: 20px;
    }
    .grid-column ul li  a:hover {
        color: red;
    }
    .boxfooter1 {
        width: 30%;
        float: left;
    }
    .boxfooter2 {
        width: 45%;
        float: left;
    }
    .boxfooter3 {
        width: 25%;
        float: left;
    }
</style>
<script>
    function showWarrantyAlert() {
        alert("Thông báo:\n\nChúng tôi bảo hành các sản phẩm bị lỗi do nhà sản xuất trong thời gian [thời gian bảo hành, ví dụ: 12 tháng] kể từ ngày mua. Vui lòng giữ lại hóa đơn mua hàng để được hỗ trợ.");
    }
</script>