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
      <h1>¯\_(ツ)_/¯</h1>
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

  
  <footer id="IndexFooter">
    <div>
      <p>Contacts</p>
    </div>
  </footer>
</body>
</html>

<?php
include "dbaccess.php";

// Vérification des cookies
if(!isset($_COOKIE['username'])) {
  // Redirection page de connexion
  header("Location: ID-index.php");
  exit();
}

try{
    // Récupération des données du formulaire
    $id_match = $_POST['id_match'];
    $date_match = $_POST['d_match'];
    $heure_match = $_POST['h_match'];   
    $equipe_adverse = $_POST["équipe-adverse-m"];
    $lieu_rencontre = $_POST["lieu-rencontre-m"];
    $resultat_match = $_POST["résultat-m"];


    // Préparation de la requête de mise à jour
    $stmt = $conn->prepare("UPDATE `match` SET d_match = :date_match, h_match = :heure_match, nom_equipe_adverse =  :equipe_adverse, lieu_rencontre = :lieu_rencontre, resultat = :resultat_match WHERE id_match = :id_match");
    $stmt->bindParam(':date_match', $date_match);
    $stmt->bindParam(':heure_match', $heure_match);
    $stmt->bindParam(':equipe_adverse', $equipe_adverse);
    $stmt->bindParam(':lieu_rencontre', $lieu_rencontre);
    $stmt->bindParam(':resultat_match', $resultat_match);
    $stmt->bindParam(':id_match', $id_match);

    // Exécution de la requête
    $stmt->execute();
    if ($stmt->execute()) {
        // Confirmation de l'ajout du match
        ?>
        <div class="msgContainer">
            <div class="msgRetour">
                <?php echo "Match modifié avec succès !";?>
            </div>
        </div>
        <?php
      } else {
            echo "Erreur";
      }
    
}
catch (PDOException $e)
{
    echo "Erreur : " . $e->getMessage();
}
?>