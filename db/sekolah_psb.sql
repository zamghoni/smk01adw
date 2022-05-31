-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 11:34 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `id` int(55) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','guru','siswa') NOT NULL,
  `kon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`id`, `username`, `password`, `level`, `kon_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0),
(2, 'guru1', '21232f297a57a5a743894a0e4a801fc3', 'guru', 1),
(3, 'guru2', '21232f297a57a5a743894a0e4a801fc3', 'guru', 2),
(4, 'guru4', '21232f297a57a5a743894a0e4a801fc3', 'guru', 4),
(5, 'guru5', '21232f297a57a5a743894a0e4a801fc3', 'guru', 5),
(19, '001-PSB-2021', 'c4ca4238a0b923820dcc509a6f75849b', 'siswa', 1),
(20, '002-PSB-2021', '93279e3308bdbbeed946fc965017f67a', 'siswa', 121212),
(21, '003-PSB-2022', '77f3ffc196859645fe95aff266d57ef8', 'siswa', 5656565),
(22, '004-PSB-2022', '3b980eb3322a393bab4867841c29f0ee', 'siswa', 89765544),
(23, '006-PSB-2022', 'e6d94328665d1c715cbd9c144238d69a', 'siswa', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `m_guru`
--

CREATE TABLE `m_guru` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_guru`
--

INSERT INTO `m_guru` (`id`, `nama`) VALUES
(1, 'Khaerudin S.Pd'),
(2, 'Joko Susanto S.Pd'),
(4, 'Rahmayani S.Pd'),
(5, 'Dwi Maharani S.Pd');

--
-- Triggers `m_guru`
--
DELIMITER $$
CREATE TRIGGER `hapus_guru` AFTER DELETE ON `m_guru` FOR EACH ROW BEGIN
DELETE FROM m_admin WHERE m_admin.level = 'guru' AND m_admin.kon_id = OLD.id;
DELETE FROM m_soal WHERE m_soal.id_guru = OLD.id;
DELETE FROM tr_guru_mapel WHERE tr_guru_mapel.id_guru = OLD.id;
DELETE FROM tr_guru_tes WHERE tr_guru_tes.id_guru = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_mapel`
--

CREATE TABLE `m_mapel` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mapel`
--

INSERT INTO `m_mapel` (`id`, `nama`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Matematika'),
(4, 'IPA');

--
-- Triggers `m_mapel`
--
DELIMITER $$
CREATE TRIGGER `hapus_mapel` AFTER DELETE ON `m_mapel` FOR EACH ROW BEGIN
DELETE FROM m_soal WHERE m_soal.id_mapel = OLD.id;
DELETE FROM tr_guru_mapel WHERE tr_guru_mapel.id_mapel = OLD.id;
DELETE FROM tr_guru_tes WHERE tr_guru_tes.id_mapel = OLD.id;
DELETE FROM tr_siswa_mapel WHERE tr_siswa_mapel.id_mapel = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `id_siswa` varchar(55) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_siswa`
--

INSERT INTO `m_siswa` (`id_siswa`, `nama`, `nim`, `jurusan`) VALUES
('0089765544', 'Muhammad Irkham Maulana', '004-PSB-2022', 'Akuntansi'),
('1', 'Nico Dwi Novianto', '001-PSB-2021', 'Teknik Komputer Jaringan (TKJ)'),
('121212', 'Warmo', '002-PSB-2021', 'Teknik Kendaraan Ringan (TKR)'),
('5656565', 'Yulianto Dzaky', '003-PSB-2022', 'Teknik Komputer Jaringan (TKJ)'),
('7463587463', 'Irkham Maul', '006-PSB-2022', 'Teknik Komputer Jaringan (TKJ)');

-- --------------------------------------------------------

--
-- Table structure for table `m_soal`
--

CREATE TABLE `m_soal` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL,
  `bobot` int(2) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_soal`
--

INSERT INTO `m_soal` (`id`, `id_guru`, `id_mapel`, `bobot`, `gambar`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`, `tgl_input`) VALUES
(24, 1, 1, 5, '1.png', 'Makna kata bercetak miring pada teks tersebut\r\nadalah .......', 'Tercebur', 'Terjatuh', 'Terjerumus', 'Terpeleset', 'Tersepak', 'D', '2020-07-10 07:14:36'),
(25, 1, 1, 5, '', 'Pertanyaan yang jawabannya terdapat pada teks\r\ntersebut adalah .............', 'Kapan mobil Honda Jazz tergelincir?', 'Di mana mobil Honda Jazz tergelincir?', 'Siapa yang menolong korban dalam peristiwa itu?', 'Bagaimana penanganan para korban ?', 'Kenapa mobil Honda Jazz bisa mengalami tergelincir?', 'B', '2020-07-10 07:18:05'),
(26, 1, 1, 5, '2.png', 'Simpulan isi teks tersebut adalah ...........', 'Kecelakaan itu terjadi diduga karena rem blong saat melintas di jalan Layang dan kondisi jalan menikung serta menurun.', 'Kecelakaan tunggal menimpa sebuah mobil pickup di jalan Layang Cipondoh, Tanggerang.', 'Mobil tersebut membawa 23 santri Pondok Pesantren Miftahul Huda, 3 orang meninggal dunia dan 20 orang luka-luka.', 'Kecelakaan mobil pickup terjadi di jalan layang Cipondoh, Tanggerang, diduga karena rem blong saat melintas di jalan layang.', 'Mobil pickup mengalami kecelakaan, cari kecelekaan tersebut menimbulkan kemacetan hingga 100 Km.', 'D', '2020-07-10 07:26:15'),
(27, 1, 1, 5, '3.png', 'Ide pokok paragraf pertama teks tersebut adalah .........', 'PSSI tidak memperpanjang kontra Luis Milla di Timnas Indonesia', 'Kontra Luis Milla di Timnas Indonesia dianggap terlalu mahal', 'PSSI mengeluarkan uang banyak di Piala AFF 2018', 'PSSI harus merogoh kocek dalam-dalam', 'PSSI mengalami kerugian', 'C', '2020-07-10 08:00:43'),
(28, 1, 1, 5, '', 'Kalimat utama paragraf kedua teks tersebut adalah .......', '1', '2', '3', '4', '1 dan 4', 'A', '2020-07-10 08:02:43'),
(29, 1, 1, 5, '4.png', 'Pendapat yang mendukung permasalahan pada teks\r\ntersebut adalah ......', '1', '2', '3', '4', '2 dan 3', 'B', '2020-07-10 08:06:40'),
(30, 1, 1, 5, '', 'Ringkasan isi teks tersebut adalah .......', 'Para pedagang konter pulsa memprotes pembatasan 1 NIK untuk registrasi 3 kartu SIM karena menilai ketentuan itu mengancan usaha mereka gulung tikar.', 'Sedangkan Kementerian Kominfo memberlakukan sanksi pemblokiran bertahap terhadap layanan kartu SIM yang tidak teregistrasi, sejak akhir Februari 2018.', 'Para pedagang pulsa memprotes pembatasan 1 NIK untuk registrasi 3 kartu SIM Sedangkan Kementerian Kominfo memberlakukan sanksi pemblokiran bertahap terhadap layanan kartu SIM yang tidak teregistrasi.', 'Mayoritas konter pulsa saat ini bergantung pada penjualan kartu perdana berisi paket data atau internet. Sementara itu kartu seluler yang tak teregistrasi akan terblokir total, termasuk layanan data internetnya akan terhenti.', 'Semua konter pulsa sedang mengalami kerugian akibat dampak tersebut.', 'C', '2020-07-10 08:11:49'),
(31, 1, 1, 5, '5.png', 'Perbedaan pola penyajian kedua teks tersebut adalah .........', 'Teks 1 : dikembangkan dengan urutan waktu sedangkan Teks 2 : dikembangkan dengan urutan ruang', 'Teks 1 : dikembangkan dengan urutan ruang sedangkan Teks 2 : dikembangkan dengan urutan topik', 'Teks 1 : dikembangkan dengan urutan ruang sedangkan Teks 2 : dikembangkan dengan urutan waktu', 'Teks 1 : dikembangkan dengan urutan topik sedangkan Teks 2 : dikembangkan dengan urutan waktu', 'Teks 1 : dikembangkan dengan urutan waktu dan topik sedangkan Teks 2 : dikembangkan dengan urutan waktu dan ruang.', 'C', '2020-07-10 08:18:17'),
(32, 1, 1, 5, '6.png', 'Bagian yang merupakan keunggulan karya terdapat\r\npada kalimat ditandai nomor .........', '4', '5', '6', '7', '2', 'D', '2020-07-10 08:28:12'),
(33, 1, 1, 5, '', 'Makna kata yang dicetak tebal pada teks tersebut\r\nadalah ......', 'Kain yang digunakan untuk menutupi muka dan tubuh wanita muslim sehingga bagian tubuhnya tidak terlihat', 'Dinding yang membatasi sesuatu dengan yang lain', 'Dinding yang membatasi hati manusia dengan Allah', 'Dinding yang menghalangi seseorang dari mendapat harta waris', 'Wanita muslim sangat berwibawa', 'A', '2020-07-10 09:07:12'),
(34, 1, 1, 5, '8.png', 'Watak tokoh ibunya Sisi pada teks tersebut adalah ........', 'peduli pendidikan', 'tidak bertanggung jawab', 'sangat menyayangi anaknya', 'suka memukuli anaknya', 'sangat menjaga anaknya', 'B', '2020-07-10 09:11:45'),
(35, 1, 1, 5, '', 'Kutipan cerpen tersebut merupakan bagan .....', 'pengenalan', 'pemunculan masal', 'puncak masalah', 'penurunan masalah', 'penutup cerita', 'C', '2020-07-10 09:13:21'),
(36, 1, 1, 5, '9.png', 'Latar suasana pada teks tersebut adalah .....', 'mengharukan', 'menyenangkan', 'menegangkan', 'menyedihkan', 'mengecewakan', 'A', '2020-07-10 09:19:09'),
(37, 1, 1, 5, '10.png', 'Makna simbol mengambinghitamkan pada cerpen\r\ntersebut adalah .......', 'tumpuan kesalahan', 'tumpuan harapan', 'sasaran kemarahan', 'objek penderita', 'menyakitkan', 'A', '2020-07-10 09:21:15'),
(38, 1, 1, 5, '11.png', 'Nilai moral yang terdapat dalam kutipan cerpen\r\ntersebut adalah ......', 'Intan membantu nenek menyeberang jalan meskipun ia tak mengenalnya.', 'Intan terburu-buru berangkat ke sekolah.', 'Setelah membantu nenek , Intan segera menuju gerbang sekolah.', 'Intan bersalaman dan mencium tangan nenek yang sangat ia kenal.', 'Intan terjatuh saat menolong nenek.', 'A', '2020-07-10 09:24:41'),
(39, 5, 4, 5, '', 'Ciri?ciri hewan adalah sebagai berikut, kecuali .........', 'dapat bernapas dan berpindah tempat', 'memerlukan makanan dan minuman', 'dapat membuat makanan sendiri', 'dapat bereproduksi', 'memerlukan napas buatan', 'C', '2020-07-10 09:31:15'),
(40, 5, 4, 5, '', 'Alat pernapasan pada tumbuhan adalah ......', 'stomata dan lenti sel', 'stomata dan gabus', 'dapat membuat makanan sendiri', 'dapat bereproduksi', 'paru-paru', 'A', '2020-07-10 09:32:39'),
(41, 5, 4, 5, '', 'Enzim yang dihasilkan oleh kelenjar ludah yang\r\ndapat mengubah zat tepung menjadi zat gula\r\nadalah .....', 'enzim lipase', 'enzim pepsin', 'enzim ptialin', 'enzim amylase', 'enzim mutualisme', 'C', '2020-07-10 09:34:13'),
(42, 5, 4, 5, '', 'Beberapa ciri sel sebagai berikut :\r\n1. berbentuk panjang\r\n2. berbentuk pendek\r\n3. berinti tunggal\r\n4. berinti banyak\r\n5. tidak berwarna\r\n6. warna merah muda dan tua\r\nCiri yang dimiliki oleh sel otot lurik adalah nomor ............', '1, 3, 5 ', '1, 4, 6', '2, 3, 5', '2, 4, 5', 'semuanya benar', 'B', '2020-07-10 09:37:57'),
(43, 5, 4, 5, '', 'Pernyataan manakah yang menunjukkan cara\r\npengangkutan hormon di dalam tubuh!', 'hormon diedarkan ke seluruh tubuh melalui jaringan saraf dan berlangsung cepat', 'hormon diangkut dari kelenjar buntu dan di? edarkan ke seluruh tubuh oleh darah ber? langsung lambat', 'hormon beredar bersamaan peredaran darah menuju jaringan dan organ?organ tertentu', 'hormon diedarkan oleh pembuluh limfe dari kelenjar buntu menuju jaringan dan organ tertentu', 'hormon penyalur udara untuk pernapasan', 'B', '2020-07-10 09:42:35'),
(44, 5, 4, 5, '', 'Diketahui luas lahan 100 meter persegi. Tanaman\r\nyang akan ditanam 200 tanaman. Maka banyak\r\ntanaman untuk setiap 1 meter persegi adalah….', '0,2 tanaman/meter persegi', '2 tanaman/meter persegi', '20 tanaman/meter persegi', '200 tanaman/meter persegi', '50 tanaman/meter persegi', 'B', '2020-07-15 11:24:19'),
(45, 5, 4, 5, '', 'Perhatikan ciri?ciri tumbuhan berikut!\r\n1. Tumbuhan berbentuk pohon atau semak\r\n2. Memiliki sistem perakaran tunggang\r\n3. Batang berkayu\r\n4. Biji tidak dibungkus oleh daun buah\r\n5. Organ reproduksi berbentuk kerucut\r\nTumbuhan yang memiliki ciri di atas adalah….', 'tumbuhan biji tertutup (Angiospermae)', 'tumbuhan biji terbuka (Gymnospermae)', 'tumbuhan berkeping satu (Monokotil)', 'tumbuhan berkeping dua (Dikotil)', 'tumbuhan berkeping tiga (Trikotil)', 'B', '2020-07-15 11:26:01'),
(46, 5, 4, 5, '', 'Sekumpulan sel?sel yang memiliki bentuk dan fungsi\r\nyang sama adalah ….', 'organisme', 'sistem organ', 'organ', 'jaringan', 'monokotil', 'D', '2020-07-15 11:27:13'),
(47, 5, 4, 5, '', 'Dari persilangan bergenotif BBCC×bbcc diperoleh\r\nF1 (BbCc). Jika F1 disilangkan dengan sesamanya\r\nkemungkinan keturunan yang bergenotif BBCc\r\nmemiliki perbandingan ….', '1 : 16 ', '2: 16 ', '3 : 16', '4 :16', '5 : 20', 'B', '2020-07-15 11:28:56'),
(48, 5, 4, 5, '', 'Pengertian adaptasi morfologi adalah ….', 'penyesuaian bentuk alat?alat makhluk hidup terhadap lingkungannya', 'penyesuaian kerja tubuh makhluk hidup terha? dap lingkungannya', 'penyesuaian tingkah laku makhluk hidup ter? hadap lingkungannya', 'penyesuaian cara berkembang biak makhluk hidup terhadap lingkungannya', 'penyusutun berkembang biak makhluk hidup', 'A', '2020-07-15 11:31:56'),
(49, 5, 4, 5, '', 'Di bawah ini adalah contoh adaptasi tingkah laku ….', 'burung elang berparuh tajam', 'kaki itik berselaput', 'rayap memiliki enzim selulosa untuk mencerna kayu', 'paus sering muncul di permukaan laut', 'ikan bernafas menggunakan insang', 'D', '2020-07-15 11:34:11'),
(50, 5, 4, 5, '', 'Perhatikan pernyataan?pernyataan berikut!\r\n1. membatasi penelitian?penelitian tentang sumber\r\ndaya alam\r\n2. penggunaan sumber daya alamsebaik mungkin\r\n3. mementingkan kelanjutan penggunaan sumber\r\ndaya alam\r\n4. eksplorasi sumber daya alam secara besar?\r\nbesaran\r\nCara?cara pengolahan sumber daya alam yang\r\nberwawasan lingkungan untuk meningkatkan taraf\r\nhidup manusia adalah ….', '1 dan 2', '2 dan 3', '2 dan 4', '3 dan 4', '1, 3 dan 4', 'B', '2020-07-15 11:37:14'),
(51, 5, 4, 5, '', 'Perhatikan data berikut:\r\n1. Urea\r\n2. KCl\r\n3. NPK\r\n4. TSP\r\nDari data di atas jenis pupuk yang mengandung\r\nnitrogen adalah ….', '1 dan 2 ', '1 dan 3', '3 dan 4', '1 dan 4', '2 dan 4', 'B', '2020-07-15 11:39:27'),
(52, 5, 4, 5, '', 'Kriteria rumah tinggal yang baik adalah….', 'terbuat dari tembok', 'ada ventilasi atau lubang angin', 'bagus', 'selalu tertutup', 'tidak memiliki jendela', 'B', '2020-07-15 11:41:00'),
(53, 5, 4, 5, '', '2 Kg air dari suhu 24? dipanaskan menjadi 90?,\r\njika kalor jenis 4.200 Joule/Kg?, maka kalor yang\r\nditerima air adalah ….', '336.000 Joule', '259.200 Joule', '554.400 Joule', '543.600 Joule', '456.700 Joule', 'C', '2020-07-15 11:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bakat`
--

CREATE TABLE `tbl_bakat` (
  `id` int(11) NOT NULL,
  `nomor_piagam` varchar(255) NOT NULL,
  `no_pendaftaran` varchar(20) NOT NULL,
  `nama_prestasi` varchar(255) NOT NULL,
  `juara_ke` int(2) NOT NULL,
  `tingkat` varchar(30) NOT NULL,
  `tahun_prestasi` int(4) NOT NULL,
  `nilai_bakat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bakat`
--

INSERT INTO `tbl_bakat` (`id`, `nomor_piagam`, `no_pendaftaran`, `nama_prestasi`, `juara_ke`, `tingkat`, `tahun_prestasi`, `nilai_bakat`) VALUES
(1, '', '001-PSB-2021', 'EWEW', 2, 'Desa/Kelurahan', 2013, 0),
(2, '', '002-PSB-2021', 'wew', 2, 'Kecamatan', 2010, 0),
(3, '', '003-PSB-2022', 'Mobile Lagends', 2, 'Provinsi', 2013, 0),
(4, '', '004-PSB-2022', 'Mobile Lagends', 1, 'Nasional', 2022, 0),
(5, '', '006-PSB-2022', 'Karate', 1, 'Nasional', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `no_pendaftaran` varchar(25) NOT NULL,
  `nama_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `no_pendaftaran`, `nama_foto`) VALUES
(1, '001-PSB-2021', 'default.jpg'),
(2, '002-PSB-2021', 'default.jpg'),
(3, '003-PSB-2022', 'default.jpg'),
(4, '004-PSB-2022', 'default.jpg'),
(5, '006-PSB-2022', 'logo-fl2mi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `no_pendaftaran` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai_bakat` int(11) NOT NULL,
  `nilai_rapot` int(11) NOT NULL,
  `nilai_un` int(11) NOT NULL,
  `nilai_seleksi` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `registered` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `no_pendaftaran`, `nama`, `nilai_bakat`, `nilai_rapot`, `nilai_un`, `nilai_seleksi`, `rata_rata`, `total_nilai`, `keterangan`, `registered`) VALUES
(1, '001-PSB-2021', 'Nico Dwi Novianto', 0, 6, 122728, 0, 0, 0, '', ''),
(2, '002-PSB-2021', 'Warmo', 0, 90, 33396, 0, 0, 0, '', ''),
(3, '003-PSB-2022', 'Yulianto Dzaky', 0, 83, 612000, 0, 0, 0, '', ''),
(4, '004-PSB-2022', 'Muhammad Irkham Maulana', 0, 81, 452250, 0, 0, 0, '', ''),
(5, '006-PSB-2022', 'Irkham Maul', 0, 79, 541875, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nominal`
--

CREATE TABLE `tbl_nominal` (
  `id` int(11) NOT NULL,
  `nominal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nominal`
--

INSERT INTO `tbl_nominal` (`id`, `nominal`) VALUES
(1, '150000'),
(2, '3500000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdd`
--

CREATE TABLE `tbl_pdd` (
  `id_pdd` int(11) NOT NULL,
  `nama_pdd` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pdd`
--

INSERT INTO `tbl_pdd` (`id_pdd`, `nama_pdd`) VALUES
(1, 'Tdk Sekolah'),
(2, 'SD/MI'),
(3, 'SMP/MTs'),
(4, 'SMA/SMK/MA'),
(5, 'DIPLOMA'),
(6, 'S1'),
(7, 'S2'),
(8, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) DEFAULT NULL,
  `ket_pekerjaan` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `ket_pekerjaan`) VALUES
(1, 'Buruh', 'ayah'),
(2, 'Tani', 'ayah'),
(3, 'Wiraswasta', 'ayah'),
(4, 'PNS', 'ayah'),
(5, 'TNI/POLRI', 'ayah'),
(6, 'Perangkat Desa', 'ayah'),
(7, 'Nelayan', 'ayah'),
(8, 'Lain-lain ', 'ayah'),
(9, 'Ibu Rumah Tangga\r\n', 'ibu'),
(10, 'Buruh', 'ibu'),
(11, 'Tani', 'ibu'),
(12, 'Wiraswasta', 'ibu'),
(13, 'PNS', 'ibu'),
(14, 'TNI/POLRI', 'ibu'),
(15, 'Perangkat Desa', 'ibu'),
(16, 'Nelayan', 'ibu'),
(17, 'Lain-lain', 'ibu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` int(11) NOT NULL,
  `pendaftaran` varchar(32) NOT NULL,
  `jumlah` varchar(32) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penghasilan`
--

CREATE TABLE `tbl_penghasilan` (
  `id_penghasilan` int(10) NOT NULL,
  `nama_penghasilan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penghasilan`
--

INSERT INTO `tbl_penghasilan` (`id_penghasilan`, `nama_penghasilan`) VALUES
(1, '< 500rb'),
(2, '500-1jt'),
(3, '1jt-3jt'),
(4, '3jt-5jt'),
(5, '5jt-10jt'),
(6, '>10jt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `ket_pengumuman` text,
  `tgl_pengumuman` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `ket_pengumuman`, `tgl_pengumuman`) VALUES
(1, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><strong><u>Keterangan :</u></strong></span></span></span><br />\r\n<span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;1.&nbsp;Registrasi daftar ulang dilaksanakan pada tanggal 8 &ndash; 11 Juli 2019&nbsp;pukul 08.00 &ndash; 14.00 </span></span></span></span><br />\r\n<span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;2. Mencetak dan membawa Surat Pengumuman ini sebagai bukti&nbsp; lulus seleksi</span></span></span></span><br />\r\n<span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt">&nbsp; &nbsp; &nbsp; &nbsp; 3.&nbsp;Membawa materai Rp. 6000,- sebanyak 2 lembar</span></span></span></span></p>\r\n</body>\r\n</html>\r\n', '2018-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rapor`
--

CREATE TABLE `tbl_rapor` (
  `id_rapor` int(10) NOT NULL,
  `mapel` varchar(100) DEFAULT NULL,
  `semester1` int(10) DEFAULT NULL,
  `semester2` int(10) DEFAULT NULL,
  `semester3` int(10) DEFAULT NULL,
  `semester4` int(10) DEFAULT NULL,
  `semester5` int(10) DEFAULT NULL,
  `rata_rata_nilai` int(10) DEFAULT NULL,
  `no_pendaftaran` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rapor`
--

INSERT INTO `tbl_rapor` (`id_rapor`, `mapel`, `semester1`, `semester2`, `semester3`, `semester4`, `semester5`, `rata_rata_nilai`, `no_pendaftaran`) VALUES
(1, 'Ilmu Pengetahuan Alam (IPA)', 67, 67, 56, 7, 8, 41, '001-PSB-2021'),
(2, 'Matematika', 76, 9, 8, 7, 7, 21, '001-PSB-2021'),
(3, 'Bahasa Indonesia', 67, 7, 6, 77, 7, 33, '001-PSB-2021'),
(4, 'Bahasa Inggris', 5, 8, 7, 3, 7, 6, '001-PSB-2021'),
(5, 'Ilmu Pengetahuan Alam (IPA)', 90, 90, 90, 90, 90, 90, '002-PSB-2021'),
(6, 'Matematika', 90, 99, 90, 89, 78, 89, '002-PSB-2021'),
(7, 'Bahasa Indonesia', 90, 76, 55, 90, 90, 80, '002-PSB-2021'),
(8, 'Bahasa Inggris', 90, 90, 90, 90, 90, 90, '002-PSB-2021'),
(9, 'Ilmu Pengetahuan Alam (IPA)', 85, 85, 90, 75, 75, 82, '003-PSB-2022'),
(10, 'Matematika', 85, 80, 80, 75, 70, 78, '003-PSB-2022'),
(11, 'Bahasa Indonesia', 80, 80, 75, 70, 70, 75, '003-PSB-2022'),
(12, 'Bahasa Inggris', 81, 83, 84, 86, 81, 83, '003-PSB-2022'),
(13, 'Ilmu Pengetahuan Alam (IPA)', 65, 65, 86, 87, 90, 79, '004-PSB-2022'),
(14, 'Matematika', 50, 60, 75, 80, 90, 71, '004-PSB-2022'),
(15, 'Bahasa Indonesia', 80, 82, 83, 85, 87, 83, '004-PSB-2022'),
(16, 'Bahasa Inggris', 86, 75, 75, 86, 85, 81, '004-PSB-2022'),
(17, 'Ilmu Pengetahuan Alam (IPA)', 88, 85, 86, 90, 90, 88, '006-PSB-2022'),
(18, 'Matematika', 50, 88, 75, 85, 90, 78, '006-PSB-2022'),
(19, 'Bahasa Indonesia', 80, 82, 83, 90, 87, 84, '006-PSB-2022'),
(20, 'Bahasa Inggris', 75, 75, 75, 86, 85, 79, '006-PSB-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang_ujian`
--

CREATE TABLE `tbl_ruang_ujian` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruang_ujian`
--

INSERT INTO `tbl_ruang_ujian` (`id`, `nama_ruang`) VALUES
(1, 'Ruang 1'),
(2, 'Ruang 2'),
(3, 'Ruang 3'),
(4, 'Ruang 4'),
(5, 'Ruang 5'),
(6, 'Ruang 6'),
(7, 'Ruang 7'),
(8, 'Ruang 8'),
(9, 'Ruang 9'),
(10, 'Ruang 10'),
(11, 'Ruang 11'),
(12, 'Ruang 12'),
(13, 'Ruang 13'),
(14, 'Ruang 14'),
(15, 'Ruang 15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(100) NOT NULL,
  `no_pendaftaran` varchar(20) NOT NULL,
  `password` text,
  `nisn` int(30) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `tempat_lahir` text,
  `tgl_lahir` varchar(10) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_saudara_kandung` int(11) NOT NULL,
  `jml_saudara_tiri` int(11) NOT NULL,
  `alamat_siswa` text,
  `telp_siswa` varchar(13) NOT NULL,
  `pil_jurusan` varchar(55) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pdd_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `no_hp_ayah` varchar(14) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pdd_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `no_hp_ibu` varchar(14) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pdd_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` varchar(100) DEFAULT NULL,
  `no_hp_wali` varchar(14) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tgl_siswa` datetime DEFAULT NULL,
  `nomor_ijazah` varchar(15) NOT NULL,
  `asal_sekolah` varchar(225) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `matematika` varchar(3) NOT NULL,
  `bahasa_indonesia` varchar(3) NOT NULL,
  `ipa` varchar(3) NOT NULL,
  `jml_nilai_un` varchar(3) NOT NULL,
  `status_verifikasi` varchar(30) DEFAULT NULL,
  `status_pendaftaran` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `no_pendaftaran`, `password`, `nisn`, `nama_lengkap`, `jk`, `tempat_lahir`, `tgl_lahir`, `agama`, `anak_ke`, `jml_saudara_kandung`, `jml_saudara_tiri`, `alamat_siswa`, `telp_siswa`, `pil_jurusan`, `nama_ayah`, `pdd_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nama_ibu`, `pdd_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `nama_wali`, `pdd_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `foto`, `tgl_siswa`, `nomor_ijazah`, `asal_sekolah`, `alamat_sekolah`, `tahun_lulus`, `matematika`, `bahasa_indonesia`, `ipa`, `jml_nilai_un`, `status_verifikasi`, `status_pendaftaran`) VALUES
(1, '001-PSB-2021', '1', 1, 'Nico Dwi Novianto', 'Laki-Laki', 'JAKARTA', '26-02-2004', 'Islam', 2, 2, 2, 'Mega mall ciputat', '082328251600', 'Teknik Komputer Jaringan (TKJ)', 'WEWE', 'SD/MI', 'Wiraswasta', '5jt-10jt', '2323', 'WEWEW', 'SD/MI', 'Ibu Rumah Tangga\r\n', '< 500rb', '23232', 'WEW', 'Tdk Sekolah', 'Buruh', '500-1jt', '2323232', NULL, '2021-11-14 19:50:42', 'WEW', 'EW', 'WEWEW', '2017', '23', '232', '23', '122', '1', NULL),
(2, '002-PSB-2021', '121212', 121212, 'Warmo', 'Laki-Laki', 'Bandung', '02-02-2004', 'Islam', 2, 3, 2, '3wewe', '23212', 'Teknik Kendaraan Ringan (TKR)', 'wewewe', 'Tdk Sekolah', 'PNS', '1jt-3jt', '2323', 'wewe', 'Tdk Sekolah', 'Buruh', '< 500rb', '2323', 'wew', 'Tdk Sekolah', 'Buruh', '500-1jt', '23223', NULL, '2021-11-14 19:52:33', '2323e', 'wew', 'ewewewe', '2018', '23', '33', '44', '333', '1', NULL),
(3, '003-PSB-2022', '5656565', 5656565, 'Yulianto Dzaky', 'Laki-Laki', 'Cirebon', '04-05-2005', 'Islam', 3, 5, 0, 'Jalan Nangka RT 2 RW 20', '6289655420961', 'Teknik Komputer Jaringan (TKJ)', 'Rudi Salim', 'S1', 'Lain-lain ', '>10jt', '628448874744', 'Nagita Yanti', 'S2', 'TNI/POLRI', '>10jt', '628448874744', '', '', '', '', '', NULL, '2022-03-10 11:12:57', '00984545466', 'SMP Negeri 10 Cirebon', 'Jalan Raya Galon, Cirebon Utara', '2019', '85', '90', '80', '612', '1', NULL),
(4, '004-PSB-2022', '0089765544', 89765544, 'Muhammad Irkham Maulana', 'Laki-Laki', 'Tegal', '15-01-2005', 'Islam', 3, 2, 0, 'Jalan Manggis RT 02 Rw 02 Kel. Procot', '6285800689339', 'Akuntansi', 'Fahrul', 'S1', 'PNS', '3jt-5jt', '6281548777538', 'Retno', 'SMA/SMK/MA', 'Wiraswasta', '500-1jt', '6281548777538', '', '', '', '', '', NULL, '2022-05-29 11:39:21', '6654334454556', 'SMP Negeri 1 Slawi', 'Jalan Nangka', '2019', '67', '75', '90', '452', NULL, NULL),
(5, '005-PSB-2022', '0089765544', 89765544, 'Muhammad Irkham Maulana', 'Laki-Laki', 'Tegal', '15-01-2005', 'Islam', 3, 2, 0, 'Jalan Manggis RT 02 Rw 02 Kel. Procot', '6285800689339', 'Akuntansi', 'Fahrul', 'S1', 'PNS', '3jt-5jt', '6281548777538', 'Retno', 'SMA/SMK/MA', 'Wiraswasta', '500-1jt', '6281548777538', '', '', '', '', '', NULL, '2022-05-29 11:39:23', '6654334454556', 'SMP Negeri 1 Slawi', 'Jalan Nangka', '2019', '67', '75', '90', '452', NULL, NULL),
(6, '006-PSB-2022', '7463587463', 2147483647, 'Irkham Maul', 'Laki-Laki', 'Debong', '05-03-2006', 'Islam', 3, 2, 0, 'Jalan Sawo', '6285800689339', 'Teknik Komputer Jaringan (TKJ)', 'Azis', 'S1', 'PNS', '3jt-5jt', '6281548777538', 'Retnoyati', 'SMA/SMK/MA', 'Wiraswasta', '500-1jt', '6281548777538', '', '', '', '', '', NULL, '2022-05-29 11:47:54', '097655', 'SMP Negeri 1 Slawi', 'Jalan Imam Bonjol', '2018', '85', '85', '75', '541', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `id_ujian` int(11) NOT NULL,
  `no_pend` varchar(20) NOT NULL,
  `no_test` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `ruang_ujian` varchar(20) NOT NULL,
  `nilai_pai` int(2) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`id_ujian`, `no_pend`, `no_test`, `nama`, `tanggal`, `ruang_ujian`, `nilai_pai`, `keterangan`) VALUES
(1, '001-PSB-2021', '001-TEST-2021', 'Nico Dwi Novianto', NULL, '', 79, ''),
(2, '002-PSB-2021', '002-TES-2021', 'Warmo', NULL, '', 90, ''),
(3, '003-PSB-2022', '003-TES-2022', 'Yulianto Dzaky', NULL, '', 0, ''),
(4, '004-PSB-2022', '004-TES-2022', 'Muhammad Irkham Maulana', NULL, '', 0, ''),
(5, '006-PSB-2022', '005-TES-2022', 'Irkham Maul', NULL, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `level`, `tgl_daftar`) VALUES
(1, 'admin', 'admin', 'Zaki Yulianto', 'admin', '2018-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verifikasi`
--

CREATE TABLE `tbl_verifikasi` (
  `id_verifikasi` int(10) NOT NULL,
  `isi` text,
  `ket` text,
  `tgl_verifikasi` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_verifikasi`
--

INSERT INTO `tbl_verifikasi` (`id_verifikasi`, `isi`, `ket`, `tgl_verifikasi`) VALUES
(1, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u>Materi Tes Potensi Akdemik :</u></strong></span></span><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u> </u></strong></span></span><br />\r\n<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp; &nbsp; &nbsp; &nbsp;1.&nbsp;Pendidikan Agama Islam (PAI)&nbsp; &nbsp; &nbsp; : 25 soal </span></span></p>\r\n\r\n<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u>Hari Tanggal tes : </u></strong></span></span><br />\r\n<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;tanggal 3 s.d 5 Juli 2019</span></span></p>\r\n\r\n<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><u>Waktu Tes potensi Akademik :</u></strong></span></span><br />\r\n<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp; &nbsp; &nbsp; &nbsp; Sesi 1&nbsp; : 07.00 - 09.00</span></span><br />\r\n<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp; &nbsp; &nbsp; &nbsp; Sesi 2&nbsp; : 09.30 - 11.30<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Sesi 3&nbsp; : 12.00 - 14.00</span></span><br />\r\n<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp; &nbsp; &nbsp; &nbsp; Sesi 4&nbsp; : 14.30 - 16.30</span></span></p>\r\n\r\n<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-family:Calibri,sans-serif"><span style="font-size:14.6667px"><strong>Note :</strong></span></span><br />\r\n<strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em>jadwal ujian bisa berubah sewaktu - waktu&nbsp; Update infomasi di web PSB&nbsp;</em></span></span><em><span style="font-size:11.0pt">peserta ujian datang 15&nbsp; menit sebelun tes dimulai.</span></em></strong></p>\r\n</body>\r\n</html>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id_web` int(10) NOT NULL,
  `status_ppdb` varchar(30) DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL,
  `ketua_panitia` varchar(255) NOT NULL,
  `kepala_sekolah` varchar(255) NOT NULL,
  `tgl_ujian` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_web`
--

INSERT INTO `tbl_web` (`id_web`, `status_ppdb`, `tgl_diubah`, `ketua_panitia`, `kepala_sekolah`, `tgl_ujian`) VALUES
(1, 'buka', '2021-11-14 19:21:25', 'Hatin Azizah S.Pd', 'Solahudin S.Pd', '2022-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `tr_guru_mapel`
--

CREATE TABLE `tr_guru_mapel` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_guru_mapel`
--

INSERT INTO `tr_guru_mapel` (`id`, `id_guru`, `id_mapel`) VALUES
(1, 1, 1),
(2, 2, 2),
(6, 5, 4),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tr_guru_tes`
--

CREATE TABLE `tr_guru_tes` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(6) NOT NULL,
  `waktu` int(6) NOT NULL,
  `jenis` enum('acak','set') NOT NULL,
  `detil_jenis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_guru_tes`
--

INSERT INTO `tr_guru_tes` (`id`, `id_guru`, `id_mapel`, `nama_ujian`, `jumlah_soal`, `waktu`, `jenis`, `detil_jenis`) VALUES
(1, 1, 1, 'Bahasa Indonesia', 15, 10, 'acak', ''),
(2, 2, 2, 'Bahasa Inggris', 5, 1, 'acak', ''),
(3, 5, 4, 'IPA', 15, 10, 'acak', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_ikut_ujian`
--

CREATE TABLE `tr_ikut_ujian` (
  `id` int(6) NOT NULL,
  `id_tes` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(6) NOT NULL,
  `nilai` int(6) NOT NULL,
  `nilai_bobot` int(6) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_ikut_ujian`
--

INSERT INTO `tr_ikut_ujian` (`id`, `id_tes`, `id_user`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(1, 1, 121212, '24,28,30,34,25,29,37,35,32,27,36,38,31,26,33', '24:A,28:A,30:A,34:B,25:C,29:E,37:D,35:C,32:A,27:B,36:B,38:B,31:A,26:B,33:C', 3, 20, 15, '2021-11-14 20:16:27', '2021-11-14 20:26:27', 'N'),
(2, 1, 5656565, '31,30,35,29,28,24,26,37,32,36,33,34,25,38,27', '31:B,30:D,35:D,29:E,28:A,24:A,26:B,37:D,32:A,36:B,33:B,34:B,25:C,38:A,27:C', 4, 27, 20, '2022-03-10 11:34:55', '2022-03-10 11:44:55', 'N'),
(3, 2, 5656565, '', ':', 1, 100, 0, '2022-03-11 09:19:14', '2022-03-11 09:20:14', 'N'),
(4, 3, 5656565, '43,53,44,39,47,40,48,45,52,46,50,41,51,42,49', '43:A,53:D,44:C,39:,47:,40:,48:,45:,52:,46:,50:,41:,51:,42:,49:', 0, 0, 0, '2022-03-30 09:02:48', '2022-03-30 09:12:48', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tr_siswa_mapel`
--

CREATE TABLE `tr_siswa_mapel` (
  `id` int(6) NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_siswa_mapel`
--

INSERT INTO `tr_siswa_mapel` (`id`, `id_siswa`, `id_mapel`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 121212, 1),
(6, 121212, 2),
(7, 121212, 3),
(8, 121212, 4),
(9, 5656565, 1),
(10, 5656565, 2),
(11, 5656565, 3),
(12, 5656565, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `m_soal`
--
ALTER TABLE `m_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bakat`
--
ALTER TABLE `tbl_bakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_nominal`
--
ALTER TABLE `tbl_nominal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pdd`
--
ALTER TABLE `tbl_pdd`
  ADD PRIMARY KEY (`id_pdd`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
  ADD PRIMARY KEY (`id_rapor`);

--
-- Indexes for table `tbl_ruang_ujian`
--
ALTER TABLE `tbl_ruang_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_verifikasi`
--
ALTER TABLE `tbl_verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- Indexes for table `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id_web`);

--
-- Indexes for table `tr_guru_mapel`
--
ALTER TABLE `tr_guru_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_guru_tes`
--
ALTER TABLE `tr_guru_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_ikut_ujian`
--
ALTER TABLE `tr_ikut_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_siswa_mapel`
--
ALTER TABLE `tr_siswa_mapel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `m_guru`
--
ALTER TABLE `m_guru`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_soal`
--
ALTER TABLE `m_soal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_bakat`
--
ALTER TABLE `tbl_bakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_nominal`
--
ALTER TABLE `tbl_nominal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pdd`
--
ALTER TABLE `tbl_pdd`
  MODIFY `id_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  MODIFY `id_penghasilan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
  MODIFY `id_rapor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_ruang_ujian`
--
ALTER TABLE `tbl_ruang_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_verifikasi`
--
ALTER TABLE `tbl_verifikasi`
  MODIFY `id_verifikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_web`
--
ALTER TABLE `tbl_web`
  MODIFY `id_web` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_guru_mapel`
--
ALTER TABLE `tr_guru_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tr_guru_tes`
--
ALTER TABLE `tr_guru_tes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tr_ikut_ujian`
--
ALTER TABLE `tr_ikut_ujian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tr_siswa_mapel`
--
ALTER TABLE `tr_siswa_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
