--- Reset da Fila eletronica
---

update tbfila set id_situacao = 0,pontos = NULL,reprovacoes = NULL,formando = NULL
where id_oferta in (SELECT id_oferta from tboferta where id_periodo = 196)