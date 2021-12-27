-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 10:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutungandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'images/computer.png', '2021-12-14 22:42:15', NULL),
(2, 'Komputer dan Aksesoris', 'images/computer.png', '2021-12-14 22:42:15', NULL),
(3, 'Handphone dan Aksesoris', NULL, '2021-12-14 22:42:15', NULL),
(4, 'Pakaian Pria', 'images/fashion.png', '2021-12-14 22:42:15', NULL),
(5, 'Sepatu Pria', NULL, '2021-12-14 22:42:15', NULL),
(6, 'Tas Pria', NULL, '2021-12-14 22:42:15', NULL),
(7, 'Aksesoris Fashion', 'images/fashion.png', '2021-12-14 22:42:15', NULL),
(8, 'Jam Tangan', NULL, '2021-12-14 22:42:15', NULL),
(9, 'Kesehatan', 'images/healthcare.png', '2021-12-14 22:42:15', NULL),
(10, 'Hobi dan Koleksi', 'images/toysgame.png', '2021-12-14 22:42:15', NULL),
(11, 'Olahraga dan Outdoor', NULL, '2021-12-14 22:42:15', NULL),
(12, 'Buku dan Alat Tulis', 'images/book.png', '2021-12-14 22:42:15', NULL),
(13, 'Makanan dan Minuman', NULL, '2021-12-14 22:42:15', NULL),
(14, 'Perawatan adn Kecantikan', 'images/beauty.png', '2021-12-14 22:42:15', NULL),
(15, 'Perlengkapan Rumah', 'images/appliance.png', '2021-12-14 22:42:15', NULL),
(16, 'Pakaian Wanita', 'images/fashion.png', '2021-12-14 22:42:15', NULL),
(17, 'Fashion Muslim', 'images/fashion.png', '2021-12-14 22:42:15', NULL),
(18, 'Fashion Bayi dan Anak', 'images/fashion.png', '2021-12-14 22:42:15', NULL),
(19, 'Ibu dan Bayi', NULL, '2021-12-14 22:42:15', NULL),
(20, 'Sepatu Wanita', NULL, '2021-12-14 22:42:15', NULL),
(21, 'Tas Wanita', NULL, '2021-12-14 22:42:15', NULL),
(22, 'Otomotif', NULL, '2021-12-14 22:42:15', NULL),
(23, 'Souvenir dan Pesta', NULL, '2021-12-14 22:42:15', NULL),
(24, 'Fotografi', NULL, '2021-12-14 22:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barang Mudah Meledak', '2021-12-14 22:55:03', NULL),
(2, 'Barang Mengandung Cairan', '2021-12-14 22:55:03', NULL),
(3, 'Barang Terlalu Besar', '2021-12-14 22:55:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `review` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-12-14 22:23:14', NULL),
(2, 'user', '2021-12-14 22:23:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'JNE', 'Domestic', '2021-12-14 22:29:52', NULL),
(2, 'JNT', 'Domestic', '2021-12-14 22:29:52', NULL),
(3, 'Si Cepat', 'Domestic', '2021-12-14 22:29:52', NULL),
(4, 'Anter Aja', 'Domestic', '2021-12-14 22:29:52', NULL),
(5, 'DHL', 'International', '2021-12-14 22:29:52', NULL),
(6, 'UPS', 'International', '2021-12-14 22:29:52', NULL),
(7, 'FedEx', 'International', '2021-12-14 22:29:52', NULL),
(8, 'TNT', 'International', '2021-12-14 22:29:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu Pembayaran', '2021-12-14 22:47:31', NULL),
(2, 'Menunggu Tenggat Waktu', '2021-12-14 22:47:31', NULL),
(3, 'Sedang Diproses', '2021-12-14 22:47:31', NULL),
(4, 'Sedang Dikirim', '2021-12-14 22:47:31', NULL),
(5, 'Sampai Tujuan', '2021-12-14 22:47:31', NULL),
(6, 'Dibatalkan', '2021-12-14 22:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_wish`
--

CREATE TABLE `status_wish` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_by` datetime NOT NULL,
  `updated_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_status_transaksi`
--

CREATE TABLE `sub_status_transaksi` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_status_transaksi`
--

INSERT INTO `sub_status_transaksi` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pembayaran Diverifikasi', '2021-12-14 22:53:32', NULL),
(2, 'Sedang Diproses Admin', '2021-12-14 22:53:32', NULL),
(3, 'Pemrosesan Gagal', '2021-12-14 22:53:32', NULL),
(4, 'Berangkat dari Lokasi Penjual', '2021-12-14 22:53:32', NULL),
(5, 'Sampai Gudang', '2021-12-14 22:53:32', NULL),
(6, 'Sudah Dibungkus', '2021-12-14 22:53:32', NULL),
(7, 'Menunggu Pickup', '2021-12-14 22:53:32', NULL),
(8, 'Sudah Dikirim', '2021-12-14 22:53:32', NULL),
(9, 'Sudah Sampai Tujuan', '2021-12-14 22:53:32', NULL),
(10, 'Transaksi Dikonfirmasi', '2021-12-14 22:53:32', NULL),
(11, 'Transaksi Selesai', '2021-12-14 22:53:32', NULL),
(12, 'Transaksi Dibatalkan', '2021-12-14 22:53:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `process_date` datetime DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `finished_date` datetime DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `bod` datetime NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `disable` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `email`, `phone_number`, `bod`, `gender`, `address`, `disable`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test123', 2, 'test@gmail.com', '08123456789', '2021-12-24 07:50:43', 1, 'Jakarta Barat, Jakarta', 0, '2021-12-24 07:50:43', '2021-12-24 07:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `curr_qty` int(11) DEFAULT NULL,
  `target_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`id`, `name`, `price`, `category_id`, `created_by`, `detail`, `image`, `status`, `approved_by`, `reason_id`, `deadline`, `curr_qty`, `target_qty`, `created_at`, `updated_at`) VALUES
(1, 'Hand Sanitizer', 10000, 9, 1, 'Saniter Hand Sanitizer', 'images/wish/wish1.jpg', 1, NULL, NULL, '2022-01-24 08:36:45', 10, 100, '2021-12-24 08:36:45', '2021-12-24 08:36:45'),
(2, 'Botol Tupperware', 99000, 15, 1, 'Botol Minum Tupperware 1 Liter.', 'images/wish/wish2.jpg\n', 1, NULL, NULL, '2022-01-14 08:49:58', 5, 100, '2021-12-24 08:49:58', '2021-12-24 08:49:58'),
(3, 'Tisu Basah', 14900, 19, 1, 'Tisu Basah Cussons Baby.\r\nAman untuk Bayi.', 'images/wish/wish3.jpg', 1, NULL, NULL, '2021-12-29 15:28:30', 50, 200, '2021-12-24 09:28:30', '2021-12-24 09:28:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `fk_wish_id_idx` (`wish_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `fk_wish_id_idx` (`wish_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_wish`
--
ALTER TABLE `status_wish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_status_transaksi`
--
ALTER TABLE `sub_status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `fk_wish_id_idx` (`wish_id`),
  ADD KEY `fk_shipper_id_idx` (`shipper_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id_idx` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by_idx` (`created_by`),
  ADD KEY `fk_approved_by_idx` (`approved_by`),
  ADD KEY `fk_category_id_idx` (`category_id`),
  ADD KEY `fk_reason_id_idx` (`reason_id`),
  ADD KEY `fk_status_id_idx` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fl_card_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_review_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_shipper_id` FOREIGN KEY (`shipper_id`) REFERENCES `shipper` (`id`),
  ADD CONSTRAINT `fk_transaction_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_transaction_wish_id` FOREIGN KEY (`wish_id`) REFERENCES `wish` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `fk_wish_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_wish_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_wish_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_wish_reason_id` FOREIGN KEY (`reason_id`) REFERENCES `reason` (`id`),
  ADD CONSTRAINT `fk_wish_status_id` FOREIGN KEY (`status`) REFERENCES `status_transaksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
