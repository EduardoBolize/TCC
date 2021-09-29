-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Dez-2018 às 18:17
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
  `st_admin` tinyint(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  PRIMARY KEY (`cd_admin`),
  KEY `id_login` (`id_login`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`cd_admin`, `nm_admin`, `st_admin`, `id_login`, `id_arquivo`) VALUES
(1, 'Ricardo Reis', 1, 1, 10),
(2, 'Luiz Gustavo da Silva Vasconcellos', 1, 106, 3),
(3, 'Tabata Chaves', 1, 109, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alternativa`
--

CREATE TABLE IF NOT EXISTS `tb_alternativa` (
  `cd_alternativa` int(11) NOT NULL AUTO_INCREMENT,
  `sg_alternativa` varchar(1) NOT NULL,
  `tx_alternativa` varchar(400) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `st_correta` tinyint(1) NOT NULL DEFAULT '0',
  `tx_feedback` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`cd_alternativa`),
  KEY `id_questao` (`id_questao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tb_alternativa`
--

INSERT INTO `tb_alternativa` (`cd_alternativa`, `sg_alternativa`, `tx_alternativa`, `id_questao`, `st_correta`, `tx_feedback`) VALUES
(1, 'A', '1910', 2, 0, NULL),
(2, 'B', '1913', 2, 1, NULL),
(3, 'C', '1920', 2, 0, NULL),
(4, 'D', '2018', 2, 0, NULL),
(5, 'A', 'Pablo Vittar, Anita, Tábata Luzia', 4, 0, NULL),
(6, 'B', 'Fit Dance', 4, 0, NULL),
(7, 'C', 'Tábata Luzia, Giovana Caiña e Nathalie Castro', 4, 1, NULL),
(8, 'A', 'Inglaterra', 6, 0, NULL),
(9, 'B', 'Itália', 6, 1, NULL),
(10, 'C', 'França', 6, 0, NULL),
(11, 'D', 'Rússia', 6, 0, NULL),
(12, 'E', 'Estados Unidos', 6, 0, NULL),
(13, 'A', 'Coppelia, Paquita e O Quebra-Nozes', 7, 1, NULL),
(14, 'B', 'Os sertões e Triste Fim de Policarpo Quaresma', 7, 0, NULL),
(15, 'C', 'Iracema e Os Lusiadas', 7, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arquivo`
--

CREATE TABLE IF NOT EXISTS `tb_arquivo` (
  `cd_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `url_arquivo` varchar(255) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_arquivo`),
  UNIQUE KEY `url_arquivo_unico` (`url_arquivo`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `tb_arquivo`
--

INSERT INTO `tb_arquivo` (`cd_arquivo`, `url_arquivo`, `id_login`) VALUES
(1, 'user.png', 1),
(2, 'padrao.jpg', 106),
(3, 'iamtheluiz.jpg', 1),
(4, 'misakido.png', 106),
(6, 'Ballet1.jpg', 106),
(8, 'Ballet2.jpg', 106),
(9, 'Modalidades3.jpg', 106),
(10, 'admin.jpg', 1),
(11, 'Giulia.jpg', 1),
(12, 'Nathalie.jpg', 1),
(13, 'Junior.jpg', 1),
(14, '/galeria/images/src/alice.jpg', 1),
(15, '/galeria/images/src/carolformatura.jpg', 1),
(16, '/galeria/images/src/fileira.jpg', 1),
(17, '/galeria/images/src/gica.jpg', 1),
(18, '/galeria/images/src/leque.jpg', 1),
(19, '/galeria/images/src/part.jpg', 1),
(20, '/galeria/images/src/image1.jpg', 106),
(21, '/galeria/images/src/image2.jpg', 106),
(22, '/galeria/images/src/image3.jpg', 106),
(23, '/galeria/images/src/image4.jpg', 106),
(24, '/galeria/images/src/image5.jpg', 106),
(25, '/galeria/images/src/image6.jpg', 106),
(26, '/galeria/images/src/image7.jpg', 106),
(27, '/galeria/images/src/image8.jpg', 106),
(28, '/galeria/images/src/image9.jpg', 106),
(29, '/galeria/images/src/image10.jpg', 106),
(30, '/galeria/images/src/image11.jpg', 106),
(31, '/galeria/images/src/image12.jpg', 106),
(32, '/galeria/images/src/image13.jpg', 106),
(33, '/galeria/images/src/image14.jpg', 106),
(34, '/galeria/images/src/image15.jpg', 106),
(35, '/galeria/images/src/image19.jpg', 106),
(36, '/galeria/images/src/image24.jpg', 106),
(37, '/galeria/images/src/image25.jpg', 106),
(38, '/galeria/images/src/image28.jpg', 106);

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
  `st_atividade` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_atividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_atividade`
--

INSERT INTO `tb_atividade` (`cd_atividade`, `nm_atividade`, `ds_atividade`, `st_atividade`) VALUES
(1, 'Pesquisa sobre Ballet contemporâneo', 'Faça uma pesquisa sobre o ballet na atualidade e responda as perguntas', 1),
(2, 'A origem do Ballet', 'Questionário acerca da história do Ballet', 1),
(3, 'Importância da Formação para a prática do Ballet', 'Questionário sobre a importância da formação para um profissional de dança', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_audicao`
--

CREATE TABLE IF NOT EXISTS `tb_audicao` (
  `cd_audicao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_audicao` varchar(150) NOT NULL,
  `ds_audicao` varchar(600) NOT NULL,
  `dt_abertura` date NOT NULL,
  `dt_fechamento` date NOT NULL,
  `nr_vagas` varchar(10) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `st_audicao` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_audicao`),
  UNIQUE KEY `nm_audicao_unico` (`nm_audicao`),
  UNIQUE KEY `dt_abertura_unico` (`dt_abertura`),
  UNIQUE KEY `dt_fechamento_unico` (`dt_fechamento`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_audicao`
--

INSERT INTO `tb_audicao` (`cd_audicao`, `nm_audicao`, `ds_audicao`, `dt_abertura`, `dt_fechamento`, `nr_vagas`, `id_admin`, `st_audicao`) VALUES
(1, 'Audição 2º semestre de 2018', 'Audição para início das aulas em janeiro de 2019 ', '2018-12-12', '2018-12-24', '40', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comunicado`
--

CREATE TABLE IF NOT EXISTS `tb_comunicado` (
  `cd_comunicado` int(11) NOT NULL AUTO_INCREMENT,
  `tx_titulo` varchar(150) NOT NULL,
  `ds_descricao` varchar(600) NOT NULL,
  `dt_criacao` date NOT NULL,
  `dt_assunto` date DEFAULT NULL,
  `id_login` int(11) NOT NULL,
  `tp_comunicado` varchar(2) NOT NULL,
  `st_comunicado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_comunicado`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_comunicado`
--

INSERT INTO `tb_comunicado` (`cd_comunicado`, `tx_titulo`, `ds_descricao`, `dt_criacao`, `dt_assunto`, `id_login`, `tp_comunicado`, `st_comunicado`) VALUES
(1, 'Não Haverá Aula', 'No dia 15 de dezembro não haverá aula', '2018-12-12', '2018-12-15', 1, '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

CREATE TABLE IF NOT EXISTS `tb_curso` (
  `cd_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nm_curso` varchar(150) NOT NULL,
  `ds_curso` varchar(600) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  `st_curso` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_curso`),
  UNIQUE KEY `nm_curso_unico` (`nm_curso`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_curso`
--

INSERT INTO `tb_curso` (`cd_curso`, `nm_curso`, `ds_curso`, `id_arquivo`, `st_curso`) VALUES
(1, 'Ballet Clássico Formativo', 'Curso voltado a formação profissional de bailarinos, contando com uma matriz curricular adequada para o pleno exercício de suas atividades no mercado de trabalho, possibilitando o exercício da docência e da prática artística.', 6, 1),
(2, 'Ballet Clássico Não Formativo', 'Curso voltado a prática do Ballet sem objetivo inicial de formação, visando a melhora da qualidade de vida, a recriação por meio da prática da dança e o desenvolvimento de habilidades artísticas ', 8, 1),
(3, 'Modalidades Livres', 'Explora diferentes possibilidades de movimento, estilos de dança e ritmos musicais, dando maior dinâmica na formação do dançarino.', 9, 1),
(4, 'Zumba Dance', 'Dança voltada à queima de calorias em massa, ideal para todas as idades!', 2, 1),
(5, 'Desenvolvimento Artístico', 'Formação dos alunos em vários campos da arte, como a dança, a música e o teatro', 2, 1),
(6, 'Street Dance', 'Dança que aborda estilos como o Rap, o Hip-Hop entre outros', 2, 1);

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
  `st_evento` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_evento`),
  UNIQUE KEY `nm_evento_unico` (`nm_evento`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `cd_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `tx_feedback` varchar(800) NOT NULL,
  `id_resposta` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`cd_feedback`),
  KEY `id_resposta` (`id_resposta`),
  KEY `id_professor` (`id_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_feedback`
--

INSERT INTO `tb_feedback` (`cd_feedback`, `tx_feedback`, `id_resposta`, `id_professor`) VALUES
(1, 'certin', 1, 3),
(2, 'certin', 2, 3),
(3, 'boa', 3, 3),
(4, 'errô', 4, 3);

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
  `st_galeria` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_galeria`),
  UNIQUE KEY `nm_galeria_unico` (`nm_galeria`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_galeria`
--

INSERT INTO `tb_galeria` (`cd_galeria`, `nm_galeria`, `ds_galeria`, `dt_galeria`, `id_admin`, `st_galeria`) VALUES
(1, 'Galeria de Exemplo', 'Só uma galeria', '2018-11-26', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscrito`
--

CREATE TABLE IF NOT EXISTS `tb_inscrito` (
  `cd_inscrito` int(11) NOT NULL AUTO_INCREMENT,
  `nm_inscrito` varchar(200) NOT NULL,
  `nr_cpf` varchar(14) NOT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `st_inscrito` tinyint(1) NOT NULL DEFAULT '1',
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_inscrito`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_inscrito`
--

INSERT INTO `tb_inscrito` (`cd_inscrito`, `nm_inscrito`, `nr_cpf`, `ds_endereco`, `ds_cidade`, `nr_telefone1`, `nr_telefone2`, `tx_email`, `st_email`, `st_inscrito`, `id_login`) VALUES
(1, 'Inscrito de Freitas', '472.521.608-88', 'R. da Inscrição, nº 42', 'Itanhaém', '(13) 3427-9023', '(13) 3486-2701', 'inscrito@gmail.com', 0, 1, 164);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscrito_audicao`
--

CREATE TABLE IF NOT EXISTS `tb_inscrito_audicao` (
  `cd_inscrito_audicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_inscrito` int(11) NOT NULL,
  `id_audicao` int(11) NOT NULL,
  `dt_encontro` date NOT NULL,
  `hr_encontro` varchar(5) NOT NULL,
  `st_inscrito` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_inscrito_audicao`),
  KEY `id_inscrito` (`id_inscrito`),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`cd_login`, `tx_login`, `tx_pass`) VALUES
(1, 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(100, 'giulia', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(101, 'nath', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(102, 'junior', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(103, 'fernando', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(104, 'michelle', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(105, 'joelma', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(106, 'iamtheluiz', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(107, 'balog', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(108, 'kekobolize', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(109, 'misakido', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(110, 'luana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(111, 'rafael', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(150, 'maria', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(151, 'ana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(152, 'alice', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(153, 'isa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(154, 'joana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(155, 'talita', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(156, 'monica', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(157, 'alexandra', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(158, 'paola', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(159, 'francisca', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(160, 'samanta', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(161, 'fernanda', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(162, 'isabela', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(163, 'Tabata', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(164, 'inscrito', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materia`
--

CREATE TABLE IF NOT EXISTS `tb_materia` (
  `cd_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nm_materia` varchar(60) NOT NULL,
  `ds_materia` varchar(160) NOT NULL,
  `tx_cor` varchar(15) NOT NULL,
  `st_materia` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_materia`),
  UNIQUE KEY `nm_materia_unico` (`nm_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_materia`
--

INSERT INTO `tb_materia` (`cd_materia`, `nm_materia`, `ds_materia`, `tx_cor`, `st_materia`) VALUES
(1, 'Dança', 'Aulas de Dança', '#400080', 1),
(2, 'Teoria Musical ', 'Aulas sobre a teoria por trás da música', '#18637e', 1),
(3, 'Expressão Corporal ', 'Aulas de Expressões Corporais ', '#008040', 1),
(4, 'Canto', 'Aulas de Canto', '#400000', 1),
(5, 'Ballet Clássico', 'Aulas sobre o Ballet Clássico', '#1f2172', 1),
(6, 'Ballet Contemporâneo', 'Aulas de ballet contemporâneo', '#ff8040', 1),
(7, 'Aulas de Jazz', 'Aulas sobre o estilo jazz', '#000040', 1),
(8, 'Danças Urbanas', 'Aulas sobre danças contemporâneas ', '#008080', 1);

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
  `nr_cpf` varchar(14) NOT NULL,
  `dt_matricula` date NOT NULL,
  `st_matricula` tinyint(1) NOT NULL DEFAULT '1',
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nr_rg` varchar(12) NOT NULL,
  `nm_sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`cd_matricula`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `tb_matricula`
--

INSERT INTO `tb_matricula` (`cd_matricula`, `nm_matricula`, `ds_endereco`, `ds_cidade`, `nr_telefone1`, `nr_telefone2`, `nr_cpf`, `dt_matricula`, `st_matricula`, `tx_email`, `st_email`, `id_login`, `nr_rg`, `nm_sexo`) VALUES
(1, 'Guilherme Balog', 'Rua da Bananeiras, nº 123', 'Pedro de Toledo', '(13) 3666-8552', '(13) 3558-8965', '412.358.762-30', '2001-08-23', 1, 'guibalog@gmail.com', 0, 107, '12.569.873-4', 'M'),
(2, 'Eduardo Hernani Mendes Bolize', 'Rua das Laranjas, nº 54321', 'Itanhaém', '(13) 5268-4251', '(13) 6598-7412', '125.896.743-2', '2001-02-21', 1, 'kekobolize@gmail.com', 0, 108, '41.587.266-5', 'M'),
(3, 'Luana Gomes', 'Rua das Oliveiras, nº 1256', 'Itanhaém', '(13) 5689-4521', '(13) 2058-7963', '458.721.658-73', '2000-03-08', 1, 'luanagomes@gmail.com', 0, 110, '12.546.325-8', 'F'),
(4, 'Rafael Vitor Pereira', 'Rua das Macieiras, nº 12453', 'Itanhaém', '(13) 2054-8631', '(13) 8652-1493', '152.468.753-21', '2001-03-29', 1, 'rafaelvitor@gmail.com', 0, 111, '15.935.745-6', 'M'),
(5, 'Maria do Ballet', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '123.898.234-72', '2001-06-15', 1, 'maria@gmail.com', 1, 150, '98.923.658-7', 'F'),
(6, 'Ana Maria', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '234.898.234-72', '2001-06-15', 1, 'anamaria@gmail.com', 1, 151, '98.923.658-7', 'F'),
(7, 'Alice da Silva', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '456.898.234-72', '2001-06-15', 1, 'alice@gmail.com', 1, 152, '98.923.658-7', 'F'),
(8, 'Isamela Belim', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '567.898.234-72', '2001-06-15', 1, 'isa@gmail.com', 1, 153, '98.923.658-7', 'F'),
(9, 'Joana Escura', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '789.898.234-72', '2001-06-15', 1, 'joana@gmail.com', 1, 154, '98.923.658-7', 'F'),
(10, 'Talita Talamenes', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '908.898.234-72', '2001-06-15', 1, 'talita@gmail.com', 1, 155, '98.923.658-7', 'F'),
(11, 'Monica de Souza', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '777.898.234-72', '2001-06-15', 1, 'monica@gmail.com', 1, 156, '98.923.658-7', '9'),
(12, 'Alexandra Grandde', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '243.898.234-72', '2001-06-15', 1, 'alexandra@gmail.com', 1, 157, '98.923.658-7', 'F'),
(13, 'Paola Mendes', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '153.898.234-72', '2001-06-15', 1, 'paola@gmail.com', 1, 158, '98.923.658-7', 'F'),
(14, 'Francisca Chavier', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '634.898.234-72', '2001-06-15', 1, 'francisca@gmail.com', 1, 159, '98.923.658-7', 'F'),
(15, 'Samanta Sonâmbula', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '674.898.234-72', '2001-06-15', 1, 'samanta@gmail.com', 1, 160, '98.923.658-7', '9'),
(16, 'Fernanda Borges', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '345.898.234-72', '2001-06-15', 1, 'fernanda@gmail.com', 1, 161, '98.923.658-7', 'F'),
(17, 'Tabata Chaves', 'Jsksjsisnsisnsisnsosndkks', 'Peruíbe', '(11) 1234-1234', '(11) 1234-1234', '452.287.028-06', '2001-12-10', 1, 'gasaiyunochan.inuyasha@gmail.com', 0, 163, '56.098.665-4', '5');

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
  `cd_matricula_evento` int(11) NOT NULL AUTO_INCREMENT,
  `st_confirma` tinyint(1) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`cd_matricula_evento`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mencao`
--

CREATE TABLE IF NOT EXISTS `tb_mencao` (
  `cd_mencao` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarefa` int(11) NOT NULL,
  `id_turma_matricula` int(11) NOT NULL,
  `tx_nota` varchar(4) NOT NULL,
  PRIMARY KEY (`cd_mencao`),
  KEY `id_tarefa` (`id_tarefa`),
  KEY `id_turma_matricula` (`id_turma_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_midia`
--

CREATE TABLE IF NOT EXISTS `tb_midia` (
  `cd_midia` int(11) NOT NULL AUTO_INCREMENT,
  `nm_midia` varchar(120) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  PRIMARY KEY (`cd_midia`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `tb_midia`
--

INSERT INTO `tb_midia` (`cd_midia`, `nm_midia`, `id_arquivo`) VALUES
(1, 'Fotos de exemplo', 14),
(2, 'Fotos de exemplo', 15),
(3, 'Fotos de exemplo', 16),
(4, 'Fotos de exemplo', 17),
(5, 'Fotos de exemplo', 18),
(6, 'Fotos de exemplo', 19),
(7, 'Fotos de evento', 20),
(8, 'Fotos de evento', 21),
(9, 'Fotos de evento', 22),
(10, 'Fotos de evento', 23),
(11, 'Fotos de evento', 24),
(12, 'Fotos de evento', 25),
(13, 'Fotos de evento', 26),
(14, 'Fotos de evento', 27),
(15, 'Fotos de evento', 28),
(16, 'Fotos de evento', 29),
(17, 'Fotos de evento', 30),
(18, 'Fotos de evento', 31),
(19, 'Mais fotos', 32),
(20, 'Mais fotos', 33),
(21, 'Mais fotos', 34),
(22, 'Dançarinas', 35),
(23, 'Bailarinas', 36),
(24, 'Bailarinas', 37),
(25, 'Bailarinas', 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_midia_galeria`
--

CREATE TABLE IF NOT EXISTS `tb_midia_galeria` (
  `cd_midia_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) NOT NULL,
  `id_midia` int(11) NOT NULL,
  PRIMARY KEY (`cd_midia_galeria`),
  KEY `id_galeria` (`id_galeria`),
  KEY `id_midia` (`id_midia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `tb_midia_galeria`
--

INSERT INTO `tb_midia_galeria` (`cd_midia_galeria`, `id_galeria`, `id_midia`) VALUES
(1, 1, 1),
(6, 1, 6),
(7, 1, 5),
(9, 1, 4),
(10, 1, 2),
(11, 1, 7),
(12, 1, 8),
(13, 1, 9),
(14, 1, 10),
(16, 1, 12),
(17, 1, 13),
(18, 1, 14),
(19, 1, 15),
(20, 1, 16),
(21, 1, 17),
(22, 1, 18),
(23, 1, 19),
(24, 1, 20),
(25, 1, 21),
(26, 1, 22),
(27, 1, 23),
(28, 1, 24),
(29, 1, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticia`
--

CREATE TABLE IF NOT EXISTS `tb_noticia` (
  `cd_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `tx_titulo` varchar(150) NOT NULL,
  `ds_noticia` text NOT NULL,
  `dt_noticia` date NOT NULL,
  `id_login` int(11) NOT NULL,
  `st_noticia` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_noticia`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE IF NOT EXISTS `tb_pagamento` (
  `cd_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `url_boleto` varchar(300) NOT NULL,
  `st_pagamento` tinyint(1) NOT NULL DEFAULT '1',
  `dt_envio` date NOT NULL,
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
  `ds_parceiro` varchar(600) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  PRIMARY KEY (`cd_parceiro`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE IF NOT EXISTS `tb_professor` (
  `cd_professor` int(11) NOT NULL AUTO_INCREMENT,
  `nm_professor` varchar(200) NOT NULL,
  `id_arquivo` int(11) NOT NULL,
  `nr_cpf` varchar(14) NOT NULL,
  `nr_telefone1` varchar(25) NOT NULL,
  `nr_telefone2` varchar(25) DEFAULT NULL,
  `ds_endereco` varchar(250) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `st_email` tinyint(1) NOT NULL DEFAULT '0',
  `st_professor` tinyint(1) NOT NULL DEFAULT '1',
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`cd_professor`),
  UNIQUE KEY `nr_cpf_unico` (`nr_cpf`),
  UNIQUE KEY `tx_email_unico` (`tx_email`),
  KEY `id_login` (`id_login`),
  KEY `id_arquivo` (`id_arquivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`cd_professor`, `nm_professor`, `id_arquivo`, `nr_cpf`, `nr_telefone1`, `nr_telefone2`, `ds_endereco`, `ds_cidade`, `tx_email`, `st_email`, `st_professor`, `id_login`) VALUES
(1, 'Giulia Souza', 11, '123.456.789-01', '(13) 8186-1521', '(13) 8112-1731', 'Rua das Amoreiras 1345', 'Peruíbe', 'giulia@andorinha.com', 1, 1, 100),
(2, 'Nathalie Castro', 12, '123.456.789-02', '(13) 8186-1522', '(13) 8112-1732', 'Rua das Amoreiras 1345', 'Peruíbe', 'nath@andorinha.com', 1, 1, 101),
(3, 'Junior Castro', 13, '123.456.789-03', '(13) 8186-1523', '(13) 8112-1733', 'Rua das Amoreiras 1345', 'Peruíbe', 'junior@andorinha.com', 1, 1, 102),
(4, 'Fernando Augusto', 1, '123.456.789-04', '(13) 8186-1524', '(13) 8112-1734', 'Rua das Amoreiras 1345', 'Peruíbe', 'fernando@andorinha.com', 1, 1, 103),
(5, 'Michelle Barbosa', 1, '123.456.789-05', '(13) 8186-1525', '(13) 8112-1735', 'Rua das Amoreiras 1345', 'Peruíbe', 'michelle@etec.com', 1, 1, 104),
(6, 'Joelma Sartori', 1, '123.456.789-06', '(13) 8186-1526', '(13) 8112-1736', 'Rua das Amoreiras 1345', 'Peruíbe', 'joelma@etec.com', 1, 1, 105);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor_sala_materia`
--

CREATE TABLE IF NOT EXISTS `tb_professor_sala_materia` (
  `cd_professor_sala_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala_materia` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `st_professor_sala_materia` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_professor_sala_materia`),
  KEY `id_sala_materia` (`id_sala_materia`),
  KEY `id_professor` (`id_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `tb_professor_sala_materia`
--

INSERT INTO `tb_professor_sala_materia` (`cd_professor_sala_materia`, `id_sala_materia`, `id_professor`, `st_professor_sala_materia`) VALUES
(1, 16, 1, 1),
(4, 3, 2, 1),
(5, 4, 2, 1),
(6, 7, 2, 1),
(7, 5, 2, 1),
(8, 1, 2, 1),
(9, 9, 2, 1),
(10, 22, 3, 1),
(11, 20, 3, 1),
(12, 23, 3, 1),
(13, 21, 3, 1),
(14, 10, 4, 1),
(15, 8, 4, 1),
(16, 6, 4, 1),
(17, 7, 4, 1),
(23, 7, 1, 1),
(24, 19, 1, 1),
(25, 4, 1, 1),
(26, 4, 5, 1),
(27, 16, 5, 1),
(28, 23, 5, 1),
(29, 5, 5, 1),
(30, 17, 5, 1),
(31, 20, 5, 1),
(32, 11, 2, 1),
(33, 19, 2, 1),
(34, 16, 2, 1),
(35, 17, 2, 1),
(36, 18, 2, 1),
(37, 15, 2, 1),
(38, 13, 2, 1),
(39, 16, 3, 1),
(40, 19, 3, 1),
(41, 13, 3, 1),
(42, 4, 3, 1),
(43, 7, 3, 1),
(44, 17, 3, 1),
(45, 3, 3, 1),
(46, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `cd_questao` int(11) NOT NULL AUTO_INCREMENT,
  `tx_enunciado` varchar(400) NOT NULL,
  `tp_questao` varchar(1) NOT NULL,
  `vl_pontos` varchar(5) DEFAULT NULL,
  `id_atividade` int(11) NOT NULL,
  `st_questao` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_questao`),
  KEY `id_atividade` (`id_atividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`cd_questao`, `tx_enunciado`, `tp_questao`, `vl_pontos`, `id_atividade`, `st_questao`) VALUES
(1, 'Quem começou o Ballet Contemporâneo?', '0', '2', 1, 1),
(2, 'Em que ano começou o Ballet Contemporâneo?', '1', '1', 1, 1),
(3, 'Cite 3 passos do B.C.', '0', '5', 1, 1),
(4, 'Assinale a alternativa que apresenta apenas dançarinos contemporâneos', '1', '4', 1, 1),
(5, 'Quem é conhecido como criador(a) do Ballet', '0', '2', 2, 1),
(6, 'Qual é a origem do ballet clássico?', '1', '1', 2, 1),
(7, 'São exemplos de ballet de repertório:', '1', '1', 2, 1),
(8, 'Quantas são as posições de pés no ballet?', '0', '2', 2, 1),
(9, 'Para você, o que representa a formação no Ballet?', '0', '0', 3, 1),
(10, 'Existe um motivo para ter optado pelo curso?', '0', '0', 3, 1),
(11, 'O que espera desse curso para sua formação?', '0', '0', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_resposta`
--

CREATE TABLE IF NOT EXISTS `tb_resposta` (
  `cd_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `tx_resposta` varchar(800) NOT NULL,
  `dt_resposta` date NOT NULL,
  `vl_resposta` varchar(5) DEFAULT '0',
  `id_turma_matricula` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  PRIMARY KEY (`cd_resposta`),
  KEY `id_turma_matricula` (`id_turma_matricula`),
  KEY `id_questao` (`id_questao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_resposta`
--

INSERT INTO `tb_resposta` (`cd_resposta`, `tx_resposta`, `dt_resposta`, `vl_resposta`, `id_turma_matricula`, `id_questao`) VALUES
(1, 'George Washington', '2018-12-12', '2', 3, 5),
(2, 'B', '2018-12-12', '1', 3, 6),
(3, 'A', '2018-12-12', '1', 3, 7),
(4, '25', '2018-12-12', '0.1', 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sac`
--

CREATE TABLE IF NOT EXISTS `tb_sac` (
  `cd_sac` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sac` varchar(200) NOT NULL,
  `ds_sac` varchar(600) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  PRIMARY KEY (`cd_sac`)
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
  `st_sala` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_sala`),
  UNIQUE KEY `nm_sala_unico` (`nm_sala`),
  UNIQUE KEY `sg_sala_unico` (`sg_sala`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tb_sala`
--

INSERT INTO `tb_sala` (`cd_sala`, `nm_sala`, `sg_sala`, `id_curso`, `st_sala`) VALUES
(1, 'Primeiro Ano Formativo', '1F', 1, 1),
(2, 'Segundo Ano Formativo', '2F', 1, 1),
(3, 'Terceiro Ano Formativo', '3F', 1, 1),
(4, 'Primeiro Ano Não-Formativo', '1NF', 2, 1),
(5, 'Segundo Ano Não-Formativo', '2NF', 2, 1),
(6, 'Primeiro Ano Modalidades Livres', '1ML', 3, 1),
(7, 'Primerio Ano Zumba', '1Z', 4, 1),
(8, 'Primeiro Ano Desenvolvimento Artístico ', '1DA', 5, 1),
(9, 'Quarto Ano Formativo', '4F', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala_materia`
--

CREATE TABLE IF NOT EXISTS `tb_sala_materia` (
  `cd_sala_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `st_sala_materia` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_sala_materia`),
  KEY `id_materia` (`id_materia`),
  KEY `id_sala` (`id_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `tb_sala_materia`
--

INSERT INTO `tb_sala_materia` (`cd_sala_materia`, `id_sala`, `id_materia`, `st_sala_materia`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 4, 1),
(4, 2, 5, 1),
(5, 2, 6, 1),
(6, 2, 3, 1),
(7, 3, 7, 1),
(8, 3, 8, 1),
(9, 1, 3, 1),
(10, 3, 3, 1),
(11, 4, 1, 1),
(12, 4, 2, 1),
(13, 4, 4, 1),
(14, 4, 3, 1),
(15, 5, 3, 1),
(16, 5, 5, 1),
(17, 5, 6, 1),
(18, 5, 8, 1),
(19, 5, 7, 1),
(20, 6, 6, 1),
(21, 6, 1, 1),
(22, 6, 7, 1),
(23, 6, 5, 1),
(24, 7, 1, 1),
(25, 7, 7, 1),
(26, 7, 3, 1),
(27, 7, 8, 1),
(28, 8, 2, 1),
(29, 8, 4, 1),
(30, 8, 1, 1),
(31, 8, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefa`
--

CREATE TABLE IF NOT EXISTS `tb_tarefa` (
  `cd_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tarefa` varchar(150) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `st_tarefa` tinyint(1) NOT NULL DEFAULT '1',
  `dt_tarefa` date NOT NULL,
  `dt_prazo` date NOT NULL,
  `hr_prazo` varchar(5) NOT NULL,
  PRIMARY KEY (`cd_tarefa`),
  KEY `id_atividade` (`id_atividade`),
  KEY `id_turma` (`id_turma`),
  KEY `id_criador` (`id_criador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_tarefa`
--

INSERT INTO `tb_tarefa` (`cd_tarefa`, `nm_tarefa`, `id_atividade`, `id_turma`, `id_criador`, `st_tarefa`, `dt_tarefa`, `dt_prazo`, `hr_prazo`) VALUES
(1, 'Pesquisa', 1, 3, 100, 1, '2018-12-05', '2018-12-13', '18:30'),
(2, 'Quiz sobre o ballet', 2, 1, 101, 1, '2018-12-11', '2018-12-18', '06:30'),
(3, 'Questionário sobre a origem do ballet', 2, 4, 102, 1, '2018-12-09', '2018-12-12', '06:05'),
(4, 'Somente uma Tarefa', 2, 8, 101, 1, '2018-12-03', '2018-12-25', '04:30'),
(5, 'Questionário', 3, 1, 101, 1, '2018-12-11', '2018-12-15', '00:00'),
(6, 'Questionário sobre sua formação', 3, 4, 101, 1, '2018-12-03', '2018-12-13', '15:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefa_materia`
--

CREATE TABLE IF NOT EXISTS `tb_tarefa_materia` (
  `cd_tarefa_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarefa` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  PRIMARY KEY (`cd_tarefa_materia`),
  KEY `id_tarefa` (`id_tarefa`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_tarefa_materia`
--

INSERT INTO `tb_tarefa_materia` (`cd_tarefa_materia`, `id_tarefa`, `id_materia`) VALUES
(1, 2, 1),
(2, 2, 3),
(3, 3, 1),
(4, 3, 3),
(5, 4, 1),
(6, 4, 3),
(7, 5, 1),
(8, 5, 2),
(9, 5, 4),
(10, 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

CREATE TABLE IF NOT EXISTS `tb_turma` (
  `cd_turma` int(11) NOT NULL AUTO_INCREMENT,
  `dt_turma` date NOT NULL,
  `id_sala` int(11) NOT NULL,
  `st_turma` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cd_turma`),
  KEY `id_sala` (`id_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`cd_turma`, `dt_turma`, `id_sala`, `st_turma`) VALUES
(1, '2017-01-01', 1, 1),
(2, '2018-01-01', 2, 1),
(3, '2018-01-01', 3, 1),
(4, '2018-07-27', 1, 1),
(5, '2018-07-01', 5, 1),
(7, '2018-07-01', 6, 1),
(8, '2018-07-01', 4, 1);

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
  `st_turma_matricula` tinyint(1) NOT NULL DEFAULT '1',
  `id_matricula` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`cd_turma_matricula`),
  KEY `id_matricula` (`id_matricula`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `tb_turma_matricula`
--

INSERT INTO `tb_turma_matricula` (`cd_turma_matricula`, `dt_turma_matricula`, `st_turma_matricula`, `id_matricula`, `id_turma`) VALUES
(1, '0000-00-00', 1, 1, 4),
(2, '0000-00-00', 1, 2, 4),
(3, '0000-00-00', 1, 3, 4),
(4, '0000-00-00', 1, 4, 5),
(5, '0000-00-00', 1, 5, 5),
(6, '0000-00-00', 1, 6, 5),
(7, '0000-00-00', 1, 8, 7),
(8, '0000-00-00', 1, 9, 7),
(9, '0000-00-00', 1, 10, 7),
(10, '0000-00-00', 1, 11, 8),
(11, '0000-00-00', 1, 12, 8),
(12, '0000-00-00', 1, 13, 8),
(13, '0000-00-00', 1, 14, 1),
(14, '0000-00-00', 1, 15, 1),
(15, '0000-00-00', 1, 16, 1),
(16, '0000-00-00', 1, 13, 1),
(17, '0000-00-00', 1, 17, 1),
(18, '0000-00-00', 1, 1, 7),
(19, '0000-00-00', 1, 1, 8),
(20, '0000-00-00', 1, 3, 8),
(21, '0000-00-00', 1, 4, 8),
(22, '0000-00-00', 1, 1, 2),
(23, '0000-00-00', 1, 4, 2),
(24, '0000-00-00', 1, 3, 2),
(25, '0000-00-00', 1, 15, 3),
(26, '0000-00-00', 1, 1, 3),
(27, '0000-00-00', 1, 4, 3),
(28, '0000-00-00', 1, 3, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`),
  ADD CONSTRAINT `tb_admin_ibfk_2` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_alternativa`
--
ALTER TABLE `tb_alternativa`
  ADD CONSTRAINT `tb_alternativa_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `tb_questao` (`cd_questao`);

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
-- Limitadores para a tabela `tb_comunicado`
--
ALTER TABLE `tb_comunicado`
  ADD CONSTRAINT `tb_comunicado_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD CONSTRAINT `tb_curso_ibfk_1` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD CONSTRAINT `tb_evento_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD CONSTRAINT `tb_feedback_ibfk_1` FOREIGN KEY (`id_resposta`) REFERENCES `tb_resposta` (`cd_resposta`),
  ADD CONSTRAINT `tb_feedback_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `tb_professor` (`cd_professor`);

--
-- Limitadores para a tabela `tb_galeria`
--
ALTER TABLE `tb_galeria`
  ADD CONSTRAINT `tb_galeria_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`cd_admin`);

--
-- Limitadores para a tabela `tb_inscrito`
--
ALTER TABLE `tb_inscrito`
  ADD CONSTRAINT `tb_inscrito_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_inscrito_audicao`
--
ALTER TABLE `tb_inscrito_audicao`
  ADD CONSTRAINT `tb_inscrito_audicao_ibfk_1` FOREIGN KEY (`id_inscrito`) REFERENCES `tb_inscrito` (`cd_inscrito`),
  ADD CONSTRAINT `tb_inscrito_audicao_ibfk_2` FOREIGN KEY (`id_audicao`) REFERENCES `tb_audicao` (`cd_audicao`);

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
-- Limitadores para a tabela `tb_mencao`
--
ALTER TABLE `tb_mencao`
  ADD CONSTRAINT `tb_mencao_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tb_tarefa` (`cd_tarefa`),
  ADD CONSTRAINT `tb_mencao_ibfk_2` FOREIGN KEY (`id_turma_matricula`) REFERENCES `tb_turma_matricula` (`cd_turma_matricula`);

--
-- Limitadores para a tabela `tb_midia`
--
ALTER TABLE `tb_midia`
  ADD CONSTRAINT `tb_midia_ibfk_1` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_midia_galeria`
--
ALTER TABLE `tb_midia_galeria`
  ADD CONSTRAINT `tb_midia_galeria_ibfk_1` FOREIGN KEY (`id_galeria`) REFERENCES `tb_galeria` (`cd_galeria`),
  ADD CONSTRAINT `tb_midia_galeria_ibfk_2` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`cd_midia`);

--
-- Limitadores para a tabela `tb_noticia`
--
ALTER TABLE `tb_noticia`
  ADD CONSTRAINT `tb_noticia_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD CONSTRAINT `tb_pagamento_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `tb_matricula` (`cd_matricula`);

--
-- Limitadores para a tabela `tb_parceiro`
--
ALTER TABLE `tb_parceiro`
  ADD CONSTRAINT `tb_parceiro_ibfk_1` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD CONSTRAINT `tb_professor_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`cd_login`),
  ADD CONSTRAINT `tb_professor_ibfk_2` FOREIGN KEY (`id_arquivo`) REFERENCES `tb_arquivo` (`cd_arquivo`);

--
-- Limitadores para a tabela `tb_professor_sala_materia`
--
ALTER TABLE `tb_professor_sala_materia`
  ADD CONSTRAINT `tb_professor_sala_materia_ibfk_1` FOREIGN KEY (`id_sala_materia`) REFERENCES `tb_sala_materia` (`cd_sala_materia`),
  ADD CONSTRAINT `tb_professor_sala_materia_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `tb_professor` (`cd_professor`);

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
-- Limitadores para a tabela `tb_sala_materia`
--
ALTER TABLE `tb_sala_materia`
  ADD CONSTRAINT `tb_sala_materia_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `tb_materia` (`cd_materia`),
  ADD CONSTRAINT `tb_sala_materia_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `tb_sala` (`cd_sala`);

--
-- Limitadores para a tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefa`
  ADD CONSTRAINT `tb_tarefa_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `tb_atividade` (`cd_atividade`),
  ADD CONSTRAINT `tb_tarefa_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `tb_turma` (`cd_turma`),
  ADD CONSTRAINT `tb_tarefa_ibfk_3` FOREIGN KEY (`id_criador`) REFERENCES `tb_login` (`cd_login`);

--
-- Limitadores para a tabela `tb_tarefa_materia`
--
ALTER TABLE `tb_tarefa_materia`
  ADD CONSTRAINT `tb_tarefa_materia_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tb_tarefa` (`cd_tarefa`),
  ADD CONSTRAINT `tb_tarefa_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `tb_materia` (`cd_materia`);

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
