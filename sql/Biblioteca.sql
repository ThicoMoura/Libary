-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.16.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `menu` varchar(20) DEFAULT NULL,
  `fundo` varchar(20) DEFAULT NULL,
  `texto` varchar(30) DEFAULT NULL,
  `menu3` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorito`
--

DROP TABLE IF EXISTS `favorito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorito` (
  `favoritoid` int(11) NOT NULL AUTO_INCREMENT,
  `livroid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`favoritoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorito`
--

LOCK TABLES `favorito` WRITE;
/*!40000 ALTER TABLE `favorito` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `livroid` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(120) CHARACTER SET utf8 NOT NULL,
  `editora` varchar(120) CHARACTER SET utf8 NOT NULL,
  `genero` varchar(120) CHARACTER SET utf8 NOT NULL,
  `foto` varchar(40) CHARACTER SET utf8 NOT NULL,
  `sinopse` text CHARACTER SET utf8 NOT NULL,
  `fileira` varchar(30) NOT NULL,
  `numero` varchar(40) NOT NULL,
  PRIMARY KEY (`livroid`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_acervo`
--

DROP TABLE IF EXISTS `livro_acervo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro_acervo` (
  `acervoid` int(11) NOT NULL AUTO_INCREMENT,
  `livroid` int(11) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `n` int(50) NOT NULL,
  `status` varchar(40) NOT NULL,
  `previsao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`acervoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_acervo`
--

LOCK TABLES `livro_acervo` WRITE;
/*!40000 ALTER TABLE `livro_acervo` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro_acervo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacao`
--

DROP TABLE IF EXISTS `locacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locacao` (
  `locaid` int(11) NOT NULL AUTO_INCREMENT,
  `acervoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datalocacao` varchar(20) NOT NULL,
  `dataentrega` varchar(20) DEFAULT NULL,
  `statuslocacao` varchar(20) NOT NULL,
  `tempoentrega` varchar(20) NOT NULL,
  `hide` int(1) NOT NULL,
  PRIMARY KEY (`locaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacao`
--

LOCK TABLES `locacao` WRITE;
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `pedidoid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projetoid` int(11) DEFAULT NULL,
  `nomeli` varchar(30) DEFAULT NULL,
  `turmaid` int(11) NOT NULL,
  `nomeped` varchar(30) NOT NULL,
  `statuspedido` varchar(30) NOT NULL,
  `datalimite` date DEFAULT NULL,
  PRIMARY KEY (`pedidoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto_cadas`
--

DROP TABLE IF EXISTS `projeto_cadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto_cadas` (
  `procadid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projetoid` int(11) NOT NULL,
  PRIMARY KEY (`procadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto_cadas`
--

LOCK TABLES `projeto_cadas` WRITE;
/*!40000 ALTER TABLE `projeto_cadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `projeto_cadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `projetoid` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `autor` varchar(20) NOT NULL,
  PRIMARY KEY (`projetoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintese`
--

DROP TABLE IF EXISTS `sintese`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintese` (
  `sinteseid` int(11) NOT NULL AUTO_INCREMENT,
  `nomesi` varchar(50) NOT NULL,
  `sintese` text NOT NULL,
  `nota` varchar(5) DEFAULT NULL,
  `statussintese` varchar(20) NOT NULL,
  `livroid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`sinteseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintese`
--

LOCK TABLES `sintese` WRITE;
/*!40000 ALTER TABLE `sintese` DISABLE KEYS */;
/*!40000 ALTER TABLE `sintese` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `turmaid` int(11) NOT NULL AUTO_INCREMENT,
  `nometur` varchar(30) NOT NULL,
  PRIMARY KEY (`turmaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
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
  `turmaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Usuários do Sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-25 12:28:52
