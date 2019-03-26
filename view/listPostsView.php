<?php $title = 'Liste des derniers billets';?>

<?php ob_start();?>
<nav class="navbar bg-dark">

<?php if (isset($_SESSION['role']) && $_SESSION['role'] == "1"): ?>
    <a href="index.php?action=adminPanel">Administration</a> <a href="index.php?action=disconnect">Déconnexion</a>
<?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == '0'): ?>
    <a href="index.php?action=disconnect">Déconnexion</a>
<?php elseif(!isset($_SESSION['role'])): ?>
    <a href="index.php?action=signup">Inscription</a>
    <a href="index.php?action=signin">Identification</a>
<?php endif;?>

</nav>

<h1>Bienvenue !</h1>

<div>
    <h3>Liste des billets</h3>

    <?php foreach ($posts as $post): ?>
        <p>
            <strong><?=$post['title']?></strong>
            écrit par
            <strong>Jean Forteroche</strong>
            le
            <?=$post['post_date_fr']?>
        </p>
        <p>
            <?= substr($post['content'], 0, 100)?> ...
        </p>
        <p><a href="index.php?action=displayPost&postId=<?=$post['id']?>" class="btn btn-primary">Voir l'article</a></p>
    <?php endforeach;?>
</div>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>