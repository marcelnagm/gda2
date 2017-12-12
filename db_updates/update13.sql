--adicionando as colunas relacionadas com a 2 fase da matricula

ALTER TABLE tbperiodo ADD COLUMN dt_inicio_ajuste_fila date;
ALTER TABLE tbperiodo ALTER COLUMN dt_inicio_ajuste_fila SET STORAGE PLAIN;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_ajuste_fila date;
ALTER TABLE tbperiodo ALTER COLUMN dt_inicio_ajuste_fila SET STORAGE PLAIN;

ALTER TABLE tbperiodo ADD COLUMN dt_inicio_ajuste_resultado date;
ALTER TABLE tbperiodo ALTER COLUMN dt_inicio_ajuste_resultado SET STORAGE PLAIN;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_ajuste_resultado date;
ALTER TABLE tbperiodo ALTER COLUMN dt_inicio_ajuste_resultado SET STORAGE PLAIN;
