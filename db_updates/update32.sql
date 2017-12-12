--alterações das funções trocando de integer para bigint
-- onde era utilizado a matricula

BEGIN ;
CREATE OR REPLACE FUNCTION carater_desc(character varying, bigint)
  RETURNS character varying AS
$BODY$DECLARE
Acod_disc	ALIAS FOR $1;
Amatricula	ALIAS FOR $2;
_saida		varchar;

BEGIN


SELECT INTO _saida descricao FROM tbcarater WHERE id_carater = get_id_carater(Acod_disc,Amatricula);


RETURN _saida;

END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION carater_desc(character varying, bigint) OWNER TO postgres;

----------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION checa_calouro(bigint, integer)
  RETURNS boolean AS
$BODY$DECLARE
Amatricula	alias for $1;
Aid_periodo	alias for $2;
_fila integer;
_historico integer;

BEGIN

SELECT INTO _fila count(*) from tbfila,tboferta where tbfila.id_oferta = tboferta.id_oferta and matricula = Amatricula and id_periodo != Aid_periodo;

SELECT INTO _historico count(*) from tbhistorico where matricula = Amatricula ;

IF ( _fila = 0 ) AND (_historico =0) THEN
        return true;
ELSE
        return false;
END IF;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_calouro(bigint, integer) OWNER TO postgres;
COMMENT ON FUNCTION checa_calouro(bigint, integer) IS 'Retorna true se o aluno é  calouro , sem filas e históricos';

--------------------------------------------------------------------
CREATE OR REPLACE FUNCTION checa_disc_cursada(character varying, bigint)
  RETURNS boolean AS
$BODY$DECLARE
Acod_disc  alias for $1;
Amatricula alias for $2;

BEGIN

IF NOT ( (SELECT count(*) FROM tbhistorico
      WHERE cod_disciplina=Acod_disc
      AND matricula=Amatricula
      AND id_conceito NOT IN (2,3,9,10,11,12,16)
      AND cod_disciplina NOT IN ('ST999')
      ) = 0
) THEN
        RETURN true;
END IF;

RETURN  false;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_disc_cursada(character varying, bigint) OWNER TO postgres;
COMMENT ON FUNCTION checa_disc_cursada(character varying, bigint) IS 'Retorna true se a disciplina já foi cursada';
------------------------------------------------------

CREATE OR REPLACE FUNCTION checa_disc_duplicada(integer, bigint)
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
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_disc_duplicada(integer, bigint) OWNER TO postgres;
COMMENT ON FUNCTION checa_disc_duplicada(integer, bigint) IS 'Retorna true se há disciplinas duplicadas';

-----------------------------------------------------------------

CREATE OR REPLACE FUNCTION checa_excesso_ch_eletiva(character varying, bigint)
  RETURNS boolean AS
$BODY$DECLARE
Acod_disc		alias for $1;
Amatricula		alias for $2;
_cod_disc		VARCHAR;
_ch_disc		integer;
_ch_eletiva_aluno	integer;
_ch_eletiva_curso	integer;
_disc_curr		integer;
BEGIN

-- verifica se ha disciplina equivalente
_cod_disc = get_disciplina_equivalente(Acod_disc, Amatricula);


-- CHECAR EXCESSO DE CH ELETIVA:

-- Pegar a ch eletiva do aluno
SELECT INTO _ch_eletiva_aluno ch_eletiva_cursada FROM tbaluno WHERE matricula=Amatricula;

-- Pegar a ch eletiva do curso
SELECT INTO _ch_eletiva_curso ch_eletiva FROM tbcursoversao WHERE id_versao_curso=versaocursoaluno(Amatricula);

-- Pegar a ch da disciplina
SELECT INTO _ch_disc ch FROM tbdisciplina WHERE cod_disciplina=_cod_disc;

SELECT INTO _disc_curr count(cod_disciplina) FROM tbcurriculodisciplinas WHERE cod_disciplina=_cod_disc AND id_versao_curso=versaocursoaluno(Amatricula);

-- Se a ch do aluno + ch da disciplina for menor ou igual a ch do curso + 40, o Excesso de ch é falso
-- Ou a disciplina pode estar na tbcurriculodisciplinas, então ela deve ser aceita, o Excesso de ch é falso
-- Ou então se estiver trancando o Semestre, o Excesso de ch é falso
IF (
        (_ch_eletiva_aluno + _ch_disc <= _ch_eletiva_curso + 40)
        OR
        (_disc_curr = 1)
	OR
	(_cod_disc = 'ST999')
) THEN

        RETURN false;

ELSE

        RETURN true;

END IF;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_excesso_ch_eletiva(character varying, bigint) OWNER TO postgres;
COMMENT ON FUNCTION checa_excesso_ch_eletiva(character varying, bigint) IS 'Teste de excesso de Carga Horária Eletiva';

-------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION checa_periodo_disc(character varying, bigint)
  RETURNS boolean AS
$BODY$DECLARE
Acod_disc	alias for $1;
Amatricula	alias for $2;
_periodo_aluno	integer;
_periodo_disc	integer;

BEGIN

SELECT INTO _periodo_aluno count(id_periodo) FROM tbhistorico WHERE matricula = Amatricula AND id_conceito NOT IN (2,3) GROUP BY id_periodo;


SELECT INTO _periodo_disc semestre_disciplina FROM tbcurriculodisciplinas WHERE cod_disciplina = Acod_disc AND id_versao_curso = versaocursoaluno(Amatricula);

IF NOT FOUND OR ( _periodo_aluno >= _periodo_disc ) THEN
        return true;
ELSE
        return false;
END IF;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_periodo_disc(character varying, bigint) OWNER TO postgres;
COMMENT ON FUNCTION checa_periodo_disc(character varying, bigint) IS 'Retorna true se a disciplina é do período';

-------------------------------------------------------------------

CREATE OR REPLACE FUNCTION checa_prerequisitos(character varying, bigint)
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
ALTER FUNCTION checa_prerequisitos(character varying, bigint) OWNER TO postgres;
COMMENT ON FUNCTION checa_prerequisitos(character varying, bigint) IS 'Retorna true se  o aluno cursou todos os pré-requisitos ou se a disciplina não tem pré-requisito';

------------------------------------------------------------

CREATE OR REPLACE FUNCTION get_ch_eletiva(bigint, integer)
  RETURNS integer AS
$BODY$DECLARE
Amatricula alias for $1;
Aid_periodo alias for $2;
_ch_eletiva integer ;
_ch_eletiva_fila integer;
BEGIN


SELECT INTO  _ch_eletiva sum(B.ch) from(
SELECT A.matricula,A.cod_disciplina,A.ch,A.car,A.conceito from (
SELECT
  tbhistorico.matricula,
  tbdisciplina.cod_disciplina,
  tbdisciplina.ch, carater_desc(tbdisciplina.cod_disciplina,Amatricula) as car,tbhistorico.id_conceito AS conceito
FROM
  public.tbdisciplina,
  public.tbhistorico
WHERE
  tbdisciplina.cod_disciplina = tbhistorico.cod_disciplina AND
  tbdisciplina.situacao = 'ATIVA' AND matricula = Amatricula) As A where A.car = 'ELETIVA'
) as B where
B.conceito IN (1,4,6,7,8,11,13) GROUP BY B.matricula;

select INTO _ch_eletiva_fila sum(B.ch) from (
select A.ch from (
SELECT
  tbfila.matricula,
  tboferta.cod_disciplina,
  tbfila.id_situacao,carater_desc( tboferta.cod_disciplina,Amatricula) AS car,tbdisciplina.ch
FROM
  public.tbfila,
  public.tboferta,
  public.tbdisciplina
WHERE
  tbfila.id_oferta = tboferta.id_oferta AND tbdisciplina.cod_disciplina = tboferta.cod_disciplina AND
  tbfila.id_situacao = 1 and   tbfila.matricula = Amatricula and tboferta.id_periodo = Aid_periodo
  )AS A where A.car = 'ELETIVA'
  ) AS B;

if(_ch_eletiva_fila IS NULL) then
_ch_eletiva_fila  = 0;
end if;

if(  _ch_eletiva IS NULL) then
  _ch_eletiva  = 0;
end if;

return _ch_eletiva + _ch_eletiva_fila;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_ch_eletiva(bigint, integer) OWNER TO postgres;

-----------------------------------------------------------------------

CREATE OR REPLACE FUNCTION get_disciplina_equivalente(character varying, bigint)
  RETURNS character varying AS
$BODY$DECLARE
Acod_disc  alias for $1;
Amatricula alias for $2;
_id_versao_curso INTEGER;
_cod_disc_equivalente VARCHAR;

BEGIN

_id_versao_curso = versaocursoaluno(Amatricula);

SELECT INTO _cod_disc_equivalente cd.cod_disciplina
FROM tbcurriculodisciplinas cd
JOIN tbgrade_equivalente ge USING (id_curriculo_disciplina)
WHERE ge.cod_disciplina = Acod_disc
AND cd.id_versao_curso = _id_versao_curso;

IF FOUND AND _cod_disc_equivalente IS NOT NULL THEN
	RETURN _cod_disc_equivalente;
END IF;

RETURN  Acod_disc;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_disciplina_equivalente(character varying, bigint) OWNER TO postgres;
COMMENT ON FUNCTION get_disciplina_equivalente(character varying, bigint) IS 'Retorna o codigo da disciplina equivalente na grade do aluno';
-------------------------------------------------------

CREATE OR REPLACE FUNCTION get_disciplinas_a_cursar(bigint, integer, boolean)
  RETURNS integer AS
$BODY$

DECLARE
Amatricula  alias for $1;
Aid_periodo alias for $2;
Afila       alias for $3;
_saida     integer;
_versao integer;

BEGIN

if(Afila) then
SELECT INTO _saida count(cod_disciplina) from tbcurriculodisciplinas where id_versao_curso = versaocursoaluno(Amatricula) and cod_disciplina NOT IN (select cod_disciplina from tbfila,tboferta where tbfila.id_oferta = tboferta.id_oferta and matricula=Amatricula and id_periodo = Aid_periodo and tbfila.id_situacao = 1 and tboferta.id_situacao = 1) AND cod_disciplina not in (select cod_disciplina from tbhistorico where matricula=Amatricula and id_conceito NOT IN (2,3,9,12,15,10)) and cod_disciplina not in(select cod_disciplina from tbdisciplina_ignorada);
else

SELECT INTO _saida count(cod_disciplina) from tbcurriculodisciplinas where id_versao_curso = versaocursoaluno(Amatricula) AND cod_disciplina not in (select cod_disciplina from tbhistorico where matricula=Amatricula and id_conceito NOT IN (2,3,9,12,15,10)) and cod_disciplina not in(select cod_disciplina from tbdisciplina_ignorada);

end if;


RETURN _saida;
END;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_disciplinas_a_cursar(bigint, integer, boolean) OWNER TO postgres;

-------------------------------------------------
CREATE OR REPLACE FUNCTION get_fila_periodos(integer, integer, bigint)
  RETURNS integer AS
$BODY$

DECLARE
Aid_periodo1 alias for $1;
Aid_periodo2 alias for $2;
Amatricula alias for $3;

DECLARE

_saida integer;

BEGIN

SELECT INTO _saida COUNT(tbfila.matricula) from tbfila where matricula = Amatricula AND id_oferta IN(SELECT tboferta.id_oferta from tboferta where id_periodo = Aid_periodo1 OR id_periodo = Aid_periodo2);



RETURN _saida;
END;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_fila_periodos(integer, integer, bigint) OWNER TO gda2_admin;
-------------------------------------------------------------------

CREATE OR REPLACE FUNCTION get_id_carater(character varying, bigint)
  RETURNS integer AS
$BODY$DECLARE
Acod_disc	ALIAS FOR $1;
Amatricula	ALIAS FOR $2;
_cod_disc	VARCHAR;
_saida		integer;

BEGIN

_cod_disc = get_disciplina_equivalente(Acod_disc,Amatricula);
--_cod_disc = Acod_disc;

SELECT INTO _saida id_carater
FROM tbcurriculodisciplinas cd, tbaluno a
WHERE cd.id_versao_curso = a.id_versao_curso
AND cod_disciplina = _cod_disc
AND matricula = Amatricula;

-- Se não encontrar, retorna 3 - ELETIVA
IF NOT FOUND THEN
     _saida = 3;
END IF;


RETURN _saida;

END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_id_carater(character varying, bigint) OWNER TO postgres;
---------------------------------------------------------------

CREATE OR REPLACE FUNCTION lista_prerequisitos(character varying, bigint)
  RETURNS character varying AS
$BODY$DECLARE
Acod_disc  ALIAS FOR $1;
Amatricula ALIAS FOR $2;
lsd	   record;
_saida	   varchar DEFAULT '';

BEGIN

FOR lsd IN SELECT cod_disc_requisito FROM tbdisciplinarequisitos
	   WHERE cod_disciplina = Acod_disc AND id_versao_curso = versaocursoaluno(Amatricula)
	   ORDER BY cod_disciplina
LOOP
	IF (_saida!='') THEN _saida = _saida || ', ';
	END IF;
	_saida = _saida || lsd.cod_disc_requisito;

END LOOP;

RETURN _saida;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION lista_prerequisitos(character varying, bigint) OWNER TO postgres;

-----------------------------------------------------

CREATE OR REPLACE FUNCTION porcentagem_ch_cursada(bigint)
  RETURNS integer AS
$BODY$DECLARE
Amatricula		alias for $1;
_ch_aluno	INTEGER;
_ch_curso	INTEGER;
_id_versao_curso	INTEGER;
_porcentagem	INTEGER;

BEGIN

_id_versao_curso = versaocursoaluno(Amatricula);

-- Pegar a ch do aluno
SELECT INTO _ch_aluno ch_eletiva_cursada+ch_obrig_cursada FROM tbaluno WHERE matricula=Amatricula;

-- Pegar a ch do curso
SELECT INTO _ch_curso ch_total FROM tbcursoversao WHERE id_versao_curso=_id_versao_curso;

IF (_ch_curso = 0) THEN
	RETURN 0;
END IF;

_porcentagem = (100 * _ch_aluno) / _ch_curso;


IF (_porcentagem > 100) THEN
	RETURN 100;
ELSE
	RETURN _porcentagem;
END IF;


END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION porcentagem_ch_cursada(bigint) OWNER TO postgres;
COMMENT ON FUNCTION porcentagem_ch_cursada(bigint) IS 'Porcentagem de horas cursadas do aluno';

----------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION versaocursoaluno(bigint)
  RETURNS integer AS
$BODY$DECLARE
Amatricula alias for $1;
_saida     integer;

BEGIN
SELECT INTO _saida
            id_versao_curso FROM tbaluno
            WHERE matricula=Amatricula;

RETURN _saida;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION versaocursoaluno(bigint) OWNER TO postgres;
COMMENT ON FUNCTION versaocursoaluno(bigint) IS 'Retorna a versão do curso do aluno';

COMMIT ;