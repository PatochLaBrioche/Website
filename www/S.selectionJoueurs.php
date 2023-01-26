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
      <h1>Sélection des joueurs</h1>
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
    
    <h1 class="formMatch">Sélection des joueurs pour un match</h1>
    <?php
    include "dbaccess.php";
    // Récupération des matchs créé precedemment de la base de données
    $stmt = $conn->prepare("SELECT * FROM `match` WHERE resultat = 'En cours'");
    $stmt->execute();
    if($stmt == false){
        echo "Erreur de select.";
    }
    $matchs = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $matchs[] = $row;
    }
    
    $query = "SELECT num_license, nom, prenom FROM joueurs";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if($stmt == false){
        echo "Erreur de select.";
    }
    $joueurs = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $joueurs[] = $row;
    }

    $query = "SELECT num_license, nom, prenom FROM joueurs";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if($stmt == false){
        echo "Erreur de select.";
    }
    $titulaires = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $titulaires[] = $row;
    }
    ?>

  <form method="post">
  <div class="formContainer">
    <div class="player-select-container"  id="Match">
        <p>Sélectionner un match (3 titulaire et 2 remplacents):</p>
        <select class="player-select">
            <?php $query = "SELECT id_match, d_match FROM `match` WHERE resultat = 'En cours'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row) {
              echo "<option value='" . $row['id_match'] . "'>" . $row['d_match'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="player-select-container" id="selectPlayer1">
        <p>Sélectionner le joueur 1 :</p>
        <select class="player-select">
            <?php foreach ($joueurs as $joueur): ?>
                <option value="<?php echo $joueur['nom']; ?>"><?php echo $joueur['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="titulaire">
            <option value="titulaire">Titulaire</option>
            <option value="remplaçant">Remplaçant</option>
        </select>
    </div>

    <div class="player-select-container" id="selectPlayer2">
        <p>Sélectionner le joueur 2 :</p>
        <select class="player-select">
            <?php foreach ($joueurs as $joueur): ?>
                <option value="<?php echo $joueur['nom']; ?>"><?php echo $joueur['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="titulaire">
            <option value="titulaire">Titulaire</option>
            <option value="remplaçant">Remplaçant</option>
        </select>
    </div>

    <div class="player-select-container"  id="selectPlayer3">
        <p>Sélectionner le joueur 3 :</p>
        <select class="player-select">
            <?php foreach ($joueurs as $joueur): ?>
                <option value="<?php echo $joueur['nom']; ?>"><?php echo $joueur['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="titulaire">
            <option value="titulaire">Titulaire</option>
            <option value="remplaçant">Remplaçant</option>
        </select>
    </div>

    <div class="player-select-container"  id="selectPlayer4">
        <p>Sélectionner le joueur 4 :</p>
        <select class="player-select">
            <?php foreach ($joueurs as $joueur): ?>
                <option value="<?php echo $joueur['nom']; ?>"><?php echo $joueur['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="titulaire">
            <option value="titulaire">Titulaire</option>
            <option value="remplaçant">Remplaçant</option>
        </select>
    </div>

    <div class="player-select-container"  id="selectPlayer5">
        <p>Sélectionner le joueur 5 :</p>
        <select class="player-select">
            <?php foreach ($joueurs as $joueur): ?>
                <option value="<?php echo $joueur['nom']; ?>"><?php echo $joueur['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="titulaire">
            <option value="titulaire">Titulaire</option>
            <option value="remplaçant">Remplaçant</option>
        </select>
    </div>
    </div>
              

    <input type="submit" value="Attribuer les joueurs au match" class="button-s" onclick="location.reload(); alert('Les joueurs ont été affectés au match avec succès.');">
    <input type="submit" value="Annuler" class="button-a" id = "annuler" onclick="window.location.href='S.selection.php';">

    </form>
    <?php

    if(isset($_POST['joueurs']) && isset($_POST['titulaire']) && isset($_POST['id_match'])) {
      $joueurs = $_POST['joueurs'];
      $titulaire = $_POST['titulaire'];
      $id_match = $_POST['id_match'];
      $performance = null;
      for($i = 0; $i < count($joueurs); $i++) {
        if(in_array($joueurs[$i], $titulaire)) {
          $titulaire = 1;
        } else {
          $titulaire = 0;
        }
        $query = "INSERT INTO participer (titulaire, performance, id_match, num_license) VALUES (:titulaire, :performance, :id_match, :num_license)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':titulaire', $titulaire);
        $stmt->bindParam(':performance', $performance);
        $stmt->bindParam(':id_match', $id_match);
        $stmt->bindParam(':num_license', $joueurs[$i]);
        $stmt->execute();
        }
      }
      ?>
        
    </body>
</html>