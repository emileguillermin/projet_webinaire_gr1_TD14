CREATE TABLE IF NOT EXISTS PersonnelSport(
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

CREATE TABLE IF NOT EXISTS Administrateur(
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(100),
    PRIMARY KEY (email)
);

CREATE TABLE IF NOT EXISTS Specialite(
    IDSpecialite INT AUTO_INCREMENT,
    nomSpecialite VARCHAR(100),
    ID_coach INT,
    PRIMARY KEY (IDSpecialite)
);

CREATE TABLE IF NOT EXISTS client(
    ID_client INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresseLigne1 VARCHAR(50),
    adresseLigne2 VARCHAR(50),
    email VARCHAR(100),
    mot_de_passe TEXT,
    ville VARCHAR(50),
    postal VARCHAR(5),
    pays VARCHAR(50),
    carte_etudiante VARCHAR(20),
    telephone VARCHAR(20),
    PRIMARY KEY (ID_client)
);

CREATE TABLE IF NOT EXISTS SalleSport(
    ID_salle INT AUTO_INCREMENT,
    nom VARCHAR(50),
    adresse VARCHAR(50),
    telephone VARCHAR(20),
    PRIMARY KEY (ID_salle)
);

CREATE TABLE IF NOT EXISTS Reservation(
    ID_reservation INT AUTO_INCREMENT,
    Specialité VARCHAR(50),
    nomCoach INT,
    date DATE,
    heure TIME,
    PRIMARY KEY (ID_reservation)
);

CREATE TABLE IF NOT EXISTS Disponibilite(
    jour INT,
    Heure INT
);