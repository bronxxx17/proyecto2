CREATE DATABASE SENATIDB;

USE SENATIDB;

DROP DATABASE SENATIDB;



CREATE TABLE empleados
(
     idempleado     INT AUTO_INCREMENT PRIMARY KEY,
     idsede         INT ,
     apellidos      VARCHAR(30),
     nombres        VARCHAR(30),
     nrodocumento   CHAR(8),
     fechanac       DATE,
     telefono       CHAR(9),
	create_at		DATETIME			NOT NULL DEFAULT NOW(),
	inactive_at		DATETIME			NULL,
	update_at		DATETIME			NULL,
	CONSTRAINT fk_idsede_em FOREIGN KEY (idsede) REFERENCES sedes (idsede),
	CONSTRAINT uk_telefono_em UNIQUE (telefono),
    CONSTRAINT uk_nrodocumento_em UNIQUE (nrodocumento)
)
ENGINE = INNODB;

INSERT INTO empleados
	(idsede, apellidos, nombres, nrodocumento, fechanac, telefono)
	VALUES
		(1, 'Martinez', 'Marcos', '98765452', '2000-10-15', '963852741'),
        (2, 'Ceballos', 'Luis', '95123647', '1999-11-18 ', '951852456'),
        (3, 'Cerazo', 'Juan', '74185297', '2001-11-25', '963741456'),
        (4, 'Quispe', 'Ricardo', '87654321', '2002-11-20', '923654829'),
        (5, 'Paullac', 'Julio', '96345682', '2003-11-23', '999741852');

DROP TABLE 	empleados;

CREATE TABLE sedes
(   
         idsede         INT AUTO_INCREMENT PRIMARY KEY,
         sede           VARCHAR(30) NOT NULL,
         create_at		DATETIME			NOT NULL DEFAULT NOW(),
	     inactive_at	DATETIME			NULL,
	     update_at		DATETIME			NULL,
         CONSTRAINT uk_sede_se  UNIQUE (sede)
)
ENGINE = INNODB;

INSERT INTO sedes (sede)
	VALUES
		('LIMA'),
		('AYACUCHO'),
		('ICA '),
        ('CALLAO  '),
        ('AREQUIPA '),
        ('ABANCAY '),
        ('CAÑETE '),
        ('CASMA '),
        ('CERRO DE PASCO  '),
		('CHICLAYO'),
		('CHINCHA');
        


DELIMITER $$
CREATE PROCEDURE spu_empleados_buscar (IN _nrodocumento CHAR(8))
BEGIN
	SELECT
		SE.idsede,
        EM.apellidos,
        EM.nombres,
        EM.nrodocumento,
        EM.fechanac,
        EM.telefono
		FROM empleados EM
		INNER JOIN sedes SE ON SE.idsede = EM.idsede
		WHERE	(EM.inactive_at IS NULL)	AND
				(EM.nrodocumento = _nrodocumento);
END $$
CALL spu_empleados_buscar('98765452');
CALL spu_empleados_buscar();
select * from spu_empleados_buscar;
select * FROM empleados;
select * from sedes;


DELIMITER $$
CREATE PROCEDURE spu_empleados_registrar
(
	IN _idsede	   INT,
    IN _apellidos	   VARCHAR(80),
    IN _nombres		   VARCHAR(50),
    IN _nrodocumento   CHAR(8),
    IN _fechanac	   DATE,
    IN _telefono	   CHAR(9)

)
BEGIN
	INSERT INTO empleados
		(idsede, apellidos, nombres, nrodocumento, fechanac, telefono) VALUES
        (_idsede, _apellidos, _nombres, _nrodocumento, _fechanac, _telefono);
END $$

CALL spu_empleados_registrar (5, 'Mark', 'Junior', '12345678', '2005-08-10', '963237185');

DELIMITER $$
CREATE PROCEDURE spu_sedes_listar()
BEGIN
    SELECT
        idsede,
        sede
    FROM sedes
    WHERE inactive_at IS NULL
    ORDER BY sede;
END $$

select * from empleados;

DROP PROCEDURE spu_sedes_listar;

CALL spu_sedes_listar();
+




















