CREATE USER 'turismo_admin'@'localhost' IDENTIFIED BY 'phpturismo?';
CREATE DATABASE Turismo;
GRANT ALL PRIVILEGES ON turismo.* TO 'turismo_admin'@'localhost';
FLUSH PRIVILEGES;

USE turismo;

CREATE TABLE usuario(

    `nombre` VARCHAR(80) NOT NULL,
    `correo` VARCHAR(60) NOT NULL,
    `contrasenia` VARCHAR(30) NOT NULL,
    `usuario` VARCHAR(80) NOT NULL,
    PRIMARY KEY(`correo`)
);


CREATE TABLE admin(
    `correo` VARCHAR(60) NOT NULL,
    `contrasenia` VARCHAR(30) NOT NULL,
    `usuario` VARCHAR(80) NOT NULL,
    PRIMARY KEY(`usuario`)

);

CREATE TABLE lugar(
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(80) NOT NULL,
    `departamento` VARCHAR(80) NOT NULL,
    `municipio` VARCHAR(80) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `foto` TEXT NOT NULL,
    PRIMARY KEY(`id`)
);


INSERT INTO admin VALUES ("admin1@correo.com", "teo1","admin01");

INSERT INTO usuario VALUES ("Pedro G", "user1@correo.com","teo1","user01");

SELECT usuario FROM admin WHERE usuario = 'admin01' AND contrasenia =  aes_decrypt("teo1","1234");


INSERT INTO lugar VALUES(NULL,"Parque Arqueológico Zaculeu","Huehuetenango","Huehuetenango","Zaculeu es un sitio arqueológico precolombino que se encuentra en el altiplano occidental de Guatemala, específicamente en el departamento de Huehuetenango. Según la documentación, Zaculeu fue habitada durante el periodo Clásico Temprano y sus edificaciones evidencian la influencia de Teotihuacán.Este lugar tiene templos piramidales con escaleras dobles, una serie de plazas y un campo para el juego de pelota.El nombre original de la ciudad fue Chnabjul. Sin embargo, debido al color de sus edificaciones, luego fue nombrada como Zaculeu que significa Tierra Blanca.","zaculeu.jpg");

INSERT INTO lugar VALUES(NULL,"Lomas de Tarragona","Quetzaltenango","Quetzaltenango","En el departamento de Quetzaltenango existe un hermoso parque natural con muchas atracciones para convivir con la naturaleza y caminar entre amplios espacios al aire libre. Además, este parque busca crear espacios agradables para que los visitantes puedan salir de la rutina y en un ambiente de tranquilidad distraigan su mente.","LomasTarragona.jpg");

