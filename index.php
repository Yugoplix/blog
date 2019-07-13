<?php

    require 'model.php';
    loadSession();

    $nbPage = 1;

    $dbh = dbConnect();

    $listChapters = $dbh->query("SELECT * FROM chapitres");

    require 'views/indexView.php';

?>


