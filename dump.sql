-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 13:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `information`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `information`
--

CREATE TABLE `information` (
  `id` int(255) UNSIGNED NOT NULL,
  `link` varchar(240) NOT NULL,
  `comment` char(255) NOT NULL,
  `difficulty` tinyint(10) UNSIGNED NOT NULL,
  `responsible` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `information`
--

INSERT INTO `information` (`id`, `link`, `comment`, `difficulty`, `responsible`, `date`) VALUES
(1, 'a', 'a', 1, 'eu', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
