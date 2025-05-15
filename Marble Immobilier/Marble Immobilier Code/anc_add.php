<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" descr="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" >
    <link rel="stylesheet" href="css/stylesanc.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Ajouter une annonce</h1>
        </div>
        <form action="anc_add_post.php" method="post" enctype="multipart/form-data">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required><br><br>

            <label for="descr">Description :</label>
            <textarea name="descr" id="descr" required></textarea><br><br>
        
            <label for="pieces">Pièces :</label>
            <input type="number" name="pieces" id="pieces" required><br><br>
        
            <label for="surface">Surface en m2 :</label>
            <input type="number" name="surface" id="surface" required><br><br>

            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" required><br><br>
        
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie" required>
                <option value="vente">Vente</option>
                <option value="location">Location</option>
            </select><br><br>
        
            <label for="image">Choisissez une image :</label>
            <input type="file" name="image" id="image" required><br><br>
        
            <input type="submit" name="anc_add" value="Ajouter l'annonce">
        </form>
    </div>
</body>
</html>