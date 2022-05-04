USE sirgodfroy_co2;

CREATE TABLE Utilisateur(
   idUtilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   Pseudo VARCHAR(50),
   Mdp VARCHAR(256)
); 

CREATE TABLE Batiment(
   idBat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   NomBatiment VARCHAR(50),
   Adresse VARCHAR(50),
   CodePostal VARCHAR(50),
   Ville VARCHAR(50)
);

CREATE TABLE Capteur(
   idCapteur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   Date DATE,
   TauxCO2 DOUBLE
); 
