--remoção das turmas de mestrado para recriar as turmas
delete from tbturma_aluno where id_turma in (select id_turma from tbturma as t,tboferta as o where t.id_oferta = o.id_oferta and o.id_periodo = 198);

delete from tbturma_professor where id_turma in (select id_turma from tbturma as t,tboferta as o where t.id_oferta = o.id_oferta and o.id_periodo = 198);

delete from tbturma where id_turma in (select id_turma from tbturma as t,tboferta as o where t.id_oferta = o.id_oferta and o.id_periodo = 198);