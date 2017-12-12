create TABLE tbaluno_racacor
(
  id_raca serial NOT NULL,
  descricao character varying(25),
  CONSTRAINT tbaluno_racacor_pk PRIMARY KEY (id_raca)
)
INHERITS (tblog)
WITH (
  OIDS=TRUE
);

ALTER TABLE tbaluno_racacor OWNER TO postgres;

ALTER TABLE tbaluno ADD COLUMN id_raca integer;

ALTER TABLE tbaluno
  ADD CONSTRAINT tbaluno_id_raca_fk FOREIGN KEY (id_raca)
      REFERENCES tbaluno_racacor (id_raca) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

