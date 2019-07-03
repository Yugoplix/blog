<?php

    require_once 'model.php';
    loadSession();
    updateProfile();

    $nbPage = 5;
    require_once 'profilView.php';