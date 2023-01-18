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
      <h1>Ajouter un nouveau joueur</h1>
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
            <li class="menu-item">
                <a href="./E.Evaluation.php">Evaluation</a>
            </li>
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
?>

  <div class="form-nouveau">
    <form action="P.NP-insertIntoDB.php" method="post" enctype="multipart/form-data">

    <div class="form-lines">
      <div class="form-license">
          <label for="license-joueur">Numéro de license (Doit être de 8 caractères) :</label> 
          <input type="text" min-length="8" max-length= "8" name="license-j" required>
      </div>
    </div>
    
    <div class="form-lines">
      <div class="form-nom">
        <label for="nom-joueur">Nom :</label>
        <input type="text" max-length= "50" name="nom-j" required>
      </div>
    </div>
    <div class="form-lines">
      <div class="form-prenom">
        <label for="prenom-joueur">Prenom :</label> 
        <input type="text" max-length= "50" name="prenom-j" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-d_naissance">
        <label for="d_naissance-joueur">Date de naissance :</label> 
        <input type="date" name="d_naissance-j" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-taille">
        <label for="taille-joueur">Taille (en cm) :</label> 
        <input type="number" min="0" name="taille-j" required>
      </div>
    </div>
  
    <div class="form-lines">
      <div class="form-poste_fav">
        <label for="poste_fav-joueur">Poste favoris :</label> 
        <input type="text" max-length= "50" name="poste_fav-j" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-commentaire">
        <label for="commentaire-joueur">Commentaire :</label> 
        <input id="commentaire" type="text" max-length= "150" name="commentaire-j" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-statut">
        <label for="statut-joueur">Statut :</label> 
        <input type="text"  max-length= "50" name="statut-j" required>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-photo">
        <label for="image-joueur">Photo (Doit être de 200 pixel de large et de long au maximum) :</label>
        <input type="file" accept=".jpg , .png , .jpeg" name="photo-j" id="image" required>
      </div>
    </div>

    <div class="form-lines" id="center-submit">
      <div class="form-submit">
        <input id="submit-id" type="submit" value="Valider" name="submit">
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

