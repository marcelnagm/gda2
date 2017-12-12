---correção de um erro da fila eletronica na função choque de horário

DROP FUNCTION checa_chq_horario(integer, integer);
CREATE OR REPLACE FUNCTION checa_chq_horario(integer, bigint)
  RETURNS integer AS
$BODY$DECLARE
Aid_oferta	alias for $1;
Amatricula	alias for $2;
lsh		record;
--_horainicio	time;
--_horafim	time;
--_dia		integer;
_saida		integer DEFAULT 0;

BEGIN


FOR lsh IN SELECT h.id_oferta, h.dia, h.hora_inicio, h.hora_fim, o.id_periodo
                FROM tbofertahorario as h
                JOIN tboferta as o ON h.id_oferta=o.id_oferta
                WHERE o.id_oferta = Aid_oferta
LOOP

--        SELECT INTO _horainicio,_horafim,_dia
--                    hora_inicio, hora_fim, dia
        SELECT INTO _saida
                    o.id_oferta
                FROM tbofertahorario h, tboferta o, tbfila f
                WHERE o.id_oferta = h.id_oferta
                AND h.id_oferta   = f.id_oferta
                AND o.id_periodo  = lsh.id_periodo
		AND o.id_oferta   <> Aid_oferta
		AND f.id_situacao IN (0,1)
                AND matricula = Amatricula
		AND
                (       ( dia = lsh.dia )
                        AND

                            (
				( hora_inicio = lsh.hora_inicio AND hora_fim = lsh.hora_fim )
			      OR
                                ( hora_inicio > lsh.hora_inicio AND hora_inicio < lsh.hora_fim )
                              OR
                                ( hora_fim > lsh.hora_inicio    AND hora_fim    < lsh.hora_fim )
                            )
                );


        IF FOUND THEN
		--raise exception 'matricula: %,disciplinas: % e %, dia: %, hora_inicio %,lsh.hora_inicio: %, hora_fim: %, lsh.hora_fim: %',lsh.matricula,_cod_disc_,lsh.cod_disciplina,_dia,_horainicio,lsh.hora_inicio,_horafim,lsh.hora_fim;
                RETURN _saida;
        END IF;

END LOOP;

RETURN 0;

END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION checa_chq_horario(integer, bigint) OWNER TO postgres;