<meta charset="UTF-8">
<div class="markdownPost">
    <form method="post" action="" id="markdownForm">
        <input type="text" name="title" placeholder="Titre" value="<?=$row['titre']?>">
        <textarea name="markdown" placeholder="Ecrivez votre chapitre en markdown"><?=stripslashes($row['markdown'])?></textarea>
        <button type="submit" name="previsualiser" id="previsualizer">Prévisualiser</button>
        <button type="submit" name="modifier" id="modifier">Modifier</button>
    </form>
</div>
<div class="htmlPost">
    <div class="emplacementHTML">
        <h1><?=$row['titre']?></h1>
        <p><?=$htmlChapter?></p>
    </div>
</div>