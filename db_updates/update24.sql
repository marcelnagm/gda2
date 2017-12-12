
-- DROP FUNCTION get_disciplinas_a_cursar(integer, integer);

CREATE OR REPLACE FUNCTION get_disciplinas_a_cursar(integer, integer)
  RETURNS integer AS
$BODY$

DECLARE
Amatricula alias for $1;
Aid_periodo alias for $2;
_saida     integer;
_versao integer;

BEGIN

SELECT INTO _versao versaocursoaluno(Amatricula);

SELECT INTO _saida count
(tbcurriculodisciplinas.cod_disciplina)
FROM tbcurriculodisciplinas where tbcurriculodisciplinas.id_versao_curso = _versao and
     cod_disciplina NOT IN (
     --seleciona as disciplinas q foram aproveitas ou aprovadas e estão no curriculodisciplinas
	SELECT cod from (
		SELECT tbhistorico.cod_disciplina as cod ,id_conceito as conceito from tbhistorico,tbcurriculodisciplinas,tbdisciplina  where tbhistorico.matricula = Amatricula and tbcurriculodisciplinas.id_versao_curso = _versao	
		and tbhistorico.cod_disciplina = tbcurriculodisciplinas.cod_disciplina
	) as A where  A.conceito = 1  or A.conceito  = 4  or A.conceito  = 6  or A.conceito  = 7  or A.conceito  = 8  or A.conceito  = 11  or A.conceito  = 13
    ) AND
    cod_disciplina
    NOT IN(
    --DISCIPLINAS QUE ESTÃO NA FILA
	SELECT cod_disciplina from tbfila,tboferta where tbfila.matricula = Amatricula and
	tbfila.id_oferta = tboferta.id_oferta and tboferta.id_periodo = Aid_periodo
	) AND
cod_disciplina NOT IN (SELECT cod_disciplina from tbdisciplina_ignorada	
)
;



RETURN _saida;
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION get_disciplinas_a_cursar(integer, integer) OWNER TO postgres;

