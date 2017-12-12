create table tbreligiao(id_religiao serial primary key, descricao varchar(50) not null) inherits(tblog);
alter table tbreligiao owner to postgres;

insert into tbreligiao (descricao) values ('Católica');
insert into tbreligiao (descricao) values ('Evangélica');
insert into tbreligiao (descricao) values ('Espírita');
insert into tbreligiao (descricao) values ('Outras');


create table tbnivelinstrucao(id_nivel_instrucao serial primary key, descricao varchar(50) not null) inherits(tblog);
alter table tbnivelinstrucao owner to postgres;

insert into tbnivelinstrucao (descricao) values ('Alfabetizado');
insert into tbnivelinstrucao (descricao) values ('Ensino Fundamental Incompleto');
insert into tbnivelinstrucao (descricao) values ('Ensino Fundamental Completo');
insert into tbnivelinstrucao (descricao) values ('Ensino Médio Incompleto');
insert into tbnivelinstrucao (descricao) values ('Ensino Médio Completo');
insert into tbnivelinstrucao (descricao) values ('Ensino Superior Incompleto');
insert into tbnivelinstrucao (descricao) values ('Ensino Superior Completo');
insert into tbnivelinstrucao (descricao) values ('Especialização');
insert into tbnivelinstrucao (descricao) values ('Mestrado');
insert into tbnivelinstrucao (descricao) values ('Doutorado');

insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'1º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'2º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'3º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'4º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'5º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'6º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'7º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'8º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,1,'9º ANO - FUNDAMENTAL','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,2,'1º ANO - MÉDIO','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,2,'2º ANO - MÉDIO','ATIVA');
insert into tbcursoversao (id_versao_curso,cod_curso,descricao,situacao) values (default,2,'3º ANO - MÉDIO','ATIVA');

insert into tbtipoingresso (descricao) values ('TRANSFERÊNCIA (CAp - CAp)');
insert into tbtipoingresso (descricao) values ('SORTEIO');


-- Table: tbalunobackup

-- DROP TABLE tbalunobackup;

CREATE TABLE tbalunobackup
(
-- Herdado from table tbalunobackup:  usuario character varying(20) DEFAULT "current_user"(),
-- Herdado from table tbalunobackup:  datahora timestamp without time zone DEFAULT (now())::timestamp without time zone,
-- Herdado from table tbalunobackup:  ip character varying(32),
-- Herdado from table tbalunobackup:  created_at timestamp without time zone,
-- Herdado from table tbalunobackup:  updated_at timestamp without time zone,
-- Herdado from table tbalunobackup:  created_by character varying(20),
-- Herdado from table tbalunobackup:  updated_by character varying(20),
-- Herdado from table tbalunobackup:  id_pessoa integer NOT NULL DEFAULT nextval('tbpessoa_id_pessoa_seq'::regclass),
-- Herdado from table tbalunobackup:  nome character varying(100),
-- Herdado from table tbalunobackup:  celular character varying(15),
-- Herdado from table tbalunobackup:  email character varying(100),
-- Herdado from table tbalunobackup:  fone_residencial character varying(15),
-- Herdado from table tbalunobackup:  foto bytea,
-- Herdado from table tbalunobackup:  id_neces_especial smallint,
  matricula bigint NOT NULL,
  dt_nascimento date,
  naturalidade integer,
  uf_nascimento character(2),
  nacionalidade integer,
  sexo character(1),
  estado_civil character varying(15),
  titulo character varying(20),
  titulo_zona integer,
  titulo_secao integer,
  rg character varying(20),
  rg_dt_exped date,
  rg_org_exped character varying(10),
  cpf character varying(11),
  reservista character varying(20),
  pai character varying(50),
  mae character varying(50),
  cep character varying(9),
  numero character varying(8),
  complemento character varying(50),
  id_versao_curso integer NOT NULL,
  id_tipo_ingresso integer,
  dt_ingresso date,
  id_situacao integer NOT NULL,
  dt_situacao date,
  id_destino integer,
  id_2grau integer,
  ano_concl_2grau integer,
  id_3grau integer,
  ano_concl_3grau integer,
  id_trabalho integer,
  cep_trabalho character varying(8),
  fone_trabalho character varying(15),
  ramal_trabalho character varying(5),
  media_geral numeric(10,2),
  ch_eletiva_cursada integer,
  ch_eletiva_solicitada integer,
  ch_obrig_cursada integer,
  ch_obrig_solicitada integer,
  ch_total smallint,
  id_antigo integer,
  id_raca integer,
  op_ingresso integer DEFAULT 0,
  id_polo integer DEFAULT 0,
  certidao_nascimento character varying(50),
  qtd_irmaos integer DEFAULT 0,
  pai_profissao character varying(100),
  pai_local_trabalho character varying(100),
  pai_fone character varying(25),
  mae_profissao character varying(100),
  mae_local_trabalho character varying(100),
  mae_fone character varying(25),
  id_religiao integer,
  pai_id_nivel_instrucao integer,
  mae_id_nivel_instrucao integer,
  renda_familiar character varying(20),
  CONSTRAINT tbalunobackup_pkey PRIMARY KEY (matricula),
  CONSTRAINT aluno_religiao FOREIGN KEY (id_religiao)
      REFERENCES tbreligiao (id_religiao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_tbpolo_tbalunobackup FOREIGN KEY (id_polo)
      REFERENCES tbpolos (id_polo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT mae_nivelinstrucao FOREIGN KEY (mae_id_nivel_instrucao)
      REFERENCES tbnivelinstrucao (id_nivel_instrucao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT pai_nivelinstrucao FOREIGN KEY (pai_id_nivel_instrucao)
      REFERENCES tbnivelinstrucao (id_nivel_instrucao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_cep_fkey FOREIGN KEY (cep)
      REFERENCES tblogradouro (cep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_cep_trabalho_fkey FOREIGN KEY (cep_trabalho)
      REFERENCES tblogradouro (cep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_2grau_fkey FOREIGN KEY (id_2grau)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_3grau_fkey FOREIGN KEY (id_3grau)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_destino_fkey FOREIGN KEY (id_destino)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_raca_fk FOREIGN KEY (id_raca)
      REFERENCES tbaluno_racacor (id_raca) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_situacao_fkey FOREIGN KEY (id_situacao)
      REFERENCES tbalunosituacao (id_situacao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_tipo_ingresso_fkey FOREIGN KEY (id_tipo_ingresso)
      REFERENCES tbtipoingresso (id_tipo_ingresso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_trabalho_fkey FOREIGN KEY (id_trabalho)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_id_versao_curso_fkey FOREIGN KEY (id_versao_curso)
      REFERENCES tbcursoversao (id_versao_curso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbalunobackup_naturalidade_fkey FOREIGN KEY (naturalidade)
      REFERENCES tbcidade (id_cidade) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
INHERITS (tblog, tbpessoa)
WITH (
  OIDS=TRUE
);
ALTER TABLE tbalunobackup OWNER TO postgres;
GRANT ALL ON TABLE tbalunobackup TO postgres;
GRANT SELECT ON TABLE tbalunobackup TO public;
GRANT SELECT, UPDATE ON TABLE tbalunobackup TO aluno;
GRANT SELECT ON TABLE tbalunobackup TO consultor;
GRANT ALL ON TABLE tbalunobackup TO derca;
GRANT ALL ON TABLE tbalunobackup TO gda2;
GRANT ALL ON TABLE tbalunobackup TO professor;



ALTER TABLE tbaluno ADD COLUMN certidao_nascimento character varying(50);
ALTER TABLE tbaluno ADD COLUMN qtd_irmaos integer DEFAULT 0;
ALTER TABLE tbaluno ADD COLUMN pai_profissao character varying(100);
ALTER TABLE tbaluno ADD COLUMN pai_local_trabalho character varying(100);
ALTER TABLE tbaluno ADD COLUMN pai_fone character varying(25);
ALTER TABLE tbaluno ADD COLUMN mae_profissao character varying(100);
ALTER TABLE tbaluno ADD COLUMN mae_local_trabalho character varying(100);
ALTER TABLE tbaluno ADD COLUMN mae_fone character varying(25);
ALTER TABLE tbaluno ADD COLUMN id_religiao integer;
ALTER TABLE tbaluno ADD COLUMN pai_id_nivel_instrucao integer;
ALTER TABLE tbaluno ADD COLUMN mae_id_nivel_instrucao integer;
ALTER TABLE tbaluno ADD COLUMN renda_familiar character varying(20);
ALTER TABLE tbaluno ADD CONSTRAINT aluno_religiao FOREIGN KEY (id_religiao) REFERENCES tbreligiao (id_religiao) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE tbaluno ADD CONSTRAINT pai_nivelinstrucao FOREIGN KEY (pai_id_nivel_instrucao) REFERENCES tbnivelinstrucao (id_nivel_instrucao) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE tbaluno ADD CONSTRAINT mae_nivelinstrucao FOREIGN KEY (mae_id_nivel_instrucao) REFERENCES tbnivelinstrucao (id_nivel_instrucao) ON UPDATE NO ACTION ON DELETE NO ACTION;
