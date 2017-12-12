--criar tabelas tbloadfile e tbloadaluno

﻿create table tbloadfile (
id serial not null,
"file" varchar(255) not null,
description varchar(255) not null,
constraint pk_tbloadfile primary key(id)
)INHERITS (tblog, tbpessoa)
WITH (
  OIDS=TRUE
);

create table tbloadaluno (
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
  matricula_2 bigint,
  CONSTRAINT tbloadaluno_pkey PRIMARY KEY (matricula),
  CONSTRAINT tbloadaluno_cep_fkey FOREIGN KEY (cep)
      REFERENCES tblogradouro (cep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_cep_trabalho_fkey FOREIGN KEY (cep_trabalho)
      REFERENCES tblogradouro (cep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_2grau_fkey FOREIGN KEY (id_2grau)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_3grau_fkey FOREIGN KEY (id_3grau)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_destino_fkey FOREIGN KEY (id_destino)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_situacao_fkey FOREIGN KEY (id_situacao)
      REFERENCES tbalunosituacao (id_situacao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_tipo_ingresso_fkey FOREIGN KEY (id_tipo_ingresso)
      REFERENCES tbtipoingresso (id_tipo_ingresso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_trabalho_fkey FOREIGN KEY (id_trabalho)
      REFERENCES tbinstexterna (id_inst_externa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_versao_curso_fkey FOREIGN KEY (id_versao_curso)
      REFERENCES tbcursoversao (id_versao_curso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_naturalidade_fkey FOREIGN KEY (naturalidade)
      REFERENCES tbcidade (id_cidade) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
INHERITS (tblog, tbpessoa)
WITH (
  OIDS=TRUE
);
