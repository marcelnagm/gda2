-- Function: get_id_periodo(integer, integer)

-- DROP FUNCTION get_id_periodo(integer, integer);

CREATE OR REPLACE FUNCTION get_id_periodo(character varying, character varying)
  RETURNS integer AS
$BODY$DECLARE
_saida		integer;
Aano		integer;
Asemestre	integer;

BEGIN

Aano := cast($1 as integer);
Asemestre := cast($2 as integer);

SELECT INTO _saida id_periodo
FROM tbperiodo p
WHERE p.ano = Aano
AND p.semestre= Asemestre
LIMIT 1;

IF NOT FOUND THEN
     _saida = 0;
END IF;


RETURN _saida;

END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION get_id_periodo(character varying, character varying) OWNER TO postgres;
