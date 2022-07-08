-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.29 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_catalogo_3e1
CREATE DATABASE IF NOT EXISTS `db_catalogo_3e1` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_catalogo_3e1`;

-- Copiando estrutura para tabela db_catalogo_3e1.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela db_catalogo_3e1.categoria: ~7 rows (aproximadamente)
INSERT INTO `categoria` (`idcategoria`, `nome`) VALUES
	(2, 'PATO'),
	(4, 'Móveis'),
	(5, 'Eletrônicos'),
	(6, 'Cama, mesa e banho'),
	(16, 'Cadastrar categoria'),
	(27, 'teste1'),
	(28, 'teste3');

-- Copiando estrutura para tabela db_catalogo_3e1.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idproduto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` text,
  `marca` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `categoria_idcategoria` int NOT NULL,
  PRIMARY KEY (`idproduto`),
  KEY `fk_produto_categoria_idx` (`categoria_idcategoria`),
  CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela db_catalogo_3e1.produto: ~2 rows (aproximadamente)
INSERT INTO `produto` (`idproduto`, `nome`, `descricao`, `marca`, `foto`, `preco`, `categoria_idcategoria`) VALUES
	(11, 'tv', 'tv', 'tv', NULL, 14.00, 28),
	(29, 'Toalha de banho', 'hgvhgv', 'pppkopko', 'fotos/1657219533cama.jfif', 1215.00, 2);

-- Copiando estrutura para tabela db_catalogo_3e1.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `senha` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idusuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela db_catalogo_3e1.usuario: ~0 rows (aproximadamente)
INSERT INTO `usuario` (`idusuario`, `login`, `senha`) VALUES
	(4, 'jose.pereira@alunos.ifsuldeminas.edu.br', 'jose.pereira@alunos.ifsuldeminas.edu.br');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
