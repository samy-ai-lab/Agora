-- V002 : on ajoute une colonne (on ne touche PAS au fichier V001)

ALTER TABLE utilisateur ADD COLUMN telephone VARCHAR(20) NULL;
