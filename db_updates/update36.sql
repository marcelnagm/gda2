--correção do calculo de ch eletiva

DROP FUNCTION get_ch_eletiva(bigint, integer);

CREATE OR REPLACE FUNCTION get_ch_eletiva(bigint, integer,boolean)
  RETURNS integer AS
$BODY$DECLARE
Amatricula alias for $1;
Aid_periodo alias for $2;
Afila alias for $3;
_ch_eletiva integer ;
_ch_eletiva_fila integer;
BEGIN


SELECT INTO  _ch_eletiva sum(B.ch) from(
SELECT A.matricula,A.cod_disciplina,A.ch,A.car,A.conceito from (
SELECT
  tbhistorico.matricula,
  tbdisciplina.cod_disciplina,
  tbdisciplina.ch, carater_desc(tbdisciplina.cod_disciplina,Amatricula) as car,tbhistorico.id_conceito AS conceito
FROM
  public.tbdisciplina,
  public.tbhistorico
WHERE
  tbdisciplina.cod_disciplina = tbhistorico.cod_disciplina AND
  tbdisciplina.situacao = 'ATIVA' AND matricula = Amatricula) As A where A.car = 'ELETIVA'
) as B where
B.conceito IN (1,4,6,7,8,11,13) GROUP BY B.matricula;

if(Afila) then

select INTO _ch_eletiva_fila sum(B.ch) from (
select A.ch from (
SELECT
  tbfila.matricula,
  tboferta.cod_disciplina,
  tbfila.id_situacao,carater_desc( tboferta.cod_disciplina,Amatricula) AS car,tbdisciplina.ch
FROM
  public.tbfila,
  public.tboferta,
  public.tbdisciplina
WHERE
  tbfila.id_oferta = tboferta.id_oferta AND tbdisciplina.cod_disciplina = tboferta.cod_disciplina AND
  tbfila.id_situacao = 1 and   tbfila.matricula = Amatricula and tboferta.id_periodo = Aid_periodo
  )AS A where A.car = 'ELETIVA'
  ) AS B;

end if;

if(_ch_eletiva_fila IS NULL) then
_ch_eletiva_fila  = 0;
end if;

if(  _ch_eletiva IS NULL) then
  _ch_eletiva  = 0;
end if;

return _ch_eletiva + _ch_eletiva_fila;

END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION get_ch_eletiva(bigint, integer,boolean) OWNER TO postgres;
