<?php $title = 'Panneau d\'administration';?>

<?php
ob_start();

if (isset($_SESSION['id']) && isset($_SESSION['login'])): ?>
    
    <h1>Panneau d'administration</h1>
    <p>Bonjour <?=$_SESSION['login'];?></p>
    <h3>Liste des posts</h3>

    <?php foreach ($posts as $post) :?>
        <p>
            <strong><?= htmlspecialchars($post['title']) ?></strong>
            écrit par
            <strong><?= htmlspecialchars($post['user_name'])?></strong>
            le
            <?= htmlspecialchars($post['post_date_fr'])?>
            <a href="index.php?action=adminPanel&postId=<?=$post['id']?>">Voir</a>
            <a href="index.php?action=deletePost&postId=<?=$post['id']?>" class="text-danger">Effacer</a>

        </p>
    <?php endforeach; ?>

    <p><a href="index.php?action=disconnect">Déconnexion</a></p>
    <p><a href="index.php">Retour à la home</a></p>

<?php 
else:
    header('Location: ../index.php?action=listPosts');
    exit;
endif;

$content = ob_get_clean();

require 'template.php';?>