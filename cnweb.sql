
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `category_id`, `image`) VALUES
(1, 'One Piece - Tập 95 (Bản Bìa Rời)', 'Oda Eiichiro', 'Mã Kim Đồng: \n6222203330095\nISBN: 978-604-2-24691-0\nTác giả: Eiichiro Oda\nĐối tượng: Tuổi mới lớn (15 – 18)\nKhuôn Khổ: 11.3x17.6 cm\nSố trang: 204\nĐịnh dạng: bìa mềm\nTrọng lượng: 150 gram\nBộ sách: One Piece', 16575, 3, 'uploads/one-piece-tap-95_chuyen-chu-du-cua-oden_1.jpg'),
(2, 'Mob Psycho 100 - Tập 3', 'One', 'Mã Kim Đồng: \r\n5212214550003\r\nISBN: 978-604-2-22938-8\r\nTác giả: One\r\nĐối tượng: Tuổi mới lớn (15 – 18)\r\nKhuôn Khổ: 13x18 cm\r\nSố trang: 192\r\nĐịnh dạng: bìa mềm\r\nTrọng lượng: 140 gram\r\nBộ sách: Mob Psycho 100\r\nNgày phát hành: 16/07/2021', 21000, 3, 'uploads/mob-psycho-100_tap-3.jpg'),
(3, '5 Centimet Trên Giây', 'Shinkai Makoto', 'Mã hàng: 8936049524905\r\nTên Nhà Cung Cấp: IPM\r\nTác giả: Shinkai Makoto\r\nNXB: Văn Học\r\nNăm XB: 12/2014\r\nTrọng lượng (gr): 300\r\nKích Thước Bao Bì: 13x18\r\nSố trang: 188\r\nHình thức: Bìa Mềm', 39500, 3, 'uploads/8936049524905.jpg'),
(4, 'Thần Đồng Đất Việt 44 - Quán Cơm Quí Tộc', 'Nhiều tác giả', 'Mã hàng:	8936054081882\r\nNhà Cung Cấp: Cty Phan Thị\r\nTác giả: Nhiều Tác Giả\r\nNXB: NXB Đại Học Sư Phạm\r\nNăm XB: 2013\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 120\r\nKích Thước Bao Bì: 18 x 11 x 0.5 cm\r\nSố trang: 112\r\nHình thức: Bìa Mềm', 8500, 1, 'uploads/8936054081882.jpg'),
(5, '\"Cậu\" Ma Nhà Xí Hanako - Tập 1', 'AidaIro', 'Mã hàng: 8935244854190\r\nĐộ Tuổi: 11 - 15\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: AidaIro\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 200\r\nKích Thước Bao Bì: 18 x 13 cm\r\nSố trang: 182\r\nHình thức: Bìa Mềm', 22400, 3, 'uploads/cau-ma-nha-xi-hanako---tap-1.jpg'),
(6, 'Thám Tử Đã Chết - Tập 1 - Tặng Kèm Bookmark Tròn', 'Nigozyu', '\r\nMã hàng: 8935280909083\r\nTên Nhà Cung Cấp: Thái Hà\r\nTác giả: Nigozyu\r\nNgười Dịch: Nguyễn Dương Quỳnh, Nguyên Phạm\r\nNXB: NXB Hà Nội\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 400\r\nKích Thước Bao Bì: 19 x 13 cm x 1.7\r\nSố trang: 348\r\nHình thức: Bìa Mềm', 119000, 3, 'uploads/ttdc01.jpg'),
(7, 'The Walking Dead - Thảm Họa Xác Sống - Tập 2: Miles Behind Us', 'Robert Kirkman', 'Mã hàng: 8936117742330\r\nTên Nhà Cung Cấp: ZGROUP\r\nTác giả: Robert Kirkman\r\nNXB: NXB Dân Trí\r\nNăm XB: 2020\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 150\r\nKích Thước Bao Bì: 14 x 19 cm\r\nSố trang: 144\r\nHình thức: Bìa Mềm', 49000, 3, 'uploads/twd2_biaao_demo.jpg'),
(8, 'My Hero Academia - Học Viện Siêu Anh Hùng - Tập 5: Todoroki Shoto: Khởi Đầu', 'Kohei Horikoshi', 'Mã hàng: 8935244866827\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Kohei Horikoshi\r\nNgười Dịch: Ruyuha Kyouka\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2022\r\nTrọng lượng (gr): 126\r\nKích Thước Bao Bì: 17.6 x 11.3 x 1.2 cm\r\nSố trang: 192\r\nHình thức: Bìa Mềm', 20000, 3, 'uploads/image_186914.jpg'),
(9, 'One-Punch Man - Tập 22: Ánh Sáng', 'One, Yusuke Murata', 'Mã hàng: 8935244866773\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: One, Yusuke Murata\r\nNgười Dịch: Barbie Ayumi, Mokey King\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2022\r\nTrọng lượng (gr): 128\r\nKích Thước Bao Bì: 17.6 x 11.3 x 1.2 cm\r\nSố trang: 200\r\nHình thức: Bìa Mềm', 21000, 3, 'uploads/one-22.jpg'),
(10, 'Thanh Gươm Diệt Quỷ - Kimetsu No Yaiba - Tập 9: Đại Chiến Dịch Xâm Nhập Phố Đèn Đỏ', 'Koyoharu Gotouge', 'Mã hàng: 8935244844115\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Koyoharu Gotouge\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2020\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 200\r\nKích Thước Bao Bì: 17.6 x 11.3 cm\r\nSố trang: 192\r\nHình thức: Bìa Mềm', 22500, 3, 'uploads/thanh-guom-diet-quy-tap-9.jpg'),
(11, 'Boxset Your Name - Bộ 3 Tập', 'Shinkai Makoto, Kotone Ranmaru', 'Mã hàng: 8935250705578\r\nTên Nhà Cung Cấp: IPM\r\nTác giả: Shinkai Makoto, Kotone Ranmaru\r\nNXB: NXB Hồng Đức\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 1500\r\nKích Thước Bao Bì: 18 x 13 cm\r\nHình thức: Bộ Hộp', 123000, 3, 'uploads/your-name-box_199604cc2dd241259cd5610d22c24ae6_master.jpg'),
(12, 'Trí Tuệ Do Thái (Tái Bản 2018)', 'Eran Katz', 'Mã hàng: 8935251419184\r\nTên Nhà Cung Cấp: Alpha Books\r\nTác giả: Eran Katz\r\nNgười Dịch: Phương Oanh\r\nNXB: Công Thương\r\nNăm XB: 2022\r\nTrọng lượng (gr): 438\r\nKích Thước Bao Bì: 20.5 x 13 x 2 cm\r\nSố trang: 444\r\nHình thức: Bìa Mềm', 169000, 2, 'uploads/tr_-tue-do-thai_outline_15.9.2017-02.jpg'),
(13, ' Hỏa Ngục (Tái bản 2020)', 'Dan Brown', 'Mã hàng: 9786049898174\r\nTên Nhà Cung Cấp: Bách Việt\r\nTác giả: Dan Brown\r\nNgười Dịch: Nguyễn Xuân Hồng\r\nNXB: NXB Lao Động\r\nNăm XB: 2020\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 700\r\nKích Thước Bao Bì: 16 x 24 cm\r\nSố trang: 688\r\nHình thức: Bìa Cứng', 219000, 2, 'uploads/image_195509_1_31875.jpg'),
(14, 'Slam Dunk 完全版 4', '井上 雄彦', 'Mã hàng: 9784088591933\r\nTên Nhà Cung Cấp: Kinokuniya Book Stores\r\nTác giả: 井上 雄彦\r\nNXB : Shueisha\r\nNăm XB: 2001\r\nNgôn Ngữ: Tiếng Nhật\r\nTrọng lượng (gr): 435\r\nKích Thước Bao Bì: 21 x 14.6 x 2.2 cm\r\nSố trang: 242\r\nHình thức: Bìa Mềm', 284400, 3, 'uploads/slamdunk4-deluxe-edition-tap-4.jpg'),
(15, 'Re:zero - Bắt Đầu Lại Ở Thế Giới Khác 7', 'Tappei Nagatsuki', 'Mã hàng: 8935250706377\r\nTên Nhà Cung Cấp: IPM\r\nTác giả: Tappei Nagatsuki\r\nNgười Dịch: Kai\r\nNXB: NXB Hồng Đức\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 350\r\nKích Thước Bao Bì: 18 x 13 cm\r\nSố trang: 380\r\nHình thức: Bìa Mềm', 120000, 3, 'uploads/re-zero-7.jpg'),
(16, 'Im - Đại Tư Tế Imhotep - Tập 9', 'Makoto Morishita', 'Mã hàng: 8935244858907\r\nĐộ Tuổi: 15 - 18\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Makoto Morishita\r\nNgười Dịch: Ruyuha Kyouka\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 131\r\nKích Thước Bao Bì: 7.6 x 11.3 x 1.5 cm\r\nSố trang: 184\r\nHình thức: Bìa Mềm', 22500, 3, 'uploads/im-dai-tu-te-imhotep_tap-9.jpg'),
(17, 'STEM - Kỹ Thuật Siêu Đơn Giản', 'Jenny Jacoby viết lời, Vicky Barker minh họa', 'Mã hàng: 8935251405538\r\nTên Nhà Cung Cấp: Alpha Books\r\nTác giả: Jenny Jacoby viết lời, Vicky Barker minh họa\r\nNgười Dịch: Lê Hải\r\nNXB: NXB Dân Trí\r\nNăm XB: 11-2017\r\nTrọng lượng (gr): 100\r\nKích Thước Bao Bì: 21 x 23\r\nSố trang: 32\r\nHình thức: Bìa Mềm', 59000, 2, 'uploads/image_227958.jpg'),
(18, 'Nhà Giả Kim (Tái Bản 2020)', 'Paulo Coelho', 'Mã hàng: 8935235226272\r\nTên Nhà Cung Cấp: Nhã Nam\r\nTác giả: Paulo Coelho\r\nNgười Dịch: Lê Chu Cầu\r\nNXB: NXB Hội Nhà Văn\r\nNăm XB: 2020\r\nTrọng lượng (gr): 220\r\nKích Thước Bao Bì: 20.5 x 13 cm\r\nSố trang: 227\r\nHình thức: Bìa Mềm', 59250, 2, 'uploads/image_195509_1_36793.jpg'),
(19, 'Complete IELTS B2 Student\'s Book with answer & CD-Rom', 'Mark Harrison', 'Mã hàng: 9781107695962\r\nTên Nhà Cung Cấp: Cambridge University Press\r\nTác giả: Mark Harrison\r\nNXB: Cambridge\r\nNăm XB: 2012\r\nTrọng lượng (gr): 700\r\nKích Thước Bao Bì: 22x31\r\nSố trang: 166\r\nHình thức: Bìa Mềm', 251100, 2, 'uploads/image_195509_1_22278.jpg'),
(20, 'The Lost Symbol', 'Dan Brown', 'Mã hàng: 9780552161237\r\nTên Nhà Cung Cấp: Grantham Book Services\r\nTác giả: Dan Brown\r\nNXB: Corgi Books\r\nNăm XB: 01/01/2010\r\nTrọng lượng (gr): 550\r\nKích Thước Bao Bì: 12 x 5 x 18\r\nSố trang: 670\r\nHình thức: Bìa Mềm', 179000, 1, 'uploads/image_195509_1_22250_thanh_ly_1.jpg'),
(21, 'Chuyện Con Mèo Dạy Hải Âu Bay (Tái Bản 2019)', 'Luis Sepúlveda', 'Mã hàng: 8935235222113\r\nTên Nhà Cung Cấp: Nhã Nam\r\nTác giả: Luis Sepúlveda\r\nNgười Dịch: Phương Huyên\r\nNXB: NXB Hội Nhà Văn\r\nNăm XB: 2019\r\nTrọng lượng (gr): 150\r\nKích Thước Bao Bì: 14 x 20.5\r\nSố trang: 144\r\nHình thức: Bìa Mềm', 39200, 3, 'uploads/image_188285.jpg'),
(22, 'Tuổi Thơ Dữ Dội - Tập 2 (Tái Bản 2019)', 'Phùng Quán', 'Mã hàng: 8935244827989\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Phùng Quán\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2019\r\nTrọng lượng (gr): 420\r\nKích Thước Bao Bì: 13.5 x 20.5\r\nSố trang: 400\r\nHình thức: Bìa Mềm', 68000, 1, 'uploads/image_187163.jpg'),
(23, 'My Hero Academia - Học Viện Siêu Anh Hùng - Tập 3: All Might', 'Kohei Horikoshi', 'Mã hàng: 8935244866803\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Kohei Horikoshi\r\nNgười Dịch: Ruyuha Kyouka\r\nNXB: NXB Kim Đồng\r\nNăm XB: 2022\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 200\r\nKích Thước Bao Bì: 17.6 x 11.3 x 0.4 cm\r\nSố trang: 192\r\nHình thức: Bìa Mềm', 20000, 3, 'uploads/image_186912.jpg'),
(24, 'Tuổi Trẻ Đáng Giá Bao Nhiêu (Tái Bản 2021)', 'Rosie Nguyễn', 'Mã hàng: 8935235231115\r\nTên Nhà Cung Cấp: Nhã Nam\r\nTác giả: Rosie Nguyễn\r\nNXB: NXB Hội Nhà Văn\r\nNăm XB: 2021\r\nTrọng lượng (gr): 370\r\nKích Thước Bao Bì: 20.5 x 14 cm\r\nSố trang: 291\r\nHình thức: Bìa Mềm', 67500, 1, 'uploads/image_180164_2_287.jpg'),
(25, 'Cẩm Nang Phương Pháp Sư Phạm', 'Nguyễn Thị Minh Phượng', 'Mã hàng: 8935086855669\r\nTên Nhà Cung Cấp: FIRST NEWS\r\nTác giả: Nguyễn Thị Minh Phượng\r\nNXB: Tổng Hợp TPHCM\r\nNăm XB: 2022\r\nTrọng lượng (gr): 300\r\nKích Thước Bao Bì: 24 x 16 cm x 1.5\r\nSố trang: 284\r\nHình thức: Bìa Mềm', 142800, 1, 'uploads/camnangppsupham.u84.d20161125.t123417.884704.jpg'),
(26, 'Con Chim Xanh Biếc Bay Về ', 'Nguyễn Nhật Ánh', 'Mã hàng: 8934974170617\r\nTên Nhà Cung Cấp: NXB Trẻ\r\nTác giả: Nguyễn Nhật Ánh\r\nNXB: NXB Trẻ\r\nNăm XB: 2020\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 400\r\nKích Thước Bao Bì: 20 x 13 cm\r\nSố trang: 396\r\nHình thức: Bìa Mềm', 112500, 1, 'uploads/biamem.jpg'),
(27, 'Tô Bình Yên Vẽ Hạnh Phúc', 'Kulzsc', 'Mã hàng: 8935325006289\r\nTên Nhà Cung Cấp: Skybooks\r\nTác giả: Kulzsc\r\nNXB: NXB Phụ Nữ Việt Nam\r\nNăm XB: 2022\r\nTrọng lượng (gr): 150\r\nKích Thước Bao Bì: 24 x 19 x 0.4 cm\r\nSố trang: 96\r\nHình thức: Bìa Mềm', 66000, 2, 'uploads/bia1_tobinhyen_2_1_1.jpg'),
(28, 'My Hero Academia - Học Viện Siêu Anh Hùng - Tập 27: One’s Justice', 'Kohei Horikoshi', 'Mã hàng: 8935244869354\r\nTên Nhà Cung Cấp: Nhà Xuất Bản Kim Đồng\r\nTác giả: Kohei Horikoshi\r\nNgười Dịch: Ruyuha Kyouka\r\nNXB: Kim Đồng\r\nNăm XB: 2022\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 141\r\nKích Thước Bao Bì: 17.6 x 11.3 x 1 cm\r\nSố trang: 184\r\nHình thức: Bìa Mềm', 22500, 3, 'uploads/600my-hero-academia-hoc-vien-sieu-anh-hung.jpg'),
(29, 'Hiệp Sĩ Xương Trên Đường Du Hành Đến Thế Giới Khác - Tập 1', 'Ennki Hakari', 'Mã hàng: 8936186544002\r\nTên Nhà Cung Cấp: AZ Việt Nam\r\nTác giả: Ennki Hakari\r\nNgười Dịch: Kai\r\nNXB: NXB Thế Giới\r\nNăm XB: 2020\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 453\r\nKích Thước Bao Bì: 18 x 13 x 2.3 cm\r\nSố trang: 456\r\nHình thức: Bìa Mềm', 107100, 3, 'uploads/8936186544002.jpg'),
(30, 'Đứa Con Của Thời Tiết', 'SHINKAI MAKOTO', 'Mã hàng: 8935250703741\r\nTên Nhà Cung Cấp: IPM\r\nTác giả: SHINKAI MAKOTO\r\nNXB: NXB Hà Nội\r\nNăm XB: 2021\r\nNgôn Ngữ: Tiếng Việt\r\nTrọng lượng (gr): 260\r\nKích Thước Bao Bì: 18 x 13 x 1.5 cm\r\nSố trang: 284\r\nHình thức: Bìa Mềm', 68000, 3, 'uploads/342956.jpg');

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sách Tiếng Việt'),
(2, 'Sách nước ngoài'),
(3, 'Manga - Comic');


INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `address`, `phone`, `role`) VALUES
(1, 'user1', '$2y$10$RMWm9AJ5i3GTAqXtzFvekO4JpYFSMZcXHoYKeozvoJrUremRvLiv2', 'tpvtpv1234@gmail.com', '', '', '', 0),
(6, 'admin', '$2y$10$nTws0eHFAK0Y1IbopWvIwO2izeCYOam.J2oNzcsvSPsrCdqmhIvOC', 'admin@gmail.com', '', '', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


-- AUTO_INCREMENT cho các bảng đã đổ

ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- Các ràng buộc cho các bảng đã đổ

ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;
