-- Function: set_aceitos_oferta(integer)

-- DROP FUNCTION set_aceitos_oferta(integer);

CREATE OR REPLACE FUNCTION set_aceitos_oferta(integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_oferta	alias for $1;
lsf		record;
_vagas		integer;
_saida		boolean DEFAULT false;

BEGIN

SELECT INTO _vagas
            vagas
        FROM tboferta
        WHERE id_oferta = Aid_oferta;

FOR lsf IN SELECT id_fila,matricula FROM tbfila WHERE id_situacao = 0 AND id_oferta = Aid_oferta
                ORDER BY formando DESC, reprovacoes, pontos DESC
LOOP

                _saida = true;

	IF(checa_disc_duplicada(Aid_oferta,lsf.matricula)) THEN
	
	--duplicada
	UPDATE tbfila SET id_situacao = 7 WHERE id_fila=lsf.id_fila;

	ELSE

                IF ( _vagas <= 0 ) THEN

		-- turma lotada
		UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;

                ELSE
                
		-- aceito na turma
		UPDATE tbfila SET id_situacao = 1 WHERE id_fila=lsf.id_fila;
		_vagas = _vagas - 1;

                END IF;
	END IF;

END LOOP;

RETURN _saida;

END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_aceitos_oferta(integer) OWNER TO postgres;
COMMENT ON FUNCTION set_aceitos_oferta(integer) IS 'Define como ACEITO as solicitações da oferta na fila, ordenando se for formando, por pontos, reprovações';

-- Function: set_aceitos_oferta(integer, integer)

-- DROP FUNCTION set_aceitos_oferta(integer, integer);

CREATE OR REPLACE FUNCTION set_aceitos_oferta(integer, integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_oferta	alias for $1;
Afase		alias for $2;
lsf		record;
ls_oferta	record;
_vagas		integer;
_saida		boolean DEFAULT false;
_matriculados   integer;
_turma 	        character varying;
BEGIN

SELECT INTO ls_oferta vagas,turma,id_periodo from tboferta where id_oferta = Aid_oferta;
SELECT INTO _matriculados count(id_fila) from tbfila where id_situacao = 1 and id_oferta = Aid_oferta;

_vagas = ls_oferta.vagas - _matriculados;

FOR lsf IN SELECT id_fila,matricula FROM tbfila WHERE tbfila.id_situacao = 0 AND id_oferta = Aid_oferta
                ORDER BY formando DESC, reprovacoes, pontos DESC
LOOP

                _saida = true;

	IF(checa_disc_duplicada(Aid_oferta,lsf.matricula)) THEN

	--duplicada
	UPDATE tbfila SET id_situacao = 7 WHERE id_fila=lsf.id_fila;

	ELSE

                IF ( _vagas <= 0 ) THEN

		-- turma lotada
		UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;

                ELSE
			-- se for para oferta de calouros
		       	IF ( ls_oferta.turma like 'CAL%') THEN
			        --fase 1 para CAL
				IF(Afase = 1)	then
				  -- se não é calouro marca como turma lotada na fase 1
			             IF (checa_calouro(lsf.matricula,ls_oferta.id_periodo) = false) THEN
					-- set turma lotada
					UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;
				     ELSE
				        -- caso seja calouro fica aceito
				     	UPDATE tbfila SET id_situacao = 1 WHERE id_fila=lsf.id_fila;
				     	_vagas = _vagas - 1;
				     END IF;
				ELSE
				--fase 2 para CAL
					 IF ( _vagas = 0 ) THEN
					 -- SE nao tem vagas marca como turma lotada
					    UPDATE tbfila SET id_situacao = 5 WHERE id_fila=lsf.id_fila;
					 ELSE
					 -- marca como aceito
					    UPDATE tbfila SET id_situacao = 1 WHERE id_fila=lsf.id_fila;
					    _vagas = _vagas - 1;
					 END IF;
				END IF;
			-- fim processo de oferta para calouros
			ELSE
			--caso não seja oferta de calouros  e tenha vaga
				UPDATE tbfila SET id_situacao = 1 WHERE id_fila=lsf.id_fila;
                                _vagas = _vagas - 1;
			END IF;
                END IF;

	END IF;

END LOOP;

RETURN _saida;

END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_aceitos_oferta(integer, integer) OWNER TO george;
