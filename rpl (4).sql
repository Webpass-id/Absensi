-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 06:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ID` int NOT NULL,
  `Nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `JamMasuk` time DEFAULT NULL,
  `Foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Status` enum('Hadir','Izin','Sakit','Alpa') NOT NULL,
  `Lokasi` varchar(255) DEFAULT NULL,
  `Keterangan` text,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nisn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id_pelajaran` int NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `jam` int DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_pelajaran`, `nama_pelajaran`, `nama_guru`, `jam`, `tingkat`, `deskripsi`, `hari`) VALUES
(1, 'Matematika', 'Bu Ani', 1, 'SD', 'Pelajaran Matematika Dasar', 'Senin'),
(2, 'Bahasa 12', '12', 2, 'SD', 'Pelajaran Bahasa Indonesia', 'Senin'),
(3, 'rpl', 'anjay', 12, '12', '12122121', 'Rabu'),
(4, '1212', '1212', 121, '2121', '212', 'Selasa'),
(5, '2121', '121', 2121, '212', '1212', 'Selasa'),
(6, 'belajar warna', 'umar', 12, '12', '1212', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `nisn_reference`
--

CREATE TABLE `nisn_reference` (
  `nisn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nisn_reference`
--

INSERT INTO `nisn_reference` (`nisn`) VALUES
('1'),
('2'),
('3'),
('4');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_sekolah`
--

CREATE TABLE `tugas_sekolah` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `guru` varchar(255) NOT NULL,
  `tenggat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nisn` varchar(255) NOT NULL,
  `ID` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` enum('Admin','Guru','User') NOT NULL DEFAULT 'User',
  `kelas` tinyint(1) NOT NULL DEFAULT '1',
  `nomor_hp_murid` varchar(22) NOT NULL,
  `nomor_hp_orang_tua` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nisn`, `ID`, `nama`, `Username`, `Password`, `role`, `kelas`, `nomor_hp_murid`, `nomor_hp_orang_tua`) VALUES
('001', 23, 'Ahmad Yusuf', 'ahmad.yusuf', 'password123', 'User', 10, '081234567890', '081234567891'),
('002', 24, 'Budi Santoso', 'budi.santoso', 'password123', 'User', 11, '081234567892', '081234567893'),
('003', 25, 'Citra Dewi', 'citra.dewi', 'password123', 'User', 12, '081234567894', '081234567895'),
('004', 26, 'Dedi Supriyadi', 'dedi.supriyadi', 'password123', 'Guru', 10, '081234567896', '081234567897'),
('005', 27, 'Eka Purnama', 'eka.purnama', 'password123', 'User', 9, '081234567898', '081234567899'),
('006', 28, 'Fajar Hidayat', 'fajar.hidayat', 'password123', 'User', 8, '081234567800', '081234567801'),
('007', 29, 'Gita Ramadhani', 'gita.ramadhani', 'password123', 'User', 7, '081234567802', '081234567803'),
('008', 30, 'Hadi Pratama', 'hadi.pratama', 'password123', 'Guru', 11, '081234567804', '081234567805'),
('009', 31, 'Ika Nuraini', 'ika.nuraini', 'password123', 'User', 10, '081234567806', '081234567807'),
('010', 32, 'Joko Widodo', 'joko.widodo', 'password123', 'Admin', 12, '081234567808', '081234567809'),
('011', 33, 'Karina Sari', 'karina.sari', 'password123', 'User', 9, '081234567810', '081234567811'),
('012', 34, 'Lestari Andini', 'lestari.andini', 'password123', 'User', 8, '081234567812', '081234567813'),
('013', 35, 'Mulyadi', 'mulyadi', 'password123', 'Guru', 7, '081234567814', '081234567815'),
('014', 36, 'Nia Rahmawati', 'nia.rahmawati', 'password123', 'User', 12, '081234567816', '081234567817'),
('015', 37, 'Oka Mahendra', 'oka.mahendra', 'password123', 'User', 10, '081234567818', '081234567819'),
('016', 38, 'Putri Amelia', 'putri.amelia', 'password123', 'User', 11, '081234567820', '081234567821'),
('017', 39, 'Qori Hasanah', 'qori.hasanah', 'password123', 'User', 8, '081234567822', '081234567823'),
('018', 40, 'Rian Firmansyah', 'rian.firmansyah', 'password123', 'Guru', 7, '081234567824', '081234567825'),
('019', 41, 'Siti Aminah', 'siti.aminah', 'password123', 'User', 9, '081234567826', '081234567827'),
('020', 42, 'Teguh Setiawan', 'teguh.setiawan', 'password123', 'Admin', 12, '081234567828', '081234567829'),
('021', 43, 'Umi Salamah', 'umi.salamah', 'password123', 'User', 10, '081234567830', '081234567831'),
('022', 44, 'Vina Melati', 'vina.melati', 'password123', 'User', 11, '081234567832', '081234567833'),
('023', 45, 'Wawan Kurniawan', 'wawan.kurniawan', 'password123', 'User', 8, '081234567834', '081234567835'),
('024', 46, 'Xenia Anggraini', 'xenia.anggraini', 'password123', 'User', 7, '081234567836', '081234567837'),
('025', 47, 'Yusuf Pratama', 'yusuf.pratama', 'password123', 'Guru', 12, '081234567838', '081234567839'),
('026', 48, 'Zahra Hanifa', 'zahra.hanifa', 'password123', 'User', 9, '081234567840', '081234567841'),
('027', 49, 'Adi Nugroho', 'adi.nugroho', 'password123', 'User', 10, '081234567842', '081234567843'),
('028', 50, 'Bunga Larasati', 'bunga.larasati', 'password123', 'User', 11, '081234567844', '081234567845'),
('029', 51, 'Cahyo Aditya', 'cahyo.aditya', 'password123', 'Guru', 9, '081234567846', '081234567847'),
('030', 52, 'Diana Permata', 'diana.permata', 'password123', 'User', 7, '081234567848', '081234567849'),
('031', 53, 'Edi Santoso', 'edi.santoso', 'password123', 'User', 8, '081234567850', '081234567851'),
('032', 54, 'Fitria Kusuma', 'fitria.kusuma', 'password123', 'User', 10, '081234567852', '081234567853');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_absen_nisn` (`nisn`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `nisn_reference`
--
ALTER TABLE `nisn_reference`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tugas_sekolah`
--
ALTER TABLE `tugas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Username_2` (`Username`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nisn_2` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_pelajaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas_sekolah`
--
ALTER TABLE `tugas_sekolah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_absen_nisn` FOREIGN KEY (`nisn`) REFERENCES `user` (`nisn`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
