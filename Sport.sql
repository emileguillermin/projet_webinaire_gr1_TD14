/*CREATE TABLE IF NOT EXISTS PersonnelSport(
    ID_personnel INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    photo VARCHAR(255),
    specialite VARCHAR(100),
    video VARCHAR(255),
    CV TEXT,
    disponibilite TEXT,
    email VARCHAR(100),
    mot_de_passe TEXT,
    telephone VARCHAR(20),
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
    ID_client INT,
    ID_coach INT,
    Specialité VARCHAR(50),
    nomCoach INT,
    date DATE,
    heure TIME,
    PRIMARY KEY (ID_reservation)
);

CREATE TABLE IF NOT EXISTS Disponibilite(
    jour INT,
    Heure INT
);*/

CREATE TABLE IF NOT EXISTS PersonnelSport(
    ID_personnel INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    photo TEXT,
    specialite VARCHAR(100),
    CV TEXT,
    disponibilite TEXT,
    email VARCHAR(100),
    mot_de_passe TEXT,
    telephone VARCHAR(20),
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
    PRIMARY KEY (IDSpecialite),
    FOREIGN KEY (ID_coach) REFERENCES PersonnelSport(ID_personnel)
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
    ID_client INT,
    ID_personnel INT,
    date DATE,
    heure TIME,
    PRIMARY KEY (ID_reservation),
    FOREIGN KEY (ID_client) REFERENCES client(ID_client),
    FOREIGN KEY (ID_personnel) REFERENCES PersonnelSport(ID_personnel)
);

CREATE TABLE IF NOT EXISTS Disponibilite(
    ID_disponibilite INT AUTO_INCREMENT,
    ID_personnel INT,
    jour VARCHAR(20),
    Heure_debut TIME,
    Heure_fin TIME,
    Statue VARCHAR(20),
    PRIMARY KEY(ID_disponibilite),
    FOREIGN KEY (ID_personnel) REFERENCES PersonnelSport(ID_personnel)
);

