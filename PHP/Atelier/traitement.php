<?php
// Fonction de nettoyage des données (espaces et caractères spéciaux - W3Schools)
function nettoyer_donnee($donnee) {
    $donnee = trim($donnee);             // Supprime les espaces au début et à la fin
    $donnee = stripslashes($donnee);     // Supprime les antislashs
    $donnee = htmlspecialchars($donnee); // Échappe les caractères spéciaux (protection XSS)
    return $donnee;
}

// Étape 3 : Vérifier que les champs existent et ne sont pas vides
if (
    isset($_POST['nom']) && $_POST['nom'] !== "" &&
    isset($_POST['date_naissance']) && $_POST['date_naissance'] !== "" &&
    isset($_POST['telephone']) && $_POST['telephone'] !== ""
) {
    $nom = nettoyer_donnee($_POST['nom']);
    $date_naissance = nettoyer_donnee($_POST['date_naissance']);
    $telephone = nettoyer_donnee($_POST['telephone']);

    // Affichage des données récupérées
    echo "<h2>Données reçues :</h2>";
    echo "Votre nom est : " . $nom . "<br>";
    echo "Votre date de naissance est : " . $date_naissance . "<br>";
    echo "Votre numéro de téléphone est : " . $telephone . "<br><br>";

    // Étape 4 : Connexion à la BDD et insertion avec requête préparée (PDO)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "atelier_php";

    try {
        // Création du connecteur PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête SQL
        $stmt = $conn->prepare("INSERT INTO user (nom, date_naissance, telephone) VALUES (:nom, :date_naissance, :telephone)");

        // Liaison des paramètres et exécution
        $stmt->execute([
            ':nom' => $nom,
            ':date_naissance' => $date_naissance,
            ':telephone' => $telephone
        ]);

        echo "<strong>Enregistrement réussi dans la base de données !</strong>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou d'insertion : " . $e->getMessage();
    }

    // Fermeture de la connexion
    $conn = null;
} else {
    echo "Erreur : veuillez remplir tous les champs du formulaire.";
}
?>