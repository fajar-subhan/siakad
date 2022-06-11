-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6449
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table siakad.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table siakad.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.migrations: ~28 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_02_24_031120_create_permission_tables', 1),
	(5, '2022_03_01_140039_create_mst_user_log_activity_table', 1),
	(6, '2022_03_09_160949_create_mst_menu_master_table', 1),
	(7, '2022_03_09_180540_create_mst_menu_detail_table', 1),
	(8, '2022_03_10_043526_create_ref_icon_table', 1),
	(10, '2022_03_11_071559_create_ref_role_menu_master_table', 1),
	(11, '2022_03_11_071559_create_ref_role_menu_detail_table', 2),
	(29, '2022_04_12_032754_create_mst_room_table', 3),
	(30, '2022_04_22_025622_create_subject_table', 3),
	(31, '2022_04_23_211721_create_mst_faculty_table', 3),
	(32, '2022_04_25_160850_create_mst_major_table', 3),
	(33, '2022_04_26_054327_create_mst_curriculum_table', 3),
	(34, '2022_04_27_105018_create_semester_table', 4),
	(38, '2022_05_01_112309_create_mst_academic_year_table', 5),
	(45, '2022_05_05_162656_create_mst_college_student_table', 6),
	(46, '2022_05_09_035228_create_mst_lecturer_table', 7),
	(47, '2022_05_10_060503_create_mst_course_schedule_table', 8),
	(48, '2022_05_10_064741_create_mst_lecture_hours_table', 8),
	(54, '2022_05_13_035206_create_mst_campus_info', 9),
	(57, '2022_05_17_134745_create_mst_krs_table', 10),
	(58, '2022_05_19_130550_create_mst_khs_table', 11),
	(59, '2022_05_25_073317_create_attendance_history_table', 12),
	(60, '2022_05_25_073816_create_ref_status_presence_table', 12),
	(61, '2022_05_25_104238_create_mst_presence_table', 13),
	(62, '2022_05_30_151123_create_ref_college_level_table', 14);

-- Dumping structure for table siakad.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table siakad.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.model_has_roles: ~14 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 2),
	(2, 'App\\User', 31),
	(2, 'App\\User', 32),
	(2, 'App\\User', 35),
	(2, 'App\\User', 36),
	(2, 'App\\User', 38),
	(2, 'App\\User', 39),
	(2, 'App\\User', 40),
	(2, 'App\\User', 41),
	(2, 'App\\User', 43),
	(2, 'App\\User', 44),
	(3, 'App\\User', 45),
	(3, 'App\\User', 46);

-- Dumping structure for table siakad.mst_academic_year
CREATE TABLE IF NOT EXISTS `mst_academic_year` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date_study` date NOT NULL,
  `end_date_study` date NOT NULL,
  `start_date_uts` date DEFAULT NULL,
  `end_date_uts` date DEFAULT NULL,
  `start_date_uas` date DEFAULT NULL,
  `end_date_uas` date DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_academic_year_code_unique` (`code`),
  KEY `mst_academic_year_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_academic_year: ~2 rows (approximately)
INSERT INTO `mst_academic_year` (`id`, `code`, `name`, `start_date_study`, `end_date_study`, `start_date_uts`, `end_date_uts`, `start_date_uas`, `end_date_uas`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(11, '202201', '2021 - 2022 Semester Ganjil', '2022-05-01', '2022-05-31', '2022-05-01', '2022-05-23', '2022-05-01', '2022-05-04', 1, 1, '2022-05-30 07:59:17', '2022-05-30 07:59:17'),
	(12, '202202', '2021 - 2022 Semester Genap', '2022-06-01', '2022-06-30', '2022-06-08', '2022-06-16', '2022-06-14', '2022-06-22', 1, 2, '2022-05-30 08:00:16', '2022-05-30 08:00:16');

-- Dumping structure for table siakad.mst_attendence_history
CREATE TABLE IF NOT EXISTS `mst_attendence_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `presence_id` int(11) NOT NULL,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_presence_id` int(11) NOT NULL,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_to` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_attendence_history_presence_id_index` (`presence_id`),
  KEY `mst_attendence_history_nim_index` (`nim`),
  KEY `mst_attendence_history_status_presence_id_index` (`status_presence_id`),
  KEY `subject_code` (`subject_code`),
  KEY `nidn` (`nidn`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_attendence_history: ~9 rows (approximately)
INSERT INTO `mst_attendence_history` (`id`, `presence_id`, `nim`, `status_presence_id`, `subject_code`, `nidn`, `meeting_to`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, '202043500578', 1, 'WP01', '11281085011', 1, 1, 1, '2022-06-05 05:59:47', '2022-06-05 05:59:47'),
	(2, 1, '202043201923', 2, 'WP01', '11281085011', 1, 1, 1, '2022-06-05 05:59:58', '2022-06-05 05:59:58'),
	(3, 2, '202043500578', 1, 'MP01', '11281085011', 1, 1, 1, '2022-06-05 06:00:58', '2022-06-05 06:00:58'),
	(4, 3, '202043500578', 3, 'WP01', '11281085011', 2, 1, 1, '2022-06-05 06:01:40', '2022-06-05 06:01:40'),
	(5, 3, '202043201923', 1, 'WP01', '11281085011', 2, 1, 1, '2022-06-05 06:01:44', '2022-06-05 06:01:44'),
	(6, 4, '202043500578', 1, 'MP01', '11281085011', 2, 1, 1, '2022-06-05 06:09:43', '2022-06-05 06:09:43'),
	(7, 5, '202043500578', 2, 'PBD01', '11281085011', 1, 1, 1, '2022-06-05 06:10:04', '2022-06-05 06:10:04'),
	(8, 6, '202043500578', 2, 'PBD01', '11281085011', 2, 1, 1, '2022-06-05 06:25:33', '2022-06-05 06:25:33'),
	(9, 7, '202043500578', 1, 'DB01', '11281085011', 1, 1, 1, '2022-06-05 06:39:29', '2022-06-05 06:39:29');

-- Dumping structure for table siakad.mst_campus_info
CREATE TABLE IF NOT EXISTS `mst_campus_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_campus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_campus_info_created_by_index` (`created_by`),
  KEY `mst_campus_info_updated_by_index` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_campus_info: ~0 rows (approximately)

-- Dumping structure for table siakad.mst_college_student
CREATE TABLE IF NOT EXISTS `mst_college_student` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` int(11) NOT NULL,
  `academic_year_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_college_student_nim_unique` (`nim`),
  UNIQUE KEY `email` (`email`),
  KEY `mst_college_student_nim_index` (`nim`),
  KEY `mst_college_student_major_code_index` (`major_code`),
  KEY `mst_college_student_created_by_index` (`created_by`),
  KEY `mst_college_student_updated_by_index` (`updated_by`),
  KEY `mst_college_student_semester_id_index` (`semester_id`) USING BTREE,
  KEY `mst_college_student_academic_code_index` (`academic_year_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_college_student: ~11 rows (approximately)
INSERT INTO `mst_college_student` (`id`, `nim`, `name`, `email`, `major_code`, `semester_id`, `academic_year_code`, `address`, `created_by`, `updated_by`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(15, '202043500578', 'Fajar Subhan', 'fajarsubhan@gmail.com', 'IFD3', 5, '202201', 'Jl.Agung Raya II,RT05/RT07 Lenteng Agung,Jakarta Selatan', 1, 1, 1, 1, '2022-05-09 02:30:32', '2022-06-01 05:39:32'),
	(16, '202034592092', 'Fakih Sumawa', 'fakih@gmail.com', 'IFD3', 4, '202201', 'Gedung Menara 165 Lantai 4 Jalan TB SIMATUPANG KAV 1', 1, 1, 1, 2, '2022-05-09 05:34:57', '2022-06-01 05:40:35'),
	(17, '202043201923', 'Siska Sari', 'siska@gmail.com', 'PMTK', 4, '202201', 'Jl.Sudirman No 60', 1, 1, 1, 3, '2022-05-09 05:54:09', '2022-06-01 05:41:48'),
	(18, '293923892212', 'Dina Andriani', 'dina@gmail.com', 'IFD3', 3, '202201', 'Gedung Menara 165 Lantai 4 Jalan TB SIMATUPANG KAV 1', 1, 1, 1, 4, '2022-05-29 06:56:14', '2022-06-01 05:42:16'),
	(19, '202043500537', 'Uci Lestari', 'uci@gmail.com', 'IFD3', 1, '202201', 'Gedung Menara 165 Lantai 4 Jalan TB SIMATUPANG KAV 1', 1, 0, 1, 5, '2022-05-30 08:59:09', '2022-05-30 08:59:09'),
	(20, '202043500122', 'Rian Apriansyah', 'rian@gmail.com', 'IFD3', 1, '202201', 'Jl.Medan Merdeka Barat No 60 Rt05/07', 1, 0, 1, 6, '2022-05-30 09:00:22', '2022-05-30 09:00:22'),
	(21, '202043500145', 'Rudi Hermawan', 'rudi@gmail.com', 'IFD3', 1, '202201', 'JL.Sawangan Raya No 60 RT06/08', 1, 0, 1, 7, '2022-05-30 09:01:05', '2022-05-30 09:01:05'),
	(22, '202043500865', 'Rio Satrio', 'rio@gmail.com', 'IFD3', 1, '202201', 'JL.Sudirman No 70 Jakarta Selatan', 1, 0, 1, 8, '2022-05-30 09:01:39', '2022-05-30 09:01:39'),
	(23, '202043500961', 'Dian Putri', 'dian@gmail.com', 'IFD3', 1, '202201', 'JL.Pandawa 3,Lenteng Agung', 1, 0, 1, 9, '2022-05-30 09:02:11', '2022-05-30 09:02:11'),
	(24, '293923892345', 'Dian Putri', 'dian_putri@gmail.com', 'IFD3', 1, '202201', 'JL.Setu Babakan RT05/07', 1, 0, 1, 10, '2022-05-30 09:16:22', '2022-05-30 09:16:22'),
	(25, '293923893145', 'Leni Apriani', 'leni@gmail.com', 'IFD3', 1, '202201', 'Jl.Menteng Atas,Jakarta Selatan', 1, 0, 1, 11, '2022-05-30 09:17:08', '2022-05-30 09:17:08');

-- Dumping structure for table siakad.mst_course_schedule
CREATE TABLE IF NOT EXISTS `mst_course_schedule` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours_id` int(11) NOT NULL,
  `major_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_course_schedule_subject_code_index` (`subject_code`),
  KEY `mst_course_schedule_nidn_index` (`nidn`),
  KEY `mst_course_schedule_hours_id_index` (`hours_id`),
  KEY `mst_course_schedule_room_code_index` (`room_code`),
  KEY `mst_course_schedule_created_by_index` (`created_by`),
  KEY `mst_course_schedule_updated_by_index` (`updated_by`),
  KEY `major_code` (`major_code`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_course_schedule: ~7 rows (approximately)
INSERT INTO `mst_course_schedule` (`id`, `day`, `subject_code`, `nidn`, `hours_id`, `major_code`, `room_code`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(22, 'Senin', 'PBD01', '11281085011', 1, 'IFD3', 'LT101', 1, 1, 1, 1, '2022-05-30 18:11:51', '2022-05-31 00:01:56'),
	(23, 'Senin', 'MP01', '11281085011', 2, 'IFD3', 'RLBK01', 1, 2, 1, 0, '2022-05-30 18:12:46', '2022-05-30 18:12:46'),
	(24, 'Selasa', 'S001', '11281085011', 1, 'IFD3', 'RLBK01', 1, 3, 1, 0, '2022-05-30 18:13:10', '2022-05-30 18:13:10'),
	(25, 'Rabu', 'DB01', '11281085011', 2, 'IFD3', 'RLBK01', 1, 4, 1, 0, '2022-05-30 18:14:27', '2022-05-30 18:14:27'),
	(26, 'Kamis', 'KWS1', '11281085011', 1, 'PMTK', 'RLBK01', 1, 5, 1, 1, '2022-05-30 18:14:58', '2022-05-30 18:16:07'),
	(27, 'Kamis', 'RPL1', '11281085011', 2, 'IFD3', 'RLBK01', 1, 6, 1, 1, '2022-05-30 18:15:14', '2022-05-30 18:16:33'),
	(28, 'Jumat', 'WP01', '11281085011', 1, 'IFD3', 'RLBK01', 1, 7, 1, 0, '2022-06-01 08:27:45', '2022-06-01 08:27:45');

-- Dumping structure for table siakad.mst_curriculum
CREATE TABLE IF NOT EXISTS `mst_curriculum` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_major` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jurusan',
  `code_subject` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'matakuliah',
  `semester` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_curriculum_code_major_index` (`code_major`),
  KEY `mst_curriculum_code_subject_index` (`code_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_curriculum: ~6 rows (approximately)
INSERT INTO `mst_curriculum` (`id`, `code_major`, `code_subject`, `semester`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(65, 'IFD3', 'WP01', 1, 1, 1, '2022-05-30 10:49:46', '2022-05-30 10:49:46'),
	(66, 'IFD3', 'KWS1', 1, 1, 2, '2022-05-30 10:50:09', '2022-05-30 10:50:09'),
	(67, 'IFD3', 'RPL1', 1, 1, 3, '2022-05-30 10:50:17', '2022-05-30 10:50:17'),
	(68, 'IFD3', 'MP01', 1, 1, 4, '2022-05-30 10:50:23', '2022-05-30 10:50:23'),
	(69, 'IFD3', 'S001', 1, 1, 5, '2022-05-30 10:50:39', '2022-05-30 10:50:39'),
	(70, 'IFD3', 'DB01', 1, 1, 6, '2022-05-30 10:50:56', '2022-05-30 10:50:56');

-- Dumping structure for table siakad.mst_faculty
CREATE TABLE IF NOT EXISTS `mst_faculty` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_faculty_code_unique` (`code`),
  KEY `mst_faculty_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_faculty: ~2 rows (approximately)
INSERT INTO `mst_faculty` (`id`, `code`, `name`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(3, 'IFK', 'Ilmu Komputer Dan Informatika', 1, 1, '2022-05-30 08:04:20', '2022-05-30 08:04:20'),
	(5, 'FIMPA', 'Fakultas Matematika dan IPA', 1, 2, '2022-05-30 08:51:14', '2022-05-30 08:51:14');

-- Dumping structure for table siakad.mst_khs
CREATE TABLE IF NOT EXISTS `mst_khs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_uts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_uas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_khs_nim_index` (`nim`),
  KEY `mst_khs_nidn_index` (`nidn`),
  KEY `mst_khs_subject_code_index` (`subject_code`),
  KEY `mst_khs_semester_id_index` (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_khs: ~7 rows (approximately)
INSERT INTO `mst_khs` (`id`, `nim`, `nidn`, `subject_code`, `nilai_uts`, `nilai_uas`, `nilai_tugas`, `nilai_kehadiran`, `semester_id`, `created_at`, `updated_at`) VALUES
	(1, '202043500578', '11281085011', 'WP01', '85', '85', '87', '80', 1, '2022-06-03 01:07:39', '2022-06-03 01:07:39'),
	(2, '202043500578', '11281085011', 'MP01', '0', '0', '0', '80', 1, '2022-06-05 07:10:37', '2022-06-05 07:10:37'),
	(3, '202043500578', '11281085011', 'S001', '0', '0', '0', '0', 1, NULL, NULL),
	(4, '202043500578', '11281085011', 'DB01', '0', '0', '0', '0', 1, NULL, NULL),
	(5, '202043500578', '11281085011', 'RPL1', '0', '0', '0', '0', 1, NULL, NULL),
	(6, '202043500578', '11281085011', 'PBD01', '0', '0', '0', '10', 1, '2022-06-05 07:12:46', '2022-06-05 07:12:46'),
	(7, '202043201923', '11281085011', 'WP01', '89', '90', '82', '80', 1, '2022-06-03 01:07:33', '2022-06-03 01:07:33');

-- Dumping structure for table siakad.mst_krs
CREATE TABLE IF NOT EXISTS `mst_krs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` int(11) NOT NULL,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_krs_nim_nidn_academic_code_subject_code_semester_id_index` (`nim`,`nidn`,`academic_code`,`subject_code`,`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_krs: ~7 rows (approximately)
INSERT INTO `mst_krs` (`id`, `nim`, `nidn`, `academic_code`, `subject_code`, `semester_id`, `order`, `created_at`, `updated_at`) VALUES
	(1, '202043500578', '11281085011', '202201', 'WP01', 1, 1, '2022-06-01 08:28:13', '2022-06-01 08:28:13'),
	(3, '202043500578', '11281085011', '202201', 'MP01', 1, 2, '2022-06-01 08:28:58', '2022-06-01 08:28:58'),
	(4, '202043500578', '11281085011', '202201', 'S001', 1, 3, '2022-06-01 08:29:40', '2022-06-01 08:29:40'),
	(5, '202043500578', '11281085011', '202201', 'DB01', 1, 4, '2022-06-01 08:29:43', '2022-06-01 08:29:43'),
	(6, '202043500578', '11281085011', '202201', 'RPL1', 1, 5, '2022-06-01 08:29:45', '2022-06-01 08:29:45'),
	(7, '202043500578', '11281085011', '202201', 'PBD01', 1, 6, '2022-06-01 08:29:48', '2022-06-01 08:29:48'),
	(9, '202043201923', '11281085011', '202201', 'WP01', 1, 7, '2022-06-01 08:46:37', '2022-06-01 08:46:37');

-- Dumping structure for table siakad.mst_lecturer
CREATE TABLE IF NOT EXISTS `mst_lecturer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_lecturer_nidn_unique` (`nidn`),
  KEY `mst_lecturer_nidn_faculty_code_index` (`nidn`,`faculty_code`),
  KEY `mst_lecturer_created_by_index` (`created_by`),
  KEY `mst_lecturer_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_lecturer: ~2 rows (approximately)
INSERT INTO `mst_lecturer` (`id`, `nidn`, `name`, `email`, `faculty_code`, `number_phone`, `created_by`, `updated_by`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(10, '11281085011', 'Suhendi S.Kom,M.Kom', 'suhendi@gmail.com', 'IFK', '087887265341', 1, 0, 1, 1, '2022-05-30 10:23:24', '2022-05-30 10:23:24'),
	(11, '11281085012', 'Durratul Hafizah M.Kom', 'durratul@gmail.com', 'IFK', '087886524617', 1, 0, 1, 2, '2022-05-30 10:24:35', '2022-05-30 10:24:35');

-- Dumping structure for table siakad.mst_lecture_hours
CREATE TABLE IF NOT EXISTS `mst_lecture_hours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_lecture_hours_created_by_index` (`created_by`),
  KEY `mst_lecture_hours_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_lecture_hours: ~5 rows (approximately)
INSERT INTO `mst_lecture_hours` (`id`, `name`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, '09:00 - 10:00', 1, 1, 1, 0, '2022-05-17 14:09:13', '2022-05-17 14:09:13'),
	(2, '10:00 - 12:00', 1, 2, 1, 1, '2022-05-10 07:04:11', '2022-05-10 07:04:11'),
	(3, '12:00 - 13:00', 1, 3, 1, 1, '2022-05-10 07:04:22', '2022-05-10 07:04:22'),
	(4, '13:00 - 14:30', 1, 4, 1, 1, '2022-05-10 07:04:32', '2022-05-10 07:04:32'),
	(5, '15:00 - 16:00', 1, 5, 1, 0, '2022-05-17 05:04:46', '2022-05-17 05:04:46');

-- Dumping structure for table siakad.mst_major
CREATE TABLE IF NOT EXISTS `mst_major` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_level_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_major_code_unique` (`code`),
  KEY `mst_major_code_index` (`code`),
  KEY `faculty_code` (`faculty_code`),
  KEY `college_level_id` (`college_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_major: ~2 rows (approximately)
INSERT INTO `mst_major` (`id`, `code`, `name`, `faculty_code`, `college_level_id`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(20, 'IFD3', 'Teknik Informatika', 'IFK', 1, 1, 1, '2022-05-30 08:41:48', '2022-05-30 08:41:48'),
	(21, 'PMTK', 'Pendidikan Matematika', 'FIMPA', 2, 1, 2, '2022-05-30 08:52:36', '2022-05-30 08:55:40');

-- Dumping structure for table siakad.mst_menu_detail
CREATE TABLE IF NOT EXISTS `mst_menu_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URI | ROUTE_NAME',
  `route` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_menu_detail_name_unique` (`name`),
  UNIQUE KEY `mst_menu_detail_route_unique` (`route`),
  KEY `mst_menu_detail_created_by_index` (`created_by`),
  KEY `mst_menu_detail_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_menu_detail: ~7 rows (approximately)
INSERT INTO `mst_menu_detail` (`id`, `name`, `route_type`, `route`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'Ruangan', 'URI', 'ruangan', 1, 1, 1, 1, '2022-03-14 03:53:15', '2022-03-14 03:53:15'),
	(2, 'Matakuliah', 'URI', 'matakuliah', 1, 2, 1, 1, '2022-03-11 07:55:12', '2022-03-11 07:55:12'),
	(3, 'Fakultas', 'URI', 'fakultas', 1, 3, 1, 1, '2022-04-23 12:01:39', '2022-04-23 12:01:39'),
	(4, 'Jurusan', 'URI', 'jurusan', 1, 4, 1, 1, '2022-04-25 15:34:54', '2022-04-25 15:34:55'),
	(5, 'Kurikulum', 'URI', 'kurikulum', 1, 5, 1, 1, '2022-04-26 12:31:53', '2022-04-26 12:31:54'),
	(6, 'Informasi Kampus', 'URI', 'informasi-kampus', 1, 6, 1, 1, '2022-05-13 03:15:41', '2022-05-13 03:15:41'),
	(7, 'Jam Kuliah', 'URI', 'jam-kuliah', 1, 7, 1, 1, '2022-05-16 05:51:05', '2022-05-16 05:51:05');

-- Dumping structure for table siakad.mst_menu_master
CREATE TABLE IF NOT EXISTS `mst_menu_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(11) NOT NULL,
  `route_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URI | ROUTE_NAME',
  `unique_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_menu_master_name_unique` (`name`),
  UNIQUE KEY `mst_menu_master_route_unique` (`route`),
  UNIQUE KEY `uni` (`unique_id`) USING BTREE,
  KEY `mst_menu_master_icon_id_index` (`icon_id`),
  KEY `mst_menu_master_created_by_index` (`created_by`),
  KEY `mst_menu_master_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_menu_master: ~11 rows (approximately)
INSERT INTO `mst_menu_master` (`id`, `name`, `icon_id`, `route_type`, `unique_id`, `route`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'Dashboard', 1, 'URI', 'dashboard', 'dashboard', 1, 1, 1, 1, '2022-03-11 00:42:26', '2022-03-11 00:42:26'),
	(2, 'Master Data', 3, 'URI', 'master-data', '#', 1, 2, 1, 1, '2022-03-11 07:45:33', '2022-03-11 07:45:33'),
	(3, 'Mahasiswa', 4, 'URI', 'mahasiswa', 'mahasiswa', 1, 3, 1, 1, '2022-03-13 04:16:41', '2022-03-13 04:16:41'),
	(4, 'Tahun Akademik', 5, 'URI', 'tahun-akademik', 'tahun-akademik', 1, 4, 1, 1, '2022-05-01 10:24:17', '2022-05-01 10:24:18'),
	(5, 'Dosen', 6, 'URI', 'dosen', 'dosen', 1, 5, 1, 1, '2022-05-09 03:15:41', '2022-05-09 03:15:41'),
	(6, 'Jadwal Kuliah', 7, 'URI', 'jadwal-kuliah', 'jadwal-kuliah', 1, 6, 1, 1, '2022-05-10 06:22:55', '2022-05-10 06:22:55'),
	(7, 'Pengaturan', 8, 'URI', 'pengaturan', 'pengaturan', 1, 7, 1, 1, '2022-05-13 02:46:04', '2022-05-13 02:46:04'),
	(8, 'KRS', 10, 'URI', 'krs', 'krs', 1, 8, 1, 1, '2022-05-18 05:57:42', '2022-05-18 05:57:42'),
	(9, 'KHS', 11, 'URI', 'khs', 'khs', 1, 9, 1, 1, '2022-05-21 01:24:27', '2022-05-21 01:24:28'),
	(10, 'Jadwal Mengajar', 9, 'URI', 'jadwal-mengajar', 'jadwal-mengajar', 1, 10, 1, 1, '2022-05-23 09:15:50', '2022-05-23 09:15:50'),
	(11, 'Pengguna', 12, 'URI', 'pengguna', 'pengguna', 1, 11, 1, 1, '2022-05-28 13:14:52', '2022-05-28 13:14:52');

-- Dumping structure for table siakad.mst_presence
CREATE TABLE IF NOT EXISTS `mst_presence` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discussion_topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_to` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_presence_subject_code_index` (`subject_code`),
  KEY `mst_presence_nidn_index` (`nidn`),
  KEY `mst_presence_major_code_index` (`major_code`),
  KEY `mst_presence_room_code_index` (`room_code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_presence: ~7 rows (approximately)
INSERT INTO `mst_presence` (`id`, `subject_code`, `nidn`, `major_code`, `room_code`, `discussion_topic`, `meeting_to`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'WP01', '11281085011', 'IFD3', 'RLBK01', 'HTML Dasar 1', 1, 1, '2022-06-05 05:59:39', '2022-06-05 05:59:39'),
	(2, 'MP01', '11281085011', 'IFD3', 'RLBK01', 'Programing Mobile 1', 1, 1, '2022-06-05 06:00:48', '2022-06-05 06:00:48'),
	(3, 'WP01', '11281085011', 'IFD3', 'RLBK01', 'HTML Dasar 2', 2, 1, '2022-06-05 06:01:32', '2022-06-05 06:01:32'),
	(4, 'MP01', '11281085011', 'IFD3', 'RLBK01', 'Programing Mobile 2', 2, 1, '2022-06-05 06:09:40', '2022-06-05 06:09:40'),
	(5, 'PBD01', '11281085011', 'IFD3', 'LT101', 'Basis Data Dasar 1', 1, 1, '2022-06-05 06:10:00', '2022-06-05 06:10:00'),
	(6, 'PBD01', '11281085011', 'IFD3', 'LT101', 'Basis Data Dasar 2', 2, 1, '2022-06-05 06:25:30', '2022-06-05 06:25:30'),
	(7, 'DB01', '11281085011', 'IFD3', 'RLBK01', 'Database Dasar 1', 1, 1, '2022-06-05 06:39:26', '2022-06-05 06:39:26');

-- Dumping structure for table siakad.mst_room
CREATE TABLE IF NOT EXISTS `mst_room` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_room_code_unique` (`code`),
  KEY `mst_room_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_room: ~4 rows (approximately)
INSERT INTO `mst_room` (`id`, `code`, `name`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(34, 'RLBK01', 'Ruang Praktikum 01', 1, 1, '2022-05-03 05:52:45', '2022-05-05 11:19:07'),
	(38, 'RLBK02', 'Ruang LAB Komputer', 1, 2, '2022-05-12 19:14:32', '2022-05-12 19:14:32'),
	(39, 'RLBK03', 'Bimbingan Konseling2', 1, 3, '2022-05-17 05:17:49', '2022-05-17 05:17:49'),
	(40, 'LT101', 'Ruang Lantai 1 - Teori', 1, 4, '2022-05-30 10:25:17', '2022-05-30 10:25:17');

-- Dumping structure for table siakad.mst_subject
CREATE TABLE IF NOT EXISTS `mst_subject` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_subject_code_unique` (`code`),
  KEY `mst_subject_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_subject: ~7 rows (approximately)
INSERT INTO `mst_subject` (`id`, `code`, `name`, `sks`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(298, 'WP01', 'Web Programming', 3, 1, 1, '2022-05-30 10:46:57', '2022-06-01 19:57:41'),
	(299, 'MP01', 'Mobile Programming', 3, 1, 2, '2022-05-30 10:47:11', '2022-06-01 19:57:51'),
	(300, 'S001', 'Sistem Operasi', 3, 1, 3, '2022-05-30 10:47:25', '2022-06-01 19:57:59'),
	(301, 'DB01', 'Database', 3, 1, 4, '2022-05-30 10:47:36', '2022-06-01 19:58:03'),
	(302, 'RPL1', 'Rekayasa Perangkat Lunak', 3, 1, 5, '2022-05-30 10:47:55', '2022-06-01 19:58:47'),
	(303, 'KWS1', 'Kewirausahaan', 3, 1, 6, '2022-05-30 10:48:13', '2022-06-01 19:59:05'),
	(304, 'PBD01', 'Pemrograman Basis Data', 3, 1, 7, '2022-05-30 18:11:03', '2022-06-01 20:00:17');

-- Dumping structure for table siakad.mst_user_log_activity
CREATE TABLE IF NOT EXISTS `mst_user_log_activity` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_activity_module` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_activity_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_activity_desc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_activity_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_activity_browser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_activity_os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'users.id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mst_user_log_activity_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.mst_user_log_activity: ~323 rows (approximately)
INSERT INTO `mst_user_log_activity` (`id`, `user_activity_module`, `user_activity_name`, `user_activity_desc`, `user_activity_address`, `user_activity_browser`, `user_activity_os`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-11 21:00:45', '2022-03-11 21:00:45'),
	(2, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-12 01:24:58', '2022-03-12 01:24:58'),
	(3, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-12 21:01:27', '2022-03-12 21:01:27'),
	(4, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-12 21:12:02', '2022-03-12 21:12:02'),
	(5, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-12 21:17:07', '2022-03-12 21:17:07'),
	(6, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-13 10:53:02', '2022-03-13 10:53:02'),
	(7, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-13 20:10:06', '2022-03-13 20:10:06'),
	(8, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-14 20:06:49', '2022-03-14 20:06:49'),
	(9, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 02:52:42', '2022-03-15 02:52:42'),
	(10, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 03:29:48', '2022-03-15 03:29:48'),
	(11, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 03:34:57', '2022-03-15 03:34:57'),
	(12, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 06:58:51', '2022-03-15 06:58:51'),
	(13, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:16:51', '2022-03-15 22:16:51'),
	(14, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:17:38', '2022-03-15 22:17:38'),
	(15, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:20:23', '2022-03-15 22:20:23'),
	(16, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:21:38', '2022-03-15 22:21:38'),
	(17, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:21:50', '2022-03-15 22:21:50'),
	(18, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:22:02', '2022-03-15 22:22:02'),
	(19, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:25:34', '2022-03-15 22:25:34'),
	(20, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:28:20', '2022-03-15 22:28:20'),
	(21, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:37:27', '2022-03-15 22:37:27'),
	(22, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:38:16', '2022-03-15 22:38:16'),
	(23, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:38:18', '2022-03-15 22:38:18'),
	(24, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:39:14', '2022-03-15 22:39:14'),
	(25, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:39:33', '2022-03-15 22:39:33'),
	(26, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:40:02', '2022-03-15 22:40:02'),
	(27, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:40:04', '2022-03-15 22:40:04'),
	(28, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:40:33', '2022-03-15 22:40:33'),
	(29, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:40:35', '2022-03-15 22:40:35'),
	(30, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:41:12', '2022-03-15 22:41:12'),
	(31, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:41:37', '2022-03-15 22:41:37'),
	(32, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:41:59', '2022-03-15 22:41:59'),
	(33, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:45:08', '2022-03-15 22:45:08'),
	(34, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:46:28', '2022-03-15 22:46:28'),
	(35, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:46:31', '2022-03-15 22:46:31'),
	(36, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:48:20', '2022-03-15 22:48:20'),
	(37, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:49:18', '2022-03-15 22:49:18'),
	(38, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:50:55', '2022-03-15 22:50:55'),
	(39, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:51:07', '2022-03-15 22:51:07'),
	(40, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:51:53', '2022-03-15 22:51:53'),
	(41, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 22:56:41', '2022-03-15 22:56:41'),
	(42, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:04:25', '2022-03-15 23:04:25'),
	(43, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:09:30', '2022-03-15 23:09:30'),
	(44, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:10:02', '2022-03-15 23:10:02'),
	(45, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:10:10', '2022-03-15 23:10:10'),
	(46, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:47:26', '2022-03-15 23:47:26'),
	(47, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:49:56', '2022-03-15 23:49:56'),
	(48, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:50:47', '2022-03-15 23:50:47'),
	(49, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:54:57', '2022-03-15 23:54:57'),
	(50, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:55:18', '2022-03-15 23:55:18'),
	(51, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:55:27', '2022-03-15 23:55:27'),
	(52, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:56:45', '2022-03-15 23:56:45'),
	(53, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:56:57', '2022-03-15 23:56:57'),
	(54, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:57:11', '2022-03-15 23:57:11'),
	(55, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:58:57', '2022-03-15 23:58:57'),
	(56, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-15 23:59:03', '2022-03-15 23:59:03'),
	(57, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 00:00:14', '2022-03-16 00:00:14'),
	(58, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 00:01:09', '2022-03-16 00:01:09'),
	(59, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:38:47', '2022-03-16 03:38:47'),
	(60, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:40:24', '2022-03-16 03:40:24'),
	(61, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:40:28', '2022-03-16 03:40:28'),
	(62, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:41:43', '2022-03-16 03:41:43'),
	(63, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:41:46', '2022-03-16 03:41:46'),
	(64, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:42:13', '2022-03-16 03:42:13'),
	(65, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:43:36', '2022-03-16 03:43:36'),
	(66, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:44:09', '2022-03-16 03:44:09'),
	(67, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 03:44:24', '2022-03-16 03:44:24'),
	(68, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 12:12:34', '2022-03-16 12:12:34'),
	(69, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 20:23:31', '2022-03-16 20:23:31'),
	(70, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 22:41:57', '2022-03-16 22:41:57'),
	(71, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 22:42:00', '2022-03-16 22:42:00'),
	(72, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-16 23:32:46', '2022-03-16 23:32:46'),
	(73, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-17 03:50:14', '2022-03-17 03:50:14'),
	(74, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-03-17 08:38:51', '2022-03-17 08:38:51'),
	(75, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 08:03:21', '2022-04-11 08:03:21'),
	(76, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 08:25:07', '2022-04-11 08:25:07'),
	(77, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 08:55:13', '2022-04-11 08:55:13'),
	(78, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 08:58:35', '2022-04-11 08:58:35'),
	(79, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 20:08:16', '2022-04-11 20:08:16'),
	(80, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 20:11:47', '2022-04-11 20:11:47'),
	(81, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-11 20:45:47', '2022-04-11 20:45:47'),
	(82, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-12 23:40:47', '2022-04-12 23:40:47'),
	(83, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:51:23', '2022-04-14 04:51:23'),
	(84, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:54:23', '2022-04-14 04:54:23'),
	(85, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:54:39', '2022-04-14 04:54:39'),
	(86, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:54:50', '2022-04-14 04:54:50'),
	(87, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:54:53', '2022-04-14 04:54:53'),
	(88, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 04:57:12', '2022-04-14 04:57:12'),
	(89, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 05:13:22', '2022-04-14 05:13:22'),
	(90, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 12:44:05', '2022-04-14 12:44:05'),
	(91, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-14 21:21:16', '2022-04-14 21:21:16'),
	(92, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-15 02:22:08', '2022-04-15 02:22:08'),
	(93, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-15 08:39:02', '2022-04-15 08:39:02'),
	(94, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-15 20:42:45', '2022-04-15 20:42:45'),
	(95, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-16 14:45:59', '2022-04-16 14:45:59'),
	(96, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-16 18:47:00', '2022-04-16 18:47:00'),
	(97, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-17 00:46:20', '2022-04-17 00:46:20'),
	(98, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-17 05:54:51', '2022-04-17 05:54:51'),
	(99, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-17 20:32:43', '2022-04-17 20:32:43'),
	(100, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-19 01:55:20', '2022-04-19 01:55:20'),
	(101, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-19 19:19:41', '2022-04-19 19:19:41'),
	(102, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-20 01:07:29', '2022-04-20 01:07:29'),
	(103, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-20 08:11:29', '2022-04-20 08:11:29'),
	(104, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-20 19:39:44', '2022-04-20 19:39:44'),
	(105, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-21 19:40:53', '2022-04-21 19:40:53'),
	(106, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-21 19:52:01', '2022-04-21 19:52:01'),
	(107, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-21 20:12:02', '2022-04-21 20:12:02'),
	(108, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-21 20:13:02', '2022-04-21 20:13:02'),
	(109, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-21 20:59:15', '2022-04-21 20:59:15'),
	(110, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-22 08:53:09', '2022-04-22 08:53:09'),
	(111, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-22 13:25:28', '2022-04-22 13:25:28'),
	(112, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-22 19:56:21', '2022-04-22 19:56:21'),
	(113, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-23 05:02:11', '2022-04-23 05:02:11'),
	(114, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-24 03:35:52', '2022-04-24 03:35:52'),
	(115, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-24 06:35:08', '2022-04-24 06:35:08'),
	(116, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-24 23:56:43', '2022-04-24 23:56:43'),
	(117, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-25 08:32:06', '2022-04-25 08:32:06'),
	(118, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-25 21:44:41', '2022-04-25 21:44:41'),
	(119, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-25 22:48:59', '2022-04-25 22:48:59'),
	(120, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 04:54:59', '2022-04-26 04:54:59'),
	(121, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 05:00:12', '2022-04-26 05:00:12'),
	(122, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 05:48:55', '2022-04-26 05:48:55'),
	(123, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 19:33:40', '2022-04-26 19:33:40'),
	(124, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 20:09:42', '2022-04-26 20:09:42'),
	(125, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 20:37:26', '2022-04-26 20:37:26'),
	(126, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-26 21:01:21', '2022-04-26 21:01:21'),
	(127, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-27 03:09:48', '2022-04-27 03:09:48'),
	(128, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-27 15:19:58', '2022-04-27 15:19:58'),
	(129, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-27 19:49:05', '2022-04-27 19:49:05'),
	(130, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-28 10:14:12', '2022-04-28 10:14:12'),
	(131, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-28 22:41:39', '2022-04-28 22:41:39'),
	(132, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-29 10:59:23', '2022-04-29 10:59:23'),
	(133, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-29 21:45:53', '2022-04-29 21:45:53'),
	(134, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-04-30 23:56:19', '2022-04-30 23:56:19'),
	(135, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-01 03:19:31', '2022-05-01 03:19:31'),
	(136, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-01 05:43:22', '2022-05-01 05:43:22'),
	(137, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-01 12:16:39', '2022-05-01 12:16:39'),
	(138, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-01 14:27:38', '2022-05-01 14:27:38'),
	(139, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-01 17:35:49', '2022-05-01 17:35:49'),
	(140, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-02 07:39:04', '2022-05-02 07:39:04'),
	(141, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-02 21:22:09', '2022-05-02 21:22:09'),
	(142, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-03 01:51:37', '2022-05-03 01:51:37'),
	(143, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-03 20:27:27', '2022-05-03 20:27:27'),
	(144, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-04 09:36:20', '2022-05-04 09:36:20'),
	(145, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-04 22:22:39', '2022-05-04 22:22:39'),
	(146, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 05:14:48', '2022-05-05 05:14:48'),
	(147, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 10:17:16', '2022-05-05 10:17:16'),
	(148, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 21:43:00', '2022-05-05 21:43:00'),
	(149, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 23:29:36', '2022-05-05 23:29:36'),
	(150, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 23:38:09', '2022-05-05 23:38:09'),
	(151, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-05 23:39:36', '2022-05-05 23:39:36'),
	(152, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-06 05:21:23', '2022-05-06 05:21:23'),
	(153, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-06 19:17:59', '2022-05-06 19:17:59'),
	(154, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-07 05:08:14', '2022-05-07 05:08:14'),
	(155, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-07 19:35:19', '2022-05-07 19:35:19'),
	(156, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-07 22:03:48', '2022-05-07 22:03:48'),
	(157, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-08 02:58:49', '2022-05-08 02:58:49'),
	(158, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-08 07:50:43', '2022-05-08 07:50:43'),
	(159, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-08 19:29:51', '2022-05-08 19:29:51'),
	(160, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-08 19:57:33', '2022-05-08 19:57:33'),
	(161, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-09 05:33:09', '2022-05-09 05:33:09'),
	(162, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-09 20:14:04', '2022-05-09 20:14:04'),
	(163, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-09 22:37:00', '2022-05-09 22:37:00'),
	(164, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-10 04:55:22', '2022-05-10 04:55:22'),
	(165, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-10 19:30:26', '2022-05-10 19:30:26'),
	(166, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-10 19:42:02', '2022-05-10 19:42:02'),
	(167, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-11 01:20:51', '2022-05-11 01:20:51'),
	(168, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 00:20:13', '2022-05-12 00:20:13'),
	(169, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 18:54:57', '2022-05-12 18:54:57'),
	(170, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 19:34:13', '2022-05-12 19:34:13'),
	(171, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 19:37:19', '2022-05-12 19:37:19'),
	(172, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 19:37:21', '2022-05-12 19:37:21'),
	(173, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-12 23:22:51', '2022-05-12 23:22:51'),
	(174, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-13 14:25:00', '2022-05-13 14:25:00'),
	(175, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-15 07:20:06', '2022-05-15 07:20:06'),
	(176, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-15 22:45:12', '2022-05-15 22:45:12'),
	(177, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 04:32:40', '2022-05-17 04:32:40'),
	(178, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 06:56:45', '2022-05-17 06:56:45'),
	(179, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 07:21:56', '2022-05-17 07:21:56'),
	(180, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 07:23:57', '2022-05-17 07:23:57'),
	(181, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 07:24:25', '2022-05-17 07:24:25'),
	(182, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-17 07:28:01', '2022-05-17 07:28:01'),
	(183, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 20:50:37', '2022-05-17 20:50:37'),
	(184, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-17 21:54:21', '2022-05-17 21:54:21'),
	(185, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-17 21:54:46', '2022-05-17 21:54:46'),
	(186, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-18 01:51:13', '2022-05-18 01:51:13'),
	(187, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-18 02:37:00', '2022-05-18 02:37:00'),
	(188, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-18 07:54:19', '2022-05-18 07:54:19'),
	(189, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-19 04:30:23', '2022-05-19 04:30:23'),
	(190, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-19 19:04:10', '2022-05-19 19:04:10'),
	(191, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-20 04:05:59', '2022-05-20 04:05:59'),
	(192, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-20 04:43:46', '2022-05-20 04:43:46'),
	(193, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-20 18:21:13', '2022-05-20 18:21:13'),
	(194, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 00:41:28', '2022-05-22 00:41:28'),
	(195, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 04:09:10', '2022-05-22 04:09:10'),
	(196, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 18:48:09', '2022-05-22 18:48:09'),
	(197, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 19:50:57', '2022-05-22 19:50:57'),
	(198, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 19:55:03', '2022-05-22 19:55:03'),
	(199, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 19:55:06', '2022-05-22 19:55:06'),
	(200, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 20:09:22', '2022-05-22 20:09:22'),
	(201, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-22 20:09:27', '2022-05-22 20:09:27'),
	(202, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-22 20:09:45', '2022-05-22 20:09:45'),
	(203, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-22 20:09:49', '2022-05-22 20:09:49'),
	(204, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-23 00:13:51', '2022-05-23 00:13:51'),
	(205, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-23 00:33:32', '2022-05-23 00:33:32'),
	(206, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 00:33:36', '2022-05-23 00:33:36'),
	(207, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 00:39:00', '2022-05-23 00:39:00'),
	(208, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-23 00:39:04', '2022-05-23 00:39:04'),
	(209, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-23 00:40:36', '2022-05-23 00:40:36'),
	(210, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 00:40:40', '2022-05-23 00:40:40'),
	(211, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 00:40:51', '2022-05-23 00:40:51'),
	(212, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-23 00:40:56', '2022-05-23 00:40:56'),
	(213, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 01:49:53', '2022-05-23 01:49:53'),
	(214, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-23 02:12:00', '2022-05-23 02:12:00'),
	(215, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-23 02:17:20', '2022-05-23 02:17:20'),
	(216, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-23 07:12:58', '2022-05-23 07:12:58'),
	(217, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-23 19:17:21', '2022-05-23 19:17:21'),
	(218, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-24 23:22:05', '2022-05-24 23:22:05'),
	(219, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-24 23:35:56', '2022-05-24 23:35:56'),
	(220, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-24 23:54:03', '2022-05-24 23:54:03'),
	(221, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-25 01:41:50', '2022-05-25 01:41:50'),
	(222, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-25 04:03:29', '2022-05-25 04:03:29'),
	(223, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-25 22:21:51', '2022-05-25 22:21:51'),
	(224, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-25 23:14:08', '2022-05-25 23:14:08'),
	(225, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-26 07:17:41', '2022-05-26 07:17:41'),
	(226, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-26 09:16:31', '2022-05-26 09:16:31'),
	(227, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-26 19:11:31', '2022-05-26 19:11:31'),
	(228, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-26 19:34:28', '2022-05-26 19:34:28'),
	(229, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-27 07:32:29', '2022-05-27 07:32:29'),
	(230, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-27 08:28:07', '2022-05-27 08:28:07'),
	(231, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-27 21:54:16', '2022-05-27 21:54:16'),
	(232, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 34, '2022-05-27 21:54:22', '2022-05-27 21:54:22'),
	(233, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 00:30:49', '2022-05-28 00:30:49'),
	(234, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 00:31:09', '2022-05-28 00:31:09'),
	(235, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 00:37:00', '2022-05-28 00:37:00'),
	(236, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 00:37:07', '2022-05-28 00:37:07'),
	(237, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 03:44:41', '2022-05-28 03:44:41'),
	(238, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 06:02:28', '2022-05-28 06:02:28'),
	(239, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-28 21:15:00', '2022-05-28 21:15:00'),
	(240, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 06:02:06', '2022-05-29 06:02:06'),
	(241, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 06:18:19', '2022-05-29 06:18:19'),
	(242, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:18:09', '2022-05-29 07:18:09'),
	(243, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:18:12', '2022-05-29 07:18:12'),
	(244, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:40:05', '2022-05-29 07:40:05'),
	(245, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:40:07', '2022-05-29 07:40:07'),
	(246, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:42:54', '2022-05-29 07:42:54'),
	(247, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:44:24', '2022-05-29 07:44:24'),
	(248, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:45:09', '2022-05-29 07:45:09'),
	(249, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:46:28', '2022-05-29 07:46:28'),
	(250, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:48:33', '2022-05-29 07:48:33'),
	(251, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 07:49:34', '2022-05-29 07:49:34'),
	(252, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-29 20:45:14', '2022-05-29 20:45:14'),
	(253, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 02:51:40', '2022-05-30 02:51:40'),
	(254, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 03:22:54', '2022-05-30 03:22:54'),
	(255, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-05-30 03:25:39', '2022-05-30 03:25:39'),
	(256, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:47:13', '2022-05-30 06:47:13'),
	(257, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:50:43', '2022-05-30 06:50:43'),
	(258, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:51:07', '2022-05-30 06:51:07'),
	(259, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:51:29', '2022-05-30 06:51:29'),
	(260, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:52:21', '2022-05-30 06:52:21'),
	(261, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:52:52', '2022-05-30 06:52:52'),
	(262, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:53:05', '2022-05-30 06:53:05'),
	(263, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:53:29', '2022-05-30 06:53:29'),
	(264, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:55:49', '2022-05-30 06:55:49'),
	(265, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 06:56:11', '2022-05-30 06:56:11'),
	(266, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 07:05:23', '2022-05-30 07:05:23'),
	(267, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 08:07:25', '2022-05-30 08:07:25'),
	(268, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 08:24:03', '2022-05-30 08:24:03'),
	(269, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 18:00:01', '2022-05-30 18:00:01'),
	(270, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-30 22:10:18', '2022-05-30 22:10:18'),
	(271, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-31 00:51:51', '2022-05-31 00:51:51'),
	(272, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-05-31 15:07:40', '2022-05-31 15:07:40'),
	(273, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-01 04:42:29', '2022-06-01 04:42:29'),
	(274, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-01 08:03:23', '2022-06-01 08:03:23'),
	(275, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-01 08:27:08', '2022-06-01 08:27:08'),
	(276, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-01 08:27:13', '2022-06-01 08:27:13'),
	(277, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-01 08:27:53', '2022-06-01 08:27:53'),
	(278, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-01 08:27:59', '2022-06-01 08:27:59'),
	(279, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-01 08:32:26', '2022-06-01 08:32:26'),
	(280, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-01 08:33:14', '2022-06-01 08:33:14'),
	(281, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-01 08:37:41', '2022-06-01 08:37:41'),
	(282, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-01 08:37:52', '2022-06-01 08:37:52'),
	(283, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-01 08:57:47', '2022-06-01 08:57:47'),
	(284, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-01 08:57:51', '2022-06-01 08:57:51'),
	(285, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-01 08:57:55', '2022-06-01 08:57:55'),
	(286, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-01 08:58:03', '2022-06-01 08:58:03'),
	(287, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-01 19:17:06', '2022-06-01 19:17:06'),
	(288, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-02 03:26:46', '2022-06-02 03:26:46'),
	(289, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-02 03:27:58', '2022-06-02 03:27:58'),
	(290, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-02 03:28:13', '2022-06-02 03:28:13'),
	(291, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-02 03:31:12', '2022-06-02 03:31:12'),
	(292, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-02 03:31:39', '2022-06-02 03:31:39'),
	(293, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 00:41:05', '2022-06-03 00:41:05'),
	(294, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 00:52:07', '2022-06-03 00:52:07'),
	(295, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-03 00:53:49', '2022-06-03 00:53:49'),
	(296, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-03 00:58:24', '2022-06-03 00:58:24'),
	(297, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 01:00:37', '2022-06-03 01:00:37'),
	(298, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 01:08:42', '2022-06-03 01:08:42'),
	(299, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-03 01:08:47', '2022-06-03 01:08:47'),
	(300, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 35, '2022-06-03 01:11:15', '2022-06-03 01:11:15'),
	(301, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 01:11:23', '2022-06-03 01:11:23'),
	(302, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 18:59:02', '2022-06-03 18:59:02'),
	(303, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-03 20:37:37', '2022-06-03 20:37:37'),
	(304, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-04 23:16:28', '2022-06-04 23:16:28'),
	(305, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-05 04:55:50', '2022-06-05 04:55:50'),
	(306, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-05 07:13:09', '2022-06-05 07:13:09'),
	(307, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 07:14:27', '2022-06-05 07:14:27'),
	(308, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 19:26:15', '2022-06-05 19:26:15'),
	(309, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:26:33', '2022-06-05 20:26:33'),
	(310, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-05 20:26:37', '2022-06-05 20:26:37'),
	(311, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-05 20:28:47', '2022-06-05 20:28:47'),
	(312, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:28:51', '2022-06-05 20:28:51'),
	(313, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:33:21', '2022-06-05 20:33:21'),
	(314, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:33:23', '2022-06-05 20:33:23'),
	(315, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:33:29', '2022-06-05 20:33:29'),
	(316, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-05 20:33:33', '2022-06-05 20:33:33'),
	(317, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-05 20:34:24', '2022-06-05 20:34:24'),
	(318, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-05 20:34:29', '2022-06-05 20:34:29'),
	(319, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-06 05:02:53', '2022-06-06 05:02:53'),
	(320, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-06 05:03:33', '2022-06-06 05:03:33'),
	(321, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-06 05:23:48', '2022-06-06 05:23:48'),
	(322, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-06 05:23:53', '2022-06-06 05:23:53'),
	(323, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-10 03:34:27', '2022-06-10 03:34:27'),
	(324, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 31, '2022-06-10 06:46:41', '2022-06-10 06:46:41'),
	(325, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-10 06:52:18', '2022-06-10 06:52:18'),
	(326, 'LoginController', 'Logout', 'User Logout To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 1, '2022-06-10 06:56:29', '2022-06-10 06:56:29'),
	(327, 'LoginController', 'Login', 'User Login To Apps', '127.0.0.1', 'Google Chrome', 'Windows 10', 45, '2022-06-10 06:58:24', '2022-06-10 06:58:24');

-- Dumping structure for table siakad.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.password_resets: ~0 rows (approximately)

-- Dumping structure for table siakad.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.permissions: ~0 rows (approximately)

-- Dumping structure for table siakad.ref_college_level
CREATE TABLE IF NOT EXISTS `ref_college_level` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_college_level: ~3 rows (approximately)
INSERT INTO `ref_college_level` (`id`, `name`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 'D3', 1, 1, '2022-05-30 08:17:54', '2022-05-30 08:17:54'),
	(2, 'S1', 1, 2, '2022-05-30 08:17:54', '2022-05-30 08:17:54'),
	(3, 'S2', 1, 3, '2022-05-30 08:17:54', '2022-05-30 08:17:54');

-- Dumping structure for table siakad.ref_icon
CREATE TABLE IF NOT EXISTS `ref_icon` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FontAwesome|SVG|IMG',
  `path_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `ref_icon_created_by_index` (`created_by`),
  KEY `ref_icon_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_icon: ~12 rows (approximately)
INSERT INTO `ref_icon` (`id`, `name`, `icon`, `type_icon`, `path_icon`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'abs027.svg', '<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"/>\r\n<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/abstract/abs027.svg', 1, 1, 1, 1, '2022-03-11 00:42:26', '2022-03-11 00:42:26'),
	(2, 'com013.svg', '<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>', 'SVG', 'icons/duotune/communication/com013.svg', 1, 2, 1, 1, '2022-03-13 18:05:03', '2022-03-13 18:05:03'),
	(3, 'database', 'fa-solid fa-database', 'FontAwesome', 'https://fontawesome.com/icons/database?s=solid', 1, 3, 1, 1, '2022-04-11 15:24:36', '2022-04-11 15:24:36'),
	(4, 'com006.svg', '<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"/>\r\n<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/communication/com006.sv', 1, 4, 1, 1, '2022-05-09 03:00:30', '2022-05-09 03:00:30'),
	(5, 'fil002.svg', '<path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>\r\n<path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/files/fil002.svg', 1, 5, 1, 1, '2022-05-09 03:08:49', '2022-05-09 03:08:49'),
	(6, 'med005.svg', '<path opacity="0.3" d="M17.9061 13H11.2061C11.2061 12.4 10.8061 12 10.2061 12C9.60605 12 9.20605 12.4 9.20605 13H6.50606L9.20605 8.40002V4C8.60605 4 8.20605 3.6 8.20605 3C8.20605 2.4 8.60605 2 9.20605 2H15.2061C15.8061 2 16.2061 2.4 16.2061 3C16.2061 3.6 15.8061 4 15.2061 4V8.40002L17.9061 13ZM13.2061 9C12.6061 9 12.2061 9.4 12.2061 10C12.2061 10.6 12.6061 11 13.2061 11C13.8061 11 14.2061 10.6 14.2061 10C14.2061 9.4 13.8061 9 13.2061 9Z" fill="black"/>\r\n<path d="M18.9061 22H5.40605C3.60605 22 2.40606 20 3.30606 18.4L6.40605 13H9.10605C9.10605 13.6 9.50605 14 10.106 14C10.706 14 11.106 13.6 11.106 13H17.8061L20.9061 18.4C21.9061 20 20.8061 22 18.9061 22ZM14.2061 15C13.1061 15 12.2061 15.9 12.2061 17C12.2061 18.1 13.1061 19 14.2061 19C15.3061 19 16.2061 18.1 16.2061 17C16.2061 15.9 15.3061 15 14.2061 15Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/medicine/med005.svg', 1, 6, 1, 1, '2022-05-09 03:15:02', '2022-05-09 03:15:02'),
	(7, 'txt009.svg', '<path opacity="0.3" d="M17 10H11C10.4 10 10 9.6 10 9V8C10 7.4 10.4 7 11 7H17C17.6 7 18 7.4 18 8V9C18 9.6 17.6 10 17 10ZM22 4V3C22 2.4 21.6 2 21 2H11C10.4 2 10 2.4 10 3V4C10 4.6 10.4 5 11 5H21C21.6 5 22 4.6 22 4ZM22 15V14C22 13.4 21.6 13 21 13H11C10.4 13 10 13.4 10 14V15C10 15.6 10.4 16 11 16H21C21.6 16 22 15.6 22 15ZM18 20V19C18 18.4 17.6 18 17 18H11C10.4 18 10 18.4 10 19V20C10 20.6 10.4 21 11 21H17C17.6 21 18 20.6 18 20Z" fill="black"/>\r\n<path d="M8 5C8 6.7 6.7 8 5 8C3.3 8 2 6.7 2 5C2 3.3 3.3 2 5 2C6.7 2 8 3.3 8 5ZM5 4C4.4 4 4 4.4 4 5C4 5.6 4.4 6 5 6C5.6 6 6 5.6 6 5C6 4.4 5.6 4 5 4ZM8 16C8 17.7 6.7 19 5 19C3.3 19 2 17.7 2 16C2 14.3 3.3 13 5 13C6.7 13 8 14.3 8 16ZM5 15C4.4 15 4 15.4 4 16C4 16.6 4.4 17 5 17C5.6 17 6 16.6 6 16C6 15.4 5.6 15 5 15Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/text/txt009.svg', 1, 7, 1, 1, '2022-05-13 03:06:10', '2022-05-13 03:06:11'),
	(8, 'cod001.svg', '<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black"/>\r\n<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/coding/cod001.svg', 1, 8, 1, 1, '2022-05-13 03:13:01', '2022-05-13 03:13:02'),
	(9, 'ecm008.svg', '<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black"/>\r\n<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black"/>\r\n<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/ecommerce/ecm008.svg', 1, 9, 1, 1, '2022-05-13 03:27:37', '2022-05-13 03:27:40'),
	(10, 'fil012.svg', '<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"/>\r\n<path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="black"/>', 'SVG', 'assets/media/icons/duotune/files/fil012.svg', 1, 10, 1, 1, '2022-05-23 02:40:25', '2022-05-23 02:40:25'),
	(11, 'gen026.svg', '<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"/>\r\n<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"/>\r\n', 'SVG', 'assets/media/icons/duotune/general/gen026.svg', 1, 11, 1, 1, '2022-05-23 02:42:43', '2022-05-23 02:42:43'),
	(12, 'com014.svg', '<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black"/>\r\n<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"/>\r\n<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black"/>\r\n<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"/>', 'SVG', 'assets/media/icons/duotune/communication/com014.sv', 1, 12, 1, 1, '2022-05-28 13:30:01', '2022-05-28 13:30:01');

-- Dumping structure for table siakad.ref_role_menu_detail
CREATE TABLE IF NOT EXISTS `ref_role_menu_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_master_id` int(11) NOT NULL,
  `menu_detail_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_role_menu_detail_menu_master_id_index` (`menu_master_id`),
  KEY `ref_role_menu_detail_menu_detail_id_index` (`menu_detail_id`),
  KEY `ref_role_menu_detail_role_id_index` (`role_id`),
  KEY `ref_role_menu_detail_created_by_index` (`created_by`),
  KEY `ref_role_menu_detail_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_role_menu_detail: ~7 rows (approximately)
INSERT INTO `ref_role_menu_detail` (`id`, `menu_master_id`, `menu_detail_id`, `role_id`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, 1, 1, 1, 1, '2022-03-14 09:03:10', '2022-03-14 09:03:10'),
	(2, 2, 2, 1, 1, 2, 1, 1, '2022-03-14 09:05:34', '2022-03-14 09:05:34'),
	(3, 2, 3, 1, 1, 3, 1, 1, '2022-04-23 12:01:57', '2022-04-23 12:01:57'),
	(4, 2, 4, 1, 1, 4, 1, 1, '2022-04-25 15:35:27', '2022-04-25 15:35:27'),
	(5, 2, 5, 1, 1, 5, 1, 1, '2022-04-26 12:32:34', '2022-04-26 12:32:34'),
	(6, 7, 6, 1, 1, 1, 1, 1, '2022-05-13 03:20:18', '2022-05-13 03:20:18'),
	(7, 2, 7, 1, 1, 6, 1, 1, '2022-05-16 05:51:27', '2022-05-16 05:51:27');

-- Dumping structure for table siakad.ref_role_menu_master
CREATE TABLE IF NOT EXISTS `ref_role_menu_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_master_id` int(11) NOT NULL COMMENT 'mst_menu_master.id',
  `role_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_role_menu_master_menu_master_id_index` (`menu_master_id`),
  KEY `ref_role_menu_master_created_by_index` (`created_by`),
  KEY `ref_role_menu_master_updated_by_index` (`updated_by`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_role_menu_master: ~14 rows (approximately)
INSERT INTO `ref_role_menu_master` (`id`, `menu_master_id`, `role_id`, `active`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, '2022-03-14 08:59:07', '2022-03-14 08:59:07'),
	(2, 2, 1, 1, 2, 1, 1, '2022-03-14 09:00:12', '2022-03-14 09:00:12'),
	(3, 3, 1, 1, 3, 1, 1, '2022-03-14 09:00:38', '2022-03-14 09:00:38'),
	(4, 4, 1, 1, 4, 1, 1, '2022-05-01 10:24:53', '2022-05-01 10:24:54'),
	(5, 5, 1, 1, 5, 1, 1, '2022-05-09 03:16:31', '2022-05-09 03:16:32'),
	(6, 6, 1, 1, 6, 1, 1, '2022-05-10 06:21:54', '2022-05-10 06:21:54'),
	(7, 7, 1, 1, 7, 1, 1, '2022-05-13 02:47:07', '2022-05-13 02:47:07'),
	(8, 1, 2, 1, 1, 1, 1, '2022-05-18 05:55:43', '2022-05-18 05:55:44'),
	(9, 8, 2, 1, 2, 1, 1, '2022-05-18 05:58:17', '2022-05-18 05:58:18'),
	(10, 9, 2, 1, 3, 1, 1, '2022-05-21 01:24:50', '2022-05-21 01:24:50'),
	(11, 6, 2, 1, 4, 1, 1, '2022-05-23 02:50:50', '2022-05-23 02:50:50'),
	(12, 1, 3, 1, 1, 1, 1, '2022-05-23 09:11:50', '2022-05-23 09:11:50'),
	(13, 10, 3, 1, 2, 1, 1, '2022-05-23 09:45:36', '2022-05-23 09:45:36'),
	(14, 11, 1, 1, 8, 1, 1, '2022-05-28 13:26:24', '2022-05-28 13:26:24');

-- Dumping structure for table siakad.ref_semester
CREATE TABLE IF NOT EXISTS `ref_semester` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_semester: ~8 rows (approximately)
INSERT INTO `ref_semester` (`id`, `name`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 'Semester 1', 1, 1, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(2, 'Semester 2', 1, 2, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(3, 'Semester 3', 1, 3, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(4, 'Semester 4', 1, 4, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(5, 'Semester 5', 1, 5, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(6, 'Semester 6', 1, 6, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(7, 'Semester 7', 1, 7, '2022-04-27 05:33:18', '2022-04-27 05:33:18'),
	(8, 'Semester 8', 1, 8, '2022-04-27 05:33:19', '2022-04-27 05:33:19');

-- Dumping structure for table siakad.ref_status_presence
CREATE TABLE IF NOT EXISTS `ref_status_presence` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `order` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.ref_status_presence: ~4 rows (approximately)
INSERT INTO `ref_status_presence` (`id`, `name`, `desc`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 'Hadir', 'H', 1, 1, '2022-05-25 01:11:31', '2022-05-25 01:11:31'),
	(2, 'Izin', 'I', 1, 2, '2022-05-25 01:11:31', '2022-05-25 01:11:31'),
	(3, 'Tidak Hadir', 'A', 1, 3, '2022-05-25 01:11:31', '2022-05-25 01:11:31'),
	(4, 'Sakit', 'S', 1, 4, '2022-05-25 01:11:31', '2022-05-25 01:11:31');

-- Dumping structure for table siakad.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `order` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='admin = adminsitrator / staff terkait\r\nuser     = mahasiswa\r\ndosen  = dosen pengajar';

-- Dumping data for table siakad.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', 1, 1, '2022-03-11 00:42:26', '2022-03-11 00:42:26'),
	(2, 'User', 'web', 1, 2, '2022-03-11 00:42:26', '2022-03-11 00:42:26'),
	(3, 'Dosen', 'web', 1, 3, '2022-05-05 16:41:39', '2022-05-05 16:41:39');

-- Dumping structure for table siakad.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table siakad.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidn` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` tinyint(4) NOT NULL DEFAULT 0,
  `user_active` int(11) NOT NULL DEFAULT 1,
  `user_order` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_created_by` int(11) DEFAULT NULL,
  `user_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `nim_unique` (`nim`),
  UNIQUE KEY `nidn_unique` (`nidn`),
  KEY `nidn` (`nidn`),
  KEY `nim` (`nim`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table siakad.users: ~14 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `nim`, `nidn`, `user_login`, `user_active`, `user_order`, `remember_token`, `created_at`, `updated_at`, `user_created_by`, `user_updated_by`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$7TDwz5BkOOJ1.Ndl5md4lej426teH59kQ927vuzjC74Pm1Gm.sbAW', NULL, NULL, 1, 1, 1, NULL, '2022-03-11 00:42:26', '2022-06-10 06:58:23', 1, 1),
	(2, 'User', 'user@gmail.com', NULL, '$2y$10$QQ0L/1eOF15Be8CL/3FCl.fKrxXYATvaaWbaniP0kcJCbpmN.8HcC', NULL, NULL, 0, 1, 2, NULL, '2022-03-11 00:42:27', '2022-03-11 00:42:27', 1, 1),
	(31, 'Fajar Subhan', 'fajarsubhan@gmail.com', NULL, '$2y$10$AmjIn1RjKiK0pzmVWlDswe3KRlVCpv1cAoH/hKd7dFqouMI1wM9fK', '202043500578', NULL, 0, 1, 1, NULL, '2022-05-09 02:30:32', '2022-06-10 06:46:41', 1, 1),
	(32, 'Fakih Sumawa', 'fakih@gmail.com', NULL, '$2y$10$38cyO48mKQs5XN/QAjTztOy8WEoijUXhMw8.NVF6ZBfiJzCTyqgTa', '202034592092', NULL, 0, 1, 1, NULL, '2022-05-09 05:34:57', '2022-06-01 05:40:35', 1, 1),
	(35, 'Siska Sari', 'siska@gmail.com', NULL, '$2y$10$LhFEqrrTaUz17OVxroSBEeVzsQuuiW0g8FuTRvTWZj8hdD93Ycvqa', '202043201923', NULL, 0, 1, 1, NULL, '2022-05-09 05:54:09', '2022-06-03 01:11:15', 1, 1),
	(36, 'Dina Andriani', 'dina@gmail.com', NULL, '$2y$10$qWkXs05vjmUyGJV31miYxOdzgGlRwg67X8WnMTwOGmekyJ5GaUQRe', '293923892212', NULL, 0, 1, 1, NULL, '2022-05-29 06:56:14', '2022-06-01 05:42:16', 1, 1),
	(38, 'Uci Lestari', 'uci@gmail.com', NULL, '$2y$10$GxIL/twnygudPynsfY4d7eGK0CJui54cyGqP7P1SZ/hRaCB3xR.Ci', '202043500537', NULL, 0, 1, 1, NULL, '2022-05-30 08:59:09', '2022-05-30 08:59:09', 1, NULL),
	(39, 'Rian Apriansyah', 'rian@gmail.com', NULL, '$2y$10$Vzm4uVzwFjUTMV/t4pitI.PVLE83AURlWkvR7rMVaF3EUwjOvRj9W', '202043500122', NULL, 0, 1, 1, NULL, '2022-05-30 09:00:22', '2022-05-30 09:00:22', 1, NULL),
	(40, 'Rudi Hermawan', 'rudi@gmail.com', NULL, '$2y$10$XZ.Kvuy5v6AHbXWQqM5V1eo7avNCcmhsbjMiM/uxOIkv6hCAMIOhq', '202043500145', NULL, 0, 1, 1, NULL, '2022-05-30 09:01:05', '2022-05-30 09:01:05', 1, NULL),
	(41, 'Rio Satrio', 'rio@gmail.com', NULL, '$2y$10$sdyGOhk9hkENdZREbcsRhukFYe/Vy3rADuUYgnGYHtO/VWC4iDfrS', '202043500865', NULL, 0, 1, 1, NULL, '2022-05-30 09:01:39', '2022-05-30 09:01:39', 1, NULL),
	(43, 'Dian Putri', 'dian_putri@gmail.com', NULL, '$2y$10$4MnVK/VRBaFbkpxfKafWB.thqxQB.6mmCIy8KafU5FBk1Zod4ccc.', '293923892345', NULL, 0, 1, 1, NULL, '2022-05-30 09:16:23', '2022-05-30 09:16:23', 1, NULL),
	(44, 'Leni Apriani', 'leni@gmail.com', NULL, '$2y$10$mhTyBAzRbY9WxjVp/uwtnuaZfC1jdRTsy090G/9ONWiZVa0pCooPi', '293923893145', NULL, 0, 1, 1, NULL, '2022-05-30 09:17:08', '2022-05-30 09:17:08', 1, NULL),
	(45, 'Suhendi S.Kom,M.Kom', 'suhendi@gmail.com', NULL, '$2y$10$TPcff6AiDojGsDfaUXcJm.WCBNU6JZ4alLCIFG6AL56GnA0OARhpW', NULL, '11281085011', 0, 1, 1, NULL, '2022-05-30 10:23:24', '2022-06-05 07:13:09', 1, NULL),
	(46, 'Durratul Hafizah M.Kom', 'durratul@gmail.com', NULL, '$2y$10$IE3iyx2vn6495L6gJf6JduxToepcNSanta8FYxpVZ8.kXhQoyyaD6', NULL, '11281085012', 0, 1, 1, NULL, '2022-05-30 10:24:35', '2022-05-30 10:24:35', 1, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
