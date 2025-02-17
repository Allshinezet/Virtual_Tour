-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2025 at 05:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_tour_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_form`
--

CREATE TABLE `data_form` (
  `id_form` int NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subjek` varchar(50) NOT NULL,
  `Pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_form`
--

INSERT INTO `data_form` (`id_form`, `Nama`, `Email`, `Subjek`, `Pesan`) VALUES
(15, 'Aldi', 'aldi@gmail.com', 'haha', 'ahaha'),
(17, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami'),
(18, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami'),
(19, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami'),
(20, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami'),
(21, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami'),
(22, 'Lia', 'lia@gmail.com', 'Tertata', 'Penjelasan dan penggunaan yang mudah di pahami');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `tanggal`, `jumlah`) VALUES
(1, '2025-02-13', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama_admin`, `password`) VALUES
(22, 'admin', '$2y$10$6jeJQba3ZJ9f0ErMPCK/m.VmGnmU4WdnOzrRijvMaA6KuGrnNv28G'),
(31, 'Randyy', '$2y$10$Y65DMLyCtyl8f6H6zXoyoOBMtS.bGzF.UeiAdqeAoZtuwhthnYBPO');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_objek`
--

CREATE TABLE `tabel_objek` (
  `id_object` int NOT NULL,
  `nama_object` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar_tour` varchar(100) NOT NULL,
  `gambar_detail` varchar(100) NOT NULL,
  `gambar_360` varchar(100) NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_objek`
--

INSERT INTO `tabel_objek` (`id_object`, `nama_object`, `gambar_tour`, `gambar_detail`, `gambar_360`, `qrcode`, `deskripsi`) VALUES
(18, 'Gerbang Sekolah Menengah Kejuruan', 'satu_(6).jpg', 'satu_(5).jpg', '1pertamaa-min.jpeg', 'SMK 5.png', 'Sekolah Menengah Kejuruan (SMK) Negeri 5 Pekanbaru adalah sekolah menengah yang didirikan oleh Pemerintah Kota Pekanbaru dengan bernaung di bawah Dinas Pendidikan Kota Pekanbaru. Kehadiran SMK Negeri 5 ini sangat dipengaruhi oleh begitu besarnya animo masyarakat terhadap sekolah kejuruan di bidang teknologi dan industri di Pekanbaru sekaligus tentunya upaya dari pemerintah Kota Pekanbaru dalam memberikan layanan pendidikan yang semakin baik dan terjangkau secara geografis.  SMK Negeri 5 Pekanbaru diresmikan oleh Menteri Pendidikan dan Kebudayaan RI – Prof.DR.Ing Wardiman Djojonegoro tanggal 28 Desember 1996. Beroperasi sejak Juni 1994, merupakan sekolah yang berstatus filial dari STM Negeri 1 Pekanbaru (sekarang SMK Negeri 2 Pekanbaru) dibawah pimpinan Drs. Malkan Nasution (1994 – 1996) kemudian berdiri sendiri sebagai STM Negeri 2 Pekanbaru dibawah kepemimpinan Drs. Syahrial sebagai Kepala Sekolah (1996 – 1998) dengan dua Jurusan/Bidang Keahlian yaitu Teknik Listrik dan Teknik Elektronika.'),
(36, 'tes', 'satu (5).jpg', 'satu (6).jpg', 'lorong_4gudang.jpeg', 'SMK 5.png', 'tesss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_form`
--
ALTER TABLE `data_form`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_objek`
--
ALTER TABLE `tabel_objek`
  ADD PRIMARY KEY (`id_object`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_form`
--
ALTER TABLE `data_form`
  MODIFY `id_form` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tabel_objek`
--
ALTER TABLE `tabel_objek`
  MODIFY `id_object` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
