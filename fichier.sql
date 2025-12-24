CREATE DATABASE E_sport;
CREATE TABLE CLUB(
    id int PRIMARY KEY AUTO_INCREMENT,
    Name varchar(100) NOT NULL,
    Ville varchar(100) NOT NULL,
    Date_Creation date  NOT NULL
    );
 CREATE TABLE Equipe(
     id int PRIMARY KEY AUTO_INCREMENT,
     Name varchar(100)  NOT NULL,
     Jeu varchar(100) NOT NULL,
     club_id int,
     FOREIGN KEY (club_id) REFERENCES club(id)
     );
 CREATE TABLE Joueur(
     id int PRIMARY KEY AUTO_INCREMENT,
     Pseudo varchar(100)  NOT NULL,
     Rôle varchar(100) NOT NULL,
     Salaire int NOT NULL,
     EquipeID int,
     FOREIGN KEY (EquipeID) REFERENCES Equipe(id)
     );

CREATE TABLE Tournoi(
    id int PRIMARY KEY AUTO_INCREMENT,
    Titre varchar(100) NOT NULL,
    Cashprize decimal NOT NULL,
    Format varchar(100) NOT NULL,
    Date_Tournoi date
    );
   
CREATE TABLE Matches(
    id int PRIMARY KEY AUTO_INCREMENT,
    Score_A int NOT NULL,
    Score_B int NOT NULL,
    EquipeA int,
    EquipeB int,
    TournoiID int,
    GagnantID int,
    FOREIGN KEY (EquipeA) REFERENCES Equipe(id),
    FOREIGN KEY (EquipeB) REFERENCES Equipe(id),
    FOREIGN KEY (TournoiID) REFERENCES Tournoi(id),
    FOREIGN KEY (GagnantID) REFERENCES Equipe(id)
    );
    
CREATE TABLE Sponsor(
    id int PRIMARY KEY AUTO_INCREMENT,
    Nom varchar(100) NOT NULL,
    Contribution_Financière decimal NOT NULL,
	TournoiID int,
    FOREIGN KEY (TournoiID) REFERENCES Tournoi(id)
    )
 

     
  
     
     
    