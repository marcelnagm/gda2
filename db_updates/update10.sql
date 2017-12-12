
--Adiciona o campo cod_curso_destino que define para que curso se destina a oferta

ALTER TABLE tboferta ADD COLUMN cod_curso_destino integer;
ALTER TABLE tboferta ALTER COLUMN cod_curso_destino SET STORAGE PLAIN;

--Adiciona a fk do cod_curso_destino
ALTER TABLE tboferta
  ADD CONSTRAINT tboferta_cod_curso_destino_fkey FOREIGN KEY (cod_curso_destino)
      REFERENCES tbcurso (cod_curso) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;