-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Out-2018 às 17:56
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmvsamu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `IdEstoque` int(11) NOT NULL AUTO_INCREMENT,
  `NomePeca` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `LocalCompra` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `NotaF` int(11) NOT NULL,
  `ValorCompra` double NOT NULL,
  `DataEstoque` date NOT NULL,
  PRIMARY KEY (`IdEstoque`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`IdEstoque`, `NomePeca`, `Quantidade`, `LocalCompra`, `NotaF`, `ValorCompra`, `DataEstoque`) VALUES
(1, 2, 4, 'Loja1', 12345, 800, '2018-10-08'),
(2, 1, 2, 'Loja2', 67890, 200, '2018-10-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicotroca`
--

DROP TABLE IF EXISTS `historicotroca`;
CREATE TABLE IF NOT EXISTS `historicotroca` (
  `IdHis` int(11) NOT NULL AUTO_INCREMENT,
  `NomeVeiculo` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `NomePeca` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `KmTroca` int(11) NOT NULL,
  `Estoque` int(11) NOT NULL,
  `Valor` double NOT NULL,
  `NumeroNota` int(11) NOT NULL,
  `LocalCompra` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`IdHis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas`
--

DROP TABLE IF EXISTS `pecas`;
CREATE TABLE IF NOT EXISTS `pecas` (
  `IdPeca` int(11) NOT NULL AUTO_INCREMENT,
  `NomePeca` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `DescricaoPeca` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `KmLimitePeca` int(11) NOT NULL,
  PRIMARY KEY (`IdPeca`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `pecas`
--

INSERT INTO `pecas` (`IdPeca`, `NomePeca`, `DescricaoPeca`, `KmLimitePeca`) VALUES
(1, 'Pastilha de Freio', '...', 30000),
(2, 'Pneu', '...', 45000),
(3, 'Correia Dentada', '...', 40000),
(4, 'Embreagem', '...', 30000),
(5, 'Velas', '...', 55000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trocas`
--

DROP TABLE IF EXISTS `trocas`;
CREATE TABLE IF NOT EXISTS `trocas` (
  `IdTroca` int(11) NOT NULL AUTO_INCREMENT,
  `IdVeiculo` int(11) NOT NULL,
  `IdPeca` int(11) NOT NULL,
  `KmTroca` int(11) NOT NULL,
  `KmAtual` int(11) NOT NULL,
  `KmLimiite` int(11) NOT NULL,
  `Troca` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdTroca`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `trocas`
--

INSERT INTO `trocas` (`IdTroca`, `IdVeiculo`, `IdPeca`, `KmTroca`, `KmAtual`, `KmLimiite`, `Troca`) VALUES
(1, 1, 1, 20000, 20000, 30000, 1),
(2, 2, 1, 25000, 25000, 30000, 1),
(3, 3, 1, 20000, 20000, 30000, 1),
(4, 1, 2, 20000, 20000, 45000, 1),
(5, 2, 2, 25000, 25000, 45000, 1),
(6, 3, 2, 20000, 20000, 45000, 1),
(7, 1, 3, 20000, 20000, 40000, 1),
(8, 2, 3, 25000, 25000, 40000, 1),
(9, 3, 3, 20000, 20000, 40000, 1),
(10, 1, 4, 20000, 20000, 30000, 1),
(11, 2, 4, 25000, 25000, 30000, 1),
(12, 3, 4, 20000, 20000, 30000, 1),
(13, 1, 5, 20000, 20000, 55000, 1),
(14, 2, 5, 25000, 25000, 55000, 1),
(15, 3, 5, 20000, 20000, 55000, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `IdVeiculo` int(11) NOT NULL AUTO_INCREMENT,
  `NomeVeiculo` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `PlacaVeiculo` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `KmVeiculo` int(11) NOT NULL,
  PRIMARY KEY (`IdVeiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`IdVeiculo`, `NomeVeiculo`, `PlacaVeiculo`, `KmVeiculo`) VALUES
(1, 'AMB-01', 'ABC-0001', 20000),
(2, 'AMB-02', 'ABC-0002', 25000),
(3, 'AMB-03', 'ABC-0003', 20000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
