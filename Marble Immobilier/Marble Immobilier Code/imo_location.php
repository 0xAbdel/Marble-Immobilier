<?php
require_once 'functions_bdd.php';


$pdo = get_pdo();
$query = "SELECT * FROM annonces WHERE categorie = 'location'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php require_once 'navbar.php' ?>
    <title>Annonces de Vente</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesloc.css">
</head>
<body>
    <div class="container">
        <h1>Annonces de location</h1>
        <?php
        foreach ($annonces as $annonce): ?>
        <div class="card">
            <div class="card-content">
                <h3><?php echo htmlspecialchars($annonce['titre'] ?? ''); ?></h3>
            </div>
            <?php if (!empty($annonce['images'])): ?>
                <img src="images/<?php echo htmlspecialchars($annonce['images']); ?>" alt="Image de l'annonce">
            <?php else: ?>
                <img src="images/placeholder.jpg" alt="Pas d'image disponible">
            <?php endif; ?>
            <div class="card-content">
                <p><?php echo htmlspecialchars($annonce['descr'] ?? ''); ?></p>
                <p>Nombre de Pièces: <?php echo htmlspecialchars($annonce['pieces'] ?? ''); ?></p>
                <p>Surface en m2: <?php echo htmlspecialchars($annonce['surface'] ?? ''); ?> m²</p>
                <p class="price"><?php echo htmlspecialchars($annonce['prix'] ?? ''); ?> € / mois</p>
                <a href="anc_cntct_client.php" class="contact-button">Contactez le loueur</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
