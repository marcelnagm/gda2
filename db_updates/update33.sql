--Removendo as funções antigas que usavam integer como matricula.
-- 

BEGIN ;
DROP FUNCTION carater_desc(character varying, integer);
----------------------------------------------------------------------------------

DROP FUNCTION checa_calouro(integer, integer);
 

--------------------------------------------------------------------
DROP FUNCTION checa_disc_cursada(character varying, integer);
 
------------------------------------------------------

DROP FUNCTION checa_disc_duplicada(integer, integer);
  
-----------------------------------------------------------------

DROP FUNCTION checa_excesso_ch_eletiva(character varying, integer);
  

-------------------------------------------------------------------------

DROP FUNCTION checa_periodo_disc(character varying, integer);
  

-------------------------------------------------------------------

DROP FUNCTION checa_prerequisitos(character varying, integer);
 

------------------------------------------------------------

DROP FUNCTION get_ch_eletiva(integer, integer);
 
-----------------------------------------------------------------------

DROP FUNCTION get_disciplina_equivalente(character varying, integer);
 
-------------------------------------------------------

DROP FUNCTION get_disciplinas_a_cursar(integer, integer, boolean);
  
-------------------------------------------------
DROP FUNCTION get_fila_periodos(integer, integer, integer);
  
-------------------------------------------------------------------

DROP FUNCTION get_id_carater(character varying, integer);
  
---------------------------------------------------------------

DROP FUNCTION lista_prerequisitos(character varying, integer);
  

-----------------------------------------------------

DROP FUNCTION porcentagem_ch_cursada(integer);
 

----------------------------------------------------------------------------------

DROP FUNCTION versaocursoaluno(integer);
 

COMMIT ;
