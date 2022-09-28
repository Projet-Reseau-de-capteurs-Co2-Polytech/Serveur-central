USE sirgodfroy_co2;

CREATE TABLE IF NOT EXISTS Utilisateur(
   idUtilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   Pseudo VARCHAR(50),
   Mdp VARCHAR(256)
); 

CREATE TABLE IF NOT EXISTS Batiment(
   idBat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   NomBatiment VARCHAR(256),
   NomSecondaire VARCHAR(256),
   Adresse VARCHAR(50),
   CodePostal VARCHAR(50),
   Ville VARCHAR(50),
   Activer BOOLEAN
);

CREATE TABLE IF NOT EXISTS Capteur(
   idCapteur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   NomCapteur VARCHAR(256),
   NomSecondaire VARCHAR(256),
   IdBat INT,
   Activer BOOLEAN,
   FOREIGN KEY (IdBat) REFERENCES Batiment(idBat)
); 

 CREATE TABLE IF NOT EXISTS Co2 (
    idCo2 INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	Date DATETIME,
	TauxCO2 DOUBLE,
	idCapteur INT,
   FOREIGN KEY (idCapteur) REFERENCES Capteur(idCapteur)
	
) ;

 CREATE TABLE IF NOT EXISTS Utilisateur_Batiment (
	idUtilisateur INT NOT NULL,
	idBat INT NOT NULL,
	PRIMARY KEY (idUtilisateur, idBat)
) ;




