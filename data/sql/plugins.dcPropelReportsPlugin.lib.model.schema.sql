
-----------------------------------------------------------------------------
-- dc_report_query
-----------------------------------------------------------------------------

DROP TABLE "dc_report_query" CASCADE;


CREATE TABLE "dc_report_query"
(
	"id" serial  NOT NULL,
	"name" VARCHAR(100)  NOT NULL,
	"description" TEXT,
	"database" VARCHAR(100)  NOT NULL,
	"is_published" BOOLEAN default 'f',
	PRIMARY KEY ("id"),
	CONSTRAINT "dc_report_query_U_1" UNIQUE ("name")
);

COMMENT ON TABLE "dc_report_query" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_table
-----------------------------------------------------------------------------

DROP TABLE "dc_report_table" CASCADE;


CREATE TABLE "dc_report_table"
(
	"id" serial  NOT NULL,
	"propel_name" VARCHAR(255)  NOT NULL,
	"alias" VARCHAR(255)  NOT NULL,
	"dc_report_query_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id"),
	CONSTRAINT "unique_table" UNIQUE ("dc_report_query_id","alias")
);

COMMENT ON TABLE "dc_report_table" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_relation
-----------------------------------------------------------------------------

DROP TABLE "dc_report_relation" CASCADE;


CREATE TABLE "dc_report_relation"
(
	"id" serial  NOT NULL,
	"dc_report_table_left" INTEGER  NOT NULL,
	"dc_report_table_right" INTEGER  NOT NULL,
	"column_right" VARCHAR(255)  NOT NULL,
	"column_left" VARCHAR(255)  NOT NULL,
	"join_type" INTEGER,
	"dc_report_query_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dc_report_relation" IS '';


COMMENT ON COLUMN "dc_report_relation"."join_type" IS 'class specified';

SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_field
-----------------------------------------------------------------------------

DROP TABLE "dc_report_field" CASCADE;


CREATE TABLE "dc_report_field"
(
	"id" serial  NOT NULL,
	"dc_report_table_id" INTEGER,
	"column" VARCHAR(255)  NOT NULL,
	"alias" VARCHAR(255),
	"group_selector" BOOLEAN default 'f' NOT NULL,
	"handler" INTEGER default 0 NOT NULL,
	"dc_report_query_id" INTEGER,
	"show_name" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dc_report_field" IS '';


COMMENT ON COLUMN "dc_report_field"."group_selector" IS 'is this field used for group by';

COMMENT ON COLUMN "dc_report_field"."handler" IS 'handler to apply on field NONE (0), MAX, SUM,';

SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_criteria
-----------------------------------------------------------------------------

DROP TABLE "dc_report_criteria" CASCADE;


CREATE TABLE "dc_report_criteria"
(
	"id" serial  NOT NULL,
	"dc_report_table_id" INTEGER  NOT NULL,
	"column" VARCHAR(255)  NOT NULL,
	"operation" INTEGER default 0 NOT NULL,
	"value" TEXT,
	"dc_report_group_criteria_id" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dc_report_criteria" IS '';


COMMENT ON COLUMN "dc_report_criteria"."operation" IS 'operation to apply on field: EQUAL, NOT EQUAL,';

COMMENT ON COLUMN "dc_report_criteria"."value" IS 'value to apply on field on operation';

SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_group_criteria
-----------------------------------------------------------------------------

DROP TABLE "dc_report_group_criteria" CASCADE;


CREATE TABLE "dc_report_group_criteria"
(
	"id" serial  NOT NULL,
	"dc_report_query_id" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dc_report_group_criteria" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- dc_report_filter
-----------------------------------------------------------------------------

DROP TABLE "dc_report_filter" CASCADE;


CREATE TABLE "dc_report_filter"
(
	"dc_report_query_id" INTEGER  NOT NULL,
	"dc_report_field_id" INTEGER  NOT NULL,
	"name" VARCHAR(100)  NOT NULL,
	"filter_type" INTEGER default 0 NOT NULL,
	"database_table_name" VARCHAR(100),
	"id" serial  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dc_report_filter" IS '';


COMMENT ON COLUMN "dc_report_filter"."name" IS 'Name to display en query render';

COMMENT ON COLUMN "dc_report_filter"."filter_type" IS '0 string, 1 date range, 2 object from database, 3 number range';

COMMENT ON COLUMN "dc_report_filter"."database_table_name" IS 'only for filter type 2';

SET search_path TO public;
ALTER TABLE "dc_report_table" ADD CONSTRAINT "dc_report_table_FK_1" FOREIGN KEY ("dc_report_query_id") REFERENCES "dc_report_query" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_relation" ADD CONSTRAINT "dc_report_relation_FK_1" FOREIGN KEY ("dc_report_table_left") REFERENCES "dc_report_table" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_relation" ADD CONSTRAINT "dc_report_relation_FK_2" FOREIGN KEY ("dc_report_table_right") REFERENCES "dc_report_table" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_relation" ADD CONSTRAINT "dc_report_relation_FK_3" FOREIGN KEY ("dc_report_query_id") REFERENCES "dc_report_query" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_field" ADD CONSTRAINT "dc_report_field_FK_1" FOREIGN KEY ("dc_report_table_id") REFERENCES "dc_report_table" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_field" ADD CONSTRAINT "dc_report_field_FK_2" FOREIGN KEY ("dc_report_query_id") REFERENCES "dc_report_query" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_criteria" ADD CONSTRAINT "dc_report_criteria_FK_1" FOREIGN KEY ("dc_report_table_id") REFERENCES "dc_report_table" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_criteria" ADD CONSTRAINT "dc_report_criteria_FK_2" FOREIGN KEY ("dc_report_group_criteria_id") REFERENCES "dc_report_group_criteria" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_group_criteria" ADD CONSTRAINT "dc_report_group_criteria_FK_1" FOREIGN KEY ("dc_report_query_id") REFERENCES "dc_report_query" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_filter" ADD CONSTRAINT "dc_report_filter_FK_1" FOREIGN KEY ("dc_report_query_id") REFERENCES "dc_report_query" ("id") ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "dc_report_filter" ADD CONSTRAINT "dc_report_filter_FK_2" FOREIGN KEY ("dc_report_field_id") REFERENCES "dc_report_field" ("id") ON UPDATE CASCADE ON DELETE CASCADE;
