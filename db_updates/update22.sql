
-- DROP FUNCTION set_prerequisitos(integer);
--corrige um erro que dava na função set_prerequisitos
--  por alterações no banco (na oferta e fila existir o campo id_situacao)

CREATE OR REPLACE FUNCTION set_prerequisitos(integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_periodo   alias for $1;
_cod_disc_ integer;
_cont      integer;

lsh        record;
_saida     boolean DEFAULT false;


BEGIN
-- Desabilita triggers para agilizar o processo
ALTER TABLE tbfila DISABLE TRIGGER ALL;

--seleciona todos os registros da fila diferentes de 'SEM PRÉ-REQUISITOS'
FOR lsh IN SELECT f.id_fila, f.matricula, o.cod_disciplina FROM tbfila as f
        JOIN tboferta as o USING (id_oferta)
        WHERE 
	-- situação indefinida
	f.id_situacao = 0 
	AND o.id_periodo=Aid_periodo
        ORDER BY f.id_fila DESC 
LOOP

        -- Se a disciplina tiver pré-req. e o aluno NÃo cursou-as, muda situação
        IF NOT ( checa_prerequisitos(lsh.cod_disciplina,lsh.matricula) ) THEN
                _saida = true;
                UPDATE tbfila SET id_situacao=2 WHERE id_fila=lsh.id_fila;
        END IF;

END LOOP;

-- Habilita triggers
ALTER TABLE tbfila ENABLE TRIGGER ALL;

RETURN _saida;
END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_prerequisitos(integer) OWNER TO postgres;
