-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 05:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipetang`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_jalan`
--

CREATE TABLE `keterangan_jalan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` date NOT NULL,
  `valid_until` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_beda_nama`
--

CREATE TABLE `ket_beda_nama` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `new_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perbedaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_domisili_usaha_lokal`
--

CREATE TABLE `ket_domisili_usaha_lokal` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_domisili_usaha_luar`
--

CREATE TABLE `ket_domisili_usaha_luar` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `jenis_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bangunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_jamkesos`
--

CREATE TABLE `ket_jamkesos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `jamkesos_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_ktp`
--

CREATE TABLE `ket_ktp` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ket_ktp`
--

INSERT INTO `ket_ktp` (`id`, `user_id`, `surat_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'approved', '2022-12-23 12:40:49', '2022-12-23 12:42:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ket_lahir`
--

CREATE TABLE `ket_lahir` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `kondisi` enum('hidup','mati') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_kandungan` text COLLATE utf8mb4_unicode_ci,
  `pelapor_id` bigint DEFAULT NULL,
  `pelapor_hubungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` timestamp NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_mati`
--

CREATE TABLE `ket_mati` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `pelapor_id` bigint DEFAULT NULL,
  `pelapor_hubungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebab` text COLLATE utf8mb4_unicode_ci,
  `place` text COLLATE utf8mb4_unicode_ci,
  `waktu` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_nikah`
--

CREATE TABLE `ket_nikah` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ayah_id` bigint UNSIGNED NOT NULL,
  `ibu_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `pasangan_id` bigint UNSIGNED NOT NULL,
  `ayah_pasangan_id` bigint UNSIGNED NOT NULL,
  `ibu_pasangan_id` bigint UNSIGNED NOT NULL,
  `wali_id` bigint UNSIGNED NOT NULL,
  `pasangan_dulu_id` bigint DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mas_kawin` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_pengantar`
--

CREATE TABLE `ket_pengantar` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` date NOT NULL,
  `valid_until` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_pindah`
--

CREATE TABLE `ket_pindah` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pindah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_pindah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengikut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_pindah_penduduk`
--

CREATE TABLE `ket_pindah_penduduk` (
  `id` bigint UNSIGNED NOT NULL,
  `name_id` bigint UNSIGNED NOT NULL,
  `pindah_id` bigint UNSIGNED NOT NULL,
  `ktp_expired` date DEFAULT NULL,
  `shdk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_rujuk_cerai`
--

CREATE TABLE `ket_rujuk_cerai` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `ayah_id` bigint UNSIGNED NOT NULL,
  `pasangan_id` bigint UNSIGNED NOT NULL,
  `pasangan_ayah_id` bigint UNSIGNED NOT NULL,
  `type` enum('cerai','rujuk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_sktm`
--

CREATE TABLE `ket_sktm` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `anak_id` bigint UNSIGNED NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_usaha`
--

CREATE TABLE `ket_usaha` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `domisili_usaha_lokal_id` bigint UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` date NOT NULL,
  `valid_until` date NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_wali`
--

CREATE TABLE `ket_wali` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_24_145739_create_office_table', 1),
(6, '2022_11_24_150444_create_surat_table', 1),
(7, '2022_11_24_150515_create_perijinan_table', 1),
(8, '2022_11_24_151344_create_ket_beda_nama_table', 1),
(9, '2022_11_24_151547_create_ket_domisili_usaha_lokal_table', 1),
(10, '2022_11_24_151730_create_ket_domisili_usaha_luar_table', 1),
(11, '2022_11_24_152534_create_ket_jamkesos_table', 1),
(12, '2022_11_24_152717_create_ket_ktp_table', 1),
(13, '2022_11_24_152805_create_ket_lahir_table', 1),
(14, '2022_11_24_153417_create_ket_mati_table', 1),
(15, '2022_11_24_153713_create_mohon_nikah_table', 1),
(16, '2022_11_24_154115_create_ket_pengantar_table', 1),
(17, '2022_11_24_154334_create_ket_nikah_table', 1),
(18, '2022_11_24_154531_create_ket_pindah_table', 1),
(19, '2022_11_24_154745_create_ket_pindah_penduduk_table', 1),
(20, '2022_11_24_154837_create_ket_rujuk_cerai_table', 1),
(21, '2022_11_24_155117_create_ket_usaha_table', 1),
(22, '2022_11_24_155254_create_ket_wali_table', 1),
(23, '2022_11_24_155422_create_mohon_akta_table', 1),
(24, '2022_11_24_155458_create_mohon_kk_table', 1),
(25, '2022_11_24_155626_create_mohon_kk_penduduk_table', 1),
(26, '2022_11_24_155723_create_mohon_rubah_kk_table', 1),
(27, '2022_11_24_155856_create_ket_sktm_table', 1),
(28, '2022_11_24_155955_create_keterangan_jalan_table', 1),
(29, '2022_11_26_034659_create_mohon_beda_nama_table', 1),
(30, '2022_11_26_065302_add_foreign_key_to_users_and_surat_on_table_perijinan', 1),
(31, '2022_11_26_065436_add_foreign_key_to_users_and_surat_on_table_ket_beda_nama', 1),
(32, '2022_11_26_065613_add_foreign_key_to_users_and_surat_on_table_ket_domisili_usaha_lokal', 1),
(33, '2022_11_26_065751_add_foreign_key_to_users_and_surat_on_table_ket_domisili_usaha_luar', 1),
(34, '2022_11_26_065901_add_foreign_key_to_users_and_surat_on_table_ket_jamkesos', 1),
(35, '2022_11_26_070001_add_foreign_key_to_users_and_surat_on_table_ket_lahir', 1),
(36, '2022_11_26_070029_add_foreign_key_to_users_and_surat_on_table_ket_mati', 1),
(37, '2022_11_26_070100_add_foreign_key_to_users_and_surat_on_table_mohon_nikah', 1),
(38, '2022_11_26_070133_add_foreign_key_to_users_and_surat_on_table_ket_pengantar', 1),
(39, '2022_11_26_070156_add_foreign_key_to_users_and_surat_on_table_ket_nikah', 1),
(40, '2022_11_26_070219_add_foreign_key_to_users_and_surat_on_table_ket_pindah', 1),
(41, '2022_11_26_070243_add_foreign_key_to_users_and_surat_on_table_ket_pindah_penduduk', 1),
(42, '2022_11_26_070315_add_foreign_key_to_users_and_surat_on_table_ket_rujuk_cerai', 1),
(43, '2022_11_26_070338_add_foreign_key_to_users_and_surat_on_table_ket_usaha', 1),
(44, '2022_11_26_070409_add_foreign_key_to_users_and_surat_on_table_ket_wali', 1),
(45, '2022_11_26_070439_add_foreign_key_to_users_and_surat_on_table_mohon_akta', 1),
(46, '2022_11_26_070459_add_foreign_key_to_users_and_surat_on_table_mohon_kk', 1),
(47, '2022_11_26_071415_add_foreign_key_to_users_and_surat_on_table_mohon_rubah_kk', 1),
(48, '2022_11_26_071448_add_foreign_key_to_users_and_surat_on_table_ket_sktm', 1),
(49, '2022_11_26_071516_add_foreign_key_to_users_and_surat_on_table_keterangan_jalan', 1),
(50, '2022_11_26_071554_add_foreign_key_to_users_and_surat_on_table_mohon_beda_nama', 1),
(51, '2022_11_26_072800_add_foreign_key_to_users_and_surat_on_table_ket_ktp', 1),
(52, '2022_11_26_072841_add_foreign_key_to_users_and_surat_on_table_mohon_kk_penduduk', 1),
(53, '2022_11_26_073320_add_foreign_key_to_ket_beda_nama_on_mohon_beda_nama_table', 1),
(54, '2022_11_26_073607_add_foreign_key_to_ket_domisili_usaha_lokal_on_ket_usaha_table', 1),
(55, '2022_11_26_073809_add_foreign_key_to_ket_pindah_on_table_ket_pindah_penduduk', 1),
(56, '2022_11_26_075727_create_permission_tables', 1),
(57, '2022_12_10_133714_add_coloumn_ayah_and_ibu_on_table_mohon_akta', 1),
(58, '2022_12_10_151918_create_mohon_cerai_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mohon_akta`
--

CREATE TABLE `mohon_akta` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ayah_id` bigint UNSIGNED DEFAULT NULL,
  `ibu_id` bigint UNSIGNED DEFAULT NULL,
  `hari_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_beda_nama`
--

CREATE TABLE `mohon_beda_nama` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `ket_beda_nama_id` bigint UNSIGNED NOT NULL,
  `akta_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_cerai`
--

CREATE TABLE `mohon_cerai` (
  `id` bigint UNSIGNED NOT NULL,
  `suami_id` bigint UNSIGNED NOT NULL,
  `istri_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `sebab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_kk`
--

CREATE TABLE `mohon_kk` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_kk_penduduk`
--

CREATE TABLE `mohon_kk_penduduk` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `mohon_kk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_nikah`
--

CREATE TABLE `mohon_nikah` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `tgl_nikah` date NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mohon_rubah_kk`
--

CREATE TABLE `mohon_rubah_kk` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kades_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pamong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pamong_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_adat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_adat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `name`, `description`, `address`, `province`, `regency`, `sub_district`, `village`, `postal_code`, `camat`, `camat_id`, `kades`, `kades_id`, `pamong`, `pamong_id`, `ketua_adat`, `ketua_adat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KECAMATAN TANGGUNGHARJO', 'Kecamatan Tanggungharjo', 'Jl. Raya Tanggungharjo - Tegowanu Km.11', 'Jawa Tengah', 'Grobogan', 'Tanggungharjo', 'Tanggungharjo', '58167', 'Drs. H. M. Hidayat, M.Si', '196001011991031001', 'Drs. H. M. Hidayat, M.Si', '196001011991031001', 'Drs. H. M. Hidayat, M.Si', '196001011991031001', 'Drs. H. M. Hidayat, M.Si', '196001011991031001', '2021-05-01 07:00:00', '2022-12-23 12:25:35', NULL);

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
-- Table structure for table `perijinan`
--

CREATE TABLE `perijinan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `surat_id` bigint UNSIGNED NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-12-23 12:25:33', '2022-12-23 12:25:33'),
(2, 'user', 'web', '2022-12-23 12:25:33', '2022-12-23 12:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Surat Keterangan', '2022-12-23 12:25:34', '2022-12-23 12:25:34', NULL),
(2, 'Surat Permohonan', '2022-12-23 12:25:35', '2022-12-23 12:25:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `person_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','hidden') COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `married_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `family_id`, `email`, `password`, `name`, `phone`, `religion`, `gender`, `citizenship`, `address`, `blood_group`, `married_status`, `job`, `last_education`, `place_of_birth`, `date_of_birth`, `photo`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'admin@gmail.com', '$2y$10$qJ3xuPxcLs5caapOZ/l/Iu3xEq2z7uzyR8uoVyl5e86KPCKX6uhpq', 'Admin', '081234567890', 'Islam', 'male', 'Indonesia', 'Jl. Test', 'A', 'single', 'Programmer', 'S1', 'Jakarta', '1990-01-01', NULL, NULL, NULL, '2022-12-23 12:25:34', '2022-12-23 12:25:34', NULL),
(2, NULL, NULL, 'user@gmail.com', '$2y$10$kA1xu0NnJ4ES1o8w5g9GKuZmvE5iZmuCT4eAUOZiWDqQSjwCMV54y', 'User', '081234567890', 'Islam', 'male', 'Indonesia', 'Jl. Test', 'A', 'single', 'Programmer', 'S1', 'Jakarta', '1990-01-01', NULL, NULL, NULL, '2022-12-23 12:25:34', '2022-12-23 12:25:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keterangan_jalan`
--
ALTER TABLE `keterangan_jalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keterangan_jalan_user_id_foreign` (`user_id`),
  ADD KEY `keterangan_jalan_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_beda_nama`
--
ALTER TABLE `ket_beda_nama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_beda_nama_user_id_foreign` (`user_id`),
  ADD KEY `ket_beda_nama_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_domisili_usaha_lokal`
--
ALTER TABLE `ket_domisili_usaha_lokal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_domisili_usaha_lokal_user_id_foreign` (`user_id`),
  ADD KEY `ket_domisili_usaha_lokal_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_domisili_usaha_luar`
--
ALTER TABLE `ket_domisili_usaha_luar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_domisili_usaha_luar_user_id_foreign` (`user_id`),
  ADD KEY `ket_domisili_usaha_luar_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_jamkesos`
--
ALTER TABLE `ket_jamkesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_jamkesos_user_id_foreign` (`user_id`),
  ADD KEY `ket_jamkesos_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_ktp`
--
ALTER TABLE `ket_ktp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_ktp_user_id_foreign` (`user_id`),
  ADD KEY `ket_ktp_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_lahir`
--
ALTER TABLE `ket_lahir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_lahir_user_id_foreign` (`user_id`),
  ADD KEY `ket_lahir_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_mati`
--
ALTER TABLE `ket_mati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_mati_user_id_foreign` (`user_id`),
  ADD KEY `ket_mati_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_nikah`
--
ALTER TABLE `ket_nikah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_nikah_user_id_foreign` (`user_id`),
  ADD KEY `ket_nikah_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_pengantar`
--
ALTER TABLE `ket_pengantar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_pengantar_user_id_foreign` (`user_id`),
  ADD KEY `ket_pengantar_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_pindah`
--
ALTER TABLE `ket_pindah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_pindah_user_id_foreign` (`user_id`),
  ADD KEY `ket_pindah_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_pindah_penduduk`
--
ALTER TABLE `ket_pindah_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_pindah_penduduk_name_id_foreign` (`name_id`),
  ADD KEY `ket_pindah_penduduk_pindah_id_foreign` (`pindah_id`);

--
-- Indexes for table `ket_rujuk_cerai`
--
ALTER TABLE `ket_rujuk_cerai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_rujuk_cerai_user_id_foreign` (`user_id`),
  ADD KEY `ket_rujuk_cerai_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_sktm`
--
ALTER TABLE `ket_sktm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_sktm_user_id_foreign` (`user_id`),
  ADD KEY `ket_sktm_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `ket_usaha`
--
ALTER TABLE `ket_usaha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_usaha_user_id_foreign` (`user_id`),
  ADD KEY `ket_usaha_domisili_usaha_lokal_id_foreign` (`domisili_usaha_lokal_id`);

--
-- Indexes for table `ket_wali`
--
ALTER TABLE `ket_wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ket_wali_user_id_foreign` (`user_id`),
  ADD KEY `ket_wali_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mohon_akta`
--
ALTER TABLE `mohon_akta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_akta_user_id_foreign` (`user_id`),
  ADD KEY `mohon_akta_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `mohon_beda_nama`
--
ALTER TABLE `mohon_beda_nama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_beda_nama_user_id_foreign` (`user_id`),
  ADD KEY `mohon_beda_nama_surat_id_foreign` (`surat_id`),
  ADD KEY `mohon_beda_nama_ket_beda_nama_id_foreign` (`ket_beda_nama_id`);

--
-- Indexes for table `mohon_cerai`
--
ALTER TABLE `mohon_cerai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_cerai_suami_id_foreign` (`suami_id`),
  ADD KEY `mohon_cerai_istri_id_foreign` (`istri_id`),
  ADD KEY `mohon_cerai_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `mohon_kk`
--
ALTER TABLE `mohon_kk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_kk_user_id_foreign` (`user_id`),
  ADD KEY `mohon_kk_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `mohon_kk_penduduk`
--
ALTER TABLE `mohon_kk_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_kk_penduduk_user_id_foreign` (`user_id`),
  ADD KEY `mohon_kk_penduduk_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `mohon_nikah`
--
ALTER TABLE `mohon_nikah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_nikah_user_id_foreign` (`user_id`),
  ADD KEY `mohon_nikah_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `mohon_rubah_kk`
--
ALTER TABLE `mohon_rubah_kk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mohon_rubah_kk_user_id_foreign` (`user_id`),
  ADD KEY `mohon_rubah_kk_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perijinan`
--
ALTER TABLE `perijinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perijinan_user_id_foreign` (`user_id`),
  ADD KEY `perijinan_surat_id_foreign` (`surat_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keterangan_jalan`
--
ALTER TABLE `keterangan_jalan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_beda_nama`
--
ALTER TABLE `ket_beda_nama`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_domisili_usaha_lokal`
--
ALTER TABLE `ket_domisili_usaha_lokal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_domisili_usaha_luar`
--
ALTER TABLE `ket_domisili_usaha_luar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_jamkesos`
--
ALTER TABLE `ket_jamkesos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_ktp`
--
ALTER TABLE `ket_ktp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ket_lahir`
--
ALTER TABLE `ket_lahir`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_mati`
--
ALTER TABLE `ket_mati`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_nikah`
--
ALTER TABLE `ket_nikah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_pengantar`
--
ALTER TABLE `ket_pengantar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_pindah`
--
ALTER TABLE `ket_pindah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_pindah_penduduk`
--
ALTER TABLE `ket_pindah_penduduk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_rujuk_cerai`
--
ALTER TABLE `ket_rujuk_cerai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_sktm`
--
ALTER TABLE `ket_sktm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_usaha`
--
ALTER TABLE `ket_usaha`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ket_wali`
--
ALTER TABLE `ket_wali`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mohon_akta`
--
ALTER TABLE `mohon_akta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_beda_nama`
--
ALTER TABLE `mohon_beda_nama`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_cerai`
--
ALTER TABLE `mohon_cerai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_kk`
--
ALTER TABLE `mohon_kk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_kk_penduduk`
--
ALTER TABLE `mohon_kk_penduduk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_nikah`
--
ALTER TABLE `mohon_nikah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mohon_rubah_kk`
--
ALTER TABLE `mohon_rubah_kk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perijinan`
--
ALTER TABLE `perijinan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keterangan_jalan`
--
ALTER TABLE `keterangan_jalan`
  ADD CONSTRAINT `keterangan_jalan_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `keterangan_jalan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_beda_nama`
--
ALTER TABLE `ket_beda_nama`
  ADD CONSTRAINT `ket_beda_nama_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_beda_nama_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_domisili_usaha_lokal`
--
ALTER TABLE `ket_domisili_usaha_lokal`
  ADD CONSTRAINT `ket_domisili_usaha_lokal_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_domisili_usaha_lokal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_domisili_usaha_luar`
--
ALTER TABLE `ket_domisili_usaha_luar`
  ADD CONSTRAINT `ket_domisili_usaha_luar_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_domisili_usaha_luar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_jamkesos`
--
ALTER TABLE `ket_jamkesos`
  ADD CONSTRAINT `ket_jamkesos_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_jamkesos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_ktp`
--
ALTER TABLE `ket_ktp`
  ADD CONSTRAINT `ket_ktp_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_ktp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_lahir`
--
ALTER TABLE `ket_lahir`
  ADD CONSTRAINT `ket_lahir_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_lahir_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_mati`
--
ALTER TABLE `ket_mati`
  ADD CONSTRAINT `ket_mati_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_mati_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_nikah`
--
ALTER TABLE `ket_nikah`
  ADD CONSTRAINT `ket_nikah_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_nikah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_pengantar`
--
ALTER TABLE `ket_pengantar`
  ADD CONSTRAINT `ket_pengantar_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_pengantar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_pindah`
--
ALTER TABLE `ket_pindah`
  ADD CONSTRAINT `ket_pindah_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_pindah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_pindah_penduduk`
--
ALTER TABLE `ket_pindah_penduduk`
  ADD CONSTRAINT `ket_pindah_penduduk_name_id_foreign` FOREIGN KEY (`name_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ket_pindah_penduduk_pindah_id_foreign` FOREIGN KEY (`pindah_id`) REFERENCES `ket_pindah` (`id`);

--
-- Constraints for table `ket_rujuk_cerai`
--
ALTER TABLE `ket_rujuk_cerai`
  ADD CONSTRAINT `ket_rujuk_cerai_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_rujuk_cerai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_sktm`
--
ALTER TABLE `ket_sktm`
  ADD CONSTRAINT `ket_sktm_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_sktm_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_usaha`
--
ALTER TABLE `ket_usaha`
  ADD CONSTRAINT `ket_usaha_domisili_usaha_lokal_id_foreign` FOREIGN KEY (`domisili_usaha_lokal_id`) REFERENCES `ket_domisili_usaha_lokal` (`id`),
  ADD CONSTRAINT `ket_usaha_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ket_wali`
--
ALTER TABLE `ket_wali`
  ADD CONSTRAINT `ket_wali_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `ket_wali_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mohon_akta`
--
ALTER TABLE `mohon_akta`
  ADD CONSTRAINT `mohon_akta_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_akta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mohon_beda_nama`
--
ALTER TABLE `mohon_beda_nama`
  ADD CONSTRAINT `mohon_beda_nama_ket_beda_nama_id_foreign` FOREIGN KEY (`ket_beda_nama_id`) REFERENCES `ket_beda_nama` (`id`),
  ADD CONSTRAINT `mohon_beda_nama_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_beda_nama_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mohon_cerai`
--
ALTER TABLE `mohon_cerai`
  ADD CONSTRAINT `mohon_cerai_istri_id_foreign` FOREIGN KEY (`istri_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mohon_cerai_suami_id_foreign` FOREIGN KEY (`suami_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mohon_cerai_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`);

--
-- Constraints for table `mohon_kk`
--
ALTER TABLE `mohon_kk`
  ADD CONSTRAINT `mohon_kk_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_kk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mohon_kk_penduduk`
--
ALTER TABLE `mohon_kk_penduduk`
  ADD CONSTRAINT `mohon_kk_penduduk_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_kk_penduduk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mohon_nikah`
--
ALTER TABLE `mohon_nikah`
  ADD CONSTRAINT `mohon_nikah_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_nikah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mohon_rubah_kk`
--
ALTER TABLE `mohon_rubah_kk`
  ADD CONSTRAINT `mohon_rubah_kk_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `mohon_rubah_kk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `perijinan`
--
ALTER TABLE `perijinan`
  ADD CONSTRAINT `perijinan_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `perijinan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
