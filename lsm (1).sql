-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 11:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `idbook` int(11) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `book_description` text NOT NULL,
  `book_image` varchar(150) NOT NULL,
  `book_link` varchar(150) NOT NULL,
  `date_created_book` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`idbook`, `book_title`, `book_description`, `book_image`, `book_link`, `date_created_book`) VALUES
(4, 'BUKU PELAJARAN AGAMA ISLAM 2', 'Tauhid merupakan pelajaran agama Islam pertama dan utama. Inilah yang dilakukan oleh Nabi Muhammad Saw. begitu diutus menjadi nabi dan rasul, dan ini pula yang seharusnya kita miliki dan didik pertama kali kepada anak-anak kita. Kita mengenal dan mengenalkan rukun iman, kita jaga dan rawat agar keimanan tetap bersemayam kuat dalam hati kita dan anak-anak kita. Hati yang kosong dari iman ibarat rumah tak berpondasi atau pohon tak berakar. Pun demikian hati yang diisi dengan keimanan yang keliru, bagaikan pohon dengan akar yang sakit atau rumah dengan pondasi seadanya. Keduanya tidak akan menolong dan memberi manfaat. Melalui buku ini Buya Hamka mengajarkan bagian terpenting dari ajaran agama Islam: Iman. Dalam bingkai wahyu dan akal, rukun iman diuraikan dengan jelas dan mudah dipahami.', 'PAI2_dpn-600x933.jpg', 'book1.pdf', 1664777530),
(7, 'Pelajaran Agama Islam: Hamka Berbicara tentang Rukun Iman', 'Rukun iman menjadi bagian penting dan mendasar dalam kehidupan seorang Muslim. Pengetahuan menyeluruh haruslah dipahami dengan saksama dan tak boleh ada satu pun rukun yang hilang ataupun timpang pengertiannya. Setelah pemahaman tentang rukun iman didapat secara menyeluruh, pupuklah iman agar senantiasa iman itu tidak goyah. Rukun iman juga sangatlah lengkap bila diiringi dengan amal saleh supaya Allah SWT senantiasa meridhai kehadiran kita di dunia dan menjadi bekal untuk kehidupan di akhirat kelak. Pelajaran Agama Islam: Hamka Berbicara tentang Rukun Iman adalah penjelasan rukun iman dalam sudut pandang Hamka tentang Allah, malaikat-Nya, kitab-kitab-Nya, para rasul-Nya, hari akhirat, serta qadha dan qadar. Penjelasan ini akan menambah khazanah pemahaman tentang rukun iman serta memberikan stimulus untuk lebih meningkatkan ketakwaan kepada Allah SWT', '111461_f.jpg', 'book2.pdf', 1664779027),
(8, 'Sosiologi Agama', 'Buku pengantar mata kuliah menempati posisi yang amat penting bagi mahasiswa, la ibarat pintu gerbang bagi pengembangan disiplin ilmu tertentu. Seorang mahasiswa sangat amat jarang menguasai suatu disiplin ilmu tanpa membaca buku-buku teks dasar ilmu tersebut. Itulah kenapa suatu buku pengantar (daras) perlu dihadirkan dan sangat disarankan untuk dibaca oleh mahasiswa atau pelajar pada umumnya.\r\n\r\nMisalnya, buku yang ada di tangan pembaca ini. Buku teks Sosiologi Agama dalam bahasa Indonesia, hingga saat ini masih sulit diakses oleh mahasiswa. Inisiatif penulisnya untuk menulis buku teks semacam ini patut diapresiasi.\r\n\r\nDari pengantar dasar tersebut, yang umumnya berisi deskripsi singkat dan tekstual, mahasiswa dapat melacak literatur-literatur terkait tentang suatu topik bahasan, kemudian mengembangkannya dalam ruang-ruang eksplorasi lainnya.', '112542_f.jpg', 'book21.pdf', 1665028127),
(9, 'Islam Indonesia', 'Islam Indonesia: Dialektika Agama, Budaya, dan Gender adalah buku keenam dalam seri PIES {Partnership in Islamic Educatlon Scheme). Buku ini menyajikan penelitian mutakhir\r\ntentang beragam aspek Islam di Indonesia. Rangkaian penelitian yang dilakukan terkait erat dengan masalah- masalah yang sangat penting bagi Islam Indonesia\r\nkontemporer, baik itu soal hukum Islam, identitas, budaya, dan pernikahan.\r\n\r\nKualitas penelitian yang disajikan dalam buku ini menjadi bukti sahih atas ketekunan dan kerja keras para penulisnya, sehingga memberikan dampak tidak hanya bagi program, tetapi juga kemungkinan pengembangan akademik serta studi lebih luas di negara lain dan dalam lingkungan universitas yang berbeda. Kami senang untuk merekomendasikan buku ini kepada Anda dan sangat yakin bahwa siapa pun yang membaca bab-bab dalam buku ini akan mendapatkan wawasan baru dan berharga tentang Islam Indonesia.', 'aaaabbb.jpg', 'book22.pdf', 1665029378);

-- --------------------------------------------------------

--
-- Table structure for table `confrim_ormas`
--

CREATE TABLE `confrim_ormas` (
  `idconfrim_ormas` int(11) NOT NULL,
  `id_registrasi_ormas` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status_confrim_ormas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confrim_ormas`
--

INSERT INTO `confrim_ormas` (`idconfrim_ormas`, `id_registrasi_ormas`, `id_admin`, `status_confrim_ormas`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `holy_book`
--

CREATE TABLE `holy_book` (
  `idholy_book` int(11) NOT NULL,
  `holy_book_title` varchar(200) NOT NULL,
  `holy_book_description` text NOT NULL,
  `holy_book_image` varchar(150) NOT NULL,
  `holy_book_link` varchar(150) NOT NULL,
  `date_created_holy_book` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holy_book`
--

INSERT INTO `holy_book` (`idholy_book`, `holy_book_title`, `holy_book_description`, `holy_book_image`, `holy_book_link`, `date_created_holy_book`) VALUES
(5, 'Buku 1233', 'sddssds', '111461_f.jpg', 'book2.pdf', 1664870919),
(6, 'BUKU AL-UMM #8: Kitab Induk Fiqih Islam', 'Tidaklah berlebihan bila Imam Syafi’i menamai kitabnya Al-‘Um, yang berarti kitab Induk. Persoalan-persoalan fiqih keseharian mulai dari ibadah, munakahah, muamalah, dan siyasah, diuraikan detail dengan dalil-dalil yang bersumber dari Al-Qur’an, As-Sunnah, Ijma’, dan Qiyas, dalam kitab yang menjadi rujukan utama ahlu sunnah wal jama’ah yang bermazhab Syafi’iyah ini. Bukan hanya itu, ulama-ulama sesudahnya pun menempatkan kitab ini sebagai rujukan utama dalam mengembangkan fatwa-fatwa fikih kontemporer.', 'al-umm_8_dpn-scaled.jpg', 'book21.pdf', 1665127611),
(7, 'BUKU AL-UMM #4: Kitab Induk Fiqih Islam', 'Tidaklah berlebihan bila Imam Syafi’i menamai kitabnya Al-‘Um, yang berarti kitab Induk. Persoalan-persoalan fiqih keseharian mulai dari ibadah, munakahah, muamalah, dan siyasah, diuraikan detail dengan dalil-dalil yang bersumber dari Al-Qur’an, As-Sunnah, Ijma’, dan Qiyas, dalam kitab yang menjadi rujukan utama ahlu sunnah wal jama’ah yang bermazhab Syafi’iyah ini. Bukan hanya itu, ulama-ulama sesudahnya pun menempatkan kitab ini sebagai rujukan utama dalam mengembangkan fatwa-fatwa fikih kontemporer.', 'Al-umm4_dpn.jpg', 'book22.pdf', 1665127688),
(8, 'BUKU AL-UMM #3: KITAB INDUK FIQIH ISLAM', 'Tidaklah berlebihan bila Imam Syafi’i menamai kitabnya Al-‘Um, yang berarti kitab Induk. Persoalan-persoalan fiqih keseharian mulai dari ibadah, munakahah, muamalah, dan siyasah, diuraikan detail dengan dalil-dalil yang bersumber dari Al-Qur’an, As-Sunnah, Ijma’, dan Qiyas, dalam kitab yang menjadi rujukan utama ahlu sunnah wal jama’ah yang bermazhab Syafi’iyah ini. Bukan hanya itu, ulama-ulama sesudahnya pun menempatkan kitab ini sebagai rujukan utama dalam mengembangkan fatwa-fatwa fikih kontemporer.', 'al-umm-3.jpg', 'book23.pdf', 1665127784);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_description` text NOT NULL,
  `news_image` varchar(150) NOT NULL,
  `news_link` varchar(150) NOT NULL,
  `date_created_news` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idnews`, `news_title`, `news_description`, `news_image`, `news_link`, `date_created_news`) VALUES
(1, 'Jokowi: RI Harus Kompak agar Bisa Hadapi Krisis Dunia yang Sangat Berat', '&quot;Saat ini situasi dunia sedang menghadapi tantangan yang sangat berat, sangat berat. Setelah pandemi COVID-19 mereda, dunia saat ini diterpa krisis pangan, krisis energi, dan krisis finansial. Perang Rusia-Ukraina juga semakin memperparah keadaan,&quot; kata Jokowi dalam amanatnya di upacara HUT ke-77 TNI di Istana Kepresidenan, Jakarta, Rabu (5/20/2022).', 'presiden-joko-widodo-1_169.jpeg', 'https://news.detik.com/berita/d-6329853/jokowi-ri-harus-kompak-agar-bisa-hadapi-krisis-dunia-yang-sangat-berat', 1664952638),
(3, 'Nadiem Tinjau Lokasi Tembok Roboh di MTsN 19 Jakarta Selatan', 'Jakarta - Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi (Mendikbudristek) Nadiem Makarim meninjau lokasi tembok roboh di Madrasah Tsanawiyah Negeri (MTsN) 19 di Pondok Labu, Cilandak, Jakarta Selatan. Nadiem melihat kondisi terkini sekolah setelah tembok roboh menewaskan tiga siswa.', 'menteri-kebudayaan-riset-dan-teknologi-mendikbudristek-nadiem-makarim_169.jpeg', 'https://news.detik.com/berita/d-6334842/nadiem-tinjau-lokasi-tembok-roboh-di-mtsn-19-jakarta-selatan', 1665128863),
(4, 'RI Tolak Usul AS soal Debat Isu Uighur di PBB, Kemlu: Cegah Politisasi', 'Jakarta - Indonesia menolak usulan penyelenggaraan debat isu Uighur di wilayah Xinjiang, China, di Dewan Hak Asasi Manusia (HAM) PBB yang dibawa Amerika Serikat (AS) dan sekutu. Kementerian Luar Negeri Indonesia (Kemlu) mengungkapkan alasan penolakan ini.', '6a3f6aaa-8c3e-404d-9f9d-0b03a2564840_169.jpeg', 'https://news.detik.com/berita/d-6334827/ri-tolak-usul-as-soal-debat-isu-uighur-di-pbb-kemlu-cegah-politisasi', 1665129056),
(5, 'BPJS Ketenagakerjaan Puji Polda Jatim Tangkap Pelaku Klaim Fiktif  Baca artikel detiknews', 'Jakarta - BPJS Ketenagakerjaan (BPJAMSOSTEK) mengapresiasi gerak cepat tim Kriminal Khusus (Krimsus) Kepolisian Daerah (Polda) Jawa Timur yang berhasil menangkap dua orang pelaku klaim fiktif manfaat Jaminan Hari Tua (JHT) dan Jaminan Kematian (JKM). Penangkapan ini berawal dari laporan terkait dugaan manipulasi data kependudukan dan pemalsuan dokumen persyaratan klaim JHT dan JKM.', 'ilustrasi-bpjamsostekbpjs-ketenagakerjaan.jpeg', 'https://news.detik.com/berita/d-6334695/bpjs-ketenagakerjaan-puji-polda-jatim-tangkap-pelaku-klaim-fiktif', 1665129134);

-- --------------------------------------------------------

--
-- Table structure for table `ormas`
--

CREATE TABLE `ormas` (
  `idormas` int(11) NOT NULL,
  `ormas_name` varchar(200) NOT NULL,
  `ormas_contact` varchar(50) NOT NULL,
  `ormas_address` text NOT NULL,
  `ormas_latitude` varchar(30) NOT NULL,
  `ormas_longitude` varchar(30) NOT NULL,
  `ormas_document1` varchar(200) NOT NULL,
  `ormas_document2` varchar(200) NOT NULL,
  `idktp_ormas` int(11) NOT NULL,
  `ormas_document3` varchar(200) NOT NULL,
  `ormas_document4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ormas`
--

INSERT INTO `ormas` (`idormas`, `ormas_name`, `ormas_contact`, `ormas_address`, `ormas_latitude`, `ormas_longitude`, `ormas_document1`, `ormas_document2`, `idktp_ormas`, `ormas_document3`, `ormas_document4`) VALUES
(1, 'Ormas A', '083229918374', 'Lagoa Terusan Gang', 'a', 'b', 'book1.pdf', 'book2.pdf', 0, '', ''),
(2, 'Ormas AB', '0832299183744', 'ASSAAS', '2332', '233232', 'book2.pdf', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_ormas`
--

CREATE TABLE `registrasi_ormas` (
  `idregistrasi_ormas` int(11) NOT NULL,
  `id_ormas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `date_created_ormas` double NOT NULL,
  `status_ormas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi_ormas`
--

INSERT INTO `registrasi_ormas` (`idregistrasi_ormas`, `id_ormas`, `id_user`, `id_provinsi`, `id_kabupaten`, `date_created_ormas`, `status_ormas`) VALUES
(1, 1, 69, 31, 3175, 1665631575, 0),
(2, 2, 69, 31, 3175, 1665677491, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `idsetting` int(11) NOT NULL,
  `cutoffpayroll` int(11) NOT NULL,
  `thr_religion` varchar(11) NOT NULL,
  `thr_date` int(11) NOT NULL,
  `delete_button` varchar(10) NOT NULL,
  `create_name` varchar(100) NOT NULL,
  `position1` varchar(100) NOT NULL,
  `approved1` varchar(100) NOT NULL,
  `position2` varchar(100) NOT NULL,
  `approved2` varchar(100) NOT NULL,
  `position3` varchar(100) NOT NULL,
  `approved3` varchar(100) NOT NULL,
  `position4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`idsetting`, `cutoffpayroll`, `thr_religion`, `thr_date`, `delete_button`, `create_name`, `position1`, `approved1`, `position2`, `approved2`, `position3`, `approved3`, `position4`) VALUES
(1, 1, 'Christmas', 1671922800, 'Active', 'Yuni Pratiwi', 'Crewing Executive', 'Geordhy Willem', 'HC Ast Manager', 'Trigunawan Jayawardana', 'PJS HC Manager', 'Irwanda Griya Bhakti', 'Oprational Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `position` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `id_provinsi`, `id_kabupaten`, `position`, `address`, `telephone`) VALUES
(8, 'Yusuf Abdul Rahman', 'yusufarr6@gmail.com', '15663077791091.jpeg', '$2y$10$EBwSu0P2oKwKS7VR9oHo2uZhEIZ5/rEZNe8pTGNty5jcUKLtMUzx.', 1, 1, 1582570674, 0, 0, '', '', ''),
(72, 'Sub Admin', 'subadmin@gmail.com', 'default.jpg', '$2y$10$nfQstxrmv1SPmqXMmh405elB/xjVEmu.OcJIcL8ZvxGPT3Gg.h7Zi', 3, 0, 1665732117, 31, 3175, 'Sub Admin', 'A', '082119938493'),
(73, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$YbOG2M39lh1XPfrg5e7g9uJAeY30WEETKcbuAivAIv5VSFFS/Xb/2', 2, 0, 1665732234, 31, 0, 'Admin', 'bbb', '082993304932'),
(74, 'Super Admin', 'superadmin@gmail.com', 'default.jpg', '$2y$10$ZrWKDTFw6dA1vs9MBHCq4.OwWKdulkRMmEQxwhVkvsS9yD5k6wNCO', 1, 0, 1665732269, 0, 0, 'A', 'aaaa', '23233234'),
(75, 'user A', 'user@gmail.com', 'default.jpg', '$2y$10$UCNbrfDYt2RwUI3.y20XeuKWM/GtjhvHIEe2DlxYDBZOyDN5I/Uyq', 4, 1, 1665732342, 31, 3175, '', 'aaaaa', '082992203923');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 4, 2),
(11, 2, 4),
(13, 3, 2),
(21, 3, 4),
(22, 2, 3),
(27, 2, 2),
(32, 1, 2),
(35, 3, 6),
(36, 4, 6),
(37, 5, 6),
(38, 5, 2),
(39, 6, 6),
(41, 7, 2),
(42, 7, 6),
(43, 6, 2),
(47, 1, 9),
(48, 1, 10),
(49, 1, 11),
(51, 3, 10),
(52, 3, 11),
(54, 4, 11),
(56, 2, 10),
(57, 2, 11),
(58, 2, 1),
(59, 4, 10),
(60, 3, 1),
(62, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(5, 'Menu'),
(9, 'Information'),
(10, 'Request');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Sub Admin'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Branda', 'main/index', 'fa fa-fw fa-home', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editProfile', 'fas fa-fw fa-user-edit', 1),
(4, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 5, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 9, 'Book', 'information/index', 'fa fa-fw fa-book', 1),
(10, 7, 'test', 'test', '1', 1),
(12, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(13, 6, 'Ship', 'po', 'fas fa-fw fa-ship', 1),
(14, 9, 'Holy Book', 'information/holybook', 'fas fa-fw fa-book-open', 1),
(15, 10, 'Ormas', 'request', 'fa fa-fw fa-users', 1),
(17, 10, 'House Of Worship', 'request/worship', 'fas fa-fw fa-place-of-worship', 1),
(21, 1, 'User List', 'admin/userlist', 'fa fa-fw  fa-id-badge', 1),
(24, 12, 'Certificates Vessel', 'certificatesvessel', 'fas fa-fw fa-book-open', 1),
(28, 9, 'News', 'information/newslist', 'fas fa-fw fa-newspaper-o', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'aeryusuf@gmail.com', 'eV6hVFTxiRJ6IApH79y/2gWiHPLqT382J0g2m+Gy7GI=', 1582660461),
(7, 'aeryusuf@gmail.com', 'I7v8PSi8ttRmeWpuOo93WW3Ci1Pp3eGQA7h%2F7wSkzQc%3D', 1582660626),
(8, 'aeryusuf@gmail.com', 'h2sKSNy/4z0+EyHd9JkHwEAWASWY+rgE8YPC9wqmA08=', 1582660771),
(9, 'aeryusuf@gmail.com', 'h8RJDc/g7vyo8atOlTfhFqtP7xuy8AJX1M+Ms41NreE=', 1582661015),
(10, 'aeryusuf@gmail.com', '7AzOjO7/rWku8ikkCGRP8IQlIRjox7lhv7fDltD1A3M=', 1582661091),
(11, 'yusufbikinibottom6@gmail.com', 'XmR/bVQ9CZ9bt/qYSiuCsnaPWaYOWa2OWPWuzhLechA=', 1664352624),
(12, 'yusufbikinibottom6@gmail.com', 'FgRM2CK9cZqu97LWqqh9qbnBFmp+fZj6Ujd3Z9Sp+TA=', 1664355585),
(13, 'yusufbikinibottom6@gmail.com', 'rs9e9x006VDm+Ssnj17Rt95zATvyOtVcpxuDreVdsQY=', 1664356143),
(14, 'yusufbikinibottom6@gmail.com', 'NDtAh2rgnfY3ZaCPWopaqGn56EONeSb4X+xpx3qNLBA=', 1664356414),
(15, 'yusufbikinibottom6@gmail.com', 'H82GBqHV68K31aVCawY/hGqRqJILNpqRPtI/gIdEN/Q=', 1664356856),
(16, 'yusufbikinibottom6@gmail.com', 'csecLiteH+3dZ3jQJGXxUEjbXxFVIMMyIvser0kjYEQ=', 1664357215),
(17, 'yusufbikinibottom6@gmail.com', 'Ks4ywgVL12xweQfSf+3AtV5Fcas/yG9/Q9gDJqMxtAk=', 1664357909),
(18, 'yusufbikinibottom6@gmail.com', 'AidCuT80PMexwNJPtycTq9MrJmIcJEHs5Ung18Ci7nY=', 1664357967),
(19, 'yusufbikinibottom6@gmail.com', 'J6/zdhh16S1rj8xujsNq4WYjhfLrnXRjzL/Kchwq9k8=', 1664358485),
(20, 'yusufbikinibottom6@gmail.com', '7okBjNUajxG44x7y4Mz1gE0u4Q75CivOFb+DbtsHiU4=', 1664362476),
(21, 'yusufbikinibottom6@gmail.com', 'CyHHqcV2J/NydzdMrRv3mpNtsBU4ZaeIqPn2zno2FpA=', 1664362561),
(22, 'yusufbikinibottom6@gmail.com', '8Gl+qntBEb9Uxx/pDBLPfubN9+tmvQVH8KpzwcRJpXc=', 1664362607),
(23, 'yusufbikinibottom6@gmail.com', 'MUqFux23FPaxJB9Ui2JvKp+mIXUxWleMDM0KaMFFydI=', 1664362772),
(24, 'yusufbikinibottom6@gmail.com', 'bStAcEv1DVJkaJXghSS/z2FiloWvVHeDIeOCzjWThK0=', 1664363038),
(25, 'yusufbikinibottom6@gmail.com', 'CPvSfIURABcUZm9pmgdB6AH/s+PMprAm8HPaoJhNcs4=', 1664363243),
(26, 'yusufbikinibottom6@gmail.com', 'uOEVG44f1qHwYQyAcWoeYxQL7Pz0baNNOc5GgHXia+E=', 1664363361),
(27, 'yusufbikinibottom6@gmail.com', 'ihNkXDdPcgM/vLl35RTEadCaYr7iVdAU56aynGn6gFA=', 1664363481),
(28, 'yusufbikinibottom6@gmail.com', 'ltYaGpa80F7Le6OMAWsYuw8Nm6EgNh+ePHL8FHBYD/4=', 1664363616),
(29, 'yusufbikinibottom6@gmail.com', 'IMdky2Bm+D6SYhbsJsWvuw5JbgjX5ICMO0IohygVG24=', 1664363764),
(30, 'yusufbikinibottom6@gmail.com', 'tPYasDu90n7OP2c8b1AWOjijRjbM+qe88Mxp04fIXz0=', 1664363875),
(31, 'yusufbikinibottom6@gmail.com', '3XwCfiJi4NUZf5+bTK5q+S03Bj5zjAqzBYNfGdI8szg=', 1664363991),
(32, 'onwy@gmail.com', 'NuDhrWqwSWudAhAwPA6gNbG/DaVf3940uRShV6QFK/c=', 1665139912),
(33, 'nila@gmail.com', 'EGzAbK2M2SUgYjKW/aRprBLVyQh8H933GwqFN7HON5w=', 1665140283),
(34, 'user@gmail.com', 'D8WR4alB9jYUbuLGs7HTsECy6VTueiogvRcCkMtbCh8=', 1665732342);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kabupaten`
--

CREATE TABLE `wilayah_kabupaten` (
  `id` varchar(4) NOT NULL,
  `provinsi_id` varchar(2) NOT NULL DEFAULT '',
  `nama_kabupaten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kabupaten`
--

INSERT INTO `wilayah_kabupaten` (`id`, `provinsi_id`, `nama_kabupaten`) VALUES
('0', '0', '-'),
('1101', '11', 'Kab. Simeulue'),
('1102', '11', 'Kab. Aceh Singkil'),
('1103', '11', 'Kab. Aceh Selatan'),
('1104', '11', 'Kab. Aceh Tenggara'),
('1105', '11', 'Kab. Aceh Timur'),
('1106', '11', 'Kab. Aceh Tengah'),
('1107', '11', 'Kab. Aceh Barat'),
('1108', '11', 'Kab. Aceh Besar'),
('1109', '11', 'Kab. Pidie'),
('1110', '11', 'Kab. Bireuen'),
('1111', '11', 'Kab. Aceh Utara'),
('1112', '11', 'Kab. Aceh Barat Daya'),
('1113', '11', 'Kab. Gayo Lues'),
('1114', '11', 'Kab. Aceh Tamiang'),
('1115', '11', 'Kab. Nagan Raya'),
('1116', '11', 'Kab. Aceh Jaya'),
('1117', '11', 'Kab. Bener Meriah'),
('1118', '11', 'Kab. Pidie Jaya'),
('1171', '11', 'Kota Banda Aceh'),
('1172', '11', 'Kota Sabang'),
('1173', '11', 'Kota Langsa'),
('1174', '11', 'Kota Lhokseumawe'),
('1175', '11', 'Kota Subulussalam'),
('1201', '12', 'Kab. Nias'),
('1202', '12', 'Kab. Mandailing Natal'),
('1203', '12', 'Kab. Tapanuli Selatan'),
('1204', '12', 'Kab. Tapanuli Tengah'),
('1205', '12', 'Kab. Tapanuli Utara'),
('1206', '12', 'Kab. Toba Samosir'),
('1207', '12', 'Kab. Labuhan Batu'),
('1208', '12', 'Kab. Asahan'),
('1209', '12', 'Kab. Simalungun'),
('1210', '12', 'Kab. Dairi'),
('1211', '12', 'Kab. Karo'),
('1212', '12', 'Kab. Deli Serdang'),
('1213', '12', 'Kab. Langkat'),
('1214', '12', 'Kab. Nias Selatan'),
('1215', '12', 'Kab. Humbang Hasundutan'),
('1216', '12', 'Kab. Pakpak Bharat'),
('1217', '12', 'Kab. Samosir'),
('1218', '12', 'Kab. Serdang Bedagai'),
('1219', '12', 'Kab. Batu Bara'),
('1220', '12', 'Kab. Padang Lawas Utara'),
('1221', '12', 'Kab. Padang Lawas'),
('1222', '12', 'Kab. Labuhan Batu Selatan'),
('1223', '12', 'Kab. Labuhan Batu Utara'),
('1224', '12', 'Kab. Nias Utara'),
('1225', '12', 'Kab. Nias Barat'),
('1271', '12', 'Kota Sibolga'),
('1272', '12', 'Kota Tanjung Balai'),
('1273', '12', 'Kota Pematang Siantar'),
('1274', '12', 'Kota Tebing Tinggi'),
('1275', '12', 'Kota Medan'),
('1276', '12', 'Kota Binjai'),
('1277', '12', 'Kota Padangsidimpuan'),
('1278', '12', 'Kota Gunungsitoli'),
('1301', '13', 'Kab. Kepulauan Mentawai'),
('1302', '13', 'Kab. Pesisir Selatan'),
('1303', '13', 'Kab. Solok'),
('1304', '13', 'Kab. Sijunjung'),
('1305', '13', 'Kab. Tanah Datar'),
('1306', '13', 'Kab. Padang Pariaman'),
('1307', '13', 'Kab. Agam'),
('1308', '13', 'Kab. Lima Puluh Kota'),
('1309', '13', 'Kab. Pasaman'),
('1310', '13', 'Kab. Solok Selatan'),
('1311', '13', 'Kab. Dharmasraya'),
('1312', '13', 'Kab. Pasaman Barat'),
('1371', '13', 'Kota Padang'),
('1372', '13', 'Kota Solok'),
('1373', '13', 'Kota Sawah Lunto'),
('1374', '13', 'Kota Padang Panjang'),
('1375', '13', 'Kota Bukittinggi'),
('1376', '13', 'Kota Payakumbuh'),
('1377', '13', 'Kota Pariaman'),
('1401', '14', 'Kab. Kuantan Singingi'),
('1402', '14', 'Kab. Indragiri Hulu'),
('1403', '14', 'Kab. Indragiri Hilir'),
('1404', '14', 'Kab. Pelalawan'),
('1405', '14', 'Kab. S I A K'),
('1406', '14', 'Kab. Kampar'),
('1407', '14', 'Kab. Rokan Hulu'),
('1408', '14', 'Kab. Bengkalis'),
('1409', '14', 'Kab. Rokan Hilir'),
('1410', '14', 'Kab. Kepulauan Meranti'),
('1471', '14', 'Kota Pekanbaru'),
('1473', '14', 'Kota D U M A I'),
('1501', '15', 'Kab. Kerinci'),
('1502', '15', 'Kab. Merangin'),
('1503', '15', 'Kab. Sarolangun'),
('1504', '15', 'Kab. Batang Hari'),
('1505', '15', 'Kab. Muaro Jambi'),
('1506', '15', 'Kab. Tanjung Jabung Timur'),
('1507', '15', 'Kab. Tanjung Jabung Barat'),
('1508', '15', 'Kab. Tebo'),
('1509', '15', 'Kab. Bungo'),
('1571', '15', 'Kota Jambi'),
('1572', '15', 'Kota Sungai Penuh'),
('1601', '16', 'Kab. Ogan Komering Ulu'),
('1602', '16', 'Kab. Ogan Komering Ilir'),
('1603', '16', 'Kab. Muara Enim'),
('1604', '16', 'Kab. Lahat'),
('1605', '16', 'Kab. Musi Rawas'),
('1606', '16', 'Kab. Musi Banyuasin'),
('1607', '16', 'Kab. Banyu Asin'),
('1608', '16', 'Kab. Ogan Komering Ulu Selatan'),
('1609', '16', 'Kab. Ogan Komering Ulu Timur'),
('1610', '16', 'Kab. Ogan Ilir'),
('1611', '16', 'Kab. Empat Lawang'),
('1671', '16', 'Kota Palembang'),
('1672', '16', 'Kota Prabumulih'),
('1673', '16', 'Kota Pagar Alam'),
('1674', '16', 'Kota Lubuklinggau'),
('1701', '17', 'Kab. Bengkulu Selatan'),
('1702', '17', 'Kab. Rejang Lebong'),
('1703', '17', 'Kab. Bengkulu Utara'),
('1704', '17', 'Kab. Kaur'),
('1705', '17', 'Kab. Seluma'),
('1706', '17', 'Kab. Mukomuko'),
('1707', '17', 'Kab. Lebong'),
('1708', '17', 'Kab. Kepahiang'),
('1709', '17', 'Kab. Bengkulu Tengah'),
('1771', '17', 'Kota Bengkulu'),
('1801', '18', 'Kab. Lampung Barat'),
('1802', '18', 'Kab. Tanggamus'),
('1803', '18', 'Kab. Lampung Selatan'),
('1804', '18', 'Kab. Lampung Timur'),
('1805', '18', 'Kab. Lampung Tengah'),
('1806', '18', 'Kab. Lampung Utara'),
('1807', '18', 'Kab. Way Kanan'),
('1808', '18', 'Kab. Tulangbawang'),
('1809', '18', 'Kab. Pesawaran'),
('1810', '18', 'Kab. Pringsewu'),
('1811', '18', 'Kab. Mesuji'),
('1812', '18', 'Kab. Tulang Bawang Barat'),
('1813', '18', 'Kab. Pesisir Barat'),
('1871', '18', 'Kota Bandar Lampung'),
('1872', '18', 'Kota Metro'),
('1901', '19', 'Kab. Bangka'),
('1902', '19', 'Kab. Belitung'),
('1903', '19', 'Kab. Bangka Barat'),
('1904', '19', 'Kab. Bangka Tengah'),
('1905', '19', 'Kab. Bangka Selatan'),
('1906', '19', 'Kab. Belitung Timur'),
('1971', '19', 'Kota Pangkal Pinang'),
('2101', '21', 'Kab. Karimun'),
('2102', '21', 'Kab. Bintan'),
('2103', '21', 'Kab. Natuna'),
('2104', '21', 'Kab. Lingga'),
('2105', '21', 'Kab. Kepulauan Anambas'),
('2171', '21', 'Kota B A T A M'),
('2172', '21', 'Kota Tanjung Pinang'),
('3101', '31', 'Kab. Kepulauan Seribu'),
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3174', '31', 'Kota Jakarta Barat'),
('3175', '31', 'Kota Jakarta Utara'),
('3201', '32', 'Kab. Bogor'),
('3202', '32', 'Kab. Sukabumi'),
('3203', '32', 'Kab. Cianjur'),
('3204', '32', 'Kab. Bandung'),
('3205', '32', 'Kab. Garut'),
('3206', '32', 'Kab. Tasikmalaya'),
('3207', '32', 'Kab. Ciamis'),
('3208', '32', 'Kab. Kuningan'),
('3209', '32', 'Kab. Cirebon'),
('3210', '32', 'Kab. Majalengka'),
('3211', '32', 'Kab. Sumedang'),
('3212', '32', 'Kab. Indramayu'),
('3213', '32', 'Kab. Subang'),
('3214', '32', 'Kab. Purwakarta'),
('3215', '32', 'Kab. Karawang'),
('3216', '32', 'Kab. Bekasi'),
('3217', '32', 'Kab. Bandung Barat'),
('3218', '32', 'Kab. Pangandaran'),
('3271', '32', 'Kota Bogor'),
('3272', '32', 'Kota Sukabumi'),
('3273', '32', 'Kota Bandung'),
('3274', '32', 'Kota Cirebon'),
('3275', '32', 'Kota Bekasi'),
('3276', '32', 'Kota Depok'),
('3277', '32', 'Kota Cimahi'),
('3278', '32', 'Kota Tasikmalaya'),
('3279', '32', 'Kota Banjar'),
('3301', '33', 'Kab. Cilacap'),
('3302', '33', 'Kab. Banyumas'),
('3303', '33', 'Kab. Purbalingga'),
('3304', '33', 'Kab. Banjarnegara'),
('3305', '33', 'Kab. Kebumen'),
('3306', '33', 'Kab. Purworejo'),
('3307', '33', 'Kab. Wonosobo'),
('3308', '33', 'Kab. Magelang'),
('3309', '33', 'Kab. Boyolali'),
('3310', '33', 'Kab. Klaten'),
('3311', '33', 'Kab. Sukoharjo'),
('3312', '33', 'Kab. Wonogiri'),
('3313', '33', 'Kab. Karanganyar'),
('3314', '33', 'Kab. Sragen'),
('3315', '33', 'Kab. Grobogan'),
('3316', '33', 'Kab. Blora'),
('3317', '33', 'Kab. Rembang'),
('3318', '33', 'Kab. Pati'),
('3319', '33', 'Kab. Kudus'),
('3320', '33', 'Kab. Jepara'),
('3321', '33', 'Kab. Demak'),
('3322', '33', 'Kab. Semarang'),
('3323', '33', 'Kab. Temanggung'),
('3324', '33', 'Kab. Kendal'),
('3325', '33', 'Kab. Batang'),
('3326', '33', 'Kab. Pekalongan'),
('3327', '33', 'Kab. Pemalang'),
('3328', '33', 'Kab. Tegal'),
('3329', '33', 'Kab. Brebes'),
('3371', '33', 'Kota Magelang'),
('3372', '33', 'Kota Surakarta'),
('3373', '33', 'Kota Salatiga'),
('3374', '33', 'Kota Semarang'),
('3375', '33', 'Kota Pekalongan'),
('3376', '33', 'Kota Tegal'),
('3401', '34', 'Kab. Kulon Progo'),
('3402', '34', 'Kab. Bantul'),
('3403', '34', 'Kab. Gunung Kidul'),
('3404', '34', 'Kab. Sleman'),
('3471', '34', 'Kota Yogyakarta'),
('3501', '35', 'Kab. Pacitan'),
('3502', '35', 'Kab. Ponorogo'),
('3503', '35', 'Kab. Trenggalek'),
('3504', '35', 'Kab. Tulungagung'),
('3505', '35', 'Kab. Blitar'),
('3506', '35', 'Kab. Kediri'),
('3507', '35', 'Kab. Malang'),
('3508', '35', 'Kab. Lumajang'),
('3509', '35', 'Kab. Jember'),
('3510', '35', 'Kab. Banyuwangi'),
('3511', '35', 'Kab. Bondowoso'),
('3512', '35', 'Kab. Situbondo'),
('3513', '35', 'Kab. Probolinggo'),
('3514', '35', 'Kab. Pasuruan'),
('3515', '35', 'Kab. Sidoarjo'),
('3516', '35', 'Kab. Mojokerto'),
('3517', '35', 'Kab. Jombang'),
('3518', '35', 'Kab. Nganjuk'),
('3519', '35', 'Kab. Madiun'),
('3520', '35', 'Kab. Magetan'),
('3521', '35', 'Kab. Ngawi'),
('3522', '35', 'Kab. Bojonegoro'),
('3523', '35', 'Kab. Tuban'),
('3524', '35', 'Kab. Lamongan'),
('3525', '35', 'Kab. Gresik'),
('3526', '35', 'Kab. Bangkalan'),
('3527', '35', 'Kab. Sampang'),
('3528', '35', 'Kab. Pamekasan'),
('3529', '35', 'Kab. Sumenep'),
('3571', '35', 'Kota Kediri'),
('3572', '35', 'Kota Blitar'),
('3573', '35', 'Kota Malang'),
('3574', '35', 'Kota Probolinggo'),
('3575', '35', 'Kota Pasuruan'),
('3576', '35', 'Kota Mojokerto'),
('3577', '35', 'Kota Madiun'),
('3578', '35', 'Kota Surabaya'),
('3579', '35', 'Kota Batu'),
('3601', '36', 'Kab. Pandeglang'),
('3602', '36', 'Kab. Lebak'),
('3603', '36', 'Kab. Tangerang'),
('3604', '36', 'Kab. Serang'),
('3671', '36', 'Kota Tangerang'),
('3672', '36', 'Kota Cilegon'),
('3673', '36', 'Kota Serang'),
('3674', '36', 'Kota Tangerang Selatan'),
('5101', '51', 'Kab. Jembrana'),
('5102', '51', 'Kab. Tabanan'),
('5103', '51', 'Kab. Badung'),
('5104', '51', 'Kab. Gianyar'),
('5105', '51', 'Kab. Klungkung'),
('5106', '51', 'Kab. Bangli'),
('5107', '51', 'Kab. Karang Asem'),
('5108', '51', 'Kab. Buleleng'),
('5171', '51', 'Kota Denpasar'),
('5201', '52', 'Kab. Lombok Barat'),
('5202', '52', 'Kab. Lombok Tengah'),
('5203', '52', 'Kab. Lombok Timur'),
('5204', '52', 'Kab. Sumbawa'),
('5205', '52', 'Kab. Dompu'),
('5206', '52', 'Kab. Bima'),
('5207', '52', 'Kab. Sumbawa Barat'),
('5208', '52', 'Kab. Lombok Utara'),
('5271', '52', 'Kota Mataram'),
('5272', '52', 'Kota Bima'),
('5301', '53', 'Kab. Sumba Barat'),
('5302', '53', 'Kab. Sumba Timur'),
('5303', '53', 'Kab. Kupang'),
('5304', '53', 'Kab. Timor Tengah Selatan'),
('5305', '53', 'Kab. Timor Tengah Utara'),
('5306', '53', 'Kab. Belu'),
('5307', '53', 'Kab. Alor'),
('5308', '53', 'Kab. Lembata'),
('5309', '53', 'Kab. Flores Timur'),
('5310', '53', 'Kab. Sikka'),
('5311', '53', 'Kab. Ende'),
('5312', '53', 'Kab. Ngada'),
('5313', '53', 'Kab. Manggarai'),
('5314', '53', 'Kab. Rote Ndao'),
('5315', '53', 'Kab. Manggarai Barat'),
('5316', '53', 'Kab. Sumba Tengah'),
('5317', '53', 'Kab. Sumba Barat Daya'),
('5318', '53', 'Kab. Nagekeo'),
('5319', '53', 'Kab. Manggarai Timur'),
('5320', '53', 'Kab. Sabu Raijua'),
('5371', '53', 'Kota Kupang'),
('6101', '61', 'Kab. Sambas'),
('6102', '61', 'Kab. Bengkayang'),
('6103', '61', 'Kab. Landak'),
('6104', '61', 'Kab. Pontianak'),
('6105', '61', 'Kab. Sanggau'),
('6106', '61', 'Kab. Ketapang'),
('6107', '61', 'Kab. Sintang'),
('6108', '61', 'Kab. Kapuas Hulu'),
('6109', '61', 'Kab. Sekadau'),
('6110', '61', 'Kab. Melawi'),
('6111', '61', 'Kab. Kayong Utara'),
('6112', '61', 'Kab. Kubu Raya'),
('6171', '61', 'Kota Pontianak'),
('6172', '61', 'Kota Singkawang'),
('6201', '62', 'Kab. Kotawaringin Barat'),
('6202', '62', 'Kab. Kotawaringin Timur'),
('6203', '62', 'Kab. Kapuas'),
('6204', '62', 'Kab. Barito Selatan'),
('6205', '62', 'Kab. Barito Utara'),
('6206', '62', 'Kab. Sukamara'),
('6207', '62', 'Kab. Lamandau'),
('6208', '62', 'Kab. Seruyan'),
('6209', '62', 'Kab. Katingan'),
('6210', '62', 'Kab. Pulang Pisau'),
('6211', '62', 'Kab. Gunung Mas'),
('6212', '62', 'Kab. Barito Timur'),
('6213', '62', 'Kab. Murung Raya'),
('6271', '62', 'Kota Palangka Raya'),
('6301', '63', 'Kab. Tanah Laut'),
('6302', '63', 'Kab. Kota Baru'),
('6303', '63', 'Kab. Banjar'),
('6304', '63', 'Kab. Barito Kuala'),
('6305', '63', 'Kab. Tapin'),
('6306', '63', 'Kab. Hulu Sungai Selatan'),
('6307', '63', 'Kab. Hulu Sungai Tengah'),
('6308', '63', 'Kab. Hulu Sungai Utara'),
('6309', '63', 'Kab. Tabalong'),
('6310', '63', 'Kab. Tanah Bumbu'),
('6311', '63', 'Kab. Balangan'),
('6371', '63', 'Kota Banjarmasin'),
('6372', '63', 'Kota Banjar Baru'),
('6401', '64', 'Kab. Paser'),
('6402', '64', 'Kab. Kutai Barat'),
('6403', '64', 'Kab. Kutai Kartanegara'),
('6404', '64', 'Kab. Kutai Timur'),
('6405', '64', 'Kab. Berau'),
('6409', '64', 'Kab. Penajam Paser Utara'),
('6471', '64', 'Kota Balikpapan'),
('6472', '64', 'Kota Samarinda'),
('6474', '64', 'Kota Bontang'),
('6501', '65', 'Kab. Malinau'),
('6502', '65', 'Kab. Bulungan'),
('6503', '65', 'Kab. Tana Tidung'),
('6504', '65', 'Kab. Nunukan'),
('6571', '65', 'Kota Tarakan'),
('7101', '71', 'Kab. Bolaang Mongondow'),
('7102', '71', 'Kab. Minahasa'),
('7103', '71', 'Kab. Kepulauan Sangihe'),
('7104', '71', 'Kab. Kepulauan Talaud'),
('7105', '71', 'Kab. Minahasa Selatan'),
('7106', '71', 'Kab. Minahasa Utara'),
('7107', '71', 'Kab. Bolaang Mongondow Utara'),
('7108', '71', 'Kab. Siau Tagulandang Biaro'),
('7109', '71', 'Kab. Minahasa Tenggara'),
('7110', '71', 'Kab. Bolaang Mongondow Selatan'),
('7111', '71', 'Kab. Bolaang Mongondow Timur'),
('7171', '71', 'Kota Manado'),
('7172', '71', 'Kota Bitung'),
('7173', '71', 'Kota Tomohon'),
('7174', '71', 'Kota Kotamobagu'),
('7201', '72', 'Kab. Banggai Kepulauan'),
('7202', '72', 'Kab. Banggai'),
('7203', '72', 'Kab. Morowali'),
('7204', '72', 'Kab. Poso'),
('7205', '72', 'Kab. Donggala'),
('7206', '72', 'Kab. Toli-toli'),
('7207', '72', 'Kab. Buol'),
('7208', '72', 'Kab. Parigi Moutong'),
('7209', '72', 'Kab. Tojo Una-una'),
('7210', '72', 'Kab. Sigi'),
('7271', '72', 'Kota Palu'),
('7301', '73', 'Kab. Kepulauan Selayar'),
('7302', '73', 'Kab. Bulukumba'),
('7303', '73', 'Kab. Bantaeng'),
('7304', '73', 'Kab. Jeneponto'),
('7305', '73', 'Kab. Takalar'),
('7306', '73', 'Kab. Gowa'),
('7307', '73', 'Kab. Sinjai'),
('7308', '73', 'Kab. Maros'),
('7309', '73', 'Kab. Pangkajene Dan Kepulauan'),
('7310', '73', 'Kab. Barru'),
('7311', '73', 'Kab. Bone'),
('7312', '73', 'Kab. Soppeng'),
('7313', '73', 'Kab. Wajo'),
('7314', '73', 'Kab. Sidenreng Rappang'),
('7315', '73', 'Kab. Pinrang'),
('7316', '73', 'Kab. Enrekang'),
('7317', '73', 'Kab. Luwu'),
('7318', '73', 'Kab. Tana Toraja'),
('7322', '73', 'Kab. Luwu Utara'),
('7325', '73', 'Kab. Luwu Timur'),
('7326', '73', 'Kab. Toraja Utara'),
('7371', '73', 'Kota Makassar'),
('7372', '73', 'Kota Parepare'),
('7373', '73', 'Kota Palopo'),
('7401', '74', 'Kab. Buton'),
('7402', '74', 'Kab. Muna'),
('7403', '74', 'Kab. Konawe'),
('7404', '74', 'Kab. Kolaka'),
('7405', '74', 'Kab. Konawe Selatan'),
('7406', '74', 'Kab. Bombana'),
('7407', '74', 'Kab. Wakatobi'),
('7408', '74', 'Kab. Kolaka Utara'),
('7409', '74', 'Kab. Buton Utara'),
('7410', '74', 'Kab. Konawe Utara'),
('7471', '74', 'Kota Kendari'),
('7472', '74', 'Kota Baubau'),
('7501', '75', 'Kab. Boalemo'),
('7502', '75', 'Kab. Gorontalo'),
('7503', '75', 'Kab. Pohuwato'),
('7504', '75', 'Kab. Bone Bolango'),
('7505', '75', 'Kab. Gorontalo Utara'),
('7571', '75', 'Kota Gorontalo'),
('7601', '76', 'Kab. Majene'),
('7602', '76', 'Kab. Polewali Mandar'),
('7603', '76', 'Kab. Mamasa'),
('7604', '76', 'Kab. Mamuju'),
('7605', '76', 'Kab. Mamuju Utara'),
('8101', '81', 'Kab. Maluku Tenggara Barat'),
('8102', '81', 'Kab. Maluku Tenggara'),
('8103', '81', 'Kab. Maluku Tengah'),
('8104', '81', 'Kab. Buru'),
('8105', '81', 'Kab. Kepulauan Aru'),
('8106', '81', 'Kab. Seram Bagian Barat'),
('8107', '81', 'Kab. Seram Bagian Timur'),
('8108', '81', 'Kab. Maluku Barat Daya'),
('8109', '81', 'Kab. Buru Selatan'),
('8171', '81', 'Kota Ambon'),
('8172', '81', 'Kota Tual'),
('8201', '82', 'Kab. Halmahera Barat'),
('8202', '82', 'Kab. Halmahera Tengah'),
('8203', '82', 'Kab. Kepulauan Sula'),
('8204', '82', 'Kab. Halmahera Selatan'),
('8205', '82', 'Kab. Halmahera Utara'),
('8206', '82', 'Kab. Halmahera Timur'),
('8207', '82', 'Kab. Pulau Morotai'),
('8271', '82', 'Kota Ternate'),
('8272', '82', 'Kota Tidore Kepulauan'),
('9101', '91', 'Kab. Fakfak'),
('9102', '91', 'Kab. Kaimana'),
('9103', '91', 'Kab. Teluk Wondama'),
('9104', '91', 'Kab. Teluk Bintuni'),
('9105', '91', 'Kab. Manokwari'),
('9106', '91', 'Kab. Sorong Selatan'),
('9107', '91', 'Kab. Sorong'),
('9108', '91', 'Kab. Raja Ampat'),
('9109', '91', 'Kab. Tambrauw'),
('9110', '91', 'Kab. Maybrat'),
('9171', '91', 'Kota Sorong'),
('9401', '94', 'Kab. Merauke'),
('9402', '94', 'Kab. Jayawijaya'),
('9403', '94', 'Kab. Jayapura'),
('9404', '94', 'Kab. Nabire'),
('9408', '94', 'Kab. Kepulauan Yapen'),
('9409', '94', 'Kab. Biak Numfor'),
('9410', '94', 'Kab. Paniai'),
('9411', '94', 'Kab. Puncak Jaya'),
('9412', '94', 'Kab. Mimika'),
('9413', '94', 'Kab. Boven Digoel'),
('9414', '94', 'Kab. Mappi'),
('9415', '94', 'Kab. Asmat'),
('9416', '94', 'Kab. Yahukimo'),
('9417', '94', 'Kab. Pegunungan Bintang'),
('9418', '94', 'Kab. Tolikara'),
('9419', '94', 'Kab. Sarmi'),
('9420', '94', 'Kab. Keerom'),
('9426', '94', 'Kab. Waropen'),
('9427', '94', 'Kab. Supiori'),
('9428', '94', 'Kab. Mamberamo Raya'),
('9429', '94', 'Kab. Nduga'),
('9430', '94', 'Kab. Lanny Jaya'),
('9431', '94', 'Kab. Mamberamo Tengah'),
('9432', '94', 'Kab. Yalimo'),
('9433', '94', 'Kab. Puncak'),
('9434', '94', 'Kab. Dogiyai'),
('9435', '94', 'Kab. Intan Jaya'),
('9436', '94', 'Kab. Deiyai'),
('9471', '94', 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_provinsi`
--

CREATE TABLE `wilayah_provinsi` (
  `id` varchar(2) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_provinsi`
--

INSERT INTO `wilayah_provinsi` (`id`, `nama_provinsi`) VALUES
('0', '-'),
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'Dki Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Di Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('94', 'Papua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idbook`);

--
-- Indexes for table `confrim_ormas`
--
ALTER TABLE `confrim_ormas`
  ADD PRIMARY KEY (`idconfrim_ormas`);

--
-- Indexes for table `holy_book`
--
ALTER TABLE `holy_book`
  ADD PRIMARY KEY (`idholy_book`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- Indexes for table `ormas`
--
ALTER TABLE `ormas`
  ADD PRIMARY KEY (`idormas`);

--
-- Indexes for table `registrasi_ormas`
--
ALTER TABLE `registrasi_ormas`
  ADD PRIMARY KEY (`idregistrasi_ormas`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idsetting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah_kabupaten`
--
ALTER TABLE `wilayah_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah_provinsi`
--
ALTER TABLE `wilayah_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `idbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `confrim_ormas`
--
ALTER TABLE `confrim_ormas`
  MODIFY `idconfrim_ormas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holy_book`
--
ALTER TABLE `holy_book`
  MODIFY `idholy_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ormas`
--
ALTER TABLE `ormas`
  MODIFY `idormas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrasi_ormas`
--
ALTER TABLE `registrasi_ormas`
  MODIFY `idregistrasi_ormas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `idsetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
