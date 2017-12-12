--alteração da tabela tbloadaluno

drop table tbloadaluno;

create table tbloadaluno (
  matricula bigint NOT NULL,
  nome character varying(100),
  sexo character(1),
  rg character varying(20),
  rg_org_exped character varying(10),
  cpf character varying(11),
  id_versao_curso integer NOT NULL,
  id_tipo_ingresso integer,
  id_situacao integer NOT NULL,
  classificacao integer,
  opcao varchar(15),
  CONSTRAINT tbloadaluno_pkey PRIMARY KEY (matricula),
  CONSTRAINT tbloadaluno_id_situacao_fkey FOREIGN KEY (id_situacao)
      REFERENCES tbalunosituacao (id_situacao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_tipo_ingresso_fkey FOREIGN KEY (id_tipo_ingresso)
      REFERENCES tbtipoingresso (id_tipo_ingresso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbloadaluno_id_versao_curso_fkey FOREIGN KEY (id_versao_curso)
      REFERENCES tbcursoversao (id_versao_curso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);
