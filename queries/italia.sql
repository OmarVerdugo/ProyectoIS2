DROP DATABASE IF EXISTS IS2COMHIS;
CREATE DATABASE IS2COMHIS;
USE IS2COMHIS;

/*//	creacion de la tabla profesores	//*/     
CREATE TABLE Profesores 
		( 	idProfe		INT			AUTO_INCREMENT		PRIMARY KEY,
			nombrePro 	VARCHAR(50) NOT NULL,
			apePatPro 	VARCHAR(20)	NOT NULL,
			apeMatPro	VARCHAR(20),
            naciPro		DATE		NOT NULL,
			sexoPro		VARCHAR(1)	NOT NULL,
            emailPro	VARCHAR(50)	NOT NULL,	
            passPro		VARCHAR(13)	NOT NULL
		);

/*//	creacion de la tabla alumnos	//*/
CREATE TABLE Alumnos 
		( 	idAlumno		INT			AUTO_INCREMENT		PRIMARY KEY,
			nombreAlu 		VARCHAR(50) NOT NULL,
			apePatAlu 		VARCHAR(20)	NOT NULL,
			apeMatAlu		VARCHAR(20),
            naciAlu			DATE,
			sexoAlu			VARCHAR(1)	NOT NULL,
            emailAlu		VARCHAR(50)	NOT NULL,	
            promedio		DOUBLE,
            passAlu			VARCHAR(13)	NOT NULL,
            clase			VARCHAR(2) NOT NULL,
            idProfe			INT,
            FOREIGN KEY(idProfe) references Profesores(idProfe)
		);
     
     
        
CREATE TABLE CalifExam
(
	idCalExam		INT				AUTO_INCREMENT		PRIMARY KEY,
    tituloExam		VARCHAR(20)		NOT NULL,
    califExam		DOUBLE			NOT NULL,
    fechaExam		DATE			NOT NULL,	
    intentos		INT 			NOT NULL,
    idAlumno		INT,
								FOREIGN KEY(idAlumno) references Alumnos(idAlumno)
);
INSERT INTO Profesores VALUES(	0,	'Martin', 'Agundez', NULL, '1965/07/15','M', 'aguila@uabcs.mx' , 'america' ); 
INSERT INTO Alumnos VALUES(0, 'Francisco', 'Sanchez', 'Guerrero', '1998/02/25', 'F', 'pokemito@uabcs.mx', 0, 'rowrow','a', 1);
SELECT * FROM Profesores;
SELECT * FROM Alumnos;
SELECT * FROM CalifExam;