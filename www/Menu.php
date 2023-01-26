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
      <h1>Bienvenue !</h1>
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

    include 'dbaccess.php';

    // Vérification des cookies
    if(!isset($_COOKIE['username'])) {
      // Redirection page de connexion
      header("Location: ID-index.php");
      exit();
   }
   
    $stmt = $conn->prepare("SELECT nom, prenom FROM joueurs");
    $stmt->execute();
    if($stmt == false){
      echo "Erreur de select.";
    }
    
    $stmt2 = $conn->prepare("SELECT * FROM `match`");
    $stmt2->execute();
    if($stmt2 == false){
      echo "Erreur de select.";
    }
    
    $joueurs = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $joueurs[] = $row;
    }

    $matchs = array();
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $matchs[] = $row;
    }
  
    

?> 


  <div class="flex-content">
    <div class="Joueur">
      <label class="label">Joueurs de la saison</label>
      <table class="tab">
        <tr class="Nom">
          <th>Nom</th>
          <th>Prénom</th>
        </tr>
        <?php foreach ($joueurs as $joueur) : ?>
          <tr class="liste-element">
            <td><?php echo $joueur['nom']; ?></td>
            <td><?php echo $joueur['prenom']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table> 
    </div>


    <div class="Match">
    <label class="label">Match</label>
      <table class="tab">
        <tr class="element-match">
          <th>Date du match</th>
          <th>Heure du match</th>
          <th>Nom de l'équipe adverse</th>
          <th>Lieu de la rencontre</th>
          <th>Résultat</th>
        </tr>
        <?php foreach ($matchs as $match) : ?>
          <tr class="liste-element">
            <td><?php echo $match['d_match']; ?></td>
            <td><?php echo $match['h_match']; ?></td>
            <td><?php echo $match['nom_equipe_adverse']; ?></td>
            <td><?php echo $match['lieu_rencontre']; ?></td>
            <td><?php echo $match['resultat']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table> 
    </div>
  </div>

  <footer>
    <div>
      <p>Contacts</p>
    </div>
  </footer>

</body>

</html>


