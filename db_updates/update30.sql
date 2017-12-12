-- SQL que altera o tamanho do campo aluno de integer para bigint
-- o sql consiste em remover as views ,alterar o campo e adicionar as views de novo

BEGIN ;
DROP VIEW vwcurriculo;

DROP VIEW vwdeclaracaofila;

DROP VIEW vwfila_resultado;

DROP VIEW vwgeop;

DROP VIEW vwhistorico;

DROP VIEW vwhistorico_final_grad;

DROP VIEW vwhorario;

DROP VIEW vwlkoferta;

DROP VIEW vwoferta;

DROP VIEW vwresultadofila;

DROP VIEW vwsala;

ALTER table tbaluno ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbaluno_atual ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbalunodiploma ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbaluno_import ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbalunoperiodo ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbalunosenha ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbbanca ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbfila ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbfila_bkp ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbhistorico ALTER COLUMN matricula TYPE BIGINT;
ALTER table tbturma_aluno ALTER COLUMN matricula TYPE BIGINT;


CREATE OR REPLACE VIEW vwsala AS
 SELECT DISTINCT o.cod_disciplina, o.turma, d.sucinto AS disciplina, o.vagas, s.bloco, s.numero AS sala, p.ano, p.semestre, p.periodo, horarios_oferta_desc(o.id_oferta, 1) AS segunda, horarios_oferta_desc(o.id_oferta, 2) AS terca, horarios_oferta_desc(o.id_oferta, 3) AS quarta, horarios_oferta_desc(o.id_oferta, 4) AS quinta, horarios_oferta_desc(o.id_oferta, 5) AS sexta, horarios_oferta_desc(o.id_oferta, 6) AS sabado
   FROM tbfila f
   JOIN tboferta o USING (id_oferta)
   JOIN tbperiodo p USING (id_periodo)
   JOIN tbdisciplina d USING (cod_disciplina)
   JOIN tbcurso c USING (cod_curso)
   LEFT JOIN tbcurriculodisciplinas cd ON cd.cod_disciplina::text = o.cod_disciplina::text
   LEFT JOIN tbsala s USING (id_sala)
   JOIN tbfilasituacao fs ON f.id_situacao = fs.id_situacao
  ORDER BY horarios_oferta_desc(o.id_oferta, 1), horarios_oferta_desc(o.id_oferta, 2), horarios_oferta_desc(o.id_oferta, 3), horarios_oferta_desc(o.id_oferta, 4), horarios_oferta_desc(o.id_oferta, 5), horarios_oferta_desc(o.id_oferta, 6), o.cod_disciplina, o.turma, d.sucinto, o.vagas, s.bloco, s.numero, p.ano, p.semestre, p.periodo;

ALTER TABLE vwsala OWNER TO derca;
GRANT ALL ON TABLE vwsala TO derca;

CREATE OR REPLACE VIEW vwresultadofila AS
 SELECT f.id_fila, c.descricao AS curso, cv.descricao AS versao, fo.descricao AS formacao, ti.descricao AS ingresso, t.descricao AS turno, a.nome, f.matricula, a.cpf, a.dt_ingresso, o.cod_disciplina, o.turma, d.sucinto AS disciplina, d.ch, s.bloco, s.numero AS sala, f.id_situacao, p.dt_inicio, p.dt_fim, sit.descricao AS sit_aluno, p.ano, p.semestre, p.periodo, cv.prazo_max, cv.prazo_min, cv.ch_total AS ch_total_curso, horarios_oferta_desc(o.id_oferta, 1) AS segunda, horarios_oferta_desc(o.id_oferta, 2) AS terca, horarios_oferta_desc(o.id_oferta, 3) AS quarta, horarios_oferta_desc(o.id_oferta, 4) AS quinta, horarios_oferta_desc(o.id_oferta, 5) AS sexta, horarios_oferta_desc(o.id_oferta, 6) AS sabado, fs.sucinto AS situacao, a.ch_total AS ch_cursada
   FROM tbfila f
   JOIN tboferta o USING (id_oferta)
   JOIN tbperiodo p USING (id_periodo)
   JOIN tbdisciplina d USING (cod_disciplina)
   JOIN tbaluno a USING (matricula)
   JOIN tbcurso c USING (cod_curso)
   LEFT JOIN tbalunosituacao sit ON sit.id_situacao = a.id_situacao
   JOIN tbcursoversao cv ON c.cod_curso = cv.cod_curso
   LEFT JOIN tbformacao fo ON fo.id_formacao = cv.id_formacao
   LEFT JOIN tbturno t ON cv.id_turno = t.id_turno
   LEFT JOIN tbcurriculodisciplinas cd ON cd.cod_disciplina::text = o.cod_disciplina::text AND cd.id_versao_curso = a.id_versao_curso
   LEFT JOIN tbsala s USING (id_sala)
   LEFT JOIN tbtipoingresso ti ON ti.id_tipo_ingresso = a.id_tipo_ingresso
   JOIN tbfilasituacao fs ON f.id_situacao = fs.id_situacao
  WHERE cv.id_versao_curso = a.id_versao_curso AND f.matricula = 200811065 AND p.ano = 2008 AND p.semestre = 2
  ORDER BY o.cod_disciplina, o.turma;

ALTER TABLE vwresultadofila OWNER TO postgres;
GRANT ALL ON TABLE vwresultadofila TO postgres;
GRANT ALL ON TABLE vwresultadofila TO derca;
GRANT ALL ON TABLE vwresultadofila TO gda2;
GRANT ALL ON TABLE vwresultadofila TO professor;



CREATE OR REPLACE VIEW vwoferta AS
 SELECT DISTINCT o.id_oferta, o.cod_disciplina, o.turma, d.descricao AS disciplina, prof.nome, p.id_periodo, p.ano, p.semestre, s.bloco, s.numero, s.descricao AS sala
   FROM tboferta o, tbdisciplina d, tbperiodo p, tbsala s, tbprofessor prof
  WHERE prof.matricula_prof = o.id_matricula_prof AND s.id_sala = o.id_sala AND d.cod_disciplina::text = o.cod_disciplina::text AND o.id_periodo = p.id_periodo
  ORDER BY o.cod_disciplina, o.id_oferta, o.turma, d.descricao, prof.nome, p.id_periodo, p.ano, p.semestre, s.bloco, s.numero, s.descricao;

ALTER TABLE vwoferta OWNER TO postgres;
GRANT ALL ON TABLE vwoferta TO postgres;
GRANT ALL ON TABLE vwoferta TO derca;
GRANT ALL ON TABLE vwoferta TO gda2;
GRANT ALL ON TABLE vwoferta TO professor;



CREATE OR REPLACE VIEW vwlkoferta AS
 SELECT DISTINCT o.id_oferta, o.cod_disciplina, o.turma, d.descricao AS disciplina, prof.nome, p.ano, p.semestre, p.id_periodo
   FROM tboferta o, tbdisciplina d, tbperiodo p, tbprofessor prof
  WHERE prof.matricula_prof = o.id_matricula_prof AND d.cod_disciplina::text = o.cod_disciplina::text AND o.id_periodo = p.id_periodo
  ORDER BY o.id_oferta, o.cod_disciplina, o.turma, d.descricao, prof.nome, p.ano, p.semestre, p.id_periodo;

ALTER TABLE vwlkoferta OWNER TO postgres;
GRANT ALL ON TABLE vwlkoferta TO postgres;
GRANT ALL ON TABLE vwlkoferta TO derca;
GRANT ALL ON TABLE vwlkoferta TO gda2;
GRANT ALL ON TABLE vwlkoferta TO professor;


CREATE OR REPLACE VIEW vwhorario AS
 SELECT DISTINCT oh.id_horario, o.cod_disciplina, o.turma, d.descricao AS disciplina, p.ano, p.semestre, p.id_periodo, s.numero, horarios_oferta_desc(o.id_oferta, 1) AS segunda, horarios_oferta_desc(o.id_oferta, 2) AS terca, horarios_oferta_desc(o.id_oferta, 3) AS quarta, horarios_oferta_desc(o.id_oferta, 4) AS quinta, horarios_oferta_desc(o.id_oferta, 5) AS sexta, horarios_oferta_desc(o.id_oferta, 6) AS sabado
   FROM tboferta o, tbdisciplina d, tbofertahorario oh, tbperiodo p, tbsala s
  WHERE o.id_oferta = oh.id_oferta AND s.id_sala = o.id_sala AND d.cod_disciplina::text = o.cod_disciplina::text AND o.id_periodo = p.id_periodo
  ORDER BY o.cod_disciplina, oh.id_horario, o.turma, d.descricao, p.ano, p.semestre, p.id_periodo, s.numero, horarios_oferta_desc(o.id_oferta, 1), horarios_oferta_desc(o.id_oferta, 2), horarios_oferta_desc(o.id_oferta, 3), horarios_oferta_desc(o.id_oferta, 4), horarios_oferta_desc(o.id_oferta, 5), horarios_oferta_desc(o.id_oferta, 6);

ALTER TABLE vwhorario OWNER TO postgres;
GRANT ALL ON TABLE vwhorario TO postgres;
GRANT ALL ON TABLE vwhorario TO derca;
GRANT ALL ON TABLE vwhorario TO gda2;
GRANT ALL ON TABLE vwhorario TO professor;


CREATE OR REPLACE VIEW vwhistorico_final_grad AS
 SELECT h.matricula, a.nome, a.dt_nascimento, a.rg, a.rg_org_exped, a.cpf, a.titulo, a.titulo_zona, a.titulo_secao, a.pai, a.mae, a.dt_ingresso, i.descricao AS tipo_ingresso, f.descricao AS formacao, c.cod_curso, c.descricao AS curso, ext.descricao AS seg_grau, a.ano_concl_2grau AS conclusao, p.descricao AS periodo, d.cod_disciplina, d.descricao AS nome_disc, h.media, d.ch, d.cred_teorico + d.cred_pratico AS creditos, cc.sucinto AS conceito, cv.prazo_min, cv.prazo_max, cv.ch_obr, cv.ch_eletiva, cv.ch_total, ad.dt_enade, ad.obs
   FROM tbhistorico h, tbdisciplina d, tbperiodo p, tbconceito cc, tbaluno a, tbtipoingresso i, tbformacao f, tbcursoversao cv, tbcurso c, tbinstexterna ext, tbalunodiploma ad
  WHERE p.id_periodo = h.id_periodo AND a.matricula = h.matricula AND h.cod_disciplina::text = d.cod_disciplina::text AND h.id_conceito = cc.id_conceito AND a.id_tipo_ingresso = i.id_tipo_ingresso AND cv.id_formacao = f.id_formacao AND cv.cod_curso = c.cod_curso AND a.id_versao_curso = cv.id_versao_curso AND (h.id_conceito = 1 OR h.id_conceito = 6 OR h.id_conceito = 7 OR h.id_conceito = 8 OR h.id_conceito = 11 OR h.id_conceito = 13) AND a.id_2grau = ext.id_inst_externa AND a.matricula = ad.matricula
  ORDER BY p.descricao, d.cod_disciplina;

ALTER TABLE vwhistorico_final_grad OWNER TO postgres;
GRANT ALL ON TABLE vwhistorico_final_grad TO postgres;
GRANT ALL ON TABLE vwhistorico_final_grad TO derca;
GRANT ALL ON TABLE vwhistorico_final_grad TO gda2;
GRANT ALL ON TABLE vwhistorico_final_grad TO professor;

CREATE OR REPLACE VIEW vwhistorico AS
 SELECT h.id_historico, h.matricula, p.ano, p.semestre, p.periodo, d.cod_disciplina, d.descricao, h.media, h.faltas, d.ch, d.cred_teorico + d.cred_pratico AS creditos, cc.id_conceito, cc.sucinto AS conceito  FROM tbhistorico h
   JOIN tbdisciplina d USING (cod_disciplina)
   JOIN tbperiodo p USING (id_periodo)
   JOIN tbconceito cc USING (id_conceito)
   JOIN tbaluno a USING (matricula)
   LEFT JOIN tbcurriculodisciplinas cd ON a.id_versao_curso = cd.id_versao_curso AND h.cod_disciplina::text = cd.cod_disciplina::text
   LEFT JOIN tbcarater ct USING (id_carater)
  ORDER BY p.ano DESC, p.semestre DESC, p.periodo DESC, d.cod_disciplina;

ALTER TABLE vwhistorico OWNER TO postgres;
GRANT ALL ON TABLE vwhistorico TO postgres;
GRANT ALL ON TABLE vwhistorico TO derca;
GRANT ALL ON TABLE vwhistorico TO gda2;
GRANT ALL ON TABLE vwhistorico TO professor;


CREATE OR REPLACE VIEW vwgeop AS
 SELECT a.nome, a.dt_nascimento, c.descricao AS curso, a.matricula, a.dt_ingresso, a.pai, a.mae, a.rg, a.rg_org_exped, a.cpf, l.descricao AS logrouro, a.numero, a.cep, b.descricao AS bairro, a.celular, a.fone_residencial, a.email
   FROM tbaluno a, tbcidade ci, tbcurso c, tbcursoversao cv, tbpais p, tblogradouro l, tbbairro b
  WHERE a.id_versao_curso = cv.id_versao_curso AND c.cod_curso = cv.cod_curso AND a.naturalidade = ci.id_cidade AND a.nacionalidade = p.id_pais AND l.id_bairro = b.id_bairro AND a.id_situacao = 0 AND a.cep::bpchar = l.cep
  ORDER BY a.nome;


CREATE OR REPLACE VIEW vwfila_resultado AS
 SELECT f.id_fila, f.matricula, a.nome, o.cod_disciplina, o.turma, d.sucinto AS disciplina, d.ch, f.pontos, s.bloco, s.numero AS sala, horarios_desc(f.id_oferta) AS horarios_desc, f.id_situacao, fs.sucinto AS situacao, p.descricao AS periodo_desc, p.ano, p.semestre, p.periodo
   FROM tbfila f
   JOIN tboferta o USING (id_oferta)
   JOIN tbperiodo p USING (id_periodo)
   JOIN tbdisciplina d USING (cod_disciplina)
   JOIN tbaluno a USING (matricula)
   LEFT JOIN tbcurriculodisciplinas cd ON cd.cod_disciplina::text = o.cod_disciplina::text AND cd.id_versao_curso = a.id_versao_curso
   LEFT JOIN tbsala s USING (id_sala)
   JOIN tbfilasituacao fs ON f.id_situacao = fs.id_situacao
  ORDER BY f.id_situacao, o.cod_disciplina;

ALTER TABLE vwfila_resultado OWNER TO postgres;
GRANT ALL ON TABLE vwfila_resultado TO postgres;
GRANT ALL ON TABLE vwfila_resultado TO derca;
GRANT ALL ON TABLE vwfila_resultado TO gda2;
GRANT ALL ON TABLE vwfila_resultado TO professor;




CREATE OR REPLACE VIEW vwdeclaracaofila AS
 SELECT a.nome, a.matricula, a.cpf, a.dt_ingresso, c.descricao AS curso, ti.descricao AS ingresso, fo.descricao AS formacao, t.descricao AS turno, a.ch_obrig_cursada + a.ch_eletiva_cursada AS ch_cursada, a.ch_obrig_cursada, a.ch_eletiva_cursada, cv.prazo_min, cv.prazo_max, cv.ch_obr AS ch_obr_curso, cv.ch_eletiva AS ch_eletiva_curso, cv.ch_total AS ch_curso, p.ano, p.semestre, p.dt_inicio, p.dt_fim, f.id_fila, o.id_oferta, o.cod_disciplina, d.descricao, o.turma, si.descricao AS situacaoaluno, horarios_oferta_desc(o.id_oferta, 1) AS segunda, horarios_oferta_desc(o.id_oferta, 2) AS terca, horarios_oferta_desc(o.id_oferta, 3) AS quarta, horarios_oferta_desc(o.id_oferta, 4) AS quinta, horarios_oferta_desc(o.id_oferta, 5) AS sexta, horarios_oferta_desc(o.id_oferta, 6) AS sabado, fs.descricao AS situacao
   FROM tbfila f, tboferta o, tbdisciplina d, tbsala s, tbfilasituacao fs, tbaluno a, tbcursoversao cv, tbcurso c, tbformacao fo, tbtipoingresso ti, tbalunosituacao si, tbturno t, tbperiodo p
  WHERE f.id_oferta = o.id_oferta AND o.cod_disciplina::text = d.cod_disciplina::text AND a.matricula = f.matricula AND o.id_sala = s.id_sala AND f.id_situacao = fs.id_situacao AND a.id_versao_curso = cv.id_versao_curso AND c.cod_curso = cv.cod_curso AND a.id_tipo_ingresso = ti.id_tipo_ingresso AND cv.id_formacao = fo.id_formacao AND a.id_situacao = si.id_situacao AND cv.id_turno = t.id_turno AND o.id_periodo = p.id_periodo AND a.id_situacao = 0
  ORDER BY o.cod_disciplina, o.turma;

ALTER TABLE vwdeclaracaofila OWNER TO derca;
GRANT ALL ON TABLE vwdeclaracaofila TO derca;




CREATE OR REPLACE VIEW vwcurriculo AS
 SELECT c.cod_curso, cv.descricao AS versao_curso, d.cod_disciplina, d.descricao AS nome_disciplina, cd.semestre_disciplina AS periodo, d.ch_teorica, d.ch_pratica, d.ch AS ch_total_disc, ca.descricao AS carater, cv.prazo_max, cv.prazo_min, cv.ch_obr, cv.ch_eletiva, cv.ch_total, req.cod_disc_requisito AS requisito
   FROM tbdisciplina d, tbcarater ca, tbcurriculodisciplinas cd, tbcursoversao cv, tbcurso c, tbdisciplinarequisitos req
  WHERE d.cod_disciplina::text = cd.cod_disciplina::text AND cv.id_versao_curso = cd.id_versao_curso AND d.cod_disciplina::text = req.cod_disciplina::text AND cv.id_versao_curso = req.id_versao_curso AND cd.id_carater = ca.id_carater AND cv.cod_curso = c.cod_curso
  ORDER BY cd.semestre_disciplina, d.cod_disciplina, req.cod_disc_requisito;

  COMMIT ;