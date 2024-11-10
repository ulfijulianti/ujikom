-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_salwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `kd_agenda` int(11) NOT NULL,
  `judul_agenda` varchar(550) NOT NULL,
  `isi_agenda` text NOT NULL,
  `tgl_agenda` date NOT NULL,
  `tgl_post_agenda` date NOT NULL,
  `status_agenda` int(11) NOT NULL,
  `kategori_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`kd_agenda`, `judul_agenda`, `isi_agenda`, `tgl_agenda`, `tgl_post_agenda`, `status_agenda`, `kategori_id`) VALUES
(9, 'Kegiatan Pembukaan Transforkr4b 2024 SMK Negeri 4 Bogor. Kegiatan ini dilaksanankan di lapangan pada hari Rabu, 16 Oktober 2024', 'images/cUi4SoLaFVAb0IUjjdn7CVJ3H5U0ozDTttug6qp6.jpg', '2024-10-16', '2024-10-19', 1, '8'),
(10, 'Kegiatan Demo Ekstrakurikuler sebagai salah satu rangkaian dari Kegiatan Pengenalan Lingkungan Sekolah (PLS) Peserta Didik Baru SMK Negeri 4 Kota Bogor Tahun Ajaran 2023/2024.', 'images/RIG7EO8ry7OmlwoU4F4y2mLHwCErLpRdKs4GaHut.jpg', '2024-11-10', '2024-11-22', 1, '9'),
(11, 'Kegiatan Pelaksanaan P5 Shalat Dhuha Berjamaah. Kegiatan ini diikuti oleh seluruh warga sekolah dan dilaksanakan pada hari Kamis, 07 November 2024.', 'images/BOUZdeQ2qNH1nU5nGIg7FTNirtJhYvnxjDGsHaeF.jpg', '2024-11-07', '2024-11-07', 1, '3'),
(12, 'Kegiatan Pentas Seni SMK Negeri 4 Bogor yang menampilkan penampilan dari Mighfar Suganda dan DJ Maill sebagai Guest Star.', 'images/H9V0zDIN29vwROwgUGt9asMBRFPRZ8fmHdWfGXz6.jpg', '2024-09-26', '2024-09-28', 1, '8');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `kategori_id`, `judul`, `deskripsi`) VALUES
(1, 4, 'Fasilitas', 'SMKN 4 Kota Bogor menyediakan berbagai fasilitas lengkap yang mendukung proses pembelajaran serta kegiatan ekstrakurikuler untuk memastikan pengalaman belajar yang optimal bagi setiap siswa. Beberapa fasilitas utama yang tersedia di sekolah kami meliputi:'),
(3, 5, 'Kompetensi Keahlian', 'Kompetensi keahlian di SMKN 4 Kota Bogor ini bertujuan untuk memberikan siswa keterampilan siap kerja yang sesuai dengan kebutuhan industri, sehingga mereka siap menghadapi dunia kerja di bidang masing-masing.'),
(4, 9, 'Ekstrakulikuler', 'Ekstrakurikuler di SMK Negeri 4 Bogor menawarkan berbagai kegiatan yang menarik dan bermanfaat bagi siswa untuk mengembangkan bakat, minat, serta keterampilan sosial dan kepemimpinan. Setiap ekstrakurikuler didukung oleh pembimbing yang ahli di bidangnya untuk memberikan pengalaman yang maksimal.');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `kd_info` int(11) NOT NULL,
  `judul_info` varchar(150) NOT NULL,
  `isi_info` text NOT NULL,
  `tgl_post_info` date NOT NULL,
  `status_info` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kategori_id` varchar(150) NOT NULL,
  `deskripsi_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`kd_info`, `judul_info`, `isi_info`, `tgl_post_info`, `status_info`, `created_at`, `kategori_id`, `deskripsi_info`) VALUES
(14, 'Lulusan SMK Negeri 4 Kota Bogor Siswanya Banyak Diserap Sebagai Pekerja di-Perusahaan Besar.', 'images/L2sm06NFoE76YauYSg5VC2ypVKNIHnasvfG5jZUz.jpg', '2024-05-29', 1, '2024-11-10 12:22:04', '6', ''),
(15, 'SMKN 4 Kota Bogor Lindungi Siswa PKLnya Melalui Program BPJS Ketenagakerjaan', 'images/XgfGkGEzB0DzP5IqExyshnZrTslJ7P7brXEopss7.jpg', '2024-08-19', 1, '2024-11-10 12:37:06', '7', ''),
(16, 'Industri Lirik SMKN 4 Bogor Karena Sukses Terapkan Pendidikan Vokasi', 'images/7MRfnbXdqTarbMds2RNmeTIIcLvV3GeJZtNUXXIX.jpg', '2022-11-12', 1, '2024-11-10 12:35:39', '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `judul`, `deskripsi`) VALUES
(3, 'P5', 'Seputar P5'),
(5, 'Jurusan', 'Seputar Jurusan SMKN 4 Bogor'),
(6, 'Prestasi Sekolah', 'SMK Negeri 4 Kota Bogor menghasilkan lulusan berkualitas yang banyak diserap oleh perusahaan besar. Siswa kami rutin meraih prestasi di berbagai kompetisi kejuruan dan akademis, berkat pendidikan yang relevan dan kemitraan dengan dunia industri.'),
(7, 'Kerjasama', 'Kerjasama industri dengan SMKN 4'),
(8, 'Event Sekolah', 'Seputar Acara SMKN 4 Bogor'),
(9, 'Ekstrakulikuler', 'Seputar Ekskul');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_02_093146_add_profile_image_to_users_table', 2),
(5, '2024_10_28_085618_create_personal_access_tokens_table', 3),
(6, '2024_11_07_074541_add_status_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nhanifah320@gmail.com', '$2y$12$ujty4B73.Oh8Z7TaPF9U/.iTw4twxuoUGsxiwWTYLcY42esCz1PRm', '2024-10-29 01:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'auth_token', '13180a9858fd1125d6bb169c369cdf2ee0c749c8b3ec52487dc12cd29a205d84', '[\"*\"]', NULL, NULL, '2024-10-28 20:08:03', '2024-10-28 20:08:03'),
(2, 'App\\Models\\User', 5, 'auth_token', '4bd9742f81877caffc1392b86a62fdc6db98f81942178558ea1bd78ce46b1e00', '[\"*\"]', NULL, NULL, '2024-10-28 20:17:46', '2024-10-28 20:17:46'),
(4, 'App\\Models\\User', 6, 'auth_token', 'b7e5384ff0b2a173e4dc36352ba2cacf1c318d03648666e370163e3afb34b213', '[\"*\"]', '2024-10-28 23:14:11', NULL, '2024-10-28 22:25:31', '2024-10-28 23:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `kd_photo` int(11) NOT NULL,
  `judul_photo` varchar(150) NOT NULL,
  `isi_photo` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_photo` varchar(150) NOT NULL,
  `updated_at` time NOT NULL,
  `galery_id` int(11) NOT NULL,
  `deskripsi_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`kd_photo`, `judul_photo`, `isi_photo`, `user_id`, `created_at`, `status_photo`, `updated_at`, `galery_id`, `deskripsi_photo`) VALUES
(7, 'PPLG', 'photos/UAJhy7tLoeVukoOIuFdNomj42BsLnX6GHt44295H.png', 3, '2024-11-10 17:30:44', '1', '17:30:44', 3, 'PPLG (Pengembangan Perangkat Lunak dan Gim): Jurusan ini fokus pada pembuatan aplikasi, perangkat lunak, dan game, serta mengasah keterampilan pemrograman dan pengembangan teknologi digital.'),
(8, 'TPFL', 'photos/c4C48JHgKN0Z6XjV6g6kqzOooXwWTDFIZBIlp9Uy.jpg', 3, '2024-11-10 17:31:37', '1', '17:31:37', 3, 'TPFL (Teknik Pengelasan dan Fabrikasi Logam): Jurusan yang mengajarkan teknik pengelasan, pemotongan logam, serta fabrikasi untuk menghasilkan berbagai produk berbahan logam.'),
(9, 'TJKT', 'photos/DbKj0Y00BEnvnOQ5rTZRI68rF7uR9F8Ai9S5vRKZ.png', 3, '2024-11-10 17:31:59', '1', '17:31:59', 3, 'TJKT (Teknik Jaringan Komputer dan Telekomunikasi): Jurusan ini mempersiapkan siswa untuk mengelola jaringan komputer, memahami teknologi telekomunikasi, dan merancang sistem jaringan yang efisien.'),
(10, 'TO', 'photos/AfiSmCtFVBsShhRUb4QbEmwzQLXjWVB3z3KWXMCw.png', 3, '2024-11-10 17:32:24', '1', '17:32:24', 3, 'TO (Teknik Otomotif): Jurusan ini mempelajari perawatan, perbaikan, dan teknologi kendaraan bermotor, dengan fokus pada keterampilan mekanik otomotif dan teknik mesin.'),
(11, 'Taman', 'photos/CSfsFhw3wJqAu0Um22VPLkwC4JLA95Mf3gezLqxV.jpg', 3, '2024-11-09 23:54:33', '1', '06:54:33', 1, ''),
(12, 'Lapangan', 'photos/z1EEt1sQSenWLWRyh1PSfnhWSN6btJMCWg72ikTi.jpg', 3, '2024-11-09 23:54:53', '1', '06:54:53', 1, ''),
(13, 'Lab RPL', 'photos/dM02vKLa5xIT3vfPN21Pi7MVdmU9LqizIvueOT0n.jpg', 3, '2024-11-09 23:55:21', '1', '06:55:21', 1, ''),
(14, 'Lab TKJ', 'photos/OuXFSqQ2ViGzqMlbHbjw9n8wdQ5kbRC1dnarOSc7.jpg', 3, '2024-11-09 23:55:37', '1', '06:55:37', 1, ''),
(15, 'Bengkel TKR', 'photos/c2dnRigfZ4HRu1R9MwPRAkpS9r3OJCDo3BO7VEne.jpg', 3, '2024-11-10 15:47:11', '1', '15:47:11', 1, 'nullable|string'),
(16, 'Bengkel Tp', 'photos/AcMh49y1qQa55Ks7Sqd3d8yhx5zB9O93f9068vaz.jpg', 3, '2024-11-10 14:22:01', '1', '14:22:01', 1, 'nullable|string|max:255'),
(17, 'Denah Smkn 4 Bogor', 'photos/eQC8Q3RAhUdGUppvBmH6gJEYNZNX5tyVlzYWdt7p.jpg', 3, '2024-11-10 15:40:25', '1', '15:40:25', 1, 'nullable|string'),
(20, 'Pramuka', 'photos/VP5heQuhj9kuEmaeJAOFh4F3FpjRjQ6B8oJoJ30M.jpg', 3, '2024-11-10 09:02:08', '1', '16:02:08', 4, NULL),
(21, 'Futsal', 'photos/j5S6DSn62QTcKJoLK1ehZrC4f9JBl6Qua7U5HYhY.jpg', 3, '2024-11-10 09:04:43', '1', '16:04:43', 4, NULL),
(22, 'Pramuka', 'photos/cmWdyJmO8UD51N2tMYi0pDf2ZBK3ZCTzwUflPPMs.jpg', 3, '2024-11-10 09:18:23', '1', '16:18:23', 4, 'asdfghj');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pbUdLmVqVv13UPBXJA2KJPZUchFh9w5qIQ1URoLV', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ1Uya2VvaXZyMTlwcVB1ODVkMUdrMGZ5T1h6NFdQUGdKNlBzME9QOSI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1731260266);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`, `status`) VALUES
(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$8H8XQVZ4uQqehAZtPwvPGup7zM5CZoAexqQW7sjFDyGdMynT6pPSO', NULL, '2024-10-27 18:35:44', '2024-11-03 23:57:32', 'profile_images/LXf0Ll8mImKBgNfG3OSBDRkkxsI5lqzJ08oj6O8u.png', 'active'),
(10, 'siti', 'siti@gmail.com', NULL, '$2y$12$SiuYT0gBQEXLAA6.vs8youJ3RUbDHbQCSkxlFeWxNi.ovNHht6wt6', NULL, '2024-11-07 01:19:25', '2024-11-07 01:23:35', 'profile_images/qqdvjObrefbPIqTy92IoJxoGZFthF4yYSAkZ0OcJ.jpg', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`kd_agenda`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`kd_info`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`kd_photo`),
  ADD KEY `kategori_id` (`galery_id`),
  ADD KEY `galery_id` (`galery_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `kd_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `kd_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `kd_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
