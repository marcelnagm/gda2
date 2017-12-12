-- inclusao de datas de situacao e ingresso; alteracao do nome da view

DROP VIEW vwsiglas_pingifes_aluno;

CREATE OR REPLACE VIEW vwpingifes_aluno_siglas AS 
 SELECT ta.nome, ta.matricula, ta.id_situacao, ts.descricao AS situacao, ts.sigla_pingifes AS sigla_pingifes_situacao, ta.dt_situacao AS data_situacao, ta.id_raca, trc.descricao AS raca, trc.sigla_pingifes AS sigla_pingifes_raca, ta.id_tipo_ingresso, tti.descricao AS tipo_ingresso, tti.sigla_pingifes AS sigla_pingifes_ingresso, ta.dt_ingresso AS data_ingresso, tcv.descricao AS curso, tcv.cod_integracao AS cod_integracao_curso
   FROM tbaluno ta
   JOIN tbaluno_racacor trc USING (id_raca)
   JOIN tbalunosituacao ts USING (id_situacao)
   JOIN tbtipoingresso tti USING (id_tipo_ingresso)
   JOIN tbcursoversao tcv USING (id_versao_curso);

ALTER TABLE vwpingifes_aluno_siglas OWNER TO postgres;
GRANT ALL ON TABLE vwpingifes_aluno_siglas TO postgres;
GRANT SELECT ON TABLE vwpingifes_aluno_siglas TO readonly_users;
