-- tables
DROP TABLE IF EXISTS Comentarios;
DROP TABLE IF EXISTS Series;
DROP TABLE IF EXISTS Directores;
DROP TABLE IF EXISTS Actores;
DROP TABLE IF EXISTS Plataformas;
DROP TABLE IF EXISTS Idiomas;

-- tables
-- Table: Actores
CREATE TABLE Actores (
    ID BIGINT AUTO_INCREMENT  NOT NULL,
	DNI integer NOT NULL,
    Nombre text  NULL,
    Apellido text  NULL,
    FechaNacimiento date  NULL,
    Nacionalidad text  NULL,
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT Actores_pk PRIMARY KEY (ID)
);

-- Table: Directores
CREATE TABLE Directores (
    ID BIGINT AUTO_INCREMENT  NOT NULL,
	DNI integer NOT NULL,
    Nombre text  NULL,
    Apellidos text  NULL,
    FechaNacimiento date  NULL,
    Nacionalidad text  NULL,
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT Directores_pk PRIMARY KEY (ID)
);

-- Table: Idiomas
CREATE TABLE Idiomas (
    ID BIGINT AUTO_INCREMENT  NOT NULL,
    nombre text  NULL,
    ISOCode text  NULL,
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT Idiomas_pk PRIMARY KEY (ID)
);

-- Table: Plataformas
CREATE TABLE Plataformas (
    ID BIGINT AUTO_INCREMENT  NOT NULL,
    Nombre text  NULL,
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT Plataformas_pk PRIMARY KEY (ID)
);

-- Table: Series
CREATE TABLE Series (
    ID BIGINT AUTO_INCREMENT  NOT NULL,
    Titulo text  NULL,
    Directores_ID BIGINT  NOT NULL,
    Plataformas_ID BIGINT  NOT NULL,
    Actores_ID BIGINT  NOT NULL,
    IdiomasAudio_ID BIGINT NOT NULL,
    IdiomasSubtitulos_ID BIGINT  NOT NULL,
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT Series_pk PRIMARY KEY (ID)
);

-- Table: Comentarios
CREATE TABLE Comentarios (
    ID INT AUTO_INCREMENT NOT NULL,
    Puntuacion INT NOT NULL,
    Series_ID BIGINT NOT NULL,
    Comentario TEXT NULL,
    Fecha DATE NULL,
    PRIMARY KEY (ID),
	Activo TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Series_ID) REFERENCES Series(ID)
);


-- foreign keys
-- Reference: Series_Actores (table: Series)
ALTER TABLE Series ADD CONSTRAINT Series_Actores FOREIGN KEY Series_Actores (Actores_ID)
    REFERENCES Actores (ID)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;

-- Reference: Series_Directores (table: Series)
ALTER TABLE Series ADD CONSTRAINT Series_Directores FOREIGN KEY Series_Directores (Directores_ID)
    REFERENCES Directores (ID)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;

-- Reference: Series_Idiomas (table: Series)
ALTER TABLE Series ADD CONSTRAINT Series_Idiomas_Audio FOREIGN KEY Series_Idiomas_Audio (IdiomasAudio_ID)
    REFERENCES Idiomas (ID)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
	
-- Reference: Series_Idiomas (table: Series)
ALTER TABLE Series ADD CONSTRAINT Series_Idiomas_Subtitulos FOREIGN KEY Series_Idiomas_Subtitulos (IdiomasSubtitulos_ID)
    REFERENCES Idiomas (ID)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;

-- Reference: Series_Plataformas (table: Series)
ALTER TABLE Series ADD CONSTRAINT Series_Plataformas FOREIGN KEY Series_Plataformas (Plataformas_ID)
    REFERENCES Plataformas (ID)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;
	


	
-- inserts
INSERT INTO Plataformas (Nombre) VALUES ('Plataforma A'), ('Plataforma B'), ('Plataforma C'), ('Plataforma D'), ('Plataforma E');
INSERT INTO Idiomas (nombre, ISOCode) VALUES ('Español', 'ES'), ('Inglés', 'EN'), ('Francés', 'FR'), ('Alemán', 'DE'), ('Italiano', 'IT');
INSERT INTO Actores (DNI, Nombre, Apellido, FechaNacimiento, Nacionalidad) VALUES (12345678, 'Leonardo', 'DiCaprio', '1974-11-11', 'Estadounidense'), (23456789, 'Brad', 'Pitt', '1963-12-18', 'Estadounidense'), (34567890, 'Angelina', 'Jolie', '1975-06-04', 'Estadounidense'), (45678901, 'Penélope', 'Cruz', '1974-04-28', 'Española'), (56789012, 'Tom', 'Hanks', '1956-07-09', 'Estadounidense');
INSERT INTO Directores (DNI, Nombre, Apellidos, FechaNacimiento, Nacionalidad) VALUES (87654321, 'Martin', 'Scorsese', '1942-11-17', 'Estadounidense'), (76543210, 'Francis', 'Coppola', '1939-04-07', 'Estadounidense'), (65432109, 'Ridley', 'Scott', '1937-11-30', 'Británica'), (54321098, 'Sofia', 'Coppola', '1971-05-14', 'Estadounidense'), (43210987, 'Guillermo', 'del Toro', '1964-10-09', 'Mexicana');
INSERT INTO Series (Titulo, Directores_ID, Plataformas_ID, Actores_ID, IdiomasAudio_ID, IdiomasSubtitulos_ID) VALUES ('Serie A', 1, 1, 1, 1, 1), ('Serie B', 2, 2, 2, 2, 2), ('Serie C', 3, 3, 3, 3, 3), ('Serie D', 4, 4, 4, 4, 4), ('Serie E', 5, 5, 5, 5, 5);
INSERT INTO Comentarios (Puntuacion, Series_ID, Comentario, Fecha) VALUES (5, 1, 'Excelente serie', '2023-01-01'), (4, 2, 'Muy buena', '2023-01-02'), (3, 3, 'Buena', '2023-01-03'), (2, 4, 'Regular', '2023-01-04'), (1, 5, 'Mala', '2023-01-05');


-- End of file.
