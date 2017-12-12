-- adicionando campo sigla para compatibilidade no pingifes
ALTER TABLE tbconceito ADD COLUMN sigla character varying(4);
COMMENT ON COLUMN tbconceito.sigla IS 'Sigla do conceito, compativel com o PINGIFES';
