<div class="adminPost">
    <h1>POSTS</h1>
    <?php
        while ($row = $allChapter->fetch(PDO::FETCH_ASSOC)):
    ?>
    <p><a href="?page=1&chapter=<?=$row['id']?>"><?=$row['titre']?></a></p>
    <?php
        endwhile;
    ?>
    <p><a href="?page=1&newChapter=1" id="newChapter">Écrire un nouveau chapitre</a></p>
</div>