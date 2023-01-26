<?php

include 'dbaccess.php';

$num_license = $_POST['num_license'];
$evaluation = $_POST['evaluation'];

$stmt = $conn->prepare("UPDATE `joueurs` SET `evaluation` = :evaluation WHERE `num_license` = :num_license");
$stmt->bindParam(':num_license', $num_license);
$stmt->bindParam(':evaluation', $evaluation);

if($stmt->execute()){
    echo "L'évaluation a été enregistrée avec succès";
}else{
    echo "Une erreur s'est produite lors de l'enregistrement de l'évaluation";
}

?>