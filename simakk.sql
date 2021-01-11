-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2021 at 01:26 AM
-- Server version: 8.0.22
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simakk`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answers_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answers_id`, `email`, `questionnaire_id`, `created_at`, `updated_at`) VALUES
('0tyVaftEnUsTh2eAODTOjd3qq1g9cvD7JtNMERK3-m10w', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:14:34', '2021-01-04 22:14:34'),
('893ZPzk3tzL6ONTq7DJhXIG0inzVlN8RMQbXmkG3C6Ved', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:25:30', '2021-01-04 22:25:30'),
('AVb9QKij7ubeyquI-xC2JkbbL7JnRjxv3ItUMeQU5Ttbi', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:03:17', '2021-01-04 22:03:17'),
('ILBFeG9dozM4QfYQmcJRsCvO361545ZjET7ky4OtgGLPM', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:25:43', '2021-01-04 22:25:43'),
('nOId1FY4hEOZ9l9byZM9dqcPfAwc-9dzimeNluN508ewp', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:02:55', '2021-01-04 22:02:55'),
('T6bc6IKvMr8QfffuAzc5BIuTPWEsoOgrak0FVsmmptoci', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:26:21', '2021-01-04 22:26:21'),
('VYCHJjt7QFyHQs8qDF7NaeEyVJ-usYPraFfpUXPKniVsM', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:26:05', '2021-01-04 22:26:05'),
('WQESft-Cf8iQAM4ecXs4dDL-pua1zoAXtkANtSyDO8cqn', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:27:41', '2021-01-04 22:27:41'),
('ZNJ1J8Azg2PmzWs-50J3i53LDF1KMbnB1LDCtOZM3LVm8', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', '2021-01-04 22:27:57', '2021-01-04 22:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `answers_content`
--

CREATE TABLE `answers_content` (
  `id` bigint UNSIGNED NOT NULL,
  `answers_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers_content`
--

INSERT INTO `answers_content` (`id`, `answers_id`, `questionnaire_id`, `question_id`, `question_type`, `answer`, `created_at`, `updated_at`) VALUES
(46, 'nOId1FY4hEOZ9l9byZM9dqcPfAwc-9dzimeNluN508ewp', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari informasi', '2021-01-04 22:02:55', '2021-01-04 22:02:55'),
(47, 'nOId1FY4hEOZ9l9byZM9dqcPfAwc-9dzimeNluN508ewp', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Youtube', '2021-01-04 22:02:55', '2021-01-04 22:02:55'),
(48, 'nOId1FY4hEOZ9l9byZM9dqcPfAwc-9dzimeNluN508ewp', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '3', '2021-01-04 22:02:56', '2021-01-04 22:02:56'),
(49, '0tyVaftEnUsTh2eAODTOjd3qq1g9cvD7JtNMERK3-m10w', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-01-04 22:25:10', '2021-01-04 22:25:10'),
(50, '0tyVaftEnUsTh2eAODTOjd3qq1g9cvD7JtNMERK3-m10w', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Youtube', '2021-01-04 22:25:11', '2021-01-04 22:25:11'),
(51, '0tyVaftEnUsTh2eAODTOjd3qq1g9cvD7JtNMERK3-m10w', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '2', '2021-01-04 22:25:11', '2021-01-04 22:25:11'),
(52, '893ZPzk3tzL6ONTq7DJhXIG0inzVlN8RMQbXmkG3C6Ved', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info', '2021-01-04 22:25:30', '2021-01-04 22:25:30'),
(53, '893ZPzk3tzL6ONTq7DJhXIG0inzVlN8RMQbXmkG3C6Ved', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'TikTok', '2021-01-04 22:25:30', '2021-01-04 22:25:30'),
(54, '893ZPzk3tzL6ONTq7DJhXIG0inzVlN8RMQbXmkG3C6Ved', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '1', '2021-01-04 22:25:30', '2021-01-04 22:25:30'),
(55, 'ILBFeG9dozM4QfYQmcJRsCvO361545ZjET7ky4OtgGLPM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info', '2021-01-04 22:25:43', '2021-01-04 22:25:43'),
(56, 'ILBFeG9dozM4QfYQmcJRsCvO361545ZjET7ky4OtgGLPM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Twitter', '2021-01-04 22:25:43', '2021-01-04 22:25:43'),
(57, 'ILBFeG9dozM4QfYQmcJRsCvO361545ZjET7ky4OtgGLPM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '1', '2021-01-04 22:25:44', '2021-01-04 22:25:44'),
(58, 'VYCHJjt7QFyHQs8qDF7NaeEyVJ-usYPraFfpUXPKniVsM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info Tempat mencari info', '2021-01-04 22:26:06', '2021-01-04 22:26:06'),
(59, 'VYCHJjt7QFyHQs8qDF7NaeEyVJ-usYPraFfpUXPKniVsM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Instagram', '2021-01-04 22:26:06', '2021-01-04 22:26:06'),
(60, 'VYCHJjt7QFyHQs8qDF7NaeEyVJ-usYPraFfpUXPKniVsM', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '3', '2021-01-04 22:26:06', '2021-01-04 22:26:06'),
(61, 'T6bc6IKvMr8QfffuAzc5BIuTPWEsoOgrak0FVsmmptoci', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info Tempat mencari info', '2021-01-04 22:26:21', '2021-01-04 22:26:21'),
(62, 'T6bc6IKvMr8QfffuAzc5BIuTPWEsoOgrak0FVsmmptoci', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Youtube', '2021-01-04 22:26:21', '2021-01-04 22:26:21'),
(63, 'T6bc6IKvMr8QfffuAzc5BIuTPWEsoOgrak0FVsmmptoci', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 38, 'Skala Linier', '1', '2021-01-04 22:26:21', '2021-01-04 22:26:21'),
(64, 'WQESft-Cf8iQAM4ecXs4dDL-pua1zoAXtkANtSyDO8cqn', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info Tempat mencari info', '2021-01-04 22:27:41', '2021-01-04 22:27:41'),
(65, 'WQESft-Cf8iQAM4ecXs4dDL-pua1zoAXtkANtSyDO8cqn', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Instagram', '2021-01-04 22:27:41', '2021-01-04 22:27:41'),
(67, 'ZNJ1J8Azg2PmzWs-50J3i53LDF1KMbnB1LDCtOZM3LVm8', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 36, 'Jawaban Singkat', 'Tempat mencari info Tempat mencari info Tempat mencari info Tempat mencari info', '2021-01-04 22:27:58', '2021-01-04 22:27:58'),
(68, 'ZNJ1J8Azg2PmzWs-50J3i53LDF1KMbnB1LDCtOZM3LVm8', 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 37, 'Pilihan Ganda', 'Twitter', '2021-01-04 22:27:58', '2021-01-04 22:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Kepuasan Layanan - Mahasiswa'),
(2, 'Kepuasan Layanan  - Staf'),
(3, 'Kepuasan Layanan  - Dosen'),
(4, 'Lainnya');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_22_104116_create_teams_table', 1),
(5, '2020_11_23_033846_add_google_id_column', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(10, '2020_12_01_133019_questionnaires', 4),
(14, '2020_12_05_102153_question_type', 5),
(15, '2020_12_06_043228_skala_linier', 6),
(16, '2020_12_06_140351_multiple_choice', 7),
(17, '2020_12_08_034752_categories', 8),
(18, '2020_12_19_053303_templates', 9),
(19, '2020_12_02_082443_questions', 10),
(20, '2021_01_02_135841_answers', 11),
(21, '2021_01_02_141212_answers_content', 11);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice`
--

CREATE TABLE `multiple_choice` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `choice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiple_choice`
--

INSERT INTO `multiple_choice` (`id`, `question_id`, `choice`) VALUES
(101, 37, 'Youtube'),
(102, 37, 'TikTok'),
(103, 37, 'Instagram'),
(104, 37, 'Twitter');

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
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `questionnaire_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_status` enum('enable','disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disabled',
  `questionnaire_type` enum('draf','publish') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draf',
  `setting_campus_response` tinyint(1) NOT NULL DEFAULT '0',
  `setting_single_response` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`questionnaire_id`, `questionnaire_title`, `questionnaire_description`, `questionnaire_status`, `questionnaire_type`, `setting_campus_response`, `setting_single_response`, `created_at`, `updated_at`) VALUES
('n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 'Apa yang Anda suka?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'enable', 'publish', 1, 0, '2021-01-04 21:57:55', '2021-01-09 03:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` bigint UNSIGNED NOT NULL,
  `questionnaire_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_content` text COLLATE utf8mb4_unicode_ci,
  `question_type` enum('Pilihan Ganda','Skala Linier','Jawaban Singkat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Skala Linier',
  `question_index` tinyint DEFAULT NULL,
  `question_require` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `questionnaire_id`, `question_content`, `question_type`, `question_index`, `question_require`, `created_at`, `updated_at`) VALUES
(36, 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 'Apa yang dimaksud internet?', 'Jawaban Singkat', NULL, 1, '2021-01-04 21:58:21', '2021-01-04 21:58:21'),
(37, 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 'Apa yang Anda suka?', 'Pilihan Ganda', NULL, 1, '2021-01-04 21:58:48', '2021-01-04 21:58:48'),
(38, 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 'Seberapa setuju Anda jika YouTube diblokir di Indonesia?', 'Skala Linier', NULL, 1, '2021-01-04 22:00:11', '2021-01-04 22:00:11'),
(55, 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX', 'Ketikan pertanyaan Anda di sini...', 'Skala Linier', NULL, 1, '2021-01-09 01:10:05', '2021-01-09 01:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `type`) VALUES
(1, 'Pilihan Ganda'),
(2, 'Skala Linier'),
(3, 'Jawaban Singkat');

-- --------------------------------------------------------

--
-- Table structure for table `skala_linier`
--

CREATE TABLE `skala_linier` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `minimum` int NOT NULL DEFAULT '1',
  `maximum` int NOT NULL DEFAULT '5',
  `label_minimum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_maximum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skala_linier`
--

INSERT INTO `skala_linier` (`id`, `question_id`, `minimum`, `maximum`, `label_minimum`, `label_maximum`) VALUES
(43, 38, 1, 5, 'Sangat tidak setuju', 'Sangat setuju'),
(49, 55, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` bigint UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_job`, `team_bio`, `team_email`, `team_phone`, `team_city`, `team_picture`, `created_at`, `updated_at`) VALUES
(1, 'Dede Fuji Abdul', 'Programmer', 'I\'m a simple people and i will make everything look simple', 'defuj.official@gmail.com', '+6282240643661', 'SUMEDANG', 'defuj.jpg', NULL, NULL),
(2, 'Ari Nur Ismail', 'Database Designer', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL),
(3, 'Hizkia Cakra Fitra', 'UI Designer', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL),
(4, 'Arif Faizal Rahman', 'Tester', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL),
(5, 'Elsa Nur Santi', 'Sistem Analyst', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL),
(6, 'Yulia Wulandari', 'Sistem Analyst', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL),
(7, 'Candra Cumarya', 'Tester', 'I\'m a simple people and i will make everything look simple', '', '+628xxxxxxxxxx', 'SUMEDANG', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `questionnaire_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `category_id`, `questionnaire_id`) VALUES
(10, 4, 'n5HAcfahv652CZEd12Ir2dJelqbN5mp88G9PavK3lEqVX');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` enum('default','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `token`, `access`, `google_id`, `avatar`, `created_at`, `updated_at`) VALUES
(5, 'Dede Fuji Abdul', 'a2.1700029@mhs.stmik-sumedang.ac.id', 'ya29.a0AfH6SMBHlYrgyHlt-l8e3H7ZX-bpRap3tt8EvEWkp4wJYwESwOwOQHofpb2MyypPm0UV1udZ-ofa64pkJtqPi9YAK3hHK7gr-kRcz3-K-MkrwhxmMqn-uhEYoc1II4trR50_Ftv23bgqJ6Lw-wMjyAerFfEtnpSwWAdvJ4To5FyQ', 'admin', '113636215636768418061', 'https://lh3.googleusercontent.com/a-/AOh14GjLEap-Uky4mfs3MZ8lBugW-Kl8jcgle6Xumf3b=s96-c', '2008-08-19 23:04:52', '2008-08-19 23:04:52'),
(6, 'Binokasi Global Teknologi', 'binokasihglobalteknologi@gmail.com', 'ya29.a0AfH6SMCJXD8CgL0BAsMF9IBLsBqFoQZ93LDFDXROqFwCgzG3M8gSKh9HlawKPSa0xVrE22lOv9PGiI0mEmfls2Qxpm04uouck51h3e5AIHXgSUhpBqnL4dU3OKsxrLC6lzBBjGOBYxWN9sBvFFXwPP7WNx7l9k62QExcFJd1dLg', 'default', '110080399378377855803', 'https://lh3.googleusercontent.com/a-/AOh14GgnhNyBYoKdJritKeu27y9rlEgLtZ_mJK1WYlqL=s96-c', '2008-05-23 10:17:21', '2008-05-23 10:17:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answers_id`),
  ADD KEY `answers_email_index` (`email`),
  ADD KEY `answers_questionnaire_id_index` (`questionnaire_id`);

--
-- Indexes for table `answers_content`
--
ALTER TABLE `answers_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_content_answers_id_index` (`answers_id`),
  ADD KEY `answers_content_questionnaire_id_index` (`questionnaire_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`questionnaire_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_questionnaire_id_index` (`questionnaire_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skala_linier`
--
ALTER TABLE `skala_linier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
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
-- AUTO_INCREMENT for table `answers_content`
--
ALTER TABLE `answers_content`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skala_linier`
--
ALTER TABLE `skala_linier`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
