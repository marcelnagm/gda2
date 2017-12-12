-- Table: censo2009
SELECT setval('public.censo2009_id_seq', 1, true);
TRUNCATE TABLE censo2009;
DROP TABLE censo2009;

CREATE TABLE censo2009
(
  aluno_c1 integer,
  aluno_c2 text,
  aluno_c3 text,
  aluno_c4_nome character varying,
  aluno_c5_cpf character varying(11),
  aluno_c6_doc_estrangeiro text,
  aluno_c7_nascimento text,
  aluno_c8_sexo integer,
  aluno_c9_cor_raca integer,
  aluno_c10_mae character varying,
  aluno_c11_nacionalidade integer,
  aluno_c12_uf_nascimento text,
  aluno_c13_cidade_nascimento text,
  aluno_c14_pais_origem text,
  aluno_c15_deficiencia integer,
  aluno_c16_def_cegueria text,
  aluno_c17_def_baixa_visao text,
  aluno_c18_def_surdez text,
  aluno_c19_def_auditiva text,
  aluno_c20_def_fisica text,
  aluno_c21_def_surdocegueira text,
  aluno_c22_def_multipla text,
  aluno_c23_def_mental text,
  curso_c1_tipo_reg2 integer,
  curso_c2_id_inep_curso text,
  curso_c3_cod_polo_inep text,
  curso_c4_turno_aluno text,
  curso_c5_situacao_vinculo integer,
  curso_c6_data_ingresso text,
  curso_c7_aluno_publica text,
  curso_c8_forma_ingresso_selecao_vestibular integer,
  curso_c9_forma_ingresso_selecao_enem integer,
  curso_c10_forma_ingresso_selecao_outros integer,
  curso_c11_forma_ingresso_selecao_pecg integer,
  curso_c12_forma_ingresso_outras integer,
  curso_c13_programa_reserva_vagas integer,
  curso_c14_programa_reserva_vagas integer,
  curso_c15_programa_reserva_vagas integer,
  curso_c16_programa_reserva_vagas integer,
  curso_c17_programa_reserva_vagas integer,
  curso_c18_programa_reserva_vagas integer,
  curso_c19_financiamento_estudantil integer,
  curso_c20_financiamento_estudantil integer,
  curso_c21_financiamento_estudantil integer,
  curso_c22_financiamento_estudantil integer,
  curso_c23_financiamento_estudantil integer,
  curso_c24_financiamento_estudantil integer,
  curso_c25_financiamento_estudantil integer,
  curso_c26_financiamento_estudantil_n_reemb integer,
  curso_c27_financiamento_estudantil_n_reemb integer,
  curso_c28_financiamento_estudantil_n_reemb integer,
  curso_c29_financiamento_estudantil_n_reemb integer,
  curso_c30_financiamento_estudantil_n_reemb integer,
  curso_c31_financiamento_estudantil_n_reemb integer,
  curso_c32_financiamento_estudantil_n_reemb integer,
  curso_c33_apoio_social integer,
  curso_c34_tipo_apoio_social integer,
  curso_c35_tipo_apoio_social integer,
  curso_c36_tipo_apoio_social integer,
  curso_c37_tipo_apoio_social integer,
  curso_c38_tipo_apoio_social integer,
  curso_c39_tipo_apoio_social integer,
  curso_c40_atividade_complementar integer,
  curso_c41_atividade_complementar integer,
  curso_c42_bolsa integer,
  curso_c43_atividade_complementar integer,
  curso_c44_bolsa integer,
  curso_c45_atividade_complementar integer,
  curso_c46_bolsa integer,
  curso_c47_atividade_complementar integer,
  curso_c48_bolsa integer,
  exportado boolean,
  id serial NOT NULL,
  CONSTRAINT censo2009_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE censo2009 OWNER TO consultor;
GRANT ALL ON TABLE censo2009 TO consultor;
