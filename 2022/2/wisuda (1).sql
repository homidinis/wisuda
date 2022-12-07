-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 16.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisuda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_makan`
--

CREATE TABLE `t_makan` (
  `id` int(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_presensi`
--

CREATE TABLE `t_presensi` (
  `id` int(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_presensi`
--

INSERT INTO `t_presensi` (`id`, `nim`, `timestamp`) VALUES
(16, '21.N4.0003', '2022-06-01 08:22:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wisudawan`
--

CREATE TABLE `t_wisudawan` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nomorkursi` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `kodeunik` varchar(255) NOT NULL,
  `undangan_1` varchar(255) NOT NULL,
  `undangan_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_wisudawan`
--

INSERT INTO `t_wisudawan` (`id`, `nama`, `nim`, `nomorkursi`, `prodi`, `fakultas`, `kodeunik`, `undangan_1`, `undangan_2`) VALUES
(1, 'RIDHA WAHYUTOMO ', '19.A2.0007', 'VIP 1', 'Magister Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(2, 'INDRABAYU NURSA ', '17.L1.0054', 'VIP 2', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(3, 'ALDIAN SEPUTRA SUDIANTO ', '17.B1.0042', 'VIP 3', 'Teknik Sipil', 'Teknik', '', '', ''),
(4, 'WAHYU INDRIAWAN ', '18.C2.0003', 'VIP 4', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(5, 'NICOLAS BAYU KUSUMA AJI ', '18.C1.0011', 'VIP 5', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(6, 'ANATASYA CAROLINA ', '18.M1.0091', 'VIP 6', 'Ilmu Komunikasi', 'Hukum dan Komunikasi', '', '', ''),
(7, 'YOSUA PRATAMA WIJAYA ', '18.D1.0019', 'VIP 7', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(8, 'MANUEL GIOVANNIE PRIJANTO ', '18.G1.0214', 'VIP 8', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(9, 'ENRIQUETA MIRANDA ', '19.H1.0034', 'VIP 9', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(10, 'ESTERRINA SYMENI HARUMININGTYAS ', '18.E1.0266', 'VIP 10', 'Psikologi', 'Psikologi', '', '', ''),
(11, 'ALICE SEPTIANA DEWI ', '20.I3.0007', 'VIP 11', 'Magister Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(12, 'STANLEY ADRIAN SOESILO ', '18.I1.0035', 'VIP 12', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(13, 'OEY, LYSBETH VENELLA ', '18.N1.0008', 'VIP 13', 'Sistem Informasi', 'Ilmu Komputer', '', '', ''),
(14, 'SUSANA ADI ASTUTI ', '19.O2.0001', '1', 'Program Doktor Ilmu Lingkungan', 'Ilmu dan Teknologi Lingkungan', '', '', ''),
(15, 'SRIWATI PURNOMO ', '19.A2.0008', '2', 'Magister Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(16, 'AWANG HERDIANSYAH ', '20.A2.0011', '3', 'Magister Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(17, 'ZIA AMALA WAFI ', '19.A2.0006', '4', 'Magister Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(18, 'NADINA LELIANI RITOYO ', '16.A1.0054', '5', 'Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(19, 'FANNY NANDA APRILIO ', '17.A1.0069', '6', 'Arsitektur', 'Arsitektur dan Desain', '', '', ''),
(20, 'JESSICA EVITA SANTOSO ', '15.L1.0053', '7', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(21, 'JOSEPH VIDO ADITYA SOESANTO ', '16.L1.0053', '8', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(22, 'BENEDIKTUS FELIM ', '17.L1.0003', '9', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(23, 'ANDRE PRASETYA ', '17.L1.0007', '10', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(24, 'VANIA BELLA KRISTANTO ', '17.L1.0068', '11', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(25, 'STEVANI OCTA HERLINDA ', '18.L1.0092', '12', 'Desain Komunikasi Visual', 'Arsitektur dan Desain', '', '', ''),
(26, 'YOHANES WIDAYAT ', '20.B5.0031', '13', 'Program Profesi Insinyur RPL', 'Teknik', '', '', ''),
(27, 'NOVI ANGGORO ANDRIYANTO ', '20.B5.0034', '14', 'Program Profesi Insinyur RPL', 'Teknik', '', '', ''),
(28, 'DANIEL HARTANTO ', '20.B5.0035', '15', 'Program Profesi Insinyur RPL', 'Teknik', '', '', ''),
(29, 'WHISNU ALAM TIRTANA ', '21.B5.0006', '16', 'Program Profesi Insinyur RPL', 'Teknik', '', '', ''),
(30, 'PRATIKA RIRIS PUTRIANTI ', '21.B5.0009', '17', 'Program Profesi Insinyur RPL', 'Teknik', '', '', ''),
(31, 'FIONA INDAH YURISAPUTRI MARTANNI ', '17.B1.0085', '18', 'Teknik Sipil', 'Teknik', '', '', ''),
(32, 'LALA AYULINASIH ', '17.B1.0103', '19', 'Teknik Sipil', 'Teknik', '', '', ''),
(33, 'RIZKY HARYA MUKTI ', '17.B1.0115', '20', 'Teknik Sipil', 'Teknik', '', '', ''),
(34, 'FRIEDRICH ADESCANIUS SURYAWINATA ', '17.B1.0122', '21', 'Teknik Sipil', 'Teknik', '', '', ''),
(35, 'ALFIUS RONDY ARDIANTO ', '15.B1.0027', '22', 'Teknik Sipil', 'Teknik', '', '', ''),
(36, 'JOHAN AJI RAHARJO ', '15.B1.0034', '23', 'Teknik Sipil', 'Teknik', '', '', ''),
(37, 'FEBRY YOGIYANSYAH ', '16.B1.0094', '24', 'Teknik Sipil', 'Teknik', '', '', ''),
(38, 'HADIS CARAWAN ', '16.B1.0104', '25', 'Teknik Sipil', 'Teknik', '', '', ''),
(39, 'ANTONIUS CHRISTOPHER DWI BASUKI ', '17.B1.0003', '26', 'Teknik Sipil', 'Teknik', '', '', ''),
(40, 'MICHAEL SANDJAYA YULIANTO ', '17.B1.0012', '27', 'Teknik Sipil', 'Teknik', '', '', ''),
(41, 'DANIEL SURYO WASONO ', '17.B1.0015', '28', 'Teknik Sipil', 'Teknik', '', '', ''),
(42, 'ADITYA MANUNG PRATAMA ', '17.B1.0027', '29', 'Teknik Sipil', 'Teknik', '', '', ''),
(43, 'PREDESTIAN REFNASTITO PRISANDI ', '17.B1.0029', '30', 'Teknik Sipil', 'Teknik', '', '', ''),
(44, 'LUTHFI NINDYAPRADANA ', '17.B1.0044', '31', 'Teknik Sipil', 'Teknik', '', '', ''),
(45, 'SINDU ALFISAM ', '17.B1.0045', '32', 'Teknik Sipil', 'Teknik', '', '', ''),
(46, 'TAVIO FORTINO TIRTOSUGONDO ', '17.B1.0047', '33', 'Teknik Sipil', 'Teknik', '', '', ''),
(47, 'ANI DYANINGSIH ', '17.B1.0058', '34', 'Teknik Sipil', 'Teknik', '', '', ''),
(48, 'SANDRA AJENG LILIANI ', '17.B1.0062', '35', 'Teknik Sipil', 'Teknik', '', '', ''),
(49, 'MARSELA FEBRIANI JEHUDU ', '17.B1.0076', '36', 'Teknik Sipil', 'Teknik', '', '', ''),
(50, 'IQBAAL RIZKY ANANTO ', '17.B1.0084', '37', 'Teknik Sipil', 'Teknik', '', '', ''),
(51, 'BAYU ARVIAN SYAACH ', '17.B1.0091', '38', 'Teknik Sipil', 'Teknik', '', '', ''),
(52, 'AMELIA PUTRI SABELA ', '17.B1.0131', '39', 'Teknik Sipil', 'Teknik', '', '', ''),
(53, 'IRWAN RIFLANDO SIBUEA ', '20.B1.0050', '40', 'Teknik Sipil', 'Teknik', '', '', ''),
(54, 'WAHYU NUR MUSDALIFAH ', '21.C2.0025', '41', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(55, 'LISWATI ', '18.C2.0006', '42', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(56, 'YETRIM INANG SULA ', '18.C2.0061', '43', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(57, 'JARWA ', '18.C2.0082', '44', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(58, 'WIDIYO ERTANTO ', '19.C2.0008', '45', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(59, 'ALBERTUS ADITYA ASMARA HADI ', '21.C2.0086', '46', 'Magister Hukum', 'Hukum dan Komunikasi', '', '', ''),
(60, 'VANIA INTAN CAHYA HARTONO ', '17.C1.0002', '47', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(61, 'NOVITA CHAIRUNISA ', '17.C1.0030', '48', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(62, 'MUHAMMAD RIFKY RAMADHAN ', '15.C1.0037', '49', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(63, 'EKO PRAYONO GOLF ', '15.C1.0078', '50', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(64, 'YUNI SUGIYARTI ', '16.C1.0021', '51', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(65, 'LAURENSIUS CAESARIO HERU SURYOLAKSONO ', '17.C1.0031', '52', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(66, 'JEANNY HAPSARI ', '17.C1.0063', '53', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(67, 'NI NYOMAN SHERA MAHARANI ', '17.C1.0078', '54', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(68, 'YONATHAN FRANSMILE PANDAPOTAN SIREGAR ', '17.C1.0123', '55', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(69, 'NABILLA IMAWATI ', '17.C1.0157', '56', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(70, 'IRSYAD ZHAFARJUNA ', '17.C1.0166', '57', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(71, 'HOO, AGUSTINE DEWI HARTANTO ', '19.C1.0117', '58', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(72, 'HERMAWAN LAKSONO BUDISIDHARTA ', '20.C1.0088', '59', 'Ilmu Hukum', 'Hukum dan Komunikasi', '', '', ''),
(73, 'AGNES HELENA RAHANGIAR ', '18.M1.0100', '60', 'Ilmu Komunikasi', 'Hukum dan Komunikasi', '', '', ''),
(74, 'KEVIN WIJAYA ', '17.M1.0016', '61', 'Ilmu Komunikasi', 'Hukum dan Komunikasi', '', '', ''),
(75, 'RIO WIRANTO ', '19.D3.0018', '62', 'Magister Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(76, 'YUVENSIUS ARSELUS HALEK ', '19.G3.0007', '63', 'Magister Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(77, 'JESSICA EVELINA WIBOWO ', '15.D1.0044', '64', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(78, 'INDRA HARTONO WIBOWO ', '17.D1.0068', '65', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(79, 'NOVITA YULYANTI ', '17.D1.0074', '66', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(80, 'HEPPY DEBY GUNAWAN ', '17.D1.0145', '67', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(81, 'SANJAYA PUTRA HARTONO ', '18.D1.0044', '68', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(82, 'LIEM, FANNY AGUSTINA ', '18.D1.0065', '69', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(83, 'PATRICIA PUTRI WAHYUNINGRUM ', '18.D1.0290', '70', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(84, 'MAHDALENA ENDY NATALIA ', '15.D1.0149', '71', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(85, 'CHRISTIAN DWIPUTRA HARTONO ', '15.D1.0195', '72', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(86, 'REBECA SINDY MAU ', '15.D1.0254', '73', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(87, 'EVERT VAN ROBERT SIGALINGGING ', '15.D1.0308', '74', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(88, 'GITA FITRI RAMADINI ', '15.D1.0312', '75', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(89, 'RICKY ARDIYANTO ', '16.D1.0116', '76', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(90, 'MUHAMMAD FADLI KENDYAKSA ', '16.D1.0144', '77', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(91, 'VINCENTIUS EDWIN KURNIA ADI ', '16.D1.0165', '78', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(92, 'LUKAS EVAN KRISTIAN ', '16.D1.0200', '79', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(93, 'CHARLES HENDRAWAN HOSEANTO ', '17.D1.0013', '80', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(94, 'ANDREAS DANANG ARYANTO ', '17.D1.0057', '81', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(95, 'ERIC ADISASMITA ', '17.D1.0065', '82', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(96, 'PIPIT ALFA ALVENDA ', '17.D1.0207', '83', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(97, 'OKTAVIA FITRIANI SINAGA ', '17.D1.0209', '84', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(98, 'OKTAVIANUS BERNARDUS OLA BAKIOR ', '19.D1.0176', '85', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(99, 'YOSUA TOMY KURNIAWAN ', '21.D1.0233', '86', 'Manajemen', 'Ekonomi dan Bisnis', '', '', ''),
(100, 'SHEILA NOVIEANIE LISTIJONO ', '17.G1.0018', '87', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(101, 'KEZIA CLARISSA NATALIA ', '17.G1.0108', '88', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(102, 'NIKO CAHYONO SLAMET MULJONO ', '17.G4.0001', '89', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(103, 'DEVINA GUNADI ', '17.G4.0004', '90', 'Akuntansi', 'Ekonomi dan Bisnis', '', 'AAAAAAAAA', 'NNNNNN'),
(104, 'ERIKA VELIN MUNDING WANGI ', '18.G1.0006', '91', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(105, 'RISCHA OKTAVIANE ANANDA ', '18.G1.0007', '92', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(106, 'MILKHA LEVI WUNGKANA ', '18.G1.0014', '93', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(107, 'HELEN DEBORA WIBOWO ', '18.G1.0020', '94', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(108, 'JESSLYN SURYA KRISHNAN ', '18.G1.0061', '95', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(109, 'DANI ELLA INYO ', '18.G1.0085', '96', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(110, 'GO, ANGELA NATALIA HARYANTO ', '18.G1.0109', '97', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(111, 'VICTOR ADRIAN PRAYOGO ', '18.G1.0114', '98', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(112, 'FELLICIA APRELE ', '18.G1.0115', '99', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(113, 'STEVANI ANJELICA ', '18.G1.0134', '100', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(114, 'PHOA, CINDIE PERMANA ', '18.G1.0137', '101', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(115, 'AURELIA TASYA VERDHIANTYA ', '18.G1.0173', '102', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(116, 'NATALIA TYAS ANDRIANI ', '19.G1.0167', '103', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(117, 'DJIE, EUNIKE MEILINDA WIJAYA ', '16.G2.0002', '104', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(118, 'NATANAEL STEVIE PRAMUDITA WIJANNA ', '15.G1.0146', '105', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(119, 'LOLITA GLADYS SISWO VALENDY ', '16.G1.0080', '106', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(120, 'A. RON JEVON ANGGORO PUTRA ', '16.G1.0146', '107', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(121, 'LEONARDUS DENDY HENDRA INDRAWAN ', '16.G1.0168', '108', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(122, 'JESSICA SHANIE ANGELINA ', '17.G1.0010', '109', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(123, 'NATHANIA BENITA ', '17.G1.0019', '110', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(124, 'JOHANES EMANUEL ALVANO HORSMAN ', '17.G1.0098', '111', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(125, 'KATHERINE STEFANNY YANTO ', '17.G1.0100', '112', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(126, 'THOMAS GUNAWAN ', '17.G1.0156', '113', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(127, 'DAVID CHRISTIAN ', '17.G1.0198', '114', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(128, 'DEVIANA DUMINGAN ', '18.G1.0050', '115', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(129, 'IRENE DEVINA AGNITA ', '18.G1.0053', '116', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(130, 'AGATA DEVINA VATRIOLIS PUSPASARI ', '18.G1.0076', '117', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(131, 'YOSIA BAGUS ARGAKUSUMA ', '18.G1.0087', '118', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(132, 'KARENHAPUK GRACIELLA ARIENTA ', '18.G1.0154', '119', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(133, 'GALUH HANIF PRADANA ', '19.G1.0169', '120', 'Akuntansi', 'Ekonomi dan Bisnis', '', '', ''),
(134, 'A. GRACIA ALFANI YUSTIANTI ', '17.H1.0018', '121', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(135, 'YOSUA FERDINNAND MASYURI ', '17.H1.0033', '122', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(136, 'RIVAN ADI NUGRAHA ', '17.H1.0044', '123', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(137, 'SONYA FRISKA HARYANTO ', '18.H1.0047', '124', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(138, 'VENANSIA VARIANTI PUTRI DAKHI ', '21.H1.0043', '125', 'Perpajakan', 'Ekonomi dan Bisnis', '', '', ''),
(139, 'JEINNE THERESIA LAURENT ', '19.E2.0005', '126', 'Magister Psikologi', 'Psikologi', '', '', ''),
(140, 'KOMANG VENI WIDIYANTI ', '21.E3.0066', '127', 'Magister Psikologi Profesi', 'Psikologi', '', '', ''),
(141, 'MONICA NOOR RISTININGTYAS ', '15.E1.0280', '128', 'Psikologi', 'Psikologi', '', '', ''),
(142, 'GRACIA SONDANG PERMATA SARI PUTRI ', '17.E1.0005', '129', 'Psikologi', 'Psikologi', '', '', ''),
(143, 'NATASYA ', '17.E1.0040', '130', 'Psikologi', 'Psikologi', '', '', ''),
(144, 'GLORIA PUSPITA ', '17.E1.0081', '131', 'Psikologi', 'Psikologi', '', '', ''),
(145, 'VEMMY SUSANTI ', '17.E1.0120', '132', 'Psikologi', 'Psikologi', '', '', ''),
(146, 'ZAMMA NABILA YUMNA ', '17.E1.0187', '133', 'Psikologi', 'Psikologi', '', '', ''),
(147, 'DEVINA CLARISSAPUTRI ', '18.E1.0282', '134', 'Psikologi', 'Psikologi', '', '', ''),
(148, 'BENEDICTUS VITO RAHADYAN NUGRAHA ', '15.E1.0024', '135', 'Psikologi', 'Psikologi', '', '', ''),
(149, 'IRFAN FATCHU ROCHMAN ', '15.E1.0114', '136', 'Psikologi', 'Psikologi', '', '', ''),
(150, 'SION EKAPUTRA KUSWANDI ', '15.E1.0248', '137', 'Psikologi', 'Psikologi', '', '', ''),
(151, 'WORO ARDININGSIH KRISMONO ', '16.E1.0025', '138', 'Psikologi', 'Psikologi', '', '', ''),
(152, 'DINI NURANI AYU NUGROHO ', '16.E1.0027', '139', 'Psikologi', 'Psikologi', '', '', ''),
(153, 'LIVIA VALERINA KURNIAWAN ', '16.E1.0029', '140', 'Psikologi', 'Psikologi', '', '', ''),
(154, 'ANDY KURNIAWAN ', '16.E1.0033', '141', 'Psikologi', 'Psikologi', '', '', ''),
(155, 'ODIFTA VARELLI ANINDIA HESKY RIZKYANA ', '16.E1.0178', '142', 'Psikologi', 'Psikologi', '', '', ''),
(156, 'RINDANG ISTIQOMAH ', '16.E1.0186', '143', 'Psikologi', 'Psikologi', '', '', ''),
(157, 'BENEDIKTUS BERLIAN BAYU MAHENDRO ', '16.E1.0243', '144', 'Psikologi', 'Psikologi', '', '', ''),
(158, 'ANGELIA KAESARWATI ', '17.E1.0013', '145', 'Psikologi', 'Psikologi', '', '', ''),
(159, 'YOHANES BAPTISTA CHRISTIAN ERY PRASETYA ', '17.E1.0020', '146', 'Psikologi', 'Psikologi', '', '', ''),
(160, 'RORA BEKTI AMALIA ', '17.E1.0073', '147', 'Psikologi', 'Psikologi', '', '', ''),
(161, 'DYAH AYU PUSPANINGTYAS ', '17.E1.0109', '148', 'Psikologi', 'Psikologi', '', '', ''),
(162, 'CORNELIA DIESA FLORISAVITA ', '17.E1.0158', '149', 'Psikologi', 'Psikologi', '', '', ''),
(163, 'SHERINE MIRANDA ', '17.E1.0171', '150', 'Psikologi', 'Psikologi', '', '', ''),
(164, 'DESTY OKTAVIANI ', '17.E1.0185', '151', 'Psikologi', 'Psikologi', '', '', ''),
(165, 'FILISTHEA BAYAN ROCAK PAIMAKNG ', '17.E1.0192', '152', 'Psikologi', 'Psikologi', '', '', ''),
(166, 'SALSA AULIA NAHRURIZA ', '17.E1.0215', '153', 'Psikologi', 'Psikologi', '', '', ''),
(167, 'DEVI ASTARIANA ', '17.E1.0222', '154', 'Psikologi', 'Psikologi', '', '', ''),
(168, 'GREGORIUS REZA TRISKA YULIANTO ', '17.E1.0231', '155', 'Psikologi', 'Psikologi', '', '', ''),
(169, 'LAVYTA RISMA ', '17.E1.0238', '156', 'Psikologi', 'Psikologi', '', '', ''),
(170, 'ENGELBERTUS KEGIYE ', '19.E1.0251', '157', 'Psikologi', 'Psikologi', '', '', ''),
(171, 'FELICIA ', '20.I3.0005', '158', 'Magister Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(172, 'CARISSA NATHANIA SURYA ', '18.I3.0007', '159', 'Magister Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(173, 'ELIZABETH YOLANDA SUTANTO ', '17.I2.0013', '160', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(174, 'FREDERICA ANGGITA MEGA TANIA ', '17.I2.0015', '161', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(175, 'SIVA STEPHANIE SOEJATNO ', '18.I1.0018', '162', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(176, 'ANGELICA TASHA SATIOGROHO ', '18.I1.0025', '163', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(177, 'IRMADELLA RANA NATHANIA ', '18.I1.0034', '164', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(178, 'GRACIELA MARCELLINA SHIANITA SUPRAPTO ', '18.I1.0066', '165', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(179, 'PAULUS ADVENT SATYA NUGRAHA ', '18.I1.0080', '166', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(180, 'WYNETTA MILEINA JATMIKO ', '18.I1.0099', '167', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(181, 'ANCILLA MAYWANDIRA ', '18.I1.0143', '168', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(182, 'TOBIAS ADRIEL YAPHET ', '18.I1.0155', '169', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(183, 'VANIA JESSICA ', '18.I1.0163', '170', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(184, 'MARIA JOVELA GUNAWAN ', '18.I2.0012', '171', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(185, 'AURIN WALUYO ', '18.I2.0020', '172', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(186, 'AGRIPPINA PERMATA BENITA ', '18.I2.0021', '173', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(187, 'FRANSISKA GEMA MUTIARA PRIMA ', '17.I1.0089', '174', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(188, 'TASYA AMADEA CHRISTABELLE ', '17.I1.0096', '175', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(189, 'GLORY LEADERA SARWONO ', '17.I1.0150', '176', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(190, 'JOEL ARSEN ADIKARJA JAHJA ', '18.I1.0052', '177', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(191, 'KATHRINE PRISCILLA NUGROHO ', '21.I1.0129', '178', 'Teknologi Pangan', 'Teknologi Pertanian', '', '', ''),
(192, 'NOVAZA ANUGRAH ', '17.J2.0025', '179', 'Sastra Inggris', 'Bahasa dan Seni', '', '', ''),
(193, 'DAVID AJI SANTOSA ', '18.N1.0006', '182', 'Sistem Informasi', 'Ilmu Komputer', '', '', ''),
(194, 'ADRIEL FELIX CHRISTIAWAN ', '17.N1.0008', '183', 'Sistem Informasi', 'Ilmu Komputer', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_makan`
--
ALTER TABLE `t_makan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_presensi`
--
ALTER TABLE `t_presensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `t_wisudawan`
--
ALTER TABLE `t_wisudawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_makan`
--
ALTER TABLE `t_makan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_presensi`
--
ALTER TABLE `t_presensi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_wisudawan`
--
ALTER TABLE `t_wisudawan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
