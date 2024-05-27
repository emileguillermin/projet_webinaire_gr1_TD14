CREATE DATABASE Sport;

USE Sport;

CREATE TABLE Client(
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    carte_etudiant VARCHAR(255),
);