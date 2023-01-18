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
            <li class="menu-item">
                <a href="./E.Evaluation.php">Evaluation</a>
            </li>
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

if (extension_loaded('gd'))
{
    try
    {
        // Récupération des données du formulaire d'ajout de match
        $date_match = $_POST["d_match"];
        $heure_match = $_POST["h_match"];
        $equipe_adverse = $_POST["équipe-adverse-m"];
        $lieu_rencontre = $_POST["lieu-rencontre-m"];
        $resultat_match = $_POST["résultat-m"];

        // Vérification de la validité des données
        if (empty($date_match) || empty($heure_match) || empty($equipe_adverse) || empty($lieu_rencontre) || empty($resultat_match))
        {
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Tous les champs sont obligatoires";?>
                </div>
            </div>
            <?php
        }
        elseif (strlen($date_match) != 10 || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $date_match))
        {
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Date du match non valide";?>
                </div>
            </div>
            <?php
        }
        elseif (strlen($heure_match) != 5 || !preg_match("/^\d{2}:\d{2}$/", $heure_match))
        {
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Heure du match non valide";?>
                </div>
            </div>
            <?php
        }
        elseif (strlen($equipe_adverse) > 50)
        {
            ?>
                        <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Nom de l'équipe adverse trop long";?>
                </div>
            </div>
            <?php
        }
        elseif (strlen($lieu_rencontre) > 50)
        {
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Lieu de rencontre trop long";?>
                </div>
            </div>
            <?php
        }
        elseif (strlen($resultat_match) > 10)
        {
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Résultat de match trop long";?>
                </div>
            </div>
            <?php
        }
        else
        {
            // Préparation de la requête d'insertion dans la base de données
            $stmt = $conn->prepare('INSERT INTO `match`(`d_match`, `h_match`, `nom_equipe_adverse`, `lieu_rencontre`, `resultat`) VALUES(:date_match, :heure_match, :equipe_adverse, :lieu_rencontre, :resultat_match)');

            // Liaison des paramètres à la requête
            $stmt->bindParam(':date_match', $date_match);
            $stmt->bindParam(':heure_match', $heure_match);
            $stmt->bindParam(':equipe_adverse', $equipe_adverse);
            $stmt->bindParam(':lieu_rencontre', $lieu_rencontre);
            $stmt->bindParam(':resultat_match', $resultat_match);

            // Execution de la requête
            $stmt->execute();

            // Confirmation de l'ajout du match
            ?>
            <div class="msgContainer">
                <div class="msgRetour">
                    <?php echo "Match ajouté avec succès !";?>
                </div>
            </div>
            <?php
        }
    }
            catch (PDOException $e)
            {
                echo "Erreur : " . $e->getMessage();
            }
            }

            else
            {
                echo "L'extension GD n'est pas chargée sur le serveur.";
            }
            
?>
