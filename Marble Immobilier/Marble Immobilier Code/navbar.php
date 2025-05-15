<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="margin-right: 70px">Marble Immobilier</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php" style="margin-right: 25px;">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="imo_histoire.php" style="margin-right: 25px";>Qui sommes nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="imo_achat.php" style="margin-right: 25px;">acheter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="imo_location.php" style="margin-right: 25px;">louer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="imo_contact.php" style="margin-right: 25px;">Contact</a>
          </li>
          <?php  
          if( !isset($_SESSION["connected"]) ): ?>
          <li class="nav-item">
            <a class="nav-link" href="cnx_register.php" style="margin-right:  25px;">Inscription</a>
          </li>
          <?php endif; ?>
          <?php
          if( !isset($_SESSION["connected"]) ): ?>
          <li class="nav-item">
            <a class="nav-link" href="cnx_login.php" style="margin-right:  25px;">Connexion</a>
          </li>
          <?php endif; ?>

          <?php  
          if( isset($_SESSION["connected"]) ): ?>
          <li class="nav-item">
          <a class="nav-link" href="cnx_connected.php" style="margin-right: 25px;">Espace Client</a>
          </li>
          <?php endif; ?>

          <?php  
          if( isset($_SESSION["connected"]) ): ?>
          <li class="nav-item">
          <a class="nav-link" href="anc_add.php" style="margin-right: 25px;">ajouter une annonce</a>
          </li>
          <?php endif; ?>

          <?php  
          if( isset($_SESSION["connected"]) ): ?>
           <li class="nav-item">
          <a class="nav-link" href="cnx_signout.php" style="margin-right: 25px;">Deconnexion</a>
           </li>
          <?php endif; ?>
        </ul>
      </div>
</nav>
