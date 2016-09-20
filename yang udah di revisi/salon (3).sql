-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mei 2015 pada 08.28
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `level`) VALUES
('admin', 'admin', 1),
('akim', 'kimpoi', 0),
('fariz', 'maikel', 0),
('ihsan', 'dwirani', 1),
('maikel', 'fariz', 1),
('rizki_12', 'rizki', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`idBarang` int(11) NOT NULL,
  `namaBarang` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `jumlahBarang` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `suplier` varchar(45) DEFAULT NULL,
  `Pengeluaran_tglPengeluaran` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `harga`, `jumlahBarang`, `total`, `suplier`, `Pengeluaran_tglPengeluaran`) VALUES
(1, 'Bedak', '200000', '300000', '', 'Ihsan FARIS', '2015-05-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idPelanggan` varchar(16) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `golUsia` varchar(5) DEFAULT NULL,
  `alamat` text,
  `kota` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `hp1` varchar(14) DEFAULT NULL,
  `hp2` varchar(14) DEFAULT NULL,
  `telpon` varchar(14) DEFAULT NULL,
  `pinBB` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `fb` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `nama`, `golUsia`, `alamat`, `kota`, `provinsi`, `hp1`, `hp2`, `telpon`, `pinBB`, `email`, `fb`) VALUES
('', 'FEBRI', '31-40', 'Bengkulu', 'Bogor', 'Jawa Barat', '08992941208', '089978654', '0219890989', 'e45445', 'rizkiadiutomo@yahoo.co.id', 'febri ganteng'),
('32332323', 'Masukeramas', '21-30', 'Bogor', 'Cibinong', 'Jawa Barat', '90990', '2434234234', '08992941208', '23123123', 'rizkiadiutomo@yahoo.co.id', 'ADADASD'),
('9898089', 'Rizki', '41-50', 'StASIUN Bojong Gede Belok Dikit', 'Jawa Barat', 'Kota', '90990', '768686', '08992941208', '7687', 'letmer_zzz@yahoo.co.id', 'Rizki Facebook');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `tglPengeluaran` date NOT NULL,
  `totalPengeluaran` int(11) DEFAULT NULL,
  `ketLain` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`tglPengeluaran`, `totalPengeluaran`, `ketLain`) VALUES
('2015-05-13', 300000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`idProduk` int(11) NOT NULL,
  `namaProduk` varchar(45) NOT NULL,
  `hargaProduk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `hargaProduk`) VALUES
(10, 'DVD Salon Treatments', 150000),
(11, 'DVD MakeUp Sendiri', 200000),
(12, 'DVD MakeUp Klien', 200000),
(13, 'DVD Sanggul Modern', 125000),
(14, 'DVD Sanggul Sasakan', 150000),
(15, 'DVD Salon Service', 150000),
(16, 'CD HypnoStylist', 75000),
(17, 'CD HypnoBeauty', 75000),
(18, 'CD HypnoSlimming', 100000),
(19, 'Bulu Mata Pengantin/Wisuda/Harian', 15000),
(20, 'Bulu Mata Big Eyes', 30000),
(21, 'Sunggar', 37000),
(23, 'Minyak Sawit', 2000),
(25, 'DVD Treatment Anak', 20000),
(26, 'DVD Marketing', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id_time` int(4) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `time`
--

INSERT INTO `time` (`id_time`, `ts`) VALUES
(1, '2015-05-17 05:53:12'),
(2, '2015-05-17 05:53:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipetraining`
--

CREATE TABLE IF NOT EXISTS `tipetraining` (
  `tipe` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL,
  `Training_idTraining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipetraining`
--

INSERT INTO `tipetraining` (`tipe`, `harga`, `Training_idTraining`) VALUES
('Kelas', 3300000, 2),
('Private', 3500000, 1),
('Private', 3500000, 2),
('Private', 3500000, 3),
('Private', 1500000, 4),
('Private', 1500000, 5),
('Private', 1500000, 6),
('Private', 30000, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE IF NOT EXISTS `training` (
`idTraining` int(11) NOT NULL,
  `namaTraining` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`idTraining`, `namaTraining`) VALUES
(1, 'Hairstylist'),
(2, 'MakeUp Rias Pengantin'),
(3, 'Wanita Mandiri'),
(4, 'Salon Treatments'),
(5, 'Hair Do'),
(6, 'MakeUp is Magic'),
(7, 'Make Up Wardah'),
(8, 'Sepak Bola'),
(9, 'Baju jaket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`idTransaksi` int(11) NOT NULL,
  `Pelanggan_idPelanggan` varchar(16) NOT NULL,
  `pengiriman` varchar(45) DEFAULT NULL,
  `datestamp` date DEFAULT NULL,
  `timestamp` time DEFAULT NULL,
  `diskonTotal` int(11) DEFAULT NULL,
  `biayaTotal` int(11) DEFAULT NULL,
  `ketLain` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `Pelanggan_idPelanggan`, `pengiriman`, `datestamp`, `timestamp`, `diskonTotal`, `biayaTotal`, `ketLain`) VALUES
(1, '32332323', NULL, '2015-05-13', '16:05:38', 0, 0, NULL),
(2, '9898089', '', '2015-05-13', '14:05:38', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksiproduk`
--

CREATE TABLE IF NOT EXISTS `transaksiproduk` (
  `Produk_idProduk` int(11) NOT NULL,
  `Transaksi_idTransaksi` int(11) NOT NULL,
  `jumlahProduk` int(11) DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksiproduk`
--

INSERT INTO `transaksiproduk` (`Produk_idProduk`, `Transaksi_idTransaksi`, `jumlahProduk`, `diskon`, `biaya`) VALUES
(16, 2, 3, 0, 225000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksitraining`
--

CREATE TABLE IF NOT EXISTS `transaksitraining` (
  `Training_idTraining` int(11) NOT NULL,
  `Transaksi_idTransaksi` int(11) NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `tglMulai` date DEFAULT NULL,
  `tglSelesai` date DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `lokasi` text NOT NULL,
  `sertifikat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksitraining`
--

INSERT INTO `transaksitraining` (`Training_idTraining`, `Transaksi_idTransaksi`, `tipe`, `tglMulai`, `tglSelesai`, `diskon`, `biaya`, `lokasi`, `sertifikat`) VALUES
(1, 1, 'Private', '2015-05-12', '2015-05-15', 0, 3500000, '', 'jadhj33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`idBarang`,`Pengeluaran_tglPengeluaran`), ADD KEY `fk_Barang_Pengeluaran1_idx` (`Pengeluaran_tglPengeluaran`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
 ADD PRIMARY KEY (`tglPengeluaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
 ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `tipetraining`
--
ALTER TABLE `tipetraining`
 ADD PRIMARY KEY (`tipe`,`Training_idTraining`), ADD KEY `fk_TipeTraining_Training1_idx` (`Training_idTraining`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
 ADD PRIMARY KEY (`idTraining`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`idTransaksi`,`Pelanggan_idPelanggan`), ADD KEY `fk_Transaksi_Pelanggan1_idx` (`Pelanggan_idPelanggan`);

--
-- Indexes for table `transaksiproduk`
--
ALTER TABLE `transaksiproduk`
 ADD PRIMARY KEY (`Produk_idProduk`,`Transaksi_idTransaksi`), ADD KEY `fk_Pemesanan_has_Produk_Produk1_idx` (`Produk_idProduk`), ADD KEY `fk_Pemesanan_has_Produk_Transaksi1_idx` (`Transaksi_idTransaksi`);

--
-- Indexes for table `transaksitraining`
--
ALTER TABLE `transaksitraining`
 ADD PRIMARY KEY (`Training_idTraining`,`Transaksi_idTransaksi`), ADD KEY `fk_Pelatihan_has_Training_Training1_idx` (`Training_idTraining`), ADD KEY `fk_Pelatihan_has_Training_Transaksi1_idx` (`Transaksi_idTransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
MODIFY `idTraining` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `fk_Barang_Pengeluaran1` FOREIGN KEY (`Pengeluaran_tglPengeluaran`) REFERENCES `pengeluaran` (`tglPengeluaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tipetraining`
--
ALTER TABLE `tipetraining`
ADD CONSTRAINT `fk_TipeTraining_Training1` FOREIGN KEY (`Training_idTraining`) REFERENCES `training` (`idTraining`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Pelanggan_idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`);

--
-- Ketidakleluasaan untuk tabel `transaksiproduk`
--
ALTER TABLE `transaksiproduk`
ADD CONSTRAINT `fk_Pemesanan_has_Produk_Produk1` FOREIGN KEY (`Produk_idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Pemesanan_has_Produk_Transaksi1` FOREIGN KEY (`Transaksi_idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksitraining`
--
ALTER TABLE `transaksitraining`
ADD CONSTRAINT `fk_Pelatihan_has_Training_Training1` FOREIGN KEY (`Training_idTraining`) REFERENCES `training` (`idTraining`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Pelatihan_has_Training_Transaksi1` FOREIGN KEY (`Transaksi_idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
