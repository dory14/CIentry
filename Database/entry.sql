-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mar 2018 pada 07.52
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata`
--

CREATE TABLE `masterdata` (
  `kd_rek` varchar(11) NOT NULL,
  `nm_rek` varchar(100) NOT NULL,
  `target` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masterdata`
--

INSERT INTO `masterdata` (`kd_rek`, `nm_rek`, `target`) VALUES
('41101.01', 'Pajak Hotel Bintang 1', 60500000),
('41101.02', 'Pajak Hotel Bintang 2', 50750000),
('41101.03', 'Pajak Hotel Bintang 3', 50500000),
('41101.04', 'Pajak Hotel Bintang 4', 50250000),
('41101.05', 'Pajak Hotel Bintang 5', 50000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kd_rek` varchar(11) NOT NULL,
  `tgl_stor` date NOT NULL,
  `jml_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kd_rek`, `tgl_stor`, `jml_bayar`) VALUES
(11, '41101.01', '2016-10-02', 2000000),
(12, '41101.03', '2016-10-02', 1500000),
(13, '41101.02', '2016-10-09', 1750000),
(14, '41101.01', '2016-10-11', 2000000),
(15, '41101.05', '2016-10-12', 1000000),
(16, '41101.02', '2016-10-15', 1750000),
(17, '41101.04', '2016-10-15', 1250000),
(18, '41101.01', '2016-01-02', 750000),
(19, '41101.03', '2016-11-03', 1500000),
(20, '41101.03', '2016-11-03', 1500000),
(21, '41101.01', '2016-11-05', 2000000),
(22, '41101.02', '2016-11-06', 1750000),
(23, '41101.04', '2016-11-10', 1250000),
(24, '41101.05', '2016-11-12', 1000000),
(25, '41101.01', '2016-11-12', 2000000),
(26, '41101.01', '0000-00-00', 2222),
(28, '41101.01', '2016-01-02', 1750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`, `akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2),
(2, 'dori achmad', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', 1),
(3, 'dika', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masterdata`
--
ALTER TABLE `masterdata`
  ADD PRIMARY KEY (`kd_rek`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
