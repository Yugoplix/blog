<?php

    if (isset($_GET['deconnect'])){
        session_destroy();
        header("Location: index.php");
    }

    require 'menuView.php';
?>
