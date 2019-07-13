<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <title>Stage - Alexandre</title>
</head>
<body id="home" onload="javascript:slideAll();">
<header>
    <?php
        require_once "menu.php";
    ?>
</header>
<h1 class="title fromBottom">CHAPITRES</h1>
<div class="listChapter">
    <?php
        while ($row = $listChapters->fetch(PDO::FETCH_ASSOC)):
    ?>
        <div class="chapterContainer" style="background-image: url('../assets/chapters/hover.png'), url('../assets/chapters/<?=$row['image']?>');">
            <a href="/post.php?chapter=<?=$row['id']?>"><?=substr($row['titre'],0,10)?><br><?=substr($row['titre'],13,50)?></a>
        </div>
    <?php
        endwhile;
    ?>
</div>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>