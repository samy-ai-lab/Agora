<?php
function nettoyer($donnee) {
  $donnee = trim($donnee);
  $donnee = htmlspecialchars($donnee);
  return $donnee;
}

if (!empty($_POST["nom"]) && !empty($_POST["date_naissance"]) && !empty($_POST["telephone"])) {
  $nom = nettoyer($_POST["nom"]);
  $date_naissance = nettoyer($_POST["date_naissance"]);
  $telephone = nettoyer($_POST["telephone"]);

  echo "Nom : " . $nom . "<br>";
  echo "Date de naissance : " . $date_naissance . "<br>";
  echo "Téléphone : " . $telephone . "<br>";

  $conn = new mysqli("localhost", "root", "", "atelier");

  if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
  }

  $stmt = $conn->prepare("INSERT INTO user (nom, date_naissance, telephone) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nom, $date_naissance, $telephone);
  $stmt->execute();

  echo "Les données ont été enregistrées.";
} else {
  echo "Tous les champs doivent être remplis.";
}
?>
