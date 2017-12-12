-- alterações na tabela tbperiodo ,adicionado seis campos na tabela
-- necessários para estipulação de cada "subperiodo" do semestre
--

begin;

ALTER TABLE tbperiodo ADD COLUMN dt_inicio_oferta date;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_oferta date;
ALTER TABLE tbperiodo ADD COLUMN dt_inicio_fila date;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_fila date;
ALTER TABLE tbperiodo ADD COLUMN dt_inicio_resultado date;
ALTER TABLE tbperiodo ADD COLUMN dt_fim_resultado date;



commit;