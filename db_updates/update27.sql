

DROP FUNCTION get_disciplinas_a_cursar(integer, integer);

CREATE OR REPLACE FUNCTION get_disciplinas_a_cursar(integer, integer,boolean)
  RETURNS integer AS
$BODY$

DECLARE
Amatricula  alias for $1;
Aid_periodo alias for $2;
Afila       alias for $3;
_saida     integer;
_versao integer;

BEGIN

if(Afila) then
SELECT INTO _saida count(cod_disciplina) from tbcurriculodisciplinas where id_versao_curso = versaocursoaluno(Amatricula) and cod_disciplina NOT IN (select cod_disciplina from tbfila,tboferta where tbfila.id_oferta = tboferta.id_oferta and matricula=Amatricula and id_periodo = Aid_periodo and tbfila.id_situacao = 1 and tboferta.id_situacao = 1) AND cod_disciplina not in (select cod_disciplina from tbhistorico where matricula=Amatricula and id_conceito NOT IN (2,3,9,12,15,10)) and cod_disciplina not in(select cod_disciplina from tbdisciplina_ignorada);
else

SELECT INTO _saida count(cod_disciplina) from tbcurriculodisciplinas where id_versao_curso = versaocursoaluno(Amatricula) AND cod_disciplina not in (select cod_disciplina from tbhistorico where matricula=Amatricula and id_conceito NOT IN (2,3,9,12,15,10)) and cod_disciplina not in(select cod_disciplina from tbdisciplina_ignorada);

end if;


RETURN _saida;
END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION get_disciplinas_a_cursar(integer, integer,boolean) OWNER TO postgres;

