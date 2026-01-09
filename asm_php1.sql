-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2025 lúc 08:01 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(49, 'Tai nghe', '2025-04-16 06:34:28', '2025-04-16 06:34:28'),
(50, 'Bàn Phím', '2025-04-16 06:57:28', '2025-04-16 06:57:28'),
(51, 'Chuột', '2025-04-16 06:03:29', '2025-04-16 06:03:29'),
(52, 'Màn Hình', '2025-04-16 06:11:29', '2025-04-16 06:11:29'),
(53, 'Sản phẩm khác', '2025-04-16 06:24:29', '2025-04-16 06:24:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) VALUES
(146, 'Lê Nhựt Linh', '022255544', 'sinhvien@st.vlute.edu.vn', 'Vĩnh Long', 'no', '2025-04-16 07:57:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price`, `status`) VALUES
(156, 146, 71, 2, 1, 3490000, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `number` float NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `number`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(70, 'Tai nghe TWS Samsung Galaxy Buds3 Pro R630N', 4900000, 10, 'uploads/tainghe1.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) cao cấp từ Samsung, dự kiến mang đến chất lượng âm thanh đỉnh cao, công nghệ chống ồn chủ động (ANC) tiên tiến, thiết kế công thái học thoải mái, thời lượng pin tốt, khả năng kháng nước/bụi, và tích hợp sâu với hệ sinh thái Samsung (ví dụ: ghép nối nhanh, điều khiển liền mạch). Có thể có thêm các tính năng thông minh như âm thanh 360 độ và phát hiện giọng nói</p>', 49, '2025-04-16 07:17:11', '2025-04-16 07:17:11'),
(71, 'Tai nghe TWS Samsung Galaxy Buds3 R530N', 3490000, 10, 'uploads/tainghe2.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) thế hệ mới từ Samsung, dự kiến mang đến sự cân bằng giữa chất lượng âm thanh tốt, thiết kế nhỏ gọn và thoải mái, kết nối Bluetooth ổn định, và thời lượng pin khá. Có thể tích hợp các tính năng cơ bản như điều khiển cảm ứng, micro cho đàm thoại, và khả năng kháng nước/bụi ở mức độ nhất định. Tích hợp tốt với hệ sinh thái Samsung.</p>', 49, '2025-04-16 07:12:12', '2025-04-16 07:12:12'),
(72, 'Tai nghe TWS Xiaomi Redmi Buds 6', 1290000, 10, 'uploads/tainghe3.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) thuộc dòng sản phẩm Redmi giá tốt của Xiaomi. Dự kiến mang đến kết nối Bluetooth ổn định, chất âm ổn định cho nhu cầu nghe nhạc hàng ngày, thời lượng pin khá, thiết kế nhỏ gọn và thoải mái khi đeo. Có thể có các tính năng cơ bản như điều khiển cảm ứng, micro tích hợp cho đàm thoại và khả năng kháng nước nhẹ.</p>', 49, '2025-04-16 07:55:12', '2025-04-16 07:55:12'),
(73, 'Tai nghe TWS JBL Tune Beam 2', 2390000, 20, 'uploads/tainghe4.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) thuộc dòng Tune của JBL, nổi tiếng với âm thanh JBL Pure Bass mạnh mẽ. Dự kiến mang đến thiết kế dạng \"stick\" (có đuôi) thoải mái, kết nối Bluetooth ổn định, chất lượng âm thanh tốt với âm bass nhấn mạnh, công nghệ chống ồn chủ động (ANC) có thể cải thiện, thời lượng pin khá, khả năng kháng nước/bụi, và tích hợp micro cho đàm thoại rõ ràng. Có thể có thêm các tính năng như điều khiển cảm ứng tùy chỉnh và hỗ trợ ứng dụng JBL Headphones.</p>', 49, '2025-04-16 07:39:13', '2025-04-16 07:39:13'),
(74, 'Tai nghe TWS Sony WF-LS910N', 4390000, 10, 'uploads/tainghe5.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) thuộc dòng LinkBuds S của Sony, nổi bật với thiết kế siêu nhỏ gọn và nhẹ, mang lại cảm giác đeo thoải mái suốt ngày dài. Chất âm Sony đặc trưng, tích hợp công nghệ chống ồn chủ động (ANC) hiệu quả và chế độ Ambient Sound thông minh để nhận biết âm thanh xung quanh. Thời lượng pin tốt, khả năng kháng nước/bụi IPX4, điều khiển cảm ứng trực quan và tích hợp trợ lý ảo. Tập trung vào sự thoải mái và khả năng chuyển đổi linh hoạt giữa nghe nhạc và nhận biết môi trường.</p>', 49, '2025-04-16 07:20:14', '2025-04-16 07:20:14'),
(75, 'Tai nghe TWS soundcore Liberty 4 Pro A3954', 3290000, 20, 'uploads/tainghe6.png', '<p>Tai nghe không dây hoàn toàn (True Wireless Stereo) cao cấp từ Soundcore (thương hiệu của Anker), nổi bật với chất lượng âm thanh Hi-Res Audio Wireless và LDAC codec cho trải nghiệm nghe nhạc chi tiết và sống động. Thiết kế công thái học thoải mái, tích hợp công nghệ chống ồn chủ động (ANC) thích ứng, chế độ Transparency, theo dõi nhịp tim và tư thế cổ, thời lượng pin ấn tượng, sạc không dây và điều khiển qua ứng dụng Soundcore với khả năng tùy chỉnh EQ HearID Sound 2.0.</p>', 49, '2025-04-16 07:54:17', '2025-04-16 07:54:17'),
(76, 'Tai nghe Chụp Tai Baseus Bass 35 Max', 550000, 10, 'uploads/tainghe7.png', '<p>Tai nghe chụp tai không dây (Bluetooth) hoặc có dây từ Baseus, tập trung vào âm bass mạnh mẽ và sâu lắng theo đúng tên gọi \"Bass\". Thiết kế chụp tai thoải mái với đệm êm ái, kết nối Bluetooth ổn định, thời lượng pin tốt cho nhu cầu sử dụng hàng ngày. Có thể tích hợp micro cho đàm thoại, nút điều khiển nhạc trên tai nghe và khả năng gập gọn để dễ dàng mang theo. Thường có mức giá phải chăng, hướng đến người dùng trẻ yêu thích âm bass.</p>', 49, '2025-04-16 07:20:20', '2025-04-16 07:20:20'),
(77, 'Tai nghe Chụp Tai Sony MDR - ZX110AP', 420000, 10, 'uploads/tainghe8.png', '<p>Tai nghe chụp tai có dây giá cả phải chăng từ Sony, nổi bật với thiết kế nhẹ nhàng, thoải mái khi đeo. Chất âm cân bằng, phù hợp cho nhiều thể loại nhạc và nghe hàng ngày. Tích hợp micro và nút điều khiển cuộc gọi/nhạc trên dây, giúp bạn dễ dàng quản lý cuộc gọi và phát lại nhạc trên điện thoại thông minh.</p>', 49, '2025-04-16 07:28:22', '2025-04-16 07:28:22'),
(78, 'Bàn Phím Cơ Có Dây Akko 3098S Matcha Red Bean V3', 840000, 10, 'uploads/banphim1.png', '<p>Bàn phím cơ kích thước 98 phím (layout đầy đủ nhưng lược bỏ một số phím ít dùng, nhỏ gọn hơn fullsize), kết nối có dây qua cổng USB Type-C. Sử dụng switch Akko V3 (tự sản xuất) cho cảm giác gõ độc đáo (có thể là tactile - khấc, linear - trơn, hoặc clicky - có tiếng click tùy phiên bản cụ thể). Keycap PBT double-shot chất lượng cao, bền bỉ và chống phai màu. Thiết kế màu sắc Matcha (xanh lá cây) và Red Bean (đỏ đậu) độc đáo, mang phong cách retro hoặc hiện đại tùy góc nhìn. Tích hợp sẵn foam tiêu âm giúp giảm tiếng ồn khi gõ. Hỗ trợ NKRO (N-Key Rollover) cho phép nhận diện nhiều phím bấm cùng lúc. Có thể có tùy chọn đèn nền LED RGB hoặc đơn sắc.</p>', 50, '2025-04-16 07:02:28', '2025-04-16 07:02:28'),
(79, 'Bàn phím Cơ Có Dây Akko 3098S Los Angeles V3', 84000, 10, 'uploads/banphim2.png', '<p>Bàn phím cơ kích thước 98 phím (layout đầy đủ nhưng lược bỏ một số phím ít dùng, nhỏ gọn hơn fullsize), kết nối có dây qua cổng USB Type-C. Sử dụng switch Akko V3 (tự sản xuất) cho cảm giác gõ độc đáo (có thể là tactile - khấc, linear - trơn, hoặc clicky - có tiếng click tùy phiên bản cụ thể). Keycap PBT double-shot chất lượng cao, bền bỉ và chống phai màu. Thiết kế màu sắc Matcha (xanh lá cây) và Red Bean (đỏ đậu) độc đáo, mang phong cách retro hoặc hiện đại tùy góc nhìn. Tích hợp sẵn foam tiêu âm giúp giảm tiếng ồn khi gõ. Hỗ trợ NKRO (N-Key Rollover) cho phép nhận diện nhiều phím bấm cùng lúc. Có thể có tùy chọn đèn nền LED RGB hoặc đơn sắc.</p>', 50, '2025-04-16 07:58:28', '2025-04-16 07:58:28'),
(80, 'Bàn Phím Cơ Bluetooth MonsGeek MG108B', 1940000, 10, 'uploads/banphim3.png', '<p>Bàn phím cơ kích thước đầy đủ (108 phím) với hai chế độ kết nối: Bluetooth không dây và có dây qua cổng USB Type-C. Cho phép kết nối đồng thời với nhiều thiết bị và chuyển đổi dễ dàng. Sử dụng switch cơ học chất lượng (thường là từ các hãng nổi tiếng như Cherry MX, Gateron, hoặc Akko tùy phiên bản), mang lại trải nghiệm gõ phím tùy chỉnh và thoải mái. Keycap PBT chất lượng cao, bền bỉ và chống mài mòn. Thiết kế hiện đại, có thể có tùy chọn đèn nền RGB tùy chỉnh. Hỗ trợ NKRO (N-Key Rollover) cho cả chế độ có dây và không dây. Thường đi kèm với phần mềm tùy chỉnh keymap và macro.</p>', 50, '2025-04-16 07:39:29', '2025-04-16 07:39:29'),
(81, 'Bàn Phím Cơ Bluetooth Akko MOD007B-HE PC Tokyo', 2900000, 10, 'uploads/banphim4.png', '<p>Bàn phím cơ kích thước 75% (82 phím, lược bỏ hàng phím chức năng nhưng vẫn giữ lại các phím mũi tên), kết nối đa năng: Bluetooth không dây (cho nhiều thiết bị) và có dây qua USB Type-C. Sử dụng switch cơ học chất lượng cao (Akko Cream Yellow Pro, Akko V3 Cream Blue Pro HE, hoặc tương tự tùy phiên bản), mang lại trải nghiệm gõ phím mượt mà và phản hồi tốt. Keycap PBT double-shot chất lượng, bền bỉ và chống phai màu. Thiết kế lấy cảm hứng từ Tokyo với màu sắc và họa tiết đặc trưng. Case làm từ polycarbonate (PC) cho vẻ ngoài trong suốt hoặc mờ độc đáo và có thể ảnh hưởng đến âm thanh gõ. Tích hợp sẵn foam tiêu âm và plate mount. Hỗ trợ NKRO (N-Key Rollover) và có phần mềm tùy chỉnh keymap, macro và đèn nền RGB.</p>', 50, '2025-04-16 07:42:30', '2025-04-16 07:42:30'),
(82, 'Bàn Phím Cơ Không Dây Akko 3087 RF One Piece - Luffy', 3490000, 10, 'uploads/banphim5.png', '<p>Bàn phím cơ kích thước TKL (Tenkeyless - 87 phím, lược bỏ cụm phím số), kết nối không dây qua sóng RF 2.4GHz cho độ ổn định cao. Sử dụng switch cơ học Akko (tùy chọn linear, tactile, clicky tùy phiên bản), mang lại trải nghiệm gõ phím độc đáo. Keycap PBT double-shot chất lượng cao với chủ đề One Piece và nhân vật Luffy, thiết kế bắt mắt và cá tính. Layout ANSI tiêu chuẩn, dễ dàng thay thế keycap. Tích hợp foam tiêu âm giúp giảm tiếng ồn khi gõ. Hỗ trợ NKRO (N-Key Rollover) cho phép nhận diện nhiều phím bấm cùng lúc. Có thể có tùy chọn đèn nền LED RGB hoặc đơn sắc.</p>', 50, '2025-04-16 07:46:31', '2025-04-16 07:46:31'),
(83, 'Bàn Phím Cơ Có Dây Akko 3098 Neon', 1290000, 10, 'uploads/banphim6.png', '<p>Bàn phím cơ kích thước 98 phím (layout đầy đủ nhưng lược bỏ một số phím ít dùng, nhỏ gọn hơn fullsize), kết nối có dây qua cổng USB Type-C. Sử dụng switch cơ học Akko (tùy chọn linear, tactile, clicky tùy phiên bản), mang lại trải nghiệm gõ phím độc đáo. Keycap PBT double-shot chất lượng cao với phối màu \"Neon\" nổi bật và cá tính (thường là sự kết hợp của các màu sắc tươi sáng như hồng, xanh dương, xanh lá cây). Tích hợp sẵn foam tiêu âm giúp giảm tiếng ồn khi gõ. Hỗ trợ NKRO (N-Key Rollover) cho phép nhận diện nhiều phím bấm cùng lúc. Thường đi kèm với đèn nền LED RGB rực rỡ, có nhiều chế độ sáng tùy chỉnh.</p>', 50, '2025-04-16 07:18:32', '2025-04-16 07:18:32'),
(84, 'Bộ Bàn Phím Chuột Không Dây Logitech MK240', 400000, 10, 'uploads/banphim7.png', '<p>Bộ sản phẩm bàn phím và chuột không dây nhỏ gọn, thiết kế đơn giản và tiện lợi cho không gian làm việc hạn chế. Kết nối không dây ổn định qua USB receiver (cắm vào máy tính). Bàn phím có kích thước nhỏ gọn, lược bỏ cụm phím số, phím bấm êm ái. Chuột có thiết kế vừa vặn tay, di chuyển mượt mà. Thích hợp cho nhu cầu sử dụng cơ bản, làm việc văn phòng và giải trí nhẹ nhàng.</p>', 50, '2025-04-16 07:01:33', '2025-04-16 07:01:33'),
(85, 'Bàn Phím Có Dây Logitech K120', 2100000, 10, 'uploads/banphim8.png', '<p>Bàn phím có dây cơ bản, thiết kế đơn giản, bền bỉ và đáng tin cậy từ Logitech. Kết nối dễ dàng qua cổng USB. Bố cục phím tiêu chuẩn, phím bấm êm ái và thoải mái cho việc gõ văn bản hàng ngày. Chống tràn nước nhẹ, tăng độ bền trong quá trình sử dụng. Thích hợp cho nhu cầu làm việc văn phòng, học tập và sử dụng cá nhân.</p>', 50, '2025-04-16 07:34:33', '2025-04-16 07:34:33'),
(86, 'Chuột Bluetooth Silent Logitech M240', 320000, 10, 'uploads/chuot1.png', '<p>Chuột không dây Bluetooth nhỏ gọn, thiết kế đơn giản, kết nối ổn định và đặc biệt yên tĩnh khi click chuột, phù hợp cho môi trường làm việc yên tĩnh.</p>', 51, '2025-04-16 07:50:38', '2025-04-16 07:50:38'),
(87, 'Chuột Không Dây Akko Hamster Plus', 250000, 10, 'uploads/chuot2.png', '<p>Chuột không dây thiết kế công thái học, dáng chuột độc đáo (có thể lấy cảm hứng từ hình dáng chuột hamster), kết nối ổn định và có thể có các nút chức năng bổ sung.</p>', 51, '2025-04-16 07:20:39', '2025-04-16 07:20:39'),
(88, 'Chuột Không dây DareU LM106G', 320000, 20, 'uploads/chuot3.png', '<p>Chuột không dây giá phổ thông, thiết kế đơn giản, kết nối ổn định qua USB receiver, phù hợp cho nhu cầu sử dụng cơ bản hàng ngày.</p>', 51, '2025-04-16 07:45:39', '2025-04-16 07:45:39'),
(89, 'Chuột Không dây Logitech M170', 350000, 20, 'uploads/chuot4.png', '<p>Chuột không dây cơ bản, thiết kế đối xứng, kết nối ổn định qua USB receiver, dễ dàng sử dụng cho cả người thuận tay trái và tay phải.</p>', 51, '2025-04-16 07:10:40', '2025-04-16 07:10:40'),
(90, 'Chuột sạc Bluetooth Rapoo MT760 Mini', 400000, 30, 'uploads/chuot5.png', '<p>Chuột không dây Bluetooth nhỏ gọn, có thể sạc lại, thiết kế công thái học, kết nối đa thiết bị và yên tĩnh khi click chuột.</p>', 51, '2025-04-16 07:31:40', '2025-04-16 07:31:40'),
(91, 'Chuột Không dây Silent Rapoo B2S', 240000, 10, 'uploads/chuot6.png', '<p>Chuột không dây nhỏ gọn, kết nối Bluetooth, đặc biệt yên tĩnh khi click chuột, dễ dàng mang theo và sử dụng trong môi trường cần sự tĩnh lặng.</p>', 51, '2025-04-16 07:54:40', '2025-04-16 07:54:40'),
(92, 'Chuột sạc Bluetooth Silent Logitech MX Anywhere 3s', 400000, 20, 'uploads/chuot7.png', '<p>Chuột không dây Bluetooth cao cấp, có thể sạc lại, thiết kế nhỏ gọn nhưng công thái học, kết nối đa thiết bị, cuộn siêu nhanh MagSpeed và yên tĩnh khi click chuột, phù hợp cho di chuyển và công việc chuyên nghiệp.</p>', 51, '2025-04-16 07:15:41', '2025-04-16 07:15:41'),
(93, 'Chuột Bluetooth Silent Logitech M550L', 4900000, 10, 'uploads/chuot8.png', '<p>Chuột không dây Bluetooth kích thước vừa phải, thiết kế công thái học cho người thuận tay trái, kết nối ổn định và yên tĩnh khi click chuột, phù hợp cho sử dụng hàng ngày và làm việc.</p>', 51, '2025-04-16 07:36:41', '2025-04-16 07:36:41'),
(95, 'MSI PRO 21.45 inch Full HD MP223 E2', 4900000, 10, 'uploads/manhinh1.png', '<p>Màn hình kích thước nhỏ gọn (21.45 inch), độ phân giải Full HD, thuộc dòng PRO của MSI hướng đến công việc và sử dụng hàng ngày, có thể có thiết kế tối giản và các tính năng bảo vệ mắt cơ bản.</p>', 52, '2025-04-16 07:57:46', '2025-04-16 07:57:46'),
(96, 'Xiaomi 27 inch Full HD A27i', 3490000, 10, 'uploads/manhinh2.png', '<p>Màn hình lớn 27 inch, độ phân giải Full HD, thuộc dòng A của Xiaomi, có thể có thiết kế mỏng nhẹ, màu sắc sống động và góc nhìn rộng, phù hợp cho giải trí và làm việc.</p>', 52, '2025-04-16 07:16:47', '2025-04-16 07:16:47'),
(97, 'Asus 23.8 inch Full HD VY249HGR', 2900000, 10, 'uploads/manhinh3.png', '<p>Màn hình 23.8 inch, độ phân giải Full HD, thuộc dòng VY của Asus tập trung vào bảo vệ mắt với các công nghệ như Low Blue Light và Flicker-Free, có thể có tần số quét cao hơn hướng đến gaming cơ bản.</p>', 52, '2025-04-16 07:40:47', '2025-04-16 07:40:47'),
(98, 'Dell UltraSharp 23.8 inch Full HD U2424H', 3490000, 10, 'uploads/manhinh4.png', '<p>Màn hình chuyên nghiệp 23.8 inch, độ phân giải Full HD, thuộc dòng UltraSharp của Dell nổi tiếng với độ chính xác màu cao, thiết kế công thái học và nhiều cổng kết nối, phù hợp cho công việc đồ họa và văn phòng cao cấp.</p>', 52, '2025-04-16 07:13:48', '2025-04-16 07:13:48'),
(99, 'MSI PRO 24.5 inch Full HD MP252L', 1290000, 10, 'uploads/manhinh5.png', '<p>Màn hình 24.5 inch, độ phân giải Full HD, thuộc dòng PRO của MSI, có thể có tần số quét cao hơn so với MP223 E2, hướng đến trải nghiệm mượt mà hơn cho cả công việc và giải trí.</p>', 52, '2025-04-16 07:38:48', '2025-04-16 07:38:48'),
(100, 'Samsung 27 inch Full HD LS27D366GAEXXV', 3490000, 10, 'uploads/manhinh6.png', '<p>Màn hình lớn 27 inch, độ phân giải Full HD từ Samsung, có thể có thiết kế mỏng, màu sắc tươi sáng và công nghệ giảm ánh sáng xanh, phù hợp cho giải trí đa phương tiện.</p>', 52, '2025-04-16 07:08:49', '2025-04-16 07:08:49'),
(101, 'GIGABYTE Gaming 24.5 inch Full HD GS25F2', 4900000, 10, 'uploads/manhinh7.png', '<p>Màn hình gaming 24.5 inch, độ phân giải Full HD từ GIGABYTE, tập trung vào tốc độ với tần số quét cao và thời gian phản hồi nhanh, hỗ trợ các công nghệ đồng bộ hóa hình ảnh (FreeSync hoặc G-Sync Compatible) cho trải nghiệm chơi game mượt mà.</p>', 52, '2025-04-16 07:29:49', '2025-04-16 07:29:49'),
(102, 'Acer Gaming Nitro 27 inch Full HD KG270 X1', 3490000, 10, 'uploads/manhinh8.png', '<p>Màn hình gaming 27 inch, độ phân giải Full HD thuộc dòng Nitro của Acer, nổi bật với tần số quét cao, thời gian phản hồi nhanh và thiết kế hầm hố, hướng đến trải nghiệm chơi game mượt mà và không xé hình.</p>', 52, '2025-04-16 07:47:49', '2025-04-16 07:47:49'),
(103, 'Adapter chuyển đổi USB C 6 in 1 Ugreen 60384', 845000, 20, 'uploads/phukien1.png', '<p>Adapter đa năng từ Ugreen, chuyển đổi từ cổng USB-C sang 6 cổng kết nối khác nhau, có thể bao gồm USB-A, HDMI, khe cắm thẻ nhớ SD/TF và cổng sạc USB-C PD.</p>', 53, '2025-04-16 07:27:53', '2025-04-16 07:27:53'),
(104, 'Adapter chuyển đổi Type C 4 in 1 Xmobile DS606H', 200000, 20, 'uploads/phukien2.png', '<p>Adapter Xmobile chuyển đổi từ cổng USB-C sang 4 cổng kết nối, có thể bao gồm USB-A và các cổng khác tùy thuộc vào cấu hình cụ thể.</p>', 53, '2025-04-16 07:57:53', '2025-04-16 07:57:53'),
(105, 'Adapter chuyển đổi Type C 4 in 1 Xmobile DS122F', 300000, 20, 'uploads/phukien3.png', '<p>Tương tự như DS606H, adapter Xmobile này chuyển đổi từ USB-C sang 4 cổng kết nối, với cấu hình cổng có thể khác biệt.</p>', 53, '2025-04-16 07:37:54', '2025-04-16 07:37:54'),
(106, 'Adapter chuyển đổi USB Type C 4 in 1 HyperDrive HD41', 500000, 20, 'uploads/phukien4.png', '<li data-sourcepos=\"9:1-10:0\"><p data-sourcepos=\"9:3-9:190\">Adapter mỏng gọn từ HyperDrive, chuyển đổi từ USB-C sang 4 cổng kết nối, thường tập trung vào các cổng phổ biến như USB-A và HDMI.</p>\r\n</li><p>\r\n</p><li data-sourcepos=\"11:1-11:208\">\r\n<p data-sourcepos=\"11:3-11:208\"></p></li>', 53, '2025-04-16 07:20:55', '2025-04-16 07:20:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(28) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Quyen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `hoten`, `username`, `password`, `phone`, `email`, `Quyen`) VALUES
(2, 'Le Nhut Linh', 'user', '123456', '0338310990', 'user@gmail.com', 'User'),
(62, 'LinhLe', 'Admin', '123456', '0337310990', '21004020@st.vlute.edu.vn', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
