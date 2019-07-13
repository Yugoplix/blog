<?php

    require_once 'model.php';
    loadSession();

    if ($_SESSION['isLog'] == False || intval($_SESSION['role']) < 2){
        header("Location: connexion.php");
    }
    if (empty($_GET['page'])){
        header("Location: ?page=1");
    }

    require_once 'views/adminView.php';