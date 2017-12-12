-- Function: checa_prerequisitos(character varying, integer)

-- DROP FUNCTION checa_prerequisitos(character varying, integer);

CREATE OR REPLACE FUNCTION checa_prerequisitos(character varying, integer)
  RETURNS boolean AS
$BODY$DECLARE
Acod_disc	alias for $1;
Amatricula	alias for $2;
_cod_disc_	varchar;
_cod_disc_equiv	varchar;
_idvcurso	integer DEFAULT versaocursoaluno(Amatricula);
_temPreReqVC	boolean DEFAULT false;
ls_req		record;

BEGIN
-- Verificar se o aluno já cursou a disciplina que é pré-requisito daquela que ele está pedindo.
-- Caso o aluno não possua algum dos pré-requisitos ele deve ser rejeitado por
-- FALTA DE PRÉ-REQUISITO

-- recupera disciplina equivalente
_cod_disc_equiv = get_disciplina_equivalente(Acod_disc, Amatricula);

FOR ls_req IN SELECT cod_disc_requisito FROM tbdisciplinarequisitos WHERE cod_disciplina IN (Acod_disc,_cod_disc_equiv) AND id_versao_curso=_idvcurso
LOOP
	_temPreReqVC = true;

	-- Se estiver NULL, e porque nao tem pre-requisito
	IF (ls_req.cod_disc_requisito IS NULL) THEN
		RETURN true;
	END IF;

        -- Se a disciplina tem pré-requisito e o aluno NÃO cursou-a, retorna false
        IF NOT ( checa_disc_cursada(ls_req.cod_disc_requisito,Amatricula) ) THEN
                RETURN false;
        END IF;

END LOOP;

IF NOT _temPreReqVC THEN

	-- verifica na lista de requisitos em qualquer versao de curso (indefinido)
	FOR ls_req IN SELECT cod_disc_requisito FROM tbdisciplinarequisitos WHERE cod_disciplina IN (Acod_disc,_cod_disc_equiv) AND id_versao_curso=0
	LOOP

		-- Se a disciplina tem pré-requisito e o aluno NÃO cursou-a, retorna false
		IF NOT ( checa_disc_cursada(ls_req.cod_disc_requisito,Amatricula) ) THEN
			RETURN false;
		END IF;

	END LOOP;
END IF;

-- Se a disciplina não tem pré-requisito ou o aluno cursou todos os pré-requisitos, retorna true
RETURN true;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_prerequisitos(character varying, integer) OWNER TO postgres;
COMMENT ON FUNCTION checa_prerequisitos(character varying, integer) IS 'Retorna true se  o aluno cursou todos os pré-requisitos ou se a disciplina não tem pré-requisito';

