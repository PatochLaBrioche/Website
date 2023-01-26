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
      <h1>Sélection</h1>
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

  
  <form action="" method="POST" class="formMatch">
    <h1>Ajoutez un match à venir pour sélectionner les joueurs qui y participerons</h1>
    <label for="d_match">Date du match :</label>
    <input type="date" id="d_match" name="d_match" required><br><br>
    <label for="h_match">Heure du match :</label>
    <input type="time" id="h_match" name="h_match" required><br><br>
    <label for="nom_equipe_adverse">Nom de l'équipe adverse :</label>
    <input type="text" id="nom_equipe_adverse" name="nom_equipe_adverse" required><br><br>
    <label for="lieu_rencontre">Lieu de la rencontre :</label>
    <input type="text" id="lieu_rencontre" name="lieu_rencontre" required><br><br>
    <input type="submit" value="Créer le match">
    <button id="buttonFormMatch" type="submit" value="Déjà un match ?" onclick="window.location.href='S.selectionJoueurs.php'">Déjà un match ?</button>
  </form>

<?php
  include "dbaccess.php";
  
    // Vérification des cookies
    if(!isset($_COOKIE['username'])) {
      // Redirection page de connexion
      header("Location: ID-index.php");
      exit();
    }
    
  if(!empty($_POST['d_match']) && !empty($_POST['h_match']) && !empty($_POST['nom_equipe_adverse']) && !empty($_POST['lieu_rencontre']))
  {
    $d_match = $_POST['d_match'];
    $h_match = $_POST['h_match'];
    $nom_equipe_adverse = $_POST['nom_equipe_adverse'];
    $lieu_rencontre = $_POST['lieu_rencontre'];
    $resultat = "En cours";
    $stmt = $conn->prepare("INSERT INTO `match`(`d_match`, `h_match`, `nom_equipe_adverse`, `lieu_rencontre`, `resultat`) VALUES (:d_match,:h_match,:nom_equipe_adverse,:lieu_rencontre,:resultat)");
    $stmt->bindValue(':d_match', $d_match, PDO::PARAM_STR);
    $stmt->bindValue(':h_match', $h_match, PDO::PARAM_STR);
    $stmt->bindValue(':nom_equipe_adverse', $nom_equipe_adverse, PDO::PARAM_STR);
    $stmt->bindValue(':lieu_rencontre', $lieu_rencontre, PDO::PARAM_STR);
    $stmt->bindValue(':resultat', $resultat, PDO::PARAM_STR);
    if ($stmt->execute()) {
      echo "Nouvel enregistrement effectué";
    } else {
      echo "Error: " . $stmt->error;
    }
    header("location: S.selectionJoueurs.php"); 
  } 
?>

    <footer id="IndexFooter">
        <div>
          <p>Contacts</p>
        </div>
    </footer>    


</body>
</html>