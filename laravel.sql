-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2024 lúc 07:11 PM
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
-- Cơ sở dữ liệu: `laravel-jobsdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `applications`
--

CREATE TABLE `applications` (
  `USER_ID` int(11) NOT NULL,
  `JOB_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `THOIGIAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS` tinyint(1) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `NOTE` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `applications`
--

INSERT INTO `applications` (`USER_ID`, `JOB_ID`, `NAME`, `THOIGIAN`, `STATUS`, `CV`, `NOTE`, `created_at`, `updated_at`) VALUES
(2, 11, 'Hồ Huynh Hào', '2024-04-18 15:33:05', 0, '1713256080-CV.png', NULL, '2024-04-16 01:28:01', '2024-04-18 03:48:38'),
(3, 6, 'Gia Huy', '2024-04-27 15:42:13', 1, '1713493244-CV.png', '', '2024-04-18 19:20:45', '2024-04-18 19:20:45'),
(3, 9, 'Gia Huy', '2024-04-26 05:33:49', 0, '1713431715-CV.png', 'Lương cao', '2024-04-18 02:15:15', '2024-04-18 08:39:44'),
(3, 10, 'Huy Hào', '2024-04-26 05:33:55', 0, '1713431774-CV.png', '', '2024-04-18 02:16:14', '2024-04-18 08:39:44'),
(3, 11, 'Huy Hòa', '2024-04-18 15:42:10', 0, '1713431842-CV.png', '', '2024-04-18 02:17:22', '2024-04-18 08:39:44'),
(3, 31, 'Quốc Việt', '2024-04-18 15:42:16', 0, '1713431898-CV.jpg', '', '2024-04-18 02:18:18', '2024-04-18 08:39:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cocongviec`
--

CREATE TABLE `cocongviec` (
  `COMPANY_ID` int(11) NOT NULL,
  `JOB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `COMPANY_ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SLOGAN` varchar(255) NOT NULL,
  `INFO` varchar(1024) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `PHONE` varchar(11) NOT NULL,
  `LOGO` varchar(255) DEFAULT 'ctu.png',
  `LINK` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`COMPANY_ID`, `NAME`, `SLOGAN`, `INFO`, `ADDRESS`, `PHONE`, `LOGO`, `LINK`, `created_at`, `updated_at`) VALUES
(1, 'CTU', 'Never give up!', 'Can Tho University', 'Khu II, Đường 3/2 phường Xuân Khánh, quận Ninh Kiều, Cần Thơ', '02871091234', 'ctu.png', 'https://www.ctu.edu.vn/', '2024-03-31 07:53:49', '2024-04-01 20:32:57'),
(2, 'Viettel Telecom', '“Theo cách của bạn” – “Your way”', '- Top 15 doanh nghiệp viễn thông phát triển nhanh nhất thế giới,\r\n\r\n- Xếp thứ 28 trên top 150 nhà mạng có giá trị nhất thế giới, với giá trị thương hiệu đạt 5,8 tỷ USD, đứng số 1 tại Đông Nam Á và thứ 9 tại Châu Á\r\n\r\n- Chứng nhận “Best in Test” từ Công ty đo kiểm viễn thông hàng đầu thế giới Umlaut 2020\r\n\r\n- Giải Bạc sản phẩm viễn thông mới xuất sắc nhất của giải thưởng Kinh doanh quốc tế 2020 cho gói data siêu tốc ST15K\r\n\r\n- Nhà cung cấp dịch vụ của năm tại các thị trường đang phát triển năm 2009 và Nhà cung cấp dịch vụ data di động tốt nhất Việt Nam – 2019 (Frost & Sullivan)\r\n\r\n- Giải bạc hạng mục \"Dịch vụ khách hàng mới của năm“ trong hệ thống giải thưởng quốc tế Stevie Awards 2014 cho Dịch vụ tổng đài tiếng dân tộc.', 'Số 210 Trần Phú, Cái Khế, Ninh Kiều, Cần Thơ 90000', '1800 8098', 'viettel.png', 'https://vietteltelecom.vn/', '2024-03-31 07:53:49', '2024-04-03 00:20:54'),
(3, 'VNPT', 'VNPT - Cuộc sống đích thực', '- Dịch vụ và sản phẩm viễn thông, công nghệ thông tin và truyền thông đa phương tiện;\r\n\r\n- Khảo sát, tư vấn, thiết kế, lắp đặt, khai thác, bảo dưỡng, sửa chữa, cho thuê các công trình viễn thông, công nghệ thông tin;\r\n\r\n- Nghiên cứu, phát triển, chế tạo, sản xuất thiết bị, sản phẩm viễn thông, công nghệ thông tin;\r\n\r\n- Thương mại, phân phối các sản phẩm thiết bị viễn thông, công nghệ thông tin;\r\n\r\n- Dịch vụ quảng cáo, nghiên cứu thị trường, tổ chức hội nghị hội thảo, triển lãm liên quan đến lĩnh vực viễn thông, công nghệ thông tin;\r\n\r\n- Kinh doanh bất động sản, cho thuê văn phòng;\r\n\r\n- Dịch vụ tài chính trong lĩnh vực viễn thông, công nghệ thông tin và truyền thông đa phương tiện.', 'Tòa nhà VNPT, số 57 Huỳnh Thúc Kháng, P. Láng Hạ, Q. Đống Đa, TP. Hà Nội', '1800 1166', 'VNPT.png', 'https://vnpt.com.vn/', '2024-03-31 07:53:49', '2024-03-31 07:54:02'),
(4, 'FPT Telecom', '“cùng đi tới thành công”', 'Lĩnh vực ngành nghề kinh doanh\r\nCung cấp hạ tầng mạng viễn thông cho dịch vụ Internet băng rộng\r\nDịch vụ giá trị gia tăng trên mạng Internet, điện thoại di động\r\nDịch vụ Truyền hình trả tiền\r\nDịch vụ tin nhắn, dữ liệu, thông tin giải trí trên mạng điện thoại di động\r\nThiết lập hạ tầng mạng và cung cấp các dịch vụ viễn thông, Internet\r\nXuất nhập khẩu thiết bị viễn thông và Internet.\r\nDịch vụ viễn thông cố định nội hạt.\r\nDịch vụ viễn thông giá trị gia tăng\r\nDịch vụ viễn thông cố định đường dài trong nước.', 'Tòa nhà FPT, số 10 phố Phạm Văn Bạch, phường Dịch Vọng, quận Cầu Giấy, Hà Nội, Việt Nam', '1900 6600', 'fpt.png', 'https://fpt.vn/vi', '2024-03-31 00:54:07', '2024-03-31 00:54:07'),
(5, 'Công ty chuyển phát nhanh Thuận Phong chi nhánh Hồ Chí Minh (J&T Express)', 'Express your online business', 'J&T Express là thương hiệu chuyển phát nhanh dựa trên sự phát triển của công nghệ và Internet của Công ty TNHH MTV Chuyển phát nhanh Thuận Phong có vốn đầu tư từ Hồng Kông. Chúng tôi sở hữu một mạng lưới rộng khắp nhằm hỗ trợ các hoạt động giao nhận hàng hóa nhanh chóng không chỉ ở nội thành mà còn ở ngoại thành và các vùng xa của các tỉnh thành trong cả nước Việt Nam.\r\n\r\nĐồng thời, trong tương lai J&T Express định hướng mở rộng phạm vi cung cấp các dịch vụ chuyển phát nhanh ra quốc tế. \r\n\r\nJ&T Express cam kết sử dụng hệ thống công nghệ thông tin tiên tiến để nâng cao tính kịp thời và chất lượng phục vụ, cũng như đáp ứng những tiêu chí về sự tiện lợi, nhanh chóng, hiệu quả trong các dịch vụ chuyển phát đến khách hàng. J&T Express hiện tại đã có mặt tại nhiều nước Đông Nam Á: Việt Nam, Thái Lan, Indonesia, Malaysia, Philippines. \r\n\r\nVới khẩu hiệu “Express your online business”, J&T Express tập trung hỗ trợ cho khách hàng kinh doanh trực tuyến dễ dàng và hiệu quả hơn, cung cấp các tiện í', '84-86 D1, Khu Đô Thị mới Him Lam, Phường Tân Hưng, Quận 7', '1900 1088', 'jt.png', 'https://jtexpress.vn/vi/', '2024-04-12 16:06:27', '2024-04-12 16:06:27'),
(6, 'Axon Active', 'We do what we say We say what we do', 'Trying out different IT labor markets, Markus Baur, our CEO, succeeded in 2008 with his first development team in Ho Chi Minh City. \r\nThe available talents, the open-minded culture, and the advantageous framework conditions have convinced Markus to establish a software development company in Vietnam and offer the development services to clients from all over the world.', 'Toyota Ninh Kieu Building 3rd Floor, 57 Cach Mang Thang Tam Str., Ninh Kieu, Dist, Can Tho, Cần Thơ 900000', '02871091234', 'axon.png', 'https://www.axonactive.com/', '2024-03-31 01:47:22', '2024-03-31 01:47:22'),
(7, 'CTU', 'never give up', 'Trường ĐHCT', '3/2', '0123456789', 'ctu.png', 'https://www.ctu.edu.vn/', '2024-04-18 07:29:01', '2024-04-18 07:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `JOB_ID` int(10) UNSIGNED NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `COMPANY` varchar(255) NOT NULL,
  `SALARY` int(12) NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `EXPERIENCE` int(11) NOT NULL,
  `REQUIREMENTS` varchar(1024) NOT NULL,
  `DESCRIPTIONS` varchar(1024) NOT NULL,
  `BENEFIT` varchar(1024) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `LOGO` varchar(255) NOT NULL DEFAULT 'logo.jpg',
  `LINK` varchar(255) NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `EMAIL` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`JOB_ID`, `USER_ID`, `NAME`, `COMPANY`, `SALARY`, `POSITION`, `EXPERIENCE`, `REQUIREMENTS`, `DESCRIPTIONS`, `BENEFIT`, `TIME`, `ADDRESS`, `LOGO`, `LINK`, `STATUS`, `EMAIL`, `created_at`, `updated_at`) VALUES
(6, 2, '.NET Developer', 'CÔNG TY TNHH BDO CONSULTING (VIỆT NAM)', 1000, 'Senior', 5, 'Sinh viên năm cuối, Sinh viên mới tốt nghiệp chuyên ngành kế toán, kiểm toán, tài chính hoặc các lĩnh vực liên quan. Sinh viên đã đi làm, có 1 hoặc 2 năm kinh nghiệm trong lĩnh vực kế toán/kiểm toán/thuế/tiền lương/tài chính là một lợi thế; Các ứng viên muốn theo học bằng cấp / chứng chỉ hành nghề kế toán & thuế của Việt Nam & quốc tế được khuyến khích. Thành thạo tiếng Anh (cả kỹ năng nói và viết); Sử dụng thành thạo MS Office và các công cụ trao đổi làm việc trực tuyến như Microsoft Teams, Zoom hoặc Google Meet; Có khả năng làm việc nhóm, khả năng phân tích, tổ chức công việc, giao tiếp nói và viết tốt; Sẵn sàng làm việc tại Tp. Hồ Chí Minh.', '5+ years of experience required in related field (i.e. Computer Science, Computer Engineering, and Engineering);Demonstrable experience in software development with .NET/. NETCORE, SQL, HTML, CSS;Experience with FE framework like Angular or React JS;Extensive SQL Skills, Oracle DB, DB2, SQL Server, MySQL;Experience with AWS – AWS, Micro-services, Docker, Kubernetes, Containerization;Able to work independently, self-motivated, and a strong team player; Self-starter with ability to work with minimal supervision;Excellent written and verbal communication skills, able to communicate with all levels of the organization;Ability to investigate, troubleshoot, and fix software defects and configuration issues', 'Được làm việc trong môi trường chuyên nghiệp, cởi mở, hoà đồng; hệ thống cơ sở hạ tầng hiện đại; có lộ trình thăng tiến rõ ràng.\r\nMức lương khởi điểm tốt, được trả theo năng lực chuyên môn và kết quả công việc, luôn có các chính sách kịp thời để nâng cao thu nhập, đời sống cho CBNV, tạo động lực phát triển, cơ hội thăng tiến trong công việc.\r\nChế độ, phúc lợi khác: Thưởng đột xuất, định kỳ; nghỉ mát; lễ tết, trang phục, bảo hiểm chăm sóc sức khoẻ, bảo hộ lao động; các hoạt động ngoại khoá (bóng đá, quần vợt, giao lưu...).\r\nChế độ đào tạo: Được đào tạo nội bộ, đào tạo tại các trung tâm và cử đi đào tạo tại nước ngoài tuỳ vào năng lực chuyên môn và yêu cầu công việc.\r\nThời gian làm việc, thời gian nghỉ ngơi, chế độ bảo hiểm theo quy định của Nhà nước và Công ty.', 'FullTime', 'Hồ Chí Minh: An Gia Tower, 11 th Floor, 60 Nguyen Dinh Chieu Street, DaKao Ward, Quận 1', 'DBO.png', 'https://www.topcv.vn/cong-ty/fpt-software/3.html', 1, 'ntd53870@gmail.com', '2024-04-11 09:10:31', '2024-04-11 09:10:31'),
(8, 2, 'Designer Engineer', 'CÔNG TY TNHH WELAST', 350, 'Nhân viên', 0, '- Tinh thần làm việc máu lửa, nhiệt huyết, có trách nhiệm trong công việc.  - Sử dụng thành thạo Adobe Photoshop, Ilustrator  - Tư duy sáng tạo, tính thẫm mỹ cao  - Không ngừng học hỏi, thích nghi với những điều mới  - Có khả năng giao tiếp và làm việc nhóm  - Biết Tiếng Anh, vẽ wacom là một lợi thế', '- Thiết kế bộ hình ảnh sản phẩm, bộ mockup, lifestyle cho các sản phẩm mà công ty đang bán.\r\n\r\n- Thực thi các mẫu thiết kế dựa trên template có sẵn.\r\n\r\n- Thiết kế banner, hình ảnh quảng cáo theo yêu cầu.\r\n\r\n- Làm việc với team Product&Idea để nắm vững yêu cầu thiết của từng sản phẩm.\r\n\r\n- Hỗ trợ team Fulfillment với những đơn hàng cần chỉnh sửa design\r\n\r\n- Báo cáo công việc và thực hiện một số công việc khác có liên quan theo yêu cầu của cấp trên.', '- THU NHẬP:\r\n\r\n- 8.000.000 - 12.000.000 VND tuỳ theo năng lực\r\n\r\n- Phụ cấp gửi xe + ăn trưa\r\n\r\n- Thưởng theo hiệu quả công việc và hiệu quả kinh doanh của công ty.\r\n\r\n- Review lương 6 tháng/lần\r\n\r\n- Thưởng lễ tết theo quy định chung của công ty\r\n\r\n- PHÚC LỢI KHÁC:\r\n\r\n- Được cung cấp đủ trang thiết bị để phục vụ cho công việc\r\n\r\n- Môi trường trẻ trung, năng động, phát triển nhanh\r\n\r\n- Tham gia các hoạt động team building, du lịch cùng công ty\r\n\r\n- Được tạo điều kiện để phát triển bản thân tối đa\r\n\r\n- 15 ngày nghỉ phép/năm', 'FullTime', '- Hà Nội: 18T1 Lê Văn Lương, Thanh Xuân', 'WELAST.png', 'https://www.topcv.vn/viec-lam/nhan-vien-thiet-ke-designer-tai-ha-noi/1291511.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-11 09:35:27', '2024-04-12 05:24:31'),
(9, 2, 'Senior WordPress Developer', 'Mobile Global', 1000, 'Senior', 5, '• Nam, tuổi từ 23 – 35.  • Tốt nghệp các Chuyên ngành Điện tử viễn thông/Công nghệ thông tịn/Thương mại/ Kinh tế/ Ngoại thương  • Tối thiểu 01 năm làm việc trong lĩnh vực cung cấp các dịch vụ Kênh thuê riêng, Internet, VAS và các Dịch vụ công nghệ thông  • Ưu tiên có kinh nghiệm làm việc tại các Nhà cung cấp dịch vụ như FPT/ CMC/ Viettel/ VNPT... hoặc có kinh nghiệm bán hàng, phát triển thị trường  • Ưu tiên ứng viên đã ký kết thành công hợp đồng tại các dự án thuộc các Khối Khách hàng gồm Tài chính, Giáo dục, FDI, Phần mềm, ICT, Tổng Công ty & Bộ ban ngành  • Sẵn sàng đi công tác trong nước và nước ngoài.  • Khả năng làm việc độc lập và có tính chủ động cao trong công việc', '• Phát triển thị trường cung cấp các dịch vụ Kênh thuê riêng, Internet, Điện toán đám mây, VAS và các giải pháp Chuyển đổi số tới các Khối Khách hàng mục tiêu gồm Tài chính, Giáo dục, FDI, Phần mềm, ICT, Tổng Công ty & Bộ ban ngành\r\n\r\n• Phát triển kinh doanh theo KPI được giao.\r\n\r\n• Điều phối công tác triển khai, hỗ trợ dịch vụ trước và sau bán hàng cho khách hàng.\r\n\r\n• Tham gia các event/ chương trình đào tạo trong và ngoài nước\r\n\r\n• Hỗ trợ, phối hợp với các đơn vị của Công ty xúc tiến bán hàng, triển khai các dự án tại nước ngoài', '• Lương theo thỏa thuận. Thu nhập lên đến 25 triệu\r\n\r\n• Thưởng tháng lương thứ 13, thưởng theo doanh số bán hàng và các dịp Lễ, Tết.\r\n\r\n• Thời gian làm việc hành chính từ Thứ 2 đến Thứ 6.\r\n\r\n• Chế độ nghỉ phép, BHXH theo quy định của Nhà nước.\r\n\r\n• Tham gia các hoạt động văn hóa, thể thao: Bóng đá, Tennis, nghỉ mát, các hoạt động đoàn thể khác\r\n\r\n• Chế độ công tác phí, chế độ đào tạo trong nước và quốc tế do Công ty đài thọ.\r\n\r\n• Môi trường làm việc hiện đại, năng động, chuyên nghiệp.', 'FullTime', 'Hà Nội', 'logo.jpg', 'https://www.topcv.vn/cong-ty/akila/145836.html', 1, 'ntd53870@gmail.com', '2024-04-11 09:43:28', '2024-04-12 05:38:57'),
(10, 2, 'Backend PHP Developer', 'SCOTS ENGLISH AUSTRALIA', 700, 'Nhân viên', 0, '- Giới tính: Nam/Nữ  - Khả năng giao tiếp tốt, kỹ năng thuyết phục khách hàng, chốt sale;  - Kỹ năng Làm việc nhóm;  - Nhanh nhẹn, tiếp thu tốt và chịu áp lực cao;  - Có kinh nghiệm ở vị trí tương đương, đã từng làm trong các ngành dịch vụ như giáo dục, ngân hàng, du lịch, bảo hiểm;  - Thích làm việc trong môi trường giáo dục', '1. Tư vấn, tuyển sinh các khóa đào tạo tiếng Anh tại các Chi nhánh thuộc Công ty.\r\n\r\n2. Làm việc theo nhóm, triển khai các hoạt động thu thập thông tin khách hàng\r\n\r\n3. Tìm cách tiếp cận, mời khách hàng đến trải nghiệm sản phẩm của công ty;\r\n\r\n4. Duy trì, phát triển khách hàng tiềm năng trong lĩnh vực kinh doanh của Công ty;\r\n\r\n5. Trực tiếp tham gia quá trình đào tạo nhân viên mới, đào tạo nâng cao kỹ năng bán hàng và chăm sóc khách hàng cho nhân viên theo quy định.\r\n\r\n6. Thực hiện các yêu cầu khác dựa trên sự chỉ đạo của cấp trên trực tiếp;', '- Lương thưởng hấp dẫn, lương cứng từ 7 -10triệu + Thưởng hoa hồng + Thưởng nóng + thưởng khác=> Thu nhập > 15Tr ++\r\n\r\n- Tham gia đầy đủ BHXH, BHYT, BHTN,TTNCN\r\n\r\n- Được nghỉ phép 12 ngày/năm cùng ngày lễ tết theo quy định pháp luật\r\n\r\n- Tham gia team building hàng năm và nhiều hoạt động khác theo quy chế Công ty\r\n\r\n- Được xem xét tăng lương mỗi 3 tháng/lần\r\n\r\n- Được đào tạo bài bản về kiến thức, kỹ năng và yêu cầu cần thiết cho công việc\r\n\r\n- Được đào tạo về lộ trình phát triển bản thân tại công ty\r\n\r\n- Được hưởng các chế độ chính sách đãi ngộ tốt của công ty\r\n\r\n- Chính sách ưu đãi học phí tại TT dành cho CBNV công ty\r\n\r\nThời gian làm việc:\r\n\r\n- Ca 1: 9-18h\r\n\r\n- Ca 2: 13-21h00\r\n\r\n(Xoay ca linh hoạt về thời gian làm việc)\r\n\r\n- Nghỉ 1,5 ngày/ tuần', 'FullTime', '60 Lê Quang Đạo, Từ Sơn, Bắc Ninh, Từ Sơn', 'se.jpg', 'https://www.topcv.vn/brand/scotsenglishaustralia/tuyen-dung/nhan-vien-tu-van-tuyen-sinh-tai-bac-ninh-thu-nhap-tu-15-25-trieu-j588254.html?ta_source=BoxFeatureJob_QuickView', 1, 'ntd53870@gmail.com', '2024-04-11 09:45:46', '2024-04-12 05:39:07'),
(11, 5, 'Chuyên viên hành chính nhân sự', 'Nhà nước', 500, 'Chuyên viên', 1, 'Độ tuổi: 22 – 35. Tốt nghiệp các ngành như: Ngôn ngữ Anh, Quản trị Kinh Doanh, Nhân Sự, Luật. Có khả năng giao tiếp tiếng Anh là một lợi thế. Có kinh nghiệm hành chính nhân sự từ 2 năm trở lên. Giao tiếp tốt, hòa đồng với mọi người, có tính chủ động và trách nhiệm cao. Khả năng chịu áp lực công việc cao, sẵn sàng làm việc ngoài giờ theo yêu cầu công việc. Kỹ năng tin học văn phòng thành thạo: Microsoft Office.', 'Thực hiện thủ tục phát hành, quản lý hệ thống văn bản quản trị của Công ty.\r\nMua hàng, kiểm tra đơn giá, nhà cung cấp hàng hóa, dịch vụ, đăng ký.\r\nTham gia tổ chức chương trình sự kiện: lập checklist công việc, ngân sách, trình phê duyệt ngân sách và kế hoạch thực hiện, nghiệm thu và hoàn thiện hồ sơ thanh toán.\r\nTham gia xây dựng quy định, quy trình hướng dẫn nghiệp vụ và các biểu mẫu kèm theo.\r\nTuyển dụng, tiếp nhận nhân sự mới, quản lý hồ sơ nhân sự.\r\nKiểm soát, thực hiện việc tính và chi trả lương, thưởng, các chế độ phúc lợi.\r\nTiếp đón, phụ trách liên lạc và giữ thông tin khách hàng làm việc tại Công ty.\r\nThực hiện các nhiệm vụ khác theo sự phân công của cán bộ quản lý trực tiếp.', 'Đãi ngộ:\r\nLương cứng: 8.000.000 VNĐ – 10.000.000 VNĐ.\r\nThưởng: Các ngày lễ, Tết theo quy định Nhà nước.\r\nNghỉ 12 ngày phép năm, các ngày Lễ, Tết theo quy định Nhà nước.\r\nKý hợp đồng lao động chính thức sau thời gian thử việc theo quy định.\r\nĐược hưởng đầy đủ các chế độ phúc lợi, Đóng BHXH, BHYT, BHTN.\r\nCơ hội thử thách và phát triển:\r\nCơ hội được tiếp cận với tập khách hàng đa ngành và những dự án lớn.\r\nNhiều cơ hội phát triển, thăng tiến trong sự nghiệp.\r\nVăn hoá môi trường làm việc:\r\nMôi trường làm việc năng động, thân thiện, công bằng, kỷ luật.\r\nVăn phòng hiện đại, đạt tiêu chuẩn quốc tế.', 'FullTime', '44 Yên Phụ, Ba Đình', 'nn.png', 'https://www.topcv.vn/viec-lam/chuyen-vien-hanh-chinh-nhan-su-tai-ha-noi-thu-nhap-8-10-trieu/1285857.html?ta_source=BoxFeatureJob_QuickView', 1, 'ntd53870@gmail.com', '2024-04-11 09:47:50', '2024-04-12 05:39:13'),
(12, 2, 'Nhân viên tư vấn viên qua điện thoại', 'Apple Shop', 500, 'Nhân viên', 2, 'Chịu khó học hỏi, có tinh thần cầu tiến; Độ tuổi từ 18-32 tuổi; Giọng nói rõ ràng, khả năng xử lý tình huống; Không yêu cầu kinh nghiệm vì bạn sẽ được đào tạo theo công việc; Có kinh nghiệm về Tư vấn, Chăm sóc khách hàng là một lợi thế.', 'Gọi điện tư vấn cho khách hàng về tài chính đầu tư chứng khoán, tư vấn các chương trình mở tài khoản theo danh sách dữ liệu có sẵn (Công ty cung cấp data có sẵn)\r\nNhập và xử lý thông tin dữ liệu khách hàng trên hệ thống của công ty;\r\nGiải đáp thắc mắc và thuyết phục khách hàng đầu tư qua điện thoại, zalo, sms, email....\r\nThực hiện các công việc khác khi có yêu cầu từ cấp trên.', 'Lương cứng: 7.500.000 + 910.000 Phụ cấp\r\nThưởng chuyên cần: 500.000\r\nThưởng cao theo giá trị hợp đồng (Không giới hạn): 2.000.000 - 8.000.000\r\nThu nhập bình quân: 10.000.000 - 15.000.000 (Cao hơn theo năng lực)\r\nHỗ trợ cơm trưa tại văn phòng;\r\nĐầy đủ chế độ theo LLĐ.\r\nNgày phép, các ngày Lễ/Tết theo quy định Nhà Nước.\r\nMôi trường trẻ, năng động.\r\nĐào tạo kỹ năng, nghiệp vụ trước khi bắt đầu công việc (Đào tạo vẫn được chấm công như đi làm)', 'FullTime', 'Toà nhà Intracom Cầu Diễn, Phúc Diễn, Bắc Từ Liêm', 'logo.jpg', 'https://www.topcv.vn/viec-lam/nhan-vien-tu-van-vien-qua-dien-thoai-off-chieu-t7-chu-nhat-bac-tu-liem/1286555.html?ta_source=BoxFeatureJob_QuickView', 1, 'ntd53870@gmail.com', '2024-04-11 09:50:28', '2024-04-12 05:39:25'),
(13, 2, 'Huấn luyện viên cá nhân', 'Nugym Fitness', 2000, 'Huấn luyện viên', 3, '- Làm việc Full time.  - Nam/nữ tốt nghiệp Trung cấp trở lên. Ham học hỏi, nhiệt tình, nhanh nhẹn, trách nhiệm, chủ động trong công việc  - Có ngoại hình ưa nhìn, dáng thể thao  - Tận tâm, đam mê nghề nghiệp  - Am hiểu về các loại máy hỗ trợ luyện tập  - Kỹ năng giao tiếp, chăm sóc khách hàng tốt  - Chưa có kinh nghiệm sẽ được đào tạo bài bản  - Siêng năng, chăm chỉ, kỉ luật', '- Giao tiếp, hướng dẫn khách hàng về cách tập, sử dụng máy tập, chế độ dinh dưỡng\r\n\r\n- Thiết kế bài tập, luyện tập cho khách hàng\r\n\r\n- Các công việc khác trao đổi cụ thể khi phỏng vấn', '• LCB TỪ 8.000.000 -20.000.000 (chưa bao gồm hoa hồng)\r\n\r\n• Hoa hồng: 30.000.000 - 50.000.000/tháng\r\n\r\n• HĐLĐ BHXH theo chế độ đầy đủ\r\n\r\n• Có cơ hội thăng tiến\r\n\r\n• Làm việc trực tiếp tại phòng tập,môi trường hiện đại thân thiện.\r\n\r\n• Tập luyện miễn phí nâng cao sức khoẻ tại NuGym\r\n\r\n• Team building hàng tháng\r\n\r\n• Du lịch nước ngoài định kỳ\r\n\r\n• Thưởng Quý , Tuần , Tháng cực kỳ cao', 'PartTime', '172B Tây Thạnh, P.Tây Thạnh, Tân Phú', 'nu.png', 'https://www.topcv.vn/viec-lam/huan-luyen-vien-ca-nhan-pt-nugym-fitness-thu-nhap-tu-40-70-trieu-thang/1292027.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-11 09:52:27', '2024-04-12 05:39:38'),
(14, 5, 'Nhân viên sale thị trường', 'Nha khoa SINGAE', 500, 'Nhân viên', 0, '1. Độ tuổi: 25-40 tuổi  2. Thời gian làm việc:  - Thứ 2 – thứ 7: 8h30 –18h.  3. Bằng cấp: Tốt nghiệp cao đẳng trở lên  4. Kinh nghiệm:  - Ứng viên có kinh nghiệm ở các vị trí tương đương (bán hàng, tư vấn, telesales...).  - Ưu tiên ứng viên có kinh nghiệm Bank (Priority, Tín dụng doanh nghiệp, Giao dịch) hoặc các tổ chức lớn.  - Ưu tiên ứng viên có kinh nghiệm xây dựng hệ thống bán hàng, xây dựng mạng lưới cộng tác viên.', '- Follow các mối quan hệ với khách hàng, các đầu mối do cấp Quản lý kết nối, đối tác cũ mở rộng các mối quan hệ khách hàng mới.\r\n\r\n- Thực hiện tìm kiếm, kết nối làm việc các khách hàng Tổ chức, Doanh nghiệp, Dân cư trên địa bàn, tổ chức các buổi hội thảo về chủ đề Nha Khoa.\r\n\r\n- Tư vấn những thông tin về sản phẩm để khách hàng hiểu rõ những ưu điểm của sản phẩm nhằm đảm bảo doanh số bán hàng.\r\n\r\n- Giải đáp những thắc mắc cho khách hàng về các dịch vụ Nha Khoa .\r\n\r\n- Phối hợp với bác sỹ trong quá trình làm việc.\r\n\r\n- Thực hiện và Báo cáo ngày về hoạt động kinh doanh, doanh thu của Công ty trước cấp quản lý.\r\n\r\n- Các công việc khác theo yêu cầu của cấp trên.', '- Lương cứng 10-20tr + Lương kinh doanh. (thu nhập từ 20 - 50 triệu)\r\n\r\n- BHXH, BHYT theo quy định của nhà nước\r\n\r\n- 12 ngày phép 1 năm\r\n\r\n- Thưởng lễ, tết, lương tháng 13.\r\n\r\n- Du lịch định kỳ, tham gia các sự kiện của công ty.\r\n\r\n- Review lương theo hiệu quả công việc 12 tháng/lần.\r\n\r\n- Làm việc trong môi trường chuyên nghiệp, năng động, sáng tạo, hỗ trợ nhân viên phát triển, hoàn thiện kĩ năng\r\n\r\n- Có cơ hội thăng tiến khi có đủ năng lực phù hợp với vị trí cao hơn\r\n\r\n- Được tham gia các buổi party cuối năm, ngày kỷ niệm, teambuilding do công ty tổ chức.\r\n\r\n- Được hỗ trợ tham gia các khóa học nâng cao kiến thức, phát triển bản thân.', 'PartTime', 'LK02 Lacasa 25 Vũ Ngọc Phan, Láng Hạ, Đống Đa', 'sin.png', 'https://www.topcv.vn/viec-lam/nhan-vien-sale-thi-truong-luong-co-ban-10-12-trieu-thu-nhap-tu-20-50-trieu/1288659.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-11 09:54:20', '2024-04-12 05:39:51'),
(15, 5, 'Chuyên viên thu hồi nợ trực tiếp', 'Techcombank', 500, 'Nhân viên', 1, '- Không yêu cầu kinh nghiệm  - Bằng cấp: Tốt nghiệp TRUNG CẤP trở lên  - Có trách nhiệm trong công việc', '1. Thực thi chiến lược Thu nợ trực tiếp, tìm kiếm, xác minh thông tin và đôn đốc KH trả nợ đối với các khách hàng được phân công:\r\n\r\n- Tiếp nhận danh mục khách hàng, nghiên cứu hồ sơ khoản nợ để nắm thông tin khách hàng, khoản nợ và sắp xếp danh mục ưu tiên xử lý, ưu tiên thực hiện các hồ sơ thu nợ có mức độ khó trung bình\r\n\r\n- Thực hiện các cuộc Thu nợ trực tiếp theo đúng kịch bản và chiến lược, ghi nhận đầy đủ kết quả tác nghiệp lên hệ thống dữ liệu, đảm bảo đáp ứng KPI\r\n\r\n2. Thực thi phương án giảm thiểu rủi ro của khách hàng phát sinh trong quá trình Thu nợ trực tiếp:\r\n\r\n- Tiếp nhận yêu cầu của khách hàng\r\n\r\n- Đánh giá, phân tích thực trạng KH và/hoặc tình trạng tác nghiệp\r\n\r\n- Đề xuất về các phương án giảm thiểu rủi ro theo quy định\r\n\r\n- Triển khai phương án giảm thiểu rủi ro sau phê duyệt theo phân công\r\n\r\n3. Tham gia việc phát hiện gian lận trong quá trình tác nghiệp\r\n\r\n4. Tham gia góp ý xây dựng/chỉnh sửa chính sách văn bản, phương thức vận hành thu hồi nợ liên quan đến nghiệp vụ tại bộ phận', '- Thu nhập 12-18 triệu (lương cứng + incentive)\r\n\r\n- Lương tháng 13, thưởng cuối năm, BHXH, Bảo hiểm sức khỏe\r\n\r\n- Làm việc trong môi trường năng động, chuyên nghiệp có nhiều cơ hội thăng tiến\r\n\r\n- Được hưởng đầy đủ các chính sách phúc lợi theo quy định của Techcombank\r\n\r\n- Được trải nghiệm và chia sẻ các kinh nghiệm làm việc thực tế.', 'FullTime', 'Hồ Chí Minh', 'tcb.png', 'https://www.topcv.vn/viec-lam/chuyen-vien-thu-hoi-no-truc-tiep-luong-12-18-trieu-techcombank-ha-noi-ho-chi-minh/1282171.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-11 10:00:11', '2024-04-12 05:39:47'),
(26, 5, 'Nhân Viên Kinh Doanh /Telesale/ Tư Vấn Tuyển Sinh Thu Nhập Upto 20 Triệu Đi Làm Ngay', 'CÔNG TY CỔ PHẦN ACAC ACADEMY', 500, 'Nhân viên', 0, 'KHÔNG YÊU CẦU KINH NGHIỆM, khi trở thành nhân sự của ACAC Academy các bạn sẽ được training bài bản bởi Leaders nhiều năm kinh nghiệm trong lĩnh vực giáo dục. Có kinh nghiệm bán hàng, tư vấn, kinh doanh online, telesale là 1 lợi thế. Đặc biệt là trong mảng giáo dục. Có định hướng rõ ràng và mong muốn có lộ trình trình thăng tiến trong sự nghiệp Ham học hỏi, không ngừng sáng tạo, cầu tiến Thích giao tiếp, hòa đồng.', 'Trực page, trả lời tin nhắn khách hàng qua fanpage của Công ty. Chăm sóc nguồn khách hàng do phòng Marketing cung cấp, đồng thời chủ động phát triển nguồn khách hàng đảm bảo đạt chỉ tiêu được giao. Chuyển đổi khách hàng cũ thành người làm tiếp thị liên kết (Affiliate). Hỗ trợ làm các thủ tục cho học viên và chăm sóc học viên trong suốt quá trình học.', 'Chính sách lương + thưởng: - Thu nhập theo năng lực, không giới hạn. Trung bình từ 10,000,000 - 20,000,000 vnđ/tháng ( Lương Cứng+ Thưởng+ Hoa Hồng)  - Chính sách hoa hồng lũy tiến, rõ ràng, minh bạch  - Thử việc hưởng 100% lương cứng + Hoa hồng + Thưởng  - Thưởng doanh số; thưởng best sale hàng tuần, tháng, quý, cuối năm; thưởng vinh danh,...  Chế độ phúc lợi: - Thưởng cuối năm theo kết quả kinh doanh chung của Công ty;  - Nghỉ phép 12 ngày/năm và nghỉ lễ theo lịch quốc gia;  - Lộ trình thăng tiến rõ ràng;  - Tham gia các buổi liên hoan, tổ chức và quà sinh nhật hàng tháng, chương trình gala cuối năm..  - Được thử sức trong một môi trường làm việc trẻ trung, năng động với chính sách đãi ngộ tốt, có nhiều cơ hội nâng cao năng lực bản thân và tăng thêm thu nhập.', 'PartTime', '- Hà Nội: Tầng 3 Tòa nhà 789, Số 147 Đường Hoàng Quốc Việt, Phường Nghĩa Đô, Cầu Giấy', '1713243264-logo.png', 'https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-telesale-tu-van-tuyen-sinh-thu-nhap-upto-20-trieu-di-lam-ngay/1248975.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-15 14:10:48', '2024-04-18 07:51:18'),
(27, 5, 'Nhân Viên Kinh Doanh /Telesale/ Tư Vấn Tuyển Sinh Thu Nhập Upto 20 Triệu Đi Làm Ngay', 'CÔNG TY CỔ PHẦN ACAC ACADEMY', 500, 'Nhân viên', 3, 'KHÔNG YÊU CẦU KINH NGHIỆM, khi trở thành nhân sự của ACAC Academy các bạn sẽ được training bài bản bởi Leaders nhiều năm kinh nghiệm trong lĩnh vực giáo dục. Có kinh nghiệm bán hàng, tư vấn, kinh doanh online, telesale là 1 lợi thế. Đặc biệt là trong mảng giáo dục. Có định hướng rõ ràng và mong muốn có lộ trình trình thăng tiến trong sự nghiệp Ham học hỏi, không ngừng sáng tạo, cầu tiến Thích giao tiếp, hòa đồng.', 'Trực page, trả lời tin nhắn khách hàng qua fanpage của Công ty. Chăm sóc nguồn khách hàng do phòng Marketing cung cấp, đồng thời chủ động phát triển nguồn khách hàng đảm bảo đạt chỉ tiêu được giao. Chuyển đổi khách hàng cũ thành người làm tiếp thị liên kết (Affiliate). Hỗ trợ làm các thủ tục cho học viên và chăm sóc học viên trong suốt quá trình học.', 'Chính sách lương + thưởng: - Thu nhập theo năng lực, không giới hạn. Trung bình từ 10,000,000 - 20,000,000 vnđ/tháng ( Lương Cứng+ Thưởng+ Hoa Hồng)  - Chính sách hoa hồng lũy tiến, rõ ràng, minh bạch  - Thử việc hưởng 100% lương cứng + Hoa hồng + Thưởng  - Thưởng doanh số; thưởng best sale hàng tuần, tháng, quý, cuối năm; thưởng vinh danh,...  Chế độ phúc lợi: - Thưởng cuối năm theo kết quả kinh doanh chung của Công ty;  - Nghỉ phép 12 ngày/năm và nghỉ lễ theo lịch quốc gia;  - Lộ trình thăng tiến rõ ràng;  - Tham gia các buổi liên hoan, tổ chức và quà sinh nhật hàng tháng, chương trình gala cuối năm..  - Được thử sức trong một môi trường làm việc trẻ trung, năng động với chính sách đãi ngộ tốt, có nhiều cơ hội nâng cao năng lực bản thân và tăng thêm thu nhập.', 'PartTime', '- Hà Nội: Tầng 3 Tòa nhà 789, Số 147 Đường Hoàng Quốc Việt, Phường Nghĩa Đô, Cầu Giấy', '1713243264-logo.png', 'https://www.topcv.vn/viec-lam/nhan-vien-kinh-doanh-telesale-tu-van-tuyen-sinh-thu-nhap-upto-20-trieu-di-lam-ngay/1248975.html?ta_source=BoxFeatureJob_LinkDetail', 1, 'ntd53870@gmail.com', '2024-04-15 14:11:52', '2024-04-15 14:12:18'),
(31, 14, 'Accounting', 'Huy Hao .co', 500, 'Staff', 2, 'Đại học', 'Ngày làm 8 giờ', 'lương tháng 13', 'FullTime', 'Can Tho', '1713427757-logo.webp', 'https://fpt.vn/vi', 1, 'ntd53870@gmail.com', '2024-04-18 01:09:17', '2024-04-18 01:09:51'),
(32, 2, '.Net core developer', 'CUSC', 300, 'Junior', 1, 'Đại học', 'Làm việc 8 tiếng mỗi ngày', 'Lương tháng 13', 'FullTime', 'Cần Thơ', '1713452863-logo.png', 'https://www.ctu.edu.vn/', 0, 'ntd53870@gmail.com', '2024-04-18 08:07:43', '2024-04-18 08:07:43'),
(33, 2, 'Viettel1', 'Development', 500, 'fresher', 1, 'abc dè', 'đại học', 'lương tháng 13', 'fulltime', 'cantho', 'logo.jpg', 'https://vietteltelecom.vn/', 0, 'ntd53870@gmail.com', '2024-04-18 08:09:40', '2024-04-18 08:09:40'),
(34, 17, 'CTU1', 'CUSC', 300, 'Junior', 1, 'Đại học', 'Làm việc 8 tiếng mỗi ngày', 'Lương tháng 13', 'FullTime', 'Cần Thơ', '1713492952-logo.png', 'https://www.ctu.edu.vn/', 1, '', '2024-04-18 19:15:52', '2024-04-18 19:17:39'),
(35, 2, 'Viettel', 'Development', 500, 'fresher', 1, 'abc dè', 'đại học', 'lương tháng 13', 'fulltime', 'cantho', 'logo.jpg', 'https://vietteltelecom.vn/', 0, '', '2024-04-18 19:25:29', '2024-04-18 19:25:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_26_173020_create_admin_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `NEWS_ID` int(10) UNSIGNED NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LOGO` varchar(255) DEFAULT 'ctu.png',
  `LINK` varchar(255) NOT NULL,
  `CONTENT` varchar(2048) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`NEWS_ID`, `COMPANY_ID`, `NAME`, `LOGO`, `LINK`, `CONTENT`, `created_at`, `updated_at`) VALUES
(1, 2, 'VIETTEL TUYỂN DỤNG HÀNG TRĂM VỊ TRÍ VỚI MỨC LƯƠNG CỰC KỲ HẤP DẪN', 'ctu.png', 'https://vietteltelecom.vn/tin-tuc/chi-tiet/viettel-tuyen-dung-hang-tram-vi-tri-voi-muc-luong-cuc-ky-hap-dan/19963492', 'Tổng Công ty Viễn thông Viettel thuộc Tập đoàn Công nghiệp - Viễn thông Quân đội là Doanh nghiệp hàng đầu tại Việt Nam về Viễn thông và Công nghệ thông tin.\r\n\r\nHiện nay, chúng tôi có nhu cầu tuyển ứng viên cho các vị trí trong lĩnh vực kinh doanh, CNTTtại Tổng Công ty. Cụ thể như sau:\r\n\r\nI. CHUYÊN VIÊN KINH DOANH (tuyển dụng toàn quốc)\r\n\r\n1.   Số lượng: 100 nhân sự\r\n\r\n2.   Mô tả công việc:\r\n\r\n-    Nghiên cứu, phân tích hành vi khách hàng, đề xuất xây dựng các chính sách sản phẩm, dịch vụ, chương trình khuyến mại, xúc tiến bán hàng cho các lĩnh vực viễn thông (điện thoại di động/Internet/Truyền hình/Dịch vụ nội dung), thương mại điện tử, giải pháp công nghệ thông tin.\r\n\r\n-   Tổ chức xây dựng, phát triển, quản lý, điều hành hệ thống kênh phân phối cho từng loại sản phẩm, dịch vụ trong các lĩnh vực nêu trên.\r\n\r\n-    Nắm bắt, xây dựng cơ sở dữ liệu của hệ thống khách hàng được phân công; theo dõi kết quả sản xuất kinh doanh của tập khách hàng được phân công.\r\n\r\n-     Thực hiện báo cáo tuần/tháng; lên kế hoạch triển khai công việc theo tuần/tháng/năm.\r\n\r\n3.  Tiêu chuẩn chức danh\r\n\r\n-  Tuổi: Không quá 35\r\n\r\n-  Tốt nghiệp Đại học chính quy loại Khá trở lên các chuyên ngành kinh tế, quản trị kinh doanh, marketing thuộc các trường Đại học uy tín trong nước và ngoài nước.\r\n\r\n-  Tiếng Anh: Đọc được tài liệu tiếng anh.\r\n\r\n-   Thành thạo tin học văn phòng (các ứng viên có kỹ năng trình bày văn bản power point… là một lợi thế).\r\n\r\n-   Nhiệt tình, chủ động trong công việc; có khả năng tương tác độc lập, điều phối, phối hợp với các đơn vị để triển khai công việc.\r\n\r\n-   Ưu tiên ứng viên có kinh nghiệm làm việc trong lĩnh vực viễn thông, CNTT.\r\n\r\n4.   Mức lương\r\n\r\n-  Thu nhập từ 15-50 triệu tùy theo kinh nghiệm và năng lực cá nhân.\r\n\r\n-  Chế độ khác theo quy định chung của Tập đoàn\r\n\r\nII.  KỸ SƯ PHÁT TRIỂN PHẦN MỀM: (tuyển dụng Hà Nội, Hồ Chí Minh, Đà Nẵng)\r\n\r\n1. Số lượng: 100 nhân sự\r\n\r\n2.   Mô tả công việc:\r\n\r\n-   Lập trình các dự án phần mềm: web, ứng dụng, mobile\r\n\r\n-   Thiết kế', '2024-04-03 10:11:29', '2024-04-04 03:12:51'),
(2, 6, 'Đào tạo lập trình tại doanh nghiệp cho người không chuyên', 'ctu.png', 'https://vnexpress.net/dao-tao-lap-trinh-tai-doanh-nghiep-cho-nguoi-khong-chuyen-4434689.html', 'Nhu cầu nhân lực công nghệ thông tin ngày càng tăng cao, đặc biệt sau đại dịch Covid-19, mở ra cơ hội cho những ai có niềm đam mê với ngành này.\r\n\r\nLập trình viên có năng lực đang được nhiều doanh nghiệp săn đón với mức lương hấp dẫn, làm việc trong môi trường chuyên nghiệp, hiện đại và có rất nhiều cơ hội phát triển bản thân. Cơ hội được tuyển dụng và làm việc trong ngành công nghệ thông tin không chỉ dành riêng cho những ai học chuyên về ngành này ở các trường cao đẳng, đại học, mà rộng mở cho bất cứ ai với đam mê và mong muốn chuyển ngành.\r\n\r\nThực tế, ngày càng nhiều những trung tâm đào tạo ngắn hạn, các khoá học online... mở ra trong thời gian gần đây để nắm bắt cơ hội tuyển dụng theo xu hướng này. Tuy nhiên, vấn đề chất lượng đầu ra hoặc cơ hội việc làm cho học viên không phải đơn vị nào cũng có khả năng đảm bảo. Bên cạnh đó, nhiều học viên không biết phải bắt đầu từ đâu giữa một \"biển kiến thức\", không có cơ hội thực hành trên các dự án thực tế, hay thiếu sự hướng dẫn trực tiếp từ các chuyên gia của doanh nghiệp, không chắc chắn được những gì mình học có ích cho công việc sau này hay không, dẫn đến việc lãng phí thời gian và tiền bạc.\r\nThấu hiểu thực trạng này, Axon Active, một công ty sản xuất phần mềm đến từ Thụy Sĩ với hơn 12 năm trong ngành phần mềm ở Việt Nam, đã thiết kế một chương trình đào tạo lập trình viên đặc biệt. Chương trình giải quyết mối quan tâm hàng đầu của các học viên là có việc làm theo nhu cầu trong vòng 6 tháng.\r\n\r\nChương trình đào tạo được thiết kế và hướng dẫn bởi chính đội ngũ chuyên gia nhiều năm kinh nghiệm tại công ty, được học theo phương pháp thực hành tại môi trường thực tế tại doanh nghiệp. Đặc biệt, mỗi ứng viên được chọn sẽ được công ty tài trợ 100% học phí trong suốt quá trình đào tạo.\r\n\r\n\"Với kinh nghiệm lâu năm phát triển phần mềm cho khách hàng trên toàn thế giới, chúng tôi biết chính xác một lập trình viên cần có những kiến thức và kĩ năng gì để có thể thành công. Chương trình mong muốn mang lại cơ hội việc làm cho những', '2024-04-03 03:24:37', '2024-04-03 03:24:37'),
(3, 6, 'Đào tạo lập trình tại doanh nghiệp cho người không chuyên', 'ctu.png', 'https://vnexpress.net/dao-tao-lap-trinh-tai-doanh-nghiep-cho-nguoi-khong-chuyen-4434689.html', 'Nhu cầu nhân lực công nghệ thông tin ngày càng tăng cao, đặc biệt sau đại dịch Covid-19, mở ra cơ hội cho những ai có niềm đam mê với ngành này.\r\n\r\nLập trình viên có năng lực đang được nhiều doanh nghiệp săn đón với mức lương hấp dẫn, làm việc trong môi trường chuyên nghiệp, hiện đại và có rất nhiều cơ hội phát triển bản thân. Cơ hội được tuyển dụng và làm việc trong ngành công nghệ thông tin không chỉ dành riêng cho những ai học chuyên về ngành này ở các trường cao đẳng, đại học, mà rộng mở cho bất cứ ai với đam mê và mong muốn chuyển ngành.\r\n\r\nThực tế, ngày càng nhiều những trung tâm đào tạo ngắn hạn, các khoá học online... mở ra trong thời gian gần đây để nắm bắt cơ hội tuyển dụng theo xu hướng này. Tuy nhiên, vấn đề chất lượng đầu ra hoặc cơ hội việc làm cho học viên không phải đơn vị nào cũng có khả năng đảm bảo. Bên cạnh đó, nhiều học viên không biết phải bắt đầu từ đâu giữa một \"biển kiến thức\", không có cơ hội thực hành trên các dự án thực tế, hay thiếu sự hướng dẫn trực tiếp từ các chuyên gia của doanh nghiệp, không chắc chắn được những gì mình học có ích cho công việc sau này hay không, dẫn đến việc lãng phí thời gian và tiền bạc.\r\nThấu hiểu thực trạng này, Axon Active, một công ty sản xuất phần mềm đến từ Thụy Sĩ với hơn 12 năm trong ngành phần mềm ở Việt Nam, đã thiết kế một chương trình đào tạo lập trình viên đặc biệt. Chương trình giải quyết mối quan tâm hàng đầu của các học viên là có việc làm theo nhu cầu trong vòng 6 tháng.\r\n\r\nChương trình đào tạo được thiết kế và hướng dẫn bởi chính đội ngũ chuyên gia nhiều năm kinh nghiệm tại công ty, được học theo phương pháp thực hành tại môi trường thực tế tại doanh nghiệp. Đặc biệt, mỗi ứng viên được chọn sẽ được công ty tài trợ 100% học phí trong suốt quá trình đào tạo.\r\n\r\n\"Với kinh nghiệm lâu năm phát triển phần mềm cho khách hàng trên toàn thế giới, chúng tôi biết chính xác một lập trình viên cần có những kiến thức và kĩ năng gì để có thể thành công. Chương trình mong muốn mang lại cơ hội việc làm cho những', '2024-04-03 03:25:10', '2024-04-03 03:25:10'),
(4, 6, 'Đào tạo lập trình tại doanh nghiệp cho người không chuyên', 'ctu.png', 'https://vnexpress.net/dao-tao-lap-trinh-tai-doanh-nghiep-cho-nguoi-khong-chuyen-4434689.html', 'Nhu cầu nhân lực công nghệ thông tin ngày càng tăng cao, đặc biệt sau đại dịch Covid-19, mở ra cơ hội cho những ai có niềm đam mê với ngành này.\r\n\r\nLập trình viên có năng lực đang được nhiều doanh nghiệp săn đón với mức lương hấp dẫn, làm việc trong môi trường chuyên nghiệp, hiện đại và có rất nhiều cơ hội phát triển bản thân. Cơ hội được tuyển dụng và làm việc trong ngành công nghệ thông tin không chỉ dành riêng cho những ai học chuyên về ngành này ở các trường cao đẳng, đại học, mà rộng mở cho bất cứ ai với đam mê và mong muốn chuyển ngành.\r\n\r\nThực tế, ngày càng nhiều những trung tâm đào tạo ngắn hạn, các khoá học online... mở ra trong thời gian gần đây để nắm bắt cơ hội tuyển dụng theo xu hướng này. Tuy nhiên, vấn đề chất lượng đầu ra hoặc cơ hội việc làm cho học viên không phải đơn vị nào cũng có khả năng đảm bảo. Bên cạnh đó, nhiều học viên không biết phải bắt đầu từ đâu giữa một \"biển kiến thức\", không có cơ hội thực hành trên các dự án thực tế, hay thiếu sự hướng dẫn trực tiếp từ các chuyên gia của doanh nghiệp, không chắc chắn được những gì mình học có ích cho công việc sau này hay không, dẫn đến việc lãng phí thời gian và tiền bạc.\r\nThấu hiểu thực trạng này, Axon Active, một công ty sản xuất phần mềm đến từ Thụy Sĩ với hơn 12 năm trong ngành phần mềm ở Việt Nam, đã thiết kế một chương trình đào tạo lập trình viên đặc biệt. Chương trình giải quyết mối quan tâm hàng đầu của các học viên là có việc làm theo nhu cầu trong vòng 6 tháng.\r\n\r\nChương trình đào tạo được thiết kế và hướng dẫn bởi chính đội ngũ chuyên gia nhiều năm kinh nghiệm tại công ty, được học theo phương pháp thực hành tại môi trường thực tế tại doanh nghiệp. Đặc biệt, mỗi ứng viên được chọn sẽ được công ty tài trợ 100% học phí trong suốt quá trình đào tạo.\r\n\r\n\"Với kinh nghiệm lâu năm phát triển phần mềm cho khách hàng trên toàn thế giới, chúng tôi biết chính xác một lập trình viên cần có những kiến thức và kĩ năng gì để có thể thành công. Chương trình mong muốn mang lại cơ hội việc làm cho những', '2024-04-03 03:26:09', '2024-04-03 03:26:09'),
(5, 2, 'Viettel tuyển dụng', NULL, 'https://www.ctu.edu.vn/', 'tuyển dụng tháng 5', '2024-04-18 07:49:33', '2024-04-18 07:50:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `ROLE_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`ROLE_ID`, `NAME`) VALUES
(1, 'Admin'),
(2, 'NhaTuyenDung'),
(3, 'UngVien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5dNA4iaO6mlnJoKLj8udXgGT2qedwAb5veYiopKQ', 34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWxKTTBnYU51YTBNbVJ1U1FTZXF2M3JmNVFLRWNOMlZWQzNCYzNEayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM0O30=', 1714236176);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `USER_ID` int(10) UNSIGNED NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `PHONE` varchar(11) DEFAULT NULL,
  `AVATAR` varchar(255) DEFAULT 'ctu.png',
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`USER_ID`, `COMPANY_ID`, `ROLE_ID`, `EMAIL`, `password`, `NAME`, `ADDRESS`, `PHONE`, `AVATAR`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin@gmail.com', '$2y$12$BWj93VnZAwCBS2UFoopW7.5MuKMhTHoyuDcqsEJ2mQX7S8eyrapHS', 'Admin', 'CanTho City', '0944653870', '1713340726-avatar.png', '0', '0000-00-00 00:00:00', '2024-04-17 00:58:46'),
(2, 1, 2, 'ntd53870@gmail.com', '$2y$12$BWj93VnZAwCBS2UFoopW7.5MuKMhTHoyuDcqsEJ2mQX7S8eyrapHS', 'CTU', 'CanTho City', '0192423112', '1713453735-avatar.jpg', '0', '0000-00-00 00:00:00', '2024-04-18 08:22:15'),
(3, 1, 3, 'giahuy.53870@gmail.com', '$2y$12$BWj93VnZAwCBS2UFoopW7.5MuKMhTHoyuDcqsEJ2mQX7S8eyrapHS', 'fix-bug', 'CanTho City', '0192423112', 'ctu.png', '1713493579', '2024-03-27 13:34:32', '2024-04-18 19:26:19'),
(4, 1, 2, 'ntd2@gmail.com', '$2y$12$BWj93VnZAwCBS2UFoopW7.5MuKMhTHoyuDcqsEJ2mQX7S8eyrapHS', 'fix-bugs', NULL, '06853230', 'ctu.png', '', '2024-04-04 05:09:03', '2024-04-04 05:09:03'),
(5, 1, 2, 'ntd3@gmail.com', '$2y$12$BWj93VnZAwCBS2UFoopW7.5MuKMhTHoyuDcqsEJ2mQX7S8eyrapHS', 'Nike', 'Can Tho1', '095022000', 'ctu.png', '1713351568', '2024-04-08 18:55:43', '2024-04-17 03:59:28'),
(13, 1, 3, 'admina@gmail.com', '$2y$12$5fZ782RSFLvSsKGv1F3TWuxBZUstNpDDd7Bk4AVff55II47n81lYO', 'fix-bug', NULL, NULL, 'ctu.png', '0', '2024-04-17 04:35:31', '2024-04-17 04:35:31'),
(14, 1, 2, 'hao@gmail.com', '$2y$12$jWHaywNrXTctQNGrjfejuuk9M.5d/K8Jw4FcQ6zN0DYxLCPWkm80G', 'HoHuyHao', NULL, NULL, 'ctu.png', '0', '2024-04-18 01:06:54', '2024-04-18 01:06:54'),
(16, 1, 2, 'ntd5@gmail.com', '$2y$12$YM.hJm5nIYyRix79spuoP.gg9s0jCfQy.DKntZGeQVHiUAAu7jA4y', 'fix-bug', NULL, NULL, 'ctu.png', '0', '2024-04-18 19:08:14', '2024-04-18 19:08:14'),
(17, 1, 2, 'ntd6@gmail.com', '$2y$12$PZog0C9bwV7uiRGDWvQp7ejYf1tNEe4ySEKYhYifznF1xH5cwCgPK', 'fix-bug', NULL, NULL, 'ctu.png', '0', '2024-04-18 19:15:00', '2024-04-18 19:15:00'),
(18, 1, 2, 'ntd@gmail.com', '$2y$12$Hut/quUab3ZZrIvbYWq2suKWXsjHO3cdiuq4CpDILDAH/ZwJZv5CK', 'fix-bug', NULL, NULL, 'ctu.png', '0', '2024-04-27 03:46:22', '2024-04-27 03:46:22'),
(19, 1, 3, 'admin1@gmail.com', '$2y$12$PT7nVNvTyKks4bJWyRJqZeU7vTshZ0B52ZhIfXVuw8GfbzGFdcpKi', 'fix-bug', NULL, NULL, 'ctu.png', '2314', '2024-04-27 08:57:50', '2024-04-27 08:57:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`USER_ID`,`JOB_ID`),
  ADD KEY `FK_COUNGVIEN` (`JOB_ID`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cocongviec`
--
ALTER TABLE `cocongviec`
  ADD PRIMARY KEY (`COMPANY_ID`,`JOB_ID`),
  ADD KEY `FK_CUACONGTY` (`JOB_ID`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JOB_ID`),
  ADD KEY `FK_DADANG` (`USER_ID`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NEWS_ID`),
  ADD KEY `FK_COTINTUC` (`COMPANY_ID`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_CO` (`ROLE_ID`),
  ADD KEY `FK_THUOC` (`COMPANY_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `COMPANY_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JOB_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `NEWS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
