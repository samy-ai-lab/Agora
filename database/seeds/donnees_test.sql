-- Fausses données pour tester

INSERT INTO utilisateur (nom, email, telephone) VALUES
  ('Chris', 'chris@test.fr', '0601020304'),
  ('Samy', 'samy@test.fr', NULL);

INSERT INTO livre (titre, auteur, utilisateur_id) VALUES
  ('Le Petit Prince', 'Saint-Exupéry', 1),
  ('1984', 'George Orwell', 2);
