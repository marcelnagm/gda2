
-----------------------------------------------------------------------------
-- tbaluno
-----------------------------------------------------------------------------

DROP TABLE "tbaluno" CASCADE;

DROP SEQUENCE "tbpessoa_id_pessoa_seq";

CREATE SEQUENCE "tbpessoa_id_pessoa_seq";


CREATE TABLE "tbaluno"
(
	"id_pessoa" INTEGER  NOT NULL,
	"matricula" INTEGER  NOT NULL,
	"nome" VARCHAR(100)  NOT NULL,
	"celular" VARCHAR(15),
	"email" VARCHAR(100),
	"fone_residencial" VARCHAR(15),
	"foto" BYTEA,
	"id_neces_especial" VARCHAR(255)  NOT NULL,
	"dt_nascimento" DATE  NOT NULL,
	"naturalidade" INTEGER  NOT NULL,
	"uf_nascimento" CHAR(2)  NOT NULL,
	"nacionalidade" INTEGER  NOT NULL,
	"sexo" CHAR(1)  NOT NULL,
	"estado_civil" VARCHAR(15),
	"titulo" VARCHAR(20),
	"titulo_zona" INTEGER,
	"titulo_secao" INTEGER,
	"rg" VARCHAR(20)  NOT NULL,
	"rg_dt_exped" DATE,
	"rg_org_exped" VARCHAR(10),
	"cpf" VARCHAR(11)  NOT NULL,
	"reservista" VARCHAR(20),
	"pai" VARCHAR(50),
	"mae" VARCHAR(50),
	"cep" VARCHAR(9)  NOT NULL,
	"numero" VARCHAR(8)  NOT NULL,
	"complemento" VARCHAR(50),
	"id_versao_curso" INTEGER  NOT NULL,
	"id_tipo_ingresso" INTEGER  NOT NULL,
	"dt_ingresso" DATE  NOT NULL,
	"id_situacao" INTEGER  NOT NULL,
	"dt_situacao" DATE,
	"id_destino" INTEGER,
	"id_2grau" INTEGER,
	"ano_concl_2grau" INTEGER,
	"id_3grau" INTEGER,
	"ano_concl_3grau" INTEGER,
	"id_trabalho" INTEGER,
	"cep_trabalho" VARCHAR(8),
	"fone_trabalho" VARCHAR(15),
	"ramal_trabalho" VARCHAR(5),
	"media_geral" NUMERIC(10,2),
	"ch_eletiva_cursada" INTEGER,
	"ch_eletiva_solicitada" INTEGER,
	"ch_obrig_cursada" INTEGER,
	"ch_obrig_solicitada" INTEGER,
	"ch_total" VARCHAR(255),
	"id_antigo" INTEGER,
	PRIMARY KEY ("matricula")
);

COMMENT ON TABLE "tbaluno" IS '';


SET search_path TO public;
CREATE INDEX "aluno_idx" ON "tbaluno" ("matricula","nome");

-----------------------------------------------------------------------------
-- tbaluno_atual
-----------------------------------------------------------------------------

DROP TABLE "tbaluno_atual" CASCADE;


CREATE TABLE "tbaluno_atual"
(
	"nome" VARCHAR(100),
	"matricula" INTEGER  NOT NULL,
	"dt_nascimento" DATE  NOT NULL,
	"naturalidade" VARCHAR(40)  NOT NULL,
	"uf_nascimento" CHAR(2)  NOT NULL,
	"nacionalidade" VARCHAR(15)  NOT NULL,
	"sexo" CHAR(1)  NOT NULL,
	"estado_civil" VARCHAR(15)  NOT NULL,
	"pai" VARCHAR(50),
	"mae" VARCHAR(50),
	"celular" VARCHAR(15),
	"fone_residencial" VARCHAR(15),
	"email1" VARCHAR(60),
	"email2" VARCHAR(60),
	"end_residencial" VARCHAR(60)  NOT NULL,
	"bairro_residencial" VARCHAR(40)  NOT NULL,
	"cep_residencial" VARCHAR(8)  NOT NULL,
	"numero" VARCHAR(8)  NOT NULL,
	"complemento" VARCHAR(50),
	"grau_2" VARCHAR(100)  NOT NULL,
	"uf_conc_2" CHAR(2)  NOT NULL,
	"ano_concl_2grau" CHAR(4)  NOT NULL,
	"local_trabalho" VARCHAR(100),
	"end_trabalho" VARCHAR(60),
	"bairro_trabalho" VARCHAR(40),
	"cep_trabalho" VARCHAR(8),
	"fone_trabalho" VARCHAR(15),
	"ramal_trabalho" VARCHAR(5),
	PRIMARY KEY ("matricula")
);

COMMENT ON TABLE "tbaluno_atual" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbalunodiploma
-----------------------------------------------------------------------------

DROP TABLE "tbalunodiploma" CASCADE;


CREATE TABLE "tbalunodiploma"
(
	"id_aluno_diploma" serial  NOT NULL,
	"matricula" INTEGER,
	"dt_entrega" DATE,
	"dt_entrega_historico" DATE,
	"dt_enade" DATE,
	"n_registro" INTEGER,
	"dt_registro" DATE,
	"livro" VARCHAR(8),
	"folha" INTEGER,
	"n_processo" VARCHAR(20),
	"obs" TEXT,
	PRIMARY KEY ("id_aluno_diploma"),
	CONSTRAINT "tbalunodiploma_matricula_key" UNIQUE ("matricula"),
	CONSTRAINT "tbalunodiploma_matricula_key1" UNIQUE ("matricula"),
	CONSTRAINT "tbalunodiploma_matricula_key2" UNIQUE ("matricula"),
	CONSTRAINT "tbalunodiploma_matricula_key3" UNIQUE ("matricula","n_registro","livro")
);

COMMENT ON TABLE "tbalunodiploma" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbaluno_import
-----------------------------------------------------------------------------

DROP TABLE "tbaluno_import" CASCADE;


CREATE TABLE "tbaluno_import"
(
	"id_pessoa" serial  NOT NULL,
	"nome" VARCHAR(100),
	"celular" VARCHAR(255),
	"email" VARCHAR(100),
	"fone_residencial" VARCHAR(20),
	"foto" BYTEA,
	"id_neces_especial" VARCHAR(255),
	"matricula" INTEGER,
	"dt_nascimento" DATE,
	"naturalidade" VARCHAR(255),
	"uf_nascimento" VARCHAR(255),
	"nacionalidade" VARCHAR(255),
	"sexo" CHAR(1),
	"estado_civil" VARCHAR(15),
	"titulo" VARCHAR(20),
	"titulo_zona" INTEGER,
	"titulo_secao" INTEGER,
	"rg" VARCHAR(20),
	"rg_dt_exped" DATE,
	"rg_org_exped" VARCHAR(10),
	"cpf" VARCHAR(11),
	"reservista" VARCHAR(20),
	"pai" VARCHAR(50),
	"mae" VARCHAR(50),
	"cep" VARCHAR(9),
	"numero" VARCHAR(8),
	"complemento" VARCHAR(255),
	"id_versao_curso" INTEGER,
	"id_tipo_ingresso" INTEGER,
	"dt_ingresso" DATE,
	"id_situacao" INTEGER,
	"dt_situacao" DATE,
	"id_destino" INTEGER,
	"id_2grau" INTEGER,
	"ano_concl_2grau" INTEGER,
	"id_3grau" INTEGER,
	"ano_concl_3grau" INTEGER,
	"id_trabalho" INTEGER,
	"cep_trabalho" VARCHAR(8),
	"fone_trabalho" VARCHAR(255),
	"ramal_trabalho" VARCHAR(20),
	"media_geral" NUMERIC(10,2),
	"ch_eletiva_cursada" INTEGER,
	"ch_eletiva_solicitada" INTEGER,
	"ch_obrig_cursada" INTEGER,
	"ch_obrig_solicitada" INTEGER,
	"ch_total" VARCHAR(255),
	"id_antigo" INTEGER,
	"inst2grau" VARCHAR(255),
	"inst3grau" VARCHAR(255),
	"insttrabalho" VARCHAR(255),
	"id_naturalidade" INTEGER,
	"id_nacionalidade" INTEGER,
	"id" serial  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tbaluno_import" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbalunoperiodo
-----------------------------------------------------------------------------

DROP TABLE "tbalunoperiodo" CASCADE;


CREATE TABLE "tbalunoperiodo"
(
	"id_aluno_periodo" serial  NOT NULL,
	"matricula" INTEGER,
	"id_periodo" VARCHAR(255),
	PRIMARY KEY ("id_aluno_periodo")
);

COMMENT ON TABLE "tbalunoperiodo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbalunosenha
-----------------------------------------------------------------------------

DROP TABLE "tbalunosenha" CASCADE;


CREATE TABLE "tbalunosenha"
(
	"id" serial  NOT NULL,
	"matricula" INTEGER,
	"senha" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id"),
	CONSTRAINT "tbalunosenha_matricula_key" UNIQUE ("matricula")
);

COMMENT ON TABLE "tbalunosenha" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbalunosituacao
-----------------------------------------------------------------------------

DROP TABLE "tbalunosituacao" CASCADE;


CREATE TABLE "tbalunosituacao"
(
	"id_situacao" serial  NOT NULL,
	"descricao" VARCHAR(30),
	PRIMARY KEY ("id_situacao")
);

COMMENT ON TABLE "tbalunosituacao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbaviso
-----------------------------------------------------------------------------

DROP TABLE "tbaviso" CASCADE;


CREATE TABLE "tbaviso"
(
	"id_aviso" serial  NOT NULL,
	"titulo" VARCHAR(50)  NOT NULL,
	"texto" TEXT,
	"publicado" BOOLEAN,
	"local" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id_aviso")
);

COMMENT ON TABLE "tbaviso" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbaviso_local
-----------------------------------------------------------------------------

DROP TABLE "tbaviso_local" CASCADE;


CREATE TABLE "tbaviso_local"
(
	"id_local" serial  NOT NULL,
	"nome" VARCHAR(255),
	"descricao" VARCHAR(255),
	PRIMARY KEY ("id_local"),
	CONSTRAINT "tbaviso_local_nome_key" UNIQUE ("nome")
);

COMMENT ON TABLE "tbaviso_local" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbbairro
-----------------------------------------------------------------------------

DROP TABLE "tbbairro" CASCADE;


CREATE TABLE "tbbairro"
(
	"id_bairro" serial  NOT NULL,
	"descricao" VARCHAR(50),
	PRIMARY KEY ("id_bairro")
);

COMMENT ON TABLE "tbbairro" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbbanca
-----------------------------------------------------------------------------

DROP TABLE "tbbanca" CASCADE;


CREATE TABLE "tbbanca"
(
	"banca_id" serial  NOT NULL,
	"matricula" INTEGER  NOT NULL,
	"nomeorientador" VARCHAR(100)  NOT NULL,
	"primeiromembro" VARCHAR(100)  NOT NULL,
	"segundomembro" VARCHAR(100)  NOT NULL,
	"terceiromembro" VARCHAR(100),
	"quartomembro" VARCHAR(100),
	"datadefesa" DATE  NOT NULL,
	"resultado" VARCHAR(20)  NOT NULL,
	"mediabanca" NUMERIC(10,2),
	"titulomonografia" TEXT  NOT NULL,
	PRIMARY KEY ("banca_id"),
	CONSTRAINT "tbbanca_matricula_key" UNIQUE ("matricula")
);

COMMENT ON TABLE "tbbanca" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcampus
-----------------------------------------------------------------------------

DROP TABLE "tbcampus" CASCADE;


CREATE TABLE "tbcampus"
(
	"id_campus" serial  NOT NULL,
	"descricao" VARCHAR(25),
	"id_cidade" VARCHAR(255),
	PRIMARY KEY ("id_campus")
);

COMMENT ON TABLE "tbcampus" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcarater
-----------------------------------------------------------------------------

DROP TABLE "tbcarater" CASCADE;


CREATE TABLE "tbcarater"
(
	"id_carater" serial  NOT NULL,
	"descricao" VARCHAR(12),
	"sucinto" VARCHAR(10),
	PRIMARY KEY ("id_carater")
);

COMMENT ON TABLE "tbcarater" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcidade
-----------------------------------------------------------------------------

DROP TABLE "tbcidade" CASCADE;


CREATE TABLE "tbcidade"
(
	"id_cidade" serial  NOT NULL,
	"descricao" VARCHAR(30),
	"id_estado" INTEGER  NOT NULL,
	"id_pais" INTEGER  NOT NULL,
	PRIMARY KEY ("id_cidade")
);

COMMENT ON TABLE "tbcidade" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbconceito
-----------------------------------------------------------------------------

DROP TABLE "tbconceito" CASCADE;


CREATE TABLE "tbconceito"
(
	"id_conceito" serial  NOT NULL,
	"descricao" VARCHAR(25),
	"sucinto" VARCHAR(3),
	PRIMARY KEY ("id_conceito")
);

COMMENT ON TABLE "tbconceito" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcurriculodisciplinas
-----------------------------------------------------------------------------

DROP TABLE "tbcurriculodisciplinas" CASCADE;


CREATE TABLE "tbcurriculodisciplinas"
(
	"id_curriculo_disciplina" serial  NOT NULL,
	"id_versao_curso" INTEGER,
	"id_setor" INTEGER,
	"cod_disciplina" VARCHAR(8),
	"semestre_disciplina" INTEGER,
	"id_carater" VARCHAR(255),
	PRIMARY KEY ("id_curriculo_disciplina")
);

COMMENT ON TABLE "tbcurriculodisciplinas" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbgradeequivalente
-----------------------------------------------------------------------------

DROP TABLE "tbgradeequivalente" CASCADE;


CREATE TABLE "tbgradeequivalente"
(
	"id_curriculo_disciplina" INTEGER  NOT NULL,
	"cod_disciplina" VARCHAR(10)  NOT NULL,
	PRIMARY KEY ("id_curriculo_disciplina","cod_disciplina"),
	CONSTRAINT "unic_equivalente" UNIQUE ("cod_disciplina","id_curriculo_disciplina")
);

COMMENT ON TABLE "tbgradeequivalente" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcurso
-----------------------------------------------------------------------------

DROP TABLE "tbcurso" CASCADE;


CREATE TABLE "tbcurso"
(
	"cod_curso" INTEGER  NOT NULL,
	"descricao" VARCHAR(70),
	"sucinto" VARCHAR(25),
	"centro" VARCHAR(15),
	PRIMARY KEY ("cod_curso")
);

COMMENT ON TABLE "tbcurso" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbcursoversao
-----------------------------------------------------------------------------

DROP TABLE "tbcursoversao" CASCADE;


CREATE TABLE "tbcursoversao"
(
	"id_versao_curso" serial  NOT NULL,
	"id_formacao" INTEGER,
	"cod_curso" INTEGER  NOT NULL,
	"id_turno" INTEGER  NOT NULL,
	"descricao" VARCHAR(100),
	"situacao" VARCHAR(10),
	"doc_criacao" TEXT,
	"dt_criacao" DATE,
	"dt_inicio" DATE  NOT NULL,
	"dt_termino" DATE,
	"id_campus" INTEGER,
	"id_setor" INTEGER,
	"prazo_min" CHAR(3),
	"prazo_max" CHAR(3),
	"cred_obr" VARCHAR(255),
	"cred_eletivo" VARCHAR(255),
	"cred_total" VARCHAR(255),
	"ch_obr" INTEGER,
	"ch_eletiva" INTEGER,
	"ch_total" VARCHAR(255),
	PRIMARY KEY ("id_versao_curso")
);

COMMENT ON TABLE "tbcursoversao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbdisciplina
-----------------------------------------------------------------------------

DROP TABLE "tbdisciplina" CASCADE;


CREATE TABLE "tbdisciplina"
(
	"cod_disciplina" VARCHAR(8)  NOT NULL,
	"descricao" VARCHAR(100)  NOT NULL,
	"sucinto" VARCHAR(40)  NOT NULL,
	"inicio" DATE,
	"termino" DATE,
	"ch" INTEGER  NOT NULL,
	"ch_teorica" INTEGER  NOT NULL,
	"ch_pratica" INTEGER  NOT NULL,
	"cred_pratico" VARCHAR(255)  NOT NULL,
	"cred_teorico" VARCHAR(255)  NOT NULL,
	"id_situacao" INTEGER default 1 NOT NULL,
	PRIMARY KEY ("cod_disciplina"),
	CONSTRAINT "tbdisciplina_cod_disciplina_key" UNIQUE ("cod_disciplina")
);

COMMENT ON TABLE "tbdisciplina" IS '';


SET search_path TO public;
CREATE INDEX "tbdisciplina_cod_disciplina_idx" ON "tbdisciplina" ("cod_disciplina");

-----------------------------------------------------------------------------
-- tbdisciplinarequisitos
-----------------------------------------------------------------------------

DROP TABLE "tbdisciplinarequisitos" CASCADE;


CREATE TABLE "tbdisciplinarequisitos"
(
	"id_requisito" serial  NOT NULL,
	"cod_disciplina" VARCHAR(8)  NOT NULL,
	"id_versao_curso" INTEGER  NOT NULL,
	"cod_disc_requisito" VARCHAR(8),
	PRIMARY KEY ("id_requisito"),
	CONSTRAINT "unic_disciplinas" UNIQUE ("cod_disciplina","id_versao_curso","cod_disc_requisito")
);

COMMENT ON TABLE "tbdisciplinarequisitos" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbdisciplinasituacao
-----------------------------------------------------------------------------

DROP TABLE "tbdisciplinasituacao" CASCADE;


CREATE TABLE "tbdisciplinasituacao"
(
	"id_situacao" serial  NOT NULL,
	"descricao" VARCHAR(30),
	PRIMARY KEY ("id_situacao")
);

COMMENT ON TABLE "tbdisciplinasituacao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbestado
-----------------------------------------------------------------------------

DROP TABLE "tbestado" CASCADE;


CREATE TABLE "tbestado"
(
	"id_estado" serial  NOT NULL,
	"uf" CHAR(2)  NOT NULL,
	"descricao" VARCHAR(25),
	"id_pais" INTEGER  NOT NULL,
	PRIMARY KEY ("id_estado"),
	CONSTRAINT "tbestado_uf_key" UNIQUE ("uf"),
	CONSTRAINT "tbestado_uf_key1" UNIQUE ("uf")
);

COMMENT ON TABLE "tbestado" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbfila
-----------------------------------------------------------------------------

DROP TABLE "tbfila" CASCADE;


CREATE TABLE "tbfila"
(
	"id_fila" serial  NOT NULL,
	"matricula" INTEGER  NOT NULL,
	"id_oferta" INTEGER  NOT NULL,
	"id_situacao" INTEGER  NOT NULL,
	"pontos" VARCHAR(255),
	"reprovacoes" INTEGER,
	"formando" INTEGER,
	PRIMARY KEY ("id_fila")
);

COMMENT ON TABLE "tbfila" IS '';


SET search_path TO public;
CREATE INDEX "tbfila_id_oferta_idx" ON "tbfila" ("id_oferta");

CREATE INDEX "tbfila_matricula_idx" ON "tbfila" ("matricula");

-----------------------------------------------------------------------------
-- tbfila_bkp
-----------------------------------------------------------------------------

DROP TABLE "tbfila_bkp" CASCADE;


CREATE TABLE "tbfila_bkp"
(
	"id_fila" serial  NOT NULL,
	"matricula" INTEGER  NOT NULL,
	"id_oferta" INTEGER  NOT NULL,
	"hora_insert" TIMESTAMP(-4),
	"hora_delete" TIMESTAMP(-4),
	"id_situacao" INTEGER  NOT NULL,
	"id" serial  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tbfila_bkp" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbfilasituacao
-----------------------------------------------------------------------------

DROP TABLE "tbfilasituacao" CASCADE;


CREATE TABLE "tbfilasituacao"
(
	"id_situacao" serial  NOT NULL,
	"descricao" VARCHAR(25),
	"sucinto" VARCHAR(10),
	PRIMARY KEY ("id_situacao")
);

COMMENT ON TABLE "tbfilasituacao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbformacao
-----------------------------------------------------------------------------

DROP TABLE "tbformacao" CASCADE;


CREATE TABLE "tbformacao"
(
	"id_formacao" serial  NOT NULL,
	"descricao" VARCHAR(30),
	"abreviatura" VARCHAR(10),
	PRIMARY KEY ("id_formacao")
);

COMMENT ON TABLE "tbformacao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbhistorico
-----------------------------------------------------------------------------

DROP TABLE "tbhistorico" CASCADE;


CREATE TABLE "tbhistorico"
(
	"id_historico" serial  NOT NULL,
	"id_periodo" INTEGER  NOT NULL,
	"matricula" INTEGER  NOT NULL,
	"cod_disciplina" VARCHAR(8)  NOT NULL,
	"media" NUMERIC(10,2)  NOT NULL,
	"faltas" INTEGER  NOT NULL,
	"id_conceito" INTEGER  NOT NULL,
	"duplicado" BOOLEAN,
	PRIMARY KEY ("id_historico"),
	CONSTRAINT "tbhistorico_uniq" UNIQUE ("id_periodo","matricula","cod_disciplina")
);

COMMENT ON TABLE "tbhistorico" IS '';


SET search_path TO public;
CREATE INDEX "tbhistorico_idx" ON "tbhistorico" ("matricula");

-----------------------------------------------------------------------------
-- tbinstexterna
-----------------------------------------------------------------------------

DROP TABLE "tbinstexterna" CASCADE;


CREATE TABLE "tbinstexterna"
(
	"id_inst_externa" serial  NOT NULL,
	"descricao" VARCHAR(100),
	"sucinto" VARCHAR(40),
	"uf" CHAR(2),
	PRIMARY KEY ("id_inst_externa")
);

COMMENT ON TABLE "tbinstexterna" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tblogradouro
-----------------------------------------------------------------------------

DROP TABLE "tblogradouro" CASCADE;


CREATE TABLE "tblogradouro"
(
	"id_logradouro" serial  NOT NULL,
	"descricao" VARCHAR(100),
	"cep" CHAR(8)  NOT NULL,
	"id_bairro" INTEGER  NOT NULL,
	"id_cidade" INTEGER  NOT NULL,
	PRIMARY KEY ("id_logradouro"),
	CONSTRAINT "tblogradouro_cep_key" UNIQUE ("cep")
);

COMMENT ON TABLE "tblogradouro" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbnecesespecial
-----------------------------------------------------------------------------

DROP TABLE "tbnecesespecial" CASCADE;


CREATE TABLE "tbnecesespecial"
(
	"id_neces_especial" serial  NOT NULL,
	"descricao" VARCHAR(50),
	PRIMARY KEY ("id_neces_especial")
);

COMMENT ON TABLE "tbnecesespecial" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tboferta
-----------------------------------------------------------------------------

DROP TABLE "tboferta" CASCADE;


CREATE TABLE "tboferta"
(
	"id_oferta" serial  NOT NULL,
	"id_periodo" INTEGER  NOT NULL,
	"id_turno" INTEGER  NOT NULL,
	"cod_curso" INTEGER  NOT NULL,
	"cod_disciplina" VARCHAR(8)  NOT NULL,
	"turma" CHAR(2)  NOT NULL,
	"id_sala" INTEGER  NOT NULL,
	"vagas" INTEGER  NOT NULL,
	"matriculados" INTEGER,
	"excesso" INTEGER,
	"cancelados" INTEGER,
	"trancados" INTEGER,
	"id_matricula_prof" INTEGER  NOT NULL,
	"id_setor" INTEGER  NOT NULL,
	"dt_inicio" DATE,
	"dt_fim" DATE,
	PRIMARY KEY ("id_oferta"),
	CONSTRAINT "tboferta_id_periodo_key" UNIQUE ("id_periodo","cod_disciplina","turma")
);

COMMENT ON TABLE "tboferta" IS '';


SET search_path TO public;
CREATE INDEX "tboferta_cod_disciplina_idx" ON "tboferta" ("cod_disciplina");

CREATE INDEX "tboferta_id_periodo_idx" ON "tboferta" ("id_periodo");

CREATE INDEX "turma_idx" ON "tboferta" ("turma");

-----------------------------------------------------------------------------
-- tbofertahorario
-----------------------------------------------------------------------------

DROP TABLE "tbofertahorario" CASCADE;


CREATE TABLE "tbofertahorario"
(
	"dia" INTEGER  NOT NULL,
	"hora_inicio" TIME  NOT NULL,
	"hora_fim" TIME  NOT NULL,
	"id_oferta" INTEGER  NOT NULL,
	"id_horario" serial  NOT NULL,
	PRIMARY KEY ("id_horario")
);

COMMENT ON TABLE "tbofertahorario" IS '';


SET search_path TO public;
CREATE INDEX "dia_hora_inicio_idx" ON "tbofertahorario" ("dia","hora_inicio");

CREATE INDEX "tbofertahorario_idx" ON "tbofertahorario" ("dia","hora_inicio","hora_fim");

-----------------------------------------------------------------------------
-- tbpais
-----------------------------------------------------------------------------

DROP TABLE "tbpais" CASCADE;


CREATE TABLE "tbpais"
(
	"id_pais" serial  NOT NULL,
	"descricao" VARCHAR(25)  NOT NULL,
	"sucinto" VARCHAR(5)  NOT NULL,
	"nacionalidade" VARCHAR(25)  NOT NULL,
	PRIMARY KEY ("id_pais")
);

COMMENT ON TABLE "tbpais" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbperiodo
-----------------------------------------------------------------------------

DROP TABLE "tbperiodo" CASCADE;


CREATE TABLE "tbperiodo"
(
	"id_periodo" serial  NOT NULL,
	"descricao" VARCHAR(50),
	"ano" INTEGER  NOT NULL,
	"semestre" INTEGER  NOT NULL,
	"periodo" INTEGER  NOT NULL,
	"dt_inicio" DATE,
	"dt_fim" DATE,
	"sucinto" VARCHAR(50),
	PRIMARY KEY ("id_periodo")
);

COMMENT ON TABLE "tbperiodo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbpessoa
-----------------------------------------------------------------------------

DROP TABLE "tbpessoa" CASCADE;


CREATE TABLE "tbpessoa"
(
	"id_pessoa" serial  NOT NULL,
	"nome" VARCHAR(100),
	"celular" VARCHAR(15),
	"email" VARCHAR(100),
	"fone_residencial" VARCHAR(15),
	"foto" BYTEA,
	"id_neces_especial" VARCHAR(255),
	PRIMARY KEY ("id_pessoa")
);

COMMENT ON TABLE "tbpessoa" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbprofessor
-----------------------------------------------------------------------------

DROP TABLE "tbprofessor" CASCADE;

DROP SEQUENCE "tbpessoa_id_pessoa_seq";

CREATE SEQUENCE "tbpessoa_id_pessoa_seq";


CREATE TABLE "tbprofessor"
(
	"id_pessoa" INTEGER  NOT NULL,
	"matricula_prof" INTEGER  NOT NULL,
	"siape" VARCHAR(255),
	"nome" VARCHAR(100),
	"celular" VARCHAR(15),
	"fone_residencial" VARCHAR(15),
	"email" VARCHAR(100),
	"foto" BYTEA,
	"id_neces_especial" VARCHAR(255),
	"cod_curso" INTEGER,
	"id_tipo_vinculo" INTEGER,
	"id_formacao" INTEGER,
	"id_prof_sit" INTEGER,
	"id_setor" VARCHAR(255),
	PRIMARY KEY ("matricula_prof")
);

COMMENT ON TABLE "tbprofessor" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbprofessorsenha
-----------------------------------------------------------------------------

DROP TABLE "tbprofessorsenha" CASCADE;


CREATE TABLE "tbprofessorsenha"
(
	"id" serial  NOT NULL,
	"matricula_prof" INTEGER  NOT NULL,
	"senha" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id"),
	CONSTRAINT "tbprofessorsenha_matricula_prof_" UNIQUE ("matricula_prof")
);

COMMENT ON TABLE "tbprofessorsenha" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbprofessorsituacao
-----------------------------------------------------------------------------

DROP TABLE "tbprofessorsituacao" CASCADE;


CREATE TABLE "tbprofessorsituacao"
(
	"id_situacao" serial  NOT NULL,
	"descricao" VARCHAR(20),
	PRIMARY KEY ("id_situacao")
);

COMMENT ON TABLE "tbprofessorsituacao" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbproftipovinculo
-----------------------------------------------------------------------------

DROP TABLE "tbproftipovinculo" CASCADE;


CREATE TABLE "tbproftipovinculo"
(
	"id_tipo_vinculo" serial  NOT NULL,
	"descricao" VARCHAR(20),
	PRIMARY KEY ("id_tipo_vinculo")
);

COMMENT ON TABLE "tbproftipovinculo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbsala
-----------------------------------------------------------------------------

DROP TABLE "tbsala" CASCADE;


CREATE TABLE "tbsala"
(
	"id_sala" serial  NOT NULL,
	"bloco" VARCHAR(5),
	"capacidade" INTEGER,
	"descricao" VARCHAR(20),
	"id_campus" INTEGER,
	"numero" VARCHAR(255),
	PRIMARY KEY ("id_sala")
);

COMMENT ON TABLE "tbsala" IS '';


SET search_path TO public;
CREATE INDEX "sala_ndx" ON "tbsala" ("bloco","numero");

-----------------------------------------------------------------------------
-- tbsetor
-----------------------------------------------------------------------------

DROP TABLE "tbsetor" CASCADE;


CREATE TABLE "tbsetor"
(
	"id_setor" serial  NOT NULL,
	"descricao" VARCHAR(50),
	"sucinto" VARCHAR(15),
	PRIMARY KEY ("id_setor")
);

COMMENT ON TABLE "tbsetor" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbtipoingresso
-----------------------------------------------------------------------------

DROP TABLE "tbtipoingresso" CASCADE;


CREATE TABLE "tbtipoingresso"
(
	"id_tipo_ingresso" serial  NOT NULL,
	"descricao" VARCHAR(30),
	PRIMARY KEY ("id_tipo_ingresso")
);

COMMENT ON TABLE "tbtipoingresso" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbturma
-----------------------------------------------------------------------------

DROP TABLE "tbturma" CASCADE;


CREATE TABLE "tbturma"
(
	"id_turma" serial  NOT NULL,
	"id_periodo" INTEGER  NOT NULL,
	"cod_disciplina" VARCHAR(255)  NOT NULL,
	"turma" VARCHAR(255)  NOT NULL,
	"n_notas" INTEGER default 1,
	"observacao" VARCHAR(150),
	"notas_no_historico" BOOLEAN default 'f',
	PRIMARY KEY ("id_turma")
);

COMMENT ON TABLE "tbturma" IS '';


SET search_path TO public;
CREATE INDEX "fki_" ON "tbturma" ("cod_disciplina");

-----------------------------------------------------------------------------
-- tbturma_aluno
-----------------------------------------------------------------------------

DROP TABLE "tbturma_aluno" CASCADE;


CREATE TABLE "tbturma_aluno"
(
	"id_aluno" serial  NOT NULL,
	"id_turma" INTEGER  NOT NULL,
	"matricula" INTEGER,
	"faltas" INTEGER,
	"media_parcial" NUMERIC(10,2),
	"exame_recuperacao" NUMERIC(10,2),
	"media_final" NUMERIC(10,2),
	"id_conceito" INTEGER,
	PRIMARY KEY ("id_aluno"),
	CONSTRAINT "tbturma_aluno_id_turma_key" UNIQUE ("id_turma","matricula")
);

COMMENT ON TABLE "tbturma_aluno" IS '';


SET search_path TO public;
CREATE INDEX "fki" ON "tbturma_aluno" ("matricula");

-----------------------------------------------------------------------------
-- tbturma_nota
-----------------------------------------------------------------------------

DROP TABLE "tbturma_nota" CASCADE;


CREATE TABLE "tbturma_nota"
(
	"id_nota" serial  NOT NULL,
	"id_aluno" INTEGER  NOT NULL,
	"n_nota" INTEGER  NOT NULL,
	"valor" NUMERIC(10,2)  NOT NULL,
	PRIMARY KEY ("id_nota"),
	CONSTRAINT "tbturma_nota_id_aluno_key" UNIQUE ("id_aluno","n_nota")
);

COMMENT ON TABLE "tbturma_nota" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbturma_professor
-----------------------------------------------------------------------------

DROP TABLE "tbturma_professor" CASCADE;


CREATE TABLE "tbturma_professor"
(
	"id_turma" INTEGER  NOT NULL,
	"matricula_prof" INTEGER  NOT NULL,
	PRIMARY KEY ("id_turma","matricula_prof")
);

COMMENT ON TABLE "tbturma_professor" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbturma_sumula
-----------------------------------------------------------------------------

DROP TABLE "tbturma_sumula" CASCADE;


CREATE TABLE "tbturma_sumula"
(
	"id_sumula" serial  NOT NULL,
	"id_turma" INTEGER  NOT NULL,
	"data" DATE  NOT NULL,
	"descricao" TEXT  NOT NULL,
	"matricula_prof" INTEGER  NOT NULL,
	PRIMARY KEY ("id_sumula")
);

COMMENT ON TABLE "tbturma_sumula" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tbturno
-----------------------------------------------------------------------------

DROP TABLE "tbturno" CASCADE;


CREATE TABLE "tbturno"
(
	"id_turno" serial  NOT NULL,
	"descricao" VARCHAR(20),
	"hora_inicial" TIME,
	"hora_final" TIME,
	PRIMARY KEY ("id_turno")
);

COMMENT ON TABLE "tbturno" IS '';


SET search_path TO public;
ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_1" FOREIGN KEY ("id_neces_especial") REFERENCES "tbnecesespecial" ("id_neces_especial");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_2" FOREIGN KEY ("naturalidade") REFERENCES "tbcidade" ("id_cidade");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_3" FOREIGN KEY ("nacionalidade") REFERENCES "tbpais" ("id_pais");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_4" FOREIGN KEY ("cep") REFERENCES "tblogradouro" ("cep");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_5" FOREIGN KEY ("id_versao_curso") REFERENCES "tbcursoversao" ("id_versao_curso");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_6" FOREIGN KEY ("id_tipo_ingresso") REFERENCES "tbtipoingresso" ("id_tipo_ingresso");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_7" FOREIGN KEY ("id_situacao") REFERENCES "tbalunosituacao" ("id_situacao");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_8" FOREIGN KEY ("id_destino") REFERENCES "tbinstexterna" ("id_inst_externa");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_9" FOREIGN KEY ("id_2grau") REFERENCES "tbinstexterna" ("id_inst_externa");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_10" FOREIGN KEY ("id_3grau") REFERENCES "tbinstexterna" ("id_inst_externa");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_11" FOREIGN KEY ("id_trabalho") REFERENCES "tbinstexterna" ("id_inst_externa");

ALTER TABLE "tbaluno" ADD CONSTRAINT "tbaluno_FK_12" FOREIGN KEY ("cep_trabalho") REFERENCES "tblogradouro" ("cep");

ALTER TABLE "tbalunodiploma" ADD CONSTRAINT "tbalunodiploma_FK_1" FOREIGN KEY ("matricula") REFERENCES "tbaluno" ("matricula");

ALTER TABLE "tbalunosenha" ADD CONSTRAINT "tbalunosenha_FK_1" FOREIGN KEY ("matricula") REFERENCES "tbaluno" ("matricula");

ALTER TABLE "tbaviso" ADD CONSTRAINT "tbaviso_FK_1" FOREIGN KEY ("local") REFERENCES "tbaviso_local" ("nome");

ALTER TABLE "tbbanca" ADD CONSTRAINT "tbbanca_FK_1" FOREIGN KEY ("matricula") REFERENCES "tbaluno" ("matricula");

ALTER TABLE "tbcampus" ADD CONSTRAINT "tbcampus_FK_1" FOREIGN KEY ("id_cidade") REFERENCES "tbcidade" ("id_cidade");

ALTER TABLE "tbcidade" ADD CONSTRAINT "tbcidade_FK_1" FOREIGN KEY ("id_estado") REFERENCES "tbestado" ("id_estado");

ALTER TABLE "tbcidade" ADD CONSTRAINT "tbcidade_FK_2" FOREIGN KEY ("id_pais") REFERENCES "tbpais" ("id_pais");

ALTER TABLE "tbcurriculodisciplinas" ADD CONSTRAINT "tbcurriculodisciplinas_FK_1" FOREIGN KEY ("id_versao_curso") REFERENCES "tbcursoversao" ("id_versao_curso");

ALTER TABLE "tbcurriculodisciplinas" ADD CONSTRAINT "tbcurriculodisciplinas_FK_2" FOREIGN KEY ("id_setor") REFERENCES "tbsetor" ("id_setor");

ALTER TABLE "tbcurriculodisciplinas" ADD CONSTRAINT "tbcurriculodisciplinas_FK_3" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tbcurriculodisciplinas" ADD CONSTRAINT "tbcurriculodisciplinas_FK_4" FOREIGN KEY ("id_carater") REFERENCES "tbcarater" ("id_carater");

ALTER TABLE "tbgradeequivalente" ADD CONSTRAINT "tbgradeequivalente_FK_1" FOREIGN KEY ("id_curriculo_disciplina") REFERENCES "tbcurriculodisciplinas" ("id_curriculo_disciplina") ON DELETE CASCADE;

ALTER TABLE "tbgradeequivalente" ADD CONSTRAINT "tbgradeequivalente_FK_2" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina") ON DELETE CASCADE;

ALTER TABLE "tbcursoversao" ADD CONSTRAINT "tbcursoversao_FK_1" FOREIGN KEY ("id_formacao") REFERENCES "tbformacao" ("id_formacao");

ALTER TABLE "tbcursoversao" ADD CONSTRAINT "tbcursoversao_FK_2" FOREIGN KEY ("cod_curso") REFERENCES "tbcurso" ("cod_curso");

ALTER TABLE "tbcursoversao" ADD CONSTRAINT "tbcursoversao_FK_3" FOREIGN KEY ("id_turno") REFERENCES "tbturno" ("id_turno");

ALTER TABLE "tbcursoversao" ADD CONSTRAINT "tbcursoversao_FK_4" FOREIGN KEY ("id_campus") REFERENCES "tbcampus" ("id_campus");

ALTER TABLE "tbcursoversao" ADD CONSTRAINT "tbcursoversao_FK_5" FOREIGN KEY ("id_setor") REFERENCES "tbsetor" ("id_setor");

ALTER TABLE "tbdisciplina" ADD CONSTRAINT "tbdisciplina_FK_1" FOREIGN KEY ("id_situacao") REFERENCES "tbdisciplinasituacao" ("id_situacao");

ALTER TABLE "tbdisciplinarequisitos" ADD CONSTRAINT "tbdisciplinarequisitos_FK_1" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tbdisciplinarequisitos" ADD CONSTRAINT "tbdisciplinarequisitos_FK_2" FOREIGN KEY ("id_versao_curso") REFERENCES "tbcursoversao" ("id_versao_curso");

ALTER TABLE "tbdisciplinarequisitos" ADD CONSTRAINT "tbdisciplinarequisitos_FK_3" FOREIGN KEY ("cod_disc_requisito") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tbestado" ADD CONSTRAINT "tbestado_FK_1" FOREIGN KEY ("id_pais") REFERENCES "tbpais" ("id_pais");

ALTER TABLE "tbfila" ADD CONSTRAINT "tbfila_FK_1" FOREIGN KEY ("matricula") REFERENCES "tbaluno" ("matricula");

ALTER TABLE "tbfila" ADD CONSTRAINT "tbfila_FK_2" FOREIGN KEY ("id_oferta") REFERENCES "tboferta" ("id_oferta");

ALTER TABLE "tbfila" ADD CONSTRAINT "tbfila_FK_3" FOREIGN KEY ("id_situacao") REFERENCES "tbfilasituacao" ("id_situacao");

ALTER TABLE "tbhistorico" ADD CONSTRAINT "tbhistorico_FK_1" FOREIGN KEY ("id_periodo") REFERENCES "tbperiodo" ("id_periodo");

ALTER TABLE "tbhistorico" ADD CONSTRAINT "tbhistorico_FK_2" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tbhistorico" ADD CONSTRAINT "tbhistorico_FK_3" FOREIGN KEY ("id_conceito") REFERENCES "tbconceito" ("id_conceito");

ALTER TABLE "tblogradouro" ADD CONSTRAINT "tblogradouro_FK_1" FOREIGN KEY ("id_bairro") REFERENCES "tbbairro" ("id_bairro");

ALTER TABLE "tblogradouro" ADD CONSTRAINT "tblogradouro_FK_2" FOREIGN KEY ("id_cidade") REFERENCES "tbcidade" ("id_cidade");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_1" FOREIGN KEY ("id_periodo") REFERENCES "tbperiodo" ("id_periodo");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_2" FOREIGN KEY ("id_turno") REFERENCES "tbturno" ("id_turno");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_3" FOREIGN KEY ("cod_curso") REFERENCES "tbcurso" ("cod_curso");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_4" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_5" FOREIGN KEY ("id_sala") REFERENCES "tbsala" ("id_sala");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_6" FOREIGN KEY ("id_matricula_prof") REFERENCES "tbprofessor" ("matricula_prof");

ALTER TABLE "tboferta" ADD CONSTRAINT "tboferta_FK_7" FOREIGN KEY ("id_setor") REFERENCES "tbsetor" ("id_setor");

ALTER TABLE "tbofertahorario" ADD CONSTRAINT "tbofertahorario_FK_1" FOREIGN KEY ("id_oferta") REFERENCES "tboferta" ("id_oferta");

ALTER TABLE "tbpessoa" ADD CONSTRAINT "tbpessoa_FK_1" FOREIGN KEY ("id_neces_especial") REFERENCES "tbnecesespecial" ("id_neces_especial");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_1" FOREIGN KEY ("id_neces_especial") REFERENCES "tbnecesespecial" ("id_neces_especial");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_2" FOREIGN KEY ("cod_curso") REFERENCES "tbcurso" ("cod_curso");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_3" FOREIGN KEY ("id_tipo_vinculo") REFERENCES "tbproftipovinculo" ("id_tipo_vinculo");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_4" FOREIGN KEY ("id_formacao") REFERENCES "tbformacao" ("id_formacao");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_5" FOREIGN KEY ("id_prof_sit") REFERENCES "tbprofessorsituacao" ("id_situacao");

ALTER TABLE "tbprofessor" ADD CONSTRAINT "tbprofessor_FK_6" FOREIGN KEY ("id_setor") REFERENCES "tbsetor" ("id_setor");

ALTER TABLE "tbprofessorsenha" ADD CONSTRAINT "tbprofessorsenha_FK_1" FOREIGN KEY ("matricula_prof") REFERENCES "tbprofessor" ("matricula_prof");

ALTER TABLE "tbsala" ADD CONSTRAINT "tbsala_FK_1" FOREIGN KEY ("id_campus") REFERENCES "tbcampus" ("id_campus");

ALTER TABLE "tbturma" ADD CONSTRAINT "tbturma_FK_1" FOREIGN KEY ("id_periodo") REFERENCES "tbperiodo" ("id_periodo");

ALTER TABLE "tbturma" ADD CONSTRAINT "tbturma_FK_2" FOREIGN KEY ("cod_disciplina") REFERENCES "tbdisciplina" ("cod_disciplina");

ALTER TABLE "tbturma_aluno" ADD CONSTRAINT "tbturma_aluno_FK_1" FOREIGN KEY ("id_turma") REFERENCES "tbturma" ("id_turma");

ALTER TABLE "tbturma_aluno" ADD CONSTRAINT "tbturma_aluno_FK_2" FOREIGN KEY ("matricula") REFERENCES "tbaluno" ("matricula");

ALTER TABLE "tbturma_aluno" ADD CONSTRAINT "tbturma_aluno_FK_3" FOREIGN KEY ("id_conceito") REFERENCES "tbconceito" ("id_conceito");

ALTER TABLE "tbturma_nota" ADD CONSTRAINT "tbturma_nota_FK_1" FOREIGN KEY ("id_aluno") REFERENCES "tbturma_aluno" ("id_aluno") ON DELETE CASCADE;

ALTER TABLE "tbturma_professor" ADD CONSTRAINT "tbturma_professor_FK_1" FOREIGN KEY ("id_turma") REFERENCES "tbturma" ("id_turma") ON DELETE CASCADE;

ALTER TABLE "tbturma_professor" ADD CONSTRAINT "tbturma_professor_FK_2" FOREIGN KEY ("matricula_prof") REFERENCES "tbprofessor" ("matricula_prof") ON DELETE CASCADE;

ALTER TABLE "tbturma_sumula" ADD CONSTRAINT "tbturma_sumula_FK_1" FOREIGN KEY ("id_turma") REFERENCES "tbturma" ("id_turma");
