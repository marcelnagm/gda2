--- Correção de função que mostra os aceitos da fila eletronica
---
CREATE OR REPLACE FUNCTION set_aceitos_oferta(integer, integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_oferta	alias for $1;
Afase		alias for $2;
lsf		record;
ls_oferta	record;
_vagas		integer;
_saida		boolean DEFAULT false;
_turma 	        character varying;
BEGIN

SELECT INTO ls_oferta vagas,turma,id_periodo from tboferta where id_oferta = Aid_oferta;

FOR lsf IN SELECT id_fila,matricula FROM tbfila WHERE tbfila.id_situacao = 0 AND id_oferta = Aid_oferta
                ORDER BY formando DESC, reprovacoes, pontos DESC
LOOP

                _saida = true;

	IF(checa_disc_duplicada(Aid_oferta,lsf.matricula)) THEN

	--duplicada
	UPDATE tbfila SET id_situacao = 7 WHERE id_fila=lsf.id_fila;

	ELSE

                IF ( ls_oferta.vagas = 0 ) THEN

		-- turma lotada
		UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;

                ELSE
			IF ( ls_oferta.turma like 'CAL%' AND Afase = 1 AND checa_calouro(lsf.matricula,ls_oferta.id_periodo) = false) THEN

			-- turma lotada
			UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;

			ELSE
				IF ( ls_oferta.vagas > 0 ) THEN
				-- aceito na turma
                                    UPDATE tbfila SET id_situacao = 1 WHERE id_fila=lsf.id_fila;
                                    _vagas = _vagas - 1;
                                ELSE
                                    UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;
				END IF;
			END IF;

                END IF;
	END IF;

END LOOP;

RETURN _saida;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION set_aceitos_oferta(integer, integer) OWNER TO marcel;
