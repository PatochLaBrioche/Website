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
      <h1>Entrez les données à modifier</h1>
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
            <li class="menu-item menu-dropdown">
              <a href="./S.selection.php">Sélection</a>
            </li>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <?php 
  include "dbaccess.php";

  // Vérification des cookies
  if(!isset($_COOKIE['username'])) {
    // Redirection page de connexion
    header("Location: ID-index.php");
    exit();
  }

  if (isset($_POST['num_license']) && is_string($_POST['num_license'])) 
  {
    $num_license = strval($_POST['num_license']);
  } else {
    echo "numéro de license non valide";
  }
  
  // Récupérer les données depuis la base de données pour le joueur à modifier
  $stmt = $conn->prepare("SELECT * FROM joueurs WHERE :newLicense = num_license");
  $stmt->bindParam(':newLicense',$num_license);
  $stmt->execute();

  // Récupère la ligne du joueur
  $joueurs = array();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  ?>

<div class="form-nouveau">
    <form action="P.EP-UpdateDB.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="num_license" value="<?php echo $num_license; ?>">
    
    <div class="form-lines">
      <div class="form-num_license">
        <label for="num_license-j">License du joueur à modifier :</label>
        <label for="num_license-j"> <?php echo $row['num_license']; ?> </label>
      </div>
    </div>

    <div class="form-lines">
      <div class="form-nom">
        <label for="nom-joueur">Nom :</label>
        <input type="text" max-length= "50" name="nom-j" value="<?php echo $row['nom']; ?>" >
      </div>
    </div>

    <div class="form-lines">
      <div class="form-prenom">
        <label for="prenom-joueur">Prenom :</label> 
        <input type="text" max-length= "50" name="prenom-j" value="<?php echo $row['prenom']; ?>" >
      </div>
    </div>

    <div class="form-lines">
      <div class="form-d_naissance">
        <label for="d_naissance-joueur">Date de naissance :</label> 
        <input type="date" name="d_naissance-j" value="<?php echo $row['d_naissance']; ?>" >
      </div>
    </div>

    <div class="form-lines">
      <div class="form-taille">
        <label for="taille-joueur">Taille (en cm) :</label> 
        <input type="number" min="0" name="taille-j" value="<?php echo $row['taille']; ?>">
      </div>
    </div>
  
    <div class="form-lines">
      <div class="form-poste_fav">
        <label for="poste_fav-joueur">Poste favoris :</label> 
        <input type="text" max-length= "50" name="poste_fav-j" value="<?php echo $row['poste_fav']; ?>" >
      </div>
    </div>

    <div class="form-lines">
      <div class="form-commentaire">
        <label for="commentaire-joueur">Commentaire :</label> 
        <input id="commentaire" type="text" max-length= "150" name="commentaire-j" value="<?php echo $row['commentaire']; ?>">
      </div>
    </div>

    <div class="form-lines">
      <div class="form-statut">
        <label for="statut-joueur">Statut :</label> 
        <input type="text"  max-length= "50" name="statut-j" value="<?php echo $row['statut']; ?>" >
      </div>
    </div>

    <div class="form-lines">
      <div class="form-photo">
        <label for="image-joueur">Photo (Doit être de 200 pixel de large et de long au maximum) :</label>
        <input type="file" accept=".jpg , .png , .jpeg" name="photo-j" id="image" value="<?php echo $row['photo']; ?>">
      </div>
    </div>

    <div class="form-lines" id="center-submit">
      <div class="form-submit">
        <input id="submit-id" type="submit" value="Valider" name="submit">
      </div>
    </div>
    </form>
  </div>
</div>

  <footer >
    <div>
      <p>Contacts</p>
    </div>
  </footer>
</body>
</html>