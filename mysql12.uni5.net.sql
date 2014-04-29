-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: mysql12.uni5.net
-- Tempo de Geração: Abr 22, 2014 as 01:47 PM
-- Versão do Servidor: 5.5.32
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `florencepalmar02`
--
CREATE DATABASE `florencepalmar02` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `florencepalmar02`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `tel_residencial` varchar(20) DEFAULT NULL,
  `tel_celular` varchar(20) DEFAULT NULL,
  `tel_comercial` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `identidade` varchar(200) DEFAULT NULL,
  `emissor` varchar(200) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `boleto` longblob NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `idx_1` (`nome`),
  KEY `idx_2` (`id`,`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2828 ;

--
-- Gatilhos `alunos`
--
DROP TRIGGER IF EXISTS `login_aluno`;
DELIMITER //
CREATE TRIGGER `login_aluno` AFTER INSERT ON `alunos`
 FOR EACH ROW BEGIN	
	INSERT INTO login_aluno	SET aluno_id = new.id, senha = new.matricula, created=CURRENT_TIMESTAMP, modified=CURRENT_TIMESTAMP;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_provas`
--

CREATE TABLE IF NOT EXISTS `alunos_provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(10) unsigned NOT NULL,
  `prova_id` int(11) NOT NULL,
  `respostas` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`aluno_id`,`prova_id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `alunos_provas_ibfk_2` (`prova_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `alunos_responderam_provas`
--
CREATE TABLE IF NOT EXISTS `alunos_responderam_provas` (
`id` int(10) unsigned
,`aluno` varchar(100)
,`matricula` varchar(50)
,`curso` varchar(100)
,`respostas` text
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `cadeiras`
--

CREATE TABLE IF NOT EXISTS `cadeiras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadeiras_cursos`
--

CREATE TABLE IF NOT EXISTS `cadeiras_cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `cadeira_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`curso_id`,`cadeira_id`),
  KEY `cadeira_id` (`cadeira_id`),
  KEY `curso_id` (`curso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=943 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `periodos` int(11) NOT NULL,
  `descricao` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_provas`
--

CREATE TABLE IF NOT EXISTS `cursos_provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `prova_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`curso_id`,`prova_id`),
  KEY `curso_id` (`curso_id`),
  KEY `prova_id` (`prova_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faltas`
--

CREATE TABLE IF NOT EXISTS `faltas` (
  `aluno_id` int(10) unsigned NOT NULL,
  `cadeira_id` int(10) unsigned NOT NULL,
  `qtd` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aluno_id`,`cadeira_id`),
  KEY `cadeira_id` (`cadeira_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_aluno`
--

CREATE TABLE IF NOT EXISTS `foto_aluno` (
  `aluno_id` int(11) unsigned NOT NULL,
  `img` varchar(350) NOT NULL,
  `temp` varchar(350) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aluno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_aluno`
--

CREATE TABLE IF NOT EXISTS `login_aluno` (
  `aluno_id` int(10) unsigned NOT NULL,
  `senha` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aluno_id`),
  KEY `idx_1` (`aluno_id`,`senha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_usuario`
--

CREATE TABLE IF NOT EXISTS `login_usuario` (
  `usuario_id` int(10) unsigned NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` int(10) unsigned NOT NULL,
  `cadeira_id` int(10) unsigned NOT NULL,
  `comentario` text,
  `nota` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`aluno_id`,`cadeira_id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `cadeira_id` (`cadeira_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32132 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(200) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `tel_residencial` varchar(20) DEFAULT NULL,
  `tel_celular` varchar(20) DEFAULT NULL,
  `tel_comercial` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `identidade` varchar(200) NOT NULL,
  `emissor` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores_cadeiras`
--

CREATE TABLE IF NOT EXISTS `professores_cadeiras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cadeira_id` int(10) unsigned NOT NULL,
  `professor_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`cadeira_id`,`professor_id`),
  KEY `cadeira_id` (`cadeira_id`),
  KEY `professor_id` (`professor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=356 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE IF NOT EXISTS `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questoes` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cadeira_id` int(10) unsigned NOT NULL,
  `enunciado` text NOT NULL,
  `pontuacao` double NOT NULL,
  `resposta1` text NOT NULL,
  `resposta2` text NOT NULL,
  `resposta3` text NOT NULL,
  `resposta4` text NOT NULL,
  `correta` char(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cadeira_id` (`cadeira_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes_provas`
--

CREATE TABLE IF NOT EXISTS `questoes_provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questao_id` int(11) NOT NULL,
  `prova_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`questao_id`,`prova_id`),
  KEY `prova_id` (`prova_id`),
  KEY `questao_id` (`questao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricula` varchar(100) NOT NULL,
  `aluno` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `pontuacao` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_matricula`
--

CREATE TABLE IF NOT EXISTS `situacao_matricula` (
  `aluno_id` int(10) unsigned NOT NULL,
  `situacao` int(10) unsigned NOT NULL,
  `outra_info` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aluno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativas`
--

CREATE TABLE IF NOT EXISTS `tentativas` (
  `aluno_id` int(10) unsigned NOT NULL,
  `prova_id` int(11) NOT NULL,
  PRIMARY KEY (`aluno_id`,`prova_id`),
  KEY `prova_id` (`prova_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `tel_residencial` varchar(20) DEFAULT NULL,
  `tel_celular` varchar(20) DEFAULT NULL,
  `tel_comercial` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `identidade` varchar(200) NOT NULL,
  `emissor` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nivel` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gatilhos `usuarios`
--
DROP TRIGGER IF EXISTS `login_usuario`;
DELIMITER //
CREATE TRIGGER `login_usuario` AFTER INSERT ON `usuarios`
 FOR EACH ROW BEGIN	
	INSERT INTO login_usuario SET usuario_id=new.id, login=new.cpf, senha=new.cpf, created=CURRENT_TIMESTAMP, modified=CURRENT_TIMESTAMP;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_logados`
--

CREATE TABLE IF NOT EXISTS `usuarios_logados` (
  `session_id` varchar(255) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nivel` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para visualizar `alunos_responderam_provas`
--
DROP TABLE IF EXISTS `alunos_responderam_provas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`florencepalmar02`@`%` SQL SECURITY INVOKER VIEW `alunos_responderam_provas` AS select `a`.`id` AS `id`,`a`.`nome` AS `aluno`,`a`.`matricula` AS `matricula`,`c`.`nome` AS `curso`,`ap`.`respostas` AS `respostas` from ((`alunos` `a` join `cursos` `c`) join `alunos_provas` `ap`) where ((`a`.`curso_id` = `c`.`id`) and (`a`.`id` = `ap`.`aluno_id`)) group by `a`.`id`;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `alunos_provas`
--
ALTER TABLE `alunos_provas`
  ADD CONSTRAINT `alunos_provas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alunos_provas_ibfk_2` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `cadeiras_cursos`
--
ALTER TABLE `cadeiras_cursos`
  ADD CONSTRAINT `cadeiras_cursos_ibfk_1` FOREIGN KEY (`cadeira_id`) REFERENCES `cadeiras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cadeiras_cursos_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `cursos_provas`
--
ALTER TABLE `cursos_provas`
  ADD CONSTRAINT `cursos_provas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_provas_ibfk_2` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faltas_ibfk_2` FOREIGN KEY (`cadeira_id`) REFERENCES `cadeiras` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `foto_aluno`
--
ALTER TABLE `foto_aluno`
  ADD CONSTRAINT `foto_aluno_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `login_aluno`
--
ALTER TABLE `login_aluno`
  ADD CONSTRAINT `login_aluno_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `login_usuario`
--
ALTER TABLE `login_usuario`
  ADD CONSTRAINT `login_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`cadeira_id`) REFERENCES `cadeiras` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `professores_cadeiras`
--
ALTER TABLE `professores_cadeiras`
  ADD CONSTRAINT `professores_cadeiras_ibfk_1` FOREIGN KEY (`cadeira_id`) REFERENCES `cadeiras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `professores_cadeiras_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`cadeira_id`) REFERENCES `cadeiras` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `questoes_provas`
--
ALTER TABLE `questoes_provas`
  ADD CONSTRAINT `questoes_provas_ibfk_1` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`),
  ADD CONSTRAINT `questoes_provas_ibfk_2` FOREIGN KEY (`questao_id`) REFERENCES `questoes` (`id`);

--
-- Restrições para a tabela `situacao_matricula`
--
ALTER TABLE `situacao_matricula`
  ADD CONSTRAINT `situacao_matricula_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `tentativas`
--
ALTER TABLE `tentativas`
  ADD CONSTRAINT `tentativas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tentativas_ibfk_2` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
