<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My PHP Page</title>
</head>
<body>
    <h1>Welcome to My PHP Page</h1>
    <?php
        $nom = $_POST["nom"] ?? "";
        $email = $_POST["email"] ?? "";
        echo "Bonjour " . htmlspecialchars($nom) . ", votre email est : " . htmlspecialchars($email);
    ?>
</body>
</html>