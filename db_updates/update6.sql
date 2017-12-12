
--Este periodo é o periodo do cadastramento dos alunos no sistema do derca
ALTER TABLE tbperiodo ADD COLUMN dt_inicio_cadastro date;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_cadastro date;

--Este periodo é o periodo do cadastramento das ofertas pelos coordenadores no sistema do DERCA
ALTER TABLE tbperiodo ADD COLUMN dt_inicio_oferta_cadastro date;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_oferta_cadastro date;

