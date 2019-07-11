<?php

    if (isset($_GET['deconnect'])){
        session_destroy();
        header("Location: index.php");
    }

    require 'views/menuView.php';
?>
