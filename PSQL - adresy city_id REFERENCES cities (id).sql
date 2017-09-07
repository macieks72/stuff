create table adresy (
	id serial,
	firstname text,
	city_id  integer,
	PRIMARY KEY (id)
);

create table cities (
	id serial,
	cityname text,
	PRIMARY KEY (id)
);


select a.*, c.cityname from adresy a  join cities c on a.city_id = c.id;

alter table adresy drop column city_id;

alter table adresy ADD COLUMN city_id INTEGER REFERENCES cities (id);

