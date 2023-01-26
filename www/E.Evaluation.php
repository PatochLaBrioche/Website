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
  
  <div class="selection">
    <p>Sélectionner un match :</p>
    <select id="match-select">
        <?php foreach ($matchs as $match): ?>
            <option value="<?php echo $match['id_match']; ?>"><?php echo $match['d_match']; ?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="selection">
    <p>Sélectionner un joueur :</p>
    <select id="joueur-select" disabled>
    </select>
  </div>
  <div class="evaluation">
    <p>Evaluation du joueur :</p>
    <select id="evaluation-select" disabled>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
  <button id="valider-button" disabled>Valider</button>

    <!-- Cette partie du code récupère les joueurs qui sont affectés au match sélectionné dans la balise <select-match> -->
    <script>
        $(document).ready(function() {
          // Activer le select de joueur quand un match est sélectionné
          $("#match-select").change(function() {
            $("#joueur-select").prop("disabled", false);
            // Récupérer les joueurs du match sélectionné en utilisant une requête AJAX
            var idMatch = $(this).val();
            $.ajax({
              type: "POST",
              url: "get-joueurs-by-match.php",
              data: { id_match: idMatch },
              success: function(data) {
                $("#joueur-select").html(data);
              }
            });
          });
        
          // Activer le select d'évaluation et le bouton valider quand un joueur est sélectionné
          $("#joueur-select").change(function() {
            $("#evaluation-select").prop("disabled", false);
            $("#valider-button").prop("disabled", false);
          });
          // Envoyer la note d'évaluation en utilisant une requête AJAX lorsque le bouton valider est cliqué
          $("#valider-button").click(function() {
            var numLicense = $("#joueur-select").val();
            var evaluation = $("#evaluation-select").val();
            $.ajax({
              type: "POST",
              url: "E.insertIntoDB.php",
              data: { num_license: numLicense, evaluation: evaluation },
              success: function(data) {
                alert("Evaluation enregistrée avec succès!");},
              error: function(data) {
                alert("Une erreur s'est produite lors de l'enregistrement de l'évaluation. Veuillez réessayer.");
              }
              });
            });
          });
    </script>



    

    <footer id="IndexFooter">
        <div>
          <p>Contacts</p>
        </div>
    </footer>    

</body>
</html>