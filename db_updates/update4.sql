-- Function: tbhistorico_null2zero()

-- DROP FUNCTION tbhistorico_null2zero();

CREATE OR REPLACE FUNCTION tbhistorico_null2zero()
  RETURNS trigger AS
$BODY$
BEGIN

IF (NEW.faltas IS NULL )
THEN
	NEW.faltas = 0;
END IF;
IF (NEW.media IS NULL )
THEN
	NEW.media = 0;
END IF;

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION tbhistorico_null2zero() OWNER TO postgres;
COMMENT ON FUNCTION tbhistorico_null2zero() IS 'Troca valores nulos por zero no historico';