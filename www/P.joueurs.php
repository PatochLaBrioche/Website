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
      <h1>Voici la liste des joueurs</h1>
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
// Créez une connexion à la base de données

include 'dbaccess.php';

// Vérification des cookies
if(!isset($_COOKIE['username'])) {
  // Redirection page de connexion
  header("Location: ID-index.php");
  exit();
}

// Récupérer les données depuis la base de données

$stmt = $conn->prepare("SELECT * FROM joueurs");
$stmt->execute();

// Stockez les données dans un tableau associatif
$joueurs = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $joueurs[] = $row;
}

?>

<!--  Affichez le contenu du tableau -->
<table class = "tableau">
    <tr>
        <th>Numéro de license</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Statut</th>
        <th>Taille</th>
        <th>Poste favoris</th>
        <th>Commentaire</th>
        <th>Photo</th>
    </tr>
    <?php foreach ($joueurs as $joueur) { ?>
        <tr>
            <td><?php echo $joueur['num_license']; ?></td>
            <td><?php echo $joueur['nom']; ?></td>
            <td><?php echo $joueur['prenom']; ?></td>
            <td><?php echo $joueur['d_naissance']; ?></td>
            <td><?php echo $joueur['statut']; ?></td>
            <td><?php echo $joueur['taille']; ?></td>
            <td><?php echo $joueur['poste_fav']; ?></td>
            <td><?php echo $joueur['commentaire']; ?></td>
            <td><?php echo '<img class="photo" src="../photos/'.$joueur['photo'].'" alt="'.$joueur['prenom'].'"';?></td>
        </tr>
    <?php } ?>
</table>

  <footer>
    <div>
      <p>Contacts</p>
    </div>
  </footer>

</body>
</html>