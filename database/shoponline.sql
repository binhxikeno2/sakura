-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2019 lúc 12:30 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoponline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `namecat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cat`, `namecat`, `status`, `id_sub`) VALUES
(1, 'Dưỡng Da', 0, 0),
(3, 'Dưỡng Thể', 1, 0),
(4, 'Trang Điểm', 1, 0),
(10, 'Son Môi', 1, 0),
(11, 'Nước Hoa', 0, 0),
(13, 'sdsd', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(22, 'hay', 5, 83, '2019-10-13 08:32:53', '2019-10-13 08:32:53'),
(23, 'hay', 5, 88, '2019-10-17 07:52:58', '2019-10-17 07:52:58'),
(24, 'sdas', 5, 81, '2019-10-17 08:20:26', '2019-10-17 08:20:26'),
(25, 'hay', 2, 87, '2019-10-22 05:01:56', '2019-10-22 05:01:56'),
(26, 'hay', 2, 87, '2019-10-22 05:07:14', '2019-10-22 05:07:14'),
(27, 'ok', 2, 87, '2019-10-22 05:09:49', '2019-10-22 05:09:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id_contact`, `fullname`, `email`, `title`, `content`) VALUES
(1, 'Nguyeenx Thanh binh', 'admin@gmail.com', '123123wdasad', 'dasdsad'),
(2, 'scsasa', 'asdsad', 'asdasd', 'dasd'),
(3, 'sdasd', 'dsad', 'đá', 'đá'),
(4, 'sdasd', 'dsd', 'dsd', 'sdsa'),
(5, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(6, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(7, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(8, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(9, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(10, 'nguyen binh', 'admin@gmail.com', 'sdsdasd', 'sdsa'),
(11, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(12, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(13, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(14, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(15, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(16, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(17, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(18, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(19, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(20, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa'),
(21, 'nguyen binh', 'binhnguyen280498@gmail.com', 'sdsdasd', 'sdsa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_type`
--

CREATE TABLE `customer_type` (
  `id_customer` int(11) NOT NULL,
  `customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_point` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_type`
--

INSERT INTO `customer_type` (`id_customer`, `customer`, `customer_point`, `discount`) VALUES
(1, 'Bạch Kim', 15, 20),
(2, 'Vàng', 10, 10),
(3, 'Bạc', 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `id_code` int(11) NOT NULL,
  `namegift` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giftcode`
--

INSERT INTO `giftcode` (`id_code`, `namegift`, `qty`, `value`, `date_start`, `deadline`) VALUES
(6, 'KHMM23', 25, 35, '2019-10-04 06:29:50', '2019-05-05 05:00:00'),
(7, 'AOWP241', 10, 10, '2019-10-04 06:29:52', '2019-05-05 05:00:00'),
(8, 'SFASGA23', 15, 15, '2019-10-04 06:29:53', '2019-05-05 05:00:00'),
(9, 'SDAHSD2S', 5, 25, '2019-10-04 06:29:57', '2019-05-05 05:00:00'),
(10, 'DFIJWFN2', 21, 15, '2019-10-04 06:29:59', '2019-05-05 05:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'mod'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `news` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_news` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `news`, `preview`, `detail`, `picture_news`, `created_at`, `updated_at`) VALUES
(2, '4 cây son tông nâu đẹp đỉnh cao, diện lên vừa sang vừa tôn da đáng để bạn rước về nhất thu này', 'Tông son nâu bí ẩn, thời thượng luôn tạo nên sức hút mãnh liệt với hội chị em cuồng makeup. Hãy cùng nghía qua 6 thỏi son nâu trong bài để xem có “em” nào làm bạn trầm trồ không nhé!', '<p>(175.000 VNĐ)Nếu ch&aacute;n ngấy với sắc đỏ, cam, hồng - những t&ocirc;ng cơ bản trong bảng m&agrave;u son, th&igrave; những c&acirc;y son pha n&acirc;u đẹp lạ dưới đ&acirc;y chắc chắn sẽ l&agrave; list mỹ phẩm &quot;ngon nghẻ&quot; d&agrave;nh cho bạn đấy. Kh&ocirc;ng phải ngẫu nhi&ecirc;n m&agrave; t&ocirc;ng son n&acirc;u chiếm thế thượng phong, dễ đi v&agrave;o l&ograve;ng nhiều beauty blogger đ&igrave;nh đ&aacute;m, bởi n&oacute; mang quyền năng đặc biệt l&agrave; kh&ocirc;ng k&eacute;n t&ocirc;ng da, đ&aacute;nh l&ograve;ng m&ocirc;i cũng dễ cưng, s&agrave;nh điệu, m&agrave; đ&aacute;nh cả m&ocirc;i th&igrave; lại c&agrave;ng &quot;chanh sả&quot; hết nấc.</p>\r\n\r\n<h3><strong>1. Merzy Bite The Beat Mellow Tint &ndash; M&agrave;u M2: Jane Chili&nbsp;</strong>(175.000 VNĐ)</h3>\r\n\r\n<h3><strong>2. Merzy Bite The Beat Mellow Tint &ndash; M&agrave;u M4: Bian Rose&nbsp;</strong>(175.000 VNĐ)</h3>\r\n\r\n<h3><strong>3. Romand Zero Velvet Tint &ndash; M&agrave;u Deep Soul (</strong>256.000 VNĐ)</h3>\r\n\r\n<h3><strong>4. Amuse Newtro Matt &ndash; M&agrave;u 07: Tiger Chili (</strong>355.000 VNĐ)</h3>', 'XtRoy8QSvPlhwA7HfuRfAkM6V0qSKibpHKj6L07I.jpeg', '2019-09-26 15:38:53', '2019-09-26 08:38:53'),
(3, 'Chăm da rất cầu kỳ nhưng Phạm Hương lại mắc một số lỗi sai cơ bản mà ít người để ý', 'Việc miết da quá mạnh hoặc dùng ngón giữa để bôi kem mắt là những lỗi skincare nhỏ nhặt mà ít người để ý nhưng lại có ảnh hưởng lớn đến làn da.', '<p>Thời gian gần đ&acirc;y, Phạm Hương rất hay chăm chỉ chia sẻ với fan về những c&aacute;ch dưỡng da, l&agrave;m đẹp của c&ocirc;. Trong clip mới đ&acirc;y nhất, n&agrave;ng Hậu n&oacute;i về quy tr&igrave;nh chăm s&oacute;c da mỗi tối của c&ocirc;, từ việc d&ugrave;ng toner, lotion, kem dưỡng, kem&nbsp; mắt đầy đủ. Tuy nhi&ecirc;n d&ugrave; chăm da cầu kỳ, nhưng Phạm Hương lại mắc phải một số lỗi sai cơ bản m&agrave; bạn n&ecirc;n lưu &yacute; để tr&aacute;nh mắc phải.</p>\r\n\r\n<p>Cụ thể sau khi d&ugrave;ng toner v&agrave; lotion để l&agrave;m sạch s&acirc;u v&agrave; dưỡng ẩm nhẹ nh&agrave;ng, ngừa l&atilde;o h&oacute;a; sau đ&oacute; Phạm Hương sẽ b&ocirc;i kem dưỡng v&agrave; d&ugrave;ng kem mắt. Tuy nhi&ecirc;n Phạm Hương đ&atilde; d&ugrave;ng đến 2 lần kem dưỡng với 2 sản phẩm ri&ecirc;ng biệt; v&agrave; động t&aacute;c khi b&ocirc;i dễ khiến da bị chảy xệ, l&atilde;o h&oacute;a.</p>\r\n\r\n<h3>Sai lầm 1: B&ocirc;i kem dưỡng theo chiều hướng xuống</h3>\r\n\r\n<p>Theo d&otilde;i những clip dưỡng da của Phạm Hương, bạn sẽ thấy, c&ocirc; thường b&ocirc;i kem dưỡng kh&aacute; mạnh, miết theo chiều từ tr&ecirc;n xuống. Điều n&agrave;y sẽ dễ khiến l&agrave;n da bị chảy xệ, h&igrave;nh th&agrave;nh nếp nhăn. Trong khi đ&oacute;, c&aacute;ch b&ocirc;i chuẩn chỉnh l&agrave; bạn n&ecirc;n b&ocirc;i thật nhẹ nh&agrave;ng, theo chiều hướng từ dưới l&ecirc;n tr&ecirc;n để gi&uacute;p da thẩm thấu s&acirc;u đồng thời gi&uacute;p da săn chắc hơn.</p>\r\n\r\n<h3>Sai lầm 2: B&ocirc;i kem dưỡng mắt qu&aacute; mạnh bằng ng&oacute;n giữa</h3>\r\n\r\n<p>Khi b&ocirc;i kem mắt, Phạm Hương đ&atilde; d&ugrave;ng ng&oacute;n giữa b&ocirc;i kem l&ecirc;n v&ugrave;ng da dưới mắt sau đ&oacute; miết sang 2 b&ecirc;n. Tuy nhi&ecirc;n v&ugrave;ng da mắt vốn mỏng manh, việc di đi di lại như vậy c&oacute; cũng c&oacute; thể khiến da nhanh l&atilde;o h&oacute;a v&agrave; h&igrave;nh th&agrave;nh nếp nhăn.</p>\r\n\r\n<p>Với v&ugrave;ng da n&agrave;y, c&aacute;ch b&ocirc;i chuẩn chỉnh nhất đ&oacute; l&agrave; bạn n&ecirc;n d&ugrave;ng ng&oacute;n tay &aacute;p &uacute;t để chấm kem l&ecirc;n v&ugrave;ng da dưới mắt rồi chấm nhẹ nh&agrave;ng để kem thấm v&agrave;o da. Ng&oacute;n tay &aacute;p &uacute;t c&oacute; lực rất nhỏ vừa gi&uacute;p kem thẩm thấu m&agrave; kh&ocirc;ng tạo &aacute;p lực l&ecirc;n v&ugrave;ng da dưới mắt.</p>\r\n\r\n<h3>Lầm tưởng 3: B&ocirc;i 2 lần kem dưỡng đều c&oacute; chất kem đặc</h3>\r\n\r\n<p>Ngo&agrave;i ra, khi chăm s&oacute;c da, Phạm Hương cũng b&ocirc;i 2 lần kem dưỡng với cả 2 sản phẩm đều c&oacute; chất kem đặc. Điều n&agrave;y tuy kh&ocirc;ng sai những kh&ocirc;ng phải ai cũng n&ecirc;n học tập theo. Kem dưỡng vốn c&oacute; chứa nhiều dưỡng chất v&agrave; kh&aacute; l&acirc;u thấm, việc b&ocirc;i 2 lớp kem dưỡng c&oacute; thể khiến da bị b&iacute; bức, kh&oacute; chịu v&agrave; dễ nổi mụn do &quot;thừa&quot; dưỡng chất.&nbsp;<strong><em>Nếu bạn c&oacute; l&agrave;n da kh&ocirc;, dễ bị bong tr&oacute;c th&igrave; bạn c&oacute; thể học theo Phạm Hương; nhưng nếu bạn c&oacute; l&agrave;n da dầu, dễ bị nổi mụn th&igrave; kh&ocirc;ng n&ecirc;n b&ocirc;i 2 lần kem dưỡng đều c&oacute; chất kem dạng đặc như vậy.</em></strong></p>\r\n\r\n<p><strong><em><img alt=\"\" src=\"/storage/app/file/images/69750063_1293473550837383_4415617119232720896_n%20-%20Copy%20(2).jpg\" style=\"height:400px; width:338px\" /></em></strong></p>', 'iptAKtspzDyQoebbUswHfV7Zi2OTbNUJTi0BZNCn.jpeg', '2019-09-26 15:37:16', '2019-09-26 08:37:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

CREATE TABLE `pay` (
  `id_pay` int(11) NOT NULL,
  `pay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay`
--

INSERT INTO `pay` (`id_pay`, `pay`) VALUES
(1, 'Thanh Toán Khi Nhận Hàng'),
(2, 'Thanh Toán PayPal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `point`
--

CREATE TABLE `point` (
  `id_point` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `point`
--

INSERT INTO `point` (`id_point`, `point`) VALUES
(1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nameproduct` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_descrip` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay` int(11) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `nameproduct`, `picture`, `picture_descrip`, `description`, `detail_text`, `qty`, `price`, `sale`, `status`, `pay`, `id_cat`, `type`, `created_at`, `updated_at`) VALUES
(71, 'Bye Bye Lines Foundation', 'ZCMr39hasTCsG7v5pcfKSmdrNZHO06S5dTJgUWuG.jpeg', '[\"01568818607.jpg\",\"11568818607.png\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', 'ádsadasưsssssssssssssssssssssssssssssssssssssssssssss', 4, 320000, 10, 1, 1, 1, 1, '2019-10-16 12:49:14', '2019-10-14 06:07:01'),
(72, 'CC+ Cream Illumination with SPF 50+', 'kTuM3rUKkcsJIz7FSlUJQPH7LDWrRcqJGOasLBbL.jpeg', '[\"01568819549.jpg\",\"11568819549.jpg\",\"21568819549.png\"]', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 7, 420000, 15, 0, 0, 1, 1, '2019-10-16 12:49:14', '2019-10-11 06:59:38'),
(73, 'CC+ Cream with SPF 50+', 'VFlxd5bnO6Q9s0mg6eAUFF9OBV4memhSNx9MMQ1V.jpeg', '[\"01568954168.jpg\",\"11568954168.jpg\",\"21568954168.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 10, 299999, 0, 0, 0, 1, 1, '2019-10-16 12:49:14', '2019-10-02 22:20:12'),
(75, 'Miracle Water Micellar Cleanser', '5oL26Ve9QZjasnwTd19tpWd42RVEr6uPIBrhWHTL.jpeg', '[\"01568954413.jpg\",\"11568954413.jpg\",\"21568954413.jpg\"]', '<p>Developed with plastic surgeons, Miracle Water 3-in-1 Tonic instantly transforms your skin and maximizes the benefits of your skincare routine! This lightweight no-rinse product combines your Skin-Brightening Radiance Booster to help purify, balance and brighten the look of your skin, your potent Anti-Aging Treatment Essence to diffuse the look of lines and wrinkles, and your Skin-Softening Micellar Cleanser to gently attract, trap and remove dirt, oil, impurities and makeup&mdash;all in one simple step.</p>', '<p>Developed with plastic surgeons, Miracle Water 3-in-1 Tonic instantly transforms your skin and maximizes the benefits of your skincare routine! This lightweight no-rinse product combines your Skin-Brightening Radiance Booster to help purify, balance and brighten the look of your skin, your potent Anti-Aging Treatment Essence to diffuse the look of lines and wrinkles, and your Skin-Softening Micellar Cleanser to gently attract, trap and remove dirt, oil, impurities and makeup&mdash;all in one simple step.</p>\r\n\r\n<p>Created with Secret Sauce&trade; Fermented Complex, a clinically advanced combination of 7 penetration-enhancing fermented ingredients, Miracle Water helps to increase absorbency and improve the efficacy of your moisturizers and serums. Plus, it&rsquo;s infused with anti-aging peptides, hydrolyzed collagen, rose, aloe, rice, chamomile, green tea water, licorice root, vitamin C, illuminating Drops of Light Technology&trade; Concentrate and diamond powder! Use it after cleansing or in place of your cleanser for powerful results immediately and over time.</p>', 5, 500000, 0, 0, 0, 1, 1, '2019-10-16 12:49:14', '2019-10-13 03:05:30'),
(76, 'Confidence in a Neck Cream Moisturizer', 'TDM50aOJ0dOpVW6lZ3i0icoP03he2lATzWkaz69n.jpeg', '[\"01568972087.jpg\",\"11568972087.jpg\",\"21568972087.jpg\"]', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 15, 320000, 5, 0, 0, 3, 1, '2019-10-16 12:49:14', '2019-10-08 05:46:08'),
(77, 'Miracle Water Micellar Cleanser', 'L8RI5K4RTlhz2xRrYBdhojEa6s4hOw8H3lACCavI.jpeg', '[\"01569587144.jpg\",\"11569587144.jpg\",\"21569587144.jpg\",\"31569587144.jpg\"]', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 2, 450000, 0, 0, 0, 3, 1, '2019-10-16 12:49:14', '2019-10-11 06:59:38'),
(78, 'Bye Bye Under Eye Eyelift in a Tube', 'Ue88Er8c1vjv52h3MwrAtWRplZPaVgA9NtWEy5ks.jpeg', '[\"01570182784.jpg\",\"11570182784.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 5, 99999, 0, 0, 0, 1, 1, '2019-10-16 12:49:14', '2019-10-06 09:09:45'),
(79, 'Your Skin But Better Oil Free Makeup Primer', 'bEghm5h4wKW6E60rxkjqc8gxmAgrA1bzOlMCYKcB.jpeg', '[\"01570182985.jpg\",\"11570182985.jpg\",\"21570182985.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 5, 666, 0, 0, 1, 1, 1, '2019-10-16 12:49:14', '2019-10-14 06:07:01'),
(80, 'Bye Bye Redness Sensitive Skin Moisturizer', 'zY6pAcMAaJ5gfT1jky0R7ZJ8cgfbgB8fAMpd8Vbw.jpeg', '[\"01570183226.jpg\",\"11570183226.jpg\",\"21570183226.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 4, 66666664, 0, 0, 1, 3, 1, '2019-10-16 12:49:14', '2019-10-14 06:09:29'),
(81, 'Je Ne Sais Quoi Hydrating Lip Balm Treatment', 'pDnqktSv8jgb38ho3KRhH5nZERtdEYCEgjON49Ii.jpeg', '[\"01570183369.jpg\"]', 'Son Romand Zero Velvet Tint có chất son mỏng nhẹ, velvet tint cực kỳ đáng yêu. Dù là son lỳ nhưng lại đem lại sự mềm mại, êm ái như nhung. Công nghệ tiên tiến giúp các hạt phấn tạo nên màu son sẽ nhỏ hơn 4 lần so với bình thường. Giúp son tiệp hẳn vào môi, bám chắc khó trôi, lên màu chuẩn mịn.', '<p><strong>Son Romand Zero Velvet Tint</strong>&nbsp;c&oacute; chất son mỏng nhẹ, velvet tint cực kỳ đ&aacute;ng y&ecirc;u. D&ugrave; l&agrave; son lỳ nhưng lại đem lại sự mềm mại, &ecirc;m &aacute;i như nhung. C&ocirc;ng nghệ ti&ecirc;n tiến gi&uacute;p c&aacute;c hạt phấn tạo n&ecirc;n m&agrave;u son sẽ nhỏ hơn 4 lần so với b&igrave;nh thường. Gi&uacute;p son tiệp hẳn v&agrave;o m&ocirc;i, b&aacute;m chắc kh&oacute; tr&ocirc;i, l&ecirc;n m&agrave;u chuẩn mịn.</p>\r\n\r\n<p><strong>C&ocirc;ng dụng:</strong></p>\r\n\r\n<p>Xuất xứ: H&agrave;n Quốc<br />\r\nTrọng lượng: 4gr</p>\r\n\r\n<p>-&nbsp;Son Romand Zero Velvet Tint&nbsp;c&oacute; chất son mỏng nhẹ, velvet tint cực kỳ đ&aacute;ng y&ecirc;u. D&ugrave; l&agrave; son lỳ nhưng lại đem lại sự mềm mại, &ecirc;m &aacute;i như nhung. C&ocirc;ng nghệ ti&ecirc;n tiến gi&uacute;p c&aacute;c hạt phấn tạo n&ecirc;n m&agrave;u son sẽ nhỏ hơn 4 lần so với b&igrave;nh thường. Gi&uacute;p son tiệp hẳn v&agrave;o m&ocirc;i, b&aacute;m chắc kh&oacute; tr&ocirc;i, l&ecirc;n m&agrave;u chuẩn mịn.</p>\r\n\r\n<p>- Son Romand Zero Velvet Tint c&oacute; th&acirc;n h&igrave;nh trụ tr&ograve;n. Lớp vỏ nh&aacute;m l&igrave;, nắp m&agrave;u trắng với d&ograve;ng chữ Romand cực đơn giản nhưng cũng rất &ldquo;chic&rdquo;. Th&acirc;n son trong suốt để bạn c&oacute; thể dễ d&agrave;ng thấy được m&agrave;u son b&ecirc;n trong.</p>\r\n\r\n<p>- K&iacute;ch thước cầm vừa tay, v&agrave; đặc biệt l&agrave; trọng lượng son rất rất nhẹ. V&igrave; vậy bạn dễ d&agrave;ng đem theo son đến mọi nơi bạn muốn.</p>\r\n\r\n<p>- Chất Son Romand Zero Velvet Tint mềm mịn như b&ocirc;ng. Son l&igrave;, kh&ocirc;ng hề b&oacute;ng hay bị lem khi l&ecirc;n m&ocirc;i. Độ b&aacute;m của son rất tốt, suốt nhiều giờ đồng hồ liền. Son l&ecirc;n m&agrave;u cực chuẩn, đẹp đậm m&ocirc;i chỉ với một lần t&ocirc;.</p>', 10, 11111111, 0, 0, 1, 3, 2, '2019-10-17 09:40:04', '2019-10-14 06:07:01'),
(82, 'Vitality Lip Flush Hydrating Lip Gloss Soft Stain', 'B4oPyEZiapmai88vxzeCDIMUEoSeIaIi6hM7KUUX.jpeg', '[\"01570183545.jpg\",\"11570183545.jpg\",\"21570183545.jpg\"]', 'Son Romand Zero Velvet Tint có chất son mỏng nhẹ, velvet tint cực kỳ đáng yêu. Dù là son lỳ nhưng lại đem lại sự mềm mại, êm ái như nhung. Công nghệ tiên tiến giúp các hạt phấn tạo nên màu son sẽ nhỏ hơn 4 lần so với bình thường. Giúp son tiệp hẳn vào môi, bám chắc khó trôi, lên màu chuẩn mịn.', '<p>-&nbsp;Son Romand Zero Velvet Tint&nbsp;c&oacute; chất son mỏng nhẹ, velvet tint cực kỳ đ&aacute;ng y&ecirc;u. D&ugrave; l&agrave; son lỳ nhưng lại đem lại sự mềm mại, &ecirc;m &aacute;i như nhung. C&ocirc;ng nghệ ti&ecirc;n tiến gi&uacute;p c&aacute;c hạt phấn tạo n&ecirc;n m&agrave;u son sẽ nhỏ hơn 4 lần so với b&igrave;nh thường. Gi&uacute;p son tiệp hẳn v&agrave;o m&ocirc;i, b&aacute;m chắc kh&oacute; tr&ocirc;i, l&ecirc;n m&agrave;u chuẩn mịn.</p>\r\n\r\n<p>- Son Romand Zero Velvet Tint c&oacute; th&acirc;n h&igrave;nh trụ tr&ograve;n. Lớp vỏ nh&aacute;m l&igrave;, nắp m&agrave;u trắng với d&ograve;ng chữ Romand cực đơn giản nhưng cũng rất &ldquo;chic&rdquo;. Th&acirc;n son trong suốt để bạn c&oacute; thể dễ d&agrave;ng thấy được m&agrave;u son b&ecirc;n trong.</p>\r\n\r\n<p>- K&iacute;ch thước cầm vừa tay, v&agrave; đặc biệt l&agrave; trọng lượng son rất rất nhẹ. V&igrave; vậy bạn dễ d&agrave;ng đem theo son đến mọi nơi bạn muốn.</p>\r\n\r\n<p>- Chất Son Romand Zero Velvet Tint mềm mịn như b&ocirc;ng. Son l&igrave;, kh&ocirc;ng hề b&oacute;ng hay bị lem khi l&ecirc;n m&ocirc;i. Độ b&aacute;m của son rất tốt, suốt nhiều giờ đồng hồ liền. Son l&ecirc;n m&agrave;u cực chuẩn, đẹp đậm m&ocirc;i chỉ với một lần t&ocirc;.</p>', 3, 666, 0, 0, 1, 3, 1, '2019-10-16 12:49:14', '2019-10-14 06:07:01'),
(83, 'Bye Bye Lines Foundation', 'dagDAhtLMlrimxZkJaEjZvu9GM8Uv9rPpGrVCI1B.jpeg', '[\"01570183806.jpg\",\"11570183806.jpg\",\"21570183806.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 2, 55553, 0, 0, 12, 4, 1, '2019-10-25 06:03:28', '2019-10-24 23:03:28'),
(84, 'CC+ Cream Illumination with SPF 50+', '6ij7jTpymDXLS7sSKWH8T4Ki95AZ6SXZyKbdmbUR.jpeg', NULL, 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 656, 66666, 0, 0, 8, 4, 1, '2019-10-23 01:56:30', '2019-10-22 18:56:30'),
(85, 'Celebration Foundation Duo', 'ool7C7xIwYLdvopNZ6hQOoCvDne6da4QMOpdwsse.jpeg', '[\"01570184071.jpg\",\"11570184071.jpg\",\"21570184071.jpg\"]', 'Bạn đang sở hữu một làn da không đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,… bạn có một nhu cầu trang điểm cao trong giao tiếp, trong công việc nhưng lại lo lắng da bị tổn thương vì việc trang điểm quá nhiều. Hãy sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để có một lớp trang điểm đẹp, tự nhiên mà không gây hại đến làn da của bạn.', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng&nbsp;<strong>kem nền Maybelline Dream Velvet Soft Matte</strong>&nbsp;của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>\r\n\r\n<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 54, 56556562, 0, 0, 2, 4, 1, '2019-10-22 09:07:47', '2019-10-22 02:07:47'),
(86, 'Miracle Water Micellar Cleanser', '0OB8DoUzh6bC7iBSP7XWedPcvI41RyRajTkzqykf.jpeg', '[\"01570184375.jpg\",\"11570184375.jpg\",\"21570184375.jfif\"]', 'Developed with plastic surgeons, Miracle Water 3-in-1 Tonic instantly transforms your skin and maximizes the benefits of your skincare routine! This lightweight no-rinse product combines your Skin-Brightening Radiance Booster to help purify, balance and brighten the look of your skin, your potent Anti-Aging Treatment Essence to diffuse the look of lines and wrinkles, and your Skin-Softening Micellar Cleanser to gently attract, trap and remove dirt, oil, impurities and makeup—all in one simple step.', '<p>Created with Secret Sauce&trade; Fermented Complex, a clinically advanced combination of 7 penetration-enhancing fermented ingredients, Miracle Water helps to increase absorbency and improve the efficacy of your moisturizers and serums. Plus, it&rsquo;s infused with anti-aging peptides, hydrolyzed collagen, rose, aloe, rice, chamomile, green tea water, licorice root, vitamin C, illuminating Drops of Light Technology&trade; Concentrate and diamond powder! Use it after cleansing or in place of your cleanser for powerful results immediately and over time.</p>', 6, 767631, 0, 0, 6, 11, 1, '2019-10-25 06:03:28', '2019-10-24 23:03:28'),
(87, 'Bye Bye Under Eye Eyelift in a Tube', 'IapWVryQL6UcWCtbVjQYfsThzGapapWwhMd03a6o.jpeg', '[\"01570184510.jpg\",\"11570184510.jpg\",\"21570184510.jpg\"]', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>', '<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 79, 99999, 0, 0, 22, 10, 2, '2019-10-22 08:41:58', '2019-10-22 01:41:58');
INSERT INTO `products` (`id_product`, `nameproduct`, `picture`, `picture_descrip`, `description`, `detail_text`, `qty`, `price`, `sale`, `status`, `pay`, `id_cat`, `type`, `created_at`, `updated_at`) VALUES
(88, 'Your Skin But Better Oil Free Makeup Primer', 'A5QZZOGX2nriFGrM7juKtwv9j74ID64WnV6QLyVZ.jpeg', '[\"01570184754.jpg\",\"11570184754.jpg\",\"21570184754.jpg\"]', '<p>Bạn đang sở hữu một l&agrave;n da kh&ocirc;ng đẹp, dễ bắt nắng, nhợt nhạt, thiếu sức sống,&hellip; bạn c&oacute; một nhu cầu trang điểm cao trong giao tiếp, trong c&ocirc;ng việc nhưng lại lo lắng da bị tổn thương v&igrave; việc trang điểm qu&aacute; nhiều. H&atilde;y sử dụng kem nền Maybelline Dream Velvet Soft Matte của Maybelline đến từ Mỹ để c&oacute; một lớp trang điểm đẹp, tự nhi&ecirc;n m&agrave; kh&ocirc;ng g&acirc;y hại đến l&agrave;n da của bạn.</p>', '<p>Mặc d&ugrave; chứa nhiều th&agrave;nh phần dưỡng ẩm nhưng k<em>em nền Maybelline</em>&nbsp;kh&ocirc;ng hề để lại cảm gi&aacute;c b&oacute;ng dầu, nhờn r&iacute;t khi apply, thay v&agrave;o đ&oacute; l&agrave; lớp nền l&igrave;, kh&ocirc; tho&aacute;ng v&agrave; rất tự nhi&ecirc;n như chưa hề trang điểm. Chắc hẳn mọi người sẽ xu&yacute;t xoa bởi l&agrave;n da đẹp kh&ocirc;ng t&igrave; vết của bạn, hay để&nbsp;kem n&ecirc;̀n&nbsp;Maybelline Dream Velvet Soft Matte trở th&agrave;nh b&iacute; mật ngọt ng&agrave;o của l&agrave;n da bạn nh&eacute;!</p>\r\n\r\n<p>Maybelline Dream Velvet Soft Matte c&oacute; chỉ số chống nắng SPF30, th&iacute;ch hợp sử dụng bảo vệ l&agrave;n da h&agrave;ng ng&agrave;y. Sản phẩm ph&ugrave; hợp với da hỗn hợp v&agrave; da dầu.</p>\r\n\r\n<p>Với kết cấu dạng lỏng, Maybelline Dream Velvet Soft Matte dễ d&agrave;ng t&aacute;n đều bằng tay, hoặc chổi m&agrave; kh&ocirc;ng bao giờ để lại vệt kh&ocirc;ng&nbsp;đều m&agrave;u, kh&ocirc;ng g&acirc;y cảm gi&aacute;c nặng mặt, kh&oacute; chịu. Ch&iacute;nh dạng lỏng n&agrave;y đ&atilde; gi&uacute;p Maybelline Dream Velvet Soft Matte sở hữu khả năng cung cấp chất ẩm dồi d&agrave;o cho l&agrave;n da, da bạn sẽ lu&ocirc;n trong t&igrave;nh trạng mọng nước, căng mịn v&agrave; rạng rỡ</p>\r\n\r\n<p>Sản phẩm c&oacute; tổng cộng 12 gam m&agrave;u trải d&agrave;i từ t&ocirc;ng rất s&aacute;ng đến rất tối, bạn c&oacute; thể thoải m&aacute;i lựa chọn sản phẩm ph&ugrave; hợp với l&agrave;n da của m&igrave;nh nh&eacute;! Hiện tại hệ thống&nbsp;mỹ phẩm ch&iacute;nh h&atilde;ng&nbsp;Beauty Garden c&oacute; 7 tone m&agrave;u hot nhất được rất nhiều chị em l&ugrave;ng mua. Bảng m&agrave;u trải d&agrave;i từ tone 5 - 10 - 15 - 20 - 40 - 50 - 70. Bảng m&agrave;u n&agrave;y ph&ugrave; hợp với rất nhiều tone da kh&aacute;c nhau, bạn c&oacute; thể dễ d&agrave;ng chọn một tone m&agrave;u ph&ugrave; hợp với l&agrave;n da của m&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y được xem l&agrave; một trong những loại kem nền tốt nhất của h&atilde;ng Maybelline, được c&aacute;c beauty blogger b&igrave;nh chọn l&agrave; 1 trong 12 loại kem nền d&ograve;ng trung đ&aacute;ng để mua nhất. Sản phẩm c&oacute; thiết kế dạng tu&yacute;p nhựa c&oacute; nắp đậy tiện dụng thuận tiện cho bảo quản v&agrave; sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch sử dụng kem n&ecirc;̀n Maybelline Dream Velvet Soft Matte: Sau khi đ&atilde;&nbsp;l&agrave;m sạch mặt, bạn lấy một lượng kem vừa đủ thoa đều l&ecirc;n mặt v&agrave; cổ. D&ugrave;ng nhiều hơn cho v&ugrave;ng da c&oacute; khuyết điểm, c&oacute; thể kết hợp bằng m&uacute;t hoặc cọ để lớp nền ho&agrave;n hảo hơn.</p>', 5, 77777, 0, 0, 28, 10, 2, '2019-10-22 08:40:26', '2019-10-21 02:20:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rewards`
--

CREATE TABLE `rewards` (
  `id_reward` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rewards`
--

INSERT INTO `rewards` (`id_reward`, `id_product`, `id_user`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
(8, 88, 5, 6, 466662, '2019-10-17 11:49:31', '2019-10-17 11:49:31'),
(9, 88, 5, 6, 466662, '2019-10-17 11:50:15', '2019-10-17 11:50:15'),
(10, 88, 5, 7, 544439, '2019-10-17 11:51:03', '2019-10-17 11:51:03'),
(11, 88, 5, 5, 388885, '2019-10-17 11:53:08', '2019-10-17 11:53:08'),
(12, 88, 5, 2, 155554, '2019-10-17 15:06:00', '2019-10-17 15:06:00'),
(13, 88, 5, 1, 77777, '2019-10-17 15:06:27', '2019-10-17 15:06:27'),
(14, 88, 5, 2, 155554, '2019-10-17 15:07:28', '2019-10-17 15:07:28'),
(15, 88, 9, 1, 77777, '2019-10-18 01:57:06', '2019-10-18 01:57:06'),
(16, 88, 5, 1, 77777, '2019-10-21 08:50:20', '2019-10-21 08:50:20'),
(17, 88, 5, 1, 77777, '2019-10-21 09:16:02', '2019-10-21 09:16:02'),
(18, 88, 5, 1, 77777, '2019-10-21 09:17:40', '2019-10-21 09:17:40'),
(19, 87, 2, 2, 199998, '2019-10-22 05:03:38', '2019-10-22 05:03:38'),
(20, 87, 2, 2, 199998, '2019-10-22 05:10:58', '2019-10-22 05:10:58'),
(21, 87, 2, 1, 99999, '2019-10-22 07:30:46', '2019-10-22 07:30:46'),
(22, 87, 2, 1, 99999, '2019-10-22 07:36:11', '2019-10-22 07:36:11'),
(23, 87, 2, 1, 99999, '2019-10-22 07:36:27', '2019-10-22 07:36:27'),
(24, 87, 2, 1, 99999, '2019-10-22 07:49:42', '2019-10-22 07:49:42'),
(25, 87, 2, 2, 199998, '2019-10-22 08:41:58', '2019-10-22 08:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `title`, `preview`, `img`) VALUES
(1, 'Slide 1', 'Sắc đẹp phụ nữ', 't9wfu06T5StNquty1dJk9aa3pWvfzGzjQPLxUe4V.jpeg'),
(2, 'Slide 2', 'Trẻ mãi không già', 'YXCh3VMz026ZG76YUoJbT58Rq0KDmJj0HaYvrniI.jpeg'),
(3, 'Slide 3', 'Bí quyết sống lâu', 'acUZHmZns95i5RUrwyRERaqJSdXiKlBWydkl2gFP.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `id_pay` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `amount`, `status`, `id_user`, `id_pay`, `created_at`, `update_at`) VALUES
(78, 200000, 1, 5, 1, '2019-08-15 06:23:59', '2019-10-11 11:55:40'),
(79, 200000, 1, 5, 1, '2019-08-15 06:23:59', '2019-10-11 11:58:12'),
(81, 200000, 1, 5, 1, '2019-09-15 06:23:59', '2019-10-11 12:01:02'),
(85, 200000, 1, 5, 1, '2019-10-15 06:23:59', '2019-10-11 13:51:16'),
(86, 200000, 1, 5, 1, '2019-10-15 06:23:59', '2019-10-14 13:05:12'),
(87, 200000, 1, 5, 1, '2019-11-15 06:23:59', '2019-10-14 13:05:45'),
(88, 200000, 1, 5, 1, '2019-11-15 06:23:59', '2019-10-14 13:06:02'),
(89, 200000, 1, 5, 1, '2019-12-15 06:23:59', '2019-10-14 13:06:15'),
(90, 200000, 1, 5, 1, '2019-12-15 06:23:59', '2019-10-14 13:07:18'),
(91, 200000, 1, 5, 1, '2019-10-15 06:23:59', '2019-10-14 13:07:27'),
(92, 200000, 1, 5, 1, '2019-10-15 06:23:59', '2019-10-14 13:07:35'),
(93, 200000, 1, 5, 1, '2019-10-15 06:23:59', '2019-10-14 13:07:43'),
(94, 457107, 2, 2, 1, '2019-10-15 11:15:57', '2019-10-15 11:15:57'),
(95, 457107, 2, 2, 1, '2019-10-15 11:16:08', '2019-10-15 11:16:08'),
(96, 457107, 2, 2, 1, '2019-10-15 11:25:55', '2019-10-15 11:25:55'),
(97, 457107, 2, 2, 1, '2019-10-15 11:28:24', '2019-10-15 11:28:24'),
(98, 457107, 2, 2, 1, '2019-10-15 11:28:39', '2019-10-15 11:28:39'),
(99, 457107, 2, 2, 1, '2019-10-15 11:28:45', '2019-10-15 11:28:45'),
(100, 457107, 1, 2, 1, '2019-10-22 08:25:07', '2019-10-15 11:29:03'),
(101, 457107, 2, 2, 1, '2019-10-15 11:29:20', '2019-10-15 11:29:20'),
(102, 457107, 2, 2, 1, '2019-10-15 11:29:30', '2019-10-15 11:29:30'),
(103, 457107, 2, 2, 1, '2019-10-15 11:29:39', '2019-10-15 11:29:39'),
(104, 457107, 2, 2, 1, '2019-10-15 11:32:07', '2019-10-15 11:32:07'),
(105, 94110, 2, 2, 1, '2019-10-15 11:48:35', '2019-10-15 11:48:35'),
(106, 94110, 2, 2, 1, '2019-10-15 11:49:47', '2019-10-15 11:49:47'),
(107, 1143942, 2, 2, 1, '2019-10-15 11:50:12', '2019-10-15 11:50:12'),
(108, 268877, 2, 2, 1, '2019-10-15 11:50:48', '2019-10-15 11:50:48'),
(109, 215109, 2, 5, 1, '2019-10-16 05:50:42', '2019-10-16 05:50:42'),
(110, 483995, 2, 5, 1, '2019-10-16 06:08:36', '2019-10-16 06:08:36'),
(111, 120999, 2, 5, 1, '2019-10-16 06:09:59', '2019-10-16 06:09:59'),
(112, 120999, 2, 5, 1, '2019-10-16 06:11:00', '2019-10-16 06:11:00'),
(113, 120999, 2, 5, 1, '2019-10-16 06:11:42', '2019-10-16 06:11:42'),
(114, 376441, 2, 5, 1, '2019-10-16 06:12:05', '2019-10-16 06:12:05'),
(115, 94110, 2, 5, 1, '2019-10-16 07:13:38', '2019-10-16 07:13:38'),
(116, 806630, 2, 5, 1, '2019-10-16 07:14:13', '2019-10-16 07:14:13'),
(117, 376441, 2, 9, 1, '2019-10-16 07:54:14', '2019-10-16 07:54:14'),
(118, 94110, 1, 5, 1, '2019-10-21 08:28:46', '2019-10-16 08:20:47'),
(119, 120999, 2, 5, 1, '2019-10-16 12:28:51', '2019-10-16 12:28:51'),
(120, 134438, 2, 5, 1, '2019-10-17 08:47:29', '2019-10-17 08:47:29'),
(121, 134438, 2, 5, 1, '2019-10-17 11:31:22', '2019-10-17 11:31:22'),
(122, 67219, 2, 5, 2, '2019-10-21 09:09:04', '2019-10-21 09:09:04'),
(123, 69510159, 2, 2, 1, '2019-10-22 05:18:55', '2019-10-22 05:18:55'),
(124, 161332, 2, 2, 1, '2019-10-22 05:20:03', '2019-10-22 05:20:03'),
(125, 241998, 1, 2, 1, '2019-10-22 08:25:04', '2019-10-22 07:52:15'),
(126, 241998, 1, 2, 1, '2019-10-22 08:25:04', '2019-10-22 07:53:05'),
(127, 80666, 1, 2, 1, '2019-10-22 08:25:03', '2019-10-22 07:53:53'),
(128, 68433440, 1, 2, 1, '2019-10-22 08:25:02', '2019-10-22 07:54:19'),
(129, 80666, 1, 2, 2, '2019-10-22 08:25:01', '2019-10-22 07:58:45'),
(134, 80666, 1, 2, 2, '2019-10-22 08:24:17', '2019-10-22 08:12:42'),
(135, 80666, 1, 2, 1, '2019-10-23 01:56:30', '2019-10-22 09:02:17'),
(136, 1063272, 2, 2, 1, '2019-10-25 06:02:27', '2019-10-25 06:02:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_transactiondetail` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_transactiondetail`, `qty`, `total`, `id_transaction`, `id_product`, `created_at`, `updated_at`) VALUES
(47, 1, 77777, 78, 88, '2019-10-11 11:55:41', '2019-10-11 11:55:41'),
(48, 1, 77777, 79, 88, '2019-10-11 11:58:13', '2019-10-11 11:58:13'),
(50, 1, 77777, 81, 88, '2019-10-11 12:01:02', '2019-10-11 12:01:02'),
(53, 4, 399996, 85, 87, '2019-10-11 13:51:16', '2019-10-11 13:51:16'),
(54, 1, 77777, 85, 88, '2019-10-11 13:51:16', '2019-10-11 13:51:16'),
(55, 1, 99999, 86, 87, '2019-10-14 13:05:12', '2019-10-14 13:05:12'),
(56, 1, 77777, 86, 88, '2019-10-14 13:05:12', '2019-10-14 13:05:12'),
(57, 1, 55553, 86, 83, '2019-10-14 13:05:13', '2019-10-14 13:05:13'),
(58, 1, 767631, 86, 86, '2019-10-14 13:05:13', '2019-10-14 13:05:13'),
(59, 1, 66666664, 87, 80, '2019-10-14 13:05:45', '2019-10-14 13:05:45'),
(60, 1, 11111111, 87, 81, '2019-10-14 13:05:45', '2019-10-14 13:05:45'),
(61, 1, 666, 87, 82, '2019-10-14 13:05:45', '2019-10-14 13:05:45'),
(62, 1, 320000, 87, 71, '2019-10-14 13:05:45', '2019-10-14 13:05:45'),
(63, 1, 666, 87, 79, '2019-10-14 13:05:45', '2019-10-14 13:05:45'),
(64, 1, 55553, 88, 83, '2019-10-14 13:06:02', '2019-10-14 13:06:02'),
(65, 1, 77777, 88, 88, '2019-10-14 13:06:02', '2019-10-14 13:06:02'),
(66, 1, 99999, 89, 87, '2019-10-14 13:06:16', '2019-10-14 13:06:16'),
(67, 1, 55553, 89, 83, '2019-10-14 13:06:16', '2019-10-14 13:06:16'),
(68, 1, 77777, 89, 88, '2019-10-14 13:06:16', '2019-10-14 13:06:16'),
(69, 1, 99999, 90, 87, '2019-10-14 13:07:18', '2019-10-14 13:07:18'),
(70, 1, 77777, 90, 88, '2019-10-14 13:07:18', '2019-10-14 13:07:18'),
(71, 1, 55553, 90, 83, '2019-10-14 13:07:18', '2019-10-14 13:07:18'),
(72, 1, 767631, 90, 86, '2019-10-14 13:07:18', '2019-10-14 13:07:18'),
(73, 1, 77777, 91, 88, '2019-10-14 13:07:27', '2019-10-14 13:07:27'),
(74, 1, 55553, 92, 83, '2019-10-14 13:07:35', '2019-10-14 13:07:35'),
(75, 1, 767631, 93, 86, '2019-10-14 13:07:43', '2019-10-14 13:07:43'),
(76, 3, 299997, 94, 87, '2019-10-15 11:15:57', '2019-10-15 11:15:57'),
(77, 1, 77777, 94, 88, '2019-10-15 11:15:57', '2019-10-15 11:15:57'),
(78, 3, 299997, 95, 87, '2019-10-15 11:16:08', '2019-10-15 11:16:08'),
(79, 1, 77777, 95, 88, '2019-10-15 11:16:08', '2019-10-15 11:16:08'),
(80, 3, 299997, 96, 87, '2019-10-15 11:25:55', '2019-10-15 11:25:55'),
(81, 1, 77777, 96, 88, '2019-10-15 11:25:55', '2019-10-15 11:25:55'),
(82, 3, 299997, 97, 87, '2019-10-15 11:28:25', '2019-10-15 11:28:25'),
(83, 1, 77777, 97, 88, '2019-10-15 11:28:25', '2019-10-15 11:28:25'),
(84, 3, 299997, 98, 87, '2019-10-15 11:28:39', '2019-10-15 11:28:39'),
(85, 1, 77777, 98, 88, '2019-10-15 11:28:39', '2019-10-15 11:28:39'),
(86, 3, 299997, 99, 87, '2019-10-15 11:28:45', '2019-10-15 11:28:45'),
(87, 1, 77777, 99, 88, '2019-10-15 11:28:45', '2019-10-15 11:28:45'),
(88, 3, 299997, 100, 87, '2019-10-15 11:29:03', '2019-10-15 11:29:03'),
(89, 1, 77777, 100, 88, '2019-10-15 11:29:03', '2019-10-15 11:29:03'),
(90, 3, 299997, 101, 87, '2019-10-15 11:29:20', '2019-10-15 11:29:20'),
(91, 1, 77777, 101, 88, '2019-10-15 11:29:20', '2019-10-15 11:29:20'),
(92, 3, 299997, 102, 87, '2019-10-15 11:29:30', '2019-10-15 11:29:30'),
(93, 1, 77777, 102, 88, '2019-10-15 11:29:30', '2019-10-15 11:29:30'),
(94, 3, 299997, 103, 87, '2019-10-15 11:29:39', '2019-10-15 11:29:39'),
(95, 1, 77777, 103, 88, '2019-10-15 11:29:39', '2019-10-15 11:29:39'),
(96, 3, 299997, 104, 87, '2019-10-15 11:32:07', '2019-10-15 11:32:07'),
(97, 1, 77777, 104, 88, '2019-10-15 11:32:07', '2019-10-15 11:32:07'),
(98, 1, 77777, 105, 88, '2019-10-15 11:48:35', '2019-10-15 11:48:35'),
(99, 1, 77777, 106, 88, '2019-10-15 11:49:48', '2019-10-15 11:49:48'),
(100, 1, 767631, 107, 86, '2019-10-15 11:50:12', '2019-10-15 11:50:12'),
(101, 1, 99999, 107, 87, '2019-10-15 11:50:12', '2019-10-15 11:50:12'),
(102, 1, 77777, 107, 88, '2019-10-15 11:50:12', '2019-10-15 11:50:12'),
(103, 4, 222212, 108, 83, '2019-10-15 11:50:48', '2019-10-15 11:50:48'),
(104, 1, 99999, 109, 87, '2019-10-16 05:50:42', '2019-10-16 05:50:42'),
(105, 1, 77777, 109, 88, '2019-10-16 05:50:42', '2019-10-16 05:50:42'),
(106, 4, 399996, 110, 87, '2019-10-16 06:08:36', '2019-10-16 06:08:36'),
(107, 1, 99999, 111, 87, '2019-10-16 06:09:59', '2019-10-16 06:09:59'),
(108, 1, 99999, 112, 87, '2019-10-16 06:11:01', '2019-10-16 06:11:01'),
(109, 1, 99999, 113, 87, '2019-10-16 06:11:42', '2019-10-16 06:11:42'),
(110, 4, 311108, 114, 88, '2019-10-16 06:12:05', '2019-10-16 06:12:05'),
(111, 1, 77777, 115, 88, '2019-10-16 07:13:38', '2019-10-16 07:13:38'),
(112, 12, 666636, 116, 83, '2019-10-16 07:14:13', '2019-10-16 07:14:13'),
(113, 4, 311108, 117, 88, '2019-10-16 07:54:14', '2019-10-16 07:54:14'),
(114, 1, 77777, 118, 88, '2019-10-16 08:20:47', '2019-10-16 08:20:47'),
(115, 1, 99999, 119, 87, '2019-10-16 12:28:51', '2019-10-16 12:28:51'),
(116, 2, 111106, 120, 83, '2019-10-17 08:47:29', '2019-10-17 08:47:29'),
(117, 2, 111106, 121, 83, '2019-10-17 11:31:22', '2019-10-17 11:31:22'),
(118, 1, 55553, 122, 83, '2019-10-21 09:09:04', '2019-10-21 09:09:04'),
(119, 1, 767631, 123, 86, '2019-10-22 05:18:55', '2019-10-22 05:18:55'),
(120, 1, 55553, 123, 83, '2019-10-22 05:18:55', '2019-10-22 05:18:55'),
(121, 1, 66666, 123, 84, '2019-10-22 05:18:55', '2019-10-22 05:18:55'),
(122, 1, 56556562, 123, 85, '2019-10-22 05:18:55', '2019-10-22 05:18:55'),
(123, 2, 133332, 124, 84, '2019-10-22 05:20:03', '2019-10-22 05:20:03'),
(124, 3, 199998, 125, 84, '2019-10-22 07:52:15', '2019-10-22 07:52:15'),
(125, 3, 199998, 126, 84, '2019-10-22 07:53:05', '2019-10-22 07:53:05'),
(126, 1, 66666, 127, 84, '2019-10-22 07:53:53', '2019-10-22 07:53:53'),
(127, 1, 56556562, 128, 85, '2019-10-22 07:54:19', '2019-10-22 07:54:19'),
(128, 1, 66666, 129, 84, '2019-10-22 07:58:45', '2019-10-22 07:58:45'),
(129, 1, 66666, 134, 84, '2019-10-22 08:12:42', '2019-10-22 08:12:42'),
(130, 1, 66666, 135, 84, '2019-10-22 09:02:17', '2019-10-22 09:02:17'),
(131, 2, 111106, 136, 83, '2019-10-25 06:02:28', '2019-10-25 06:02:28'),
(132, 1, 767631, 136, 86, '2019-10-25 06:02:28', '2019-10-25 06:02:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `rewardpoint` int(11) DEFAULT '0',
  `id_customer` int(11) NOT NULL DEFAULT '0',
  `accumulated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `id_level`, `rewardpoint`, `id_customer`, `accumulated`) VALUES
(2, 'admin', '$2y$10$0cc1AhbcXUz1WfsUnpvaquPRHA4dDbC4xhVvXPpjQY7u1cs.jLPvK', 'ADmin', 'binhnguyen280498@gmail.com', '72 Nguyễn Xuân Nhĩ - Hòa Cừơng Nam - Hải Châu - Đà Nẳng', 362411205, 1, 3400010, 2, 14),
(3, 'mod002', '$2y$10$UCFbwu8iB5IN2o8oKwiylOGDEXOIZve6IwZwv5fQgiZTECc8GLIZW', 'Tôi là mod 002', 'mod002@gmail.com', 'Đà Nẳng', 122222222, 2, 0, 0, 0),
(5, 'user002', '$2y$10$0cc1AhbcXUz1WfsUnpvaquPRHA4dDbC4xhVvXPpjQY7u1cs.jLPvK', 'Nguyễn Thanh Bình', 'user001@gmail.com', '72 Nguyễn Xuân Nhi', 362411205, 3, 88899, 2, 11),
(7, 'vinaenter', '$2y$10$M.1hfu0Fnx7wpcyHyH7mKOEee/wq.5wkxAhgm5D/yenpURH3pfYQ2', 'nguyen binh', 'admin@gmail.com', 'Da Nang - VietNam', 362411205, 3, 0, 0, 0),
(8, 'sd', '$2y$10$wT7v38ZXNYZeQUQjvhdIPO7h.6.byWRDyv0BS1LMuao7wx8nMnKzC', 'nguyen binh', 'admin@gmail.com', 'Da Nang - VietNam', 362411205, 3, 0, 0, 0),
(9, 'binh123123', '$2y$10$Dgowga7PVD9EEjDVVUkifePqr2WPoy0ulpnswL1bYocJxIONnotkW', 'nguyen binh', 'binhnguyen280498@gmail.com', '72 Nguyễn Xuân Nhĩ - Hòa Cừơng Nam - Hải Châu - Đà Nẳng', 123123123, 3, 322223, 3, 4),
(10, 'user003', '$2y$10$bTEEU.E4E/AB56C1UqwwO.u.V48xDs75pd6vp.ptqKsvV1ySa6YQC', 'nguyen binh', 'binhnguyen280498@gmail.com', 'Da Nang - VietNam', 123123123, 3, 0, 0, 0),
(11, 'sadasd', '$2y$10$AD.AnbQRttSAAJp0wcaeVOtZ4fGVh1SDctecU.1XDljMMvvYsU6A2', 'sdasd', 'binhnguyen280498@gmail.com', 'dsad', 12312321, 3, 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`id_code`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id_pay`);

--
-- Chỉ mục cho bảng `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_point`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Chỉ mục cho bảng `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id_reward`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_transactiondetail`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `pay`
--
ALTER TABLE `pay`
  MODIFY `id_pay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `point`
--
ALTER TABLE `point`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_transactiondetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
