<?php
    $password = '$iutinfo';
    $passwordProf = 'PassProf';

  // Hachage du mot de passe
  $hashedPassword = hash("sha256", $password);
    echo $hashedPassword;

  echo "\n";  

  $hashedPassword2 = hash("sha256", $passwordProf);
    echo $hashedPassword2;

?>