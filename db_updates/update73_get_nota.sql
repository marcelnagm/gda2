CREATE OR REPLACE FUNCTION get_nota(character varying, bigint)
  RETURNS numeric(10,2) AS
$BODY$DECLARE
Acod_disc	ALIAS FOR $1;
Amatricula	ALIAS FOR $2;
_saida		numeric(10,2);

BEGIN

SELECT INTO _saida media 
from tbhistorico 
where id_conceito in (1,4,6,7,8,13)
AND cod_disciplina = Acod_disc
AND matricula = Amatricula;

-- Se não encontrar, retorna NULL
IF NOT FOUND THEN
     _saida = NULL;
END IF;


RETURN _saida;

END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION get_nota(character varying, bigint) OWNER TO postgres;
