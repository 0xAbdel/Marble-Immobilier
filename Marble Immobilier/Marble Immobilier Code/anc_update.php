<?php session_start(); 
require_once "functions_bdd.php";

if (!isset($_GET['id'])) {
    header('Location: cnx_connected.php');
    exit();
}
function get_annonce_by_id($id) {
    $pdo = get_pdo();
    $query = "SELECT * FROM annonces WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$id = $_GET['id'];
$annonce = get_annonce_by_id($id);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" descr="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesupdt.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="text-center">Modifier une annonce</h1>
    </div>
    <form action="anc_update_post.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=($annonce['ID']) ?>">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= ($annonce['titre']) ?>" required><br><br>

        <label for="descr">Description :</label>
        <textarea name="descr" id="descr" required><?= ($annonce['descr']) ?></textarea><br><br>

        <label for="pieces">Nombre de Pièces :</label>
        <input type="number" name="pieces" id="pieces" value="<?=($annonce['pieces']) ?>" required><br><br>

        <label for="surface">Surface en m2:</label>
        <input type="number" name="surface" id="surface" value="<?= ($annonce['surface']) ?>" required><br><br>

        <label for="prix">Prix :</label>
        <input type="number" name="prix" id="prix" value="<?=($annonce['prix']) ?>" required><br><br>

        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" required>
            <option value="vente" <?= $annonce['categorie'] == 'vente' ? 'selected' : '' ?>>Vente</option>
            <option value="location" <?= $annonce['categorie'] == 'location' ? 'selected' : '' ?>>Location</option>
        </select><br><br>

        <label for="image">Choisissez une image :</label>
        <input type="file" name="image" id="image"><br><br>

        <input type="submit" name="anc_update" value="Mettre à jour">
    </form>
</div>
</body>
</html>