-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Dez-2018 às 20:45
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

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`cd_admin`, `nm_admin`, `st_admin`, `id_login`, `id_arquivo`) VALUES
(1, 'Ricardo Reis', 1, 1, 10),
(2, 'Luiz Gustavo da Silva Vasconcellos', 1, 106, 3),
(3, 'Tabata Chaves', 1, 109, 4);

--
-- Extraindo dados da tabela `tb_alternativa`
--

INSERT INTO `tb_alternativa` (`cd_alternativa`, `sg_alternativa`, `tx_alternativa`, `id_questao`, `st_correta`, `tx_feedback`) VALUES
(1, 'A', 'Pequeno', 3, 1, NULL),
(2, 'B', 'Metade', 3, 0, NULL),
(3, 'C', 'Arqueado', 3, 0, NULL),
(4, 'D', 'Reunir', 3, 0, NULL);

--
-- Extraindo dados da tabela `tb_arquivo`
--

INSERT INTO `tb_arquivo` (`cd_arquivo`, `url_arquivo`, `id_login`) VALUES
(1, 'user.png', 1),
(2, 'padrao.jpg', 106),
(3, 'iamtheluiz.jpg', 1),
(4, 'misakido.jpg', 106),
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
(19, '/galeria/images/src/part.jpg', 1);

--
-- Extraindo dados da tabela `tb_atividade`
--

INSERT INTO `tb_atividade` (`cd_atividade`, `nm_atividade`, `ds_atividade`, `st_atividade`) VALUES
(1, 'Passos de Dança', 'Atividade sobre os passos de dança vistos em sala', 1),
(2, 'Perguntas gerais sobre o ballet', 'Um questionário sobre tópicos diversos do ballet', 1),
(3, 'Importância da Formação para a prática do Ballet', 'Questionário sobre a importância da formação para um profissional de dança', 1),
(4, 'Atividade Vídeo de Ballet', 'Grave um vídeo dançando e poste aqui', 1);

--
-- Extraindo dados da tabela `tb_audicao`
--

INSERT INTO `tb_audicao` (`cd_audicao`, `nm_audicao`, `ds_audicao`, `dt_abertura`, `dt_fechamento`, `nr_vagas`, `id_admin`, `st_audicao`) VALUES
(1, 'Audição de 2018', 'Estão abertas as audições para a escola de Ballet Andorinha!', '2018-11-21', '2018-12-13', '20', 1, 1),
(2, 'Audição de 2019', 'Audições para as turmas de 2019 da escola Ballet Andorinha ', '2018-11-14', '2018-12-31', '30', 1, 1);

--
-- Extraindo dados da tabela `tb_comunicado`
--

INSERT INTO `tb_comunicado` (`cd_comunicado`, `tx_titulo`, `ds_descricao`, `dt_criacao`, `dt_assunto`, `id_login`, `tp_comunicado`, `st_comunicado`) VALUES
(1, 'Reposição de Aula', 'No dia 15 de agosto haverá reposição de aula', '2018-09-09', '2018-10-09', 104, '1', 1),
(2, 'Não Haverá Aula', 'No dia 15 de agosto não haverá aula', '2018-09-22', '2018-10-22', 104, '1', 1),
(3, 'Comunicado Teste', 'Um comunicado pra fins de teste', '2018-09-23', '2018-10-23', 104, '1', 1),
(4, 'Não haverá aula', 'exenplo', '2018-11-27', '2018-11-28', 1, '1', 1);

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

--
-- Extraindo dados da tabela `tb_galeria`
--

INSERT INTO `tb_galeria` (`cd_galeria`, `nm_galeria`, `ds_galeria`, `dt_galeria`, `id_admin`, `st_galeria`) VALUES
(1, 'Galeria de Exemplo', 'Só uma galeria', '2018-11-26', 1, 1);

--
-- Extraindo dados da tabela `tb_inscrito`
--

INSERT INTO `tb_inscrito` (`cd_inscrito`, `nm_inscrito`, `nr_cpf`, `ds_endereco`, `ds_cidade`, `nr_telefone1`, `nr_telefone2`, `tx_email`, `st_email`, `st_inscrito`, `id_login`) VALUES
(1, 'Isabela Melim', '205.893.674-55', 'Rua das Flores, nº 20', 'Itanhaém', '(13) 5896-7423', '(13) 5687-5932', 'isabela@gmail.com', 0, 1, 162);

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
(110, 'luluana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(111, 'rafavitor', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
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
(162, 'isabela', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

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
(11, 'Mônica de Souza', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '777.898.234-72', '2001-06-15', 1, 'monica@gmail.com', 1, 156, '98.923.658-7', 'F'),
(12, 'Alexandra Grandde', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '243.898.234-72', '2001-06-15', 1, 'alexandra@gmail.com', 1, 157, '98.923.658-7', 'F'),
(13, 'Paola Mendes', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '153.898.234-72', '2001-06-15', 1, 'paola@gmail.com', 1, 158, '98.923.658-7', 'F'),
(14, 'Francisca Chavier', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '634.898.234-72', '2001-06-15', 1, 'francisca@gmail.com', 1, 159, '98.923.658-7', 'F'),
(15, 'Samanta Sonâmbula', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '674.898.234-72', '2001-06-15', 1, 'samanta@gmail.com', 1, 160, '98.923.658-7', 'F'),
(16, 'Fernanda Borges', 'Rua das Beterrabas, nº 53', 'Itanhaém', '(13) 3419-1691', '(13) 8112-1733', '345.898.234-72', '2001-06-15', 1, 'fernanda@gmail.com', 1, 161, '98.923.658-7', 'F');

--
-- Extraindo dados da tabela `tb_matricula_comunicado`
--

INSERT INTO `tb_matricula_comunicado` (`cd_matricula_comunicado`, `id_matricula`, `id_comunicado`) VALUES
(1, 1, 1);

--
-- Extraindo dados da tabela `tb_midia`
--

INSERT INTO `tb_midia` (`cd_midia`, `nm_midia`, `id_arquivo`) VALUES
(1, 'Fotos de exemplo', 14),
(2, 'Fotos de exemplo', 15),
(3, 'Fotos de exemplo', 16),
(4, 'Fotos de exemplo', 17),
(5, 'Fotos de exemplo', 18),
(6, 'Fotos de exemplo', 19);

--
-- Extraindo dados da tabela `tb_midia_galeria`
--

INSERT INTO `tb_midia_galeria` (`cd_midia_galeria`, `id_galeria`, `id_midia`) VALUES
(1, 1, 1),
(6, 1, 6),
(7, 1, 5),
(9, 1, 4),
(10, 1, 2);

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
(25, 4, 1, 1);

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`cd_questao`, `tx_enunciado`, `tp_questao`, `vl_pontos`, `id_atividade`, `st_questao`) VALUES
(1, 'Descreva como se executa a sequência diagonal "Tour de Piqué em Dehor"', '0', '2', 1, 1),
(2, 'Descreva como se executa a sequência diagonal "Chainés ou Déboullés"', '0', '2', 1, 1),
(3, 'Nomeie o passo "PETIT"', '1', '2', 1, 1),
(4, 'Quando o ballet surgiu?', '0', '2', 2, 1),
(5, 'Quem é conhecido como o criador do ballet?', '0', '2', 2, 1),
(6, 'Porque o ballet é tão famoso?', '0', '2', 2, 1),
(7, 'Quais são as modalidades do ballet que possuem maior destaque?', '0', '2', 2, 1),
(8, 'Para você, qual é a importância de sua formação?', '0', '2', 3, 1),
(9, 'E para toda a comunidade, existe uma importância "geral" para a formação de um profissional de dança? ', '0', '2', 3, 1),
(10, 'Para concluir, escreva sobre sua experiência na escola e sobre sua formação.', '0', '1', 3, 1);

--
-- Extraindo dados da tabela `tb_resposta`
--

INSERT INTO `tb_resposta` (`cd_resposta`, `tx_resposta`, `dt_resposta`, `vl_resposta`, `id_turma_matricula`, `id_questao`) VALUES
(1, 'Ele ocorre durante a dança e bla bla bla.', '2018-11-27', '-1', 7, 1),
(2, 'Cara, de algum jeito ai', '2018-11-27', '-1', 7, 2),
(3, 'A', '2018-11-27', '-1', 7, 3);

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
(8, 'Primeiro Ano Desenvolvimento Artístico ', '1DA', 5, 1);

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

--
-- Extraindo dados da tabela `tb_tarefa`
--

INSERT INTO `tb_tarefa` (`cd_tarefa`, `nm_tarefa`, `id_atividade`, `id_turma`, `id_criador`, `st_tarefa`, `dt_tarefa`, `dt_prazo`, `hr_prazo`) VALUES
(1, 'Atividade para Nota', 1, 1, 1, 1, '2018-11-25', '2018-11-27', '16:47'),
(2, 'Questionário sobre o ballet', 2, 1, 1, 1, '2018-11-26', '2018-12-04', '06:30'),
(3, 'Questionário sobre o ballet', 2, 4, 1, 1, '2018-11-26', '2018-11-30', '06:30'),
(4, 'Questionário sobre o ballet', 2, 5, 1, 1, '2018-11-26', '2018-11-30', '18:30'),
(5, 'Questionário sobre o ballet', 2, 7, 1, 1, '2018-11-26', '2018-11-29', '18:20'),
(6, 'Tarefa: Vídeo de Ballet', 4, 1, 1, 1, '2018-11-14', '2018-11-21', '18:30'),
(7, '', 4, 2, 1, 1, '2018-11-14', '2018-11-21', '18:29'),
(8, 'Questionário sobre a formação', 3, 1, 1, 1, '2018-11-22', '2018-11-29', '00:00'),
(9, 'Questionário sobre a formação', 3, 2, 1, 1, '2018-11-26', '2018-11-29', '00:00'),
(10, 'Questionário sobre a formação', 3, 3, 1, 1, '2018-11-26', '2018-11-30', '18:00');

--
-- Extraindo dados da tabela `tb_tarefa_materia`
--

INSERT INTO `tb_tarefa_materia` (`cd_tarefa_materia`, `id_tarefa`, `id_materia`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 3, 1),
(7, 4, 5),
(8, 4, 6),
(9, 5, 1),
(10, 6, 1),
(11, 6, 3),
(12, 8, 1),
(13, 9, 5),
(14, 9, 6),
(15, 10, 8),
(16, 10, 7);

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`cd_turma`, `dt_turma`, `id_sala`, `st_turma`) VALUES
(1, '2018-01-01', 1, 1),
(2, '2018-01-01', 2, 1),
(3, '2018-01-01', 3, 1),
(4, '2018-07-01', 4, 1),
(5, '2018-07-01', 5, 1),
(7, '2018-07-01', 6, 1);

--
-- Extraindo dados da tabela `tb_turma_matricula`
--

INSERT INTO `tb_turma_matricula` (`cd_turma_matricula`, `dt_turma_matricula`, `st_turma_matricula`, `id_matricula`, `id_turma`) VALUES
(1, '0000-00-00', 1, 1, 4),
(2, '0000-00-00', 1, 6, 4),
(3, '0000-00-00', 1, 16, 4),
(4, '0000-00-00', 1, 2, 7),
(5, '0000-00-00', 1, 7, 7),
(6, '0000-00-00', 1, 8, 7),
(7, '0000-00-00', 1, 3, 1),
(8, '0000-00-00', 1, 9, 1),
(9, '0000-00-00', 1, 10, 1),
(10, '0000-00-00', 1, 14, 2),
(11, '0000-00-00', 1, 15, 2),
(12, '0000-00-00', 1, 4, 2),
(13, '0000-00-00', 1, 11, 5),
(14, '0000-00-00', 1, 12, 5),
(15, '0000-00-00', 1, 14, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
