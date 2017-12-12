
CREATE OR REPLACE FUNCTION set_cod_disciplina(varchar,varchar)
  RETURNS boolean AS
$BODY$DECLARE
Adisciplina_antiga alias for $1;
Adisciplina_nova alias for $2;

BEGIN


DELETE FROM tbdisciplina where cod_disciplina = 'TEMP01';

INSERT INTO tbdisciplina(
            cod_disciplina, 
            descricao,
             sucinto, 
             inicio, termino, 
             ch, ch_teorica, ch_pratica, 
             cred_pratico, cred_teorico,
             situacao,  id_situacao)
    VALUES ( 'TEMP01', 
            'TEMP01', 
            'TEMP01',
             NULL, NULL, 
             0, 0, 0, 
           0, 0,  'ATIVA', 1);


---------------altera discipliNa de Adisciplina_antiga -> Adisciplina_nova ---------------------

UPDATE tbhistorico SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tbdisciplinarequisitos SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tbdisciplinarequisitos SET cod_disc_requisito = 'TEMP01' where cod_disc_requisito = Adisciplina_antiga;
UPDATE tbcurriculodisciplinas SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tbgrade_equivalente SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tbdisciplina_ignorada SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tboferta SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;
UPDATE tbturma SET cod_disciplina = 'TEMP01' where cod_disciplina = Adisciplina_antiga;


--qual disciplina vai virar qual aqui    | correta|                      |Errada| 
UPDATE tbdisciplina SET cod_disciplina = Adisciplina_nova where cod_disciplina = Adisciplina_antiga;

UPDATE tbdisciplinarequisitos SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tbdisciplinarequisitos SET cod_disc_requisito = Adisciplina_nova where cod_disc_requisito = 'TEMP01';
UPDATE tbcurriculodisciplinas SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tbgrade_equivalente SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tbdisciplina_ignorada SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tboferta SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tbturma SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';
UPDATE tbhistorico SET cod_disciplina = Adisciplina_nova where cod_disciplina = 'TEMP01';


DELETE FROM tbdisciplina where cod_disciplina = 'TEMP01';

RETURN true;

END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION set_cod_disciplina(varchar,varchar) OWNER TO postgres;

