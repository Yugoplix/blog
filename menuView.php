<nav class="nav nav-pills nav-fill">
    <a class="nav-item nav-link <?= $nbPage==1?"active":""?>" href="index.php">Missions</a>
    <a class="nav-item nav-link <?= $nbPage==2?"active":""?>" href="association.php">L'association</a>
    <?php
    if ($_SESSION['isLog'] == False):
        ?>
        <a class="nav-item nav-link <?= $nbPage==3?"active":""?>" href="connexion.php">Connexion</a>
    <?php
    endif;
    ?>
    <?php
    if (!empty($_SESSION['role']) && $_SESSION['role'] >= 2):
        ?>
        <div class="dropdown nav-item">
            <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?=$_SESSION['picture']?>" class="profilePicture"><?=$_SESSION['username']?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item <?= $nbPage==4?"active":""?>" href="admin.php">Administration</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item <?= $nbPage==5?"active":""?>" href="profil.php">Profil</a>
                <a class="dropdown-item" href="/?deconnect=1">Se déconnecter</a>
            </div>
        </div>

    <?php
    endif;
    ?>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>