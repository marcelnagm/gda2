-- criacao de view para visualizar as siglas do pingifes por aluno

CREATE OR REPLACE VIEW vwsiglas_pingifes_aluno AS 
 SELECT ta.nome, ta.matricula, ta.id_situacao, ts.descricao AS situacao, ts.sigla_pingifes AS sigla_pingifes_situacao, ta.id_raca, trc.descricao AS raca, trc.sigla_pingifes AS sigla_pingifes_raca, ta.id_tipo_ingresso, tti.descricao AS tipo_ingresso, tti.sigla_pingifes AS sigla_pingifes_ingresso, tcv.descricao AS curso, tcv.cod_integracao AS cod_integracao_curso
   FROM tbaluno ta
   JOIN tbaluno_racacor trc USING (id_raca)
   JOIN tbalunosituacao ts USING (id_situacao)
   JOIN tbtipoingresso tti USING (id_tipo_ingresso)
   JOIN tbcursoversao tcv USING (id_versao_curso);

ALTER TABLE vwsiglas_pingifes_aluno OWNER TO postgres;
GRANT ALL ON TABLE vwsiglas_pingifes_aluno TO postgres;
GRANT SELECT ON TABLE vwsiglas_pingifes_aluno TO readonly_users;
