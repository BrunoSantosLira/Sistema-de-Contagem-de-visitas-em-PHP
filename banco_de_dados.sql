-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Mar-2023 às 22:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_de_dados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clicks2`
--

CREATE TABLE `clicks2` (
  `referrer` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `clicked_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clicks2`
--

INSERT INTO `clicks2` (`referrer`, `ip`, `id`, `site_id`, `clicked_at`) VALUES
('http://localhost:8080/index.php', '::1', 96, 1, '2023-03-26 10:11:24'),
('http://localhost:8080/teste1.html', '::1', 97, 2, '2023-03-26 10:11:32'),
('http://localhost:8080/teste2.html', '::1', 98, 3, '2023-03-26 10:11:33'),
('http://localhost:8080/teste1.html', '::1', 99, 2, '2023-03-26 10:12:02'),
('http://localhost:8080/teste1.html', '::1', 100, 2, '2023-03-26 10:12:12'),
('http://localhost:8080/teste1.html', '::1', 101, 2, '2023-03-26 10:12:13'),
('http://localhost:8080/teste2.html', '::1', 102, 3, '2023-03-26 10:12:22'),
('http://localhost:8080/index.php', '::1', 103, 1, '2023-03-26 10:12:31'),
('http://localhost:8080/index.php', '::1', 104, 1, '2023-03-26 10:15:46'),
('http://localhost:8080/teste1.html', '::1', 105, 2, '2023-03-26 10:15:50'),
('http://localhost:8080/teste2.html', '::1', 106, 3, '2023-03-26 10:16:03'),
('http://localhost:8080/index.php', '::1', 107, 1, '2023-03-26 10:16:54'),
('http://localhost:8080/index.php', '::1', 108, 1, '2023-03-26 10:17:15'),
('http://localhost:8080/index.php', '::1', 109, 1, '2023-03-26 10:17:29'),
('http://localhost:8080/index.php', '::1', 110, 1, '2023-03-26 10:20:05'),
('http://localhost:8080/index.php', '::1', 111, 1, '2023-03-26 10:20:06'),
('http://localhost:8080/index.php', '::1', 112, 1, '2023-03-26 10:20:41'),
('http://localhost:8080/index.php', '::1', 113, 1, '2023-03-26 10:20:57'),
('http://localhost:8080/index.php', '::1', 114, 1, '2023-03-26 10:21:12'),
('http://localhost:8080/index.php', '::1', 115, 1, '2023-03-26 10:23:41'),
('http://localhost:8080/index.php', '::1', 116, 1, '2023-03-26 10:24:13'),
('http://localhost:8080/index.php', '::1', 117, 1, '2023-03-26 10:24:22'),
('http://localhost:8080/index.php', '::1', 118, 1, '2023-03-26 10:24:31'),
('http://localhost:8080/index.php', '::1', 119, 1, '2023-03-26 10:25:51'),
('http://localhost:8080/index.php', '::1', 120, 1, '2023-03-26 10:26:00'),
('http://localhost:8080/index.php', '::1', 121, 1, '2023-03-26 10:26:34'),
('http://localhost:8080/index.php', '::1', 122, 1, '2023-03-26 10:26:44'),
('http://localhost:8080/index.php', '::1', 123, 1, '2023-03-26 10:39:14'),
('http://localhost:8080/index.php', '::1', 124, 1, '2023-03-26 10:39:20'),
('http://localhost:8080/index.php', '::1', 125, 1, '2023-03-26 10:39:25'),
('http://localhost:8080/index.php', '::1', 126, 1, '2023-03-26 10:42:44'),
('http://localhost:8080/index.php', '::1', 127, 1, '2023-03-26 10:43:14'),
('http://localhost:8080/index.php', '::1', 128, 1, '2023-03-26 10:43:51'),
('http://localhost:8080/index.php', '::1', 129, 1, '2023-03-26 10:44:27'),
('http://localhost:8080/teste1.html', '::1', 130, 2, '2023-03-26 10:44:30'),
('http://localhost:8080/index.php', '::1', 131, 1, '2023-03-26 10:44:32'),
('http://localhost:8080/teste1.html', '::1', 132, 2, '2023-03-26 10:44:34'),
('http://localhost:8080/teste1.html', '::1', 133, 2, '2023-03-26 10:44:35'),
('http://localhost:8080/index.php', '::1', 134, 1, '2023-03-26 10:44:36'),
('http://localhost:8080/index.php', '::1', 135, 1, '2023-03-26 10:47:30'),
('http://localhost:8080/index.php', '::1', 136, 1, '2023-03-26 10:47:38'),
('http://localhost:8080/index.php', '::1', 137, 1, '2023-03-26 10:47:41'),
('http://localhost:8080/index.php', '::1', 138, 1, '2023-03-26 10:47:54'),
('http://localhost:8080/index.php', '::1', 139, 1, '2023-03-26 10:48:36'),
('http://localhost:8080/index.php', '::1', 140, 1, '2023-03-26 10:48:36'),
('http://localhost:8080/index.php', '::1', 141, 1, '2023-03-26 10:48:50'),
('http://localhost:8080/teste2.html', '::1', 142, 3, '2023-03-26 10:48:57'),
('http://localhost:8080/index.php', '::1', 143, 1, '2023-03-26 10:48:58'),
('http://localhost:8080/index.php', '::1', 144, 1, '2023-03-26 10:53:06'),
('http://localhost:8080/index.php', '::1', 145, 1, '2023-03-26 10:53:24'),
('http://localhost:8080/index.php', '::1', 146, 1, '2023-03-26 10:53:42'),
('http://localhost:8080/index.php', '::1', 147, 1, '2023-03-26 10:54:58'),
('http://localhost:8080/index.php', '::1', 148, 1, '2023-03-26 10:57:14'),
('http://localhost:8080/index.php', '::1', 149, 1, '2023-03-26 10:57:15'),
('http://localhost:8080/index.php', '::1', 150, 1, '2023-03-26 10:57:40'),
('http://localhost:8080/index.php', '::1', 151, 1, '2023-03-26 10:57:45'),
('http://localhost:8080/index.php', '::1', 152, 1, '2023-03-26 11:00:26'),
('http://localhost:8080/index.php', '::1', 153, 1, '2023-03-26 11:01:55'),
('http://localhost:8080/index.php', '::1', 154, 1, '2023-03-26 11:02:08'),
('http://localhost:8080/index.php', '::1', 155, 1, '2023-03-26 11:02:27'),
('http://localhost:8080/teste1.html', '::1', 156, 2, '2023-03-26 11:03:49'),
('http://localhost:8080/index.php', '::1', 157, 1, '2023-03-26 11:03:50'),
('http://localhost:8080/index.php', '::1', 158, 1, '2023-03-26 11:04:04'),
('http://localhost:8080/index.php', '::1', 159, 1, '2023-03-26 11:04:28'),
('http://localhost:8080/', '::1', 160, 1, '2023-03-26 17:05:28'),
('http://localhost:8080/index.php', '::1', 161, 1, '2023-03-26 17:05:41'),
('http://localhost:8080/index.php', '::1', 162, 1, '2023-03-26 17:05:43'),
('http://localhost:8080/index.php', '::1', 163, 1, '2023-03-26 17:05:47'),
('http://localhost:8080/teste1.html', '::1', 164, 2, '2023-03-26 17:05:56'),
('http://localhost:8080/index.php', '::1', 165, 1, '2023-03-26 17:05:58'),
('http://localhost:8080/index.php', '::1', 166, 1, '2023-03-26 17:06:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clicks2`
--
ALTER TABLE `clicks2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clicks2`
--
ALTER TABLE `clicks2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
