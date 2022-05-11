USE sirgodfroy_co2;
DROP TABLE Utilisateur;
DROP TABLE Capteur;
DROP TABLE Batiment;

CREATE TABLE Utilisateur(
   idUtilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   Pseudo VARCHAR(50),
   Mdp VARCHAR(256)
); 

CREATE TABLE Batiment(
   idBat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   NumBat INT(50),
   NomBatiment VARCHAR(50),
   Adresse VARCHAR(50),
   CodePostal VARCHAR(50),
   Ville VARCHAR(50),
   Activer BOOLEAN
);

CREATE TABLE Capteur(
   idCapteur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   NumCapteur INT(50),
   Date DATE,
   TauxCO2 DOUBLE,
   Activer BOOLEAN
); 
