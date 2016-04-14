CREATE TABLE mensajesa
(
	id  int not null auto_increment,
	autor varchar(70) character set utf8 collate utf8_spanish_ci,
	sealed varchar(70) character set utf8 collate utf8_spanish_ci,
	envelope varchar(500) character set utf8 collate utf8_spanish_ci,
	fecha date,
	hora time,
	primary key (id)
);

create database chat;