#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        id_client             Int  Auto_increment  NOT NULL ,
        nom_societe           Varchar (50) NOT NULL ,
        nom_contact_societe   Varchar (50) NOT NULL ,
        mail_contact_societe  Varchar (100) NOT NULL ,
        num_societe           Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salle
#------------------------------------------------------------

CREATE TABLE salle(
        id_salle                         Int  Auto_increment  NOT NULL ,
        nom_salle                        Varchar (50) NOT NULL ,
        lieu_salle                       Varchar (50) NOT NULL ,
        nom_contact_salle                Varchar (50) NOT NULL ,
        mail_contact_salle               Varchar (50) NOT NULL ,
        tel_salle                        Int NOT NULL ,
        description_salle                Longtext NOT NULL ,
        logo                             Blob NOT NULL ,
        photo                            Blob NOT NULL ,
        prix_semi_reu_demi               DECIMAL (15,3)  NOT NULL ,
        prix_semi_reu_compl              DECIMAL (15,3)  NOT NULL ,
        min_participants_semi_reu        Int NOT NULL ,
        prix_semi_resid                  DECIMAL (15,3)  NOT NULL ,
        min_participants_resid           Int NOT NULL ,
        prix_dejeuner_groupe             DECIMAL (15,3)  NOT NULL ,
        prix_diner_groupe                DECIMAL (15,3)  NOT NULL ,
        min_participants_repas           Int NOT NULL ,
        prix_cocktail                    DECIMAL (15,3)  NOT NULL ,
        min_participants_cocktail        Int NOT NULL ,
        prix_soiree                      DECIMAL (15,3)  NOT NULL ,
        min_participants_soiree          Int NOT NULL ,
        min_participants_cocktail_soiree Int NOT NULL ,
        prix_loc_seule                   DECIMAL (15,3)  NOT NULL ,
        reunion_bol                      Bool NOT NULL ,
        seminaire_bol                    Bool NOT NULL ,
        residentiel_bol                  Bool NOT NULL ,
        dejeuner_bol                     Bool NOT NULL ,
        diner_bol                        Bool NOT NULL ,
        cocktail_bol                     Bool NOT NULL ,
        soiree                           Bool NOT NULL
	,CONSTRAINT salle_PK PRIMARY KEY (id_salle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reserver
#------------------------------------------------------------

CREATE TABLE reserver(
        id_salle      Int NOT NULL ,
        id_client     Int NOT NULL ,
        nbr_personnes Int NOT NULL ,
        date_resa     Date NOT NULL ,
        type_event    Varchar (50) NOT NULL ,
        devis         Varchar (50) NOT NULL
	,CONSTRAINT reserver_PK PRIMARY KEY (id_salle,id_client)

	,CONSTRAINT reserver_salle_FK FOREIGN KEY (id_salle) REFERENCES salle(id_salle)
	,CONSTRAINT reserver_client0_FK FOREIGN KEY (id_client) REFERENCES client(id_client)
)ENGINE=InnoDB;

