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
  include 'dbaccess.php';

  // Vérification des cookies
  if(!isset($_COOKIE['username'])) {
    // Redirection page de connexion
    header("Location: ID-index.php");
    exit();
  }

  $stmt = $conn->prepare("SELECT * FROM `match` where d_match < now()");
  $stmt->execute();
  if($stmt == false){
      echo "Erreur de select.";
  }
  $matchs = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $matchs[] = $row;
  }

  // Récupération des joueurs de la base de données
  $stmt2 = $conn->prepare("SELECT * FROM `joueurs` j, `participer` p where j.num_license = p.num_license");
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
  
  <form action="E.insertIntoDB.php" method="post" class="tableau">

    <div class="evaluation">
      <p>Sélectionner un match :</p>
      <select id="match-select">
          <?php foreach ($matchs as $match): ?>
              <option value="<?php echo $match['id_match']; ?>"><?php echo $match['d_match']; ?></option>
          <?php endforeach; ?>
      </select>
    </div>

    <div class="evaluation">
      <p>Sélectionner un joueur :</p>
      <select id="joueur-select">
          <?php foreach ($joueurs as $joueur): ?>
              <option value="<?php echo $joueur['num_license']; ?>"><?php echo $joueur['nom']; ?></option>
          <?php endforeach; ?>
      </select>
    </div>
    
    <div class="evaluation">
      <p>Evaluation du joueur :</p>
      <select id="evaluation-select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>

    <div class="evaluation">
      <input type="submit" value="Valider" id="input"/>
      <input type="submit" value="Annuler" id="input"/>
    </div>
            
  </form>

  <footer>
      <div>
        <p>Contacts</p>
      </div>
  </footer>    

</body>
</html>