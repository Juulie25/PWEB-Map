DROP TABLE IF EXISTS joueur; 
DROP TABLE IF EXISTS partie;
DROP TABLE IF EXISTS stats; 


CREATE TABLE joueur (
    IdJoueur int NOT NULL AUTO_INCREMENT,
    nomJoueur varchar(50), 
    MotDePasse varchar(50), 
    PRIMARY KEY (IdJoueur)
);

CREATE TABLE partie (
    IdPartie int NOT NULL AUTO_INCREMENT,
    IdJoueur int, 
    score int, 
    PRIMARY KEY (IdPartie)
);

CREATE TABLE stats (
    IdJoueur int, 
    meilleurScore int, 
    nbParties int
);