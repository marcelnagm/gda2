-- Table: tbalunosolicitacao

 DROP TABLE tbalunosolicitacao;

CREATE TABLE tbalunosolicitacao
(
-- Herdado from table tbalunosolicitacao:  usuario character varying(20) DEFAULT NULL::character varying,
-- Herdado from table tbalunosolicitacao:  datahora timestamp without time zone DEFAULT (now())::timestamp without time zone,
-- Herdado from table tbalunosolicitacao:  ip character varying(32),
-- Herdado from table tbalunosolicitacao:  created_at timestamp without time zone DEFAULT (now())::timestamp without time zone,
-- Herdado from table tbalunosolicitacao:  updated_at timestamp without time zone,
-- Herdado from table tbalunosolicitacao:  created_by character varying(20),
-- Herdado from table tbalunosolicitacao:  updated_by character varying(20),
  id_solicitacao serial NOT NULL,
  matricula bigint NOT NULL,
  situacao character varying(10) NOT NULL,
  tipo character varying(30) NOT NULL,
  descricao text,
  observacao text,
  data_solicitacao date NOT NULL,
  data_encerrado date,
  CONSTRAINT tbalunosolicitacao_pkey PRIMARY KEY (id_solicitacao),
  CONSTRAINT tbalunosolicitacao_matricula_fkey FOREIGN KEY (matricula)
      REFERENCES tbaluno (matricula) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);
ALTER TABLE tbalunosolicitacao OWNER TO postgres;
GRANT ALL ON TABLE tbalunosolicitacao TO postgres;
GRANT ALL ON TABLE tbalunosolicitacao TO gda2;
GRANT ALL ON TABLE tbalunosolicitacao TO professor;
GRANT ALL ON TABLE tbalunosolicitacao TO public;
GRANT ALL ON TABLE tbalunosolicitacao TO derca;
COMMENT ON TABLE tbalunosolicitacao IS 'Tabela para armazenamento de solicitações';

GRANT ALL ON TABLE tbalunosolicitacao_id_solicitacao_seq TO postgres;
GRANT ALL ON TABLE tbalunosolicitacao_id_solicitacao_seq TO public;