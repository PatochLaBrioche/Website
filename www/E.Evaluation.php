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
      <h1>Evaluation des joueurs</h1>
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
  include 'dbaccess.php';

  // Vérification des cookies
  if(!isset($_COOKIE['username'])) {
    // Redirection page de connexion
    header("Location: ID-index.php");
    exit();
  }

  $stmt = $conn->prepare("SELECT * FROM `match`");
  $stmt->execute();
  if($stmt == false){
      echo "Erreur de select.";
  }
  $matchs = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $matchs[] = $row;
  }

  // Récupération des joueurs de la base de données
  $stmt2 = $conn->prepare("SELECT * FROM `joueurs`");
  $stmt2->execute();

  if($stmt2 == false){
      echo "Erreur de select.";
  }

  $joueurs = array();
  while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
      $joueurs[] = $row;
  }

  ?>

  <body>
    <div class="selection">
        <p>Sélectionner un match :</p>
        <select id="select">
            <?php foreach ($matchs as $match): ?>
                <option value="<?php echo $match['id_match']; ?>"><?php echo $match['d_match']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="selection">
        <p>Sélectionner un joueur :</p>
          <select id="select">
              <?php foreach ($joueurs as $joueurs): 
                  ?>
                  <option value="<?php echo $joueurs['num_license']; ?>"><?php echo $joueurs['nom']; ?></option>
              <?php endforeach; ?>
          </select>
    </div>


    <footer id="IndexFooter">
        <div>
          <p>Contacts</p>
        </div>
    </footer>

  </body>
</html>