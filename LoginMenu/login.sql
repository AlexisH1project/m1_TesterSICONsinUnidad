create database formLogin;

CREATE TABLE usuarios (
 id INT(11) NOT NULL AUTO_INCREMENT,
	usuario varchar(50),
	contrasena varchar(50),
	PRIMARY KEY(id)
);

insert into usuarios values (1,"AlexisHdzG","12345"); 

select * from usuarios; 


