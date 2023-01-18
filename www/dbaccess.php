<?php
    // Définission des détails de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $basededonnes = "id19948491_petanque_bdd";

    
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$serveur;dbname=$basededonnes", $utilisateur, $motdepasse);
?>