drop database directorio_seplan;

create database directorio_seplan;
use directorio_seplan;


create table perfil(
id_perfil int not null auto_increment,
nombre_perfil varchar(100),
constraint PK_idperfil primary key(id_perfil));

create table usuario(
id_usuario int not null auto_increment,
estatus int,
nombre_usuario varchar(100) not null,
apepat_usuario varchar(100) not null,
apemat_usuario varchar(100)not null,
correo_usuario longtext not null,
contrasenia varchar(100) not null,
id_perfil int,
constraint PK_idusuario primary key(id_usuario),
constraint FK_idperfil foreign key(id_perfil) references perfil(id_perfil));

create table sector(
id_sector int not null auto_increment,
estatus int,
nombre_sector varchar(100) not null,
constraint PK_idsector primary key(id_sector));

create table dependencia(
id_dependencia int not null auto_increment,
estatus int,
nombre_dependencia varchar(100) not null,
siglas_dependencia varchar(50)  not null,
calle_num varchar(100) not null,
cruzamientos varchar(100),
colonia varchar(100) not null,
cp varchar(10) not null,
referencias varchar(500),
estado varchar(100) not null,
municipio varchar(100) not null,
ciudad varchar(100) not null,
id_sector int,
constraint PK_iddependencia primary key(id_dependencia),
constraint FK_idsector foreign key(id_sector) references sector(id_sector));

create table tipo_enlace(
id_tipoenlace int not null auto_increment,
estatus int,
nombre_enlace varchar(100) not null,
constraint PK_idenlace primary key(id_tipoenlace));

create table persona(
id_persona int not null auto_increment,
estatus int,
cargo_persona varchar(100) not null,
titulo_persona varchar(100) not null,
nombre_persona varchar(100) not null,
apepat_persona varchar(100) not null,
apemat_persona varchar(100) not null,
correo_institucional varchar(100) not null,
correo_personal varchar(100),
tel_institucional varchar(50) not null,
tel_personal varchar(50),
fecha_nac date,
notas longtext,
id_dependencia int,
id_tipoenlace int,
constraint PK_idpersona primary key(id_persona),
constraint FK_idtipoenlace foreign key(id_tipoenlace) references tipo_enlace(id_tipoenlace),
constraint FK_idsector2 foreign key(id_dependencia) references dependencia(id_dependencia));


insert into sector(estatus,nombre_sector)values(1,'Publico');

insert into dependencia(estatus,nombre_dependencia,siglas_dependencia,calle_num,cruzamientos,colonia,cp,referencias,estado,municipio,ciudad,id_sector)
values(1,'Dependencia1','DPT','Calle 24 #10','x 11 y 16','Xcumpich','9700','Cerca del hotel Fiesta INN','Yucatan','Merida','Merida',1);

insert into dependencia(estatus,nombre_dependencia,siglas_dependencia,calle_num,cruzamientos,colonia,cp,referencias,estado,municipio,ciudad,id_sector)
values(1,'Dependencia2','DDD','Calle 36 #105',' 40 y 155','Mexico','97390','A la vuelta del centro','Yucatan','Merida','Merida',1);

insert into tipo_enlace(estatus,nombre_enlace) values(1,'Titular');
insert into tipo_enlace(estatus,nombre_enlace) values(1,'Enlace primario');
insert into tipo_enlace(estatus,nombre_enlace) values(1,'Enlace secundario');

insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Jefe','ING','Jose','Perez','Gonzales','Admin15@gmail.com','Ejemplo@gmail.com','9992581066','9991552266','20/02/1980','Esta es una nota',1,1);
insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Enlace1','ING','Eduardo','Garcia','Perez','enlaceeduardo@gmail.com','eduard66@gmail.com','9992581066','9991552266','20/02/1980','Esta es una nota',1,2);
insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Enlace2','LIC','Marcos','Canto','Lopez','enlace2@gmail.com','mark@gmail.com','9992581066','9991552266','20/02/1980','Esta es otra nota',1,3);

insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Jefe','ING','Mario','Sosa','Perez','adjefe.ejemplo@gmail.com','mariososa@gmail.com','9992581066','9991552266','20/02/1980','Esta es una nota',2,1);
insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Enlace primario','ING','Carlos','Zapata','Gordillo','secundario.ejemplo@gmail.com','charly@gmail.com','9992581066','9991552266','20/02/1980','Esta es una nota',2,2);
insert into persona(estatus,cargo_persona,titulo_persona,nombre_persona,apepat_persona,apemat_persona,correo_institucional,correo_personal,tel_institucional,tel_personal,fecha_nac,notas,id_dependencia,id_tipoenlace)
values(1,'Enlace secundario','LIC','Christopher','Menendez','Castillo','Ejemplo.algo@gmail.com','chris123458@gmail.com','9992581066','9991552266','20/02/1980','Esta es otra nota',2,3);

insert into perfil(nombre_perfil)values('Administrador');
insert into perfil(nombre_perfil)values('Usuario');

insert into usuario(estatus,nombre_usuario,apepat_usuario,apemat_usuario,correo_usuario,contrasenia,id_perfil)
values(1,'Jorge','Perez','Zavala','jorgeperez@gmail.com','eyJpdiI6IktBbzhtRlVlMVVySnhFdzlla0Y5c0E9PSIsInZhbHVlIjoiXC9TVm9sZ0xWVVZqS1M3Ujk5U0k5ZFE9PSIsIm1hYyI6IjJhZjAzZTUxZGQ4YzQ1MzNmYjA0YWRkYjM3NmJjZmEwMGM3OGNhNmFlOTdkZDM4Y2UyOTc5Yzc1OGRjYmY4ZjkifQ==',1);


select * from sector;
select * from dependencia;
select * from persona;
select * from perfil;
select * from usuario;

select s.nombre_sector,d.siglas_dependencia,d.nombre_dependencia
from sector s inner join dependencia d on s.id_sector = d.id_sector where d.estatus =1;

select p.* from persona p inner join dependencia d on p.id_dependencia = d.id_dependencia where p.id_dependencia = 1;

select * from persona inner join dependencia on persona.id_dependencia = dependencia.id_dependencia where dependencia.id_dependencia =1;
