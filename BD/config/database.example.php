<?php
// Modèle : copier ce fichier en database.php et mettre ses propres infos.
// Par défaut sous XAMPP : utilisateur root, mot de passe vide.
$host = 'localhost';
$db   = 'projet_web';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
