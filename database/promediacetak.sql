-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 03:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promediacetak`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idpesanan` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `finishing` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `total` int(6) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `periode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`waktu`, `idpesanan`, `nama`, `layanan`, `ukuran`, `jumlah`, `bahan`, `finishing`, `catatan`, `file`, `total`, `status_pesanan`, `keterangan`, `periode`) VALUES
('2025-07-08 12:08:14', 1, 'Jati', 'Cetak Makalah', 'A4', 4, 'Art Paper', 'Jilid', '', 'KTP - Jati Arya Sujiwa.pdf', 0, '', '0', ''),
('2025-07-08 12:19:58', 8, 'Jati', 'Cetak Makalah', 'A4', 4, 'Art Paper', 'Jilid', '', 'KTP - Jati Arya Sujiwa.pdf', 0, '', '0', ''),
('2025-07-08 12:26:18', 10, 'Munadi', 'Cetak Skripsi', 'A4', 5, 'HVS', 'Jilid', 'bang skripsi bang', 'KTP - Jati Arya Sujiwa.pdf', 0, '', '0', ''),
('2025-07-08 12:32:40', 11, 'Uzairi', 'Cetak Proposal', 'A4', 5, 'Karton', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 12:33:09', 12, 'Uzairi', 'Cetak Proposal', 'A4', 5, 'Karton', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 12:33:37', 13, 'Uzairi', 'Cetak Poster', 'A3', 2, 'Art Paper', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 12:58:57', 14, 'Munadi', 'Cetak Banner', 'A4', 4, 'HVS', 'Doff', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 12:59:04', 15, 'Munadi', 'Cetak Banner', 'A4', 4, 'HVS', 'Doff', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:02:34', 16, 'Munadi', 'Cetak Poster', 'A5', 5, 'Art Paper', 'Glossy', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:06:41', 17, 'Jati', 'Cetak Skripsi', 'A4', 1, 'HVS', 'Jilid', 'bang', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:06:49', 18, 'Jati', 'Cetak Skripsi', 'A4', 1, 'HVS', 'Jilid', 'bang', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:09:41', 19, 'Munadi', 'Cetak Banner', 'A4', 6, 'Art Paper', 'Doff', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:10:41', 20, 'Munadi', 'Cetak Banner', 'A4', 6, 'Art Paper', 'Doff', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:11:26', 21, 'Munadi', 'Cetak Banner', 'A4', 6, 'Art Paper', 'Doff', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:18:39', 22, 'Munadi', 'Cetak Banner', 'A4', 5, 'HVS', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:45:47', 23, 'Jati', 'Cetak Poster', 'A6', 1, 'Karton', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:51:03', 24, 'Muel', 'Cetak Makalah', 'A6', 3, 'HVS', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 13:51:27', 25, 'Muel', 'Cetak Makalah', 'A6', 3, 'HVS', 'Jilid', '', 'academycrypto.jpg', 0, '', '0', ''),
('2025-07-08 15:37:29', 26, 'Dio', 'Cetak Brosur', 'A6', 4, 'HVS', 'Doff', '', 'toko-removebg-preview.png', 0, '', '0', ''),
('2025-07-08 15:44:10', 27, 'Dio', 'Cetak Skripsi', 'A6', 1, 'HVS', 'Jilid', '', 'Wajan _ Wok _ Kuali _ Penggorengan Gagang merk VIENNA 100% Original.jpg', 0, '', '0', ''),
('2025-07-08 15:45:18', 28, 'Dio', 'Cetak Proposal', 'A4', 1, 'Art Paper', 'Glossy', '', 'toko-removebg-preview.png', 0, '0', 'Pesanan Dihapus', ''),
('2025-07-08 15:46:51', 29, 'Dio', 'Cetak Banner', 'A6', 2, 'HVS', 'Glossy', '', '', 0, '', '0', ''),
('2025-07-08 15:49:17', 30, 'Dio', 'Cetak Skripsi', 'A6', 3, 'HVS', 'Jilid', '', '', 0, '', '0', ''),
('2025-07-08 15:49:56', 31, 'Dio', 'Cetak Poster', 'A4', 3, 'HVS', 'Jilid', '', '', 0, '', '0', ''),
('2025-07-08 15:51:13', 32, 'Dio', 'Cetak Makalah', 'A6', 4, 'HVS', 'Jilid', '', 'Wajan _ Wok _ Kuali _ Penggorengan Gagang merk VIENNA 100% Original.jpg', 0, '', '0', ''),
('2025-07-09 09:16:40', 33, 'Munadi', 'Cetak Skripsi', 'A4', 3, 'HVS', 'Jilid', 'Jiilid bang', 'Perahu Kertas ⛵ _ Dee Lestari.jpg', 0, '', '0', ''),
('2025-07-09 09:22:35', 34, 'Jati', 'Cetak Banner', 'A5', 3, 'HVS', 'Jilid', 'bg', 'The psychology of money 💰.jpg', 0, '', '0', ''),
('2025-07-09 09:28:38', 35, 'Uzairi', 'Cetak Banner', 'A4', 4, 'HVS', 'Jilid', 'bang', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '0', ''),
('2025-07-09 09:42:56', 36, 'Jati', 'Cetak Skripsi', 'A4', 4, 'HVS', 'Jilid', 'jati', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '0', ''),
('2025-07-09 09:51:12', 37, 'Uzairi', 'Cetak Skripsi', 'A6', 1, 'HVS', 'Jilid', '', 'The psychology of money 💰.jpg', 0, '', '0', ''),
('2025-07-09 10:00:29', 38, 'Munadi', 'Cetak Skripsi', 'A4', 2, 'HVS', 'Jilid', 'sadas', 'toko-removebg-preview.png', 0, '', '0', ''),
('2025-07-09 10:15:08', 39, 'Jati', 'Cetak Skripsi', 'A4', 5, 'HVS', 'Jilid', '', 'The psychology of money 💰.jpg', 0, '', '0', ''),
('2025-07-09 10:17:30', 40, 'Munadi', 'Cetak Makalah', 'A4', 2, 'HVS', 'Jilid', '', 'toko-removebg-preview.png', 0, '', 'Diproses', ''),
('2025-07-09 10:17:54', 41, 'Munadi', 'Cetak Makalah', 'A4', 2, 'HVS', 'Jilid', '', 'toko-removebg-preview.png', 0, '', 'Selesai', ''),
('2025-07-09 10:18:21', 42, 'Munadi', 'Cetak Makalah', 'A4', 2, 'HVS', 'Jilid', '', 'toko-removebg-preview.png', 0, '', 'Dibatalkan', ''),
('2025-07-09 10:19:07', 43, 'Munadi', 'Cetak Makalah', 'A4', 2, 'HVS', 'Jilid', '', 'toko-removebg-preview.png', 0, '', 'Menunggu', ''),
('2025-07-09 14:30:15', 44, 'Munadi', 'Cetak Poster', 'A6', 1, 'HVS', 'Jilid', '', 'Online Mall Blibli_com, Sensasi Belanja Online Shop ala Mall.jpg', 0, '', '', ''),
('2025-07-09 14:36:49', 45, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-09 14:36:59', 46, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-09 14:37:38', 47, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-09 14:37:41', 48, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-09 14:38:14', 49, 'Muel', 'Cetak Poster', 'A4', 3, 'HVS', 'Jilid', '', 'Buku public speaking.jpg', 0, '', '', ''),
('2025-07-09 14:38:17', 50, 'Muel', 'Cetak Poster', 'A4', 3, 'HVS', 'Jilid', '', 'Buku public speaking.jpg', 0, '', '', ''),
('2025-07-09 14:39:49', 51, 'Jati', 'Cetak Makalah', 'A4', 3, 'HVS', 'Jilid', '', 'The psychology of money 💰.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-09 14:41:15', 52, 'Jati', 'Cetak Brosur', 'A5', 2, 'HVS', 'Jilid', '', 'bf9ba0a9-a33a-4ca9-8df9-e28de98de323.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-09 14:45:09', 53, 'Munadi', 'Cetak Poster', 'A4', 1, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-09 14:45:48', 54, 'Munadi', 'Cetak Poster', 'A4', 1, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-09 14:45:53', 55, 'Munadi', 'Cetak Poster', 'A4', 1, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-09 14:47:43', 56, 'Jati', 'Cetak Makalah', 'A4', 1, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-09 14:47:48', 57, 'Jati', 'Cetak Makalah', 'A4', 1, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', '', ''),
('2025-07-10 00:19:27', 58, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', 'print bang', 'academycrypto.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:19:35', 59, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', 'print bang', 'academycrypto.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:19:37', 60, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', 'print bang', 'academycrypto.jpg', 0, 'Menunggu', 'Pesanan Dihapus', ''),
('2025-07-10 00:19:37', 61, 'Munadi', 'Cetak Proposal', 'A4', 2, 'HVS', 'Jilid', 'print bang', 'academycrypto.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:23:42', 62, 'Jati', 'Cetak Brosur', 'A6', 3, 'HVS', 'Jilid', '', 'Perahu Kertas ⛵ _ Dee Lestari.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:24:17', 63, 'Jati', 'Cetak Brosur', 'A6', 3, 'HVS', 'Jilid', '', 'Perahu Kertas ⛵ _ Dee Lestari.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:32:20', 64, 'Uzairi', 'Cetak Banner', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:33:13', 65, 'Uzairi', 'Cetak Banner', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:35:36', 66, 'Uzairi', 'Cetak Banner', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:36:29', 67, 'Uzairi', 'Cetak Banner', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-10 00:38:07', 68, 'Uzairi', 'Cetak Banner', 'A4', 2, 'HVS', 'Jilid', '', 'INDOMIE - Instant Nudeln Mi Goreng - Multipack (40 X 80 GR).jpg', 0, 'Diproses', 'Pesanan Dihapus', ''),
('2025-07-10 01:26:46', 69, 'Munadi', 'Cetak Poster', 'A4', 2, 'HVS', 'Jilid', 'oke bang', 'bf9ba0a9-a33a-4ca9-8df9-e28de98de323.jpg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-11 11:53:35', 70, 'Jati', 'Cetak Makalah', 'A4', 2, 'HVS', 'Jilid', 'Jilid bang', 'XAUUSD_2025-07-10_22-05-38.png', 0, 'Selesai', 'Pesanan Dihapus', ''),
('2025-07-11 12:06:30', 71, 'Uzairi', 'Cetak Proposal', 'A4', 1, 'HVS', 'Jilid', 'Gas bang', 'WhatsApp Image 2025-07-10 at 23.24.56.jpeg', 0, 'Selesai', 'Pesanan Dihapus', ''),
('2025-07-11 13:10:54', 72, 'Muel', 'Cetak Makalah', 'A4', 1, 'HVS', 'Jilid', 'Jilid rapi bang ya', 'profile.jpg', 0, 'Selesai', 'Pesanan Dihapus', ''),
('2025-07-11 14:07:40', 73, 'Uzairi', 'Cetak Proposal', 'A5', 2, 'HVS', 'Jilid', 'Gas bang', 'XAUUSD_2025-07-11_17-00-29.png', 0, 'Selesai', 'Pesanan Dihapus', ''),
('2025-07-11 14:08:34', 74, 'Munadi', 'Cetak Brosur', 'A5', 2, 'Karton', '', 'gas bang', 'WhatsApp Image 2025-07-10 at 23.24.56.jpeg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-11 14:10:40', 75, 'Jati Arya ', 'Cetak Skripsi', 'A4', 3, 'HVS', 'Jilid', 'Jilid dengan warna merah bang', 'WhatsApp Image 2025-07-10 at 23.24.56.jpeg', 0, '', 'Pesanan Dihapus', ''),
('2025-07-14 09:42:43', 76, 'Jati', 'Cetak Skripsi', 'A4', 10, 'HVS', 'Jilid', 'Jilid dengan rapi yang bang', 'XAUUSD_2025-07-11_17-00-29.png', 0, 'Selesai', 'Pesanan Dihapus', ''),
('2025-07-14 09:55:33', 77, 'ali', 'Cetak Proposal', 'A4', 5, 'HVS', 'Jilid', 'oke bang', 'XAUUSD_2025-07-11_17-00-29.png', 0, '', 'Pesanan Dihapus', ''),
('2025-07-15 01:49:42', 78, 'Uzairi', 'Cetak Makalah', 'A4', 5, 'HVS', 'Jilid', 'harus rapi ngentot', 'profile.jpg', 0, 'Selesai', 'Pesanan Dihapus', '');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `idnotif` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idpesanan` int(6) NOT NULL,
  `idpembayaran` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`idnotif`, `email`, `idpesanan`, `idpembayaran`) VALUES
(1, 'jati@gmail.com', 76, 61),
(2, 'ali@gmail.com', 77, 62);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idpembayaran` int(6) NOT NULL,
  `idpesanan` int(6) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `buktibayar` varchar(200) NOT NULL,
  `total` int(10) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`waktu`, `idpembayaran`, `idpesanan`, `metode_pembayaran`, `buktibayar`, `total`, `status_pembayaran`) VALUES
('2025-07-11 13:43:45', 53, 68, 'Transfer Bank', 'bf9ba0a9-a33a-4ca9-8df9-e28de98de323.jpg', 14800, 'Belum dibayar'),
('2025-07-11 13:43:45', 54, 69, 'Transfer Bank', 'Wajan _ Wok _ Kuali _ Penggorengan Gagang merk VIENNA 100% Original.jpg', 12800, ''),
('2025-07-11 13:43:45', 55, 70, 'QRIS', 'WhatsApp Image 2025-07-10 at 23.24.56.jpeg', 12800, 'Lunas'),
('2025-07-11 13:43:45', 56, 71, 'Transfer Bank', 'profile.jpg', 6600, 'Lunas'),
('2025-07-11 13:43:45', 57, 72, 'Transfer Bank', 'WhatsApp Image 2025-07-10 at 23.24.56.jpeg', 6400, 'Lunas'),
('2025-07-11 14:11:08', 58, 73, 'Transfer Bank', 'XAUUSD_2025-07-10_22-05-38.png', 12800, 'Lunas'),
('2025-07-11 14:08:34', 59, 74, 'QRIS', 'XAUUSD_2025-07-11_17-00-29.png', 4800, ''),
('2025-07-11 14:10:40', 60, 75, 'QRIS', 'XAUUSD_2025-07-11_17-00-29.png', 20700, ''),
('2025-07-14 09:43:23', 61, 76, 'Transfer Bank', 'XAUUSD_2025-07-10_15-15-51.png', 69000, 'Lunas'),
('2025-07-14 09:55:33', 62, 77, 'Transfer Bank', 'XAUUSD_2025-07-11_17-00-29.png', 33000, ''),
('2025-07-15 01:51:02', 63, 78, 'GOPAY', 'Your paragraph text.png', 32000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `email`, `no_hp`, `alamat`, `password`, `role`) VALUES
('admin', 'admin@gmail.com', '81723821', 'Mataram', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('ali', 'ali@gmail.com', '08192872631621', 'Kekalik', '3861a60523ef89a017be166c5b325409', 'public'),
('Jati', 'jati@gmail.com', '81973377504', 'Lenek', 'dc7aa8a289d18975973ac94ca33219eb', 'admin'),
('Uzairi', 'uzairi@gmail.com', '081975049827', 'Gunung Sari', '832817bf93c801de4365cdf2c9253984', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `idpesanan` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `finishing` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`idnotif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD UNIQUE KEY `idpesanan` (`idpesanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `idnotif` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
