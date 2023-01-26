<?php
include 'dbaccess.php';

$id_match = $_POST['id_match'];

$stmt = $conn->prepare("SELECT num_license, nom, prenom FROM joueurs j INNER JOIN participer p ON j.num_license = p.num_license WHERE p.id_match = :id_match");
$stmt->bindParam(':id_match', $id_match);
$stmt->execute();
$joueurs = $stmt->fetchAll();

$options = "";
foreach($joueurs as $joueur) {
    $options .= "<option value='" . $joueur['num_license'] . "'>" . $joueur['nom'] . " " . $joueur['prenom'] . "</option>";
}

echo $options;

?>