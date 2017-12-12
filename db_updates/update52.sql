-- Cria a tabela tbcoordenadorcurso para criar
-- a funcionalidade para a coordenador ter acesso a varios "cursos"

CREATE TABLE tbcoordenadorcurso
(
  id_coordenador_curso serial NOT NULL,
  matricula_prof integer NOT NULL,
  id_versao_curso integer NOT NULL,
  CONSTRAINT tbcoordenadorcurso_pkey PRIMARY KEY (id_coordenador_curso, matricula_prof, id_versao_curso),
  CONSTRAINT tbcoordenadorcurso_id_versao_curso_fk FOREIGN KEY (id_versao_curso)
      REFERENCES tbcursoversao (id_versao_curso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbcoordenadorcurso_matricula_prof_fk FOREIGN KEY (matricula_prof)
      REFERENCES tbprofessor (matricula_prof) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tbcoordenadorcurso_id_versao_curso_key UNIQUE (id_versao_curso)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE tbcoordenadorcurso OWNER TO postgres;
GRANT ALL ON TABLE tbcoordenadorcurso TO postgres;
GRANT SELECT ON TABLE tbcoordenadorcurso TO aluno;
GRANT SELECT ON TABLE tbcoordenadorcurso TO consultor;
GRANT ALL ON TABLE tbcoordenadorcurso TO derca;
GRANT ALL ON TABLE tbcoordenadorcurso TO gda2;
GRANT ALL ON TABLE tbcoordenadorcurso TO professor;
COMMENT ON TABLE tbcoordenadorcurso IS 'Relação de coordenadores por versao de curso';

-- Index: fki_tbcoordenadorcurso_matricula_prof_fk

-- DROP INDEX fki_tbcoordenadorcurso_matricula_prof_fk;

CREATE INDEX fki_tbcoordenadorcurso_matricula_prof_fk
  ON tbcoordenadorcurso
  USING btree
  (matricula_prof);