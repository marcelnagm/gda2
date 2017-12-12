

-- DROP FUNCTION checa_disc_duplicada(integer, integer);

CREATE OR REPLACE FUNCTION checa_disc_duplicada(integer, integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_oferta alias for $1;
Amatricula alias for $2;
_cod_disc  VARCHAR;
_id_periodo  INTEGER;

BEGIN

SELECT INTO _cod_disc,_id_periodo cod_disciplina,id_periodo 
FROM tboferta WHERE id_oferta = Aid_oferta;


IF ( (SELECT count(cod_disciplina)
	FROM tbfila f
	JOIN tboferta o USING(id_oferta)
        WHERE cod_disciplina = _cod_disc
	AND o.id_periodo = _id_periodo
	AND o.id_oferta != Aid_oferta
	AND matricula = Amatricula
	AND f.id_situacao IN (1)
	) >= 1
)THEN
        return true;
ELSE
        return false;
END IF;

END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION checa_disc_duplicada(integer, integer) OWNER TO postgres;
COMMENT ON FUNCTION checa_disc_duplicada(integer, integer) IS 'Retorna true se há disciplinas duplicadas';
