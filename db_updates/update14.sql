
-- cria a função que checa se o aluno é calouro
CREATE OR REPLACE FUNCTION checa_calouro(integer, integer)
  RETURNS boolean AS
$BODY$DECLARE
Amatricula	alias for $1;
Aid_periodo	alias for $2;
_fila integer;
_historico integer;

BEGIN

SELECT INTO _fila count(*) from tbfila,tboferta where tbfila.id_oferta = tboferta.id_oferta and matricula = Amatricula and id_periodo != Aid_periodo;

SELECT INTO _historico count(*) from tbhistorico where matricula = Amatricula ;

IF ( _fila > 0 ) AND (_historico >0) THEN
        return false;
ELSE
        return true;
END IF;
END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION checa_calouro(integer, integer) OWNER TO postgres;
COMMENT ON FUNCTION checa_calouro(integer, integer) IS 'Retorna true se o aluno é  calouro , sem filas e históricos';


--altera função pontos para colocar a pontuação maxima para calouros

DROP FUNCTION set_pontos(integer);

CREATE OR REPLACE FUNCTION set_pontos(integer)
  RETURNS boolean AS
$BODY$DECLARE
Aid_periodo alias for $1;
_media     float;
lsf        record;
_saida     boolean DEFAULT false;

BEGIN


-- Desabilita triggers para agilizar o processo
ALTER TABLE tbfila DISABLE TRIGGER ALL;


--IF ( set_media_geral() ) THEN

FOR lsf IN SELECT id_fila,matricula,id_carater,media_geral
	FROM tbfila as f
	JOIN tbaluno as a USING(matricula)
        JOIN tboferta as o USING (id_oferta)
        JOIN tbdisciplina as d ON (d.cod_disciplina=o.cod_disciplina)
	JOIN tbperiodo as p ON (o.id_periodo=p.id_periodo)
	LEFT JOIN tbcurriculodisciplinas as cd ON (cd.cod_disciplina = o.cod_disciplina AND cd.id_versao_curso = a.id_versao_curso)
	WHERE o.id_periodo=Aid_periodo
LOOP
	_saida = true;

        IF ( lsf.id_carater = 1 ) THEN
                _media = lsf.media_geral * 2;
        ELSE
                _media = lsf.media_geral;
        END IF;
--parte inserida
	if(checa_calouro(lsf.matricula,lsf.id_periodo)) then
		_media = 20;
	end if;


--fim da parte inserida



        UPDATE tbfila SET pontos = _media WHERE id_fila=lsf.id_fila;

END LOOP;


--END IF;

-- Habilita triggers
ALTER TABLE tbfila ENABLE TRIGGER ALL;

RETURN _saida;


END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_pontos(integer) OWNER TO postgres;
