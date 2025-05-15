<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesindex.css">
    <title>Se connecter</title>
</head>
<body>
    <div class="container">
        <?php require_once 'navbar.php' ?>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Se connecter </h1>
        </div>
       <div class="row">
           <div class="col-4 offset-4">
                <form action="cnx_login_post.php" method="post">
                    <div class='form-group'>
                        <label for="mail">Mail :</label>
                        <input type="mail" name="mail" id="mail" class="form-control">
                    </div>

                    <div class='form-group'>
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class='form-group'>
                        <input type="submit" name="signin" value="Se connecter" class="btn btn-primary">
                    </div>
                </form>
           </div>
       </div>
    </div>
</body>
</html>