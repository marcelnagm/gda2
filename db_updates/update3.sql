--
-- sql que corrige a duplicação que existe do departamento "CCL - COORDENAÇÃO DO CURSO DE LETRAS"
--ids 21 e 34. A alteração passa todos os dados para o 21 e remove o 34
--

﻿begin;
update tboferta set id_setor = 21 where id_setor = 34;
update tbprofessor set id_setor = 21 where id_setor = 34;
update tbcursoversao set id_setor = 21 where id_setor = 34;
delete from tbsetor where id_setor = 34;
commit;