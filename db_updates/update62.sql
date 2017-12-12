-- acrescentar camp sigla compativel com pingifes
ALTER TABLE tbaluno_racacor ADD COLUMN sigla character varying(2);
COMMENT ON COLUMN tbaluno_racacor.sigla IS 'Sigla definida para o PINGIFES';

ALTER TABLE tbtipoingresso ADD COLUMN sigla character varying(2);
COMMENT ON COLUMN tbtipoingresso.sigla IS 'Sigla da forma de ingresso, compativel com o PINGIFES';
