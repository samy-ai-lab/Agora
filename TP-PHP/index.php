<html>
<head>
    <title>Test Php</title>
<script>
    function validateForm() {
        var nom = document.forms["myForm"]["nom"].value;
        var date = document.forms["myForm"]["date_naissance"].value;
        var tel = document.forms["myForm"]["telephone"].value;
        if (nom == "" || date == "" || tel == "") {
            alert("Veuillez remplir tous les champs.");
            return false;
        }
    }
</script>
</head>
<body>
<form method="post" action="traitement.php" name="myForm" onsubmit="return validateForm();">
<p>Nom : <input type="text" name="nom"></p>
<p>Date de naissance : <input type="date" name="date_naissance"></p>
<p>telephone : <input type="text" name="telephone"></p>
<button type="submit">Envoyer</button>
</form>
</body>
</html>
