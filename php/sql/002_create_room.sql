USE room_generator_db;

CREATE TABLE rooms(
	room_id int(11) auto_increment primary key,
	name varchar(64) not null,
	session_id varchar(40) not null,
	public tinyint(1) default 0
)ENGINE=INNODB;
