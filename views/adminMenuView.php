<h1 class="fromBottom" id="adminTitle">ADMIN PANEL</h1>
<div class="apparaitre">
    <h3 id="hello">Bonjour,<img src="<?=$_SESSION['picture']?>" id="pictureProfile"><?=$_SESSION['username']?></h3>
</div>
<nav class="nav nav-pills nav-fill">
    <a class="nav-item nav-link <?= $_GET['page']==1?"active":""?>" href="?page=1">Post</a>
    <a class="nav-item nav-link <?= $_GET['page']==2?"active":""?>" href="?page=2">L'association</a>
    <?php
        if (!empty($_SESSION['role']) && $_SESSION['role'] > 2):
    ?>
        <a class="nav-item nav-link <?= $_GET['page']==3?"active":""?>" href="?page=3">Journal d'évenement</a>
        <a class="nav-item nav-link <?= $_GET['page']==4?"active":""?>" href="?page=4">IP Log</a>
    <?php
        endif;
    ?>
    <a class="nav-item nav-link" href="index.php">Retour au blog</a>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>