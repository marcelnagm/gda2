
DROP TABLE tbgrade_equivalente;

CREATE TABLE tbgrade_equivalente
(
  id_grade_equivalente serial NOT NULL,
  id_curriculo_disciplina integer NOT NULL,
  cod_disciplina character varying(10) NOT NULL,
  CONSTRAINT tbgradeequivalente_pkey PRIMARY KEY (id_grade_equivalente,id_curriculo_disciplina, cod_disciplina),
  CONSTRAINT tbgrade_equivalente_cod_disciplina_key UNIQUE (id_curriculo_disciplina)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE tbgrade_equivalente OWNER TO postgres;
GRANT ALL ON TABLE tbgrade_equivalente TO postgres;
GRANT SELECT ON TABLE tbgrade_equivalente TO aluno;
GRANT SELECT ON TABLE tbgrade_equivalente TO consultor;
GRANT ALL ON TABLE tbgrade_equivalente TO derca;
GRANT ALL ON TABLE tbgrade_equivalente TO gda2;
GRANT ALL ON TABLE tbgrade_equivalente TO professor;
COMMENT ON TABLE tbgrade_equivalente IS 'Relação de disciplinas das grades novas equivalentes com as grades antigas no sistema';
