-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 06:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainster_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$p4m2tH8EefYkLy.1xKrXjewNONacPMSQ70lhN.qVzqBautFANI8Jq');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_09_13_085135_create_projects_table', 1),
(11, '2023_09_13_110801_create_admin_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `subtitle`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Merakzy', 'https://blog.brainster.co/wp-content/uploads/2023/08/1200x628_Nosecka-1024x536.jpg', 'Академија за човечки ресурси', 'Vitae neque fugit iste atque et accusamus cumque. Error consequatur non cumque dolorem nisi. Ea non consectetur perspiciatis nulla.', 'https://blog.brainster.co/hr-zavrshen-proekt-merakzy/', NULL, NULL),
(3, 'Gift from Macedonia', 'https://blog.brainster.co/wp-content/uploads/2023/04/1200x628_Nosecka-1024x536.jpg', 'Академија за графички дизајн', 'Sequi eos libero ratione aut accusamus in qui. Temporibus quam in quaerat aut doloremque aliquid. Suscipit mollitia in a similique quia commodi. Quo fugiat cumque cupiditate rem quia qui nostrum.', 'https://blog.brainster.co/design-zavrsen-proekt-gift-from-macedonia/', NULL, NULL),
(4, 'Time Series Prediction of GDP Ratio', 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628_Tim3_Aleksandra-1024x536.jpg', 'Академија за Data Science', 'Voluptatem mollitia provident architecto enim ut. Laboriosam sed dicta rerum veritatis quos velit. Eum hic hic error ullam consequatur.', 'https://blog.brainster.co/data-zavrsen-gdp-ratio/', NULL, NULL),
(5, 'Time Series Prediction', 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628_Nosecka-1-1024x536.jpg', 'Академија за Data Science', 'Laborum quam et atque. Doloremque nam itaque eos suscipit velit architecto. Perspiciatis fugiat similique cupiditate sit. Repellendus iste repellat quibusdam id deserunt.', 'https://blog.brainster.co/data-zavrsen-proekt-bdp/', NULL, NULL),
(6, 'NLP', 'https://blog.brainster.co/wp-content/uploads/2023/03/1200x628-1024x536.jpg', 'Академија за Data Science', 'Rerum est quas nihil tenetur earum dolores blanditiis. Doloremque quod officia sed sint repellendus. Iste quia repellendus nesciunt.', 'https://blog.brainster.co/data-zavrsen-proekt-nlp/', NULL, NULL),
(7, 'Дента ЕС', 'https://blog.brainster.co/wp-content/uploads/2023/02/1200x628_Nosecka-min-1024x536.png', 'Академија за дигитален маркетинг', 'Ut quia et dicta corrupti repudiandae vel totam. Rem aut facilis ratione quibusdam et et. Velit quasi ut aut odit.', 'https://blog.brainster.co/marketing-proekt-dentaes/', NULL, NULL),
(8, 'Common.mk', 'https://blog.brainster.co/wp-content/uploads/2022/08/220811_1200x628_Nosecka-1024x536.jpg', 'Академија за дигитален маркетинг', 'Et facilis quia sit omnis earum. Distinctio aspernatur quidem qui fuga id distinctio. Explicabo pariatur laudantium ut sint consequatur laborum porro. Quo reiciendis perferendis sed voluptatem cum.', 'https://blog.brainster.co/marketing-zavrsen-proekt-common-petar/', NULL, NULL),
(9, 'Author Detection (NLP)', 'https://blog.brainster.co/wp-content/uploads/2022/05/220517_1200x628_Nosecka-1024x536.jpg', 'Академија за Data Science', 'A dolores ducimus id omnis qui laboriosam animi. Exercitationem et et voluptatem autem. Mollitia molestiae debitis omnis neque commodi saepe amet. Adipisci amet rerum ullam voluptate.', 'https://blog.brainster.co/data-zavrsen-proekt-author-detection/', NULL, NULL),
(12, 'Абилити', 'https://blog.brainster.co/wp-content/uploads/2023/06/1200x628_Nosecka_opt-1024x536.jpg', 'Академија за графички дизајн', 'Fuga iusto facere ut reprehenderit. Aliquid non facilis sit hic dignissimos facere non harum. Tempora deserunt optio odit et.', 'https://blog.brainster.co/design-zavrsen-proekt-abiliti/', '2023-09-16 14:43:23', '2023-09-16 14:43:23');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
