
CREATE TABLE tbprofessorticket
(
  id_professorticket serial NOT NULL,
  id_periodo integer NOT NULL,
  matricula_prof integer NOT NULL,
  dt_inicio date,
  dt_fim date,
  CONSTRAINT tbprofessorticket_pkey PRIMARY KEY (id_professorticket ),
  CONSTRAINT tbprofessorticket_matricula_prof_fkey FOREIGN KEY (matricula_prof)
      REFERENCES tbprofessor (matricula_prof) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbprofessorticket_id_periodo_fkey FOREIGN KEY (id_periodo)
      REFERENCES tbperiodo (id_periodo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);
ALTER TABLE tbperiodo OWNER TO postgres;
GRANT ALL ON TABLE tbperiodo TO postgres;
GRANT SELECT ON TABLE tbperiodo TO aluno;
GRANT SELECT ON TABLE tbperiodo TO consultor;
GRANT ALL ON TABLE tbperiodo TO derca;
GRANT ALL ON TABLE tbperiodo TO gda2;
GRANT ALL ON TABLE tbperiodo TO professor;
COMMENT ON TABLE tbperiodo IS '18 - Período';

-- Index: tbperiodo_ano_semestre_periodo_idx

-- DROP INDEX tbperiodo_ano_semestre_periodo_idx;
