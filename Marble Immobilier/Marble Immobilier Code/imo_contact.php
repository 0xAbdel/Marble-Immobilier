<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'navbar.php' ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesclient.css">
    <title>Contact</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Vous avez une question ? Contactez nous !</h1>
        <form action="imo_cntct_client.php" method="post">

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required><br><br>

            <label for="mail">Mail :</label>
            <input type="mail" name="mail" id="mail" required><br><br>

            <label for="sujet">Sujet :</label>
            <input type="text" name="sujet" id="sujet" required><br><br>
        
            <label for="mess">message :</label>
            <textarea name="mess" id="mess" required></textarea><br><br>
        
            <input type="submit" name =imo_cntct_client value="Envoyer">
        </form>
    </div>
</body>
</html>