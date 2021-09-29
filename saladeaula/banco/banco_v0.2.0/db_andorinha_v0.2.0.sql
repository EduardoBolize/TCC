create database db_andorinha DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use db_andorinha;

create table tb_login(
	cd_login int not null auto_increment,
    tx_login varchar(75) not null, 
    tx_pass varchar(200) not null,
    primary key(cd_login),
    constraint tx_login_unico unique(tx_login)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_arquivo(
	cd_arquivo int not null auto_increment,
    url_arquivo varchar(255) not null,
    id_login int not null,
    primary key(cd_arquivo),
    foreign key(id_login) references tb_login(cd_login),
    constraint url_arquivo_unico unique(url_arquivo)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_admin(
	cd_admin int not null auto_increment,
    nm_admin varchar(200) not null,
    id_login int not null,
    primary key(cd_admin),
    foreign key(id_login) references tb_login(cd_login)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_evento(
	cd_evento int not null auto_increment,
    nm_evento varchar(150) not null,
    dt_evento datetime not null,
    st_publico boolean not null,
    ds_evento varchar(500) not null,
    id_admin int not null,
    st_evento boolean not null default 1,
    primary key(cd_evento),
    constraint nm_evento_unico unique(nm_evento),
    foreign key(id_admin) references tb_admin(cd_admin)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_audicao(
	cd_audicao int not null auto_increment,
    nm_audicao varchar(150) not null,
    ds_audicao varchar(600) not null,
    dt_abertura date not null,
    dt_fechamento date not null,
    nr_vagas varchar(10) not null,
    id_admin int not null,
    st_audicao boolean not null default 1,
    primary key(cd_audicao),
    constraint nm_audicao_unico unique(nm_audicao),
    constraint dt_abertura_unico unique(dt_abertura),
    constraint dt_fechamento_unico unique(dt_fechamento),
    foreign key(id_admin) references tb_admin(cd_admin)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_inscrito(
	cd_inscrito int not null auto_increment,
    nm_inscrito varchar(200) not null,
    nr_cpf varchar(14) not null,
    ds_endereco varchar(250) not null,
    ds_cidade varchar(100) not null,
    nr_telefone1 varchar(25) not null,
    nr_telefone2 varchar(25),
    tx_email varchar(250) not null,
    st_email boolean not null,
    st_inscrito boolean not null default 1,
    dt_encontro date not null,
    hr_encontro varchar(5) not null,
    id_login int not null,
    id_audicao int not null,
    primary key(cd_inscrito),
    constraint nr_cpf_unico unique(nr_cpf),
    constraint tx_email_unico unique(tx_email),
    foreign key(id_login) references tb_login(cd_login),
    foreign key(id_audicao) references tb_audicao(cd_audicao)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_noticia(
	cd_noticia int not null auto_increment,
    tx_titulo varchar(150) not null,
    ds_noticia text not null,
    dt_noticia date not null,
    id_login int not null,
    st_noticia boolean not null default 1,
    primary key(cd_noticia),
    foreign key(id_login) references tb_login(cd_login)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_galeria(
	cd_galeria int not null auto_increment,
    nm_galeria varchar(100) not null,
    ds_galeria varchar(350) not null,
    dt_galeria date not null,
    id_admin int not null,
    st_galeria boolean not null default 1,
    primary key(cd_galeria),
    constraint nm_galeria_unico unique(nm_galeria),
    foreign key(id_admin) references tb_admin(cd_admin)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_midia(
	cd_midia int not null auto_increment,
    nm_midia varchar(120) not null,
    id_arquivo int not null,
    primary key(cd_midia),
    constraint nm_midia_unico unique(nm_midia),
    foreign key(id_arquivo) references tb_arquivo(cd_arquivo)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_midia_galeria(
	cd_midia_galeria int not null auto_increment,
    id_galeria int not null,
    id_midia int not null,
    primary key(cd_midia_galeria),
    foreign key(id_galeria) references tb_galeria(cd_galeria),
    foreign key(id_midia) references tb_midia(cd_midia)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_matricula(
	cd_matricula int not null auto_increment,
    nm_matricula varchar(200) not null,
    ds_endereco varchar(250) not null,
    ds_cidade varchar(100) not null,
    nr_telefone1 varchar(25) not null,
    nr_telefone2 varchar(25),
    nr_cpf varchar(14) not null,
	dt_matricula date not null,
    st_matricula boolean not null default 1,
    tx_email varchar(250) not null,
    st_email boolean not null,
    id_login int not null,
    nr_rg varchar(12) not null,
    nm_sexo varchar(1) not null,
    primary key(cd_matricula),
    constraint nr_cpf_unico unique(nr_cpf),
    constraint tx_email_unico unique(tx_email),
    foreign key(id_login) references tb_login(cd_login)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_matricula_evento(
	cd_matricula_evento int not null auto_increment,
    st_confirma boolean not null,
    id_matricula int not null,
    id_evento int not null,
    primary key(cd_matricula_evento),
    foreign key(id_matricula) references tb_matricula(cd_matricula),
    foreign key(id_evento) references tb_evento(cd_evento)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_pagamento(
	cd_pagamento int not null auto_increment,
    url_boleto varchar(300) not null,
    st_pagamento boolean not null default 1,
    dt_envio date not null,
    id_matricula int not null,
    primary key(cd_pagamento),
    foreign key(id_matricula) references tb_matricula(cd_matricula)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_professor(
	cd_professor int not null auto_increment,
    nm_professor varchar(200) not null,
    id_arquivo int not null,
    nr_cpf varchar(14) not null,
    nr_telefone1 varchar(25) not null,
    nr_telefone2 varchar(25),
    ds_endereco varchar(250) not null,
    ds_cidade varchar(100) not null,
    tx_email varchar(250) not null,
    st_email boolean not null default 0,
    st_professor boolean not null default 1,
    id_login int not null,
    primary key(cd_professor),
    constraint nr_cpf_unico unique(nr_cpf),
    constraint tx_email_unico unique(tx_email),
    foreign key(id_login) references tb_login(cd_login),
    foreign key(id_arquivo) references tb_arquivo(cd_arquivo)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_comunicado(
	cd_comunicado int not null auto_increment,
    tx_titulo varchar(150) not null,
    ds_descricao varchar(600) not null,
    dt_comunicado date not null,
    id_login int not null,
    tp_comunicado varchar(2) not null,
    st_comunicado boolean not null default 1,
    primary key(cd_comunicado),
    foreign key(id_login) references tb_login(cd_login)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_matricula_comunicado(
	cd_matricula_comunicado int not null auto_increment,
    id_matricula int not null,
    id_comunicado int not null,
    primary key(cd_matricula_comunicado),
    foreign key(id_matricula) references tb_matricula(cd_matricula),
    foreign key(id_comunicado) references tb_comunicado(cd_comunicado)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_curso(
	cd_curso int not null auto_increment,
    nm_curso varchar(150) not null,
    ds_curso varchar(600) not null,
    st_curso boolean not null default 1,
    primary key(cd_curso),
    constraint nm_curso_unico unique(nm_curso)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_sala(
	cd_sala int not null auto_increment,
    nm_sala varchar(50) not null,
    sg_sala varchar(10) not null,
    id_curso int not null,
    st_sala boolean not null default 1,
    primary key(cd_sala),
    constraint nm_sala_unico unique(nm_sala),
    constraint sg_sala_unico unique(sg_sala),
    foreign key(id_curso) references tb_curso(cd_curso)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_materia(
	cd_materia int not null auto_increment,
    nm_materia varchar(60) not null,
    st_materia boolean not null default 1,
    primary key(cd_materia),
    constraint nm_materia_unico unique(nm_materia)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_sala_materia(
	cd_sala_materia int not null auto_increment,
    id_sala int not null,
    id_materia int not null,
    st_sala_materia boolean not null default 1,
    primary key(cd_sala_materia),
	foreign key(id_materia) references tb_materia(cd_materia),
    foreign key(id_sala) references tb_sala(cd_sala)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_professor_sala_materia(
	cd_professor_sala_materia int not null auto_increment,
    id_sala_materia int not null,
    id_professor int not null,
    st_professor_sala_materia boolean not null default 1, 
    primary key(cd_professor_sala_materia), 
    foreign key(id_sala_materia) references tb_sala_materia(cd_sala_materia),
    foreign key(id_professor) references tb_professor(cd_professor)
);

create table tb_turma(
	cd_turma int not null auto_increment,
    dt_turma date not null,
    id_sala int not null,
    st_turma boolean not null default 1,
    primary key(cd_turma),
    foreign key(id_sala) references tb_sala(cd_sala)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_turma_comunicado(
	cd_turma_comunicado int not null auto_increment,
    id_turma int not null,
    id_comunicado int not null,
    primary key(cd_turma_comunicado),
    foreign key(id_turma) references tb_turma(cd_turma),
    foreign key(id_comunicado) references tb_comunicado(cd_comunicado)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_atividade(
	cd_atividade int not null auto_increment,
    nm_atividade varchar(100) not null,
    ds_atividade varchar(600) not null,
    st_atividade boolean not null default 1,
    primary key(cd_atividade)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_atividade_materia(
	cd_atividade_materia int not null auto_increment,
    id_atividade int not null,
    id_materia int not null,
    primary key(cd_atividade_materia),
    foreign key (id_atividade) references tb_atividade(cd_atividade),
    foreign key (id_materia) references tb_materia(cd_materia)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_tarefa(
	cd_tarefa int not null auto_increment,
    id_atividade int not null,
    id_turma int not null,
    st_tarefa boolean not null default 1,
    dt_tarefa date not null,
    dt_prazo date not null,
    hr_prazo varchar(5) not null,
    primary key(cd_tarefa),
    foreign key(id_atividade) references tb_atividade(cd_atividade),
    foreign key(id_turma) references tb_turma(cd_turma)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_questao(
	cd_questao int not null auto_increment,
    tx_enunciado varchar(400) not null,
    tp_questao varchar(1) not null,
    vl_pontos varchar(5),
    id_atividade int not null,
    st_questao boolean not null default 1,
    primary key(cd_questao),
    foreign key(id_atividade) references tb_atividade(cd_atividade)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_alternativa(
	cd_alternativa int not null auto_increment,
    sg_alternativa varchar(1) not null,
    tx_alternativa varchar(400) not null,
    id_questao int not null,
    st_correta boolean not null default 0,
    tx_feedback varchar(600),
    primary key(cd_alternativa),
    foreign key(id_questao) references tb_questao(cd_questao)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_arquivo_questao(
	cd_arquivo_questao int not null auto_increment,
    id_questao int not null,
    id_arquivo int not null,
    primary key(cd_arquivo_questao),
    foreign key(id_questao) references tb_questao(cd_questao),
    foreign key(id_arquivo) references tb_arquivo(cd_arquivo)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_turma_matricula(
	cd_turma_matricula int not null auto_increment,
    dt_turma_matricula date not null,
    id_matricula int not null,
    id_turma int not null,
    primary key(cd_turma_matricula),
    foreign key(id_matricula) references tb_matricula(cd_matricula),
    foreign key(id_turma) references tb_turma(cd_turma)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_resposta(
	cd_resposta int not null auto_increment,
    tx_resposta varchar(800) not null,
    dt_resposta date not null,
    id_turma_matricula int not null,
    id_questao int not null,
    primary key(cd_resposta),
    foreign key(id_turma_matricula) references tb_turma_matricula(cd_turma_matricula),
    foreign key(id_questao) references tb_questao(cd_questao)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_feedback(
	cd_feedback int not null auto_increment,
    tx_feedback varchar(800) not null,
    id_resposta int not null,
    id_professor int not null,
    primary key(cd_feedback),
    foreign key(id_resposta) references tb_resposta(cd_resposta),
    foreign key(id_professor) references tb_professor(cd_professor)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_arquivo_resposta(
	cd_arquivo_resposta int not null auto_increment,
    id_arquivo int not null,
    id_resposta int not null,
    primary key(cd_arquivo_resposta),
    foreign key(id_arquivo) references tb_arquivo(cd_arquivo),
    foreign key(id_resposta) references tb_resposta(cd_resposta)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_mencao(	
	cd_mencao int not null auto_increment,
    id_tarefa int not null,
    id_turma_matricula int not null,
    tx_nota varchar(4) not null,
    primary key(cd_mencao),
    foreign key(id_tarefa) references tb_tarefa(cd_tarefa),
    foreign key(id_turma_matricula) references tb_turma_matricula(cd_turma_matricula)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tb_sac(
    cd_sac int not null auto_increment,
    nm_sac varchar(200) not null,
    ds_sac varchar(600) not null,
    tx_email varchar(250) not null,
    primary key(cd_sac)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into tb_login values (null,'admin','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');
insert into tb_admin values (null,'Administrador',1);

insert into tb_curso values
	(null,'Ballet Clássico Formativo','Curso voltado a formação profissionalização dos bailarinos','1'),
	(null,'Ballet Clássico Não Formativo','Curso voltado a prática do Ballet sem objetivo inicial de formação, visando a melhora da qualidade de vida','1'),
	(null,'Modalidades Livres','Explora diferentes possibilidades de movimento, estilos de dança e rítmos musicais','1'),
	(null,'Zumba Dance','Dança voltada à queima de calorias em massa, ideal para todas as idades!','1'),
	(null,'Desenvolvimento Artístico','Formação dos alunos em vários campos da arte, como a dança, a música e o teatro','1'),
	(null,'Street Dance','Dança que aborda estilos como o Rap, o Hip-Hop entre outros','1');

insert into tb_login values
(100, 'giulia', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(101, 'nath','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(102, 'junior','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(103, 'fernando','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(104, 'michelle', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(105, 'joelma', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

insert into tb_professor values
(null, 'Giulia Souza', '123.456.789-01', '(13) 8186-1521', '(13) 8112-1731', 'Rua das Amoreiras 1345', 'Peruíbe', 'giulia@andorinha.com', '1', '1', 100),
(null, 'Nathalie Castro', '123.456.789-02', '(13) 8186-1522', '(13) 8112-1732', 'Rua das Amoreiras 1345', 'Peruíbe', 'nath@andorinha.com', '1', '1', 101),
(null, 'Junior Castro', '123.456.789-03', '(13) 8186-1523', '(13) 8112-1733', 'Rua das Amoreiras 1345', 'Peruíbe', 'junior@andorinha.com', '1', '1', 102),
(null, 'Fernando Augusto', '123.456.789-04', '(13) 8186-1524', '(13) 8112-1734', 'Rua das Amoreiras 1345', 'Peruíbe', 'fernando@andorinha.com', '1', '1', 103),
(null, 'Michelle Barbosa', '123.456.789-05', '(13) 8186-1525', '(13) 8112-1735', 'Rua das Amoreiras 1345', 'Peruíbe', 'michelle@etec.com', '1', '1', 104),
(null, 'Joelma Sartori', '123.456.789-06', '(13) 8186-1526', '(13) 8112-1736', 'Rua das Amoreiras 1345', 'Peruíbe', 'joelma@etec.com', '1', '1', 105);