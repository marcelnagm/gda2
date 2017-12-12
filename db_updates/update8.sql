begin;
SELECT set_cod_disciplina('AGR031','AGR99');
SELECT set_cod_disciplina('AGR039','AGR031');
SELECT set_cod_disciplina('AGR061','AGR039');
SELECT set_cod_disciplina('AGR99','AGR061');

commit;