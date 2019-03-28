-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2019 às 06:00
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `Id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `menu` varchar(20) DEFAULT NULL,
  `fundo` varchar(20) DEFAULT NULL,
  `texto` varchar(30) DEFAULT NULL,
  `menu3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `favoritoid` int(11) NOT NULL,
  `livroid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `livroid` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(120) CHARACTER SET utf8 NOT NULL,
  `editora` varchar(120) CHARACTER SET utf8 NOT NULL,
  `genero` varchar(120) CHARACTER SET utf8 NOT NULL,
  `foto` varchar(40) CHARACTER SET utf8 NOT NULL,
  `sinopse` text CHARACTER SET utf8 NOT NULL,
  `fileira` varchar(30) NOT NULL,
  `numero` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_acervo`
--

CREATE TABLE `livro_acervo` (
  `acervoid` int(11) NOT NULL,
  `livroid` int(11) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `n` int(50) NOT NULL,
  `status` varchar(40) NOT NULL,
  `previsao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `locaid` int(11) NOT NULL,
  `acervoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datalocacao` varchar(20) NOT NULL,
  `dataentrega` varchar(20) DEFAULT NULL,
  `statuslocacao` varchar(20) NOT NULL,
  `tempoentrega` varchar(20) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `pedidoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projetoid` int(11) DEFAULT NULL,
  `nomeli` varchar(30) DEFAULT NULL,
  `turmaid` int(11) NOT NULL,
  `nomeped` varchar(30) NOT NULL,
  `statuspedido` varchar(30) NOT NULL,
  `datalimite` date DEFAULT NULL,
  `acervoid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `projetoid` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `autor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_cadas`
--

CREATE TABLE `projeto_cadas` (
  `procadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projetoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sintese`
--

CREATE TABLE `sintese` (
  `sinteseid` int(11) NOT NULL,
  `nomesi` varchar(50) NOT NULL,
  `sintese` text NOT NULL,
  `nota` varchar(5) DEFAULT NULL,
  `statussintese` varchar(20) NOT NULL,
  `livroid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `turmaid` int(11) NOT NULL,
  `nometur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `userid` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(25) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nivel` varchar(20) NOT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `matricula` int(20) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `limite` int(20) DEFAULT NULL,
  `turmaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Usuários do Sistema' ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`favoritoid`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`livroid`,`numero`);

--
-- Indexes for table `livro_acervo`
--
ALTER TABLE `livro_acervo`
  ADD PRIMARY KEY (`acervoid`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`locaid`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedidoid`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`projetoid`);

--
-- Indexes for table `projeto_cadas`
--
ALTER TABLE `projeto_cadas`
  ADD PRIMARY KEY (`procadid`);

--
-- Indexes for table `sintese`
--
ALTER TABLE `sintese`
  ADD PRIMARY KEY (`sinteseid`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`turmaid`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `favoritoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `livroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `livro_acervo`
--
ALTER TABLE `livro_acervo`
  MODIFY `acervoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `locaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedidoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `projetoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projeto_cadas`
--
ALTER TABLE `projeto_cadas`
  MODIFY `procadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sintese`
--
ALTER TABLE `sintese`
  MODIFY `sinteseid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `turmaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
