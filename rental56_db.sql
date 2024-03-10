-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2023 at 10:42 PM
-- Server version: 8.0.32-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental56_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rentcar Yogyakarta', 'jogja86rencar@gmail.com', NULL, '$2y$10$Oae/74EidLmFXkDF6adbQOFAO8tgFqY5YbVWn830S6w.5.j3FUThy', 'f8l3ciYZazzLbL3edwgej7wij6R4WxjQg0t22269OeqvRdT4nicHfoPAUQN5', '2020-05-15 03:02:16', '2023-02-04 13:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `mobil_id` int NOT NULL,
  `kode_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `denda` int DEFAULT NULL,
  `status_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int NOT NULL,
  `paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_bayar` int NOT NULL,
  `jml_dp` int NOT NULL,
  `status_pelunasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pengambilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `mobil_id`, `kode_booking`, `tgl_booking`, `tgl_mulai`, `tgl_selesai`, `tgl_kembali`, `denda`, `status_booking`, `durasi`, `paket`, `jml_bayar`, `jml_dp`, `status_pelunasan`, `status_pengambilan`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'B-882131512', '2023-02-18 21:03:02', '2023-02-18 17:00:00', '2023-02-19 17:00:00', '2023-02-20 07:00:00', 350000, 'Selesai', 1, '0', 350000, 105000, 'Lunas', 'Sudah', '2023-02-18 14:03:06', '2023-02-18 14:08:07'),
(2, 2, 8, 'B-1158903634', '2023-02-18 21:26:49', '2023-02-19 10:30:00', '2023-02-21 10:30:00', '2023-02-21 10:35:00', 0, 'Selesai', 2, '0', 500000, 150000, 'Lunas', 'Sudah', '2023-02-18 14:27:08', '2023-02-18 14:37:22'),
(3, 2, 13, 'B-598052266', '2023-02-19 19:55:19', '2023-02-19 21:00:00', '2023-02-21 21:00:00', '2023-02-21 22:30:00', 25000, 'Selesai', 2, '1', 900000, 270000, 'Lunas', 'Sudah', '2023-02-19 12:56:12', '2023-02-19 13:07:12'),
(4, 2, 4, 'B-587040151', '2023-02-19 20:20:12', '2023-02-19 20:19:00', '2023-02-20 20:19:00', NULL, NULL, 'Batal', 1, '0', 275000, 82500, 'Belum Lunas', 'Belum', '2023-02-19 13:23:34', '2023-02-19 14:24:07'),
(5, 2, 5, 'B-1915307643', '2023-02-19 20:32:59', '2023-02-19 20:32:00', '2023-02-20 20:32:00', NULL, NULL, 'Batal', 1, '0', 275000, 82500, 'Belum Lunas', 'Belum', '2023-02-19 13:33:04', '2023-02-19 13:33:04'),
(6, 2, 5, 'B-1915307643', '2023-02-19 20:32:59', '2023-02-19 20:32:00', '2023-02-20 20:32:00', '2023-02-21 20:35:00', 600000, 'Selesai', 1, '0', 275000, 82500, 'Lunas', 'Sudah', '2023-02-19 13:34:52', '2023-02-19 13:40:15'),
(7, 2, 13, 'B-1875861552', '2023-02-24 08:27:03', '2023-02-24 08:26:00', '2023-02-25 08:26:00', NULL, NULL, 'Batal', 1, '0', 350000, 105000, 'Belum Lunas', 'Belum', '2023-02-24 01:27:10', '2023-02-24 02:28:48'),
(8, 2, 13, 'B-458492081', '2023-02-24 09:43:29', '2023-02-24 06:42:00', '2023-03-01 06:42:00', NULL, NULL, 'Batal', 5, '0', 1750000, 525000, 'Belum Lunas', 'Belum', '2023-02-24 02:44:21', '2023-02-24 03:46:09'),
(9, 2, 13, 'B-1189268317', '2023-02-25 01:14:08', '2023-02-25 18:13:00', '2023-02-26 18:13:00', NULL, NULL, 'Batal', 1, '0', 350000, 105000, 'Belum Lunas', 'Belum', '2023-02-24 18:14:12', '2023-02-24 19:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `mereks`
--

CREATE TABLE `mereks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_merek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mereks`
--

INSERT INTO `mereks` (`id`, `nama_merek`, `created_at`, `updated_at`) VALUES
(1, 'Honda', '2020-07-06 20:59:50', '2020-07-06 21:00:18'),
(2, 'Toyota', '2020-07-06 21:17:05', '2020-07-28 18:46:32'),
(3, 'Daihatsu', '2020-07-06 21:17:14', '2020-07-06 21:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_14_234009_add_activation_columns_to_users', 2),
(4, '2020_05_15_083056_create_admins_table', 3),
(6, '2020_05_17_143144_create_mereks_table', 4),
(7, '2020_05_17_143605_create_bookings_table', 4),
(8, '2020_05_17_144515_create_payments_table', 4),
(9, '2020_05_17_141715_create_mobils_table', 5),
(12, '2020_06_16_091807_create_sopirs_table', 6),
(13, '2020_07_27_112036_create_testimonis_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `id` bigint UNSIGNED NOT NULL,
  `merek_id` int NOT NULL,
  `nama_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nopol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_mobil` int DEFAULT NULL,
  `tarif_mobil` int NOT NULL,
  `tarif_sopir` int NOT NULL,
  `img1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id`, `merek_id`, `nama_mobil`, `nopol`, `tahun`, `seat`, `transmisi`, `bb`, `status_mobil`, `tarif_mobil`, `tarif_sopir`, `img1`, `created_at`, `updated_at`) VALUES
(1, 1, 'New Agya', 'AB 1697 DK', '2016', '4', 'Matic', 'Bensin', 1, 275000, 80000, 'agyaKuning.png', '2020-07-06 21:14:54', '2020-07-06 21:14:54'),
(2, 1, 'New Agya', 'AB 1697 DD', '2016', '4', 'Manual', 'Bensin', 1, 275000, 80000, 'agyaSilver.png', '2020-07-06 21:15:57', '2020-07-06 21:15:57'),
(3, 1, 'New Avanza', 'AB 6564 HJ', '2017', '6', 'Manual', 'Bensin', 1, 275000, 80000, 'avanzaHitam.png', '2020-07-06 21:16:52', '2020-07-06 21:16:52'),
(4, 2, 'Avanza Veloz', 'AB 0989 FF', '2018', '6', 'Manual', 'Bensin', 1, 275000, 80000, 'Avanza-Veloz.png', '2020-07-06 21:18:11', '2020-07-06 21:18:12'),
(5, 3, 'Avanza Veloz', 'AB 6563 GH', '2016', '6', 'Matic', 'Bensin', 1, 275000, 80000, 'avanza-velozHitam.png', '2020-07-06 21:19:07', '2020-07-06 21:19:07'),
(6, 3, 'Brio Satya', 'AB 7757 FD', '2017', '4', 'Matic', 'Bensin', 1, 250000, 80000, 'briKuning.png', '2020-07-06 21:20:08', '2020-07-06 21:20:08'),
(7, 1, 'Brio', 'AB 9234 HH', '2017', '4', 'Matic', 'Bensin', 1, 250000, 80000, 'brioDulu.png', '2020-07-06 21:20:53', '2020-07-06 21:20:53'),
(8, 3, 'New Brio', 'AB 8774 GK', '2017', '4', 'Manual', 'Bensin', 1, 250000, 80000, 'brioHitam.png', '2020-07-06 21:21:44', '2020-07-06 21:21:44'),
(9, 1, 'Brio', 'AA 7897 GK', '2016', '4', 'Manual', 'Bensin', 1, 250000, 80000, 'brioMerah.png', '2020-07-06 21:22:39', '2020-07-06 21:22:39'),
(10, 2, 'Hiace', 'AB 8656 BG', '2000', '17', 'Manual', 'Solar', 1, 1000000, 100000, 'hiace.png', '2020-07-06 21:23:39', '2023-02-18 09:04:22'),
(11, 2, 'Innova Reborn', 'AB 9743 GD', '2017', '6', 'Manual', 'Bensin', 1, 400000, 100000, 'innova.png', '2020-07-06 21:24:43', '2020-07-06 21:24:43'),
(12, 1, 'All New Jazz RS', 'AB 8667 VG', '2016', '4', 'Matic', 'Bensin', 1, 350000, 100000, 'jazzMerah.png', '2020-07-06 21:25:45', '2020-07-06 21:25:45'),
(13, 1, 'All New Jazz RS', 'AB 7754 HJ', '2016', '4', 'Matic', 'Bensin', 1, 350000, 100000, 'jazzPutih.png', '2020-07-06 21:26:42', '2020-07-06 21:26:42'),
(14, 1, 'Mobilio', 'AB 8790 GG', '2017', '6', 'Manual', 'Bensin', 1, 275000, 100000, 'mobilioPutih.png', '2020-07-06 21:27:40', '2020-07-06 21:27:40'),
(15, 2, 'New Avanza', 'AB 2543 FH', '2016', '6', 'Manual', 'Bensin', 1, 275000, 80000, 'newavanzamobil.png', '2020-07-06 21:28:31', '2020-07-06 21:28:32'),
(16, 2, 'Rush', 'AB 7654 UH', '2018', '6', 'Manual', 'Bensin', 1, 400000, 100000, 'rush.png', '2020-07-06 21:29:26', '2020-07-06 21:29:27'),
(17, 2, 'Avanza Veloz', 'AB 9864 GH', '2016', '6', 'Manual', 'Bensin', 1, 275000, 80000, 'veloz-putih.png', '2020-07-06 21:30:25', '2020-07-06 21:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('zakiadj5@gmail.com', '$2y$10$ZzNtRQhqZCR52wSsBdn3wuYxpBNsSXcmHz.X.nRX5fHp8bD8TFHqm', '2020-08-11 08:14:18'),
('notfound0777@gmail.com', '$2y$10$8EI58Oky4n0LB7VxMCXyRe/7yOAkNVppqZrceKKD.9GGf5/JlsQWO', '2020-11-14 04:44:46'),
('ajihihi01@gmail.com', '$2y$10$NSAXOxtVkEfC2Om0AAANs.rVMfGwgX56CxbYxg6D.0a30svOCQnx2', '2020-12-14 12:08:40'),
('jogja86rencar@gmail.com', '$2y$10$I8wsRwb9isT22VvVIASlCOo9sc073XkU6ec/M6Zqo4wHEMk0b9qVi', '2023-02-18 14:19:11'),
('zentryas27@gmail.com', '$2y$10$GamsyvQcqpTqBGQJhFT2SePCu5qzeGkHMRfjhG438b0NrxZYFmYKu', '2023-03-01 13:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `dp` decimal(20,2) NOT NULL DEFAULT '0.00',
  `kekurangan` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_post` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `user_id`, `dp`, `kekurangan`, `status`, `snap_token`, `status_post`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '105000.00', 245000, 'success', 'b7251f5d-f2ec-431d-893c-29f690cceb53', 'Sudah', '2023-02-18 14:03:11', '2023-02-18 14:16:29'),
(2, 2, 2, '150000.00', 350000, 'success', 'a2c0d9ab-00cd-400e-affd-74c6b7d8fee9', 'Sudah', '2023-02-18 14:28:01', '2023-02-18 14:41:58'),
(3, 3, 2, '270000.00', 630000, 'success', 'b531a212-3e23-4abb-a9aa-655c205c8c05', 'Sudah', '2023-02-19 12:59:13', '2023-02-19 13:14:05'),
(4, 4, 2, '82500.00', 192500, 'expired', '09417b29-547b-4b57-a833-80ac2c393c52', NULL, '2023-02-19 13:23:51', '2023-02-19 14:24:07'),
(5, 6, 2, '82500.00', 192500, 'success', '10c8d85d-9fed-47b7-bce7-90955bcd5dcb', NULL, '2023-02-19 13:35:54', '2023-02-19 13:38:54'),
(6, 7, 2, '105000.00', 245000, 'expired', 'c5d32a6b-87ee-44c8-8a5d-a5d286119679', NULL, '2023-02-24 01:27:15', '2023-02-24 02:28:48'),
(7, 8, 2, '525000.00', 1225000, 'expired', 'a970c386-889a-474c-a81f-9d7ab79b254c', NULL, '2023-02-24 02:44:41', '2023-02-24 03:46:09'),
(8, 9, 2, '105000.00', 245000, 'expired', '800e0043-a076-42b4-b004-7e014afcbc21', NULL, '2023-02-24 18:14:29', '2023-02-24 19:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `sopirs`
--

CREATE TABLE `sopirs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sopir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_sopir` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sopirs`
--

INSERT INTO `sopirs` (`id`, `nama_sopir`, `status_sopir`, `created_at`, `updated_at`) VALUES
(1, 'Andre Taulani', 1, '2020-07-06 21:06:56', '2023-02-20 04:27:29'),
(2, 'Risa', 1, '2020-07-06 21:12:31', '2023-02-20 04:27:34'),
(3, 'Malizi', 1, '2020-08-12 15:17:49', '2023-02-20 04:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `testimoni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `user_id`, `testimoni`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobil bersih, wangi dan nyaman dikendarai', '2023-02-18 14:16:29', '2023-02-18 14:16:29'),
(2, 2, 'bersih dan nyaman, karyawannya juga ramah dan mudah dimengerti', '2023-02-18 14:41:58', '2023-02-18 14:41:58'),
(3, 2, 'mantap', '2023-02-19 13:14:05', '2023-02-19 13:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nama_belakang`, `nomor_hp`, `alamat`, `jenis_kelamin`, `agama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `active`, `activation_token`) VALUES
(1, 'Zen', 'Trias', '085803959179', 'Nganti, Sendangadi, Mlati, Sleman, Yogyakarta', '1', 'Islam', 'zentryas27@gmail.com', NULL, '$2y$10$Edi2Pk/Pe/gAM7kRqve1MOpSw81TsBBKgV96AxyHUYU8nk2SUlaKK', NULL, '2023-02-18 13:59:27', '2023-02-18 14:01:09', 1, NULL),
(2, 'Dini', 'suryati', '081248158977', 'Sendangadi, Rt.01, Rw.07, nganti, mlati, sleman, yogyakarta', '0', 'Islam', 'darlthoka123@gmail.com', NULL, '$2y$10$3/UGCaBRwbNWzZ2slSve/O0Qq87XfbY0u9X0RQvNo4olAxFN2NZ2m', NULL, '2023-02-18 14:20:41', '2023-02-18 14:24:53', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mereks`
--
ALTER TABLE `mereks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sopirs`
--
ALTER TABLE `sopirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mereks`
--
ALTER TABLE `mereks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sopirs`
--
ALTER TABLE `sopirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
