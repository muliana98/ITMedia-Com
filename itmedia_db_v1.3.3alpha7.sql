-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 07:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itmedia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `ket` varchar(10) DEFAULT NULL,
  `foto_profil` varchar(120) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `nama_lengkap`, `password`, `ket`, `foto_profil`, `status`) VALUES
(1, 'muliana98', 'muliana.insan05@gmail.com', 'Muliana Insan Wahyudi', 'b536bf2deb7bbc944bd10ab8e33295a4161a53cd49674c0cbc6c05cc2130cada', 'admin', 'arufi-chan.jpg', 'online'),
(2, 'sandy12', 'asdf.12@gmail.com', 'Sandy Kurniawan Ruhiat', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '', 'online'),
(3, 'bidin12', 'asdf.12@gmail.com', 'Muhammad Aulia Muhibubidin', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '', 'offline'),
(4, 'reza12', 'asdf.12@gmail.com', 'Muhammad Reza Rifandy', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'user', '', ''),
(5, 'raden12', 'teamgalatic@gmail.com', 'Raden Aditya Dharma', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '', 'offline'),
(6, 'sahadi12', 'asdf.12@gmail.com', 'Sahadi Fahamsyah', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'user', '', ''),
(7, 'tono12', 'suhartonoxxxxx@gmail.com', 'Suhartono', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'user', '', ''),
(8, 'kausar12', 'asdf.12@gmail.com', 'Kausar', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '', ''),
(9, 'cacha12', 'asdf.12@gmail.com', 'Zelandita Cahya W', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', 'FB_IMG_14867129074600778.jpg', 'offline'),
(10, 'kirk12', 'asdf.12@gmail.com', 'Kirk Hammett', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '$_1.JPG', 'offline'),
(11, 'freely_test12', 'asdf.12@gmail.com', 'Hanya Akun Percobaan', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'moderator', '', 'offline'),
(12, 'ismi12', 'ismi12@gmail.com', 'Ismi Gaia Hartono', '938275c4013a2361c9cc4954ecb664c7c47b2e8b1e2cf8a91d67aa128751aa4e', 'admin', '10352594_831093643619060_1846548731990808945_n.jpg', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(5) unsigned NOT NULL,
  `id_kategori` int(3) unsigned NOT NULL DEFAULT '0',
  `judul` varchar(120) NOT NULL DEFAULT '',
  `headline` text NOT NULL,
  `isi` text NOT NULL,
  `pengirim` varchar(30) NOT NULL DEFAULT '',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gambar` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `judul`, `headline`, `isi`, `pengirim`, `tanggal`, `gambar`) VALUES
(1, 2, 'Design Graphics', 'Ini merupakan layanan Desain Grafis kami', 'Kami disini memberikan pelayanan tentang pembuatan desain grafis dan komunikasi visual yang sesuai dengan kriteria dan keinginan anda untuk memenuhi kebutuhan anda akan pentingnya dunia teknologi informasi saat ini.', 'Muliana Insan Wahyudi', '2017-02-13 12:50:39', '/images/artikel/layanan/design-graphics-logo_v1_new.png'),
(2, 2, 'Web Development', 'Ini merupakan layanan Web Development kami.', 'Kami disini memberikan pelayanan tentang pembuatan website yang sesuai dengan kriteria dan keinginan anda untuk memenuhi kebutuhan anda akan pentingnya dunia teknologi informasi saat ini.', 'Muliana Insan Wahyudi', '2017-02-12 21:11:48', '/images/artikel/layanan/web-dev-logo_v1.png'),
(3, 2, 'Software Development', 'Ini merupakan layanan software development kami.', 'Kami disini memberikan pelayanan tentang pembuatan software desktop maupun berbasis mobile yang sesuai dengan kriteria dan keinginan anda untuk memenuhi kebutuhan anda akan pentingnya dunia teknologi informasi saat ini.', 'Muliana Insan Wahyudi', '2017-02-12 21:12:11', '/images/artikel/layanan/software-logo_v1.png'),
(4, 3, 'PT. Bangsawan Cyberindo', 'Ini adalah portfolio kami tentang PT. Bangsawan Cyberindo', 'Ini merupakan portfolio website kami tentang PT. Bangsawan Cyberindo. PT Bangsawan Cyberindo merupakan sebuah perusahaan yang bergerak dibidang teknologi informasi termasuk Web Development, Internet, dll. Didirikan pada tahun 2005', 'Muliana Insan Wahyudi', '2017-02-04 22:31:14', '/images/artikel/portfolio/3-1.jpg'),
(5, 3, 'Maxmedia.co.id', 'Ini portfolio kami tentang maxmedia.co.id yang dikerjakan oleh kami', 'Ini merupakan portfolio website kami tentang PT. Maximum Media.\r\nMaximum Media merupakan sebuah perusahaan penyedia jasa layanan internet dan jaringan yang didirikan pada tahun 2005 silam.', 'Muliana Insan Wahyudi', '2017-02-04 22:32:51', '/images/artikel/portfolio/Untitled-6.jpg'),
(6, 3, 'Yuayu Creative Studio', 'portfolio kami tentang Yuayu Creative Studio', 'Ini merupakan portfolio kami tentang Yuayu Creative Studio a.k.a Studio Multimedia Manggala. Yuayu Creative Studio merupakan sebuah penyedia jasa yang berkaitan tentang desain grafis dan desain komunikasi visual, seperti video editing, fotografi, desain banner dsb, dan banyak lagi yang lainnya', 'Muliana Insan Wahyudi', '2017-02-04 22:34:11', '/images/artikel/portfolio/just_hell1.png'),
(7, 3, 'SMK Negeri 2 Tangsel', 'Ini adalah portfolio kami tentang SMKN 2 Tangsel', 'Ini merupakan portfolio kami tentang SMK Negeri 2 Kota Tangerang Selatan. SMK Negeri 2 Kota Tangerang Selatan merupakan sebuah lembaga pendidikan formal(sekolah) kejuruan yang dikelola pemerintah yang berlokasi pada Pondok Aren, Tangerang Selatan. Memiliki 4 kejuruan yaitu Multimedia, TKR, TSM, Akuntansi.', 'Muliana Insan Wahyudi', '2017-02-04 22:35:18', '/images/artikel/portfolio/logo smkn2 transparant.png'),
(8, 3, 'SMK Manggala Ciledug', 'ini adalah portfolio kami tentang SMK Manggala Ciledug', 'Ini merupakan portfolio kami tentang SMK Manggala Ciledug. SMK Manggala merupakan sebuah lembaga pendidikan formal(sekolah) swasta menengah kejuruan yang didirikan oleh Yayasan Pendidikan Manggala pada tahun 2005, yang memiliki 4 bidang kejuruan yaitu Multimedia, Teknik Komputer Jaringan, Jasa Boga, dan Akomodasi Perhotelan.', 'Muliana Insan Wahyudi', '2017-02-04 22:36:13', '/images/artikel/portfolio/logo manggala.png'),
(9, 3, 'Swike Apparel', 'Ini adalah portfolio kami tentang Swike Apparel', 'Ini merupakan portfolio kami tentang Swike Apparel. Swike Apparel merupakan sebuah produk/brand distro lokal yang berlokasi di kota tangerang. Swike Apparel menyediakan berbagai produk seperti t-shirt, sweater, tas, celana dan masih banyak lagi yang lainnya', 'Muliana Insan Wahyudi', '2017-02-04 22:36:59', '/images/artikel/portfolio/vlcsnap-2016-12-18-17h06m30s562.png'),
(10, 1, 'Tentang ITMedia-Com', 'Perkenalan ITMedia-Com', 'ITMedia-Computer (ITMedia-Com) merupakan sebuah perusahaan rintisan yang bergerak pada bidang teknologi informasi dan komputer. Perusahaan rintisan kecil ini dibentuk pada tanggal 20 Januari 2015, beranggotakan 8 orang dan memiliki keahliannya tersendiri pada bidangnya. Kami melayani pembuatan Web dan Software (desktop maupun mobile), Desain Grafis, Video Editing, Maintenance, Jaringan Komputer dan lainnya', 'Muliana Insan Wahyudi', '2017-02-05 01:48:58', '/images/artikel/ITMedia-Com/itmedia-web final4.png'),
(11, 1, 'Anggota ITMedia-Com', 'daftar anggota ITMedia-Com', 'ITMedia-Com memiliki 8 anggota didalamnya diantaranya :\r\n- Muliana Insan Wahyudi : sebagai Web Programmer dan pimpinan ITMedia-Com.\r\n- Sahadi Fahamsyah : sebagai Desainer Grafis.\r\n- Raden Aditya Dharma : sebagai Desainer Grafis, Motion Grapher, dan Video Editor.\r\n- Reza Rifandy : sebagai Desainer Grafis dan Multimedia Editor.\r\n- Suhartono : sebagai Desainer Grafis.\r\n- Kausar : sebagai Teknisi Komputer dan Jaringan.\r\n- Sandy Kurniawan Ruhiat : sebagai Konsep Staff, Administrator Web, dan Additional Programmer.\r\n- Muhammad Bidin : sebagai Teknisi Komputer dan Elektro dan Staff Editor.', 'Muliana Insan Wahyudi', '2017-02-04 22:40:50', '/images/artikel/ITMedia-Com/label cd.jpg'),
(12, 4, 'Dasar-dasar CSS', 'membahas tentang CSS', 'Cascade Style Sheet atau yang biasa disingkat dengan sebutan CSS merupakan sebuah bahasa untuk mengatur, menata, dan memperindah tampilan halaman web yang sedang dibuat. Pada tahun 1995 untuk mengatur tampilan halaman web, para Web Developer menggunakan sistem tabel untuk membuat layout web tersebut', 'Muliana Insan Wahyudi', '2017-02-04 22:44:05', '/images/artikel/Pemrograman Web/computer-1209641_1280.jpg'),
(13, 4, 'Belajar HTML dasar', 'Pembelajaran HTML', 'HyperText Markup Language atau yang biasa disingkat dengan HTML merupakan sebuah standar bahasa pemrograman web untuk merancang sebuah halaman web.\r\nPada saat ini HTML telah mencapai versi 5 atau HTML5', 'Muliana Insan Wahyudi', '2017-02-04 22:45:54', '/images/artikel/Pemrograman Web/html-154434_1280.png'),
(14, 4, 'JavaScript dasar', 'Tutorial tentang JavaScript', 'JavaScript merupakan sebuah bahasa pemrograman web yang dikembangkan oleh Mosaic (Netscape). Bahasa pemrograman ini bersifat dinamis, diimplementasikan pada sebuah halaman web untuk membuat sebuah interaksi pada pengguna dan membuat web menjadi dinamis.\r\nPada awalnya bernama LiveScript namun akhirnya berganti menjadi JavaScript', 'Muliana Insan Wahyudi', '2017-02-04 22:59:18', '/images/artikel/Pemrograman Web/programming-1009134_1280.jpg'),
(15, 1, 'Lowongan Kerja/Karir di ITMedia-Com', 'Lowongan Kerja/Karir di ITMedia-Com', 'Halo para pengunjung website ITMedia-Com. Tahun baru 2017 telah mengampiri kita semua pada saat ini dan tidak terasa tahun 2016 telah dilalui.\r\nBagi kalian yang sedang mencari pekerjaan ITMedia-Com membuka peluang sebagai perusahaan rintisan untuk memulai karir kalian di dunia industri. Sebagai berikut :\r\n1.) Android Apps Programmer = memahami pemrograman Java OOP dan database(SQLite dan sebagainnya), fresh greduate dipersilakan.\r\n2.) Desainer Grafis = memahami software desain grafis seperti CorelDraw, Adobe Photoshop, dan lainnya, memahami dengan baik konsep layout.\r\n3.) Animator = memahami flat animation menggunakan Adobe After Effects atau software sejenis.', 'Muliana Insan Wahyudi', '2017-02-04 23:01:47', '/images/artikel/ITMedia-Com/logo_itmedia_flat_400px.png'),
(16, 1, 'asdf1', 'asdf1', 'asdf1. asdf asdf asdf asdf asdf', 'Muliana Insan Wahyudi', '2017-02-13 22:23:20', '/images/artikel/ITMedia-Com/16107017_1250149965022847_351059797_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
`id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `tanggal`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, '2016-12-18', 'Muliana Insan Wahyudi', 'm@gmail.com', 'pesan website standar', 'Â saya ingin memesan website standar "profile".'),
(2, '2016-12-21', 'Arief Rachman', 'arief.smkmanggala@gmail.com', 'Project Video', 'Â saya ingin membuat video clip..'),
(3, '2016-12-23', 'muliana', 'aizawa@gmail.com', 'asdf', 'asdf'),
(4, '2016-12-25', 'Aizawa Ayumu', 'aizawa.ayumu05@gmail.com', 'Pesan Website Standar \\"Profil', 'pesan website standar untuk profil'),
(5, '2016-12-30', 'asfa', 'asfasd@gmail.com', 'sadfads', 'asdfasd'),
(6, '2016-12-30', 'Suhartono', 'suhartonoxxxxx@gmail.com', 'Pesan banner.', 'saya ingin memesan banner ukuran 30 meter'),
(7, '2017-01-04', 'Yudha Nuriawan', 'yudha.1979@gmail.com', 'WEBSITE PROFILE', 'saya pesan untuk pembuatan website profile'),
(8, '2017-01-04', 'Muliana', 'm@gmail.com', 'ITMEDIA-COMPUTER IS THE BEST!!', 'Saya ingin mengatakan bahwa ITMedia-Com merupakan perusahaan rintisan terbaik saat ini'),
(9, '2017-01-19', 'Kausar', 'kausar12@gmail.com', 'Jaringan Komputer MAN', 'Saya memesan untuk dipasangkan jaringan berbasis wireless di kantor saya dan kantor klien saya. Terima kasih\r\n\r\nBokep terbaru klik disini'),
(10, '2017-02-06', 'asdf', 'asdf@gmail.com', 'hardwired to selt destruct', 'album terbaru-nya metallica, men...');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(3) unsigned NOT NULL,
  `nm_kategori` varchar(30) NOT NULL DEFAULT '',
  `deskripsi` varchar(220) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`, `deskripsi`) VALUES
(1, 'ITMedia-Com', 'Memberitahukan tentang artikel terbaru tentang ITMedia-Com'),
(2, 'layanan', 'Menjelaskan tentang layanan yang ditawarkan oleh ITMedia'),
(3, 'portfolio', 'Mendeskripsikan tentang Portfolio yang telah diselesaikan untuk klien'),
(4, 'Pemrograman Web', 'Membahas tentang tutorial pemrograman web');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `alamat`, `jenis`, `telp`, `email`, `ket`) VALUES
(1, 'Muliana Insan Wahyudi', 'Jl. Pondok Kacang Prima', 'Web Programmer dan Leader ITMedia-Com', '089664436651', 'muliana.insan05@gmail.com', 'Web Programmer dan pimpinan ITMedia-Com'),
(2, 'Sandy Kurniawan Ruhiat', 'Pondok Pertama Hijau', 'Administrator Web', '0813XXX', '@gmail.com', 'Konsep Staff, Administartor Web, dan Additonal Programmer'),
(3, 'Raden Aditya Dharma Yeah', 'Jl. Gang Gareng 1', 'Multimedia 1', '0896xxxxx', 'teamgalatic12@gmail.com', 'Desainer Grafis, Motion Grapher.');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_chat`
--

CREATE TABLE IF NOT EXISTS `pesan_chat` (
`id_pesan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pengirim` varchar(35) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_chat`
--

INSERT INTO `pesan_chat` (`id_pesan`, `id`, `pengirim`, `penerima`, `pesan`, `waktu`) VALUES
(1, 1, 'muliana98', 'freely_test12', 'sdfg', '2017-04-09 15:05:30'),
(2, 1, 'muliana98', 'cacha12', 'bnm', '2017-04-11 22:33:00'),
(3, 1, 'muliana98', 'freely_test12\r\n										<font size', 'asfd', '2017-04-13 15:16:49'),
(4, 1, 'muliana98', '<br />\r\n<b>Notice</b>:  Undefined i', 'asdf', '2017-04-13 18:12:24'),
(5, 1, 'muliana98', '<br />\r\n<b>Notice</b>:  Undefined i', 'asdf', '2017-04-13 18:12:50'),
(6, 1, 'muliana98', 'freely_test12', 'asdf', '2017-04-13 18:15:41'),
(7, 1, 'muliana98', 'cacha12\r\n										<div class=''moda', 'asdf', '2017-04-17 13:34:01'),
(8, 1, 'muliana98', 'cacha12\r\n										<div class=''moda', 'asdf', '2017-04-17 13:36:39'),
(9, 1, 'muliana98', 'cacha12\r\n										<font size=''3'' c', 'asdf', '2017-04-17 13:37:39'),
(10, 1, 'muliana98', 'cacha12', 'asdf', '2017-04-17 13:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

CREATE TABLE IF NOT EXISTS `slide_show` (
`id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(220) DEFAULT NULL,
  `gambar` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Selamat Datang di ITMedia-Com', 'ITMedia-Com adalah sebuah perusahaan startup yang bergerak di bidang Teknologi Informasi. Perusahaan ini di dirikan pada 20 Januari 2015, beranggota 8 orang dan ahli dalam bidangnya. (ITMedia)', 'itmedia_lightning.jpg'),
(2, 'Visi dan Misi ITMedia-Com', 'Moto kami berikan: Menjawab kebutuhan anda akan pentingnya Teknologi Informasi. Visi dan Misi: Membangun Sarana dan Prasarana Teknologi Informasi yang semakin berkembang pesat (ITMedia-Com)', 'itmedia_jpg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE IF NOT EXISTS `tentang` (
`id_tentang` int(3) unsigned NOT NULL,
  `nm_tentang` varchar(35) NOT NULL DEFAULT '',
  `link` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `gambar` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `nm_tentang`, `link`, `ket`, `gambar`) VALUES
(1, 'Facebook', 'https://fb.com/itmedia.computer15', 'ITMedia-Com', 'facebook_logo.png'),
(2, 'Twitter', 'https://twitter.com/@itmedia_computer', 'ITMedia-Com', 'twitter_logo.png'),
(3, 'Google+', 'https://plus.google.com/ITMedia-Com', 'ITMedia-Com', 'google_plus_logo.png'),
(4, 'Web ITMedia-Com v1.4.3', 'https://itmedia-computer.co.id', 'Ini adalah versi 1.4.3 dari website ITMedia-Com, kedepannya akan ditambah fitur lainnya. Dibuat dengan bahasa pemrograman PHP prosedural dan MySQL (metode mysqli_* ). - SUKSES MIGRASI KE METODE MYSQLI_*', 'logo_itmedia_flat_400px.png'),
(5, 'SMK Manggala Ciledug', 'https://smkmanggala.sch.id/', 'SMK Manggala Ciledug - Kota Tangerang', 'logo manggala.png'),
(6, 'ITMedia-Com V.1.4.3', 'https://itmedia.co.id', 'ITMedia versi 1.4.3 telah memiliki fitur chat ke sesama anggota ITMedia-Com.\r\nDan berhasil dengan baik', 'logo_itmedia_flat_400px_2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_chat`
--
ALTER TABLE `pesan_chat`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
 ADD PRIMARY KEY (`id_tentang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan_chat`
--
ALTER TABLE `pesan_chat`
MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
MODIFY `id_tentang` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
