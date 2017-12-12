--- Update removendo periodo temporário 203 [periodo_temp] e passando todas ofertas para o periodo 196 [Graduação 2011.1.0] 
---

update tboferta set id_periodo = 196 where id_periodo = 203;
delete from tbperiodo where id_periodo = 203;
