CREATE DATABASE `psilibras` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

-- psilibras.cadastro_paciente definition

CREATE TABLE `cadastro_paciente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `sexo` char(2) DEFAULT NULL,
  `dt_nascimento` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `valor_secao` decimal(5,2) DEFAULT NULL,
  `queixa_principal` text DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`sexo` in ('F','M'))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- psilibras.usuarios definition

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO psilibras.usuarios (nome, usuario, senha) VALUES('Felipe', 'prof_felipe', '$argon2id$v=19$m=65536,t=4,p=1$bmFhUlNVcTd1SktPOFJWaQ$2ccy/za+newtlCmCUCW0GzkxkI+L9H4EhoMuRq9lyT4');

