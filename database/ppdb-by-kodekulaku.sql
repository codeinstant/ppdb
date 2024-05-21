-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2024 pada 10.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb-by-kodekulaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_kuis`
--

CREATE TABLE `hasil_kuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftar_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_kuis`
--

INSERT INTO `hasil_kuis` (`id`, `pendaftar_id`, `jawaban_id`, `created_at`, `updated_at`) VALUES
(1, 13, 1, '2024-05-17 14:47:41', '2024-05-17 14:47:41'),
(2, 13, 3, '2024-05-17 14:47:41', '2024-05-17 14:47:41'),
(3, 1, 1, '2024-05-17 15:03:09', '2024-05-17 15:03:09'),
(4, 1, 4, '2024-05-17 15:03:09', '2024-05-17 15:03:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_kuis`
--

CREATE TABLE `jawaban_kuis` (
  `id` bigint(20) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `jawaban` varchar(128) NOT NULL,
  `kunci` enum('benar','salah') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban_kuis`
--

INSERT INTO `jawaban_kuis` (`id`, `soal_id`, `jawaban`, `kunci`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apa Kek', 'benar', NULL, '2024-05-16 02:12:40'),
(2, 1, 'ga Tau', 'salah', NULL, NULL),
(3, 2, 'ini ya', 'benar', '2024-05-15 17:50:11', '2024-05-15 17:50:11'),
(4, 2, 'ini tidakk', 'salah', '2024-05-15 17:50:29', '2024-05-15 17:56:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2024-05-13 16:13:01', '2024-05-14 15:35:43'),
(2, 'IPS', '2024-05-13 16:13:17', '2024-05-14 15:35:54'),
(3, 'Sastra', '2024-05-14 15:40:11', '2024-05-14 15:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_09_08_091448_create_sekolah_table', 1),
(4, '2022_09_08_144016_create_roles_table', 1),
(5, '2022_09_08_144224_create_users_table', 1),
(6, '2022_09_08_144303_create_pendaftar_table', 1),
(7, '2022_09_12_135729_create_persyaratan_table', 1),
(8, '2022_09_12_135742_create_tentang_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penerimaan_id` bigint(20) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` bigint(20) DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ipa` varchar(10) DEFAULT NULL,
  `bhs_indo` varchar(10) DEFAULT NULL,
  `bhs_inggris` varchar(10) DEFAULT NULL,
  `matematika` varchar(10) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `ijasah` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` text DEFAULT NULL,
  `no_hp_ortu` bigint(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ortu` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `user_id`, `penerimaan_id`, `nik`, `jenis_kelamin`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `jurusan_id`, `ipa`, `bhs_indo`, `bhs_inggris`, `matematika`, `foto`, `ijasah`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `no_hp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ortu`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '122', 'Laki-Laki', 'asdd', 'wewe', 'fgh', 'wewe', 'muba', '2024-05-15', 123, 2, '88', '88', '88', '88', 'foto/WG8zf2j3ZzzQOEvBjTzaSEHjdmrUNevPVEHJX6eb.jpg', 'ijasah/mWRKBtFjNY7xjT3iRsMsvSzzkU2c8EZBmmDn2D1c.jpg', 'mijan', 'rakun', 'ad', 123, 'tani', 'ibu rumah tangga', '2', 6, '2024-05-15 14:59:41', '2024-05-19 07:51:32'),
(13, 40, 10, '1608092201000003', 'Laki-Laki', 'Ds rejosari', 'Belitang', 'Oku Timur', 'Sumsel', 'Bekasi', '2000-01-22', 82371210055, 1, '100', '100', '100', '100', 'foto/BjhU26cswl0GUPKFx0grQuu1awwme6szRa3214yf.jpg', 'ijasah/r6Uve60LTeRhp7o3FPJwmq3bvg4iuuOFYDhUHJJt.jpg', 'Edi', 'Nurma', 'Bandung', 85758852888, 'Wirausaha', 'Almh.', '2000000', 5, '2024-05-16 04:56:26', '2024-05-19 07:51:39'),
(19, 41, 10, '13', 'Perempuan', 'efw', 'efw', 'efw', 'efw', 'efw', '2024-05-08', 12, 2, '21', '21', '21', '21', 'foto/zG9aXO4z59AtkZU6xrCD0XfCLBxdnCzW7xj1YQl9.png', 'ijasah/ZD8FyCkw7DnKdZ1YK6wFdWGeSQ9SiNLHxSEllKCU.jpg', 'we', 'wqe', 'dfd', 12, 'dew', 'wed', '12', 1, '2024-05-19 16:53:39', '2024-05-20 23:38:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` bigint(20) NOT NULL,
  `tahun_angkatan` smallint(6) NOT NULL,
  `gelombang` smallint(6) NOT NULL,
  `kuota` smallint(6) NOT NULL,
  `buka` date NOT NULL,
  `tutup` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `tahun_angkatan`, `gelombang`, `kuota`, `buka`, `tutup`, `created_at`, `updated_at`) VALUES
(1, 2024, 1, 100, '2024-05-05', '2024-05-15', NULL, '2024-05-16 02:36:53'),
(10, 2025, 2, 200, '2024-05-19', '2024-07-31', '2024-05-16 02:35:51', '2024-05-19 08:14:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Minimal Nilai Matematika 7,5', '2024-05-13 16:14:25', '2024-05-13 16:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(225) NOT NULL,
  `nama_kpl_sekolah` varchar(225) NOT NULL,
  `nip_kpl_sekolah` varchar(225) NOT NULL,
  `ttd_kpl_sekolah` varchar(225) NOT NULL,
  `nama_ketua_ppdb` varchar(225) NOT NULL,
  `nip_ppdb` varchar(225) NOT NULL,
  `alamat_sekolah` varchar(225) NOT NULL,
  `akreditasi` varchar(3) NOT NULL,
  `sejarah` text NOT NULL,
  `tel_sekolah` varchar(225) NOT NULL,
  `web_sekolah` varchar(225) NOT NULL,
  `email_sekolah` varchar(225) NOT NULL,
  `logo_sekolah` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `nama_sekolah`, `nama_kpl_sekolah`, `nip_kpl_sekolah`, `ttd_kpl_sekolah`, `nama_ketua_ppdb`, `nip_ppdb`, `alamat_sekolah`, `akreditasi`, `sejarah`, `tel_sekolah`, `web_sekolah`, `email_sekolah`, `logo_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'Sma 12 pro Max', 'Ali Nurdin, MM', '73489894588547', 'asfaSFRDERF', 'Jailani', '343837865346563845', 'JL. Karang Anyer jay', 'A+', 'Lorem Ipsum is simply dummy text of the printing and typesetting                                                             industry. Lorem Ipsum                                                             has been the industry\'s standard dummy text ever since the                                                             1500s, when an unknown                                                             printer took a galley of type and scrambled it to make a type                                                             specimen book. It has                                                             survived not only five centuries, but also the leap into                                                             electronic typesetting,                                                             remaining essentially unchanged. It was popularised in the 1960s                                                             with the release of                                                             Letraset sheets containing Lorem Ipsum passages, and more                                                             recently with desktop                                                             publishing software like Aldus PageMaker including versions of                                                             Lorem Ipsum', '08373526725373', 'www.12promax.co', '12promax@gmail.co', 'logo_sekolah/NIv97N0OkRQDkz0fzGdx1w36fhnRSobuYx66jgrJ.jpg', '2024-05-14 15:27:50', '2024-05-19 18:17:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'panitia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'kepala tu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'siswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_kuis`
--

CREATE TABLE `soal_kuis` (
  `id` bigint(20) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `tipe_soal` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soal_kuis`
--

INSERT INTO `soal_kuis` (`id`, `soal`, `tipe_soal`, `created_at`, `updated_at`) VALUES
(1, 'apaan tuh?', 'pilgan', NULL, NULL),
(2, 'Apa ini', 'PILGAN', '2024-05-15 17:08:18', '2024-05-15 17:13:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Panitia PPDB', 'panitia@gmail.com', NULL, '$2y$10$8API87LpScPtZZHJ3ami/O43bfg1vHw0cxH447mEBrZnRpl3DSD5q', 1, NULL, '2024-05-13 15:21:13', '2024-05-13 15:21:13'),
(2, 'Kepala TU', 'kepalatu@gmail.com', NULL, '$2y$10$QSvMVa6ZiYz8zzwPSubIeOxcI8iWZRVUE7dswSaW4bcR7.YbJwWC.', 2, NULL, '2024-05-13 16:05:55', '2024-05-15 05:11:01'),
(10, 'rifki', 'rifki@gmail.com', NULL, '$2y$10$SLQBrHziAkkvUnf7r2Wch.h2.7UrVbingNvSFYannYblpk0FMrmby', 3, NULL, '2024-05-15 08:53:11', '2024-05-15 08:53:11'),
(39, 'siswa 1', 'siswa1@gmail.com', NULL, '$2y$10$iIjB0ocMF0YK7jzRvVYQteFgVNv8EK6Qz6At8VlpOLWymOicj/hJm', 3, NULL, '2024-05-16 00:23:33', '2024-05-16 00:23:33'),
(40, 'Ubaidilah Al Bayu', 'ubaidilahalbayu@gmail.com', NULL, '$2y$10$O8tJurYhnt5Tew1dIiegT.ufxWoVh5nsWT2/P7grmMVddzCaWApiG', 3, NULL, '2024-05-16 04:25:35', '2024-05-18 21:35:02'),
(41, 'Udin Gambut', 'din@gmail.com', NULL, '$2y$10$NZ4GtJ.LfMM5xgkREQcbze89uUCnR3i6g/L.lsuy57P3HM19MAQvm', 3, NULL, '2024-05-19 16:03:56', '2024-05-20 23:38:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_jawaban_id_foreign` (`jawaban_id`),
  ADD KEY `hasil_pendaftar_id_foreign` (`pendaftar_id`);

--
-- Indeks untuk tabel `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_jawaban_id_foreign` (`soal_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_user_id_foreign` (`user_id`),
  ADD KEY `pendaftar_sekolah_id_foreign` (`jurusan_id`),
  ADD KEY `pendaftar_penerimaan_id_foreign` (`penerimaan_id`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_kuis`
--
ALTER TABLE `soal_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `soal_kuis`
--
ALTER TABLE `soal_kuis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD CONSTRAINT `hasil_jawaban_id_foreign` FOREIGN KEY (`jawaban_id`) REFERENCES `jawaban_kuis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_pendaftar_id_foreign` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD CONSTRAINT `soal_jawaban_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `soal_kuis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_penerimaan_id_foreign` FOREIGN KEY (`penerimaan_id`) REFERENCES `penerimaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftar_sekolah_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `pendaftar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
