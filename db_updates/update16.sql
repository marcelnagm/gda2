-- Function: checa_excesso_ch_eletiva(character varying, integer)

-- DROP FUNCTION checa_excesso_ch_eletiva(character varying, integer);

CREATE OR REPLACE FUNCTION checa_excesso_ch_eletiva(character varying, integer)
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
ALTER FUNCTION checa_excesso_ch_eletiva(character varying, integer) OWNER TO postgres;
COMMENT ON FUNCTION checa_excesso_ch_eletiva(character varying, integer) IS 'Teste de excesso de Carga Horária Eletiva';
