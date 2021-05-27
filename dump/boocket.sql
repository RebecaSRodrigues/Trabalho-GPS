-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2021 às 01:04
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `boocket`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(11) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `statusCliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `cpf_cliente` varchar(100) NOT NULL,
  `cpf_servidor` varchar(100) NOT NULL,
  `tipo_servico` varchar(255) NOT NULL,
  `duracao` varchar(255) NOT NULL,
  `preco_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `cpf` varchar(100) NOT NULL,
  `nomeCompleto` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `observacao` text NOT NULL,
  `statusServidor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf_cliente` (`cpf_cliente`),
  ADD KEY `cpf_servidor` (`cpf_servidor`);

--
-- Índices para tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`cpf_servidor`) REFERENCES `servidor` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
