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
    <title>Stage - Alexandre</title>
    <style>
        #changePictureLabel{
            background-image: url(<?=$_SESSION['picture']?>);
            background-size: cover;
            width: 140px;
            height: 140px;
            border-radius: 100px;
            text-align: center;
            vertical-align: center;
        }
        #changePictureLabel:hover{
            background-image: url("assets/profile/change.png"), url(<?=$_SESSION['picture']?>);
        }
    </style>
</head>
<body id="home" onload="javascript:slideAll();">
<header>
    <?php
    require_once "menu.php";
    ?>
</header>
<h1 class="title fromBottom">PROFIL</h1>
<form id="changeProfil" enctype="multipart/form-data" action="profil.php" method="post">
    <div class="profil-box">
        <div class="form-group row" id="firstFloor">
            <input type="file" id="changePicture" name="newPicture" accept="image/*">
            <label for="changePicture" id="changePictureLabel"></label>
            <?php
            if (empty($_GET['changeNickname'])):
                ?>
                <h4 id="nickname"><?=$_SESSION['username']?> </h4>
                <a href="?changeNickname=1" id="changeNickname"><i class="far fa-edit"></i></a>
            <?php
            else:
                ?>
                <input type="text" name="newUsername" value="<?=$_SESSION['username']?>" id="nicknameChanger">
            <?php
            endif;
            ?>
        </div>
        <h3 class="subtitle">Mot de passe</h3>
        <div class="form-group column">
            <input type="password" name="oldPassword" placeholder="Ancien mot de passe" style="margin-bottom: 25px;">
            <input type="password" name="newPassword" placeholder="Nouveau mot de passe">
            <input type="password" name="newPassword2" placeholder="Confirmez le mot de passe">
        </div>
        <input type="submit" name="envoyer" value="Appliquer les changements" id="modifyProfil">
    </div>
</form>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>