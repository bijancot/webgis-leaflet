-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 08.41
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertiku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_tabel`
--

CREATE TABLE `foto_tabel` (
  `FotoID` varchar(50) NOT NULL,
  `TipeID` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_tabel`
--

INSERT INTO `foto_tabel` (`FotoID`, `TipeID`, `Foto`) VALUES
('F001', 'T001', '/images/T001A.jpg'),
('F002', 'T001', '/images/T001B.jpg'),
('F003', 'T001', '/images/T001C.jpg'),
('F004', 'T002', '/images/T002A.jpg'),
('F005', 'T002', '/images/T002B.jpg'),
('F006', 'T002', '/images/T002C.jpg'),
('F007', 'T003', '/images/T003A.jpg'),
('F008', 'T003', '/images/T003B.jpg'),
('F009', 'T003', '/images/T003C.jpg'),
('F010', 'T004', '/images/T004A.jpg'),
('F011', 'T004', '/images/T004B.jpg'),
('F012', 'T004', '/images/T004C.jpg'),
('F013', 'T005', '/images/T005A.jpg'),
('F014', 'T005', '/images/T005B.jpg'),
('F015', 'T005', '/images/T005C.jpg'),
('F016', 'T006', '/images/T006A.jpg'),
('F017', 'T006', '/images/T006B.jpg'),
('F018', 'T006', '/images/T006C.jpg'),
('F019', 'T007', '/images/T007A.jpg'),
('F020', 'T007', '/images/T007B.jpg'),
('F021', 'T007', '/images/T007C.jpg'),
('F022', 'T008', '/images/T008A.jpg'),
('F023', 'T008', '/images/T008B.jpg'),
('F024', 'T008', '/images/T008C.jpg'),
('F025', 'T009', '/images/T009A.jpg'),
('F026', 'T009', '/images/T009B.jpg'),
('F027', 'T009', '/images/T009C.jpg'),
('F028', 'T010', '/images/T010A.jpg'),
('F029', 'T010', '/images/T010B.jpg'),
('F030', 'T010', '/images/T010C.jpg'),
('F031', 'T011', '/images/T011A.jpg'),
('F032', 'T011', '/images/T011B.jpg'),
('F033', 'T011', '/images/T011C.jpg'),
('F034', 'T012', '/images/T012A.jpg'),
('F035', 'T012', '/images/T012B.jpg'),
('F036', 'T012', '/images/T012C.jpg'),
('F037', 'T013', '/images/T013A.jpg'),
('F038', 'T013', '/images/T013B.jpg'),
('F039', 'T013', '/images/T013C.jpg'),
('F040', 'T014', '/images/T014A.jpg'),
('F041', 'T014', '/images/T014B.jpg'),
('F042', 'T014', '/images/T014C.jpg'),
('F043', 'T015', '/images/T015A.jpg'),
('F044', 'T015', '/images/T015B.jpg'),
('F045', 'T015', '/images/T015C.jpg'),
('F046', 'T016', '/images/T016A.jpg'),
('F047', 'T016', '/images/T016B.jpg'),
('F048', 'T016', '/images/T016C.jpg'),
('F049', 'T017', '/images/T017A.jpg'),
('F050', 'T017', '/images/T017B.jpg'),
('F051', 'T017', '/images/T017C.jpg'),
('F052', 'T018', '/images/T018A.jpg'),
('F053', 'T018', '/images/T018B.jpg'),
('F054', 'T018', '/images/T018C.jpg'),
('F055', 'T019', '/images/T019A.jpg'),
('F056', 'T019', '/images/T019B.jpg'),
('F057', 'T019', '/images/T019C.jpg'),
('F058', 'T020', '/images/T020A.jpg'),
('F059', 'T020', '/images/T020B.jpg'),
('F060', 'T020', '/images/T020C.jpg'),
('F061', 'T021', '/images/T021A.jpg'),
('F062', 'T021', '/images/T021B.jpg'),
('F063', 'T021', '/images/T021C.jpg'),
('F064', 'T022', '/images/T022A.jpg'),
('F065', 'T022', '/images/T022B.jpg'),
('F066', 'T022', '/images/T022C.jpg'),
('F067', 'T023', '/images/T023A.jpg'),
('F068', 'T023', '/images/T023B.jpg'),
('F069', 'T023', '/images/T023C.jpg'),
('F070', 'T024', '/images/T024A.jpg'),
('F071', 'T024', '/images/T024B.jpg'),
('F072', 'T024', '/images/T024C.jpg'),
('F073', 'T025', '/images/T025A.jpg'),
('F074', 'T025', '/images/T025B.jpg'),
('F075', 'T025', '/images/T025C.jpg'),
('F076', 'T026', '/images/T026A.jpg'),
('F077', 'T026', '/images/T026B.jpg'),
('F078', 'T026', '/images/T026C.jpg'),
('F079', 'T027', '/images/T027A.jpg'),
('F080', 'T027', '/images/T027B.jpg'),
('F081', 'T027', '/images/T027C.jpg'),
('F082', 'T028', '/images/T028A.jpg'),
('F083', 'T028', '/images/T028B.jpg'),
('F084', 'T028', '/images/T028C.jpg'),
('F085', 'T029', '/images/T029A.jpg'),
('F086', 'T029', '/images/T029B.jpg'),
('F087', 'T029', '/images/T029C.jpg'),
('F088', 'T030', '/images/T030A.jpg'),
('F089', 'T030', '/images/T030B.jpg'),
('F090', 'T030', '/images/T030C.jpg'),
('F091', 'T031', '/images/T031A.jpg'),
('F092', 'T031', '/images/T031B.jpg'),
('F093', 'T031', '/images/T031C.jpg'),
('F094', 'T032', '/images/T032A.jpg'),
('F095', 'T032', '/images/T032B.jpg'),
('F096', 'T032', '/images/T032C.jpg'),
('F097', 'T033', '/images/T033A.jpg'),
('F098', 'T033', '/images/T033B.jpg'),
('F099', 'T033', '/images/T033C.jpg'),
('F100', 'T034', '/images/T034A.jpg'),
('F101', 'T034', '/images/T034B.jpg'),
('F102', 'T034', '/images/T034C.jpg'),
('F103', 'T035', '/images/T034A.jpg'),
('F104', 'T035', '/images/T035B.jpg'),
('F105', 'T035', '/images/T035C.jpg'),
('F106', 'T036', '/images/T036A.jpg'),
('F107', 'T036', '/images/T036B.jpg'),
('F108', 'T036', '/images/T036C.jpg'),
('F109', 'T037', '/images/T037A.jpg'),
('F110', 'T037', '/images/T037B.jpg'),
('F111', 'T037', '/images/T037C.jpg'),
('F112', 'T038', '/images/T038A.jpg'),
('F113', 'T038', '/images/T038B.jpg'),
('F114', 'T038', '/images/T038C.jpg'),
('F115', 'T039', '/images/T039A.jpg'),
('F116', 'T039', '/images/T039B.jpg'),
('F117', 'T039', '/images/T039C.jpg'),
('F118', 'T040', '/images/T040A.jpg'),
('F119', 'T040', '/images/T040B.jpg'),
('F120', 'T040', '/images/T040C.jpg'),
('F121', 'T041', '/images/T041A.jpg'),
('F122', 'T041', '/images/T041B.jpg'),
('F123', 'T041', '/images/T041C.jpg'),
('F124', 'T042', '/images/T042A.jpg'),
('F125', 'T042', '/images/T042B.jpg'),
('F126', 'T042', '/images/T042C.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_properti`
--

CREATE TABLE `jenis_properti` (
  `TipeID` varchar(50) NOT NULL,
  `PropertiID` varchar(50) NOT NULL,
  `NamaProperti` varchar(50) NOT NULL,
  `Alamat_properti` varchar(200) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Harga` bigint(20) NOT NULL,
  `Luas` double DEFAULT NULL,
  `Jarak` double NOT NULL,
  `Jumlah_cicil` int(11) NOT NULL,
  `Tahun_bangun` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_properti`
--

INSERT INTO `jenis_properti` (`TipeID`, `PropertiID`, `NamaProperti`, `Alamat_properti`, `Longitude`, `Latitude`, `Harga`, `Luas`, `Jarak`, `Jumlah_cicil`, `Tahun_bangun`) VALUES
('T001', 'P001', 'Graha Kencana', 'Jl. Raya Karanglo No.31, Balearjosari, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '112.6518906', '-7.9224518', 3800000000, 281, 12.4, 24, '2019-04-15'),
('T002', 'P001', 'Ijen Nirwana Residence', 'Perum Ijen Nirwana, Jl. Seruni No.D3-17, Bareng, Kec. Klojen, Kota Malang, Jawa Timur 61418', '112.6156793', '-7.981081', 6000000000, 200, 1.8, 28, '2019-08-15'),
('T003', 'P001', 'Perumahan Permata Jingga West Area', 'west area, Jl. Raya Permata Jingga, Tunggulwulung, Lowokwaru, Malang City, East Java 65143', '112.6153895', '-7.9325483', 2900000000, 126, 7.7, 24, '2019-03-25'),
('T004', 'P001', 'Istana Dieng', 'Jalan Bukit Dieng Raya 3, Pisang Candi, Kec. Sukun, Kota Malang, Jawa Timur 65146', '112.5983298', '-7.9754872', 8500000000, 467, 2, 48, '2018-10-18'),
('T005', 'P001', 'Tirtasani Royal Resort', 'Jl. Raya Karanglo, Karangploso Wetan, Kepuharjo, Kec. Karang Ploso, Malang, Jawa Timur 65153', '112.625455', '-7.9107464', 5750000000, 643, 10.8, 65, '2018-12-18'),
('T006', 'P001', 'Perumahan Araya Malang', 'Jl. Blimbing Indah Megah No.1, Polowijen, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '112.6495151', '-7.9362008', 9700000000, 540, 9.5, 60, '2018-01-26'),
('T007', 'P002', 'GREEN PARK WONOKOYO', 'Wonokoyo, Kec. Kedungkandang, Kota Malang, Jawa Timur 65135', '112.65513', '-8.029865', 159500000, 60, 11.7, 60, '2019-07-09'),
('T008', 'P002', 'Perumahan D\'Gio Land Tlogowaru', 'Jl. Citra Garden City Boulevard, Buring, Kec. Kedungkandang, Kota Malang, Jawa Timur 65136', '112.65564', '-8.01086', 149000000, 60, 12.1, 60, '2020-02-03'),
('T009', 'P002', 'Indirisma Regency 2', 'Jl. Jaten, Jaten, Jedong, Kec. Wagir, Malang, Jawa Timur 65158', '112.5738283', '-7.988849', 161000000, 60, 6.6, 72, '2020-01-22'),
('T010', 'P002', 'Green Karangduren Residence', 'Gg. 10 No.53, Karangduren, Kec. Pakisaji, Malang, Jawa Timur 65162', '112.6234784', '-8.0697605', 177000000, 60, 12.2, 18, '2019-04-26'),
('T011', 'P002', 'Green View Babakan', 'Desa, Kubung, Ngenep, Kec. Karangplpso, Malang, Jawa Timur 65142', '112.6143925', '-7.8930058', 133000000, 50, 12.9, 60, '2019-01-30'),
('T012', 'P002', 'Perumahan blue view gondowangi', 'JL.Kencana, Poh Bener, Gondowangi, Kec. Wagir, Malang, Jawa Timur 65158', '112.5693924', '-8.017114', 140000000, 60, 12.1, 60, '2019-03-06'),
('T013', 'P002', 'Perumahan de green krebet', 'Krebet, Kec. Bululawang, Malang, Jawa Timur 65171', '112.6466813', '-8.0351896', 144000000, 60, 17, 120, '2020-01-12'),
('T014', 'P002', 'Griya Tama Pakis Malang', 'Unnamed Road, Area Persawahan, Pakisjajar, Kec. Pakis, Malang, Jawa Timur 65154', '112.7214425', '-7.9450765', 140000000, 60, 16.5, 240, '2020-02-28'),
('T015', 'P003', 'Tanah Kavling Lesanpuro', 'Jl. Lesanpuro Gg. 12', '112.661873', '-7.985286', 55000000, 60, 7.4, 12, NULL),
('T016', 'P003', 'Tanah Kavling Mboto - Banjarsari', 'Banjarsari, Kec. Ngajum, Malang, Jawa Timur ', '112.568977', '-8.090568', 45000000, 60, 18.6, 20, NULL),
('T017', 'P003', 'Tanah Kavling Sutojayan - Pakisaji', 'Jl. Raya Karangduren Permai, Sumberarjo, Sutojayan, Kec. Pakisaji, Malang, Jawa Timur 65162', '112.6119862', '-8.0721691', 70000000, 84, 13.4, 36, NULL),
('T018', 'P003', 'Tanah Kavling Bululawang', 'Dusun Sukorejo, Kasembon, Kec. Bululawang, Malang, Jawa Timur 65171', '112.660816', '-8.084259', 36000000, 65, 16.1, 24, NULL),
('T019', 'P003', 'Tanah Kavling Bandara', 'Jl. Komodor Udara Abdul Rahman Saleh Krajan, Bunut Wetan, Kec. Pakis, Malang, Jawa Timur ', '112.701948', '-7.936260', 125000000, 72, 15.1, 48, NULL),
('T020', 'P003', 'Tanah Kavling Bumi Mulya', 'Sukodadi Kec. Wagir, Malang, Jawa Timur ', '112.555664', '-7.991517', 63000000, 80, 11.6, 6, NULL),
('T021', 'P003', 'Tanah Kavling Suko Land Tumpang', 'Malangsuko, Kec. Tumpang, Malang, Jawa Timur 65156', '112.776811', '-7.999980', 35000000, 50, 23, 12, NULL),
('T022', 'P003', 'Tanah Kavling Pakem Wajak', 'Jl. Ahmad Rozy, Wajak, Malang, Jawa Timur 65173', '112.746872', '-8.103801', 1000000000, 6.724, 26.1, 72, NULL),
('T023', 'P004', 'Rusunawa Buring Kota Malang', 'Jl. Mayjen Sungkono, Buring, Kec. Kedungkandang, Kota Malang, Jawa Timur 65136', '112.6320511', '-7.9909108', 175000, 24, 11.9, 0, '2012-03-20'),
('T024', 'P004', 'RUSUNAWA BURING II', 'Jl. Simpang Gading, Buring, Kec. Kedungkandang, Kota Malang, Jawa Timur 65135', '112.6426943', '-8.0107632', 150000, 24, 10.5, 0, '2014-11-14'),
('T025', 'P004', 'Rusunawa UB', 'Jl. Mayjend Panjaitan No.249, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', '112.6136552', '-7.9740206', 1065000, 41, 4.4, 0, '2017-06-02'),
('T026', 'P004', 'Rusunawa Universitas Islam Malang', 'Jl. Tata Surya No.3 E, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '112.6067397', '-7.9358863', 100000, 24, 5.6, 0, '2014-03-04'),
('T027', 'P005', 'Huis Van Gustafine Villa', 'Jl. Hasanudin No.Dalam, Samaan, Kec. Klojen, Kota Malang, Jawa Timur 65112', '112.6290659', '-7.9691387', 2000000, NULL, 4.9, 0, NULL),
('T028', 'P005', 'Villa 007', 'Jl. Jambu Jl. Raya Semanding No.7, Sumbersekar, Kec. Dau, Kota Malang, Jawa Timur 65151', '112.6132196', '-7.9765705', 332540, NULL, 0.9, 0, NULL),
('T029', 'P005', 'Villa Songgoriti', 'Jl. Arumdalu, Songgokerto, Kec. Batu, Malang, Jawa Timur 65312', '112.5043224', '-7.8642055', 151000, NULL, 21.8, 0, NULL),
('T030', 'P005', 'Azy Villa Malang', 'Perumahan Riverside F6 No.3 Jl. Jend. Ahmad Yani Utara, Balearjosari, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '112.6415933', '-7.922105', 800000, NULL, 10.7, 0, NULL),
('T031', 'P005', 'VILLA NOVA SONGGORITI', 'Jl. Raya Songgoriti No.34, RT.2/RW.2, Songgokerto, Kec. Batu, Kota Batu, Jawa Timur 65312', '112.498221', '-7.8633622', 2500000, NULL, 22.6, 0, NULL),
('T032', 'P005', 'Villa Griya Samara & Kolam Renang Pribadi', 'Perum Tirtasani Estate, Jl. Raya Gembrung No.1, Perum Tittasani, Ngenep, Kec. Singosari, Malang, Jawa Timur 65153', '112.6309167', '-7.9074845', 1077857, NULL, 11.4, 0, NULL),
('T033', 'P005', 'Villa Malang Batu Green Hills Residence', 'Jl. Raya Bukit Kamboja, Perun Gpa, Ngijo, Kec. Karang Ploso, Malang, Jawa Timur 65152', '112.6030102', '-7.8990959', 1616767, NULL, 12.6, 0, NULL),
('T034', 'P005', 'Villa Nirwana Songgoriti', 'kali tengah Jl. Arumdalu No.3, Songgokerto, Kec. Batu, Kota Batu, Jawa Timur 65312', '112.4938939', '-7.8647191', 300000, NULL, 23.1, 0, NULL),
('T035', 'P005', 'NK Villa', 'Jl. Raya Kasin, Telasih, Kepuharjo, Kec. Karang Ploso, Malang, Jawa Timur 65152', '112.6077444', '-7.9169232', 499000, NULL, 9.5, 0, NULL),
('T036', 'P006', 'Begawan Apartment', 'Jl. Tlogomas No.1, Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '112.6002665', '-7.9267861', 6250000, 22, 7.7, 0, NULL),
('T037', 'P006', 'Appartemen Soekarno Hatta Malang', 'Jl. Soekarno Hatta No.2, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '112.6145628', '-7.949405', 3800000, 21, 4.8, 0, NULL),
('T038', 'P006', 'Apartemen Dhika Universe Malang', 'Jl. Simpang Jl. Tlogomas No.1, Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '112.6008931', '-7.9293055', 6625000, 35, 7.4, 0, NULL),
('T039', 'P006', 'Inez Apartement', 'Jl. Mayjend Panjaitan No.68, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', '112.6196443', '-7.955774', 9960000, 50, 3.7, 0, NULL),
('T040', 'P006', 'Apartemen Samaview', 'Jl. Wonokoyo No.45-47, Leban, Tawangargo, Kec. Karang Ploso, Malang, Jawa Timur 65152', '112.5746449', '-7.8688955', 3150000, 31, 17, 0, NULL),
('T041', 'P006', 'The KALINDRA APARTMENT', 'Balearjosari, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '112.6492039', '-7.9251728', 7900000, 24.75, 8.9, 0, NULL),
('T042', 'P006', 'APARTEMENT NAYUMI SAM TOWER', 'Jl. Soekarno Hatta No.18, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '112.6162596', '-7.9461407', 6000000, 24, 5.2, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `properti`
--

CREATE TABLE `properti` (
  `PropertiID` varchar(50) NOT NULL,
  `PropertiName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `properti`
--

INSERT INTO `properti` (`PropertiID`, `PropertiName`) VALUES
('P001', 'Perumahan cluster Menengah keatas(Ellite)'),
('P002', 'Perumahan Bersubsidi'),
('P003', 'Tanah Kavling'),
('P004', 'Rumah Susun'),
('P005', 'Villa / Condominium'),
('P006', 'Apartement');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_tabel`
--
ALTER TABLE `foto_tabel`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `fk_foto` (`TipeID`);

--
-- Indeks untuk tabel `jenis_properti`
--
ALTER TABLE `jenis_properti`
  ADD PRIMARY KEY (`TipeID`),
  ADD KEY `PropertiID` (`PropertiID`);

--
-- Indeks untuk tabel `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`PropertiID`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto_tabel`
--
ALTER TABLE `foto_tabel`
  ADD CONSTRAINT `fk_foto` FOREIGN KEY (`TipeID`) REFERENCES `jenis_properti` (`TipeID`);

--
-- Ketidakleluasaan untuk tabel `jenis_properti`
--
ALTER TABLE `jenis_properti`
  ADD CONSTRAINT `fk_properti` FOREIGN KEY (`PropertiID`) REFERENCES `properti` (`PropertiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
