-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 07:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(8) NOT NULL,
  `id_kriteria` int(8) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_kriteria`, `bobot`) VALUES
(1, 2, 0.05),
(2, 3, 0.05),
(3, 4, 0.05),
(4, 5, 0.05),
(5, 6, 0.05),
(6, 7, 0.05),
(7, 8, 0.05),
(8, 9, 0.05),
(9, 10, 0.05),
(10, 11, 0.05),
(11, 12, 0.03),
(12, 13, 0.03),
(13, 14, 0.03),
(14, 15, 0.03),
(15, 16, 0.03),
(17, 17, 0.03),
(18, 18, 0.03),
(19, 19, 0.03),
(20, 20, 0.03),
(21, 21, 0.025),
(22, 22, 0.025),
(23, 23, 0.025),
(24, 24, 0.025),
(25, 25, 0.025),
(26, 26, 0.025),
(27, 27, 0.025),
(28, 28, 0.025),
(29, 29, 0.025);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(8) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `hasil` int(8) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`) VALUES
(2, 'C1', 'Kesopanan Terhadap Sesama'),
(3, 'C2', 'Kesabaran & Keramahan dalam Melaksanakan Tugas'),
(4, 'C3', 'Keteladanan Akhlaq'),
(5, 'C4', 'Keikhlasan dalam bekerja'),
(6, 'C5', 'Penyalagunaan Wewenang'),
(7, 'C6', 'Kesesuaian laporan dengan hasil kerja'),
(8, 'C7', 'Kemampuan menerima tanggung jawab yang diberikan pada nya (amanah)'),
(9, 'C8', 'Kecakapan dan Penguasaan bidang tugasnya.'),
(10, 'C9', 'Keterampilan yang dimiliki'),
(11, 'C10', 'Ketekunan, Ketelitian dan Kecepatan waktu dalam menjalankan tugas.'),
(12, 'C11', 'Kesehatan Jasmani'),
(13, 'C12', 'Manfaat kerja yang dilakukan'),
(14, 'C13', 'Kemampuan menyelesaikan tugas sesuai dengan target atau program yang ada.'),
(15, 'C14', 'Ketepatan waktu dalam menyelesaikan tugas.'),
(16, 'C15', 'Perhatian terhadap kerja'),
(17, 'C16', 'Keberanian dalam menjalankan amanah atau tanggung jawab.'),
(18, 'C17', 'Rasa Kepemilikan terhadap barang Klinik Rawat Inap dr. M. Suherman Universitas Muhammadiyah Jember.'),
(19, 'C18', 'Konsekwensi Tugas'),
(20, 'C19', 'Ketaatan menjalankan peraturan (termasuk absensi,s eragam dan kedispilinan lainnya).'),
(21, 'C20', 'Ketaatan menjalankan tugas kedinasan'),
(22, 'C21', 'ketaatan menjalankan syari\'at Islam'),
(23, 'C22', 'Kemampuan menjalin kerjasama dengan orang lain untuk penyelesaian tugasnya.'),
(24, 'C23', 'Sikap terhadap orang lain.'),
(25, 'C24', 'Kemampuan untuk menerima saran dan kritik.'),
(26, 'C25', 'Inisiatif untuk bekerja secara baik'),
(27, 'C26', 'Kreativitas kerja'),
(28, 'C27', 'Keinginan untuk memberikan perubahan kerja yang lebih baik.'),
(29, 'C28', 'Keberadaan ditempat saat jam kerja');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai_kriteria` int(11) NOT NULL,
  `id_kriteria` int(8) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai_kriteria`, `id_kriteria`, `keterangan`, `nilai`) VALUES
(1, 2, 'Memiliki tempreman atau peringai kasar terhdap pasien, keluarga pasien atau dengan teman sejawat dan pegawai lainnya (bertutur kata kasar dll)', 0.25),
(2, 2, 'Pernah ketahuan secara kasat mata berlaku tidak sopan terhadap pasien, keluarga pasien, atau dengan sejawat dan juga pegawai lainnya( Membentak, berlaku kasar dsb)', 0.5),
(3, 2, 'Tidak ketahuan secara kasat mata berlaku tidak sopan, tetapi ada laporan dari pasien, keluarga, teman sejawat dan juga pegawai lain tentang perbuatan tidak sopan.', 0.75),
(4, 2, 'Menunjukkan prilaku yang baik terhadap pasien, keluarga, teman sejawat dan atau pegawai lainnya.', 1),
(5, 3, 'Tidak sabar, mudah marah ketika pasien, keluarga pasien, teman sejawat dan atau pegawai lain membutuhkan pertolongan\r\n', 0.25),
(6, 3, 'Grusa-grusu dan tergesa-gesa dalam menjalankan tugas sehingga terjadi kesalahan dalam hasil tugas', 0.5),
(7, 3, 'Tidak sabaran tetapi mampu mengendalikannya, dan kadang-kadang hal itu muncul tetapi tidak berpengaruh negatif pada kerja.\r\n', 0.75),
(8, 3, 'Sabar, teliti dalam kerja dan mampu menghargai kerja orang lain.', 1),
(9, 4, 'Tidak mampu memberikan contoh perilaku yang baik, akan tetapi justru menunjukkan perilaku yang negatif. (Merokok ditempat umum, berkata-kata kasar, berprilaku negatif)', 0.25),
(10, 4, 'Beberapa kali (lebih dari 3x) ada laporan negatif bahwa yang bersangkutan pernah bertindak negatif didepan umum', 0.5),
(11, 4, 'Kadang-kadang (kurang dari 3x) masih melakukan perbuatan yang negatif didepan umum.\r\n', 0.75),
(12, 4, 'Mampu memberikan contoh prilaku yang baik di depan umum (pasien, keluarga pasien, teman pegawai lainnya).', 1),
(13, 5, 'Sering mengeluh tentang kondisi kerja dan hasil pendapatan selama kerja di Klinik Rawat Inap dr. M. Suherman Universitas Muhammadiyah Jember kepada orang lain selain pegawai Klinik Rawat Inap dr. M Suherman sehingga menimbulkan fitnah.', 0.25),
(14, 5, 'Mengeluh tentang pendapatan tetapi tidak menunjukkan I\'tikat dalam kerja yang baik.', 0.5),
(15, 5, 'Kadang-kadang mengeluh, tetapi mampu memberikan kontribusi kerja yang baik.', 0.75),
(16, 5, 'Kerja baik, dan memberikan masukan tentang perbaikan penghasilan dengan cara kerja yang optimal.', 1),
(17, 6, 'Sering melakukan tindakan yang tidak sesuai dengan wewenangnya sehingga menyebabkan kerugian (pemalsuan dll).', 0.25),
(18, 6, 'Dalam 6 bulan terakhir melakukan perbuatan penyalagunaan wewenang, tetapi belum sampai merugikan.', 0.5),
(19, 6, 'Memiliki perilaku kerja yang bisa dikatagorikan kearah penyalahgunaan wewenang.', 0.75),
(20, 6, 'Selama kerja (terutama 6 bulan terakhir) tidak ada indikasi perbatan penyalagunaan wewenang dan jabatan.', 1),
(21, 7, 'Seringkali (lebih dari 2 ) melaporkan apa yang dikerjakan kepada atasan tidak sesuai dengan apa yang dikerjakan', 0.25),
(22, 7, '2 kali dalam 6 bulan memberikan laporan yang tidak sesuai dengan apa yang telah dikerjakannya.', 0.5),
(23, 7, 'Melaporkan pekerjaan atau apa yang telah dikerjakannnya kepada atasan beberapa catatan dari atasan.', 0.75),
(24, 7, 'Melaporkan apa adanya kepada atasan tentang hasil kerjanya disertai dengan alasan dan saran untuk perbaikan.', 1),
(25, 8, 'Sering melakukan pelanggaran dalam menjalankan tugas yang diberikan atasan atau tugas profesinnya.', 0.25),
(26, 8, 'Tidak mampu menjalankan amanah (tanggung jawab) ditandai dengan ketidaksiapan dalam menjalankan tugas kerja/kinerja kurang baik.', 0.5),
(27, 8, 'Mampu bekerja dan menerima amanah akan tetapi sering kali masih membutuhkan saran dan nasehat untuk peningkatan kinerja.', 0.75),
(28, 8, 'Mampu menjalankan tugas dan tanggung jawab yang diberikan dengan penuh amanah dan hasil kinerja baik.', 1),
(29, 9, 'sering melakukan pelanggaran atau kesalahan dalam menjalankan tugas sesuai bidang tugasnya, yang sifatnya fatal. Sering melakukan kesalahan prosedur.', 0.25),
(30, 9, 'Melakukan kesalahan dalam menjalankan tugas yang sifatnya ringan.', 0.5),
(31, 9, 'Melakukan kesalahan dalam menjalankan tugasnya tetapi langsung dan ada usaha untuk memperbaikinya.', 0.75),
(32, 9, 'Tidak pernah melakukan pelanggaran atau kesalahan dalam menjalankan tugasnya.', 1),
(33, 10, 'Memerlukan pengarahan dan seringkali diarahkan dalam melaksanakan tugasnya. (tugas yang dimilikinya tidak menunjang)', 0.25),
(34, 10, 'Tidak mampu bekerja secara mandiri dengan keterampilan yang dimilikinya.', 0.5),
(35, 10, 'Kurang mampu bekerja secara mandiri dengan keterampilan/profesinya tetapi ada usaha untuk memperbaikinya.', 0.75),
(36, 10, 'Bekerja dengan ketrampilan penuh untuk menunjang kinerja.\r\n', 1),
(37, 11, 'Sering tidak menghiraukan tugas, teledor dan respon terhadap tugas kurang.', 0.25),
(38, 11, 'Tekun dalam bekerja tetapi kurang teliti dalam bertugas sehingga masih ada kesalahan.', 0.5),
(39, 11, 'Tekun dan teliti dalam bekerja tetapi kurnag respontif terhadap tugas yang ada.', 0.75),
(40, 11, 'Memiliki ketekunan, ketelitian dan Kecepatan dalam menjalankan tugas (responsip).\r\n', 1),
(41, 12, 'sering izin dinas karena sakit (lebih dari 3 kali rata-rata izin 3 hari kerja ) tanpa keterangan dokter yang jelas.', 0.25),
(42, 12, 'Izin sakit lebih dari 3 kali tetapi dengan izin dokter dan mendapatkan terapi dokter( mengganggu mekanisme kerja)', 0.75),
(43, 12, 'izin sakit,  tetapi mampu membagi waktu dan tidak menggangu mekanisme kerja.', 0.75),
(44, 12, 'Memiliki ketahanan fisik yang prima sehingga mampu bekerja secara optimal.', 1),
(45, 13, 'Tidak ada hubungannya dengan profesi jobs dan program yang dimilikinya.', 0.25),
(46, 13, 'Bekerja diluar tanggung jawabnya (untuk membantu orang lain) sehingga berperngaruh program dan tugas yang dimilikinya.', 0.5),
(47, 13, 'Bekerja sesuai dengan profesi, jobs, dan program yang dilakukannya tetapi belum optimal karena faktor keteledoran.', 0.75),
(48, 13, 'Mampu bekerja secara baik sesuai dnegan profesi, jobs dan programnya sehingga bermanfaat.', 1),
(49, 14, 'Hasil kerja tidak sesuai dengan target atau program yang sudah ada.', 0.25),
(50, 14, '50% hasil kerjanya telah sesuai dengan target dan program yang dirancang.', 0.5),
(51, 14, '80% hasil kerjanya telah sesuai dengan target dan program yang dirancang.', 0.75),
(52, 14, '100% hasil kerjanya telah sesuai dengan target dan program yang dirancang.', 1),
(53, 15, 'Sering tidak sesuai dengan target waktu yang ada karena faktor kinerja yang kurang baik.\r\n', 0.25),
(54, 15, 'Ada keterlambatan dalam menyelesaikan tugas dan ada usaha untuk memenuhi keterlambatan tersebut.', 0.5),
(55, 15, 'Dalam menyelesaikan tugas karyawan menyelesaikan pas pada batas waktu yang ada.', 0.75),
(56, 15, 'Menyelesaikan tugas sebelum batas waktu habis.', 1),
(57, 29, 'Sering kali meninggalkan tempat kerja yang tidak ada hubungannya dengan tugas kerjannya.', 0.25),
(58, 29, 'Meninggalkan tempat kerja tidak berhubungan dengan tugasnya tetapi menyelesaikan tugasnya dengan baik.', 0.5),
(59, 29, 'Meninggalkan tempat kerja tidak berhubungan dengan bidang tugasnya tetapi meminta izin pada atasan.', 0.75),
(60, 29, 'Selalu berada pada tempat kerja untuk bekerja secara optimal.', 1),
(61, 29, 'Meninggalkan tempat kerja tidak berhubungan dengan bidang tugasnya tetapi meminta izin pada atasan.', 0.75),
(62, 16, 'Sering kali melakukan izin tidak masuk kerja untuk kepentingan pribadi.', 0.25),
(63, 16, 'Sulit untuk diminta kerja diluar jam kerja dan lebih mementingkan kebutuhan pribadinya.', 0.5),
(64, 16, 'Mengutamakan kerja bila ada keuntungan yang bisa didapatkannya.', 0.75),
(65, 16, 'Mengutamakan kerja daripada kepentingan pribadi yang bisa ditunda.', 1),
(66, 17, 'Tidak berani mengambil resiko dari pekerjaan yang dilaksankannya.', 0.25),
(67, 17, 'Sering kali menghindar mendapatkan tanggung jawab diluar tugas yang ada.', 0.5),
(68, 17, 'Menjalankan tugas yang ada, tetapi tanggung jawab dilimpahkan pada atasan atau orang lain.', 0.75),
(69, 17, 'Melakukan tugas dengan segala tanggung jawab dan resiko yang didapatkannya.', 1),
(70, 18, 'Berlaku teledor dalam mengelola barang inventaris Klinik Rawat Inap dr. M. Suherman Universitas Muhammadiyah Jember sehingga menyebabkan hilang atau rusak.', 0.25),
(71, 18, 'Tidak bisa menjaga barang inventaris sehingga menyebabkan kerusakan barang.', 0.5),
(72, 18, 'Berusaha untuk menjaga barang inventaris Klinik Rawat Inap dr. M. Suherman Universitas Muhammadiyah Jember tetapi masih belum juga optimal.', 0.75),
(73, 18, 'Menghargai dan menjaga barang inventaris Klinik Rawat Inap dr. M. Suherman Universitas Muhammadiyah Jember sebagai bentuk tanggung jawab kepemilikan yang harus dijaga dan dirawat bersama.', 1),
(74, 19, 'Melemparkan kesalahan yang diperbuatnya pada saat tugas kepada orang lain.', 0.25),
(75, 19, 'Tidak bisa menyadari kesalahan yang telah diperbuatnya sehingga mengelak bertanggung jawab.', 0.5),
(76, 19, 'Menyadari kesalahanya tetapi tidak berusaha mencari pemecahan masalahnya.', 0.75),
(77, 19, 'Menyadari kesalahan yang telah diperbuatnya dan mencari alternatif pemecahannya.', 1),
(78, 20, 'Sering kali melakukan pelanggaran kedisiplinan sehingga mendapatkan teguran lisan atau tertulis.', 0.25),
(79, 20, 'Melakukan pelanggaran kedisiplinan dan diberikan arahan/masukan tetapi tidak ada perubahan.', 0.5),
(80, 20, 'Melakukan pelanggaran kedispilinan, diarahkan dan mau memperbaikinya sehingga tidak terulang kembali.', 0.75),
(81, 20, 'Tidak ada catatan pelanggaran kedisplinan dan taat menjalankan peraturan yang ada.', 1),
(82, 21, 'Mangkir/menolak tugas yang diberikan oleh atasan.', 0.25),
(83, 21, 'Menerima tuga dari atasan tetapi tidak dijalankan sebagaimana mestinya.(ogah-ogahan).', 0.5),
(84, 21, 'Menjalankan tugas dari atasan tetapi tidak optimal.', 0.75),
(85, 21, 'Menjalankan tugas atasan dengan sunggung-sungguh dan berhasil menyelesaikannya.', 1),
(86, 22, 'Tidak pernah menjalankan syari\'at Islam (seperti sholat).', 0.25),
(87, 22, 'Kadang kali sholat bila diingatkan untuk sholat.', 0.5),
(88, 22, 'Melakukan syari\'at Islam bila yang lain juga melaksanakannya', 0.75),
(89, 22, 'Melakukan syari\'at Islam dengan khusu\' setiap saat.', 1),
(90, 23, 'Hanya mengadalkan dirinya sendiri untuk bekerja tanpa melibatkan pegawai/koleganya dan bersikap egosentris dan tidak mau tau dengan pekerjaan orang lain.', 0.25),
(91, 23, 'Kurang memiliki respon dalam membatu Pegawai Klinik yang lain untuk menyelesaikan tugas.', 0.5),
(92, 23, 'Mau membantu bila orang lain yang memintanya tanpa inisiatif sendiri.', 0.75),
(93, 23, 'Memiliki inisiatif untuk membantu pegawai yang lain dalam menyelesaikan tugasnya.', 1),
(94, 24, 'Tidak memiliki rasa untuk menghargai orang lain ( adigang adigung/mau menang sendiri)', 0.25),
(95, 24, 'Kurang dapat menghargai orang laindan lebih mementingkan dirinya sendiri.', 0.5),
(96, 24, 'Acuh tak Acuh dengan orang lain, tetapi tidak menunjukkan permusuhan.', 0.75),
(97, 24, 'Mampu menghargai orang lain dengan baik dan menempatkan posisi dirinya sesuai dengan keadaan.', 1),
(98, 25, 'Marah dan menolak setiap saran dan kritik yang diterimanya.', 0.25),
(99, 25, 'Menerima kritik tetapi dan berusaha untuk memperbaikinya.', 0.5),
(100, 25, 'Menerima saran & kritik selanjutnya meminta masukan untuk memperbaiki kerkurangan dirinya & berusaha untuk memperbaikinya.', 0.75),
(101, 25, 'Melakukan syari\'at Islam dengan khusu\' setiap saat.', 1),
(102, 26, 'Apatis dan monoton dalam bekerja', 0.25),
(103, 26, 'Mencoba untuk mencari inisiatif dalam melaksanakan tugas.', 0.5),
(104, 26, 'Berdiskusi bersama untuk mencari inisiatif baru dalam kerja agar tidak monoton.', 0.75),
(105, 26, 'Memiliki inisiatif bekerja secara baik.', 1),
(106, 27, 'Tidak memiliki daya kreasi dalam menyelesaikan tugas yang ada.', 0.25),
(107, 27, 'Kurang memiliki daya kreasi untuk menyelesaikan tugas yang ada.', 0.5),
(108, 27, 'Kadang kala mengikuti orang lain untuk berkreatif dalam menyelesaikan tugas yang ada.', 0.75),
(109, 27, 'Memiliki daya dan keinginan untuk menciptakan kreasi baru dalam menyelesaikan tugas yang ada.', 1),
(110, 28, 'Tidak pernah memberikan saran untuk perubahan yang baik.', 0.25),
(111, 28, 'Hanya mengikuti orang lain untuk memberikan saran (ikut-ikutan).', 0.5),
(112, 28, 'Sesekali memberikan masukan untuk perbaikan sistem kerja.', 0.75),
(113, 28, 'aktif dalam memberikan masukan kepada teman atau atasan untuk perbaikan sistem kerja.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `tmk` date NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `alamat`, `gender`, `ttl`, `tmk`, `status_pegawai`, `pendidikan`, `golongan`, `status`) VALUES
('1234', 'admin', 'jember', 'Laki - laki', '2021-12-05', '2021-12-08', 'Kontrak', 'D3', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(8) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `id_kriteria` int(8) NOT NULL,
  `id_nilai_kriteria` int(8) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nip`, `id_kriteria`, `id_nilai_kriteria`, `tanggal`) VALUES
(57, '1234', 2, 1, '2021-12-24'),
(58, '1234', 3, 6, '2021-12-24'),
(59, '1234', 4, 11, '2021-12-24'),
(60, '1234', 5, 14, '2021-12-24'),
(61, '1234', 6, 19, '2021-12-24'),
(62, '1234', 7, 21, '2021-12-24'),
(63, '1234', 8, 26, '2021-12-24'),
(64, '1234', 9, 30, '2021-12-24'),
(65, '1234', 10, 33, '2021-12-24'),
(66, '1234', 11, 38, '2021-12-24'),
(67, '1234', 12, 42, '2021-12-24'),
(68, '1234', 13, 47, '2021-12-24'),
(69, '1234', 14, 50, '2021-12-24'),
(70, '1234', 15, 55, '2021-12-24'),
(71, '1234', 16, 63, '2021-12-24'),
(72, '1234', 17, 67, '2021-12-24'),
(73, '1234', 18, 72, '2021-12-24'),
(74, '1234', 19, 74, '2021-12-24'),
(75, '1234', 20, 79, '2021-12-24'),
(76, '1234', 21, 82, '2021-12-24'),
(77, '1234', 22, 87, '2021-12-24'),
(78, '1234', 23, 91, '2021-12-24'),
(79, '1234', 24, 96, '2021-12-24'),
(80, '1234', 25, 99, '2021-12-24'),
(81, '1234', 26, 103, '2021-12-24'),
(82, '1234', 27, 108, '2021-12-24'),
(83, '1234', 28, 112, '2021-12-24'),
(84, '1234', 29, 58, '2021-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `username`, `password`, `is_admin`) VALUES
(1, '1234', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilai_kriteria` (`id_nilai_kriteria`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_nilai_kriteria`) REFERENCES `nilai_kriteria` (`id_nilai_kriteria`),
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
