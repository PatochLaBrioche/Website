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
    if ($stmt->execute()){
        $stmt2 = $conn->prepare("DELETE FROM joueurs WHERE :newLicense = num_license");
        $stmt2->bindParam(':newLicense',$num_license);
        $stmt2->execute();

        // Joueur supprimé
        ?>
        <div class="msgContainer">
            <div class="msgRetour">
                <?php 
                echo "Le joueur a été supprimé";?><br><?php
                header("refresh:5;url=./P.joueurs.php");
                echo "Vous allez être redirigé sur la page joueur dans 3 seconds.";
                ?>
            </div>
        </div>
        <?php


    } else{
        // License inexistante
        ?>
        <div class="msgContainer">
            <div class="msgRetour">
                <?php echo "Ce joueur n'existe pas";?><br><?php
                header("refresh:5;url=./P.joueurs.php");
                echo "Vous allez être redirigé sur la page joueur dans 3 seconds.";
                ?>
            </div>
        </div>
        <?php
    }
  ?>

  <footer id="IndexFooter" >
    <div>
      <p>Contacts</p>
    </div>
  </footer>
</body>
</html>