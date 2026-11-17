<?php
// Modèle de configuration : copiez ce fichier en database.php
// Sous XAMPP : utilisateur root, mot de passe vide

$host = 'localhost';
$dbname = 'projet_web';
$user = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}