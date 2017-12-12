CREATE TABLE tbpolos (
id_polo serial primary key not null,
descricao varchar not null
) INHERITS (tblog)
WITH (OIDS = FALSE);

alter table tboferta add column id_polo integer default 0;
alter table tboferta add constraint fk_tbpolo foreign key (id_polo) references tbpolos(id_polo);

alter table tbfilacalouros add column created_at timestamp without time zone;
alter table tbfilacalouros add column updated_at timestamp without time zone;
alter table tbfilacalouros add column created_by character varying(20);
alter table tbfilacalouros add column updated_by character varying(20);

alter table tbvagas add column created_at timestamp without time zone;
alter table tbvagas add column updated_at timestamp without time zone;
alter table tbvagas add column created_by character varying(20);
alter table tbvagas add column updated_by character varying(20);

create table tbrestaurantesenha (
id serial primary key not null,
"login" varchar not null,
senha varchar not null
)inherits (tblog) with (oids = false);

insert into tbpolos(id_polo, descricao) values (0, 'Boa Vista - Paricarana');
insert into tbpolos(id_polo, descricao) values (1, 'Boa Vista - Murupú');
insert into tbpolos(id_polo, descricao) values (2, 'Alto Alegre');
insert into tbpolos(id_polo, descricao) values (3, 'Amajari');
insert into tbpolos(id_polo, descricao) values (4, 'São João da Baliza');
insert into tbpolos(id_polo, descricao) values (5, 'Rorainópolis');

alter table tbaluno add column id_polo integer default 0;
alter table tbaluno add constraint fk_tbpolo_tbaluno foreign key (id_polo) references tbpolos(id_polo);