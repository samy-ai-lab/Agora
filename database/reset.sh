#!/bin/bash
# Version Mac de reset.bat : reconstruit la base de zéro

# Chemin de MySQL dans XAMPP sur Mac
MYSQL=/Applications/XAMPP/xamppfiles/bin/mysql
# Nom de la base
DB=projet_web

# Se place dans le dossier database (là où est ce script)
cd "$(dirname "$0")"

# Supprime la base puis la recrée vide
$MYSQL -u root -e "DROP DATABASE IF EXISTS $DB; CREATE DATABASE $DB CHARACTER SET utf8mb4;" \
  || { echo "ERREUR : MySQL est-il démarré dans XAMPP ?"; exit 1; }

# Exécute toutes les migrations dans l'ordre (V001, V002...)
for f in migrations/V*.sql; do
  echo "$f"
  $MYSQL -u root $DB < "$f" || { echo "ERREUR dans $f"; exit 1; }
done

# Ajoute les données de test
$MYSQL -u root $DB < seeds/donnees_test.sql || { echo "ERREUR dans les données de test"; exit 1; }

echo "Base à jour."