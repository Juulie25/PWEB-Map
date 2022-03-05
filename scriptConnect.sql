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

ALTER TABLE partie 
ADD CONSTRAINT FK_Partie FOREIGN KEY(IdJoueur) REFERENCES joueur(IdJoueur); 

ALTER TABLE partie
ADD CONSTRAINT CK_Score CHECK (score > 0); 

ALTER TABLE stats
ADD CONSTRAINT FK_Stats FOREIGN KEY (IdJoueur) REFERENCES joueur(IdJoueur); 


INSERT INTO joueur(nomJoueur, MotDePasse) VALUES ("Thomas", "monMotDePasse0");
INSERT INTO joueur(nomJoueur, MotDePasse) VALUES ("Axel", "123456789ABC");
INSERT INTO joueur(nomJoueur, MotDePasse) VALUES ("Julie", "/password12");

INSERT INTO partie(IdJoueur, score) VALUES (1, 19); 
INSERT INTO partie(IdJoueur, score) VALUES (2, 16); 
INSERT INTO partie(IdJoueur, score) VALUES (3, 22); 
INSERT INTO partie(IdJoueur, score) VALUES (2, 25); 
INSERT INTO partie(IdJoueur, score) VALUES (1, 20); 

INSERT INTO stats(IdJoueur, meilleurScore, nbParties) VALUES (1, 20,3);
INSERT INTO stats(IdJoueur, meilleurScore, nbParties) VALUES (2, 25,2);
INSERT INTO stats(IdJoueur, meilleurScore, nbParties) VALUES (3, 22,1);