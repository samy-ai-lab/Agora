<?php
// Petit test : affiche les livres de la base
require 'config/database.php';
foreach ($pdo->query('SELECT titre, auteur FROM livre') as $l) {
    echo $l['titre'] . ' - ' . $l['auteur'] . '<br>';
}
