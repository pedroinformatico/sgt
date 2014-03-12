DROP DATABASE negocio;

CREATE DATABASE negocio;

USE negocio;

CREATE TABLE `cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(60) NOT NULL,
  `apellidos` VARCHAR(60) NULL,
  `run` VARCHAR(45) NOT NULL UNIQUE,
  `correo` VARCHAR(45) NULL,
  `calle` VARCHAR(100) NULL,
  `poblacion` VARCHAR(50) NULL,
  `depto` VARCHAR(5) NULL,
  `numeroDomicilio` VARCHAR(45) NULL,
  `telefonoCelular` VARCHAR(12) NULL,
  `telefonoFijo` VARCHAR(15) NULL,
  `idComuna` INT NULL,
  `fechaRegistro` DATETIME NULL,
  PRIMARY KEY (`idCliente`))
COMMENT = 'Tabla que contiene datos personales de un cliente';

CREATE TABLE `par_region` (
  `idRegion` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idRegion`));

CREATE TABLE `par_comuna` (
  `idComuna` INT NOT NULL AUTO_INCREMENT,
  `idRegion` INT NOT NULL, 
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idComuna`));
  
  CREATE TABLE `auto` (
  `idAuto` INT NOT NULL AUTO_INCREMENT,
  `marca` INT NULL,
  `modelo` VARCHAR(45) NULL,
  `patente` VARCHAR(8) NULL,
  `anio` INT NULL,
  `kilometraje` INT NULL,
  `vin` VARCHAR(45) NULL,
  PRIMARY KEY (`idAuto`))
COMMENT = 'Tabla que contiene los vehiculos asociados a un cliente';

CREATE TABLE `par_marca` (
  `idMarca` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idMarca`));
  
  
  
  CREATE TABLE `cliente_auto` (
  `idClienteAuto` INT NOT NULL AUTO_INCREMENT,
  `idAuto` INT NULL,
  `idCliente` INT NULL,
  PRIMARY KEY (`idClienteAuto`))
COMMENT = 'Tabla que relaciona los clientes con sus autos, un cliente puede tener m·s de un auto';


CREATE TABLE `nota` (
  `idNota` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NULL,
  `fechaNota` DATE NULL,
  `fechaRegistro` DATE NULL,
  PRIMARY KEY (`idNota`))
COMMENT = 'Tabla que contiene las notas o comentarios agregados en una ficha para registrar los cambios que se han realizado a un vehÌculo';

CREATE TABLE `visita` (
  `idVisita` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `idAuto` INT NOT NULL,
  `kilometraje` INT,
  `descripcion` varchar(200) NULL,  
  `fechaIngreso` DATETIME NULL, 
  `fechaRegistro` DATETIME NULL,
  `ot` VARCHAR(20) NULL,
  PRIMARY KEY (`idVisita`))
COMMENT = 'La tabla ficha guarda el id de cliente y e id del auto del cual est· relacionado, una ficha debe tener un ˙nico cliente y vehÌculo';


CREATE TABLE `visita_nota` (
  `idVisitaNota` INT NOT NULL AUTO_INCREMENT,
  `idVisita` INT NULL,
  `idNota` INT NULL,
  PRIMARY KEY (`idVisitaNota`))
COMMENT = 'relaciona las notas asociadas a una ficha, una ficha tener 0, o m·s notas.';



insert into par_marca (nombre) values ('Abarth');
insert into par_marca (nombre) values ('Alfa Romeo');
insert into par_marca (nombre) values ('Aro');
insert into par_marca (nombre) values ('Asia');
insert into par_marca (nombre) values ('Asia Motors');
insert into par_marca (nombre) values ('Aston Martin');
insert into par_marca (nombre) values ('Audi');
insert into par_marca (nombre) values ('Austin');
insert into par_marca (nombre) values ('Auverland');
insert into par_marca (nombre) values ('Bentley');
insert into par_marca (nombre) values ('Bertone');
insert into par_marca (nombre) values ('Bmw');
insert into par_marca (nombre) values ('Cadillac');
insert into par_marca (nombre) values ('Chevrolet');
insert into par_marca (nombre) values ('Chrysler');
insert into par_marca (nombre) values ('Citroen');
insert into par_marca (nombre) values ('Corvette');
insert into par_marca (nombre) values ('Dacia');
insert into par_marca (nombre) values ('Daewoo');
insert into par_marca (nombre) values ('Daf');
insert into par_marca (nombre) values ('Daihatsu');
insert into par_marca (nombre) values ('Daimler');
insert into par_marca (nombre) values ('Dodge');
insert into par_marca (nombre) values ('Ferrari');
insert into par_marca (nombre) values ('Fiat');
insert into par_marca (nombre) values ('Ford');
insert into par_marca (nombre) values ('Galloper');
insert into par_marca (nombre) values ('Gmc');
insert into par_marca (nombre) values ('Honda');
insert into par_marca (nombre) values ('Hummer');
insert into par_marca (nombre) values ('Hyundai');
insert into par_marca (nombre) values ('Infiniti');
insert into par_marca (nombre) values ('Innocenti');
insert into par_marca (nombre) values ('Isuzu');
insert into par_marca (nombre) values ('Iveco');
insert into par_marca (nombre) values ('Iveco-pegaso');
insert into par_marca (nombre) values ('Jaguar');
insert into par_marca (nombre) values ('Jeep');
insert into par_marca (nombre) values ('Kia');
insert into par_marca (nombre) values ('Lada');
insert into par_marca (nombre) values ('Lamborghini');
insert into par_marca (nombre) values ('Lancia');
insert into par_marca (nombre) values ('Land-rover');
insert into par_marca (nombre) values ('Ldv');
insert into par_marca (nombre) values ('Lexus');
insert into par_marca (nombre) values ('Lotus');
insert into par_marca (nombre) values ('Mahindra');
insert into par_marca (nombre) values ('Maserati');
insert into par_marca (nombre) values ('Maybach');
insert into par_marca (nombre) values ('Mazda');
insert into par_marca (nombre) values ('Mercedes-benz');
insert into par_marca (nombre) values ('Mg');
insert into par_marca (nombre) values ('Mini');
insert into par_marca (nombre) values ('Mitsubishi');
insert into par_marca (nombre) values ('Morgan');
insert into par_marca (nombre) values ('Nissan');
insert into par_marca (nombre) values ('Opel');
insert into par_marca (nombre) values ('Peugeot');
insert into par_marca (nombre) values ('Pontiac');
insert into par_marca (nombre) values ('Porsche');
insert into par_marca (nombre) values ('Renault');
insert into par_marca (nombre) values ('Rolls-royce');
insert into par_marca (nombre) values ('Rover');
insert into par_marca (nombre) values ('Saab');
insert into par_marca (nombre) values ('Santana');
insert into par_marca (nombre) values ('Seat');
insert into par_marca (nombre) values ('Skoda');
insert into par_marca (nombre) values ('Smart');
insert into par_marca (nombre) values ('Ssangyong');
insert into par_marca (nombre) values ('Subaru');
insert into par_marca (nombre) values ('Suzuki');
insert into par_marca (nombre) values ('Talbot');
insert into par_marca (nombre) values ('Tata');
insert into par_marca (nombre) values ('Toyota');
insert into par_marca (nombre) values ('Umm');
insert into par_marca (nombre) values ('Vaz');
insert into par_marca (nombre) values ('Volkswagen');
insert into par_marca (nombre) values ('Volvo');
insert into par_marca (nombre) values ('Wartburg');


INSERT INTO par_region (idREgion,nombre) VALUES (5,'Valparaiso');
INSERT INTO par_region (idREgion,nombre) VALUES (13,'Santiago');

INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Algarrobo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Cabildo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Calera');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Calle Larga');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Cartagena');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Casablanca');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Catemu');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Con-Con');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'El Quisco');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'El Tabo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Hijuelas');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Isla De Pascua');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Juan Fern·ndez');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'La Cruz');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'La Ligua');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Limache');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Llaillay');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Los Andes');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Nogales');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'OlmuÈ');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Panquehue');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Papudo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Petorca');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'PuchuncavÌ');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Putaendo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Quillota');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Quilpue');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Quintero');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Rinconada');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'San Antonio');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'San Esteban');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'San Felipe');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Santa Maria');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Santo Domingo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Valparaiso');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Villa Alemana');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'ViÒa Del Mar');
INSERT INTO par_comuna (idRegion,nombre) VALUES (5,'Zapallar');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'AlhuÈ');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Buin');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Calera De Tango');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Cerrillos');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Cerro Navia');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Colina');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'ConchalÌ');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'CuracavÌ');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'El Bosque');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'El Monte');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'EstaciÛn Central');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Huechuraba');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Independencia');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Isla De Maipo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'La Cisterna');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'La Florida');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'La Granja');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'La Pintana');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'La Reina');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Lampa');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Las Condes');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Lo Barnechea');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Lo Espejo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Lo Prado');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Macul');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Maipu');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Maria Pinto');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Melipilla');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'—uÒoa');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Padre Hurtado');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Paine');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Pedro Aguirre Cerda');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'PeÒaflor');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'PeÒalolÈn');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Pirque');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Providencia');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Pudahuel');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Puente Alto');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Quilicura');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Quinta Normal');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Recoleta');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Renca');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San Bernardo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San JoaquÌn');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San JosÈ De Maipo');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San Miguel');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San Pedro');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'San RamÛn');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Santiago');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Talagante');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Tiltil');
INSERT INTO par_comuna (idRegion,nombre) VALUES (13,'Vitacura');








