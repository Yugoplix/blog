<?php

    require_once 'model.php';
    loadSession();

    if (empty($_GET['chapter'])){
        header("Location: index.php");
    }

    $dbh = dbConnect();

    $getChapter = $dbh->prepare("SELECT * FROM chapitres WHERE id = :id");
    $getChapter->bindValue("id", $_GET['chapter']);
    $getChapter->execute();

    $row = $getChapter->fetch(PDO::FETCH_ASSOC);

    require_once 'views/postView.php';