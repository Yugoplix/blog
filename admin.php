<?php

    require_once 'model.php';
    loadSession();

    if ($_SESSION['isLog'] == False || $_SESSION['role'] < 2){
        header("Location: connexion.php");
    }

    require_once 'adminView.php';