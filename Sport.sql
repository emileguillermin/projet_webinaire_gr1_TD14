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
    ID_admin INT AUTO_INCREMENT,
    mot_de_passe VARCHAR(20),
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

CREATE TABLE IF NOT EXISTS `chatroom` (
  `ID_message` INT NOT NULL AUTO_INCREMENT,
  `ID_client` INT DEFAULT NULL,
  `ID_coach` INT DEFAULT NULL,
  `sender_type` ENUM('client', 'coach') DEFAULT NULL,
  `message` TEXT,
  `timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `conversation_id` INT DEFAULT NULL,
  PRIMARY KEY (`ID_message`),
  KEY `ID_client` (`ID_client`),
  KEY `ID_coach` (`ID_coach`),
  KEY `fk_conversation_id` (`conversation_id`),
  CONSTRAINT `fk_client_id` FOREIGN KEY (`ID_client`) REFERENCES `clients` (`ID_client`) ON DELETE CASCADE,
  CONSTRAINT `fk_coach_id` FOREIGN KEY (`ID_coach`) REFERENCES `coach` (`ID_coach`) ON DELETE CASCADE,
  CONSTRAINT `fk_conversation_id` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`conversation_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `conversations` (
  `conversation_id` int NOT NULL AUTO_INCREMENT,
  `ID_client` int DEFAULT NULL,
  `ID_coach` int DEFAULT NULL,
  PRIMARY KEY (`conversation_id`),
  KEY `ID_client` (`ID_client`),
  KEY `ID_coach` (`ID_coach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

