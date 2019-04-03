#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Album
#------------------------------------------------------------

CREATE TABLE Album(
        idAlb        Int NOT NULL ,
        nomAlb       Varchar (25) NOT NULL ,
        dateParution Date NOT NULL ,
        nbTitre      Int NOT NULL
	,CONSTRAINT Album_PK PRIMARY KEY (idAlb)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Maison de disque
#------------------------------------------------------------

CREATE TABLE Maison_de_disque(
        idMD  Int NOT NULL ,
        nomMD Varchar (25) NOT NULL ,
        idAlb Int NOT NULL
	,CONSTRAINT Maison_de_disque_PK PRIMARY KEY (idMD)

	,CONSTRAINT Maison_de_disque_Album_FK FOREIGN KEY (idAlb) REFERENCES Album(idAlb)
	,CONSTRAINT Maison_de_disque_Album_AK UNIQUE (idAlb)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artiste
#------------------------------------------------------------

CREATE TABLE Artiste(
        idArt  Int NOT NULL ,
        nomArt Varchar (25) NOT NULL
	,CONSTRAINT Artiste_PK PRIMARY KEY (idArt)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Titre
#------------------------------------------------------------

CREATE TABLE Titre(
        idT      Int NOT NULL ,
        nomTitre Varchar (30) NOT NULL
	,CONSTRAINT Titre_PK PRIMARY KEY (idT)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        idU Int NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (idU)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ecrit
#------------------------------------------------------------

CREATE TABLE ecrit(
        idArt Int NOT NULL ,
        idAlb Int NOT NULL
	,CONSTRAINT ecrit_PK PRIMARY KEY (idArt,idAlb)

	,CONSTRAINT ecrit_Artiste_FK FOREIGN KEY (idArt) REFERENCES Artiste(idArt)
	,CONSTRAINT ecrit_Album0_FK FOREIGN KEY (idAlb) REFERENCES Album(idAlb)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: compose
#------------------------------------------------------------

CREATE TABLE compose(
        idT   Int NOT NULL ,
        idArt Int NOT NULL
	,CONSTRAINT compose_PK PRIMARY KEY (idT,idArt)

	,CONSTRAINT compose_Titre_FK FOREIGN KEY (idT) REFERENCES Titre(idT)
	,CONSTRAINT compose_Artiste0_FK FOREIGN KEY (idArt) REFERENCES Artiste(idArt)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: joue
#------------------------------------------------------------

CREATE TABLE joue(
        idT Int NOT NULL ,
        idU Int NOT NULL
	,CONSTRAINT joue_PK PRIMARY KEY (idT,idU)

	,CONSTRAINT joue_Titre_FK FOREIGN KEY (idT) REFERENCES Titre(idT)
	,CONSTRAINT joue_Utilisateur0_FK FOREIGN KEY (idU) REFERENCES Utilisateur(idU)
)ENGINE=InnoDB;

