<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylescndt.css">
    <title>Espace client</title>
</head>
<body>
    <?php 
    if( $_SESSION["connected"]  == true): ?>
     <div class="container">
        <?php require_once 'navbar.php' ?>
        <?php require_once 'functions_bdd.php' ?>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Bienvenue sur l'espace client</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <th>id</th>
                    <th>Titre</th>
                    <th>Suppression</th>
                    <th>Modification</th>
                </tr>
                <?php foreach(get_all_annonces_admin() as $annonces): ?>
                <tr>
                    <td><?= $annonces['id'] ?></td>
                    <td><?= $annonces['titre'] ?></td>
                    <td>
                        <form action="anc_delete_post.php" method="POST">
                        <input type="hidden" name="id" value="<?= $annonces['id'] ?>">
                        <input class="btn btn-danger" type="submit" name="delete" value="supprimer">
                        </form>
                    </td>
                    <td>
                        <a href="anc_update.php?id=<?= $annonces['id'] ?>">Modifier</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <?php else: 
    header('Location: cnx_login.php');
    endif;?>
</body>
</html>