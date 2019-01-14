-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jan 2019 pada 03.18
-- Versi server: 10.3.10-MariaDB-log
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mima2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id_bahan` int(5) NOT NULL,
  `nama_bahan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `idBarang` int(50) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`idBarang`, `id_kategori`, `nama`, `harga`, `stok`, `warna`, `gambar`) VALUES
(50, 5, 'Caera Blouse', 115000, 35, 'Biru', 0x70726f647563742d436165726120426c6f75736520312e6a706567),
(51, 6, 'Celana Bagus', 1200000, 30, 'Hitam', 0x70726f647563742d5374726967687420537472657463682044656e696d2050616e74732e504e47),
(52, 7, 'Belle Scarft', 56000, 50, 'Merah', 0x70726f647563742d48756d6d696e676269726420456d62656c6c6973686d656e7420536361726620322e504e47),
(53, 8, 'Alisha', 167000, 45, 'Hitam', 0x70726f647563742d4a65736c796e20312e6a706567),
(54, 5, 'Sky', 145000, 30, 'Biru', 0x70726f647563742d5a616c6961204b656d656a6120312e504e47),
(55, 6, 'Earth', 176000, 20, 'Coklat', 0x70726f647563742d41204c696e65204d61786920536b6972742e504e47),
(56, 7, 'Thalita', 79000, 30, 'Hitam', 0x70726f647563742d48756d6d696e676269726420456d62656c6c6973686d656e742053636172662e504e47),
(57, 8, 'Kanima', 230000, 25, 'Biru', 0x70726f647563742d4964656c696e61204b616674616e20322e6a706567);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_custom` int(5) NOT NULL,
  `nama_custom` varchar(30) NOT NULL,
  `telp_custom` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username_c` int(20) NOT NULL,
  `password_c` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_custom`, `nama_custom`, `telp_custom`, `email`, `username_c`, `password_c`) VALUES
(1, 'Sandra Septiana', '09754578996', 'sandra@gmail.com', 12345, 12345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailmix_match`
--

CREATE TABLE `tbl_detailmix_match` (
  `id_detail_mix_match` int(50) NOT NULL,
  `id_mix_match` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailmix_match`
--

INSERT INTO `tbl_detailmix_match` (`id_detail_mix_match`, `id_mix_match`, `idBarang`) VALUES
(98, 90, 50),
(99, 90, 51),
(100, 90, 52),
(125, 94, 50),
(126, 94, 51),
(127, 94, 52),
(131, 93, 54),
(132, 93, 55),
(133, 93, 56),
(134, 92, 50),
(135, 92, 55),
(136, 92, 52),
(137, 91, 54),
(138, 91, 51),
(139, 91, 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailmm`
--

CREATE TABLE `tbl_detailmm` (
  `kd_mm` int(5) NOT NULL,
  `kd_barang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailtsjual`
--

CREATE TABLE `tbl_detailtsjual` (
  `id_tsJual` int(5) NOT NULL,
  `id_mix_match` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `tgl_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailtspreorder`
--

CREATE TABLE `tbl_detailtspreorder` (
  `id_tsPreorder` int(5) NOT NULL,
  `id_mix_match` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(5, 'Atasan'),
(6, 'Bawahan'),
(7, 'Kerudung'),
(8, 'Gamis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mix_match`
--

CREATE TABLE `tbl_mix_match` (
  `id_mix_match` int(5) NOT NULL,
  `nama_mm` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mix_match`
--

INSERT INTO `tbl_mix_match` (`id_mix_match`, `nama_mm`, `harga`) VALUES
(90, 'Summer', 540000),
(91, 'Winter', 634000),
(92, 'Spring', 533000),
(93, 'Galaxy Clothes', 622000),
(94, 'Semakin di Depan', 587000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `harga_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`id_ongkir`, `nama_kota`, `harga_kota`) VALUES
(31, 'Banda Aceh', 25500),
(32, 'Pekanbaru', 19000),
(33, 'Batam', 18500),
(34, 'Bukit Tinggi', 25000),
(35, 'Jambi', 15000),
(36, 'Sukabumi', 8000),
(37, 'Bandung', 8000),
(38, 'Sleman', 13500),
(39, 'Wonogiri', 16000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_tsJual` int(5) NOT NULL,
  `id_custom` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_style`
--

CREATE TABLE `tbl_style` (
  `Id_style` int(5) NOT NULL,
  `nama_style` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tspreorder`
--

CREATE TABLE `tbl_tspreorder` (
  `id_tsPreorder` int(5) NOT NULL,
  `id_custom` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `id_ukuran` int(5) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indeks untuk tabel `tbl_detailmix_match`
--
ALTER TABLE `tbl_detailmix_match`
  ADD PRIMARY KEY (`id_detail_mix_match`);

--
-- Indeks untuk tabel `tbl_detailtspreorder`
--
ALTER TABLE `tbl_detailtspreorder`
  ADD PRIMARY KEY (`id_tsPreorder`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_mix_match`
--
ALTER TABLE `tbl_mix_match`
  ADD PRIMARY KEY (`id_mix_match`);

--
-- Indeks untuk tabel `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_tsJual`);

--
-- Indeks untuk tabel `tbl_style`
--
ALTER TABLE `tbl_style`
  ADD PRIMARY KEY (`Id_style`);

--
-- Indeks untuk tabel `tbl_tspreorder`
--
ALTER TABLE `tbl_tspreorder`
  ADD PRIMARY KEY (`id_tsPreorder`);

--
-- Indeks untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `idBarang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_custom` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailmix_match`
--
ALTER TABLE `tbl_detailmix_match`
  MODIFY `id_detail_mix_match` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailtspreorder`
--
ALTER TABLE `tbl_detailtspreorder`
  MODIFY `id_tsPreorder` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_mix_match`
--
ALTER TABLE `tbl_mix_match`
  MODIFY `id_mix_match` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_tsJual` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_style`
--
ALTER TABLE `tbl_style`
  MODIFY `Id_style` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tspreorder`
--
ALTER TABLE `tbl_tspreorder`
  MODIFY `id_tsPreorder` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
