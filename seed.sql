-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 04, 2024 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ditravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `bookings_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `start_location` enum('Hà Nội','Hồ Chí Minh') NOT NULL DEFAULT 'Hà Nội',
  `booking_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`bookings_id`, `tour_id`, `user_id`, `number_of_people`, `total_price`, `address`, `start_location`, `booking_date`, `status`) VALUES
(3, 8, 2, 2, 700, 'Hà Nội', 'Hà Nội', '2024-11-29', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image2` varchar(255) NOT NULL,
  `content2` text NOT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `content3` text DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `title`, `main_img`, `description`, `image1`, `content`, `image2`, `content2`, `image3`, `content3`, `author_id`, `status`, `create_at`) VALUES
(2, 'Michelin Guide công bố danh sách 42 \"quán ngon giá rẻ\" tại Hà Nội và TP Hồ Chí Minh', 'mainimg.webp', 'Danh sách 42 quán ăn mới nhất cho hạng mục Bib Gourmand của Michelin Guide vinh danh 5 quán ăn mới ở Hà Nội và 8 quán ăn mới ở Thành phố Hồ Chí Minh.\r\n', 'buncha.jpg', 'Tại Hà Nội, 5 cơ sở ăn uống mới trong hạng mục Bib Gourmand là: Bún Chả Chan, Luk Lak, Miến Lươn Đông Thịnh, Mr Bảy Miền Tây, Phở Khôi Hói.\r\n\r\nTại Thành phố Hồ Chí Minh, 8 cơ sở ăn uống mới trong hạng mục Bib Gourmand là: Bánh Xèo 46A; Bò Kho Gánh; Bún Bò Huế 14B; Mặn Mòi (Thành phố Thủ Đức); Nhà Tú; Tiệm Cơm Thố; Vị Quê Kitchen; Sol Kitchen & Bar.', 'img1.webp', 'Trong danh sách tuyển chọn của Michelin Guide, giải thưởng Bib Gourmand tôn vinh các cơ sở ăn uống với chất lượng món ăn tuyệt vời đi kèm giá trị tương xứng. Do đó, danh sách các cơ sở ăn uống Bib Gourmand được cộng đồng sử dụng Michelin Guide theo dõi nhằm tìm kiếm những bữa ăn ngon với giá cả phải chăng mà vẫn đảm bảo chất lượng cũng như hương vị.\r\n\r\nÔng Gwendal Poullennec, Giám đốc Quốc tế của Michelin Guide nhận xét: \"Với 13 cơ sở ăn uống mới nhận giải thưởng Bib Gourmand ở Hà Nội và Thành phố Hồ Chí Minh trong năm nay, danh sách tuyển chọn năm 2024 của chúng tôi như một lời mời gửi đến thực khách hãy khám phá sự quyến rũ, chất lượng và đa dạng vô tận của ẩm thực Việt Nam. Dù là phong cách cổ điển hay hiện đại, truyền thống hay sáng tạo, những cơ sở ăn uống được các thẩm định viên ẩn danh của chúng tôi yêu thích khi khám phá và lựa chọn vào danh sách Bib Gourmand sẽ là sự đảm bảo để các thực khách có thể tận hưởng những trải nghiệm ẩm thực đích thực với mức giá phải chăng, hấp dẫn và khám phá cuộc sống Hà Nội và Thành phố Hồ Chí Minh qua một trong những \"tài sản\" quan trọng nhất của các thành phố này\".\r\n\r\n', 'img2.webp', 'Tổng cộng, danh sách các cơ sở ăn uống của hạng mục Bib Gourmand ở Hà Nội và Thành phố Hồ Chí Minh năm 2024 bao gồm 7 loại hình ẩm thực: ẩm thực Việt Nam, các món mì, ẩm thực Châu Âu đương đại, ẩm thực đường phố, các món chay, ẩm thực Quảng Đông và Mỹ Latinh. Đây là minh chứng cho nền ẩm thực sôi động của cả hai thành phố, nơi có nhiều món ăn ngon với giá cả phải chăng.\r\n\r\nToàn bộ danh sách cơ sở ăn uống tuyển chọn năm 2024 của Michelin Guide Hà Nội, Thành phố Hồ Chí Minh và Đà Nẵng – trong đó bao gồm Sao Michelin (Michelin Stars) và Giải thưởng đặc biệt của Michelin (Michelin Guide Special Awards) - sẽ được tiết lộ vào ngày 27/6 trong Lễ Công bố đặc biệt, được tổ chức tại Thành phố Hồ Chí Minh.', 1, '', '2024-11-24 04:48:36'),
(10, '5 điểm đến ở Việt Nam cho người thích đi một mình', 'muine.jpg', 'Hà Nội, Huế, Hội An, Ninh Bình, Phan Thiết thích hợp cho khách đi một mình với những trải nghiệm thiên nhiên và văn hóa.\r\n\r\nDanh sách 5 điểm đến lý tưởng cho khách đi du lịch một mình tại Việt Nam được gợi ý dựa trên lượng tìm kiếm nhiều, đánh giá cao trên Booking, ứng dụng đặt phòng có đối tác ở 220 quốc gia, vùng lãnh thổ. Danh sách này xếp theo bảng chữ cái.', 'hanoi1.jpg', 'Hà Nội: Hành trình văn hóa\r\n\r\nThủ đô Việt Nam với lịch sử nghìn năm văn hiến được xem là \"thiên đường cho những ai muốn đắm mình vào dòng chảy văn hóa\". Du khách có thể một mình trải nghiệm cuộc sống náo nhiệt ở phố cổ, lang thang dạo bước tại hồ Hoàn Kiếm hay lạc lối trong nét cổ kính của các ngôi chùa.\r\n\r\nKhách nên dành thời gian thư giãn bên bờ hồ ngắm tháp rùa với một ly cà phê Việt, tham gia tour ẩm thực hoặc đi bộ để trò chuyện với người dân, du khách khác và khám phá lịch sử thành phố.', 'hue.jpg', 'Huế: Điểm đến bình yên\r\n\r\nCố đô Huế mang đến không gian yên bình, phù hợp cho những du khách muốn sống chậm hoặc chữa lành, tránh xa náo nhiệt. Tại đây, du khách có thể tìm thấy những khu vườn yên bình và vắng vẻ, các ngôi chùa, lăng tẩm cổ kính cùng nét thơ mộng của sông Hương. Những điểm đến này được Booking đánh giá sẽ giúp du khách tái tạo năng lượng, hứng khởi quay lại cuộc sống hiện tại.\r\n\r\nKhách đi một mình có thể khám phá vẻ đẹp độc đáo của chùa Thiên Mụ, dạo bước qua khuôn viên xanh mát của kinh thành Huế hoặc ngồi thuyền dạo trên sông Hương.\r\n\r\n', 'muine.jpg', 'Phan Thiết: Nơi thư giãn bên biển\r\n\r\nBooking đánh giá Phan Thiết mang lại cho du khách cảm giác thư thái, tách biệt khỏi nhịp sống hối hả hiện đại. Nơi đây có những bãi tắm màu xanh ngọc, các đồi cát đỏ và trắng nổi tiếng tại Mũi Né và vẻ đẹp tự nhiên của Suối Tiên.', 1, '', '2024-11-24 05:05:36'),
(13, 'Michelin Guide công bố danh sách 42 \"quán ngon giá rẻ\" tại Hà Nội và TP Hồ Chí Minh', 'mainimg.webp', 'Danh sách 42 quán ăn mới nhất cho hạng mục Bib Gourmand của Michelin Guide vinh danh 5 quán ăn mới ở Hà Nội và 8 quán ăn mới ở Thành phố Hồ Chí Minh.\r\n', 'buncha.jpg', 'Tại Hà Nội, 5 cơ sở ăn uống mới trong hạng mục Bib Gourmand là: Bún Chả Chan, Luk Lak, Miến Lươn Đông Thịnh, Mr Bảy Miền Tây, Phở Khôi Hói.\r\n\r\nTại Thành phố Hồ Chí Minh, 8 cơ sở ăn uống mới trong hạng mục Bib Gourmand là: Bánh Xèo 46A; Bò Kho Gánh; Bún Bò Huế 14B; Mặn Mòi (Thành phố Thủ Đức); Nhà Tú; Tiệm Cơm Thố; Vị Quê Kitchen; Sol Kitchen & Bar.', 'img1.webp', 'Trong danh sách tuyển chọn của Michelin Guide, giải thưởng Bib Gourmand tôn vinh các cơ sở ăn uống với chất lượng món ăn tuyệt vời đi kèm giá trị tương xứng. Do đó, danh sách các cơ sở ăn uống Bib Gourmand được cộng đồng sử dụng Michelin Guide theo dõi nhằm tìm kiếm những bữa ăn ngon với giá cả phải chăng mà vẫn đảm bảo chất lượng cũng như hương vị.\r\n\r\nÔng Gwendal Poullennec, Giám đốc Quốc tế của Michelin Guide nhận xét: \"Với 13 cơ sở ăn uống mới nhận giải thưởng Bib Gourmand ở Hà Nội và Thành phố Hồ Chí Minh trong năm nay, danh sách tuyển chọn năm 2024 của chúng tôi như một lời mời gửi đến thực khách hãy khám phá sự quyến rũ, chất lượng và đa dạng vô tận của ẩm thực Việt Nam. Dù là phong cách cổ điển hay hiện đại, truyền thống hay sáng tạo, những cơ sở ăn uống được các thẩm định viên ẩn danh của chúng tôi yêu thích khi khám phá và lựa chọn vào danh sách Bib Gourmand sẽ là sự đảm bảo để các thực khách có thể tận hưởng những trải nghiệm ẩm thực đích thực với mức giá phải chăng, hấp dẫn và khám phá cuộc sống Hà Nội và Thành phố Hồ Chí Minh qua một trong những \"tài sản\" quan trọng nhất của các thành phố này\".\r\n\r\n', 'img2.webp', 'Tổng cộng, danh sách các cơ sở ăn uống của hạng mục Bib Gourmand ở Hà Nội và Thành phố Hồ Chí Minh năm 2024 bao gồm 7 loại hình ẩm thực: ẩm thực Việt Nam, các món mì, ẩm thực Châu Âu đương đại, ẩm thực đường phố, các món chay, ẩm thực Quảng Đông và Mỹ Latinh. Đây là minh chứng cho nền ẩm thực sôi động của cả hai thành phố, nơi có nhiều món ăn ngon với giá cả phải chăng.\r\n\r\nToàn bộ danh sách cơ sở ăn uống tuyển chọn năm 2024 của Michelin Guide Hà Nội, Thành phố Hồ Chí Minh và Đà Nẵng – trong đó bao gồm Sao Michelin (Michelin Stars) và Giải thưởng đặc biệt của Michelin (Michelin Guide Special Awards) - sẽ được tiết lộ vào ngày 27/6 trong Lễ Công bố đặc biệt, được tổ chức tại Thành phố Hồ Chí Minh.', 1, '', '2024-11-24 04:48:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `reviews_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`reviews_id`, `tour_id`, `user_id`, `comment`, `create_at`) VALUES
(2, 8, 2, 'good', '2024-11-29'),
(3, 8, 2, 'good', '2024-11-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tour_status` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `tour_name`, `location`, `vehicle`, `region`, `start_location`, `description`, `price`, `duration`, `image`, `start_date`, `end_date`, `tour_status`, `image1`, `image2`, `image3`, `image4`) VALUES
(2, 'Hồ Ba Bể - Thác Bản Giốc', 'Cao Bằng', 'Xe ô tô', 'Miền Bắc', 'Hà Nội', 'Tour Hồ Ba Bể - Thác Bản Giốc 3 ngày 2 đêm khởi hành từ Hà Nội sẽ đưa du khách khám phá những cảnh sắc tuyệt vời nhất của miền núi phía Bắc vào dịp Tết Nguyên Đán 2025.', 100, '3N2Đ', 'caobang.webp', '2024-11-23', '2024-11-25', 'hot', 'caobang1.jpg', 'caobang2.jpg', 'caobang3.jpg', 'caobang4.jpg'),
(3, 'Hà Giang - Sông Nho Quế hùng vĩ', 'Hà Giang', 'Xe ô tô, xe máy', 'Miền Bắc', 'Hà Nội', 'Tour Hà Giang 3 ngày 2 đêm từ Hà Nội vào dịp Tết Nguyên Đán 2025 sẽ mang đến cho bạn cơ hội trải nghiệm cảnh đẹp hùng vĩ của miền núi phía Bắc. Đây là hành trình lý tưởng để tận hưởng kỳ nghỉ Tết, khám phá văn hóa và thiên nhiên vùng cao, đồng thời tránh xa sự ồn ào của thành phố.', 100, '3N2Đ', 'hagiang.jpg', '2024-11-22', '2024-11-24', 'hot', 'hagiang1.jpg', 'hagiang2.jpeg', 'hagiang3.webp', 'hagiang4.jpg'),
(4, 'Mộc Châu - Sơn La - Điện Biên - Lai Châu - Sapa', 'Tây Bắc', 'Xe ô tô, xe máy', 'Miền Bắc', 'Hà Nội', 'Tour du xuân Tây Bắc qua Mộc Châu - Sơn La - Điện Biên - Lai Châu - Sapa 5 ngày 4 đêm dịp Tết Nguyên Đán 2025 bạn sẽ được đắm mình trong không gian của núi non, những bản làng bình dị, và hòa mình vào sắc xuân rực rỡ trời Tây Bắc. ', 100, '5N4Đ', 'sapa.jpg', '2024-11-23', '2024-11-28', 'hot', 'sapa1.jpg', 'sapa2.jpg', 'sapa3.jpg', 'sapa4.jpg'),
(5, 'Săn mây Tà Xùa - Bắc Yên ', 'Bắc Yên, Sơn La', 'Xe ô tô, xe máy', 'Miền Bắc', 'Hà Nội', 'Tour săn mây Tà Xùa - Bắc Yên 2 ngày 1 đêm vào dịp Tết Nguyên Đán 2025 sẽ đưa bạn đến với một vùng đất hoang sơ và hùng vĩ, nơi bạn có thể ngắm nhìn những biển mây trải dài như vô tận. Chuyến đi là cơ hội lý tưởng để tạm rời xa sự nhộn nhịp của thành phố, hòa mình vào không gian thanh bình và trong lành của núi rừng Tây Bắc.', 150, '2N1Đ', 'taxua.jpg', '2024-11-30', '2024-12-03', 'hot', 'taxua1.jpg', 'taxua2.jpg', 'taxua3.jpg', 'taxua4.jpg'),
(6, 'Đà Nẵng - Hội An - Sơn Trà - Bà Nà Hills', 'Đà Nẵng', 'Xe ô tô', 'Miền Nam', 'Hồ Chí Minh', 'Tour Đà Nẵng - Hội An - Sơn Trà - Bà Nà Hills 4 ngày 3 đêm của PYS Travel sẽ mang đến cho bạn một trải nghiệm tuyệt vời với những địa danh nổi tiếng cùng với vẻ đẹp tự nhiên tuyệt vời và văn hóa ẩm thực phong phú của hai thành phố này.', 250, '4N3Đ', 'danang.jpg', '2024-11-30', '2024-12-04', 'hot', 'danang1.jpg', 'danang2.jpg', 'danang3.jpg', 'danang4.jpg'),
(7, 'Quy Nhơn - Phú Yên', 'Quy Nhơn', 'Xe ô tô, tàu', 'Miền Nam', 'Hồ Chí Minh', 'Tour Quy Nhơn- Phú Yên 4 ngày 3 đêm cùng PYS Travel sẽ cùng quý khách khám phá vẻ đẹp mà tạo hóa đã ban tặng cho Quy Nhơn nơi được mệnh danh \"thiên đường Maldives\" của Việt Nam\r\n\r\nQuy Nhơn hấp dẫn du khách bởi sự thanh bình, yên tĩnh của những bãi biển hoang sơ chưa bị thương mại hóa cao. Sẽ là một trải nghiệm tuyệt vời dành cho những ai đam mê cung đường đầy nắng, gió và kiến tạo kỳ vĩ của thiên nhiên.', 300, '4N3Đ', 'quynhon.webp', '2024-11-30', '2024-12-04', 'hot', 'quynhon1.jpg', 'quynhon2.jpg', 'quynhon3.jpg', 'quynhon4.jpg'),
(8, 'Cần Thơ - Côn Đảo', 'Cần Thơ', 'Xe ô tô, tàu', 'Miền Nam', 'Hồ Chí Minh', 'Tạo hóa đã ban tặng cho miền Tây cái đẹp mộc mạc mà nên thơ, với những cánh đồng xanh bát ngát, những miệt vườn sai quả, những ngả đường trĩu nặng phù sa. Đặc biệt, du khách sẽ được xuôi về miền sông nước hữu tình này để chu du, thưởng ngoạn và trải nghiệm những điều bình dị, chân phương.\r\n\r\nKhám phá Côn Đảo – hòn đảo từng được mệnh danh là ‘Địa ngục trần gian’, nơi ghi dấu những địa danh thấm đẫm máu đào của những người con yêu nước. Nơi đây cũng gây ngỡ ngàng khi mang vẻ đẹp tuyệt vời và bình yên đến lạ, níu chân du khách phương xa', 350, '5N4Đ', 'cantho.jpg', '2024-12-18', '2024-12-22', 'hot', 'cantho1.jpg', 'cantho2.jpg', 'cantho3.jpg', 'cantho4.jpg'),
(9, 'Phố cổ Hội An', 'Hội An, Đà Nẵng', 'Xe ô tô', 'Miền Nam', 'Hồ Chí Minh', 'Cùng với bao biến cố thăng trầm của lịch sử, phố cổ Hội An vẫn giữ những nét đẹp xưa cổ trầm mặc rêu phong như chính nét bình dị trong tính cách, tâm hồn của người dân địa phương.', 220, '3N2Đ', 'hoian.webp', '2024-11-26', '2024-11-29', 'famous', 'hoian1.jpg', 'hoian2.jpg', 'hoian3.jpg', 'hoian4.jpg'),
(10, 'Làng Hoa Sa Đéc', 'Đồng Tháp', 'Xe ô tô, thuyền', 'Miền Nam', 'Hồ Chí Minh', 'Thủ phủ hoa kiểng miền Tây, sắc màu rực rỡ quanh năm. Trải nghiệm văn hóa miền Tây và thưởng thức đặc sản trứ danh.', 210, '3N2Đ', 'langhoa.jpg', '2024-11-29', '2024-11-21', 'famous', 'dongthap1.jpg', 'dongthap2.jpg', 'dongthap3.jpg', 'dongthap4.jpg'),
(16, 'Mù Cang Chải', 'Yên Bái', 'Xe ô tô, xe máy', 'Miền Bắc', 'Hà Nội', 'Mù Cang Chải nổi bật với những danh thắng nổi bật như ruộng bậc thang, thác nước hùng vĩ và những bản làng độc đáo.', 220, '3N2Đ', 'mucangchai.jpg', '2024-11-26', '2024-11-29', 'famous', 'mucangchai1.jpg', 'mucangchai2.jpg', 'mucangchai3.jpg', 'mucangchai4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `role` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `fullname`, `sdt`, `role`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', 'admin', 987654321, 'admin'),
(2, 'client', 'client123', 'client@gmail.com', 'client', 987654321, 'client');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookings_id`),
  ADD KEY `fk_bookings_user` (`user_id`),
  ADD KEY `fk_tour_user` (`tour_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `fk_news_user` (`author_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_bookings` (`booking_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_id`),
  ADD KEY `fk_reviews_user` (`user_id`),
  ADD KEY `fk_reviews_tour` (`tour_id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_tour_user` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_user` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_bookings` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`bookings_id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_tour` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `fk_reviews_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Thêm created_at vào bảng bookings
ALTER TABLE `bookings` 
ADD COLUMN `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP;

-- Đổi tên create_at thành created_at trong bảng news
ALTER TABLE `news` 
CHANGE COLUMN `create_at` `created_at` DATETIME NOT NULL;

-- Thêm created_at vào bảng payments
ALTER TABLE `payments` 
ADD COLUMN `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP;

-- Đổi tên create_at thành created_at trong bảng reviews
ALTER TABLE `reviews` 
CHANGE COLUMN `create_at` `created_at` DATE NOT NULL;

-- Thêm created_at vào bảng tour
ALTER TABLE `tour` 
ADD COLUMN `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP;

-- Thêm created_at vào bảng user
ALTER TABLE `user` 
ADD COLUMN `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP;