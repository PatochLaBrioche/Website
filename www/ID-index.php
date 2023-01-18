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
      <h1>Veuillez vous connecter</h1>
    </div>
</header>

  <div class="form-index">
    <form action="ID-login.php" method="post">
      <div class="inputBox">
        <label for="fname">nom d'utilisateur</label>
        <input id="inputbox" name="login" type="text">
      </div>
      <div class="inputBox">
        <label for="fname">mot de passe</label>
        <input id="inputbox" name="password" type="password">
      </div>
    
      <form action="/submit-form">
      <button id="submit-id" type="submit">Connexion</button>
    </form>
  </div>

  <footer id="IndexFooter">
    <div>
      <p>Contacts</p>
    </div>
  </footer>

</body>
</html>