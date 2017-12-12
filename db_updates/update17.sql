

-- DROP FUNCTION set_aceitos(integer, integer);

--Corrige a função aceitos para colocar aceitos selecionando pela fase (1 e 2 fase)

CREATE OR REPLACE FUNCTION set_aceitos(integer, integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_periodo alias for $1;
Afase alias for $2;
lso	    record;
_saida	    boolean DEFAULT false;

BEGIN

-- Desabilita triggers para agilizar o processo
ALTER TABLE tbfila DISABLE TRIGGER ALL;

FOR lso IN SELECT id_oferta FROM tboferta WHERE id_periodo=Aid_periodo
LOOP
        _saida = set_aceitos_oferta(lso.id_oferta,Afase);

END LOOP;

UPDATE tbfila SET id_situacao=1 
WHERE id_oferta IN (SELECT id_oferta FROM tboferta WHERE cod_disciplina='ST999' AND id_periodo=Aid_periodo);

-- Habilita triggers
ALTER TABLE tbfila ENABLE TRIGGER ALL;


RETURN _saida;


END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_aceitos(integer, integer) OWNER TO marcel;
