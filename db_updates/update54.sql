ALTER TABLE tbcoordenadorcurso SET WITH OIDS;
ALTER TABLE tbcoordenadorcurso ADD COLUMN usuario character varying(20) DEFAULT "current_user"();
ALTER TABLE tbcoordenadorcurso ADD COLUMN datahora timestamp without time zone DEFAULT (now())::timestamp without time zone;
ALTER TABLE tbcoordenadorcurso ADD COLUMN ip character varying(32);
ALTER TABLE tbcoordenadorcurso ADD COLUMN created_at timestamp without time zone;
ALTER TABLE tbcoordenadorcurso ADD COLUMN updated_at timestamp without time zone;
ALTER TABLE tbcoordenadorcurso ADD COLUMN created_by character varying(20);
ALTER TABLE tbcoordenadorcurso ADD COLUMN updated_by character varying(20);
ALTER TABLE tbcoordenadorcurso INHERIT tblog;