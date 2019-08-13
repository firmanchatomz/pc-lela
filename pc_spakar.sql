-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2019 pada 22.53
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc_spakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `level` enum('admin','pakar') NOT NULL,
  `poto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `jk`, `level`, `poto`) VALUES
(1, 'admin', '$2y$10$ctF3Bj.GLnoe.AiT5T..Ae4DIjRy13LaqcAkElkqVnfCwxZGILxEy', 'lela siti nuraminah', 'perempuan', 'admin', 'ariel.jpg'),
(2, 'pakar', '$2y$10$lMmOFX.neyxBrsoRTQzNPOoXITPCXEvFMr5QIUofOcNIXdIL03CC.', 'indriyani', 'perempuan', 'pakar', 'tatum.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `id_detail_diagnosa` int(11) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `nilai_kepercayaan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`id_detail_diagnosa`, `id_diagnosa`, `id_gejala`, `nilai_kepercayaan`) VALUES
(1205, 246, 2, 0.2),
(1206, 246, 5, 0.4),
(1207, 246, 15, 0.5),
(1208, 246, 39, 0.7),
(1209, 247, 2, 0.4),
(1210, 247, 5, 0.3),
(1211, 247, 15, 0.7),
(1212, 247, 14, 0.6),
(1213, 247, 16, 0.7),
(1214, 247, 17, 0.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelinci` int(11) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `posterior` float NOT NULL,
  `cftotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_user`, `id_kelinci`, `tgl_diagnosa`, `id_penyakit`, `posterior`, `cftotal`) VALUES
(246, 93, 246, '2019-08-13', 4, 0.046, 0.5),
(247, 1, 247, '2019-08-13', 4, 0.091, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `evidence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `pertanyaan`, `evidence`) VALUES
(1, 'suhu badan induk panas', 'apakah suhu badan induk panas ?', 0.5),
(2, 'nafsu makan berkurang', 'apakah nafsu makannya berkurang ?', 0.4),
(3, 'puting susu bengkak dan keras', 'apakah puting susunya bengkak dan keras ?', 0.6),
(4, 'induk tak mau menyusui anaknya', 'apakah induk tidak mau menyusui anaknya ?', 0.7),
(5, 'berat badan turun', 'apakah berat badannya turun?', 0.4),
(6, 'badan lesu', 'apakah badannya lesu ?', 0.4),
(7, 'gigi berkerot menahan sakit', 'apakah giginya berkerok menahan sakit?', 0.6),
(8, 'berak mencret bercampur darah atau berlendir putih', 'apakah beraknya mencret bercampur darah atau berlendir putih?', 0.7),
(9, 'kepala sering diangkat tinggi-tinggi', 'apakah kepalanya sering diangkat tinggi-tinggi?', 0.5),
(10, 'mata dan telinga kebiru-biruan', 'apakah mata dan telinganya kebiru-biruan?', 0.6),
(11, 'sesak nafas', 'apakah kelincinya sesak nafas?', 0.6),
(12, 'lemas', 'apakah kelincinya sering lemas?', 0.4),
(13, 'kotorannya encer', 'apakah kotorannya encer?', 0.5),
(14, 'kulit kemerah-merahan', 'apakah kulitnya kemerah-merahan?', 0.6),
(15, 'badan penuh koreng', 'apakah badan kelinci penuh dengan koreng?', 0.7),
(16, 'bulu rontok', 'apakah bulunya selalu rontok?', 0.5),
(17, 'gatal - gatal', 'apakah kelincinya sering gatal-gatal?', 0.5),
(18, 'kepala sering digoyang-goyangkan dan digeleng-gelengkan', 'apakah kepalanya sering digoyang-goyangkan dan digeleng-gelengkan?', 0.4),
(19, 'daun telinga digaruk-garuk', 'apakah daun telinganya digaruk-garuk?', 0.5),
(20, 'kulit telinga kemerah-merahan', 'apakah kulit telinganya kemerah-merahan?', 0.5),
(21, 'cairan keluar dari lubang telinga', 'apakah cairannya keluar dari lubang telinga?', 0.5),
(22, 'gatal dan sakit pada telinga yang terserang', 'apakah kelincinya gatal dan sakit pada telinga yang terserang?', 0.7),
(23, 'terdapat bercak merah pada kulit', 'apakah kelincinya terdapat bercak merah pada kulit ?', 0.7),
(24, 'bulu menggumpal dan kusut', 'apakah bulu kelincinya menggumpal dan kusut?', 0.8),
(25, 'terdapat rontokan bulu yang menempel dan menutupi gumpalan bulu yang sudah ada', 'apakah terdapat rontokan bulunya yang menempel dan menutupi gumpalan bulu yang sudah ada?', 0.9),
(26, 'bulu patah', 'apakah bulunya patah?', 0.5),
(27, 'terdapat sisik merah dan keras', 'apakah terdapat sisik merah dan keras?', 0.6),
(28, 'kulit kepala tampak pecah-pecah', 'apakah kulit kepalanya tampak pecah-pecah ?', 0.7),
(29, 'kadang-kadang keluar cairan bernanah dari mata', 'apakah kelincinya kadang-kadang keluar cairan bernanah dari mata?', 0.5),
(30, 'radang berwarna merah pada kelopak mata atau selaput mata', 'apakah kelinci mengalami radang berwarna merah pada kelopak mata atau selaput mata?', 0.6),
(31, 'bulu sekitar mata basah', 'apakah bulu sekitar matanya basah?', 0.6),
(32, 'kelopak mata membengkak', 'apakah kelopak matanya membengkak ?', 0.7),
(33, 'badan kurus', 'apakah badannya kurus?', 0.4),
(34, 'kelinci terlihat pucat', 'apakah kelincinya terlihat pucat ?', 0.5),
(35, 'bulu kusam', 'apakah bulunya kusam?', 0.6),
(36, 'sering menggaruk-garuk bulu sekitar dubur', 'apakah sering menggaruk-garuk bulu disekitar dubur?', 0.7),
(37, 'diare', 'apakah kelincinya mengalami diare?', 0.6),
(38, 'suka makan bulu', 'apakah kelincinya suka makan bulu?', 0.5),
(39, 'kanibal', 'apakah kelincinya memiliki sifat kanibal?', 0.6),
(40, 'sulit hamil dan keguguran', 'apakah sulit hamil dan keguguran?', 0.7),
(41, 'tulang kaki lemah', 'apakah tulang kakinya lemah?', 0.5),
(42, 'tulang kaki bengkok berbentuk huruf O atau X', 'apakah tulang kakinya bengkok berbentuk huruf O atau X?', 0.6),
(43, 'tidak kuat menahan berat badan', 'apakah kelincinya tidak kuat menahan berat badan?', 0.6),
(44, 'sering makan tanah', 'apakah kelincinya sering makan tanah?', 0.7),
(45, 'hanya minum terus', 'apakah hanya minum terus?', 0.5),
(46, 'tidak aktif bermain', 'apakah kelincinya tidak aktif bermain?', 0.5),
(47, 'sering diam disalah satu sudut kandang', 'apakah kelincinya sering diam disalah satu sudut kandang?', 0.6),
(48, 'pandangan mata suram dan kadang seperti berkaca-kaca', 'apakah pandangannya mata suram dan kadang seperti berkaca-kaca?', 0.7),
(49, 'dehidrasi', 'apakah kelinci anda mengalami dehidrasi ?', 0.4),
(50, 'depresi atau stress', 'apakah kelincinya mengalami depresi dan stress?', 0.4),
(51, 'badan membungkuk', 'apakah badannya membungkuk?', 0.5),
(52, 'diare berdarah', 'apakah kelincinya mengalami diare berdarah?', 0.6),
(53, 'nafsu makan tidak menentu', 'apakah nafsu makannya tidak menentu?', 0.4),
(54, 'anus kotor', 'apakah anus kelinci terlihat kotor?', 0.5),
(55, 'suhu tubuh tidak menentu', 'apakah suhu tubuh kelinci tidak menentu ?', 0.4),
(56, 'air mata berlebihan', 'apakah kelnicinya mengerluarkan air mata berlebihan?', 0.4),
(57, 'batuk-batuk', 'apakah kelincinya mengalami batuk-batuk?', 0.4),
(58, 'bersin-bersin', 'apakah kelincinya mengalami bersin-bersin?', 0.4),
(59, 'kaki basah oleh cairan ingus', 'apakah kakinya basah oleh cairan ingus?', 0.5),
(60, 'keluar cairan keruh kental dari hidung', 'apakah keluar cairan keruh kental dari hidungnya?', 0.6),
(61, 'suhu tubuh naik', 'apakah suhu tubunya naik?', 0.4),
(62, 'air kencing berkurang banyak', 'apakah air kencingnya berkurang banyak?', 0.4),
(63, 'gelisah', 'apakah sering mengami gelisah?', 0.4),
(64, 'malas', 'apakah kelincinya malas?', 0.4),
(65, 'kotoran keras', 'apakah kotorannya keras?', 0.5),
(66, 'sulit buang kotoran', 'apakah sulit buang kotoran?', 0.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id_hasil_diagnosa` int(11) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `nilai_kepercayaan` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id_hasil_diagnosa`, `id_diagnosa`, `id_gejala`, `nilai_kepercayaan`) VALUES
(834, 246, 2, 0.000000),
(835, 246, 5, 0.000000),
(836, 246, 15, 0.000000),
(837, 247, 2, 0.000000),
(838, 247, 5, 0.000000),
(839, 247, 15, 0.000000),
(840, 247, 16, 0.000000),
(841, 247, 17, 0.000000),
(842, 247, 14, 0.000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelinci`
--

CREATE TABLE `kelinci` (
  `id_kelinci` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ras` int(11) NOT NULL,
  `nama_kelinci` varchar(100) NOT NULL,
  `berat_badan` tinyint(4) NOT NULL,
  `jk` enum('jantan','betina') NOT NULL,
  `umur` tinyint(4) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelinci`
--

INSERT INTO `kelinci` (`id_kelinci`, `id_user`, `id_ras`, `nama_kelinci`, `berat_badan`, `jk`, `umur`, `warna`) VALUES
(1, 1, 1, 'chubby', 4, 'jantan', 4, 'putih'),
(2, 1, 1, 'chubby', 3, 'jantan', 3, 'putih'),
(3, 1, 1, 'ghussion', 2, 'jantan', 3, 'putih'),
(4, 1, 1, 'jaguar', 3, 'jantan', 3, 'putih'),
(5, 1, 1, 'ghussion', 2, 'jantan', 4, 'putih'),
(6, 1, 1, 'chubby', 2, 'jantan', 3, 'hitam'),
(7, 1, 1, 'chubby', 3, 'jantan', 3, 'putih'),
(8, 1, 1, 'chubby', 2, 'jantan', 2, 'putih'),
(9, 1, 1, 'ghussion', 2, 'jantan', 3, 'putih'),
(10, 1, 1, 'chubby', 2, 'jantan', 2, 'putih'),
(11, 1, 1, 'chubby', 2, 'jantan', 2, 'putih'),
(12, 1, 1, 'chubby', 3, 'jantan', 2, 'hitam'),
(13, 1, 1, 'jaguar', 2, 'jantan', 2, 'hitam'),
(14, 1, 1, 'ghussion', 3, 'jantan', 3, 'hitam'),
(15, 2, 1, 'chubie', 1, 'jantan', 1, 'putih'),
(16, 3, 1, 'phony', 1, 'betina', 1, 'putih'),
(17, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(18, 1, 1, 'poni', 1, 'betina', 1, 'putih'),
(19, 1, 1, 'phony', 1, 'betina', 1, 'putih'),
(20, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(21, 1, 1, 'phony', 1, 'betina', 1, 'putih'),
(22, 1, 1, 'poni', 1, 'betina', 1, 'putih'),
(23, 1, 1, 'poni', 1, 'betina', 1, 'putih'),
(24, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(25, 1, 1, 'poni', 1, 'betina', 1, 'putih'),
(26, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(27, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(28, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(29, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(30, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(31, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(32, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(33, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(34, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(35, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(36, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(37, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(38, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(39, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(40, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(41, 4, 1, 'phony', 1, 'betina', 1, 'putih'),
(42, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(43, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(44, 5, 1, 'poni', 1, 'betina', 1, 'putih'),
(45, 6, 1, 'poni', 1, 'jantan', 1, 'putih'),
(46, 7, 1, 'phony', 1, 'jantan', 1, 'putih'),
(47, 8, 1, 'poni', 1, 'betina', 1, 'putih'),
(48, 9, 1, 'poni', 1, 'betina', 1, 'putih'),
(49, 10, 1, 'phony', 1, 'betina', 1, 'putih'),
(50, 11, 1, 'poni', 1, 'betina', 1, 'putih'),
(51, 12, 1, 'poni', 1, 'betina', 1, 'putih'),
(52, 13, 1, 'poni', 1, 'betina', 1, 'putih'),
(53, 14, 1, 'phony', 1, 'betina', 1, 'putih'),
(54, 15, 1, 'JCHJD', 1, 'betina', 1, 'putih'),
(55, 16, 1, 'poni', 1, 'betina', 1, 'putih'),
(56, 17, 1, 'phony', 1, 'betina', 1, 'putih'),
(57, 18, 1, 'poni', 1, 'betina', 1, 'putih'),
(58, 19, 1, 'FD', 1, 'betina', 1, 'putih'),
(59, 20, 1, 'SGH', 1, 'betina', 1, 'putih'),
(60, 21, 1, 'GFFG', 1, 'jantan', 1, 'putih'),
(61, 22, 1, 'JHJ', 1, 'betina', 1, 'putih'),
(62, 23, 1, 'poni', 1, 'betina', 1, 'putih'),
(63, 24, 1, 'phony', 1, 'betina', 1, 'putih'),
(64, 25, 1, 'gsha', 1, 'jantan', 1, 'putih'),
(65, 26, 1, 'hgj', 1, 'betina', 1, 'putih'),
(66, 27, 1, 'ffh', 1, 'betina', 1, 'putih'),
(67, 28, 1, 'vgj', 1, 'betina', 1, 'putih'),
(68, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(69, 1, 1, 'poni', 1, 'jantan', 1, 'putih'),
(70, 29, 1, 'phony', 1, 'betina', 1, 'putih'),
(71, 1, 1, 'ginson', 1, 'jantan', 1, 'putih'),
(72, 1, 1, 'cg', 1, 'jantan', 1, 'putih'),
(73, 1, 1, 'xfdfg', 1, 'jantan', 1, 'putih'),
(74, 1, 1, 'fxf', 1, 'jantan', 1, 'putih'),
(75, 1, 1, 'hghg', 1, 'jantan', 1, 'putih'),
(76, 1, 1, 'vhh', 1, 'jantan', 1, 'putih'),
(77, 1, 1, 'hhj', 1, 'jantan', 1, 'putih'),
(78, 1, 1, 'dhhhj', 1, 'jantan', 1, 'putih'),
(79, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(80, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(81, 1, 1, 'chubie', 1, 'jantan', 1, 'putih'),
(82, 1, 1, 'chubie', 1, 'jantan', 1, 'putih'),
(83, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(84, 1, 1, 'chubbie', 1, 'jantan', 1, 'putih'),
(85, 1, 1, 'poni', 1, 'betina', 1, 'putih'),
(86, 1, 1, 'chubbie', 1, 'betina', 2, 'putih'),
(87, 1, 1, 'poni', 1, 'jantan', 2, 'putih'),
(88, 1, 1, 'chubbie', 1, 'jantan', 2, 'putih'),
(89, 1, 1, 'phony', 1, 'jantan', 2, 'putih'),
(90, 1, 1, 'phony', 1, 'jantan', 2, 'putih'),
(91, 1, 1, 'phony', 1, 'jantan', 2, 'putih'),
(92, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(93, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(94, 1, 1, 'phony', 1, 'jantan', 1, 'putih'),
(95, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(96, 1, 1, 'phony', 1, 'jantan', 2, 'putih'),
(97, 1, 1, 'chubbie', 1, 'betina', 2, 'putih'),
(98, 1, 1, 'chubbie', 1, 'jantan', 2, 'putih'),
(99, 1, 1, 'reth', 1, 'jantan', 2, 'putih'),
(100, 1, 1, 'poni', 1, 'jantan', 2, 'putih'),
(101, 1, 1, 'chubbby', 1, 'jantan', 2, 'putih'),
(102, 1, 1, 'phony', 1, 'jantan', 2, 'putih'),
(103, 1, 1, 'phony', 1, 'betina', 2, 'putih'),
(104, 1, 1, 'chubby', 1, 'jantan', 2, 'putih'),
(105, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(106, 30, 1, 'chubby', 1, 'betina', 1, 'putih'),
(107, 1, 1, 'ss', 1, 'jantan', 1, 'putih'),
(108, 1, 1, 'gss', 1, 'jantan', 1, 'putih'),
(109, 1, 1, 'ghgh', 1, 'jantan', 1, 'putih'),
(110, 31, 1, 'hghh', 1, 'betina', 1, 'putih'),
(111, 32, 1, 'cghhh', 1, 'betina', 1, 'putih'),
(112, 1, 1, 'hfbj', 1, 'jantan', 1, 'putih'),
(113, 1, 1, 'xff', 1, 'jantan', 1, 'putih'),
(114, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(115, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(116, 1, 1, 'gggs', 1, 'jantan', 1, 'putih'),
(117, 1, 1, 'nssws', 1, 'jantan', 1, 'putih'),
(118, 1, 1, 'chubby', 1, 'jantan', 1, 'putih'),
(119, 1, 1, 'xsxs', 1, 'jantan', 1, 'putih'),
(120, 1, 1, 'hs', 1, 'jantan', 1, 'putih'),
(121, 1, 1, 'bsjaj', 11, 'jantan', 1, 'putih'),
(122, 1, 1, 'sjshjw', 1, 'jantan', 1, 'putih'),
(123, 1, 1, 'dff', 1, 'jantan', 1, 'putih'),
(124, 1, 1, 'sjshjw', 1, 'jantan', 1, 'putih'),
(125, 33, 1, 'haaj', 1, 'betina', 1, 'p'),
(126, 34, 1, 'nxjnsd', 1, '', 1, 'putih'),
(127, 35, 1, 'tftyu', 1, 'betina', 1, 'putih'),
(128, 1, 1, 'dde', 1, 'jantan', 1, 'putih'),
(129, 36, 1, 'sdsds', 1, 'betina', 1, 'putih'),
(130, 1, 1, 'hshs', 1, 'jantan', 1, 'putih'),
(131, 1, 1, 'gy', 1, 'jantan', 1, 'putih'),
(132, 1, 1, 'bsa', 1, 'jantan', 1, 'putih'),
(133, 1, 1, 'shs', 1, 'jantan', 1, 'putih'),
(134, 37, 1, 'bss', 1, 'betina', 1, 'putih'),
(135, 1, 1, 'fygu', 1, 'jantan', 1, 'putih'),
(136, 1, 1, 'dss', 1, 'jantan', 1, 'putih'),
(137, 1, 1, 'nbxsaxbs', 1, 'jantan', 1, 'putih'),
(138, 38, 1, 'sdsd', 1, 'betina', 1, 'putih'),
(139, 1, 1, 'sdsd', 1, 'jantan', 1, 'ddds'),
(140, 39, 1, 'sjns', 1, 'betina', 1, 'putih'),
(141, 40, 1, 'sbxsj', 1, 'betina', 1, 'putih'),
(142, 41, 1, 'ffd', 1, 'betina', 1, 'putih'),
(143, 42, 1, 'ffg', 1, 'betina', 1, 'putih'),
(144, 43, 1, 'cgfh', 1, 'jantan', 1, 'putih'),
(145, 44, 1, 'bjkx', 1, 'betina', 1, 'putih'),
(146, 45, 1, 'ghj', 1, 'betina', 1, 'putih'),
(147, 1, 1, 'ded', 1, 'jantan', 1, 'putih'),
(148, 1, 1, 'ssdsd', 1, 'jantan', 1, 'putih'),
(149, 1, 1, 'ssds', 1, 'jantan', 1, 'putih'),
(150, 1, 1, 'szxss', 1, 'jantan', 1, 'putih'),
(151, 1, 1, 'szxss', 1, 'jantan', 1, 'putih'),
(152, 1, 1, 'sdsdds', 1, 'jantan', 1, 'putih'),
(153, 1, 1, 'dsdd', 1, 'jantan', 1, 'putih'),
(154, 1, 1, 'asss', 1, 'jantan', 1, 'putih'),
(155, 1, 1, 'asss', 1, 'jantan', 1, 'putih'),
(156, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(157, 1, 1, 'dcjds', 1, 'jantan', 0, 'putih'),
(158, 1, 1, 'fhgj', 1, 'jantan', 1, 'putih'),
(159, 1, 1, 'hhjj', 1, 'jantan', 1, 'putih'),
(160, 1, 1, 'hffghj', 1, 'jantan', 1, 'putih'),
(161, 1, 1, 'ghh', 1, 'jantan', 1, 'putih'),
(162, 1, 1, 'vcgv', 1, 'jantan', 1, 'putih'),
(163, 1, 1, 'fdh', 1, 'jantan', 1, 'putih'),
(164, 1, 1, 'cf', 1, 'jantan', 1, 'putih'),
(165, 1, 1, 'cgj', 1, 'jantan', 1, 'putih'),
(166, 1, 1, 'ggy', 1, 'jantan', 1, 'putih'),
(167, 1, 1, 'bzhazja', 1, 'jantan', 1, 'putih'),
(168, 1, 1, 'bxs', 1, 'jantan', 1, 'putih'),
(169, 1, 1, 'ftjh', 1, 'jantan', 1, 'putih'),
(170, 1, 1, 'fvvhv', 1, 'jantan', 1, 'putih'),
(171, 1, 1, 'fcfh', 1, 'jantan', 1, 'putih'),
(172, 1, 1, 'fdjj', 1, 'jantan', 1, 'putih'),
(173, 1, 1, 'chjh', 1, 'jantan', 1, 'putih'),
(174, 1, 1, 'bxsasb', 1, 'jantan', 1, 'putih'),
(175, 1, 1, 'dfdfs', 1, 'jantan', 1, 'putih'),
(176, 1, 1, 'cfgg', 1, 'jantan', 1, 'putih'),
(177, 1, 1, 'hdshs', 1, 'jantan', 1, 'putih'),
(178, 1, 1, 'hsghs', 1, 'jantan', 1, 'putih'),
(179, 1, 1, 'gzagshj', 1, 'jantan', 1, 'putih'),
(180, 1, 1, 'css', 1, 'jantan', 1, 'putih'),
(181, 1, 1, 'dwdwe', 1, 'jantan', 1, 'putih'),
(182, 1, 1, 'dsfdht', 1, 'jantan', 1, 'putih'),
(183, 46, 1, 'xssce', 1, 'betina', 1, 'putih'),
(184, 47, 1, 'dsdre', 1, 'betina', 1, 'putih'),
(185, 48, 1, 'sds', 1, 'betina', 1, 'putih'),
(186, 49, 1, 'zhaasj', 1, 'betina', 1, 'putih'),
(187, 50, 1, 'hsajask', 1, 'betina', 1, 'putih'),
(188, 51, 1, 'jxsjsj', 1, 'betina', 1, 'putih'),
(189, 52, 1, 'xcsccs', 1, 'betina', 1, 'putih'),
(190, 53, 1, 'hxs', 1, 'betina', 1, 'putih'),
(191, 54, 1, 'nxsjk', 1, 'betina', 1, 'putih'),
(192, 55, 1, 'hddhiew', 1, 'jantan', 1, 'putih'),
(193, 56, 1, 'hssja', 1, 'betina', 1, 'putih'),
(194, 57, 1, 'jsdks', 1, 'betina', 1, 'putih'),
(195, 58, 1, 'nbxj', 1, 'jantan', 1, 'putih'),
(196, 59, 1, 'dbshds', 1, 'betina', 1, 'putih'),
(197, 60, 1, 'hgwhsqw', 1, 'betina', 1, 'putih'),
(198, 61, 1, 'bzvxas', 1, 'betina', 1, 'putih'),
(199, 62, 1, 'bxhs', 1, 'betina', 1, 'putih'),
(200, 63, 1, 'xbsdj', 1, 'betina', 1, 'putih'),
(201, 64, 1, 'sxsk', 1, 'betina', 1, 'putih'),
(202, 65, 1, 'xbsaj', 1, 'betina', 1, 'putih'),
(203, 66, 1, 'sgsjak', 1, 'betina', 1, 'putih'),
(204, 67, 1, 'cxg', 1, 'betina', 1, 'putih'),
(205, 68, 1, 'ssjdh', 1, 'betina', 1, 'putih'),
(206, 1, 1, 'zgs', 1, 'jantan', 1, 'putih'),
(207, 1, 2, 'poni', 5, 'jantan', 6, 'putih'),
(208, 1, 2, 'chubie', 3, 'jantan', 4, 'cokelat'),
(209, 1, 1, 'r', 5, 'jantan', 4, 'ddds'),
(210, 69, 1, 'gssgwhw', 1, 'jantan', 1, 'putih'),
(211, 70, 1, 'ssjkhkd', 1, 'jantan', 1, 'putih'),
(212, 71, 1, 'bhsaxsa', 1, 'betina', 1, 'putih'),
(213, 1, 1, 'ashsa', 1, 'jantan', 1, 'putih'),
(214, 1, 1, 'nsjs', 1, 'jantan', 1, 'putih'),
(215, 1, 1, 'bhsbhs', 1, 'jantan', 1, 'putih'),
(216, 72, 1, 'ssahh', 1, 'jantan', 1, 'putih'),
(217, 1, 1, 'nsbxxsj', 1, 'jantan', 1, 'putih'),
(218, 1, 1, 'bxhss', 1, 'jantan', 1, 'putih'),
(219, 1, 1, 'sdsd', 1, 'jantan', 1, 'putih'),
(220, 1, 1, 'shgxsds', 1, 'jantan', 1, 'putih'),
(221, 1, 1, 'bsdkee', 1, 'jantan', 1, 'putih'),
(222, 73, 1, 'hhdhdgshd', 1, 'betina', 1, 'putih'),
(223, 74, 1, 'hxsdsed', 1, 'betina', 1, 'putih'),
(224, 75, 1, 'sde', 1, 'betina', 1, 'putih'),
(225, 76, 1, 'hxshhs', 1, 'betina', 1, 'putih'),
(226, 77, 1, 'bxsjs', 1, 'jantan', 1, 'putih'),
(227, 78, 1, 'bxasx', 1, 'betina', 1, 'putih'),
(228, 79, 1, 'ncjsdjds', 1, 'betina', 1, 'putih'),
(229, 80, 1, 'jxsjsj', 1, 'betina', 1, 'putih'),
(230, 81, 1, 'bsajd', 1, 'betina', 1, 'putih'),
(231, 82, 1, 'nsbsd', 1, 'betina', 1, 'putih'),
(232, 83, 1, 'bxhsaxas', 1, 'betina', 1, 'putih'),
(233, 84, 1, 'sbdhsd', 1, 'betina', 1, 'putih'),
(234, 85, 1, 'njkkk', 1, 'betina', 1, 'putih'),
(235, 86, 1, 'gwswsw', 1, 'betina', 1, 'putih'),
(236, 87, 1, 'vgyyy', 1, 'betina', 1, 'putih'),
(237, 88, 1, 'ggh', 1, 'betina', 1, 'putih'),
(238, 89, 1, 'gyb', 1, 'betina', 1, 'putih'),
(239, 90, 1, 'gswsh', 1, 'betina', 1, 'putih'),
(240, 91, 1, 'xbshxjs', 1, 'betina', 1, 'putih'),
(241, 1, 1, 'chubbie', 1, 'jantan', 1, 'cokelat'),
(242, 92, 1, 'chubie', 1, 'betina', 1, 'putih'),
(243, 1, 1, 'chubbby', 2, 'jantan', 6, 'putih'),
(244, 1, 1, 'chubbby', 1, 'jantan', 1, 'putih'),
(245, 1, 1, 'chjh', 1, 'jantan', 1, 'putih'),
(246, 93, 3, 'chubby', 3, 'jantan', 2, 'putih'),
(247, 1, 1, 'chubby', 1, 'jantan', 3, 'putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `batas_umur` tinyint(4) NOT NULL,
  `aturan` text NOT NULL,
  `tindakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_penyakit`, `id_gejala`, `nama_obat`, `batas_umur`, `aturan`, `tindakan`) VALUES
(1, 4, 1, 'wormectin', 2, '&#34;0,02 per kg berat badan', 'bawa ke klinik'),
(2, 1, 3, 'momilen', 2, 'oleskan ke tempat yang luka', 'rawat dirumah'),
(3, 2, 8, 'intracox oral', 2, '&#34;&#34;1 ml per 3.5 kg berat bdan', 'rawat di rumah'),
(4, 13, 52, 'intracox oral', 2, '1 ml per 3.5 berat badan', 'rawat dirumah'),
(5, 3, 11, 'oxylin', 2, '0.1 - 0.2 ml/kg berat kelinci', 'bawa ke klinik'),
(6, 5, 21, 'paranicol', 2, 'teteskan 2 kali dalam sehari', 'rawat di rumah'),
(7, 7, 28, 'bubuk belerang', 2, 'taburkan ke tempat yang berjamur', 'rawat dirumah'),
(8, 7, 28, 'bubuk belerang', 2, 'taburkan ke tempat yang berjamur', 'rawat dirumah'),
(9, 6, 1, 'iodium tinture', 2, 'oleskan ke bagian kulit yang terserang', 'rawat di rumah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencegahan`
--

CREATE TABLE `pencegahan` (
  `id_pencegahan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `nama_pencegahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pencegahan`
--

INSERT INTO `pencegahan` (`id_pencegahan`, `id_penyakit`, `id_gejala`, `nama_pencegahan`) VALUES
(1, 4, 2, 'menjaga kebersihan kandang dan juga buang sisa-sisa makanan yang tersisa'),
(2, 4, 15, 'menjaga kebersihan kandang dan juga buang sisa-sisa makanan yang tersisa'),
(3, 2, 8, 'menjaga kebersihan kandang kelinci, sering membersihkan kotoran kelinci, sgera pisahkan jika ada kel'),
(4, 14, 60, 'membersihan andang dan mengusahakan kandang tetap kering'),
(5, 1, 3, 'menjaga kebersihan kandang, beri nutrisi yang baik pada pakan, cukup ruang bergerak dalam kandang da');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `probabilitas` float NOT NULL,
  `nilai_mb` float NOT NULL,
  `nilai_md` float NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `id_penyakit`, `id_gejala`, `probabilitas`, `nilai_mb`, `nilai_md`, `nilai_cf`) VALUES
(4, 1, 2, 0.4, 0, 0, 0),
(5, 1, 3, 0.4, 0.333, 0, 0.333),
(6, 1, 4, 0.4, 0.5, 0, 0.5),
(7, 2, 2, 0.4, 0, 0, 0),
(8, 2, 5, 0.4, 0, 0, 0),
(9, 2, 6, 0.4, 0.167, 0, 0.167),
(10, 2, 7, 0.4, 0.333, 0, 0.333),
(11, 2, 8, 0.4, 0.5, 0, 0.5),
(12, 3, 2, 0.4, 0, 0, 0),
(13, 3, 12, 0.4, 0, 0, 0),
(14, 3, 10, 0.4, 0.333, 0, 0.333),
(15, 3, 9, 0.4, 0.167, 0, 0.167),
(17, 3, 13, 0.4, 0.167, 0, 0.167),
(18, 4, 2, 0.4, 0, 0, 0),
(19, 4, 5, 0.4, 0, 0, 0),
(21, 4, 15, 0.4, 0.5, 0, 0.5),
(22, 4, 16, 0.4, 0.167, 0, 0.167),
(23, 4, 17, 0.4, 0.167, 0, 0.167),
(24, 5, 5, 0.4, 0, 0, 0),
(25, 5, 18, 0.4, 0, 0, 0),
(26, 5, 19, 0.4, 0.167, 0, 0.167),
(27, 5, 20, 0.4, 0.167, 0, 0.167),
(28, 5, 21, 0.4, 0.167, 0, 0.167),
(29, 5, 22, 0.4, 0.5, 0, 0.5),
(30, 6, 17, 0.4, 0.333, 0, 0.333),
(31, 6, 18, 0.4, 0.333, 0, 0.333),
(32, 6, 23, 0.4, 0.5, 0, 0.5),
(33, 6, 24, 0.4, 0.667, 0, 0.667),
(34, 6, 25, 0.4, 0.833, 0, 0.833),
(35, 7, 26, 0.4, 0.167, 0, 0.167),
(36, 7, 27, 0.4, 0.333, 0, 0.333),
(37, 7, 28, 0.4, 0.5, 0, 0.5),
(38, 8, 29, 0.4, 0.167, 0, 0.167),
(39, 8, 30, 0.4, 0.333, 0, 0.333),
(40, 8, 31, 0.4, 0.333, 0, 0.333),
(41, 8, 32, 0.4, 0.5, 0, 0.5),
(42, 9, 2, 0.4, 0, 0, 0),
(43, 9, 6, 0.4, 0, 0, 0),
(44, 9, 33, 0.4, 0, 0, 0),
(45, 9, 34, 0.4, 0.167, 0, 0.167),
(46, 9, 35, 0.4, 0.333, 0, 0.333),
(47, 9, 36, 0.4, 0.5, 0, 0.5),
(48, 9, 37, 0.4, 0.333, 0, 0.333),
(49, 10, 2, 0.4, 0, 0, 0),
(50, 10, 5, 0.4, 0, 0, 0),
(51, 10, 38, 0.4, 0.167, 0, 0.167),
(52, 10, 39, 0.4, 0.333, 0, 0.333),
(53, 10, 40, 0.4, 0.5, 0, 0.5),
(54, 11, 41, 0.4, 0.167, 0, 0.167),
(55, 11, 42, 0.4, 0.333, 0, 0.333),
(56, 11, 43, 0.4, 0.333, 0, 0.333),
(57, 11, 44, 0.4, 0.5, 0, 0.5),
(58, 12, 2, 0.4, 0, 0, 0),
(59, 12, 45, 0.4, 0.167, 0, 0.167),
(60, 12, 46, 0.4, 0.167, 0, 0.167),
(61, 12, 47, 0.4, 0.333, 0, 0.333),
(62, 12, 48, 0.4, 0.5, 0, 0.5),
(63, 13, 5, 0.4, 0, 0, 0),
(64, 13, 49, 0.4, 0, 0, 0),
(65, 13, 50, 0.4, 0, 0, 0),
(66, 13, 13, 0.4, 0.167, 0, 0.167),
(67, 13, 6, 0.4, 0, 0, 0),
(68, 13, 51, 0.4, 0.167, 0, 0.167),
(69, 13, 52, 0.4, 0.333, 0, 0.333),
(70, 13, 53, 0.4, 0, 0, 0),
(71, 13, 33, 0.4, 0, 0, 0),
(72, 14, 56, 0.4, 0, 0, 0),
(73, 14, 57, 0.4, 0, 0, 0),
(74, 14, 58, 0.4, 0, 0, 0),
(75, 14, 59, 0.4, 0.167, 0, 0.167),
(76, 14, 60, 0.4, 0.333, 0, 0.333),
(77, 14, 30, 0.4, 0.333, 0, 0.333),
(78, 14, 11, 0.4, 0.333, 0, 0.333),
(79, 14, 61, 0.4, 0, 0, 0),
(80, 15, 62, 0.4, 0, 0, 0),
(81, 15, 63, 0.4, 0.167, 0, 0.167),
(82, 15, 64, 0.4, 0, 0, 0),
(83, 15, 65, 0.4, 0.333, 0, 0.333),
(84, 15, 2, 0.4, 0, 0, 0),
(85, 15, 66, 0.4, 0.5, 0, 0.5),
(86, 1, 1, 0.4, 0.167, 0, 0.167),
(87, 3, 11, 0.4, 0.333, 0, 0.333),
(88, 13, 54, 0.4, 0.167, 0, 0.167),
(89, 13, 55, 0.4, 0, 0, 0),
(90, 4, 14, 0.4, 0.333, 0, 0.333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
(1, 'mastitis ( radang ambing / susu )'),
(2, 'koksidiosis ( berak darah )'),
(3, 'pnemonia ( radang paru-paru )'),
(4, 'scabies'),
(5, 'radang telinga'),
(6, 'ringworn'),
(7, 'favus ( infeksi kulit kepala )'),
(8, 'radang mata'),
(9, 'cacingan'),
(10, 'malnutrisi'),
(11, 'hipocakemia'),
(12, 'kembung'),
(13, 'diare'),
(14, 'pilek'),
(15, 'sembelit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ras`
--

CREATE TABLE `ras` (
  `id_ras` int(11) NOT NULL,
  `nama_ras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ras`
--

INSERT INTO `ras` (`id_ras`, `nama_ras`) VALUES
(1, 'mongolia'),
(2, 'angora'),
(3, 'raksasa flemish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `poto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `jk`, `no_hp`, `email`, `alamat`, `username`, `password`, `poto`) VALUES
(1, 'lela', 'ria lestari', 'perempuan', '98789788978', 'akun.chatomz@gmail.com', 'jl bandung', 'lela', '$2y$10$2bB9Y9cUbHycT/xJzFvxkuaeh4jYRD/NY43p7v2MrvzJpB.u6Tud2', '_DSC0327.jpg'),
(2, 'Sasa', 'sisi', 'laki-laki', '089876543212', '', 'sasasa', '', '', ''),
(3, 'sasa', 'sasi', 'laki-laki', '082345654321', '', 'najzx', '', '', ''),
(4, 'sasa', 'Sisi', 'laki-laki', '087654321234', '', 'Cisarua', '', '', ''),
(5, 'sasa', 'Sisi', 'laki-laki', '087654321234', '', 'chj', '', '', ''),
(6, 'sasa', 'Sisi', 'laki-laki', '087654321234', '', 'chj', '', '', ''),
(7, 'Sasa', 'sisi', 'laki-laki', '087654321234', '', 'gfh', '', '', ''),
(8, 'sasa', 'sasi', 'laki-laki', '089876543212', '', 'cghh', '', '', ''),
(9, 'eer', 'ff', 'laki-laki', '082345654321', '', 'vdrtt', '', '', ''),
(10, 'siti', 'sssq', 'laki-laki', '089876543212', '', 'hjs', '', '', ''),
(11, 'seli', 'sela', 'laki-laki', '087654321234', '', 'ghgu', '', '', ''),
(12, 'Sasa', 'sisi', 'laki-laki', '087654321234', '', 'sasas', '', '', ''),
(13, 'asa', 'assa', 'laki-laki', '087654321234', '', 'AAXASXA', '', '', ''),
(14, 'GG', 'CG', 'laki-laki', '087654321234', '', 'CGH', '', '', ''),
(15, 'HDJD', 'BJDCD', 'laki-laki', '087654321234', '', 'VDSH', '', '', ''),
(16, 'FTH', 'CG', 'laki-laki', '087654321234', '', 'DFD', '', '', ''),
(17, 'DDF', 'BB', 'laki-laki', '082345654321', '', 'CXS', '', '', ''),
(18, 'FFFH', 'CHGH', 'laki-laki', '082345654321', '', 'CGH', '', '', ''),
(19, 'CGG', 'DF', 'laki-laki', '089876543212', '', 'GY', '', '', ''),
(20, 'ZG', 'DT', 'laki-laki', '089876543212', '', 'XYJ', '', '', ''),
(21, 'GV', 'GF', 'laki-laki', '087654321234', '', 'HGHHJ', '', '', ''),
(22, 'CGF', 'GH', 'laki-laki', '087654321234', '', 'HGHGH', '', '', ''),
(23, 'nida', 'jhhj', 'laki-laki', '087654321234', '', 'ggxhssk', '', '', ''),
(24, 'lela', 'ghj', 'laki-laki', '082345671123', '', 'vhghjjjh', '', '', ''),
(25, 'hsghs', 'xshg', 'laki-laki', '087654321234', '', 'hjwhueu', '', '', ''),
(26, 'dffy', 'vhgu', 'laki-laki', '087654321234', '', 'fjk', '', '', ''),
(27, 'fgfh', 'thf', 'laki-laki', '087654321234', '', 'fgf', '', '', ''),
(28, 'GV', 'cgg', 'laki-laki', '082345654321', '', 'bhbj', '', '', ''),
(29, 'ghg', 'GF', 'laki-laki', '082345654321', '', 'cgfhg', '', '', ''),
(30, 'xssx', 'sssq', 'laki-laki', '089876543212', '', 'sss', '', '', ''),
(31, 'gfh', 'fcg', 'laki-laki', '082345671123', '', 'hvhgh', '', '', ''),
(32, 'ddtt', 'ghg', 'laki-laki', '087654321234', '', 'bjbjk', '', '', ''),
(33, 'shxs', 'bxhsx', 'laki-laki', '08211345781', '', 'vsxshhsxbshxs', '', '', ''),
(34, 'xcsdcds', 'dcdscdcdc', 'laki-laki', '08211345781', '', 'cdc', '', '', ''),
(35, 'fgfhg', 'xxft', 'laki-laki', '08211345781', '', 'dtyty', '', '', ''),
(36, 'sdsfds', 'dff', 'laki-laki', '087654321234', '', 'fdff', '', '', ''),
(37, 'dc', 'dfrf', 'laki-laki', '087654321234', '', 'sxhss', '', '', ''),
(38, 'sdsfds', 'ssds', 'laki-laki', '087654321234', '', 'sdsa', '', '', ''),
(39, 'ssdd', 'sds', 'laki-laki', '082345654321', '', 'sdsd', '', '', ''),
(40, 'bsbxjhsx', 'bxhs', 'laki-laki', '082345654321', '', 'nxjsx', '', '', ''),
(41, 'dffy', 'ffv', 'laki-laki', '082345654321', '', 'ffrfrrre', '', '', ''),
(42, 'vhj', 'gtfy', 'laki-laki', '087654321234', '', 'ghj', '', '', ''),
(43, 'hjj', 'xf', 'laki-laki', '082345654321', '', 'vhhgh', '', '', ''),
(44, 'hgsxhsj', 'vsxhsaj', 'laki-laki', '082345654321', '', 'ashdgsdd', '', '', ''),
(45, 'vhgj', 'bjj', 'laki-laki', '082345654321', '', 'bbb', '', '', ''),
(46, 'dsds', 'sssde', 'laki-laki', '08211345781', '', 'sddwefer', '', '', ''),
(47, 'sddw', 'dfdfr', 'laki-laki', '08211345781', '', 'dedeer', '', '', ''),
(48, 'dsdsd', 'vdfd', 'laki-laki', '08211345781', '', 'frgtgr', '', '', ''),
(49, 'xhasjxa', 'xghasj', 'laki-laki', '08211345781', '', 'bsvshdj', '', '', ''),
(50, 'shasj', 'bss', 'laki-laki', '082345671123', '', 'bsxsaj', '', '', ''),
(51, 'snxsjh', 'sshh', 'laki-laki', '082345654321', '', 'nbxjsj', '', '', ''),
(52, 'scsdc', 'dscsd', 'laki-laki', '087654321234', '', 'dccsd', '', '', ''),
(53, 'hbxskj', 'bnxvhsh', 'laki-laki', '082345654321', '', 'sxjs', '', '', ''),
(54, 'sxbs', 'js', 'laki-laki', '087654321234', '', 'jsjxs', '', '', ''),
(55, 'hgsdu', 'hsgsu', 'laki-laki', '08211345781', '', 'snxsk', '', '', ''),
(56, 'sxsah', 'bsdjsd', 'laki-laki', '087654321234', '', 'nsjxsk', '', '', ''),
(57, 'skask', 'sjs', 'laki-laki', '087654321234', '', 'nsbas', '', '', ''),
(58, 'sbxjs', 'bxjsk', 'laki-laki', '082345671123', '', 'nsxsk', '', '', ''),
(59, 'xchs', 'cbsdh', 'laki-laki', '087654321234', '', 'sbdshdj', '', '', ''),
(60, 'hhs', 'dhsgs', 'laki-laki', '082345654321', '', 'cdh', '', '', ''),
(61, 'sahx', 'bsvhxaj', 'laki-laki', '082123432123', '', 'sxs', '', '', ''),
(62, 'shasj', 'bshj', 'laki-laki', '082345671123', '', 'xasbjsa', '', '', ''),
(63, 'nbdcud', 'bdh', 'laki-laki', '087654321234', '', 'jdhedhcei', '', '', ''),
(64, 'hsxas', 'sxs', 'laki-laki', '087654321234', '', 'sxsxs', '', '', ''),
(65, 'xsvxhs', 'bsvxhs', 'laki-laki', '082345654321', '', 'sxsa', '', '', ''),
(66, 'gayys', 'sgsu', 'laki-laki', '082345654321', '', 'sxsss', '', '', ''),
(67, 'fb', 'fyb', 'laki-laki', '082345654321', '', 'cghn', '', '', ''),
(68, 'shdsh', 'ssgd', 'laki-laki', '087654321234', '', 'dhgjj', '', '', ''),
(69, 'bhdhe', 'bdhd', 'laki-laki', '082345671123', '', '', '', '', ''),
(70, 'bdhdj', 'bdcd', 'laki-laki', '087654321234', '', 'wn whd', '', '', ''),
(71, 'nbsjsj', 'ddd', 'laki-laki', '082345654321', '', 'awdwwde', '', '', ''),
(72, 'vdhdh', 'shd', 'laki-laki', '087654321234', '', 'bwsjdwje', '', '', ''),
(73, 'ssygd', 'vsdgy', 'laki-laki', '087654321234', '', 'bvdshde', '', '', ''),
(74, 'dfrre', 'rrere', 'laki-laki', '082345654321', '', 'dwdew', '', '', ''),
(75, 'ssdd', 'sdsd', 'laki-laki', '087654321234', '', 'shsdsdu', '', '', ''),
(76, 'ssh', 'shs', 'laki-laki', '087654321234', '', 'dsdsf', '', '', ''),
(77, 'nbssj', 'nbsdjsd', 'laki-laki', '087654321234', '', 'bhsjs', '', '', ''),
(78, 'hsxbs', 'bsxs', 'laki-laki', '089876543212', '', 'bshxsh', '', '', ''),
(79, 'sjnsd', 'ssdh', 'laki-laki', '087654321234', '', 'hxsa', '', '', ''),
(80, 'ssh', 'bxsxs', 'laki-laki', '089876543212', '', 'jznjasxks', '', '', ''),
(81, 'shdsd', 'hsdhh', 'laki-laki', '089876543212', '', 'sbdde', '', '', ''),
(82, 'ndd', 'jcjdd', 'laki-laki', '087654321234', '', 'dberref', '', '', ''),
(83, 'bhs', 'cbdss', 'laki-laki', '087654321234', '', 'dccsdc', '', '', ''),
(84, 'bshds', 'bvsdh', 'laki-laki', '089876543212', '', 'n ssdjjdde', '', '', ''),
(85, 'gshh', 'ssgs', 'laki-laki', '089876543212', '', 'bsvdde', '', '', ''),
(86, 'svhdee', 'vxsgd', 'laki-laki', '089876543212', '', 'bshddesjd', '', '', ''),
(87, 'ftftf', 'cf', 'laki-laki', '087654321234', '', 'vgyg', '', '', ''),
(88, 'chgh', 'gg', 'laki-laki', '082345654321', '', 'ccf', '', '', ''),
(89, 'vcgg', 'hbh', 'laki-laki', '087654321234', '', 'vhhb', '', '', ''),
(90, 'bsbhsj', 'nxbsxs', 'laki-laki', '089876543212', '', 'snx bs', '', '', ''),
(91, 'hxhds', 'hbhhsd', 'laki-laki', '087654321234', '', 'xmsxs', '', '', ''),
(92, 'lela', 'lestari', 'laki-laki', '', '', 'cisarua', '', '', ''),
(93, 'agung', 'ardiansyah', 'laki-laki', '08767473672', '', 'jl sukarindik', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`id_detail_diagnosa`),
  ADD KEY `id_diagnosa` (`id_diagnosa`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `kelinci diagnosa` (`id_kelinci`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil_diagnosa`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_diagnosa` (`id_diagnosa`);

--
-- Indeks untuk tabel `kelinci`
--
ALTER TABLE `kelinci`
  ADD PRIMARY KEY (`id_kelinci`),
  ADD KEY `id_pengguna` (`id_user`),
  ADD KEY `id_ras` (`id_ras`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `pencegahan`
--
ALTER TABLE `pencegahan`
  ADD PRIMARY KEY (`id_pencegahan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `ras`
--
ALTER TABLE `ras`
  ADD PRIMARY KEY (`id_ras`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `id_detail_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1215;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id_hasil_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT untuk tabel `kelinci`
--
ALTER TABLE `kelinci`
  MODIFY `id_kelinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pencegahan`
--
ALTER TABLE `pencegahan`
  MODIFY `id_pencegahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ras`
--
ALTER TABLE `ras`
  MODIFY `id_ras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail diagnosa` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelinci diagnosa` FOREIGN KEY (`id_kelinci`) REFERENCES `kelinci` (`id_kelinci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `hasil diagnosa` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelinci`
--
ALTER TABLE `kelinci`
  ADD CONSTRAINT `kelinci ras` FOREIGN KEY (`id_ras`) REFERENCES `ras` (`id_ras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelinci user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pencegahan`
--
ALTER TABLE `pencegahan`
  ADD CONSTRAINT `pencegahan gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pencegahan penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD CONSTRAINT `pengetahuan gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengetahuan penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
