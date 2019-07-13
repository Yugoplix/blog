<?php

    require_once 'model.php';
    $dbh = dbConnect();

    $nbPage = 3;

    $allEvents = $dbh->query("SELECT datetime, event, user_id, utilisateur.image AS image, utilisateur.username AS username FROM event INNER JOIN users utilisateur ON event.user_id = utilisateur.id ORDER BY datetime DESC");

    require_once 'views/eventView.php';