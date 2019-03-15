<?php $title = 'Panneau d\'administration';?>

<?php
ob_start();

if (isset($_SESSION)): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>

    <h1>Panneau d'administration</h1>
    <p>Bonjour <?=$_SESSION['login'];?></p>
    <h3>Liste des posts</h3>
    <a href="index.php?action=create" class="btn btn-primary">Créer</a>

    <?php foreach ($posts as $post): ?>
        <p>
            <strong><?=htmlspecialchars($post['title'])?></strong>
            écrit par
            <strong><?=htmlspecialchars($post['user_name'])?></strong>
            le
            <?=htmlspecialchars($post['post_date_fr'])?>
            <a href="index.php?action=adminPanel&postId=<?=$post['id']?>" class="btn btn-primary">Voir</a>
            <a href="index.php?action=updatePost&postId=<?=$post['id']?>" class="btn btn-secondary">Modifier</a>
            <a href="index.php?action=deletePost&postId=<?=$post['id']?>" class="btn btn-danger">Effacer</a>

        </p>
    <?php endforeach; ?>

    <p><a href="index.php?action=disconnect">Déconnexion</a></p>
    <p><a href="index.php">Retour à la home</a></p>

    <?php elseif ($_SESSION['role'] == 'member'):
    header('Location: index.php?action=listPosts');
    exit;
else:
    header('Location: index.php?action=listPosts');
    exit;
endif;
endif;
$content = ob_get_clean();

require 'template.php';?>