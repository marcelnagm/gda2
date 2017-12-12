-- alterações na tabela tbcursonivel e adicionado dois campos na tabela
--tbperiodo e tbcurso
--

begin;

DROP TABLE tbcursonivel cascade;
-- cria a tabela cursonivel

CREATE TABLE tbcursonivel
(
  id_nivel serial NOT NULL,
  descricao character varying(15),
  CONSTRAINT tbcursonivel_pkey PRIMARY KEY (id_nivel)
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);
ALTER TABLE tbcursonivel OWNER TO postgres;

-------------------------------------------
--Adiciona o campo nivel a tabela curso e cria sua fkey segundo os padrões do banco



ALTER TABLE tbcurso ADD COLUMN id_nivel integer;
ALTER TABLE tbcurso ALTER COLUMN id_nivel SET STORAGE PLAIN;


ALTER TABLE tbcurso
  ADD CONSTRAINT tbcurso_id_nivel_fkey FOREIGN KEY (id_nivel)
      REFERENCES tbcursonivel (id_nivel) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;
----------------------------------------------------------------
--Adiciona o campo nivel a tabela curso e cria sua fkey segundo os padrões do banco
ALTER TABLE tbperiodo ADD COLUMN id_nivel integer;
ALTER TABLE tbperiodo ALTER COLUMN id_nivel SET STORAGE PLAIN;

ALTER TABLE tbperiodo
  ADD CONSTRAINT tbperiodo_id_nivel_fkey FOREIGN KEY (id_nivel)
      REFERENCES tbcursonivel (id_nivel) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

commit;