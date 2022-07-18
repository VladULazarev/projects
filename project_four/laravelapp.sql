-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2022 at 05:13 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `slug`, `tags`, `excerpt`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'dignissimos', 'php, html', 'Dolores omnis repudiandae quae recusandae sed.', 'Praesentium sapiente voluptatum fugiat eligendi.', 'Voluptate natus et eius consequatur. Quia aut laudantium repellat sapiente itaque ab. Molestiae sint sed voluptate. Repellendus id esse expedita ratione voluptatibus ullam expedita. Nihil a corrupti est ab culpa aspernatur eum inventore. Consectetur vel pariatur maxime error et. Autem fugiat neque debitis possimus et qui. Dolores est aut laborum animi sequi quasi. Nobis sint quisquam beatae. Unde atque cupiditate facere sunt odio placeat sed. Sit occaecati magni cumque ratione ab. Quia veritatis ad possimus molestiae ea aut consequatur voluptatem. Similique hic possimus aut rerum quis quia excepturi maxime.', '2022-07-16 11:29:53', '2022-07-16 15:49:18'),
(2, 2, 'nula', 'html, css', 'Modi et ut aspernatur dolores.', 'Quae ea sint eum fuga sint.', 'Optio tenetur dolorem debitis repellendus. Id dolorem modi hic nemo velit et natus. Aut quidem velit quaerat voluptate. Alias et dolorem et qui repellat quod non. Magni est sit iure repudiandae officiis numquam et tenetur. Dolorem rerum alias vitae in doloremque. Ipsam repellat nam quasi voluptas possimus. Eos aut iure sint ad. Dolorem alias sit et accusamus. Magnam qui praesentium quaerat qui autem. Laborum voluptatum voluptatum reprehenderit.', '2022-07-16 11:30:04', '2022-07-17 17:34:17'),
(3, 2, 'debitis', 'laravel, php', 'Aliquam amet molestiae et et corrupti suscipit.', 'Qui aut nihil vel rerum culpa suscipit.', 'Distinctio autem similique beatae sed ut et ipsum. Adipisci natus id molestiae omnis quo tempora laborum. Aut error voluptatem beatae aliquid accusamus nostrum. Cumque quia natus enim veniam accusantium expedita. Officiis explicabo aperiam modi nostrum eum fuga aspernatur. Sit perferendis enim ad ipsam. Rerum molestias necessitatibus quod quos autem numquam dolor. Quos ratione repellendus voluptatem sunt.', '2022-07-16 11:30:04', '2022-07-18 11:09:11'),
(4, 2, 'sint', 'css', 'Dignissimos distinctio facilis occaecati.', 'Neque tempora sed distinctio maxime ut ullam autem.', 'Vel minima velit explicabo est cupiditate repellat autem. Consequatur aut nostrum tempora rerum deserunt et nulla nobis. Dicta ullam sed in dicta reiciendis aut. Aliquam repudiandae iste unde tenetur voluptas quaerat. Vitae sit exercitationem dignissimos. Iure necessitatibus quo est exercitationem repudiandae. Voluptas enim eveniet quidem laborum autem. Nobis quod dolor esse vel suscipit. Totam ut necessitatibus alias repellat fugiat aspernatur. Consectetur ut et cumque et. Molestiae dignissimos illum placeat dolores. Commodi et et possimus voluptas perspiciatis. Reiciendis iste dolor corporis iure.', '2022-07-16 11:30:04', '2022-07-16 11:30:04'),
(5, 2, 'biuf', 'php, css', 'Est maiores tenetur sint fuga doloremque repellat.', 'Saepe praesentium adipisci qui quidem', 'Dolorem rerum doloremque unde labore. Quas voluptatem sunt ducimus architecto quo rerum. Id qui aspernatur ad delectus odio. Corrupti non dolores placeat et recusandae dolorem et. Accusamus quo reiciendis excepturi quis reprehenderit rem. Accusantium itaque eos omnis voluptatum aut. Qui iste ad explicabo delectus soluta aut dolores. Cumque velit aperiam totam vel dicta ducimus soluta pariatur. Omnis numquam quia aperiam eum maiores placeat recusandae. Doloribus cum error molestiae quidem doloremque.', '2022-07-16 11:30:04', '2022-07-16 13:44:07'),
(6, 2, 'quibusdam', 'html', 'Necessitatibus voluptatem qui rerum error sed.', 'Et sint eos sed laudantium ea quidem omnis ut.', 'Earum quam voluptatem aliquam consequatur et voluptatem exercitationem. Aliquam sint nam qui eos. Officia explicabo eum et nesciunt tempora. Aut sit aut consectetur quia culpa dolores pariatur. Molestias saepe ullam ducimus. Aut sint eos ut voluptatibus at. Modi quam nesciunt adipisci voluptatem. Qui animi est ut quod perferendis. Alias qui dolorum delectus asperiores. Qui sunt ut ea tenetur ut placeat. Dolorem occaecati recusandae architecto. Est eos eum assumenda distinctio eos veniam est.', '2022-07-16 11:30:04', '2022-07-16 11:30:04'),
(7, 2, 'et-dfg', 'js, css', 'Perspiciatis quasi sint accusamus vitae aut.', 'Odio sunt rem commodi nesciunt omnis enim.', 'Reiciendis debitis dolorem sint deleniti. Rerum magnam eius ad quia provident voluptas. Odio id ipsum iure porro. Repudiandae voluptate nisi praesentium officia nam suscipit quas. Sit cumque eius aut tempore ea. Quisquam dolorum atque voluptates quidem sit hic. Dolorem quas voluptates omnis inventore atque occaecati dicta. Labore aspernatur non est eos quia ullam sed qui. Ut eveniet quod id quo inventore nobis perferendis pariatur. Libero consectetur cum a sunt non libero. Molestias quidem laborum ut aperiam quas ipsam facilis. Et iusto eaque temporibus est perspiciatis ut culpa.', '2022-07-16 11:30:04', '2022-07-16 11:30:04'),
(8, 1, 'test-slug', 'laravel, php, xml', 'Repellendus id esse expedita rationedfgfhh', 'Accusamus quo reiciendis excepturi quis reprehe ondhh', 'Quia aut laudantium repellat sapiente itaque ab. Molestiae sint sed voluptate. Repellendus id esse expedita ratione voluptatibus ullam expedita. Nihil a corrupti est ab culpa aspernatur eum inventore. Consectetur vel pariatur maxime error et. Autem fugiat neque debitis possimus et qui. Dolores est aut laborum animi sequi quasi. Nobis sint quisquam beatae. Unde atque cupiditate facere sunt odio placeat sed. Sit occaecati magni cumque ratione ab. Quia veritatis ad possimus molestiae ea aut consequatur voluptatem. Similique hic possimus aut rerum quis quia excepturi maxime.', '2022-07-16 14:51:39', '2022-07-17 16:27:38'),
(9, 1, 'sdffds', 'js, html', 'Iure necessitatibus quo est exercitationem repudiandae', 'Sit cumque eius aut tempore ea. Quisquam dolorum', 'Dolorem rerum doloremque unde labore. Quas voluptatem sunt ducimus architecto quo rerum. Id qui aspernatur ad delectus odio. Corrupti non dolores placeat et recusandae dolorem et. Accusamus quo reiciendis excepturi quis reprehenderit rem. Accusantium itaque eos omnis voluptatum aut. Qui iste ad explicabo delectus soluta aut dolores. Cumque velit aperiam totam vel dicta ducimus soluta pariatur. Omnis numquam quia aperiam eum maiores placeat recusandae. Doloribus cum error molestiae quidem doloremque.', '2022-07-16 15:45:51', '2022-07-16 15:45:51'),
(10, 1, 'yasdsas-sdf', 'js, css', 'Eos aut iure sint ad. Dolorem alias sit et accusam', 'Cumque velit aperiam totam vel dicta ducimus soluta pariatur.', 'Vel minima velit explicabo est cupiditate repellat autem. Consequatur aut nostrum tempora rerum deserunt et nulla nobis. Dicta ullam sed in dicta reiciendis aut. Aliquam repudiandae iste unde tenetur voluptas quaerat. Vitae sit exercitationem dignissimos. Iure necessitatibus quo est exercitationem repudiandae. Voluptas enim eveniet quidem laborum autem. Nobis quod dolor esse vel suscipit. Totam ut necessitatibus alias repellat fugiat aspernatur. Consectetur ut et cumque et. Molestiae dignissimos illum placeat dolores. Commodi et et possimus voluptas perspiciatis. Reiciendis iste dolor corporis iures. wwww', '2022-07-16 15:52:09', '2022-07-17 16:19:28'),
(11, 1, 'sdfhj', 'html', 'Consectetur ut et cumque et. Molestiae dignissimos illum placeat dolores', 'Totam ut necessitatibus alias repellat fugiat', 'Dicta ullam sed in dicta reiciendis aut. Aliquam repudiandae iste unde tenetur voluptas quaerat. Vitae sit exercitationem dignissimos. Iure necessitatibus quo est exercitationem repudiandae. Voluptas enim eveniet quidem laborum autem. Nobis quod dolor esse vel suscipit. Totam ut necessitatibus alias repellat fugiat aspernatur. Consectetur ut et cumque et. Molestiae dignissimos illum placeat dolores. Commodi et et possimus voluptas perspiciatis. Reiciendis iste dolor corporis iure.', '2022-07-17 16:34:29', '2022-07-17 16:35:52'),
(12, 1, 'sdsdff', 'php, css, html', 'Quia veritatis ad possimus molestiae ea aut consequatur voluptatem.', 'Sit occaecati magni cumque ratione ab. Quia veritatis ad possimus molestiae', 'Nihil a corrupti est ab culpa aspernatur eum inventore. Consectetur vel pariatur maxime error et. Autem fugiat neque debitis possimus et qui. Dolores est aut laborum animi sequi quasi. Nobis sint quisquam beatae. Unde atque cupiditate facere sunt odio placeat sed. Sit occaecati magni cumque ratione ab. Quia veritatis ad possimus molestiae ea aut consequatur voluptatem. Similique hic possimus aut rerum quis quia excepturi maxime.', '2022-07-18 08:15:20', '2022-07-18 10:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2022_07_16_113338_create_articles_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jone Dow', 'cremin.trace@example.net', '2022-07-16 09:51:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wumjRdT3nk', '2022-07-16 09:51:07', '2022-07-16 09:51:07'),
(2, 'Jane Beem', 'dovie.christiansen@example.net', '2022-07-16 09:51:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1Fn0coqhxM', '2022-07-16 09:51:07', '2022-07-16 09:51:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
