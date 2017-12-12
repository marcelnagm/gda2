-- Function: porcentagem_ch_cursada(bigint)

-- DROP FUNCTION porcentagem_ch_cursada_ignora(bigint);

CREATE OR REPLACE FUNCTION porcentagem_ch_cursada_ignora(bigint)
  RETURNS integer AS
$BODY$DECLARE
Amatricula		alias for $1;
_ch_aluno	INTEGER;
_ch_curso	INTEGER;
_id_versao_curso	INTEGER;
_porcentagem	INTEGER;

BEGIN

_id_versao_curso = versaocursoaluno(Amatricula);

-- Pegar a ch do aluno
SELECT INTO _ch_aluno ch_eletiva_cursada+ch_obrig_cursada FROM tbaluno WHERE matricula=Amatricula;

-- Pegar a ch do curso
SELECT INTO _ch_curso ch_total-(select sum(d.ch) from tbdisciplina as d join tbcurriculodisciplinas as c on c.cod_disciplina=d.cod_disciplina join tbcursoversao as v on v.id_versao_curso=c.id_versao_curso join tbdisciplina_ignorada as i on i.cod_disciplina=c.cod_disciplina where v.id_versao_curso =_id_versao_curso) FROM tbcursoversao WHERE id_versao_curso=_id_versao_curso;

IF (_ch_curso = 0) THEN
	RETURN 0;
END IF;

_porcentagem = (100 * _ch_aluno) / _ch_curso;


IF (_porcentagem > 100) THEN
	RETURN 100;
ELSE
	RETURN _porcentagem;
END IF;


END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION porcentagem_ch_cursada(bigint) OWNER TO postgres;
COMMENT ON FUNCTION porcentagem_ch_cursada(bigint) IS 'Porcentagem de horas cursadas do aluno';
