-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2023 lúc 11:24 AM
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
-- Cơ sở dữ liệu: `phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `movie_id`, `updated_at`, `created_at`) VALUES
(6, 18, 127, '2023-07-12 13:13:36', '2023-07-12 13:13:36'),
(7, 18, 88, '2023-07-12 13:13:39', '2023-07-12 13:13:39'),
(8, 18, 101, '2023-07-13 08:51:33', '2023-07-13 08:51:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`) VALUES
(9, 'Phim Chiếu Rạp', 'Phim chiếu rạp là các bộ phim được công chiếu trên màn hình rạp chiếu phim.', 1, 'phim-chieu-rap'),
(16, 'Phim Hành Động', 'Phim hành động là một thể loại phim tập trung vào các tình tiết hành động gay cấn và mạo hiểm.', 1, 'phim-hanh-dong'),
(17, 'Phim Tình Cảm', 'Phim tình cảm xoay quanh các câu chuyện về tình yêu, lãng mạn, đau khổ, và tình huống tâm lý giữa các nhân vật chính.', 1, 'phim-tinh-cam'),
(18, 'Phim Hài Kịch', 'Phim hài kịch thường kết hợp giữa yếu tố hài hước và yếu tố kịch tính để tạo nên các tình huống hài hước và sự hiếu khách.', 1, 'phim-hai-kich'),
(19, 'Phim Hoạt Hình', 'Phim hoạt hình có thể là hoạt hình 2D (vẽ tay) hoặc hoạt hình 3D (sử dụng mô hình 3D và kỹ thuật máy tính đồ họa).', 1, 'phim-hoat-hinh'),
(20, 'Phim Khoa Học', 'Phim khoa học thường xây dựng một thế giới tưởng tượng, có thể là trong tương lai, quá khứ hoặc một thực tại song song.', 1, 'phim-khoa-hoc'),
(21, 'Phim Kinh Dị', 'Phim kinh dị là một thể loại phim tập trung vào việc tạo ra cảm giác sợ hãi, kinh dị và ám ảnh trong khán giả.', 1, 'phim-kinh-di'),
(22, 'Phim Thần Thoại', 'Phim thần thoại là một thể loại phim tập trung vào việc tái hiện hoặc chuyển thể các câu chuyện, truyền thuyết và huyền thoại từ thần thoại của các văn hóa và tôn giáo khác nhau.', 1, 'phim-than-thoai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `locale` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(8, 'Việt Nam', 'Phim Việt Nam', 1, 'viet-nam'),
(9, 'Âu Mỹ', 'Phim Âu Mỹ', 1, 'au-my'),
(10, 'Trung Quốc', 'Phim Trung Quốc', 1, 'trung-quoc'),
(11, 'Đài Loan', 'Phim Đài Loan', 1, 'dai-loan'),
(12, 'Hàn Quốc', 'Phim Hàn Quốc', 1, 'han-quoc'),
(13, 'Nhật Bản', 'Phim Nhật Bản', 1, 'nhat-ban'),
(14, 'Ấn Độ', 'Phim Ấn Độ', 1, 'an-do'),
(15, 'Thái Lan', 'Phim Thái Lan', 1, 'thai-lan'),
(16, 'Nam Phi', 'Phim Nam Phi', 1, 'nam-phi'),
(17, 'Philippines', 'Phim Philippines', 1, 'philippines'),
(18, 'Singapore', 'Phim Singapore', 1, 'singapore');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim720` text DEFAULT NULL,
  `linkphim4K` text DEFAULT NULL,
  `episode` varchar(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim720`, `linkphim4K`, `episode`, `updated_at`, `created_at`) VALUES
(179, 131, 'uploads/video/yeu-em-tu-cai-nhin-dau-tien_1_720.mp4', 'uploads/video/yeu-em-tu-cai-nhin-dau-tien_1_4K.mp4', '1', '2023-07-08 16:02:49', '2023-07-08 16:02:49'),
(180, 131, 'uploads/video/yeu-em-tu-cai-nhin-dau-tien_2_720.mp4', 'uploads/video/yeu-em-tu-cai-nhin-dau-tien_2_4K.mp4', '2', '2023-07-08 22:52:07', '2023-07-08 22:52:07');

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
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(19, 'Tình Cảm', 'Phim Tình Cảm', 1, 'tinh-cam'),
(22, 'Kiếm Hiệp', 'Phim Kiếm Hiệp', 1, 'kiem-hiep'),
(23, 'Khoa Học Viễn Tưởng', 'Phim Khoa Học Viễn Tưởng', 1, 'khoa-hoc-vien-tuong'),
(24, 'Cổ Trang', 'Phim Cổ Trang', 1, 'co-trang'),
(25, 'Phiêu Lưu', 'Phim Phiêu Lưu', 1, 'phieu-luu'),
(26, 'Hài', 'Phim Hài', 1, 'hai'),
(27, 'Kinh Dị', 'Phim Kinh Dị', 1, 'kinh-di'),
(28, 'Hoạt Hình', 'Phim Hoạt Hình', 1, 'hoat-hinh'),
(29, 'Gia Đình', 'Phim Gia Đình', 1, 'gia-dinh'),
(30, 'Võ Thuật', 'Phim Võ Thuật', 1, 'vo-thuat'),
(31, 'Cung Đấu', 'Phim Cung Đấu', 1, 'cung-dau'),
(32, 'Hành Động', 'Phim Hành Động', 1, 'hanh-dong'),
(34, 'Thần Thoại', 'Phim Thần Thoại', 1, 'than-thoai');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name_eng` varchar(255) NOT NULL,
  `thoi_luong` varchar(50) DEFAULT NULL,
  `season` varchar(50) DEFAULT '0',
  `description` longtext NOT NULL,
  `trailer` varchar(200) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `phude` int(11) NOT NULL DEFAULT 0,
  `sotap` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `topview` int(11) DEFAULT 2,
  `ngay_tao` varchar(50) DEFAULT NULL,
  `ngay_cap_nhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(10) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `name_eng`, `thoi_luong`, `season`, `description`, `trailer`, `tags`, `slug`, `resolution`, `phude`, `sotap`, `status`, `image`, `phim_hot`, `topview`, `ngay_tao`, `ngay_cap_nhat`, `year`, `category_id`, `thuocphim`, `genre_id`, `country_id`) VALUES
(74, 'XÁC ƯỚP AI CẬP', 'The Mummy (1999)', '128 phút', '0', 'Một bộ phim phiêu lưu kinh dị kết hợp với yếu tố thần thoại Ai Cập, nó mô tả cuộc phiêu lưu của nhà khảo cổ Rick O\'Connell khi anh chiến đấu chống lại một xác ướp sống. Phim là bản làm lại của bộ phim Xác ướp (1932), với sự tham gia của Boris Karloff trong vai xác ướp. Trong bộ phim này, nhà thám hiểm Rick O\'Connell đi đến Hamunaptra, thành phố của người chết, cùng một nhà khảo cổ học và anh trai cô. Ở đó, họ vô tình đánh thức Imhotep, vị Tư Tế Cao cấp từ triều đại của vị vua Seti Đệ Nhất, người đã bị nguyền rủa mãi mãi.', 'f7oKxlaUBac', 'Xác Ướp Ai Cập, The Mummy, Xác Ướp Đáng Sợ, Brendan Fraser, Rachel Weisz, Pharaoh, Mummy Returns, Xác Ướp Ai Cập 1999, Adventure movie, Action movie, Ancient Egypt, Mummy curse, Imhotep, Ardeth Bay, O\'Connell family, phim thần thoại, phim kinh dị, phim phiêu lưu', 'xac-uop-ai-cap', 0, 1, 1, 1, 'The Mummy 1999704.jpg', 0, 1, '2023-06-26 01:17:55', '2023-06-27 13:18:02', '1999', 21, 'phimle', 3, 9),
(75, 'THOR: TẬN THẾ RAGNAROK', 'Thor Ragnarok (2017)', '130 phút', '0', 'Trong phim, Thor phải tìm cách trốn thoát khỏi hành tinh Sakaar để kịp thời cứu Asgard khỏi Hela và ngày tận thế Ragnarok. Hai năm sau sự kiện Ultron, dù Thor cố gắng hết sức ngăn chặn viễn cảnh tận thế bi thảm của Asgard, mọi thứ vẫn trở thành sự thật. Quê nhà mịt mù khói lửa, những mạng người vô tội lần lượt ngã xuống. Và người tạo nên địa ngục ấy là Hela – cô con gái đầu lòng nhà Odin. Không còn những câu bông đùa nhàm chán của anh chàng cơ bắp nhận thức ngô nghê, Thor duyên dáng và hài hước, khiến khán giả cười mọi lúc mọi nơi.', 'ue80QwXMRHg', 'Thor: Ragnarok, Thor: Sự Trỗi Dậy Của Ragnarok, Thor movie, Ragnarok movie, MCU (Marvel Cinematic Universe), Marvel, phim hành động, phim thần thoại', 'thor-tan-the-ragnarok', 1, 0, 0, 1, 'thor_ragnarok_2017129.jpg', 1, 0, '2023-06-26 01:59:53', '2023-06-27 13:17:47', '2017', 9, 'phimle', 3, 9),
(76, 'DIỆP VẤN', 'Ip Man', '110 phút / tập', '4', 'Diệp Vấn là bộ phim đầu tiên được dàn dựng dựa trên cuộc đời của Diệp Vấn[2]. Ý định đưa cuộc đời của Diệp sư phụ lên màn ảnh đã có từ năm 1998, song bị gác lại một thời gian do vấn đề bản quyền. Tình trạng này cứ kéo dài mãi cho tới khi nam diễn viên kiêm nhà sản xuất phim Huỳnh Bách Minh nhận được sự hỗ trợ về kinh phí và tư vấn từ con trai cả của Diệp Vấn là Diệp Chuẩn, ông đã quyết định làm bộ phim này. Bách Minh đã có một thời gian nghiên cứu về những ngày tại vùng đất Phật Sơn của Diệp Vấn, cũng như nghiên cứu về tiểu sử của vị danh sư. Từ những ý tưởng này mà con trai của Bách Minh là Huỳnh Tử Hoàn chắp bút viết kịch bản.', 'lzIkybm47to', 'Diệp Vấn, IP Man, Yip Man, Phim về Võ sư Diệp Vấn, Donnie Yen, Phim võ thuật, Phim hành động, Phim lịch sử võ thuật, Võ thuật Trung Quốc, Wing Chun, Bộ phim Diệp Vấn, The Legend is Born: Ip Man, IP Man 2, IP Man 3, IP Man 4: The Finale', 'diep-van', 1, 1, 3, 1, 'ip-man-3-1647502248518.jpg', 1, 2, '2023-06-26 02:23:26', '2023-06-27 13:17:33', '2008', 9, 'phimbo', 3, 10),
(77, 'CONAN THÁM TỬ LỪNG DANH MOVIE 1 - QUẢ BOM CHỌC TRỜI', 'Detective Conan Movie 1: The Time Bombed Skyscraper', '94 phút', '1', 'Detective Conan: The Time Bombed Skyscraper (Lồng Tiếng) kể về việc Shinichi nhận lời mời dự tiệc từ kiến trúc sư Teiji Moriya, người không hề biết cậu đã bị thu nhỏ thành Conan. Cùng lúc đó, một kẻ lạ mặt gọi điện thách thức cậu tìm ra những quả bom đang được đặt xung quanh Tokyo. Hai sự kiện này liệu có liên quan đến nhau? Mọi việc càng trở nên nghiêm trọng khi Ran bị mắc kẹt tại một trong những tòa nhà đã bị đặt bom. Liệu Conan có tìm ra hung thủ và cứu cô bạn mình khỏi khoảnh khắc sinh tử?', 'Ybln9aAyjvo', 'Detective Conan, Phim Conan, Thám tử lừng danh Conan, Shinichi Kudo, Kudo Shinichi no Jikenbo, Phim hoạt hình Conan, Movie Conan, phim hoạt hình, Anime Conan', 'conan-tham-tu-lung-danh-movie-1-qua-bom-choc-troi', 2, 1, 0, 1, 'conan movie 1 qua bom choc troi979.jpg', 0, 2, '2023-06-26 11:07:04', '2023-06-27 13:17:17', '1997', 9, 'phimle', 2, 13),
(78, 'XIN CHÀO JADOO', 'Hello Jadoo', '11 phút / tập', '0', 'Xin Chào Jadoo là loạt phim hoạt hình phát triển từ một bộ truyện tranh rất nổi tiếng của Hàn Quốc với nhân vật chính là cô bé Jadoo vui vẻ, hoạt bát, dễ thương. Nội dung chính là những câu chuyện xảy ra trong cuộc sống hàng ngày của Jadoo. Mối quan hệ với các thành viên trong gia đình, trong lớp học và ngoài xã hội; những khó khăn, thử thách trong học tập và sinh hoạt,..luôn đòi hỏi cô bé Jadoo và các bạn của mình phải rèn luyện, hình thành những thói quen tốt, cách cư xử đúng mực để có được sự yêu mến của mọi người và thành công trong cuộc sống.', '4pDEMfQsEV4', 'Hello Jadoo, Jadoo Viet Nam, XIn chào Jadoo, phim hoạt hình, phim hài hước', 'xin-chao-jadoo', 1, 1, 19, 1, 'hellojadoo783.jpg', 0, 2, '2023-06-26 11:14:14', '2023-06-27 13:17:02', '1997', 19, 'phimbo', 2, 12),
(79, 'CONAN THÁM TỬ LỪNG DANH MOVIE 2 - MỤC TIÊU THỨ 14', 'Detective Conan 2: The Fourteenth Target', '110 phút', '2', 'Trong tập phim này, Ran có một cơn ác mộng về vụ tai nạn của mẹ mình và cô bắt đầu tìm cách nhớ lại về sự kiện đó. Trong lúc đó, người có vài quan hệ thân thiết với thám tử Mori, đã bị tấn công. Tất cả những cái tên của nạn nhân đều phù hợp với những lá bài. Những người này là mục tiêu theo thứ tự từ quân K đến quân A. Cảnh sát kết luận rằng kẻ tấn công muốn trả thù ông Mori, nhưng khi những cuộc tấn công này trở thành tội ác, Conan nhận ra rằng sẽ có 1 cuộc đua để dự đoán được nạn nhân tiếp theo sẽ là ai. Cậu ta sớm phát hiện ra được có một vài điểm khác biệt trong sự nghi ngờ của cảnh sát khi tìm hiểu về tai nạn của 10 năm trước.', 'PDT1iOGjwOs', 'Conan, Thám tử lừng danh, Detective Conan, phim hoạt hình', 'conan-tham-tu-lung-danh-movie-2-muc-tieu-thu-14', 2, 1, 0, 1, 'conan movie 2 muc tieu thu 14494.png', 0, 2, '2023-06-26 11:31:16', '2023-06-27 13:16:48', '1998', 9, 'phimle', 2, 13),
(80, 'CÔNG VIÊN KỶ JURA', 'Jurassic Park (1993)', '120 phút', '0', 'Trên một hòn đảo bí mật ,công việc chế tạo lại khủng long đang được hoàn thành bởi những DNA còn lại trên những con muỗi cổ xưa. Trước khi mở công viên của mình, ông Hammond đã mời một nhóm khoa học đến để tham quan và giúp đỡ ông. Nhưng trong một đêm mưa bão, hệ thống bảo vệ bị sụp đổ, những con thú khổng lồ cổ xưa thoát ra ngoài.', 'At228WVzDYU', 'Phim hành động, phim khoa học viễn tưởng, Công viên kỷ Jura, Jurassic Park', 'cong-vien-ky-jura', 3, 0, 0, 1, 'jurassic park383.jpg', 0, 2, '2023-06-26 11:42:05', '2023-06-27 13:16:33', '1993', 20, 'phimle', 3, 9),
(81, 'MA TRẬN', 'The Matrix (1999)', '130 phút', '1', 'Thế giới chúng ta đang sống có phải là thực, hay chỉ là một ảo mộng? Liệu có một ngày nào đó trí tuệ nhân tạo và robot trở nên thông minh vượt kiểm soát và kiểm soát loài người?... Đó là những đề tài kinh điển đã được điện ảnh khai thác, và thành công nhất trong đó là huyền thoại The Matrix | Ma Trận. Loạt phim 4 phần được đánh giá cao về đề tài, nội dung và kỹ thuật, trở thành một trong những bộ phim khoa học viễn tưởng có sức ảnh hưởng lớn nhất trong lịch sử điện ảnh. Đây là phần đầu tiên, bắt đầu xoay quanh cuộc sống của Thomas A. Anderson, một lập trình viên/hacker thiên tài biệt danh Neo. Một ngày nọ, một người lạ mặt gửi cho Neo một thông điệp, cho anh biết rằng thế giới mà anh đang sống không phải thực tại mà chỉ là một thế giới ảo do chương trình máy tính kiểm soát. Sau đó, Neo được sự giúp đỡ của Morpheus và Trinity, đưa anh vào cuộc chiến chống lại hệ thống trí tuệ nhân tạo đang kiểm soát ma trận với hy vọng giải phóng tất cả mọi người đang bị mê hoặc.', 'VdZwkM_HWzw', 'Phim khoa học, phim hành động, The Matrix, Ma trận', 'ma-tran', 1, 0, 0, 1, 'the matrix814.jpg', 1, 0, '2023-06-26 11:47:08', '2023-06-27 13:16:15', '1999', 20, 'phimle', 3, 9),
(82, 'TRỞ VỀ TƯƠNG LAI 1', 'Back to the Future 1', '180 phút', '1', 'Bị mắc kẹt vào năm 1955, Marty McFly biết về cái chết của Doc Brown vào năm 1885 và phải du hành ngược thời gian để cứu anh ta. Không có nhiên liệu có sẵn cho Delorean, cả hai phải tìm cách thoát khỏi phương Tây cũ trước khi Emmett bị sát hại.', 'qvsgGtivCgs', 'Phim khoa học, Back to the future, Trở về tương lai, phim hành động', 'tro-ve-tuong-lai-1', 0, 0, 0, 1, '10_Mu_Poster_Cinema_p734.png', 0, 1, '2023-06-26 11:54:35', '2023-06-27 13:15:59', '1986', 20, 'phimle', 3, 9),
(83, 'TRỞ VỀ TƯƠNG LAI 2', 'Back To The Future 2', '180 phút', '2', 'Để ngăn chặn sự sụp đổ của gia đình McFly trong tương lai, Marty phải dùng cỗ máy thời gian đi tới năm 2015 để gặp con trai của cậu. Quay trở lại năm 1985 sau khi xong việc, Marty kinh hoàng khi thấy mọi thứ đã thay đổi: cha bị giết, mẹ lấy người khác, còn tiến sĩ Brown thì bị điên. Phần hai của bộ phim mở đầu với cảnh Marty McFly (Michael J.Fox) và tiến sĩ Emmett Brown (Christopher Lloyd) hành trình tới năm 2015 để ngăn chặn con trai của Marty tham gia một vụ cướp. Cùng đi với họ là Jennifer Parker (Elisabeth Shue), bạn gái của Marty.', 'MdENmefJRpw', 'Phim khoa học, phim hành động, Trở về tương lai, Back to the future', 'tro-ve-tuong-lai-2', 1, 0, 0, 1, 'bo-phim-du-hanh-thoi-gian-dac-sac-ma-ai-cung-nen-xem-it-nhat-mot-lan-d9d21407.jpg', 1, 2, '2023-06-26 12:01:25', '2023-06-27 13:15:37', '1989', 20, 'phimle', 3, 9),
(84, 'TRỞ VỀ TƯƠNG LAI 3', 'Back To The Future 3', '180 phút', '3', 'Một trục trặc xảy ra với cỗ máy thời gian, đưa tiến sĩ Emmett trở về năm 1885. Marty buộc phải quay trở lại năm đó để đưa người bạn già trở về. Nhờ chuyến đi đó mà cậu gặp được tổ tiên của dòng họ McFly. Sau khi lấy lại cuốn niên giám thể thao từ tay Biff vào năm 1955, qua đó đưa mọi thứ ở năm 1985 trở lại bình thường, Marty và tiến sĩ Emmett Brown sửa lại cỗ máy thời gian và trở về hiện tại. Nhưng rồi một sự cố xảy ra, đẩy vị tiến sĩ về năm 1885 và làm hỏng cỗ máy thời gian. Ông buộc phải làm nghề rèn để kiếm sống và tìm cách sửa chữa cỗ máy. Sau khi gửi một lá thư về tương lai để báo cho Marty biết tình hình, Emmett bị một tên cướp tên là Tannen bắn chết. Mọi việc trong quá khứ sẽ làm thay đổi tương lai. Marty sẽ phải làm gì để cứu người bạn của mình...', '3C8c3EoEfw4', 'Phim hành động, phim khoa học, Back to the future, Trở về tương lai', 'tro-ve-tuong-lai-3', 3, 0, 0, 1, 'tro-ve-tuong-lai-phan-3-thumb596.jpg', 1, 0, '2023-06-26 12:04:03', '2023-06-27 13:12:24', '1990', 20, 'phimle', 3, 9),
(85, 'HỐ ĐEN TỬ THẦN', 'Interstellar (2014)', '169 phút', '0', 'Hố Đen Tử Thần là biên niên ký về cuộc phiêu lưu vĩ đại của một nhóm các nhà thám hiểm sử dụng khám phá mới về lỗ đen vũ trụ để vượt qua các giới hạn thông thường trong du hành không gian, chinh phục khoảng không mênh mông trên một chuyến hành trình xuyên dải ngân hà...', 'QqSp_dwslro', 'Phim khoa học, phim hành động, Hố đen tử thần, Interstellar', 'ho-den-tu-than', 2, 0, 0, 1, 'tarp-zvaigzdziu-dvd42.jpg', 1, 2, '2023-06-26 12:07:55', '2023-06-27 13:12:09', '2014', 20, 'phimle', 3, 9),
(86, 'KẺ ĐÁNH CẮP GIẤC MƠ', 'Inception (2010)', '150 phút', '0', 'Dom Cobb không phải là một tên trộm bình thường, anh ta là một bậc thầy trong việc trộm cắp, có thể xâm nhập vào cõi vô thức của bất kỳ người nào. một người nào đó để đánh cắp những bí mật sâu kín nhất của mình. Muốn làm được điều này, anh đã bước vào giấc mơ của người đó. “Chúng tôi tạo ra thế giới của những giấc mơ. Chúng ta đưa đối tượng vào thế giới mộng mơ đó và đối tượng khai ra tất cả bí mật, và sau đó chúng ta đánh cắp bí mật. Nhưng đã đến lúc Cobb cảm thấy mệt mỏi với những tên tội phạm hành động theo lệnh của anh ta. các tập đoàn. Anh muốn trở lại cuộc sống bình thường như bao người khác. Để làm được như vậy, anh ta phải làm một công việc cuối cùng cho Saito, một người khổng lồ nắm giữ cục tẩy của Cobb trước nhà chức trách Mỹ. Nhưng thay vì đánh cắp thông tin, Saito muốn cấy vào tâm trí một tập đoàn đối thủ cạnh tranh một ý tưởng. Với ý tưởng đó, đối thủ này chỉ có một con đường để đi.', 'YoHD9XEInc0', 'Phim hành động, phim khoa học, Kẻ đánh cắp giấc mơ, Inception', 'ke-danh-cap-giac-mo', 3, 0, 0, 1, 'inception999.jpg', 1, 1, '2023-06-26 12:16:38', '2023-06-27 13:11:56', '2010', 20, 'phimle', 3, 9),
(87, 'NGƯỜI VỀ TỪ SAO HỎA', 'The Martian (2015)', '141 phút', '0', 'Người Về Từ Sao Hỏa kể về cuộc chiến sinh tồn của phi hành gia Mark Watney (Matt Damon) sau khi anh bị kẹt lại trên Sao Hoả. Phải mất ít nhất 4 năm nữa NASA mới quay trở lại hành tinh này để thực hiện nhiệm vụ tiếp theo, và tất nhiên Mark không thể sống sót được đến lúc đó. Căn cứ do nhóm của anh xây dựng hiện chỉ tồn tại được trong 31 ngày. Mark phải tìm được nguồn nước, phải trồng được thực phẩm tại nơi vốn không thứ gì có thể mọc nổi. Nỗ lực phi thường cuối cùng cũng được đáp trả khi NASA phát hiện tín hiệu cầu cứu của anh. Nhưng, một lần nữa, số phận Mark lại bị đem lên bàn cân khi NASA cho rằng quay lại Sao Hoả có thể phải trả giá bằng tính mạng của 6 người khác. 6 thành viên trong nhóm Mark đã quyết định lén lút thực hiện chiến dịch giải cứu anh. Liệu họ có thành công? Liệu Mark có thể trở về trái đất để toàn tụ cùng vợ con? Đó là điều mà cả thế giới đang ngày ngày dõi theo.', 'ej3ioOneTy8', 'Người Về Từ Sao Hỏa, The Martian, phim hành động, phim khoa học', 'nguoi-ve-tu-sao-hoa', 2, 0, 0, 1, '22391cac-2740-4196-9af6-bc0b45d45885503.jpg', 1, 0, '2023-06-26 12:20:52', '2023-06-27 13:11:43', '2015', 20, 'phimle', 3, 9),
(88, 'LẬT MẶT 6 - TẤM VÉ ĐỊNH MỆNH', 'Face Off 6', '210 phút', '6', 'Ở “Tấm vé định mệnh”, một câu chuyện về tình bạn giữa những người anh em đã gắn kết với nhau ở vùng sông nước miền Tây Nam bộ đã được khắc họa với nhiều cung bậc cảm xúc. Phần phim này Lý Hải vẫn giữ được “phong độ” khi giải quyết tốt được việc liên kết nhóm nhân vật chính trở thành một mạch thống nhất. Mạch phim và câu chuyện của các nhân vật trong phim được dẫn dắt khá mạch lạc, không có sự gượng gạo hay nhồi ép quá mức.', '2EnP2tVC00Q', 'Phim hành động, phim gia đình, Lật Mặt, Face Off', 'lat-mat-6-tam-ve-dinh-menh', 5, 1, 0, 1, 'lat-mat-6460.jpg', 1, 2, '2023-06-26 12:30:02', '2023-06-27 13:11:28', '2023', 9, 'phimle', 3, 8),
(89, 'QUÁ NHANH QUÁ NGUY HIỂM 10', 'Fast X (2023)', '141 phút', '10', 'Với phần phim thứ 10 được lên kế hoạch từ năm 2014, và một phim cuối gồm 2 phần được lên kế hoạch từ tháng 10 năm 2020, Justin Lin cùng dàn diễn viên chính được xác nhận rằng sẽ quay trở lại phim. Đây là phim thứ 2 trong loạt phim mà không có Dwayne Johnson kể từ lần đầu anh xuất hiện trong Fast & Furious 5: Phi vụ Rio (2011). Tựa đề chính thức của phim được tiết lộ khi quá trình quay phim chính bắt đầu vào tháng 4 năm 2022. Cuối tháng đó, Lin rời ghế đạo diễn với lý do là sự mâu thuẫn về mặt sáng tạo, mặc dù anh vẫn sẽ được nhắc đến với vai trò viết kịch bản và sản xuất trong mục danh đề. 1 tuần sau đó, Leterrier được thuê để thay thế vai trò đạo diễn của Lin. Với ngân sách sản xuất là khoảng 340 triệu USD, Fast X là phim có kinh phí cao thứ 4 từ trước đến nay.', '32RAq6JzY-w', 'Quá Nhanh Quá Nguy Hiểm, Fast X, phim hành động', 'qua-nhanh-qua-nguy-hiem-10', 5, 0, 0, 1, '3bf19af08c2fe0a3740bce7c89faeca0_original31.jpg', 1, 2, '2023-06-26 12:34:18', '2023-06-27 13:11:10', '2023', 9, 'phimle', 3, 9),
(90, 'CUỘC ĐỔ BỘ BÍ ẨN', 'Arrival (2016)', '120 phút', '0', 'Truyện kể về hành trình của tiến sĩ ngôn ngữ học Louise Banks và người đồng hành của cô, tiến sĩ vật lý Gary Donnelly (tên trong phim: Ian) trong công cuộc tìm hiểu mục đích chuyến viếng thăm Trái Đất bất ngờ của người ngoài hành tinh Heptapod. Thông qua việc học và nghiên cứu ngôn ngữ viết của chúng, Louise đã có khả năng nhìn thấy tương lai. Trong bối cảnh ấy, tác giả Ted Chiang đã đặt nhân vật của mình vào một lựa chọn lớn: thay đổi hay giữ nguyên tương lai của mình.', 'tFMo3UJ4B4g', 'Phim hành động, phim khoa học, The Arrival,  Cuộc Đổ Bộ Bí Ẩn, Arrival movie, Arrival Denis Villeneuve', 'cuoc-do-bo-bi-an', 3, 1, 0, 1, 'z4464241298380_93591650d64da2fa590232f29599d92a640.jpg', 0, 2, '2023-06-26 12:47:19', '2023-06-27 13:10:44', '2016', 20, 'phimle', 3, 9),
(91, 'VÙNG ĐẤT LINH HỒN', 'Spirited Away (2001)', '125 phút', '0', 'Chihiro lạc vào thế giới ma thuật nơi một phù thủy cai trị – và những ai không tuân theo mụ ta sẽ bị biến thành động vật.', 'cMaCHa7RDfc', 'Vùng đất linh hồn, Spirited Away, anime, phim hoạt hình', 'vung-dat-linh-hon', 0, 0, 0, 1, 'XjEKyx372.jpg', 0, 1, '2023-06-26 14:37:45', '2023-06-27 13:10:29', '2001', 19, 'phimle', 2, 13),
(92, 'VUA SƯ TỬ', 'The Lion King (2019)', '125 phút', '0', 'Vua Sư Tử được đạo diễn bởi Jon Favreau sẽ đưa khán giả đến với xavan Châu Phi rộng lớn nơi vị vua tương lai Simba được sinh ra. Tuy là người kế vị ngai vàng chính thức nhưng Simba phải đương đầu với những âm mưu của Scar, người chú ruột luôn toan tính chiếm lấy ngôi báu. Cuộc chiến ở Pride Rock trở nên khốc liệt hơn bao giờ hết và đỉnh điểm là việc chú sư tử Simba bị lưu đày khỏi quê hương. Với sự giúp đỡ của 2 người bạn mới Timon và Pumbaa, Simba dần học cách trưởng thành và quay trở về để giành lại những gì vốn dĩ thuộc về cậu. Bằng kĩ xảo đồ họa ấn tượng và âm nhạc sống động, Vua Sư Tử sẽ tái hiện lại những nhân vật mà khán giả yêu mến theo một cách hoàn toàn mới.', 'ZXj3lJ9YPjc', 'Vua sư tử, The Lion King, phim hoạt hình', 'vua-su-tủ', 2, 0, 0, 1, 'unnamed (1)824.jpg', 0, 0, '2023-06-26 14:41:25', '2023-06-27 13:10:14', '2019', 19, 'phimle', 2, 9),
(93, 'VÚT BAY', 'Up', '156 phút', '0', 'Là một cậu bé, Carl Fredricksen muốn khám phá Nam Mỹ và tìm những ngã thiên đường hoang dã. Khoảng 64 năm sau, anh ta được bắt đầu hành trình cùng với Boy Scout Russell bằng cách nâng ngôi nhà của mình với hàng ngàn quả bóng bay. Trên hành trình của họ, họ làm cho nhiều người bạn mới bao gồm một con chó biết nói, và tìm ra rằng ai đó có kế hoạch xấu xa. Carl sớm nhận ra rằng những kẻ bất lương này là thần tượng thời thơ ấu của anh.', 'ORFWdXl_zJ4', 'Up, Vút Bay, phim hoạt hình', 'vut-bay', 1, 0, 0, 1, '9e4227a0ee81ec8874fd92cf6203066c328.jpg', 0, 2, '2023-06-26 14:44:14', '2023-06-27 13:09:56', '2009', 19, 'phimle', 2, 9),
(94, 'ĐI TÌM NEMO', 'Finding Nemo (2003)', '100 phút', '0', 'Một con cá chú hề tên Marlin sống trong Rạn san hô Great Barrier và mất con trai, Nemo, sau khi anh ta mạo hiểm vào biển rộng, bất chấp cảnh báo liên tục của cha mình về nhiều nguy hiểm của đại dương. Nemo bị một chiếc thuyền bị bắt cóc và bị hạ gục và gửi đến văn phòng nha sĩ ở Sydney. Trong khi Marlin mạo hiểm để cố gắng lấy Nemo, Marlin gặp một con cá tên Dory, một Tang xanh bị mất trí nhớ ngắn hạn. Những người bạn đồng hành di chuyển một khoảng cách lớn, gặp nhiều sinh vật biển nguy hiểm như cá mập, cá ấp và sứa, nhằm giải cứu Nemo khỏi văn phòng nha sĩ, nơi nằm cạnh Cảng Sydney. Trong khi cả hai đang tìm kiếm đại dương xa và rộng, Nemo và các động vật biển khác trong bể cá của nha sĩ vẽ cách để quay trở lại biển để sống miễn phí cuộc sống của họ một lần nữa.', '2zLkasScy7A', 'Đi tìm Nemo, Finding Nemo, phim hoạt hình', 'di-tim-nemo', 2, 1, 0, 1, 'MMV1F713A2708DAFAE9779155691EA64A9E4113.jpeg', 0, 1, '2023-06-26 14:48:42', '2023-06-27 13:09:42', '2003', 19, 'phimle', 2, 9),
(95, 'PHI VỤ ĐỘNG TRỜI', 'Zootopia (2016)', '110 phút', '0', 'Trong phim này, Zootopia là một thành phố kì lạ không giống bất kì thành phố nào trước đây của hãng Walt Disney sáng chế. Đây là khu đô thị vui vẻ của các loài động vật, từ voi, tê giác, cho đến những loài nhỏ bé như chuột, thỏ, cún. Cho đến một ngày cô cảnh sát thỏ Judy Hopps xuất hiện, thành phố Zootopia đã có những thay đổi rất là khác. Cô cùng người bạn đồng hành là chú cáo đầy “tiểu xảo” Nick Widle, đã cùng nhau phiêu lưu trong một vụ kỳ án, với mong muốn thiết lập lại trật tự cho thành phố zootopia.', 'jWM0ct-OLsM', 'Phi vụ động trời, Zootopia, phim hoạt hình', 'phi-vu-dong-troi', 3, 1, 0, 1, '1669999889723-Zootopia-Poster-1627.jpg', 0, 0, '2023-06-26 14:51:07', '2023-06-27 13:09:28', '2016', 19, 'phimle', 2, 9),
(96, 'NHỮNG MẢNH GHÉP CẢM XÚC', 'Inside Out (2015)', '95 phút', '0', 'Sau khi Riley trẻ tuổi bị bỏ hoang từ cuộc sống Trung Tây của cô và chuyển đến San Francisco, cảm xúc của cô – niềm vui, sợ hãi, giận dữ, ghê tởm và buồn bã – xung đột về cách tốt nhất để điều hướng một thành phố, nhà và trường học mới nhất.', 'yRUAzGQ3nSY', 'Inside Out, Những mảnh ghép cảm xúc, phim hoạt hình, phim hài hước', 'nhung-manh-ghep-cam-xuc', 3, 1, 0, 1, 'inside-out-1647572613346.jpg', 0, 2, '2023-06-26 14:54:18', '2023-06-27 13:09:12', '2015', 19, 'phimle', 2, 9),
(97, 'LÂU ĐÀI BAY CỦA PHÁP SƯ HOWL', 'Howl\'s Moving Castle', '120 phút', '0', 'Sophie vốn dĩ làm việc tại cửa hàng mũ do người cha quá cố để lại. Cuộc sống nơi thị trấn buồn tẻ cứ thế trôi qua trong lặng lẽ… cho đến ngày cô bỗng biến thành bà lão.', 'iwROgK94zcM', 'Howl\'s Moving Castle, Lâu đài bay của pháp sư Howl, phim hoạt hình, anime', 'lau-dai-bay-cua-phap-su-howl', 1, 1, 0, 1, 'Film-Poster-Sweden-howls-moving-castle-913370_827_1181561.jpg', 1, 2, '2023-06-26 15:02:31', '2023-06-27 13:08:56', '2004', 19, 'phimle', 2, 13),
(98, 'ÁM ẢNH KINH HOÀNG 1', 'The Conjuring (2013)', '112 phút', '1', 'Phim Ám Ảnh Kinh Hoàng đưa chúng ta về năm 1971, phim kể về câu chuyện của Ed và Lorraine Warren là 1 trong những người chuyên điều tra về các hiện tượng siêu nhiên nổi tiếng vào thế kỉ 20. Bộ phim nói về 1 gia đình bị ma ám và liên tục bị khủng bố bởi 1 bóng ma kinh dị. Gia đình này đã cầu xin sự giúp đỡ từ cặp đôi Warren. Đây là nghề của họ nên Warren nhanh chóng nhận lời giúp đỡ. Tuy nhiên họ không hề biết chính sự gật đầu này đã dẫn họ tiếp xúc với những thế lực siêu nhiên kì quái và trở thành 1 trong những vụ đáng sợ nhất mà họ từng gặp trong đời. The Conjuring khá giống với tác phẩm kinh điển The Exorcist và The Amity ville Horror cùng dàn diễn viên không “bom tấn” nhưng được tờ Variety ca ngợi “chạm đến sự đau xót và chiều sâu”. Trong trailer của The Conjuring người xem có thể hình dung câu chuyện khá ám ảnh với những sự việc kinh hoàng xảy ra trong gia đình Carolyn và Roger Parren ngay trước mắt 2 nhà điều tra. Bản thân Ed và Lorraine cũng gặp phải nguy hiểm.', 'ejMMn0t58Lc', 'ám ảnh kinh hoàng, the conjuring, phim kinh dị', 'am-anh-kinh-hoang-1', 1, 0, 0, 1, 'esFklZJ9JRLaEOp6yUZG9OzXFP960.jpg', 1, 2, '2023-06-26 15:08:07', '2023-06-27 13:08:41', '2013', 21, 'phimle', 2, 9),
(99, 'TRỐN THOÁT', 'Get Out', '104 phút', '0', 'Tâm điểm của Get Out là chàng thanh niên da đen Chris Washington (Daniel Kaluuya). Anh có cô bạn gái da trắng xinh đẹp tên Rose Armitage (Allison Williams). Sau vài tháng hẹn hò, Rose quyết định đưa bạn trai về nhà ra mắt. Chris đắn đo khi người bạn thân Rod (Lilrel Howery) can ngăn nhưng cuối cùng vẫn quyết định lên đường tới vùng ngoại ô để gặp nhà Armitage. Khác biệt về màu da làm Chris ngại ngần trước khi gặp mặt bố mẹ bạn gái. Trái với những e ngại ban đầu, anh thấy mình được chào đón với thái độ thân thiện không chỉ từ bố mẹ mà cả những người thân, bạn bè da trắng của Rose. Nhưng trong thâm tâm, chàng trai da màu vẫn cảm nhận được đằng sau những gương mặt vui vẻ này ẩn giấu một bí mật nào đó.', 'DzfpyUB60YY', 'Trốn Thoát, Get Out, phim kinh dị', 'tron-thoat', 2, 0, 0, 1, 'Phim-Get-out-hinh-anh-1-e1638616670514834.jpg', 0, 2, '2023-06-26 15:13:04', '2023-06-27 13:08:26', '2017', 21, 'phimle', 2, 9),
(100, 'VÙNG ĐẤT CÂM LẶNG', 'A Quiet Place', '90 phút', '1', 'Tách biệt khỏi phần còn lại của thế giới, một gia đình khăng khít nơm nớp lo sợ mình sẽ phát ra tiếng động thu hút những sinh vật ngoài hành tinh đáng sợ.', 'WR7cc5t7tv8', 'A Quiet Place, Vùng đất câm lặng, phim kinh dị', 'vung-dat-cam-lang', 3, 0, 0, 1, 'BHD-Star-A-Quiet-Place-poster-470x700197.jpg', 0, 2, '2023-06-26 15:17:17', '2023-06-27 13:08:08', '2018', 21, 'phimle', 2, 9),
(101, 'AI CHẾT GIƠ TAY', 'The Young Shaman', '30 phút / tập', '1', 'Nhân vật Tinh Lâm – nhân vật chính có sự am hiểu nhất định về thế giới tâm linh vì có gia đình, tổ tiên theo nghiệp trị ma bao đời nay. Nhưng Tinh Lâm chỉ có thể tiêu trừ và giải thoát cho những linh hồn chứ không thể thấy được chúng và cũng có tính cách “khùng khùng” nên gặp rất nhiều khó khăn trong sự nghiệp tổ tiên để lại cho mình. Và rồi thật may mắn khi Tinh Lâm phát hiện ra Liên Thanh – một cô hàng xóm thường gây rắc rối lại chính là người bạn đồng hành trong sự nghiệp của mình.', 'S8zj-kZPjzk', 'Ai chết giơ tay, The Young Shaman, phim kinh dị, phim hài hước', 'ai-chet-gio-tay', 3, 1, 8, 1, 'aichetgiotay-topsao-1601.jpg', 1, 1, '2023-06-26 15:25:17', '2023-06-27 14:45:08', '2018', 21, 'phimbo', 2, 8),
(102, 'BÚP BÊ MA ÁM', 'Annabelle (2014)', '99 phút', '1', 'Annabelle là câu chuyện về nguồn gốc của búp bê quỷ ám. Đi sâu vào bộ phim lần này Annabelle xuất hiện tại một gia đình vợ chồng trẻ. Món quà John tặng vợ mình nhân dịp sinh nhật và chuyển tói nhà mới chính là con búp bê Annabelle. Vào một đêm định mệnh, nhà của họ bị hai kẻ tâm thần đột nhập vào. Kể từ sau sự kiện kinh hoàng, nhiều hiện tượng kì quái bắt đầu xảy ra trong nhà và đều liên quan tới búp bê Annabelle.', 'paFgQNPGlsg', 'Phim kinh dị, Búp bê ma ám, Annabelle', 'bup-be-ma-am', 2, 0, 0, 1, 'annabelle-1647500287841.jpg', 1, 0, '2023-06-26 15:53:41', '2023-06-27 13:07:31', '2014', 21, 'phimle', 2, 9),
(103, 'SÁCH MA', 'The Babadook (2014)', '94 phút', '0', 'Amelia Vakan là một góa phụ gặp khó khăn và kiệt sức sống ở thành phố Adelaide của Úc, người đã một mình nuôi nấng cậu con trai Samuel 6 tuổi của mình. Người chồng quá cố của cô, Oskar, đã thiệt mạng trong một vụ tai nạn xe hơi xảy ra khi anh chở Amelia đến bệnh viện khi chuyển dạ. Sam bắt đầu thể hiện hành vi thất thường: anh ta trở thành một kẻ mất trí và bận tâm với một con quái vật tưởng tượng, mà anh ta đã chế tạo vũ khí để chiến đấu.', 'k5WQZzDRVtw', 'Sách Ma, The Babadook, phim kinh dị', 'sach-ma', 1, 0, 0, 1, 'The-Babadook-elleman553.jpg', 1, 1, '2023-06-26 15:58:11', '2023-06-27 13:07:13', '2014', 21, 'phimle', 2, 9),
(104, 'KỴ SỸ BÓNG ĐÊM', 'The Dark Knight (2008)', '152 phút', '0', 'The Dark Knight là phần tiếp theo của Batman Begins kể về thành phố Gotham bị đảo lộn do hàng loạt vụ giết người xảy ra mà không tìm ra hung thủ. Kẻ đứng sau tất cả âm mưu đen tối này là Joker (Heath Ledger), kẻ được các băng đảng trong thành phố thuê để trừ khử Người Dơi. Bộ 3 Người Dơi – Trung úy Gordon – Luật sư Harvey Dent vốn gắn bó với nhau chống lại các thế lực xấu nay bị chia rẽ.', 'EXeTwQWrcwY', 'Kỵ sỹ bóng đêm, The Dark Knight, phim hành động', 'ky-sy-bong-dem', 2, 0, 0, 1, '147071092877216-37af3fe7-038d-44c1-99c3-8b60f9db2573158.jpg', 1, 2, '2023-06-26 16:39:08', '2023-06-27 13:06:59', '2008', 16, 'phimle', 3, 9),
(105, 'MAX ĐIÊN: CON ĐƯỜNG TỬ THẦN', 'Mad Max: Fury Road (2015)', '120 phút', '0', 'Bối cảnh phim ở một nơi rất xa của trái đất, nơi ấy sa mạc bao phủ hầu hết bề mặt và hầu hết mọi người đều điên cuồng đấu tranh cho những nhu cầu của cuộc sống.\r\n\r\nTrong thế giới này tồn tại hai phiến quân đang chạy trốn những người được coi là có thể để khôi phục lại trật tự thế giới.\r\n\r\nTrong đó có Max, một người đàn ông của hành động và ít nói, đang tìm kiếm sự an tâm sau khi mất vợ và con của mình do hậu quả của sự hỗn loạn. Và Furiosa, một phụ nữ luôn hành động và tin rằng con đường của mình để tồn tại có thể đạt được nếu cô ấy có thể vượt sa mạc sở về quê hương yêu dấu.', 'hEJnMQG9ev8', 'Mad Max: Fury Road, con đường tử thần, phim hành động', 'max-dien-con-duong-tu-than', 3, 0, 0, 1, '3039536_Mad-Max-Furia-en-el-camino-Poster-Empeliculados707.jpg', 0, 2, '2023-06-26 16:41:39', '2023-06-27 13:06:42', '2015', 16, 'phimle', 3, 9),
(106, 'BỖNG DƯNG TRÚNG SỐ', '6/45', '113 phút', '0', 'Bỗng nhiên trúng số – 6/45, người chiến sĩ xứ sở kim chi chun woo thuận lợi đạt được tờ vé số trúng độc đắc, tuy nhiên chưa kịp hân hoan bao nhiêu thời gian thì tờ vé số lại bay sang định giới triều tiên và được một ai đó lính tên yong ho nhặt được. Và rồi nhiều điều lại càng phức tạp hơn lúc có thêm dòng người khác biết về tờ vé số trúng độc đắc này.', 'yeMf-Dva5r0', '6/45, bỗng dưng trúng số, phim hài hước', 'bong-dung-trung-so', 4, 0, 0, 1, 'bong-dung-trung-so-poster503.jpg', 1, 0, '2023-06-26 16:46:04', '2023-06-27 13:06:17', '2022', 18, 'phimle', 2, 12),
(107, 'SÁT THỦ JOHN WICK 4', 'John Wick: Chapter 4 (2023)', '169 phút', '4', 'Sát Thủ John Wick: Phần 4 là câu chuyện của John Wick (Keanu Reeves) đã khám phá ra con đường để đánh bại High Table. Nhưng trước khi có thể kiếm được tự do, Wick phải đối đầu với kẻ thù mới với những liên minh hùng mạnh trên toàn cầu và những lực lượng biến những người bạn cũ thành kẻ thù.', '1C8Kzp0VSXM', 'Sát thủ, Sát thủ John Wick, John Wick 4, phim hành động', 'sat-thu-john-wick-4', 5, 0, 0, 1, 'z4464961886980_775873a2918f767158a7006625dcdb51354.jpg', 1, 0, '2023-06-26 16:50:46', '2023-06-27 13:05:59', '2023', 9, 'phimle', 3, 9),
(108, 'THE FLASH', 'The Flash (2023)', '144 phút', '0', 'Trong phần này vào dịp hè sẽ ra mắt cho khán giả một siêu phẩm về tia chớp, chắc có lẽ ai cũng biết vị siêu anh hùng The Flash sở hữu năng lực hơn người vượt trội nhờ khả năng di chuyển nhanh như 1 tia sét đánh, thế giới sẽ buộc phải va chạm khốc liệt trước bước chạy của Flash.', 'cvn0h6cuUPQ', 'The flash, phim hành động', 'the-flash', 5, 0, 0, 1, 'The_Flash_2023_VN_poster863.jpg', 1, 0, '2023-06-26 16:55:00', '2023-06-27 13:05:43', '2023', 16, 'phimle', 3, 9),
(109, 'QUÁI VẬT VENOM', 'Venom (2018)', '112 phút', '1', 'Venom đã hé lộ thân phận nhân vật phản diện cực kỳ nguy hiểm và kinh hãi khi tung trailer chính thức khắp thế giới làm điên đảo fan hâm mộ trong thế giới của Marvel. Chàng phóng viên Eddie Brock bí mật theo dõi âm mưu xấu xa của một tổ chức và bị nhiễm phải Symbiote và trở thành quái vật Venom đầy nguy hiểm.', 'MgYoCY86Hoc', 'Quái Vật Venom, Venom, phim hành động, phim kinh dị, phim hài hước', 'quai-vat-venom', 3, 0, 0, 1, 'z4464992968323_e39cc319adb6d42a1a6d989063eec00c115.jpg', 1, 2, '2023-06-26 17:00:30', '2023-06-27 13:05:28', '2018', 21, 'phimle', 3, 9),
(110, '1990', '1990 (2021)', '130 phút', '0', 'Cùng chạm ngưỡng 30 tuổi, nhưng 3 cô nàng với 3 cá tính riêng lại có những sự lựa chọn khác nhau. Và không tránh khỏi rắc rối, họ đều gặp ‘sóng gió’ liên quan đến gia đình – tình yêu – sự nghiệp.. Nhưng trên cả tình bạn – họ chính là tri kỷ, cùng nhân ba niềm hân hoan và san sẻ khó khăn với nhau. Vậy chờ đón xem, 3 cô nàng sẽ ‘cùng nhau’ vượt qua như thế nào trong bộ phim 1990.', '0509zlM8QA8', '1990, Ninh Dương Lan Ngọc, Diễm My 9x, Nhã Phương, phim tình cảm', '1990', 4, 1, 0, 1, 'rsz_1990_-_teaser_poster_2_-_kc_21042021385.jpg', 1, 2, '2023-06-26 17:09:39', '2023-06-27 13:05:05', '2021', 17, 'phimle', 2, 8),
(111, 'SỰ PHẪN NỘ CỦA CÁC VỊ THẦN', 'Wrath Of The Titans (2012)', '100 phút', '0', 'Một thập kỷ đã trôi qua diễn ra từ thành tích quang đãng vinh trước Kraken, Perseus (Sam Worthington) - vị á thần, con trai của thần Zeus (Liam Neeson) - trở về sống thăng bình tại một làng chài. Anh và thần Io có một cậu con trai 10 tuổi tên là Helius. Tuy nhiên, Perseus không biết rằng, một cuộc tranh chấp quyền lực giữa các vị thần đang đe dọa cuộc sống thăng bình đó của anh.', 'QHSIIDezcHg', 'Wrath of The Titans, thần Zeus, sự phẫn nộ của các vị thần, phim thần thoại, phim hành động', 'su-phan-no-cua-cac-vi-than', 1, 0, 0, 1, 'su-phan-no-cua-cac-vi-than-thumb401.jpg', 0, 2, '2023-06-26 17:14:40', '2023-06-27 13:04:42', '2012', 22, 'phimle', 3, 9),
(112, 'THẦN THOẠI', 'The Myth (2005)', '100 phút', '0', 'Jack và William là các nhà khảo cổ học phát hiện ra khu lăng mộ cổ từ thời nhà Tần cách nay hơn hai thiên niên kỷ. Tại đây Jack đã gặp một cô công chúa xinh đẹp, cũng chính là cô gái mặc áo trắng luôn ám ảnh trong tâm trí anh nhưng anh không nhớ nổi đó là ai.', 'vo7dZWm-zAs', 'Thần thoại, phim thần thoại, phim cổ trang', 'than-thoai', 0, 1, 0, 1, 'MV5BN2EyZjFlZDEtZWIxMy00Yjk5LWE2ZWQtNGVmZTVkNjYxZDA1XkEyXkFqcGdeQXVyNzI1NzMxNzM@43.jpg', 0, 2, '2023-06-26 17:17:51', '2023-06-27 13:04:12', '2005', 22, 'phimle', 3, 10),
(113, 'RAYA VÀ RỒNG THẦN CUỐI CÙNG', 'Raya and the Last Dragon', '114 phút', '0', 'Raya và Rồng Thần Cuối Cùng kể về một vương quốc huyền bí có tên là Kumandra – vùng đất mà loài rồng và con người sống hòa thuận với nhau. Nhưng rồi một thế lực đen tối bỗng đe dọa bình yên nơi đây, loài rồng buộc phải hi sinh để cứu lấy loài người. 500 năm sau, thế lực ấy bỗng trỗi dậy và một lần nữa, Raya là chiến binh duy nhất mang trong mình trọng trách đi tìm Rồng Thần cuối cùng trong truyền thuyết nhằm hàn gắn lại khối ngọc đã vỡ để cứu lấy vương quốc. Thông qua cuộc hành trình, Raya nhận ra loài người cần nhiều hơn những gì họ nghĩ, đó chính là lòng tin và sự đoàn kết.', '1VIZ89FEjYI', 'Raya và Rồng Thần Cuối Cùng, Raya and the Last Dragon, dragon, phim họat hình', 'raya-va-rong-than-cuoi-cung', 4, 1, 0, 1, 'Raya866.jpg', 0, 0, '2023-06-27 13:57:37', '2023-06-27 14:13:29', '2021', 19, 'phimle', 2, 9),
(114, 'BÍ KÍP LUYỆN RỒNG', 'How to Train Your Dragon (2010)', '98 phút', '1', 'Bí Kíp Luyện Rồng lấy bối cảnh là một thế giới thần thoại của người Viking và loài rồng. Câu chuyện xoay quanh cậu bé Hiccup, sống tại đảo Berk. Khi Hiccup được tham gia vào khóa huấn luyện rồng với những cậu bé cùng trang lứa, cậu coi đây là cơ hội để chứng minh rằng mình đã trưởng thành và là một chiến binh thật sự. Cậu đã giải thoát và kết bạn với một chú rồng và đặt chú tên Toothless. Mối quan hệ này đã thay đổi hoàn toàn cuộc sống của cậu khi cậu đấu tranh để thuyết phục cả bộ tộc mình rằng việc giết rồng là không cần thiết…', 'Siqw8k05D4g', 'Bí Kíp Luyện Rồng, How to Train Your Dragon, phim hoạt hình', 'bi-kip-luyen-rong', 1, 0, 0, 1, 'z4467867.jpg', 0, 2, '2023-06-27 15:33:57', '2023-06-27 15:33:57', '2010', 19, 'phimle', 3, 9),
(115, 'NỮ HOÀNG BĂNG GIÁ', 'Frozen (2013)', '102 phút', '0', 'Frozen không chỉ giành được các giải thưởng lớn như Oscar, Quả Cầu Vàng mà còn là phim đạt doanh thu cao nhất mọi thời đại. Đến nay, Frozen đã thu về hơn 1,3 tỷ USD.\r\nPhim phát hành năm 2013, xây dựng dựa trên câu chuyện cổ tích Bà Chúa Tuyết (The Snow Queen) của nhà văn Đan Mạch - Hans Christian Andersen. Frozen là hành trình của hàng công chúa Anna gan dạ, cố gắng đi tìm chị gái Elsa. Elsa có khả năng điều khiển gió, tuyết nhưng không kiểm soát được sức mạnh của mình và sợ làm ảnh hưởng tới những người cô yêu quý nên đã bỏ đi xa.', 'TbQm5doF_Uc', 'Frozen (2013), Nữ hoàng băng giá, phim hoạt hình', 'nu-hoang-bang-gia', 3, 0, 0, 1, 'frozen-group-i20838589.jpg', 0, 1, '2023-06-27 15:45:52', '2023-06-27 15:45:52', '2013', 19, 'phimle', 3, 9),
(116, 'KẺ CẮP MẶT TRĂNG', 'Despicable Me', '97 phút', '1', 'Nhân vật tâm điểm của bộ phim là Gru, một tên tội phạm khét tiếng. Gru và đám tay chân robot tí hon chuyên đi đánh cắp những biểu tượng nổi tiếng của thế giới. Thế nhưng tiếng xấu của Gru bị suy giảm khi tên tội phạm trẻ tuổi Vector đã ăn cắp kim tự tháp của Ai Cập. Gru quyết định làm phi vụ có một không hai cho thế giới phải bái phục: ăn cắp mặt trăng. Trước tiên, Gru phải đánh cắp khẩu súng có khả năng thu nhỏ mọi vật từ quân đội. Nhưng Vector đã nẫng tay trên khẩu súng thần kỳ từ Gru. Mọi kế hoạch giành lại cây súng của Gru đều bị Vector đánh bại. Cuối cùng, Gru nghĩ ra cách dùng ba đứa trẻ của viện mồ côi xâm nhập sào huyệt của Vector. Thế nhưng ba đứa trẻ Margo, Edith, Agnes đã cảm hóa Gru bằng sự ngây thơ, hướng thiện của mình.', 'zzCZ1W_CUoI', 'Despicable Me, Kẻ cắp mặt trăng, phim hoạt hình', 'ke-cap-mat-trang', 1, 0, 0, 1, 'bRZT3dAv85TWLmQj4fhQg06W07D627.jpg', 0, 2, '2023-06-27 15:50:41', '2023-06-27 15:50:41', '2013', 19, 'phimle', 2, 9),
(117, 'KỶ BĂNG HÀ 3: KHỦNG LONG THỨC GIẤC', 'Ice Age: Dawn of the Dinosaurs', '94 phút', '3', 'Sau những sự kiện của \"Ice Age: The Meltdown\", cuộc sống bắt đầu thay đổi cho Manny và bạn bè của anh ta: Scrat vẫn đang săn lùng một quả trứng cá yêu của anh ta, trong khi tìm thấy một sự lãng mạn có thể trong một con sóc có răng có tên là Scratte. Manny và Ellie, kể từ khi trở thành một món đồ, đang mong đợi một em bé, khiến Manny lo lắng để đảm bảo rằng mọi thứ đều hoàn hảo khi bé đến. Diego đã chán ngấy với việc được đối xử như một con mèo nhà và suy ngẫm quan niệm rằng anh ta đang trở nên quá thoải mái. Sid bắt đầu mong muốn một gia đình của riêng mình, và vì vậy đánh cắp một số trứng khủng long dẫn đến Sid kết thúc trong một thế giới ngầm kỳ lạ nơi đàn anh ta phải giải cứu anh ta, trong khi né tránh khủng long và đối diện với nguy hiểm bên trái và phải, và gặp gỡ Weasel một mắt được gọi là Buck Who săn khủng long.', 'MnAi5u-k9NY', 'Ice Age: Dawn of the Dinosaurs, Ice Age, Kỷ băng hà, phim hoạt hình', 'ky-bang-ha-3-khung-long-thuc-giac', 2, 1, 0, 1, 'cXOLaxcNjNAYmEx1trZxOTKhK3Q329.jpg', 0, 2, '2023-06-27 15:55:46', '2023-06-27 15:55:46', '2009', 19, 'phimle', 2, 9),
(118, 'MINIONS', 'Minions (2015)', '90 phút', '0', 'Phần tiền truyện này xoay quanh câu chuyện về lịch sử phụng sự ác nhân của các tay sai màu vàng chuối có ngôn ngữ nhí nhéo từ “Kẻ trộm mặt trăng”.', 'eisKxhjBnZ0', 'Minions, Kẻ cắp mặt trăng, phim hoạt hình', 'minions', 2, 1, 0, 1, '77378ff26cc6707fbe5a97e331771258119.jpg', 0, 2, '2023-06-27 16:00:48', '2023-06-27 16:00:48', '2015', 19, 'phimle', 2, 9),
(119, 'ĐIỀM GỞ', 'Sinister (2012)', '110 phút', '0', 'Sinister kể về một gia đình nhà văn chuyên viết về các vấn đề bạo lực và tội phạm vừa chuyển đến một căn nhà mới, tất cả đều bình thường cho đến khi ông tìm thấy một hộp phim nằm trên gác và xem đoạn phim rất khiếp sợ liên quan đến căn nhà ông đang ở. Cả gia đình cũ sống trong căn nhà này đều bị giết một cách dã man và sau đó thì những điều kỳ lạ mang tính siêu nhiên cũng bắt đầu xảy ra từ đây', '_kbQAJR9YWQ', 'Sinister, phim kinh dị', 'diem-go', 1, 0, 0, 1, '51j4ErL23fL566.jpg', 0, 2, '2023-06-27 16:15:43', '2023-06-27 16:15:43', '2012', 21, 'phimle', 2, 9),
(120, 'NGÔI NHÀ MA', 'The Shining (1980)', '144 phút', '0', 'Jack Torrance tìm việc trông coi khách sạn Overlook, trên dãy núi Colorado và cả gia đình ông đã chuyển tới sống ở đây. Do nơi này bị đóng cửa trong suốt mùa đông, vì thế chỉ có gia đình của Jack Torrance sống ở đây trong một thời gian dài. Sau đó, một cơn bão tuyết ập xuống và khiến gia đình ông bị kẹt lại bên trong khách sạn. Danny – con trai của Torrance, một cậu bé có khả năng thần giao cách cảm và có thể nhìn thấy những việc trong quá khứ cũng như trong tương lai. Cậu bé phát hiện ra rằng rằng khách sạn này đang bị ma ám và hồn ma đó đang dần biến cha của cậu thành một kẻ hung ác', 'S014oGZiSdI', 'Ngôi nhà ma, The Shining, phim kinh dị', 'ngoi-nha-ma', 2, 1, 0, 1, 'MV5BZWFlYmY2MGEtZjVkYS00YzU4LTg0YjQtYzY1ZGE3NTA5NGQxXkEyXkFqcGdeQXVyMTQxNzMzNDI@197.jpg', 0, 2, '2023-06-27 16:19:10', '2023-06-27 16:19:10', '1980', 21, 'phimle', 2, 9),
(121, 'BUỔI THỬ GIỌNG', 'Audition (1999)', '113 phút', '0', 'Buổi Thử Giọng - Audition : Có cuộc sống khá đầy đủ và dư giả về vật chất nhưng Đạo diễn Shigeharu Aoyama lại thiếu thốn về tình cảm . Sau cái chết của vợ Shigeharu sống đơn thân nuôi con trong nhiều năm, ông quyết định đi tìm hạnh phúc cho mình bằng cách tổ chức một buổi thử giọng giả nhằm tìm kiếm diễn viên. Cuối cùng ông cũng tìm ra “ý trung nhân” là cô diễn viên múa xinh đẹp Asami Yamazaki. Nhưng ẩn sau khuôn mặt xinh đẹp là miền kí ức vỡ vụn và những hành động tàn bạo. Audition đã khai thác đời sống của người Nhật thông qua hình ảnh Đạo diễn Shigeharu Aoyama. Về mặt diễn xuất thật khó để có thể tìm ra điểm “-“ nào cho diễn xuất của bộ đôi Ryo Ishibashi và Eihi Shiina. Cảnh rùng rợn thì miễn bàn với Audition tính kinh dị đã được đẩy tới mức cực điểm.', 'EBQHp2__AVQ', 'Buổi Thử Giọng, Audition, phim kinh dị', 'buoi-thu-giong', 0, 1, 0, 1, 'Audition-JPEG-scaled496.jpg', 0, 2, '2023-06-27 16:23:07', '2023-06-27 16:23:07', '1999', 21, 'phimle', 2, 13),
(122, 'VÒNG TRÒN ĐỊNH MỆNH', 'The Ring (2002)', '115 phút', '0', 'Rachel Keller là một nhà báo điều tra một băng video có thể đã giết chết bốn thanh thiếu niên (bao gồm cả cháu gái của cô). Có một huyền thoại đô thị về băng này: người xem sẽ chết bảy ngày sau khi xem nó. Nếu huyền thoại là chính xác, Rachel sẽ phải chạy ngược thời gian để cứu con trai mình và cuộc sống của chính mình.', 'yzR2GY-ew8I', 'The Ring, Vòng tròn định mệnh, phim kinh dị', 'vong-tron-dinh-menh', 1, 0, 0, 1, '6103FRxVLiL273.jpg', 0, 2, '2023-06-27 16:26:12', '2023-06-27 16:26:12', '2002', 21, 'phimle', 2, 9),
(123, 'CÂU CHUYỆN HAI CHỊ EM', 'A Tale of Two Sisters (2003)', '115 phút', '0', 'Câu chuyện bắt đầu trong một bệnh viện tâm thần, vị bác sĩ đang nói chuyện với một cô gái trẻ có mái tóc xõa phủ ngang mặt. Ông đưa cho cô gái bức hình chụp gia đình cô, cố gắng thuyết phục cô gái kể về “ngày đó”.', '4YmCIp4qlGg', 'Câu chuyện hai chị em, A Tale of Two Sisters, phim kinh dị', 'cau-chuyen-hai-chi-em', 1, 1, 0, 1, 'l3exwhwyGE0NnHJ3lFQ7eXoBSkH853.jpg', 0, 2, '2023-06-27 16:34:11', '2023-06-27 16:34:11', '2003', 21, 'phimle', 2, 12),
(124, 'GÓC QUAY ĐẪM MÁU', 'REC (2007)', '78 phút', '1', 'Phim được bắt đầu bằng việc hai phóng viên theo chân một lính cứu hỏa để làm phóng sự về công việc gác đêm. Nhưng rồi họ bị kẹt lại tại một khu chung cư mà ở đó, người dân bị nhiễm căn bệnh dại luôn thèm khát máu tươi. Khu chung cư nhanh chóng trở thành mồ chôn sống của hai phóng viên nọ. Khán giả được theo dõi câu chuyện của họ thông qua những hình ảnh trong một chiếc camera cầm tay', 'CcW7jLYKxAQ', 'REC, góc quay đẫm máu, phim kinh dị', 'goc-quay-dam-mau', 1, 1, 0, 1, 'MV5BZTJmNTZlZWUtZTQ2Yi00YTFjLWFiNzctYzFlNmZmZGMzYTlmXkEyXkFqcGdeQXVyMjQ2MTk1OTE@220.jpg', 0, 2, '2023-06-27 16:38:10', '2023-06-27 16:38:10', '2007', 21, 'phimle', 2, 9),
(125, 'CUỘC CHIẾN THÀNH TROY', 'Troy (2004)', '196 phút', '0', 'Chiến tranh với những khát khao quyền lực và vinh quang bùng nổ. Biết bao thường dân bỏ mạng vì tham vọng của một người. Cả dân tộc lầm than, cả vương quốc bị xóa sổ chỉ vì một bóng hồng. Tác phẩm không chỉ là cuộc chiến giữa hai vương quốc mà xen vào đó là tình yêu cao đẹp giữa các nhân vật chính', 'u1fqmZuvSBk', 'Chiến tranh, phim thần thoại, Troy, cuộc chiến thành Troy', 'cuoc-chien-thanh-troy', 1, 1, 0, 1, 'Troy2004Poster230.jpg', 0, 2, '2023-06-27 17:08:20', '2023-06-27 17:08:20', '2004', 22, 'phimle', 3, 9),
(126, 'CHIẾN BINH BẤT TỬ', 'Immortals (2011)', '110 phút', '0', 'Vua Hyperion khát máu muốn tìm cây cung Epirus, vũ khí được tạo ra bởi thần chiến tranh Ares, để giải phóng các Titan và trả thù những vị thần trên đỉnh Olympus vì đã bỏ mặc vợ con mình chết. Theo luật lệ cổ xưa, các thần không được phép can thiệp vào cuộc chiến của con người. Chính vì vậy, chàng dũng sĩ trẻ tuổi Theseus đã được thần Zeus lựa chọn trở thành người lãnh đạo cuộc chiến chống lại Hyperion và đội quân tàn ác của ông ta.', 'pE3yR8bZ1pY', 'Vua Hyperio, thần Zeus, Theseus, Immortals, Chiến binh bất tử, phim thần thoại', 'chien-binh-bat-tu', 2, 1, 0, 1, '5bduzgmq_660x946-chienbinhbattu691.jpg', 0, 2, '2023-06-27 17:15:13', '2023-06-27 17:15:13', '2011', 22, 'phimle', 3, 9),
(127, 'PERCY JACKSON & KẺ CẮP TIA CHỚP', 'Percy Jackson & the Olympians: The Lightning Thief', '120 phút', '0', 'Khi tia sét của anh ta bị đánh cắp, Zeus buộc tội con trai của Poseidon Percy Jackson và đưa cho con trai của Poseidon mười bốn ngày để trả lại, nếu không anh ta sẽ bắt đầu một cuộc chiến giữa các vị thần. Trong khi đó, thiếu niên, Percy, chứng khó đọc và có ADHD đang đến thăm Bảo tàng Metropolitan of Art và bị Fury ngụy trang tấn công trong giáo viên của mình. Grover người bạn tốt nhất về mặt vật lý của anh ta cho thấy Percy là một Demigod và anh ta là người bảo vệ và giáo viên của ông Mr Brunner cho anh ta một cây bút nói với anh ta rằng đó là một vũ khí mạnh mẽ. Họ đến nhà của Percy và cùng với mẹ Sally họ lái xe đến một nửa máu trại. Tuy nhiên, Sally bị tấn công bởi một minotaur và biến mất trước khi Percy có thể giúp đỡ cô. Trong trại, Percy kết bạn với Annabeth tuyệt đẹp; Khi chúng bị Hades tấn công, những người muốn ánh sáng cho chính mình, Percy phát hiện ra rằng mẹ anh đang ở trong thế giới ngầm với Hades. Percy quyết định đi du lịch trong một nhiệm vụ nguy hiểm để lấy lại tia sét và cứu mẹ mình. Grover và Annabeth tham gia cùng anh ta và Luke đưa ra một lá chắn mạnh mẽ của riêng mình để bảo vệ Percy. Họ sẽ có thể thành công?', 'R86InkfdboA', 'Percy Jackson, thần Zeus, Percy Jackson & Kẻ Cắp Tia Chớp, Percy Jackson & the Olympians: The Lightning Thief, phim thần thoại', 'percy-jackson-ke-cap-tia-chop', 3, 1, 0, 1, 'MV5BMTQ5NDlmZWUtMjIyMC00NzQ3LTg3OWYtMzRkY2FiNzQ0Njc4XkEyXkFqcGdeQXVyNDQ2MTMzODA@131.jpg', 0, 2, '2023-06-27 17:19:31', '2023-06-27 17:19:31', '2010', 22, 'phimle', 3, 9),
(128, 'HERCULES', 'Hercules (2014)', '100 phút', '0', 'Hercules bị ám ảnh bởi một tội lỗi đã gây ra trong quá khứ, Hercules giờ đây trở thành một “tay lính đánh thuê” và cùng với năm bạn đồng hành trung thành, anh phiêu lưu khắp Hy Lạp, bán sức mạnh của mình để đổi lấy vàng và dùng danh tiếng lẫy lừng khiến kẻ thù khiếp sợ. Nhưng khi vị vua nhân từ của xứ Thrace và cháu gái ông nhờ đến sự giúp đỡ của Hercules để đánh bại một tên chúa tể tàn bạo khát máu, anh nhận ra rằng một khi thực thi công lý và giành lấy vinh quang, anh sẽ trở lại thành người anh hùng năm xưa, trở lại thành Hercules trong thần thoại.', 'OwlynHlZEc4', 'Hercules, Phim thần thoại Hy Lạp, Phim thần thoại, Dwayne Johnson', 'hercules', 3, 0, 0, 1, 'MV5BMTQ4ODA5MTA4OF5BMl5BanBnXkFtZTgwNjMyODM5MTE@518.jpg', 0, 2, '2023-06-27 17:22:57', '2023-06-27 17:22:57', '2014', 22, 'phimle', 3, 9),
(129, '300 CHIẾN BINH: ĐẾ CHẾ TRỖI DẬY', '300: Rise of an Empire (2014)', '102 phút', '0', 'Sau chiến thắng trước 300 của Leonidas, Quân đội Ba Tư theo lệnh của Xerxes diễu hành đối với các quốc gia thành phố Hy Lạp lớn. Thành phố Dân chủ Athens, đầu tiên trên con đường của Quân đội Xerxes, dựa trên sức mạnh của nó trên hạm đội của mình, được dẫn dắt bởi Đô đốc Themistocles. Themistocles buộc phải có một liên minh không muốn với đối thủ truyền thống của Athens, Sparta colaorchic có thể nằm với đội quân bộ binh cấp trên. Nhưng Xerxes vẫn ngự trị tối cao về số lượng trên biển và đất.', '2zqy21Z29ps', '300: Rise of an Empire, Đế chế trỗi dậy, phim thần thoại', '300-chien-binh-de-che-troi-day', 2, 0, 0, 1, 'poster-300-rise-of-an-empire05177.jpg', 0, 2, '2023-06-27 17:26:38', '2023-06-27 17:26:38', '2014', 22, 'phimle', 3, 9),
(130, 'MẬT DANH K2', 'The K2 (2016)', '60 phút / tập', '0', 'Mật Danh K2 kể về Ji Chang Wook sẽ vào vai một vệ sĩ có nhiệm vụ bảo bệ bí mật. Thế nhưng anh lại bị đất nước và đồng nghiệp bỏ rơi, anh đã lợi dụng cô con gái bí mật của tổng thống để trả thù lại những người đã phản bội anh. Thế nhưng liệu có đúng hay không đối với cô chỉ có thuần túy \"sự lợi dụng\" hay sẽ còn tồn tại thứ tình cảm nào khác nữa?', 'fC9vxwFkuVo', 'Mật Danh K2, phim hành động', 'mat-danh-k2', 2, 0, 16, 1, 'The_K2_poster226.jpg', 1, 2, '2023-06-28 02:17:46', '2023-06-28 02:17:46', '2016', 16, 'phimbo', 3, 12),
(131, 'YÊU EM TỪ CÁI NHÌN ĐẦU TIÊN', 'Love 020', '45 phút / tập', '0', 'Bộ phim bắt đầu từ một câu chuyện tình yêu trên mạng. Sau khi “ly hôn” (trong trò chơi) với Chân Thủy Vô Hương – một cao thủ của game Thiện Nữ U Hồn, Bối Vy Vy – hoa khôi khoa Công nghệ thông tin trường Đại học nổi tiếng A với nickname là Lô Vĩ Vy Vy đã “tái hôn” với Đại thần Nhất Tiếu Nại Hà – đệ nhất cao thủ trong game. Không ngờ khi hai người quyết định gặp mặt nhau ngoài đời, đệ nhất cao thủ Nhất Tiếu Nại Hà lại là Tiêu Nại – chàng trai đẳng cấp cao nhất của trường đại học A mà biết bao cô gái ngưỡng mộ yêu thầm. Từ đó Vy Vy và Tiêu Nại bắt đầu một chuyện tình ngoài đời, không chỉ là cuộc “hôn nhân ảo trong game”. Từ khi quen biết đến khi yêu nhau, chuyện tình cảm của hai người không hề có thăng trầm sóng gió, chỉ tích lũy lại từng chút từng chút một, nhưng thấm sâu vào tận đáy lòng.', 'NJMMHzL5jZA', 'Yêu em từ cái nhìn đầu tiên, Just One Slight Smile is Very Alluring, phim bộ, phim tình cảm', 'yeu-em-tu-cai-nhin-dau-tien', 3, 1, 30, 1, 'z6c64zmy_vertical-thumbnail-yeuemtucainhindautien462.jpg', 1, 0, '2023-06-28 02:27:39', '2023-06-28 02:27:39', '2016', 17, 'phimbo', 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(432, 112, 19),
(433, 112, 22),
(434, 112, 24),
(435, 112, 30),
(436, 112, 34),
(437, 111, 25),
(438, 111, 32),
(439, 111, 34),
(440, 110, 19),
(441, 110, 26),
(442, 110, 29),
(443, 109, 19),
(444, 109, 26),
(445, 109, 27),
(446, 109, 32),
(447, 108, 23),
(448, 108, 25),
(449, 108, 32),
(450, 107, 25),
(451, 107, 32),
(452, 106, 26),
(453, 105, 25),
(454, 105, 32),
(455, 104, 25),
(456, 104, 32),
(457, 103, 27),
(458, 102, 27),
(463, 100, 27),
(464, 99, 25),
(465, 99, 27),
(466, 98, 27),
(467, 97, 19),
(468, 97, 25),
(469, 97, 28),
(470, 96, 25),
(471, 96, 26),
(472, 96, 28),
(473, 95, 25),
(474, 95, 26),
(475, 95, 28),
(476, 94, 25),
(477, 94, 28),
(478, 93, 19),
(479, 93, 28),
(480, 93, 29),
(481, 92, 25),
(482, 92, 28),
(483, 91, 25),
(484, 91, 28),
(485, 90, 23),
(486, 90, 25),
(487, 90, 32),
(488, 89, 32),
(489, 88, 19),
(490, 88, 29),
(491, 88, 32),
(492, 87, 23),
(493, 87, 25),
(494, 87, 32),
(495, 86, 23),
(496, 86, 25),
(497, 86, 32),
(498, 85, 23),
(499, 85, 25),
(500, 85, 32),
(501, 84, 23),
(502, 84, 25),
(503, 84, 32),
(504, 83, 23),
(505, 83, 25),
(506, 83, 32),
(507, 82, 23),
(508, 82, 25),
(509, 82, 32),
(510, 81, 23),
(511, 81, 25),
(512, 81, 32),
(513, 80, 23),
(514, 80, 25),
(515, 80, 32),
(516, 79, 26),
(517, 79, 28),
(518, 78, 26),
(519, 78, 28),
(520, 78, 29),
(521, 77, 28),
(522, 76, 29),
(523, 76, 30),
(524, 76, 32),
(525, 75, 23),
(526, 75, 25),
(527, 75, 32),
(528, 75, 34),
(529, 74, 25),
(530, 74, 27),
(531, 74, 32),
(542, 113, 19),
(543, 113, 25),
(544, 113, 28),
(545, 101, 23),
(546, 101, 26),
(547, 101, 27),
(548, 101, 29),
(549, 114, 25),
(550, 114, 28),
(551, 114, 34),
(552, 115, 25),
(553, 115, 28),
(554, 115, 34),
(555, 116, 25),
(556, 116, 26),
(557, 116, 28),
(558, 116, 29),
(559, 117, 23),
(560, 117, 25),
(561, 117, 26),
(562, 117, 28),
(563, 118, 25),
(564, 118, 26),
(565, 118, 28),
(566, 118, 29),
(567, 119, 27),
(568, 119, 29),
(569, 120, 27),
(570, 120, 29),
(571, 121, 27),
(572, 122, 27),
(573, 122, 29),
(574, 123, 19),
(575, 123, 27),
(576, 123, 29),
(577, 124, 27),
(578, 125, 25),
(579, 125, 32),
(580, 125, 34),
(581, 126, 24),
(582, 126, 25),
(583, 126, 34),
(584, 127, 25),
(585, 127, 34),
(586, 128, 32),
(587, 128, 34),
(588, 129, 22),
(589, 129, 32),
(590, 129, 34),
(591, 130, 19),
(592, 130, 32),
(593, 131, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quality` int(11) NOT NULL DEFAULT 0,
  `hotMovie` int(11) NOT NULL DEFAULT 0,
  `chat` int(11) NOT NULL DEFAULT 0,
  `bookmark` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `quality`, `hotMovie`, `chat`, `bookmark`) VALUES
(1, 'FREE', 0, 0, 0, 0, 0),
(2, 'VIP', 79000, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('namicomcor@gmail.com', '0yXhgBj9I5q2rmppDG6y9dnli6ltGavU7YqkjCuXdKx0TsjMKyLbFFpTgYLEZhNp', '2023-07-06 16:54:32'),
('namicomcor@gmail.com', 'DXQfaz5IEAAQota4jaCQEGbJSvIKPJAeSP4JpXjMCasmEN3CFJydJYiYJ53HBCM2', '2023-07-06 17:02:43'),
('namicomcor@gmail.com', 'J8HkUcfBuGu4AmvAQ48sGG1hQF1YxLKlwCes8T7JqAL4LYXrlEHYWbxYj9Epd9FF', '2023-07-06 17:04:21'),
('namicomcor@gmail.com', 'mVRiXuAuO9iSvpsFZpOD8bEZ6AWmjQhKsxfUv6iKJX5fMY8uNaD4EiXyJH5laU07', '2023-07-06 17:07:24'),
('hathimyan1308@gmail.com', '8sCJxymAuusxPe2VvhqlTfkKFMsNBF9oRdPrsU3Qc3AMi1JruvDju1idLXN1jQwR', '2023-07-06 17:17:22'),
('hathimyan1308@gmail.com', 'KC4qIDQP8TQkoFJVOrbSBsY7UuozSh3A9UDMYWqB1CDzijvDTTtqulgQdHIlLgcc', '2023-07-06 17:28:08'),
('hathimyan1308@gmail.com', 'B1NFejLJPoPHw44TpC6zow8FXXkhcv3RpxusgcvyVl9yFtMHAmQ8hmjnYREnOJfu', '2023-07-06 17:29:37'),
('hathimyan1308@gmail.com', 'crDV0s7yXwibuRCSyfcGuSSkBvq8kRwxTVvwX9LAgot0fHmpG1rZo6N2OZbr2we1', '2023-07-06 17:39:47'),
('hathimyan1308@gmail.com', '1kLAP2sYhdjJWC2OLkoeZoF8vghasouKHyA6a5MX4r5oV42A2TV04s153TXk2Gr6', '2023-07-06 17:45:01'),
('hathimyan1308@gmail.com', 'RsIvUKuf4IVG6Vs01mJ7c3TpfaEdUmiAipA7lzXlE29j39DvhQ7tbQljkQgYUGPv', '2023-07-06 18:06:17'),
('hathimyan1308@gmail.com', 'yheUM05LGCRACFspGKfRl4SHxRRhBmA9AbRmqGr4L4IkYJ8mg3foyTs0YGtpf4uf', '2023-07-06 18:07:11'),
('hathimyan1308@gmail.com', 'IVgBfAlvlkcwLxS3MoeFqq1tG4AgVbexMlFE1jB3bmJcjcjIM6fvsFguXDciypeG', '2023-07-06 18:07:29'),
('hathimyan1308@gmail.com', 'VNiEMAX4B2CQefVttXk4ue7gyx0WYfmL1L0I9TwJzO92GFS1Lt9CZkmMn24hAaNL', '2023-07-06 18:08:22'),
('hathimyan1308@gmail.com', 'gnlou5MQpnERe3XK3z5FxF9Sj2zBZtBRoHqQ39SHIZPRwcfXMp1oWhlKrPmeCW2v', '2023-07-06 18:08:41'),
('hathimyan1308@gmail.com', 'NKYZo3sEspYPXo66hc35JKqp8Wrt3zEnLQWwlxizuqVAjcAwyfzwwO7ogGPTbC3S', '2023-07-06 18:09:04'),
('hathimyan1308@gmail.com', 'xM3KZxj5Ip1J4fZWKj9OuPOXolqWXUioOZ2SwhZB1mWw2tcbVA0EURILqeRGZbdW', '2023-07-06 18:09:51'),
('hathimyan1308@gmail.com', 'MvtGvlNzxyY9FmFrOEArF24xVPtSHy6eEOiZoyZFW1TZpqxRzdmUHPd2s322x5cD', '2023-07-06 18:11:43'),
('julia@gmail.com', '$2y$10$SNB22ic1OYEFHVIIjgrJsuDmzXL1lPBRkx89HvC3ewmlyffkpdYOi', '2023-07-12 08:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Đang đổ dữ liệu cho bảng `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-06-28 21:48:52', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"vi\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(2, 5, 130, '127.0.0.1'),
(3, 2, 131, '127.0.0.1'),
(4, 4, 89, '127.0.0.1'),
(5, 3, 108, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social`
--

CREATE TABLE `social` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` text NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `role` int(5) NOT NULL DEFAULT 2,
  `isVip` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `updated_at`, `remember_token`, `created_at`, `id`, `role`, `isVip`, `status`) VALUES
('Anna', 'anna@gmail.com', '$2y$10$Tv0mB2udcZihaEKAuuz6iOOq/Qt5SlRGT.01w4OdOe3LHfs/AQUWK', '2023-07-07 22:14:24', '', '2023-07-07 22:14:01', 13, 2, 1, 1),
('Hany', 'hany@gmail.com', '$2y$10$KsTqiutiSlG6412mFC.l/.SZLLKau0iI77aIjA0OgZjZg./kHQtRe', '2023-07-08 00:53:44', '', '2023-07-08 00:53:44', 14, 1, 0, 1),
('Robert', 'robert@yahoo.com', '$2y$10$Szx6d3Ecgr85BL6KwWEJhOIkz34WIsARUjjGCSrhUZWuG61z2HLIa', '2023-07-11 11:26:12', 'tO1GiUgmGn2Mz3G1mc7VIe5Akxi7mKonCXXNtlhIR5DHJdUpvcyU1s5so9wU', '2023-07-08 03:54:53', 16, 1, 1, 1),
('Donna', 'donna@gmail.com', '$2y$10$tbFHwx.ucE4.zb7g7dfFIuKHhXXZRVyOBykg97kHtjpUCPgCDeuny', '2023-07-08 03:55:40', '', '2023-07-08 03:55:40', 17, 2, 0, 1),
('Tuan', 'tuan@gmail.com', '$2y$10$pWc.D..D/wB7YbFNv4PbD.Kmdbh8.sHrTolLeqqbSI09Y2lKX3lvW', '2023-07-10 04:12:56', '', '2023-07-10 04:12:56', 18, 2, 1, 1),
('Helen', 'helen@gmail.com', '$2y$10$ysJSoVLNUnk8WeH8hkCMfu8vVwCLQrydnjLPdGNbfYNtpdw9c/64y', '2023-07-11 12:51:18', 'bhbsySujWNqUK6EYfdyWO7jKXhXjUog59v3oZC6spEFF2PfmTpXpcXwQFOSo', '2023-07-11 12:51:18', 19, 2, 0, 1),
('Julia', 'julia@gmail.com', '$2y$10$//YSILn4EaODNvYk3ifv/OKPKWd1KBn55u9isHiQhO30OsCVE1BiK', '2023-07-13 14:06:41', 'hBk2eYOW6GHXMPSjoA17duZD4l0nJUt3SERyv7VXA3KYQ8gdm2sUHvWoIPlC', '2023-07-11 12:52:42', 20, 2, 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id_2` (`user_id`,`movie_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`genre_id`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Chỉ mục cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Chỉ mục cho bảng `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Chỉ mục cho bảng `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Chỉ mục cho bảng `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Chỉ mục cho bảng `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Chỉ mục cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Chỉ mục cho bảng `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Chỉ mục cho bảng `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Chỉ mục cho bảng `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Chỉ mục cho bảng `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;

--
-- AUTO_INCREMENT cho bảng `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `social`
--
ALTER TABLE `social`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
