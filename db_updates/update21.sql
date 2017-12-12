
-- DROP FUNCTION set_reprovacoes(integer);
--corrige um erro que dava na função set_reprovacoes
--  por alterações no banco (na oferta e fila existir o campo id_situacao)


CREATE OR REPLACE FUNCTION set_reprovacoes(integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_periodo alias for $1;
lsf    record;
_saida boolean DEFAULT false;

BEGIN

-- Desabilita triggers para agilizar o processo
ALTER TABLE tbfila DISABLE TRIGGER ALL;


FOR lsf IN SELECT id_fila, o.cod_disciplina,f.matricula FROM tbfila as f
                JOIN tboferta as o USING(id_oferta)
                WHERE f.id_situacao = 0
		AND o.id_periodo = Aid_periodo
LOOP
	_saida = true;
        UPDATE tbfila SET reprovacoes = (
		SELECT count(*) FROM tbhistorico WHERE cod_disciplina=lsf.cod_disciplina AND matricula=lsf.matricula AND id_conceito IN(2,3) 
	) WHERE id_fila=lsf.id_fila;

END LOOP;

-- Habilita triggers
ALTER TABLE tbfila ENABLE TRIGGER ALL;

RETURN _saida;


END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_reprovacoes(integer) OWNER TO postgres;
