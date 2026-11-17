-- Données de test (fausses données pour développer)

INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES
('Alice Martin', 'alice@test.com', 'motdepasse123'),
('Bob Durand', 'bob@test.com', 'motdepasse123');

INSERT INTO livre (titre, auteur, resume) VALUES
('Le Petit Prince', 'Antoine de Saint-Exupéry', 'Un aviateur rencontre dans le désert un petit garçon venu d''une autre planète.'),
('L''Étranger', 'Albert Camus', 'Meursault, un homme indifférent à tout, voit sa vie basculer sous le soleil d''Alger.'),
('1984', 'George Orwell', 'Dans un monde surveillé par Big Brother, Winston ose penser par lui-même.');

INSERT INTO partenaire (nom, adresse) VALUES
('Librairie Le Marque-Page', '12 rue des Livres, 75005 Paris'),
('Campus Café', '3 place de l''Université, 69007 Lyon'),
('Médiathèque Victor Hugo', '45 avenue de la Lecture, 33000 Bordeaux');