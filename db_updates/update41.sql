-- remove funções ja não mais utilizada.
DROP FUNCTION set_aceitos(integer);
DROP FUNCTION set_aceitos_oferta(integer);

-- Permuta do periodo para processamento separado das turmas CAL, previsto para dia 18.
update tboferta set id_periodo = 203 where id_periodo = 196 and turma like 'CAL%';