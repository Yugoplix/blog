<?php

    require_once 'model.php';
    loadSession();
    $dbh = dbConnect();

    $nbPage = 3;

    if (isset($_POST['connexion']) && !empty($_POST['username']) && !empty($_POST['password'])){
        $connexion = $dbh->prepare("SELECT * FROM users WHERE LOWER(username) = LOWER(:username)");
        $connexion->bindValue('username', $_POST['username']);
        $connexion->execute();

        $dataUser = $connexion->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'],$dataUser['password'])){
            $_SESSION['isLog'] = True;
            $_SESSION['username'] = $_POST['username'];
            header("Location: index.php");
        }
    }

    require_once 'views/connexionView.php';