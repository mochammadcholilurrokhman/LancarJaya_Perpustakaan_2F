-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 07:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(15) NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `pengarang` varchar(150) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `jumlah_tersedia` int(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_buku` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `tahun_terbit`, `jumlah_tersedia`, `deskripsi`, `status_buku`, `image`) VALUES
(1, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 2008, 9, 'Buku ini adalah panduan komprehensif mengenai praktik terbaik dalam menulis kode bersih dan mudah dipahami. Menekankan pengembangan perangkat lunak yang adaptif dan tangguh.', 'Available', '1.jpeg'),
(2, 'Code Complete: A Practical Handbook of Software Construction', 'Steve McConnell', 2004, 9, 'Buku ini memberikan wawasan mendalam tentang konsep dan praktik pengembangan perangkat lunak, mulai dari fase desain hingga implementasi, dengan penekanan pada kualitas dan keberlanjutan kode.', 'Available', '2.jpeg'),
(3, 'The Pragmatic Programmer: Your Journey to Mastery', 'Dave Thomas, Andy Hunt', 1999, 15, 'Buku ini menawarkan tips praktis dan panduan untuk menjadi seorang programmer yang efektif dan terampil. Menyajikan pemikiran pragmatis dan solusi praktis untuk tantangan pengembangan perangkat lunak.', 'Available', '3.jpeg'),
(4, 'Design Patterns: Elements of Reusable Object-Oriented Software', 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides', 1994, 12, 'Buku ini memperkenalkan konsep desain berpola yang dapat digunakan untuk meningkatkan struktur dan keberlanjutan perangkat lunak berorientasi objek.', 'Available', '4.jpeg'),
(5, 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', 2009, 20, 'Buku ini merupakan panduan klasik tentang algoritma dan struktur data, memberikan dasar-dasar yang kuat untuk perencanaan dan analisis algoritma.', 'Available', '5.jpeg\r\n'),
(6, 'The Art of Computer Programming', 'Donald E. Knuth', 1968, 25, 'Buku ini merupakan karya monumental yang membahas dasar-dasar ilmu komputer, algoritma, dan struktur data. Menyajikan pendekatan analitis terhadap pemrograman.', 'Available', '6.jpeg'),
(7, 'Refactoring: Improving the Design of Existing Code', 'Martin Fowler', 1999, 18, 'Buku ini membahas teknik refactoring untuk meningkatkan desain dan kualitas kode yang sudah ada. Memberikan panduan praktis untuk mengatasi kompleksitas perangkat lunak.', 'Borrowed', '7.jpeg'),
(8, 'JavaScript: The Good Parts', 'Douglas Crockford', 2008, 15, 'Fokus pada fitur-fitur JavaScript yang efektif dan berguna, buku ini memberikan wawasan mendalam tentang bagaimana menulis kode JavaScript yang baik.', 'Borrowed', '8.jpeg'),
(9, 'The Mythical Man-Month: Essays on Software Engineering', 'Frederick P. Brooks Jr.', 1975, 10, 'Buku klasik yang membahas tantangan manajemen proyek perangkat lunak dan memberikan wawasan tentang kompleksitas pengembangan perangkat lunak.', 'Available', '9.jpeg'),
(10, 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', 2011, 22, 'Buku ini memberikan panduan lengkap untuk persiapan wawancara teknis dalam dunia perangkat lunak. Berisi tips, trik, dan pertanyaan wawancara umum dalam industri teknologi.', 'Available', '10.jpeg'),
(11, 'Head First Design Patterns', 'Eric Freeman, Elisabeth Robson, Bert Bates, Kathy Sierra', 2004, 19, 'Buku ini mengajarkan desain berpola melalui pendekatan visual dan interaktif, membuatnya mudah dipahami untuk pembaca dengan berbagai tingkat pengalaman.', 'Available', '11.jpeg'),
(12, 'Python Crash Course', 'Eric Matthes', 2015, 20, 'Buku ini dirancang untuk pembelajar pemula yang ingin menguasai bahasa pemrograman Python. Menyajikan konsep dasar dan proyek-proyek praktis untuk pengembangan keterampilan.', 'Available', '12.jpeg'),
(13, 'Test-Driven Development: By Example', 'Kent Beck', 2002, 15, 'Buku ini memperkenalkan dan memandu pembaca melalui pendekatan pengembangan perangkat lunak berbasis tes. Menerapkan konsep TDD dalam pengembangan perangkat lunak.', 'Available', '13.jpeg'),
(14, 'Clean Architecture: A Craftsmans Guide to Software Structure and Design', 'Robert C. Martin', 2017, 18, 'Buku ini membahas prinsip-prinsip arsitektur bersih dalam pengembangan perangkat lunak. Menekankan pemisahan konsep dan kejelasan struktur dalam merancang sistem.', 'Borrowed', '14.jpeg'),
(15, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell, Peter Norvig', 1995, 15, 'Buku teks klasik yang membahas konsep-konsep dasar dan metode dalam kecerdasan buatan. Cocok untuk pembaca dengan minat dalam pemahaman yang mendalam tentang AI.', 'Available', '15.jpeg'),
(18, 'Deep Learning', 'Ian Goodfellow, Yoshua Bengio, Aaron Courville', 2016, 25, 'Buku ini menyajikan panduan komprehensif tentang dasar-dasar dan teknik-teknik dalam pembelajaran mendalam (deep learning). Cocok untuk pembaca yang tertarik memahami konsep-konsep di balik kecerdasan buatan.', 'Available', '18.jpeg'),
(19, 'The DevOps Handbook: How to Create World-Class Agility, Reliability, & Security in Technology Organizations', 'Gene Kim, Jez Humble, Patrick Debois, John Willis', 2016, 20, 'Buku ini membahas prinsip-prinsip dan praktik DevOps untuk mencapai kecepatan, keandalan, dan keamanan dalam pengembangan perangkat lunak.', 'Available', '19.jpeg'),
(20, 'Eloquent JavaScript: A Modern Introduction to Programming', 'Marijn Haverbeke', 2011, 15, 'Buku ini menyajikan pendekatan interaktif untuk pembelajaran JavaScript, cocok untuk pembaca pemula yang ingin memahami dasar-dasar pemrograman dan JavaScript.', 'Borrowed', '20.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(15) NOT NULL,
  `jml_denda` decimal(10,0) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `tgl_batas_pembayaran` date NOT NULL,
  `id_peminjaman` int(15) NOT NULL,
  `id_pengaturan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `jml_denda`, `status_pembayaran`, `tgl_batas_pembayaran`, `id_peminjaman`, `id_pengaturan`) VALUES
(1, '174000', 'Belum Dibayar', '2023-01-20', 1, 1),
(2, '7500', 'Belum Dibayar', '2023-03-25', 3, 3),
(3, '6000', 'Belum Dibayar', '2023-05-30', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `id_buku` int(15) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `qty`, `id_buku`, `id_user`) VALUES
(2, 3, 3, 3),
(3, 2, 5, 5),
(4, 3, 7, 7),
(61, 0, 1, 2),
(62, 0, 1, 1),
(63, 0, 8, 1),
(64, 0, 8, 1),
(65, 0, 2, 2),
(66, 0, 20, 1),
(67, 0, 14, 1),
(68, 0, 7, 1),
(69, 0, 4, 1),
(70, 0, 14, 1),
(71, 0, 12, 1),
(72, 0, 5, 7),
(75, 0, 3, 15),
(76, 0, 2, 15),
(78, 0, 5, 11),
(79, 0, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(15) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `tgl_batas_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_batas_pengembalian`, `status_peminjaman`, `id_user`, `id_buku`) VALUES
(1, '2023-01-01', '2023-01-10', '2023-01-15', 'Dikembalikan', 1, 1),
(2, '2023-03-01', '2023-03-10', '2023-03-15', 'Dikembalikan', 3, 3),
(3, '2023-05-01', '2023-12-28', '2023-05-15', 'Dikembalikan', 5, 5),
(4, '2023-07-01', '2023-07-10', '2023-07-15', 'Dikembalikan', 7, 7),
(5, '2023-09-01', '2023-09-10', '2023-09-15', 'Dikembalikan', 9, 9),
(6, '2023-11-01', '2023-12-28', '2023-11-15', 'Dikembalikan', 11, 11),
(7, '2024-01-01', '2024-01-10', '2024-01-15', 'Dikembalikan', 13, 13),
(8, '2024-03-01', '2024-03-10', '2024-03-15', 'Dikembalikan', 15, 15),
(9, '2023-12-27', '2023-12-28', '2024-01-10', 'Dikembalikan', 1, 2),
(10, '2023-12-27', NULL, '2024-01-10', 'Belum dikembalikan', 1, 3),
(11, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 1, 8),
(12, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 1, 20),
(13, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 1, 14),
(14, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 1, 7),
(15, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 7, 7),
(16, '2023-12-27', NULL, '2024-01-10', 'Belum dikembalikan', 1, 1),
(17, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 15, 1),
(18, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 15, 3),
(19, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 15, 2),
(20, '2023-12-27', NULL, '2024-01-14', 'Belum dikembalikan', 11, 4),
(21, '2023-12-28', NULL, '2024-01-15', 'Belum dikembalikan', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(15) NOT NULL,
  `denda_perhari` decimal(15,0) NOT NULL,
  `batas_buku` int(15) NOT NULL,
  `batas_hari` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `denda_perhari`, `batas_buku`, `batas_hari`) VALUES
(1, '1000', 5, 14),
(2, '500', 3, 10),
(3, '1500', 7, 21),
(4, '800', 4, 12),
(5, '1200', 6, 18),
(15, '500', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id_repo` int(11) NOT NULL,
  `Judul_repo` varchar(255) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `Kata_Kunci` varchar(255) NOT NULL,
  `status_repo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`id_repo`, `Judul_repo`, `pengarang`, `tahun_terbit`, `Kata_Kunci`, `status_repo`) VALUES
(1, 'Metode Machine Learning dalam Pengenalan Wajah', 'Andi Wijaya', 2022, 'Machine Learning, Pengenalan Wajah', 'Tersedia'),
(2, 'Teknologi Blockchain untuk Keamanan Data', 'Dewi Susanti', 2021, 'Blockchain, Keamanan Data', 'Tidak Tersedia'),
(3, 'Pengembangan Aplikasi Mobile dengan React Native', 'Budi Pratama', 2020, 'React Native, Aplikasi Mobile', 'Tersedia'),
(4, 'Pemanfaatan Big Data dalam Analisis Bisnis', 'Citra Putri', 2019, 'Big Data, Analisis Bisnis', 'Tidak Tersedia'),
(5, 'Rancang Bangun Sistem Informasi Geografis', 'Eko Nugroho', 2018, 'SIG, Sistem Informasi Geografis', 'Tersedia'),
(6, 'Optimasi Algoritma Genetika untuk Penjadwalan Tugas', 'Fahmi Rahman', 2017, 'Algoritma Genetika, Penjadwalan Tugas', 'Tersedia'),
(7, 'Aplikasi Internet of Things dalam Smart Home', 'Gita Purnama', 2016, 'IoT, Smart Home', 'Tidak Tersedia'),
(8, 'Pengembangan Website Responsive dengan Bootstrap', 'Hendra Wijaya', 2015, 'Bootstrap, Website Responsive', 'Tersedia'),
(9, 'Analisis Sentimen pada Media Sosial', 'Ika Setiawan', 2014, 'Sentimen Analysis, Media Sosial', 'Tersedia'),
(10, 'Implementasi Teknologi 5G dalam Komunikasi', 'Joko Sutrisno', 2013, 'Teknologi 5G, Komunikasi', 'Tidak Tersedia'),
(11, 'Strategi Pemasaran Digital untuk Bisnis Online', 'Kartika Dewi', 2012, 'Pemasaran Digital, Bisnis Online', 'Tersedia'),
(12, 'Pengenalan Sistem Operasi Berbasis Linux', 'Lukman Hakim', 2011, 'Sistem Operasi, Linux', 'Tersedia'),
(13, 'Rekayasa Perangkat Lunak dengan Metode Scrum', 'Mia Turner', 2010, 'Scrum, Rekayasa Perangkat Lunak', 'Tersedia'),
(14, 'Manajemen Proyek IT dengan Framework Agile', 'Nanda Pratama', 2009, 'Agile, Manajemen Proyek', 'Tidak Tersedia'),
(15, 'Desain Antarmuka Pengguna yang Menarik', 'Oscar Widodo', 2008, 'Desain Antarmuka, Pengguna', 'Tersedia'),
(16, 'Pengembangan Aplikasi Android dengan Kotlin', 'Putri Wulandari', 2007, 'Android, Kotlin', 'Tersedia'),
(17, 'Keamanan Sistem Informasi di Era Digital', 'Qori Rahmat', 2006, 'Keamanan SI, Era Digital', 'Tidak Tersedia'),
(18, 'Pengembangan Game 2D dengan Unity', 'Rizki Pratama', 2005, 'Game 2D, Unity', 'Tersedia'),
(19, 'Implementasi Cloud Computing dalam Bisnis', 'Siska Novianti', 2004, 'Cloud Computing, Bisnis', 'Tidak Tersedia'),
(20, 'Strategi Bisnis E-Commerce yang Sukses', 'Taufik Hidayat', 2003, 'E-Commerce, Strategi Bisnis', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password`, `posisi`) VALUES
(1, '1234567890', 'Agus Kurniawan', 'agus', 'Mahasiswa'),
(2, '2345678901', 'Budi Pekerti', 'budi234', 'Admin'),
(3, '3456789012', 'Citra Skolastika', 'citra345', 'Mahasiswa'),
(4, '4567890123', 'Dian Ningsih', 'dian456', 'Admin'),
(5, '5678901234', 'Erika Richardo', 'erika567', 'Mahasiswa'),
(6, '6789012345', 'Fajar Wahyu', 'fajar678', 'Admin'),
(7, '7890123456', 'Gita Gutawa', 'gita789', 'Mahasiswa'),
(8, '8901234567', 'Hendra Pangestu', 'hendra890', 'Admin'),
(9, '9012345678', 'Ihsan Juan', 'ihsan901', 'Mahasiswa'),
(10, '0123456789', 'Juliana Rosa', 'juliana012', 'Admin'),
(11, '1122334455', 'Kurniawan', 'kurniawan098', 'Mahasiswa'),
(12, '2233445566', 'Lukman Ferdin', 'lukman987', 'Admin'),
(13, '3344556677', 'Maya Melanesia', 'maya876', 'Mahasiswa'),
(14, '4455667788', 'Nanda Nala', 'nanda765', 'Admin'),
(15, '5566778899', 'Okta Naila', 'okta654', 'Mahasiswa'),
(16, '6754362718', 'Atiqah Rusli', 'atiqah123', 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`),
  ADD KEY `id_pengaturan` (`id_pengaturan`),
  ADD KEY `denda_ibfk_2` (`id_peminjaman`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_repo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id_repo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`id_pengaturan`) REFERENCES `pengaturan` (`id_pengaturan`),
  ADD CONSTRAINT `denda_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
