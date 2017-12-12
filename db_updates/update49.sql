--- Adição da tabela tbinstexternatipo e adicao da coluna na tabela tbinstexterna e sua fk
---

CREATE TABLE tbinstexternatipo
(
-- Herdado from table tbfilasituacao:  usuario character varying(20) DEFAULT "current_user"(),
-- Herdado from table tbfilasituacao:  datahora timestamp without time zone DEFAULT (now())::timestamp without time zone,
-- Herdado from table tbfilasituacao:  ip character varying(32),
-- Herdado from table tbfilasituacao:  created_at timestamp without time zone,
-- Herdado from table tbfilasituacao:  updated_at timestamp without time zone,
-- Herdado from table tbfilasituacao:  created_by character varying(20),
-- Herdado from table tbfilasituacao:  updated_by character varying(20),
  id_tipo serial NOT NULL,
  descricao character varying(15),
  CONSTRAINT tbinstexternatipo_pkey PRIMARY KEY (id_tipo)
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);
ALTER TABLE tbinstexternatipo OWNER TO postgres;
GRANT ALL ON TABLE tbinstexternatipo TO postgres;
GRANT SELECT ON TABLE tbinstexternatipo TO aluno;
GRANT SELECT ON TABLE tbinstexternatipo TO consultor;
GRANT ALL ON TABLE tbinstexternatipo TO derca;
GRANT ALL ON TABLE tbinstexternatipo TO gda2;
GRANT ALL ON TABLE tbinstexternatipo TO professor;
COMMENT ON TABLE tbinstexternatipo IS 'Tipo de Ins - publico,privado,indefinido';

ALTER TABLE tbinstexterna ADD COLUMN id_tipo integer;
ALTER TABLE tbinstexterna ALTER COLUMN id_tipo SET DEFAULT 1;

ALTER TABLE tbinstexterna
  ADD CONSTRAINT tbinstexterna_id_tipo_fk FOREIGN KEY (id_tipo)
      REFERENCES tbinstexternatipo (id_tipo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

--coloca os dados iniciais da tabelas
