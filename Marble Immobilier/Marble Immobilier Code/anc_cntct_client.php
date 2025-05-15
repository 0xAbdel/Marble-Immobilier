<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesclient.css">
    <title>Contact</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Contacter le vendeur/loueur</h1>
        <form action="anc_send_client.php" method="post">
            <label for="sujet">Sujet :</label>
            <input type="text" name="sujet" id="sujet" required><br><br>
        
            <label for="mess">message :</label>
            <textarea name="mess" id="mess" required></textarea><br><br>
        
            <input type="submit" name =anc_cntct_client value="Envoyer">
        </form>
    </div>
</body>
</html>
