<?php

    require_once 'model.php';
    $dbh = dbConnect();

    $nbPage = 4;

    $allConnection = $dbh->query("SELECT datetime, utilisateur.username, ip FROM ip_log JOIN users utilisateur ON ip_log.user_id = utilisateur.id ORDER BY datetime DESC");
    require_once 'views/ip-logView.php';