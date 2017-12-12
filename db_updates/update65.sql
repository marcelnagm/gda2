-- inclusao e alteracao dos campos usados pelo pingifes
ALTER TABLE tbalunosituacao ADD COLUMN sigla_pingifes character varying(4);
COMMENT ON COLUMN tbalunosituacao.sigla_pingifes IS 'Sigla do conceito, compativel com o PINGIFES';

ALTER TABLE tbconceito RENAME sigla  TO sigla_pingifes;
ALTER TABLE tbaluno_racacor RENAME sigla TO sigla_pingifes;
ALTER TABLE tbtipoingresso RENAME sigla TO sigla_pingifes;
