
CREATE TABLE PersonnelSport(
    ID_personnel INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    photo VARCHAR(255),
    specialite VARCHAR(100),
    video VARCHAR(255),
    CV TEXT,
    disponibilite TEXT,
    email VARCHAR(100),
    ID_Sport INT,
    PRIMARY KEY (ID_personnel)
);


CREATE TABLE Administrateur(
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE Specialite(
    IDSpecialite INT AUTO_INCREMENT,
    nomSpecialite VARCHAR(100),
    ID_Coach INT 
);

CREATE TABLE Client(
    ID_client INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresseLigne1 VARCHAR(50),
    adresseLigne2 VARCHAR(50),
    email VARCHAR(100),
    Postal VARCHAR(5),
    Pays VARCHAR(50),
    carte_etudiante VARCHAR(20),
    telephone VARCHAR(20),
    PRIMARY KEY (ID_client)
);

CREATE TABLE SalleSport(
    ID_salle INT AUTO_INCREMENT,
    nom VARCHAR(50),
    adresse VARCHAR(50),
    telephone VARCHAR(20),
    PRIMARY KEY (ID_salle)
);

CREATE TABLE Reservation(
    ID_reservation INT AUTO_INCREMENT,
    ID_client INT,
    ID_personnel INT,
    date DATE,
    heure TIME,
    PRIMARY KEY (ID_reservation)
);

CREATE TABLE Disponibilite(
    jour INT,
    Heure INT
);