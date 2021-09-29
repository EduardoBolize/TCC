INSERT INTO `tb_comunicado` (`cd_comunicado`, `tx_titulo`, `ds_descricao`,`dt_criacao`, `dt_assunto`, `id_login`, `tp_comunicado`, `st_comunicado`) VALUES
(null, 'Reposição de Aula', 'No dia 15 de agosto haverá reposição de aula', '2018-09-09', '2018-10-09', 104, '1', 1),
(null, 'Não Haverá Aula', 'No dia 15 de agosto não haverá aula', '2018-09-22', '2018-10-22', 104, '1', 1),
(null, 'Novo Sistema de Ensino', 'Agora a escola possui um sistema exclusivo para realizar atividades!', '2018-12-03', '0000-00-00', 104, '1', 1);

INSERT INTO `tb_sala` (`cd_sala`, `nm_sala`, `sg_sala`, `id_curso`, `st_sala`) VALUES
(1, 'Primeiro Ano Formativo', '1F', 1, 1),
(2, 'Segundo Ano Formativo', '2F', 1, 1),
(3, 'Terceiro Ano Formativo', '3F', 1, 1),
(4, 'Quarto Ano Formativo', '4F', 1, 1),
(5, 'Quinto Ano Formativo', '5F', 1, 1),
(6, 'Sexto Ano Formativo', '6F', 1, 1),
(7, 'Sétimo Ano Formativo', '7F', 1, 1),
(8, 'Oitavo Ano Formativo', '8F', 1, 1),
(9, 'Nono Ano Formativo', '9F', 1, 1);


INSERT INTO tb_login VALUES
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
(161, 'fernanda', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');


INSERT INTO tb_matricula VALUES 
(null,'Maria do Ballet','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','123.898.234-72','2001-06-15',1,'maria@gmail.com',1, 150,'98.923.658-7','F'),
(null,'Ana Maria','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','234.898.234-72','2001-06-15',1,'anamaria@gmail.com',1, 151,'98.923.658-7','F'),
(null,'Alice da Silva','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','456.898.234-72','2001-06-15',1,'alice@gmail.com',1, 152,'98.923.658-7','F'),
(null,'Isamela Belim','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','567.898.234-72','2001-06-15',1,'isa@gmail.com',1, 153,'98.923.658-7','F'),
(null,'Joana Escura','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','789.898.234-72','2001-06-15',1,'joana@gmail.com',1, 154,'98.923.658-7','F'),
(null,'Talita Talamenes','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','908.898.234-72','2001-06-15',1,'talita@gmail.com',1, 155,'98.923.658-7','F'),
(null,'Mônica de Souza','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','777.898.234-72','2001-06-15',1,'monica@gmail.com',1, 156,'98.923.658-7','F'),
(null,'Alexandra Grandde','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','243.898.234-72','2001-06-15',1,'alexandra@gmail.com',1, 157,'98.923.658-7','F'),
(null,'Paola Mendes','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','153.898.234-72','2001-06-15',1,'paola@gmail.com',1, 158,'98.923.658-7','F'),
(null,'Francisca Chavier','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','634.898.234-72','2001-06-15',1,'francisca@gmail.com',1, 159,'98.923.658-7','F'),
(null,'Samanta Sonâmbula','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','674.898.234-72','2001-06-15',1,'samanta@gmail.com',1, 160,'98.923.658-7','F'),
(null,'Fernanda Borges','Rua das Beterrabas, nº 53','Itanhaém','(13) 3419-1691','(13) 8112-1733','345.898.234-72','2001-06-15',1,'fernanda@gmail.com',1, 161,'98.923.658-7','F');