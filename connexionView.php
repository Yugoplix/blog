<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e1603cdf05.js"></script>
    <title>Connexion</title>
</head>
<body>
<header>
    <?php
        require_once "menu.php";
    ?>
</header>
<form action="connexion.php" method="post">
    <div class="login-box">
        <h1>Connexion</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Identifiant" name="username" >
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Mot de passe" name="password">
        </div>
        <input class="button" type="submit" name="connexion" value="Se connecter">
    </div>
</form>
</body>
</html>