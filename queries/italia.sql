CREATE DATABASE IS2COMHIS;
USE IS2COMHIS;

/*//	creacion de la tabla alumnos	//*/
CREATE TABLE Alumnos 
		( 	idAlumno		INT					PRIMARY KEY,
			nombreAlu 		VARCHAR(50) NOT NULL,
			apePatAlu 		VARCHAR(20)	NOT NULL,
			apeMatAlu		VARCHAR(20),
            naciAlu			DATE		NOT NULL,
			sexoAlu			VARCHAR(1)	NOT NULL,
            correoAlu		VARCHAR(50)	NOT NULL,	
            promedio		DOUBLE,
            idProfe			INT,
            FOREIGN KEY(idProfe) references Profesores(idProfe)
		);
     
/*//	creacion de la tabla profesores	//*/     
CREATE TABLE Profesores 
		( 	idProfe		INT					PRIMARY KEY,
			nombrePro 	VARCHAR(50) NOT NULL,
			apePatPro 	VARCHAR(20)	NOT NULL,
			apeMatPro	VARCHAR(20),
            naciPro		DATE		NOT NULL,
			sexoPro		VARCHAR(1)	NOT NULL,
            correoPro	VARCHAR(50)	NOT NULL	
		);

