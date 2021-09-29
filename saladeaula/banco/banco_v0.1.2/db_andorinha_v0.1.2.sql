-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Set-2018 às 19:50
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_andorinha`
--
CREATE DATABASE IF NOT EXISTS `db_andorinha` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_andorinha`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `cd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(200) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_admin`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`cd_admin`, `nm_admin`, `id_login`) VALUES
(1, 'duduzinhodosteclados', 1),
(2, 'Sara', 14),
(3, 'Luiz', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arquivo`
--

CREATE TABLE IF NOT EXISTS `tb_arquivo` (
  `cd_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `url_arquivo` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_arquivo`),
  UNIQUE KEY `url_arquivo_unico` (`url_arquivo`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_arquivo`
--

INSERT INTO `tb_arquivo` (`cd_arquivo`, `url_arquivo`, `id_login`) VALUES
(1, 'https://www.google.com.br/search?q=imagem&source=lnms&tbm=isch&sa=X&ved=0ahUKEwi91oTk0rDdAhVQl5AKHTEwDpcQ_AUICigB&biw=1366&bih=662#imgrc=bRpz9ibiAoE7jM:', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arquivo_questao`
--

CREATE TABLE IF NOT EXISTS `tb_arquivo_questao` (
  `cd_arquivo_questao` int(11) NOT NULL AUTO_INCREMENT,
  `id_questao` int(11) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  PRIMARY KEY (`cd_arquivo_questao`),
  KEY `id_questao` (`id_questao`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arquivo_resposta`
--

CREATE TABLE IF NOT EXISTS `tb_arquivo_resposta` (
  `cd_arquivo_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `id_arquivo` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL,
  PRIMARY KEY (`cd_arquivo_resposta`),
  KEY `id_arquivo` (`id_arquivo`),
  KEY `id_resposta` (`id_resposta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atividade`
--

CREATE TABLE IF NOT EXISTS `tb_atividade` (
  `cd_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nm_atividade` varchar(100) NOT NULL,
  `ds_atividade` varchar(600) NOT NULL,
  `dt_atividade` date NOT NULL,
  `dt_prazo` date NOT NULL,
  `hr_prazo` varchar(5) NOT NULL,
  `st_atividade` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_atividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_atividade`
--

INSERT INTO `tb_atividade` (`cd_atividade`, `nm_atividade`, `ds_atividade`, `dt_atividade`, `dt_prazo`, `hr_prazo`, `st_atividade`) VALUES
(1, 'Desenhar algo', 'Desenhar uma arvore', '2018-09-19', '2018-09-29', '20:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_audicao`
--

CREATE TABLE IF NOT EXISTS `tb_audicao` (
  `cd_audicao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_audicao` varchar(150) NOT NULL,
  `ds_audicao` varchar(600) NOT NULL,
  `dt_abertura` date NOT NULL,
  `dt_fechamento` datetime NOT NULL,
  `nr_vagas` varchar(10) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`cd_audicao`),
  UNIQUE KEY `nm_audicao_unico` (`nm_audicao`),
  UNIQUE KEY `dt_abertura_unico` (`dt_abertura`),
  UNIQUE KEY `dt_fechamento_unico` (`dt_fechamento`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_audicao`
--

INSERT INTO `tb_audicao` (`cd_audicao`, `nm_audicao`, `ds_audicao`, `dt_abertura`, `dt_fechamento`, `nr_vagas`, `id_admin`) VALUES
(1, 'Audicao de teste', 'asoirhr', '2018-09-12', '2018-09-19 13:00:00', '20', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_boletim`
--

CREATE TABLE IF NOT EXISTS `tb_boletim` (
  `cd_boletim` int(11) NOT NULL AUTO_INCREMENT,
  `nr_semestre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cd_boletim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comunicado`
--

CREATE TABLE IF NOT EXISTS `tb_comunicado` (
  `cd_comunicado` int(11) NOT NULL AUTO_INCREMENT,
  `tx_titulo` varchar(150) NOT NULL,
  `ds_descricao` varchar(600) NOT NULL,
  `dt_comunicado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_login` int(11) NOT NULL,
  `id_arquivo` int(11) DEFAULT NULL,
  `st_comunicado` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_comunicado`),
  KEY `id_arquivo` (`id_arquivo`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_comunicado`
--

INSERT INTO `tb_comunicado` (`cd_comunicado`, `tx_titulo`, `ds_descricao`, `dt_comunicado`, `id_login`, `id_arquivo`, `st_comunicado`) VALUES
(7, '#teste', 'oioioi', '2018-09-16 03:00:00', 14, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

CREATE TABLE IF NOT EXISTS `tb_curso` (
  `cd_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nm_curso` varchar(150) NOT NULL,
  `ds_curso` varchar(600) NOT NULL,
  `st_curso` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_curso`),
  UNIQUE KEY `nm_curso_unico` (`nm_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_curso`
--

INSERT INTO `tb_curso` (`cd_curso`, `nm_curso`, `ds_curso`, `st_curso`) VALUES
(1, 'Ballet Iniciante1', 'Ballet para crianÃ§as a partir de trÃªs anos.', 0),
(2, '0asdsada', 'ojhbdjks', 1),
(4, 'asdz', 'asdfzcx', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_evento`
--

CREATE TABLE IF NOT EXISTS `tb_evento` (
  `cd_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nm_evento` varchar(150) NOT NULL,
  `dt_evento` datetime NOT NULL,
  `st_publico` tinyint(1) NOT NULL,
  `ds_evento` varchar(500) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`cd_evento`),
  UNIQUE KEY `nm_evento_unico` (`nm_evento`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_evento`
--

INSERT INTO `tb_evento` (`cd_evento`, `nm_evento`, `dt_evento`, `st_publico`, `ds_evento`, `id_admin`) VALUES
(1, 'Teste', '2018-09-11 09:00:00', 1, 'Evento de teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_evento_servico`
--

CREATE TABLE IF NOT EXISTS `tb_evento_servico` (
  `cd_evento_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  PRIMARY KEY (`cd_evento_servico`),
  KEY `id_evento` (`id_evento`),
  KEY `id_servico` (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_foto`
--

CREATE TABLE IF NOT EXISTS `tb_foto` (
  `cd_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nm_foto` varchar(120) NOT NULL,
  `url_foto` varchar(250) NOT NULL,
  PRIMARY KEY (`cd_foto`),
  UNIQUE KEY `nm_foto_unico` (`nm_foto`),
  UNIQUE KEY `url_foto_unico` (`url_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_foto_galeria`
--

CREATE TABLE IF NOT EXISTS `tb_foto_galeria` (
  `cd_foto_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  PRIMARY KEY (`cd_foto_galeria`),
  KEY `id_galeria` (`id_galeria`),
  KEY `id_foto` (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_galeria`
--

CREATE TABLE IF NOT EXISTS `tb_galeria` (
  `cd_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `nm_galeria` varchar(100) NOT NULL,
  `ds_galeria` varchar(350) NOT NULL,
  `dt_galeria` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`cd_galeria`),
  UNIQUE KEY `nm_galeria_unico` (`nm_galeria`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscrito`
--

CREATE TABLE IF NOT EXISTS `tb_inscrito` (
  `cd_inscrito` int(11) NOT NULL AUTO_INCREMENT,
  `nm_inscrito` varchar(200) NOT NULL,
  `nr_cpf` varchar(11) NOT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `st_inscrito` tinyint(1) NOT NULL,
  `dt_encontro` date NOT NULL,
  `hr_encontro` varchar(5) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_audicao` int(11) NOT NULL,
  PRIMARY KEY (`cd_inscrito`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`),
  KEY `id_audicao` (`id_audicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `cd_login` int(11) NOT NULL AUTO_INCREMENT,
  `tx_login` varchar(75) NOT NULL,
  `tx_pass` varchar(200) NOT NULL,
  PRIMARY KEY (`cd_login`),
  UNIQUE KEY `tx_login_unico` (`tx_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`cd_login`, `tx_login`, `tx_pass`) VALUES
(1, 'kekobolize', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(3, 'aa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(5, 'sss', 'a871c47a7f48a12b38a994e48a9659fab5d6376f3dbce37559bcb617efe8662d'),
(9, 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(14, 'sara', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(17, 'dedelima', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(18, 'lgdsv', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(20, 'iamtheluiz', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matricula`
--

CREATE TABLE IF NOT EXISTS `tb_matricula` (
  `cd_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nm_matricula` varchar(200) NOT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `nr_cpf` varchar(11) NOT NULL,
  `dt_matricula` date NOT NULL,
  `st_matricula` tinyint(1) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nr_rg` varchar(12) NOT NULL,
  `nm_sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`cd_matricula`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_matricula`
--

INSERT INTO `tb_matricula` (`cd_matricula`, `nm_matricula`, `ds_endereco`, `ds_cidade`, `nr_telefone1`, `nr_telefone2`, `nr_cpf`, `dt_matricula`, `st_matricula`, `tx_email`, `st_email`, `id_login`, `nr_rg`, `nm_sexo`) VALUES
(4, 'Sara Santos1', 'R. Julia n.10', 'PeruÃ­be', '(13) 3419-1691', '(13) 8186-1522', '503.096.878', '2018-09-09', 0, 'saralima@gmail.com', 0, 17, '98.923.658-7', '9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matricula_comunicado`
--

CREATE TABLE IF NOT EXISTS `tb_matricula_comunicado` (
  `cd_matricula_comunicado` int(11) NOT NULL AUTO_INCREMENT,
  `id_matricula` int(11) NOT NULL,
  `id_comunicado` int(11) NOT NULL,
  PRIMARY KEY (`cd_matricula_comunicado`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_comunicado` (`id_comunicado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matricula_evento`
--

CREATE TABLE IF NOT EXISTS `tb_matricula_evento` (
  `cd_matricula_evento` int(11) NOT NULL,
  `st_confirma` tinyint(1) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`cd_matricula_evento`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matricula_patrocinador`
--

CREATE TABLE IF NOT EXISTS `tb_matricula_patrocinador` (
  `cd_matricula_patrocinador` int(11) NOT NULL,
  `dt_inicio` date NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  PRIMARY KEY (`cd_matricula_patrocinador`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_patrocinador` (`id_patrocinador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mencao`
--

CREATE TABLE IF NOT EXISTS `tb_mencao` (
  `cd_mencao` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarefa` int(11) NOT NULL,
  `id_turma_matricula` int(11) NOT NULL,
  `id_boletim` int(11) NOT NULL,
  PRIMARY KEY (`cd_mencao`),
  KEY `id_tarefa` (`id_tarefa`),
  KEY `id_turma_matricula` (`id_turma_matricula`),
  KEY `id_boletim` (`id_boletim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticia`
--

CREATE TABLE IF NOT EXISTS `tb_noticia` (
  `cd_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `tx_titulo` varchar(150) NOT NULL,
  `ds_noticia` text NOT NULL,
  `dt_noticia` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`cd_noticia`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE IF NOT EXISTS `tb_pagamento` (
  `cd_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `url_boleto` varchar(300) NOT NULL,
  `st_pagamento` tinyint(1) NOT NULL,
  `dt_envio` varchar(45) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  PRIMARY KEY (`cd_pagamento`),
  KEY `id_matricula` (`id_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_parceiro`
--

CREATE TABLE IF NOT EXISTS `tb_parceiro` (
  `cd_parceiro` int(11) NOT NULL AUTO_INCREMENT,
  `nm_parceiro` varchar(200) NOT NULL,
  `nr_cnpj` varchar(14) DEFAULT NULL,
  `nr_cpf` varchar(11) DEFAULT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_parceiro`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  UNIQUE KEY `nr_cpnj_unico` (`nr_cnpj`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pareceiro_evento_servico`
--

CREATE TABLE IF NOT EXISTS `tb_pareceiro_evento_servico` (
  `cd_parceiro_evento_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_parceiro` int(11) NOT NULL,
  `id_evento_servico` int(11) NOT NULL,
  PRIMARY KEY (`cd_parceiro_evento_servico`),
  KEY `id_parceiro` (`id_parceiro`),
  KEY `id_evento_servico` (`id_evento_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_patrocinador`
--

CREATE TABLE IF NOT EXISTS `tb_patrocinador` (
  `cd_patrocinador` int(11) NOT NULL AUTO_INCREMENT,
  `nm_patrocinador` varchar(200) NOT NULL,
  `nr_cnpj` varchar(14) NOT NULL,
  `nr_cpf` varchar(11) NOT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `ds_estado` varchar(2) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `tx_site` varchar(400) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `st_patrocinio` tinyint(1) NOT NULL,
  `tp_patrocinio` varchar(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_patrocinador`),
  UNIQUE KEY `nr_cnpj_unico` (`nr_cnpj`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE IF NOT EXISTS `tb_professor` (
  `cd_professor` int(11) NOT NULL AUTO_INCREMENT,
  `nm_professor` varchar(200) NOT NULL,
  `nr_cpf` varchar(11) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `st_professor` tinyint(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_professor`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`cd_professor`, `nm_professor`, `nr_cpf`, `nr_telefone1`, `nr_telefone2`, `ds_endereco`, `ds_cidade`, `tx_email`, `st_email`, `st_professor`, `id_login`) VALUES
(2, 'Luiz Gustavo1', '479.521.678', '(13) 3427-9223', '(13) 3466-2701', 'R. Diana n.10', 'ItanhaÃ©m', 'luizgustavo@gmail.com', 0, 1, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor_turma`
--

CREATE TABLE IF NOT EXISTS `tb_professor_turma` (
  `cd_professor_turma` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `st_professor_turma` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_professor_turma`),
  KEY `id_turma` (`id_turma`),
  KEY `id_professor` (`id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `cd_questao` int(11) NOT NULL AUTO_INCREMENT,
  `tx_enunciado` varchar(400) NOT NULL,
  `tp_questao` varchar(1) NOT NULL,
  `tx_alternativas` varchar(800) NOT NULL,
  `tx_resposta` varchar(800) NOT NULL,
  `vl_pontos` varchar(5) DEFAULT NULL,
  `id_atividade` int(11) NOT NULL,
  `st_questao` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_questao`),
  KEY `id_atividade` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_resposta`
--

CREATE TABLE IF NOT EXISTS `tb_resposta` (
  `cd_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `tx_resposta` varchar(800) NOT NULL,
  `dt_resposta` date NOT NULL,
  `id_turma_matricula` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  PRIMARY KEY (`cd_resposta`),
  KEY `id_turma_matricula` (`id_turma_matricula`),
  KEY `id_questao` (`id_questao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala`
--

CREATE TABLE IF NOT EXISTS `tb_sala` (
  `cd_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sala` varchar(50) NOT NULL,
  `sg_sala` varchar(10) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `st_sala` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_sala`),
  UNIQUE KEY `nm_sala_unico` (`nm_sala`),
  UNIQUE KEY `sg_sala_unico` (`sg_sala`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_sala`
--

INSERT INTO `tb_sala` (`cd_sala`, `nm_sala`, `sg_sala`, `id_curso`, `st_sala`) VALUES
(1, 'Sala 11', 'BI13', 1, 1),
(2, 'Sala Legal', 'SL', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servico`
--

CREATE TABLE IF NOT EXISTS `tb_servico` (
  `cd_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nm_servico` varchar(45) NOT NULL,
  `ds_servico` varchar(500) NOT NULL,
  PRIMARY KEY (`cd_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefa`
--

CREATE TABLE IF NOT EXISTS `tb_tarefa` (
  `cd_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `st_tarefa` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_tarefa`),
  KEY `id_atividade` (`id_atividade`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_tarefa`
--

INSERT INTO `tb_tarefa` (`cd_tarefa`, `id_atividade`, `id_turma`, `st_tarefa`) VALUES
(1, 1, 5, 1),
(2, 1, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

CREATE TABLE IF NOT EXISTS `tb_turma` (
  `cd_turma` int(11) NOT NULL AUTO_INCREMENT,
  `dt_turma` date NOT NULL,
  `id_sala` int(11) NOT NULL,
  `st_turma` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_turma`),
  KEY `id_sala` (`id_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`cd_turma`, `dt_turma`, `id_sala`, `st_turma`) VALUES
(2, '2018-08-29', 2, 1),
(5, '2018-09-10', 2, 1),
(6, '2018-09-18', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma_comunicado`
--

CREATE TABLE IF NOT EXISTS `tb_turma_comunicado` (
  `cd_turma_comunicado` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) NOT NULL,
  `id_comunicado` int(11) NOT NULL,
  PRIMARY KEY (`cd_turma_comunicado`),
  KEY `id_turma` (`id_turma`),
  KEY `id_comunicado` (`id_comunicado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma_matricula`
--

CREATE TABLE IF NOT EXISTS `tb_turma_matricula` (
  `cd_turma_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `dt_turma_matricula` date NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `st_turma_matricula` tinyint(4) NOT NULL,
  PRIMARY KEY (`cd_turma_matricula`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_arquivo`
--
ALTER TABLE `tb_arquivo`
  ADD CONSTRAINT `tb_arquivo_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_arquivo_questao`
--
ALTER TABLE `tb_arquivo_questao`
  ADD CONSTRAINT `tb_arquivo_questao_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `tb_questao` (`cd_questao`),
  ADD CONSTRAINT `tb_arquivo_questao_ibfk_2` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_arquivo_resposta`
--
ALTER TABLE `tb_arquivo_resposta`
  ADD CONSTRAINT `tb_arquivo_resposta_ibfk_1` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`),
  ADD CONSTRAINT `tb_arquivo_resposta_ibfk_2` FOREIGN KEY (`id_resposta`) REFERENCES `tb_resposta` (`cd_resposta`);

--
-- Limitadores para a tabela `tb_audicao`
--
ALTER TABLE `tb_audicao`
  ADD CONSTRAINT `tb_audicao_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD CONSTRAINT `tb_evento_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_evento_servico`
--
ALTER TABLE `tb_evento_servico`
  ADD CONSTRAINT `tb_evento_servico_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `tb_evento` (`cd_evento`),
  ADD CONSTRAINT `tb_evento_servico_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `tb_servico` (`cd_servico`);

--
-- Limitadores para a tabela `tb_foto_galeria`
--
ALTER TABLE `tb_foto_galeria`
  ADD CONSTRAINT `tb_foto_galeria_ibfk_1` FOREIGN KEY (`id_galeria`) REFERENCES `tb_galeria` (`cd_galeria`),
  ADD CONSTRAINT `tb_foto_galeria_ibfk_2` FOREIGN KEY (`id_foto`) REFERENCES `tb_foto` (`cd_foto`);

--
-- Limitadores para a tabela `tb_galeria`
--
ALTER TABLE `tb_galeria`
  ADD CONSTRAINT `tb_galeria_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_inscrito`
--
ALTER TABLE `tb_inscrito`
  ADD CONSTRAINT `tb_inscrito_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`),
  ADD CONSTRAINT `tb_inscrito_ibfk_2` FOREIGN KEY (`id_audicao`) REFERENCES `tb_audicao` (`cd_audicao`);

--
-- Limitadores para a tabela `tb_matricula`
--
ALTER TABLE `tb_matricula`
  ADD CONSTRAINT `tb_matricula_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_matricula_comunicado`
--
ALTER TABLE `tb_matricula_comunicado`
  ADD CONSTRAINT `tb_matricula_comunicado_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`),
  ADD CONSTRAINT `tb_matricula_comunicado_ibfk_2` FOREIGN KEY (`id_comunicado`) REFERENCES `tb_comunicado` (`cd_comunicado`);

--
-- Limitadores para a tabela `tb_matricula_evento`
--
ALTER TABLE `tb_matricula_evento`
  ADD CONSTRAINT `tb_matricula_evento_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`),
  ADD CONSTRAINT `tb_matricula_evento_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `tb_evento` (`cd_evento`);

--
-- Limitadores para a tabela `tb_matricula_patrocinador`
--
ALTER TABLE `tb_matricula_patrocinador`
  ADD CONSTRAINT `tb_matricula_patrocinador_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`),
  ADD CONSTRAINT `tb_matricula_patrocinador_ibfk_2` FOREIGN KEY (`id_patrocinador`) REFERENCES `tb_patrocinador` (`cd_patrocinador`);

--
-- Limitadores para a tabela `tb_mencao`
--
ALTER TABLE `tb_mencao`
  ADD CONSTRAINT `tb_mencao_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tb_tarefa` (`cd_tarefa`),
  ADD CONSTRAINT `tb_mencao_ibfk_2` FOREIGN KEY (`id_turma_matricula`) REFERENCES `tb_turma_matricula` (`cd_turma_matricula`),
  ADD CONSTRAINT `tb_mencao_ibfk_3` FOREIGN KEY (`id_boletim`) REFERENCES `tb_boletim` (`cd_boletim`);

--
-- Limitadores para a tabela `tb_noticia`
--
ALTER TABLE `tb_noticia`
  ADD CONSTRAINT `tb_noticia_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD CONSTRAINT `tb_pagamento_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`);

--
-- Limitadores para a tabela `tb_parceiro`
--
ALTER TABLE `tb_parceiro`
  ADD CONSTRAINT `tb_parceiro_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_pareceiro_evento_servico`
--
ALTER TABLE `tb_pareceiro_evento_servico`
  ADD CONSTRAINT `tb_pareceiro_evento_servico_ibfk_1` FOREIGN KEY (`id_parceiro`) REFERENCES `tb_parceiro` (`cd_parceiro`),
  ADD CONSTRAINT `tb_pareceiro_evento_servico_ibfk_2` FOREIGN KEY (`id_evento_servico`) REFERENCES `tb_evento_servico` (`cd_evento_servico`);

--
-- Limitadores para a tabela `tb_patrocinador`
--
ALTER TABLE `tb_patrocinador`
  ADD CONSTRAINT `tb_patrocinador_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD CONSTRAINT `tb_professor_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_professor_turma`
--
ALTER TABLE `tb_professor_turma`
  ADD CONSTRAINT `tb_professor_turma_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`cd_turma`),
  ADD CONSTRAINT `tb_professor_turma_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `tb_professor` (`cd_professor`);

--
-- Limitadores para a tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD CONSTRAINT `tb_questao_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `tb_atividade` (`cd_atividade`);

--
-- Limitadores para a tabela `tb_resposta`
--
ALTER TABLE `tb_resposta`
  ADD CONSTRAINT `tb_resposta_ibfk_1` FOREIGN KEY (`id_turma_matricula`) REFERENCES `tb_turma_matricula` (`cd_turma_matricula`),
  ADD CONSTRAINT `tb_resposta_ibfk_2` FOREIGN KEY (`id_questao`) REFERENCES `tb_questao` (`cd_questao`);

--
-- Limitadores para a tabela `tb_sala`
--
ALTER TABLE `tb_sala`
  ADD CONSTRAINT `tb_sala_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `tb_curso` (`cd_curso`);

--
-- Limitadores para a tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefa`
  ADD CONSTRAINT `tb_tarefa_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `tb_atividade` (`cd_atividade`),
  ADD CONSTRAINT `tb_tarefa_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`cd_turma`);

--
-- Limitadores para a tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  ADD CONSTRAINT `tb_turma_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tb_sala` (`cd_sala`);

--
-- Limitadores para a tabela `tb_turma_comunicado`
--
ALTER TABLE `tb_turma_comunicado`
  ADD CONSTRAINT `tb_turma_comunicado_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`cd_turma`),
  ADD CONSTRAINT `tb_turma_comunicado_ibfk_2` FOREIGN KEY (`id_comunicado`) REFERENCES `tb_comunicado` (`cd_comunicado`);

--
-- Limitadores para a tabela `tb_turma_matricula`
--
ALTER TABLE `tb_turma_matricula`
  ADD CONSTRAINT `tb_turma_matricula_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`),
  ADD CONSTRAINT `tb_turma_matricula_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`cd_turma`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
