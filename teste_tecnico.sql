-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2025 às 04:47
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
-- Banco de dados: `teste_tecnico`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_perfil`
--

CREATE TABLE `tab_perfil` (
  `per_codigo` int(11) NOT NULL,
  `per_descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_perfil`
--

INSERT INTO `tab_perfil` (`per_codigo`, `per_descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuário Comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `usu_codigo` int(11) NOT NULL,
  `per_codigo` int(11) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_senha` varchar(500) NOT NULL,
  `usu_login_acesso` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`usu_codigo`, `per_codigo`, `usu_nome`, `usu_senha`, `usu_login_acesso`) VALUES
(3, 2, 'teste3', '$2y$10$HFVZl1UIP/BgZW/8kHqVs./MQlQtNhu/S3SR/DLHdDf3.c/ZegjhK', 'teste'),
(6, 1, 'tete4', '$2y$10$m5wsQPGuXLqsGhMivp1MOOMqldDKT4yM.JQkUkIbS1skN8cQkueVO', 'ttestststes');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_perfil`
--
ALTER TABLE `tab_perfil`
  ADD PRIMARY KEY (`per_codigo`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `per_codigo` (`per_codigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_perfil`
--
ALTER TABLE `tab_perfil`
  MODIFY `per_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD CONSTRAINT `tab_usuario_ibfk_1` FOREIGN KEY (`per_codigo`) REFERENCES `tab_perfil` (`per_codigo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
