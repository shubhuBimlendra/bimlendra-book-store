-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 08:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futuresoftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `nationality`, `phone_number`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 'Bimlendra Yadav', 'Nepal', '9812345699', '1998-03-30', '2023-07-29 03:44:18', '2023-07-29 04:01:10'),
(3, 'Saroj Yadav', 'USA', '9889345699', '1999-11-29', '2023-07-29 12:14:58', '2023-07-29 12:14:58'),
(4, 'Raghav Yadav', 'Nepal', '9889988998', '1994-07-30', '2023-07-30 01:01:58', '2023-07-30 01:01:58'),
(5, 'John', 'Australia', '9876578799', '1999-03-30', '2023-07-30 06:28:41', '2023-07-30 06:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `author_book`
--

CREATE TABLE `author_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_book`
--

INSERT INTO `author_book` (`id`, `author_id`, `book_id`, `created_at`, `updated_at`) VALUES
(7, 1, 4, NULL, NULL),
(8, 4, 4, NULL, NULL),
(9, 1, 4, NULL, NULL),
(10, 3, 4, NULL, NULL),
(11, 1, 15, NULL, NULL),
(12, 3, 15, NULL, NULL),
(13, 1, 14, NULL, NULL),
(14, 4, 14, NULL, NULL),
(15, 1, 13, NULL, NULL),
(16, 3, 13, NULL, NULL),
(17, 1, 12, NULL, NULL),
(18, 4, 12, NULL, NULL),
(19, 1, 11, NULL, NULL),
(20, 4, 11, NULL, NULL),
(21, 3, 10, NULL, NULL),
(22, 4, 10, NULL, NULL),
(23, 1, 9, NULL, NULL),
(24, 4, 9, NULL, NULL),
(25, 1, 8, NULL, NULL),
(26, 3, 8, NULL, NULL),
(27, 4, 8, NULL, NULL),
(30, 3, 7, NULL, NULL),
(31, 4, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `qty` bigint(20) NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `category_id`, `author_id`, `added_by`, `updated_by`, `price`, `discount`, `qty`, `edition`, `language`, `publication_date`, `isbn`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Introspecting Change', 'Introspecting Change: Nepal’s Economic Awakening is a publication by Nepal Economic Forum.', 2, NULL, 'Bimlendra Yadav', 'Bimlendra Yadav', '300.00', '10.00', 13, '1st', 'English', '2023-07-07', '86876877', '1690718527.jpg', '2023-07-30 06:02:56', '2023-07-30 06:17:07'),
(6, 'doloremque nesciunt', 'Qui aut autem explicabo amet voluptas in.', 4, 4, 'Miss Taryn Welch', 'NAN', '94.68', '33.77', 82, 'ut', 'or', '1989-09-07', '9789662031720', 'book-5.jpg', '2023-07-30 06:54:24', '2023-07-30 06:54:24'),
(7, 'Updated Book Title', 'This is an updated book description.', 2, 1, 'Isabel Schinner DVM', 'NAN', '39.99', '10.00', 100, 'Second Edition', 'Spanish', '2023-08-15', '978-9-876543-21-0', 'book-2.jpg', '2023-07-30 06:54:24', '2023-07-30 11:12:26'),
(8, 'laboriosam eligendi', 'Excepturi est rerum ab laborum veritatis recusandae consequatur.', 5, 5, 'Parker Denesik', 'Bimlendra Yadav', '498.87', '40.17', 28, 'sit', 'kl', '2006-03-23', '9784150838089', '1690726489.jpg', '2023-07-30 06:54:24', '2023-07-30 08:29:49'),
(9, 'veniam laborum', 'Aliquam ea ullam minus dolores rerum magni quaerat.', 6, 1, 'Brandi Robel', 'Bimlendra Yadav', '344.23', '46.80', 68, 'natus', 'cy', '2003-07-10', '9788146804485', '1690726452.png', '2023-07-30 06:54:24', '2023-07-30 08:29:12'),
(10, 'voluptatem itaque', 'Quia ab minus aut ipsam dicta voluptas sunt.', 2, 3, 'Prof. Lewis Runolfsdottir', 'Bimlendra Yadav', '370.56', '14.07', 14, 'magni', 'jv', '1997-11-01', '9790596001406', '1690726363.jpg', '2023-07-30 06:54:24', '2023-07-30 08:27:43'),
(11, 'amet sapiente', 'Molestias enim nesciunt fugiat quod voluptatem.', 3, 3, 'Wyatt Reichel', 'Bimlendra Yadav', '297.01', '22.85', 59, 'necessitatibus', 'id', '2001-06-03', '9790647023685', '1690726316.jpg', '2023-07-30 06:54:24', '2023-07-30 08:26:56'),
(12, 'sint temporibus', 'Sit asperiores autem assumenda modi accusantium aut et culpa.', 5, 4, 'Kristofer Heller', 'Bimlendra Yadav', '360.80', '13.38', 11, 'atque', 'uz', '2009-08-17', '9787609165767', '1690726273.jpg', '2023-07-30 06:54:24', '2023-07-30 08:26:13'),
(13, 'quos rerum', 'Doloremque ipsa sint ducimus nobis aut. Qui quam ut consequatur.', 6, 1, 'Jacinthe Murazik', 'Bimlendra Yadav', '82.59', '9.12', 82, 'impedit', 'za', '1989-02-01', '9790809063283', '1690726240.jpg', '2023-07-30 06:54:24', '2023-07-30 08:25:40'),
(14, 'praesentium molestias', 'Perferendis omnis velit cumque provident.', 3, 3, 'Mrs. Aglae Turner Jr.', 'Bimlendra Yadav', '241.99', '28.69', 76, 'magnam', 'ku', '1978-06-27', '9786925827779', '1690726213.jpg', '2023-07-30 06:54:24', '2023-07-30 08:25:13'),
(15, 'error nihil', 'Velit tenetur est dolorem ut a enim rerum.', 5, 4, 'Stacy Bashirian', 'Bimlendra Yadav', '500.81', '30.40', 51, 'asperiores', 'sr', '1971-08-12', '9785394239083', '1690726088.jpg', '2023-07-30 06:54:24', '2023-07-30 08:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Fiction', '2023-07-28 08:39:08', '2023-07-28 08:39:08'),
(3, 'Biography&Memoirs', '2023-07-30 06:25:18', '2023-07-30 06:25:18'),
(4, 'Poetry Short Stories', '2023-07-30 06:26:30', '2023-07-30 06:26:30'),
(5, 'Literature/Essays', '2023-07-30 06:26:48', '2023-07-30 06:26:48'),
(6, 'Health & Fitness', '2023-07-30 06:27:05', '2023-07-30 06:27:05');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_28_133025_create_categories_table', 2),
(6, '2023_07_29_073654_create_authors_table', 3),
(7, '2023_07_29_075654_create_books_table', 4),
(8, '2023_07_29_083048_create_books_table', 5),
(9, '2023_07_30_064043_create_author_books_table', 6),
(10, '2023_07_30_091458_create_books_table', 7),
(11, '2023_07_30_095353_create_author_books_table', 8),
(12, '2023_07_30_095802_create_author_books_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CST',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Bimlendra Yadav', 'bimlendrayadav2075@gmail.com', NULL, '$2y$10$HqKn18p1l4mg/bW43W4KXuPJSfIF2L6mpK.KIe.mnwzSahoIQQU7u', NULL, '1', '2023-07-28 06:44:46', '2023-07-28 06:44:46'),
(2, 'Future Soft', 'futuresoft99@gmail.com', NULL, '$2y$10$FnQnIwz8e1Xm9.Uj4fZKH.WyQc2xGnOFqou4hV79g7W7nWuu87bM6', NULL, 'CST', '2023-07-28 06:51:20', '2023-07-28 06:51:20'),
(3, 'Raghav Yadav', 'user@user.com', NULL, '$2y$10$wgBJVi8WLWxk6HHlifotUOWotmH9CjZ.v13SlpWPf1ZslB6GOm8TC', NULL, 'CST', '2023-07-30 12:23:28', '2023-07-30 12:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_book_author_id_foreign` (`author_id`),
  ADD KEY `author_book_book_id_foreign` (`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `author_book`
--
ALTER TABLE `author_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `author_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
