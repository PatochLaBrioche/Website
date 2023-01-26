<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Gestion Pétanque Pro</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header class="header">
    <div class="titre-header">
      <h1>Modification du match sélectionné</h1>
    </div>

    <!-- menu header -->
    <nav class="header-menu">
      <div class="container">
        <ul class="navibar">
          <li class="menu-item">
            <a href="./Menu.php">Accueil</a>
          </li>
          <li class="menu-item menu-dropdown">
            <a href="./P.joueurs.php">Joueurs</a>
            <ul class="droppedMenu">
              <li class="menu-item">
                <a href="./P.NP-NouveauJoueur.php">Ajouter un joueur</a>
              </li>
              <li class="menu-item">
                <a href="./P.EP-ModifierJoueur.php">Modifier un joueur</a>
              </li>
            </ul>
          </li>
          <li class="menu-item menu-dropdown">
            <a href="./M.match.php">Match</a>
            <ul class="droppedMenu">
              <li class="menu-item">
                <a href="./M.NM-NouveauMatch.php">Ajouter un match</a>
              </li>
              <li class="menu-item">
                <a href="./M.MM-ModifierMatch.php">Modifier un match</a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
              <a href="./E.Evaluation.php">Evaluation</a>
          </li>
          <li class="menu-item">
              <a href="./S.selection.php">Sélection</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <?php
    // Vérification des cookies
    if(!isset($_COOKIE['username'])) {
      // Redirection page de connexion
      header("Location: ID-index.php");
      exit();
    }
    
    if (isset($_POST['id_match']) && is_numeric($_POST['id_match'])) {
      $id_match = intval($_POST['id_match']);} else {echo "id non valide";
    }
    ?>

  <div class="form-nouveau">
    <form action="M.MM-UpdateDB.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_match" value="<?php echo $id_match; ?>">
    
    <div class="form-lines">
      <div class="form-d_match">
          <label for="date-match">Date du match :</label> 
          <input type="date" name="d_match" required>
      </div>
    </div>
    
    <div class="form-lines">
      <div class="form-h_match">
        <label for="heure-match">Heure du match :</label>
        <input type="time" name="h_match">
      </div>
    </div>

    <div class="form-lines">
      <div class="form-equipe-adverse">
        <label for="equipe-adverse">Nom de l'équipe adverse :</label> 
        <input type="text" max-length= "50" name="équipe-adverse-m" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-lieu-rencontre">
        <label for="lieu-rencontre">Lieu de rencontre :</label> 
        <input type="text" max-length= "50" name="lieu-rencontre-m" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-resultat">
        <label for="resultat">Résultat du match :</label> 
        <input type="text" max-length= "50" name="résultat-m" required>
      </div>
    </div>

    <div class="form-lines" id="center-submit">
      <div class="form-submit">
        <input id="submit-id" type="submit" value="Valider les modifications" name="submit">
      </div>
    </div>
    </form>
  </div>    
  

  <footer >
    <div>
      <p>Contacts</p>
    </div>
  </footer>
</body>
</html>




