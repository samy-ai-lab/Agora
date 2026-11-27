<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Traitement</title>
</head>
<body>
<?php
//Connexion à la base
$host = 'localhost';
$dbname = 'db.test';
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

//fonction donner par ia pour nettoyer les données (jsp si c'est utile)
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// je recup les donner de formulaire 
$nom = $_POST["nom"] ?? "";
$date_naissance = $_POST["date_naissance"] ?? "";
$telephone = $_POST["telephone"] ?? "";

// je verifie que c'est pas vide
if (empty($nom) || empty($date_naissance) || empty($telephone)) {
    echo "Tous les champs sont obligatoires.";
} else {
    $nom = test_input($nom);
    $date_naissance = test_input($date_naissance);
    $telephone = test_input($telephone);

    // la requete pour inserer dans la bd
    $stmt = $pdo->prepare("INSERT INTO users (nom, date_naissance, telephone) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $date_naissance, $telephone]);

    // compter le nombre total d'utilisateurs
    $count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

    echo "Bonjour $nom, tes données ont bien été enregistrées !<br>";
    echo "Il y a $count utilisateurs dans la base de données.";
}
?>
</body>
</html>