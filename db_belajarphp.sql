-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2026 at 02:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_belajarphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_kategori`, `judul`, `isi_berita`, `foto_berita`, `created_at`) VALUES
(2, 2, 'Gebyar Aksara Sekolah', 'Jakarta – SMK Dinamika Pembangunan 2 Jakarta menyelenggarakan kegiatan Gebyar Akasa sebagai wadah untuk mengembangkan kreativitas, bakat, minat, dan potensi peserta didik. Kegiatan ini berlangsung meriah dengan melibatkan siswa, guru, tenaga kependidikan, serta berbagai pihak yang turut mendukung kemajuan sekolah.\r\n\r\nGebyar Akasa menghadirkan beragam kegiatan menarik, mulai dari penampilan seni dan kreativitas siswa, pameran hasil karya, kompetisi antarsiswa, hingga berbagai kegiatan edukatif dan hiburan. Setiap peserta diberikan kesempatan untuk menunjukkan kemampuan, kepercayaan diri, serta hasil pembelajaran yang telah dikembangkan selama mengikuti kegiatan pendidikan di sekolah.\r\n\r\nKegiatan ini juga menjadi momentum untuk mempererat kebersamaan, meningkatkan kolaborasi, serta membangun karakter peserta didik yang kreatif, inovatif, disiplin, dan bertanggung jawab.\r\n\r\nMelalui Gebyar Akasa, SMK Dinamika Pembangunan 2 Jakarta berharap dapat terus menciptakan lingkungan pendidikan yang inspiratif dan memberikan ruang bagi siswa untuk berkarya serta berprestasi.\r\n\r\nGebyar Akasa bukan sekadar perayaan, tetapi menjadi bukti bahwa setiap siswa memiliki potensi untuk berkembang, berkreasi, dan memberikan karya terbaiknya.', 'fotoberita1.jpeg', '2026-11-09 01:06:14'),
(3, 6, 'Sengit! Man Utd Vs Aston Villa Tuntas 4-4', 'Jakarta - Hujan gol tercipta di Old Trafford kala menjamu . Setan Merah comeback dari ketertinggalan untuk memaksakan hasil akhir 4-4.\r\nLaga dalam lanjutan digelar di Old Trafford, Minggu (8/11/2026) malam WIB. Villa sudah unggul 2-0 di empat menit pertama lewat Alysson dan Nicolas Jackson.\r\n\r\nMU sempat membalas lewat Bruno Fernandes dan Youri Tielemans yang membuat skor imbang 2-2 di akhir babak pertama. Namun, Villa kembali mencetak dua gol di awal paruh kedua lewat John McGinn dan Leon Goretzka.\r\n\r\nSaat berada di ambang kekalahan, MU kemudian mencetak dua gol di injury time. Joshua Zirkzee dan Patrick Dorgu mencetak gol dalam kurun waktu dua menit untuk menyelamatkan MU dari kekalahan.\r\n\r\nMeski demikian, MU belum beranjak dari zona degradasi dengan menempati peringkat ke-18 setelah baru mengumpulkan delapan poin dari 10 laga. Sementara Villa ada di urutan ke-10 dengan 13 poin.\r\n\r\nVilla langsung menyerang sejak awal. Tekanan yang dilancarkan Villa sudah membuahkan hasil saat laga belum genap berjalan satu menit.\r\n\r\nBola dialirkan kepada Alysson yang ada di sisi kanan. Alysson lantas melepaskan tembakan dan bola masuk ke gawang setelah melewati kaki-kaki Senne Lammens.\r\n\r\nVilla menggandakan keunggulannya pada menit keempat. Tendangan mendatar Alysson ditepis oleh Lammens dan bola muntah disambar oleh Nicolas Jackson.\r\n\r\nMU mendapat penalti pada menit ke-16. Wasit menunjuk titik putih usai Boubacar Kamara melanggar Matheus Cunha. Bruno Fernandes yang maju sebagai eksekutor dengan tenang mengecoh Zion Suzuki untuk membawa MU menipiskan ketertinggalan.\r\n\r\nGol Fernandes membuat MU meningkatkan intensitas serangan. Cunha melepaskan tembakan melengkung dari luar kotak penalti yang memaksa Suzuki melakukan penyelamatan.', 'fotoberita2.jpeg', '2026-11-09 01:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id_kategori`, `kategori`, `create_at`) VALUES
(1, 'Pendidikan', '2026-11-03 02:04:10'),
(2, 'Kegiatan Sekolah', '2026-11-03 02:04:10'),
(3, 'Prestasi', '2026-11-03 02:04:10'),
(4, 'Ekonomi', '2026-11-03 02:46:39'),
(6, 'Olah Raga', '2026-11-09 01:07:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori_berita` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
