<?php
    require_once 'model.php';
    require_once 'libs/Parsedown.php';

    $dbh = dbConnect();
    $nb_page = 1;

    $allChapter = $dbh->query("SELECT * FROM chapitres");

    $parsedown = new Parsedown();

    if (!empty($_GET['newChapter'])){
        if (isset($_POST['creerChapitre']) && !empty($_POST['title']) && !empty($_POST['markdown'])){
            $createNewChapter = $dbh->prepare("INSERT INTO chapitres (titre, markdown, content) VALUES (:titre, :markdown, :content)");
            $createNewChapter->bindValue("titre", $_POST['title']);
            $createNewChapter->bindValue("markdown", addslashes($_POST['markdown']));
            $htmlMarkdown = $parsedown->text($_POST['markdown']);
            $createNewChapter->bindValue("content", $htmlMarkdown);
            $createNewChapter->execute();
            addEvent("creer le chapitre ".substr($_POST['title'],9,1),$_SESSION['id']);
            header("Location: /admin.php?page=1");
        }
        require_once 'views/newChapterView.php';
    } elseif (!empty($_GET['chapter'])){
        $thisChapter = $dbh->prepare("SELECT * FROM chapitres WHERE id = :id");
        $thisChapter->bindValue("id",$_GET['chapter']);
        $thisChapter->execute();

        $row = $thisChapter->fetch(PDO::FETCH_ASSOC);

        if (isset($_POST['previsualiser']) && !empty($_POST['title']) && !empty($_POST['markdown'])){
            $htmlChapter = $parsedown->text($_POST['markdown']);
            $row['markdown'] = $_POST['markdown'];
        } else {
            $htmlChapter = $row['content'];
        }

        if (isset($_POST['modifier']) && !empty($_POST['title']) && !empty($_POST['markdown'])){
            $send = $dbh->prepare("UPDATE chapitres SET titre = :titre, markdown = :markdown, content = :content WHERE id = :id");
            $send->bindValue("titre", $_POST['title']);
            $send->bindValue("markdown",addslashes($_POST['markdown']));
            $htmlChapter = $parsedown->text($_POST['markdown']);
            $send->bindValue("content", $htmlChapter);
            $send->bindValue("id",$row['id']);
            $send->execute();
            addEvent("modifié le chapitre ".substr($_POST['title'],9,1),$_SESSION['id']);
        }

        require_once 'views/chapterModifyView.php';

    } else {
        require_once 'views/listPostView.php';
    }