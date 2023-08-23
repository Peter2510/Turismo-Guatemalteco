CREATE USER 'turismo_admin'@'localhost' IDENTIFIED BY 'phpturismo?';
CREATE DATABASE Turismo;
GRANT ALL PRIVILEGES ON turismo.* TO 'turismo_admin'@'localhost';
FLUSH PRIVILEGES;

USE turismo;

CREATE TABLE usuario(

    `nombre` VARCHAR(80) NOT NULL,
    `correo` VARCHAR(60) NOT NULL,
    `contrasenia` BLOB NOT NULL,
    `usuario` VARCHAR(80) NOT NULL,
    PRIMARY KEY(`correo`)
);


CREATE TABLE admin(
    `correo` VARCHAR(60) NOT NULL,
    `contrasenia` BLOB NOT NULL,
    `usuario` VARCHAR(80) NOT NULL,
    PRIMARY KEY(`correo`)

);

CREATE TABLE lugar(
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(80) NOT NULL,
    `departamento` VARCHAR(80) NOT NULL,
    `municipio` VARCHAR(80) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `foto` TEXT NOT NULL,
    PRIMARY KEY(`nombre`,`departamento`,`municipio`), INDEX(`id`)
);


INSERT INTO admin VALUES ("admin1@correo.com",AES_ENCRYPT("teo1", "cunocXela2023"),"goodAdmin");

INSERT INTO lugar VALUES(NULL,"Parque Arqueológico Zaculeu","Huehuetenango","Huehuetenango","Zaculeu es un sitio arqueológico precolombino que se encuentra en el altiplano occidental de Guatemala, específicamente en el departamento de Huehuetenango. <br/>Según la documentación, Zaculeu fue habitada durante el periodo Clásico Temprano y sus edificaciones evidencian la influencia de Teotihuacán.Este lugar tiene templos piramidales con escaleras dobles, una serie de plazas y un campo para el juego de pelota.<br/>El nombre original de la ciudad fue Chnabjul. Sin embargo, debido al color de sus edificaciones, luego fue nombrada como Zaculeu que significa Tierra Blanca.","zaculeu.jpg");

INSERT INTO lugar VALUES(NULL,"Lomas de Tarragona","Quetzaltenango","Quetzaltenango","En el departamento de Quetzaltenango existe un hermoso parque natural con muchas atracciones para convivir con la naturaleza y caminar entre amplios espacios al aire libre. <br/>Además, este parque busca crear espacios agradables para que los visitantes puedan salir de la rutina y en un ambiente de tranquilidad distraigan su mente.<br/>El visitante dispone de todos los servicios para su comodidad así como diversiones acordes con el concepto de naturaleza, piscinas de agua termal, canchas de césped natural, juegos infantiles campestres, áreas para picnic y amplios salones para celebraciones sociales de todo tipo.","lomasTarragona.jpg");

INSERT INTO lugar VALUES(NULL,"Parque Nacional de Tikal","Peten","Flores","Tikal se caracteriza por la monumentalidad de sus edificios, con una ocupación continua de 1,500 años (del 600 a.C. al 900 d.C.), época durante la cual ejerció un papel protagónico en la organización social y política de las tierras bajas. Tikal es uno de los máximos exponentes del estilo arquitectónico típico de las tierras bajas centrales mayas, mostrando exquisitos ejemplos de templos en forma de pirámides escalonadas tales como, el Gran Jaguar (Templo I), el Templo de las Máscaras (Templo II), el Templo de la Serpiente Bicéfala (Templo IV) y el Templo de las Inscripciones (Templo VI), así como plazas, conjuntos conmemorativos del Mundo Perdido, juegos de pelota, complejos de pirámides gemelas, una enorme colección de monumentos tallados y gran cantidad de sitios periféricos a su alrededor.  <br/><br/>El parque está cubierto por selva umbrófila primaria, con un dosel que se eleva hasta unos cincuenta metros. Los árboles más abundantes son la ceiba (Ceiba pentandra), árbol sagrado de los mayas, el cedro americano (Cedrela odorata), el chicozapote (Manilkara zapota), la caoba hondureña (Swietenia macrophylla), el palo de rosa (Tabebuia rosea), el ramón (Brosimum alicastrum), el hormigo (Platymiscium dimorphandrum), el árbol de Santa María (Calophyllum brasiliense), el yarumo (Cecropia peltata), el copal (Cupania belizensis), el cojón (Stemmadenia donnell-smithii), la palma de escoba (Cryosophila argentea) y la pimienta (Pimenta dioica).<br/><br/>En la actualidad, Tikal es uno de los destinos turísticos más importantes de Guatemala y uno de los sitios de mayor interés para los observadores de aves.","tikal.jpeg");

INSERT INTO lugar VALUES(NULL,"Lago de Atitlán","Peten","Flores","Es un lago con un espejo de agua de 130 km2, situado a 1562 metros sobre el nivel del mar en el departamento guatemalteco de Sololá. Su profundidad máxima es de 350 metros y los volcanes de más de 3000 m.s.n.m. que lo rodean (Atitlán, Tolimán y San Pedro) acrecientan la belleza e imponencia del paisaje.<br/><br/>No hay acuerdo sobre el origen de este lago sin desagüe visible, cuyo nombre nahua significa ?entre las aguas?. Algunos científicos opinan que es el cráter extinto de un antiguo volcán y otros señalan que se originó porque la actividad volcánica interrumpió el curso de los ríos, represando el agua.<br/><br/>Una leyenda indica que en el lugar del lago había una isla que fue asiento de una importante localidad maya durante el período Preclásico.<br/><br/>Es la principal reserva nacional de agua dulce y uno de los mejores lugares turísticos de Guatemala, con actividades como kayak, cruceros, ciclismo, caminatas, senderismo, montañismo, observación de la biodiversidad y observación cultural en los pueblos ribereños y cercanos.","lagoAtitlan.jpg");

INSERT INTO lugar VALUES(NULL,"Semuc Champey y Grutas de Lanquín","Alta Verapaz","Lanquín","Semuc Champey es un monumento natural y uno de los lugares más bellos de Guatemala, con el río Cahabón formando pozas que van del color jade al verde turquesa de acuerdo con la época del año y el clima.<br/><br/>Este espacio se halla en medio de una densa jungla tropical, en el municipio de Lanquín, departamento de Alta Verapaz, y es famoso por un puente natural de piedra, de 300 metros de longitud, por debajo del cual fluye el río, formando la escalera de preciosas pozas sobre el techo calizo.<br/><br/>Los bosques que rodean a Semuc Champey son una valiosa reserva de biodiversidad que incluye más de 120 especies de árboles, un centenar de aves y decenas de anfibios, reptiles y mamíferos. En las aguas han sido identificadas 10 especies de peces.<br/><br/>Las Grutas de Lanquín se encuentran en un parque nacional cercano a Semuc Champey y albergan curiosas formaciones de piedra caliza.","semucChampey.jpg");

INSERT INTO lugar VALUES(NULL,"Volcán Tajumulco","San Marcos","Tajumulco ","Es el volcán más alto del país, con su cumbre situada a 4222 m.s.n.m. Está situado en el municipio Tajumulco del departamento de San Marcos y se encuentra extinto. El área del volcán fue protegida en 1956 con una superficie de 4472 hectáreas.<br/><br/>Tiene dos picos y dos zonas para acampar, una situada casi en la cima del pico más alto y otra en un área entre las dos cumbres.<br/><br/>El pico menor está a 4100 m.s.n.m. y es llamado Cerro Concepción. El pico más alto tiene un cráter de 50 metros de diámetro y cuenta con una torre de triangulación colocada por el Instituto Geográfico Nacional.<br/>Las faldas del volcán Tajumulco son utilizadas para criar ganado lanar y cultivar papas y otros vegetales. Los bosques de encino, oyamel y coníferas proporcionan un bello marco de verdor a los ascensos.","volcanTajumulco.jpg");

INSERT INTO lugar VALUES(NULL,"Iglesia del Espíritu Santo","Quetzaltenango","Quetzaltenango ","La Catedral de Quetzaltenango se empezó a construir aproximadamente en mayo de 1532. Este templo fue fundado por los españoles luego de conquistar la Ciudad de Quetzaltenango y en honor al Espíritu Santo.<br/>La catedral sufrió deterioros con el pasar del tiempo y por los daños provocados  con los terremotos de 1765, hecho por el cual fue necesario hacer diversas restauraciones.<br/><br/>Nuevamente, con el terremoto de 1853 la estructura del templo tuvo daños irreparables, es por ese motivo que se realizó un acuerdo en el que se establecía que la catedral debía ser demolida, pero se debía conservar su antigua fachada.<br/><br/>La nueva catedral se construyó y el resultado fue la impresión de que hay dos iglesias unidas, pero en realidad es la fachada de la catedral antigua y la nueva construcción. En el año 1902 otro terremoto dañó la fachada antigua y se restauró nuevamente.","catedralXela.jpg");




