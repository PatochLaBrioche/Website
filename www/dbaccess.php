<?php
    // Définission des détails de connexion à la base de données
	
	// Version client
	// $utilisateur = "root";
    // $motdepasse = "";
	
	// Version hebergeur
    $utilisateur = "id19948491_petanque_user";
    $motdepasse = "3TS)+y01AVKd[XBA";
    
    $serveur = "localhost";
    $basededonnes = "id19948491_petanque_bdd";

    
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$serveur;dbname=$basededonnes", $utilisateur, $motdepasse);
?>