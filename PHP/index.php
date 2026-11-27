<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PHP Test</title>
</head>
<body>
    <form name="sample" method="post" action="traitement.php">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>