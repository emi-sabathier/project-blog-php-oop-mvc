<?php $title = 'Panneau d\'administration';?>

<?php
ob_start();
session_start();
?>

<div>
    <h3>
        <strong>
            <?= htmlspecialchars($post['title']) ?></strong>
    </h3>
    <p>Par
        <strong><?= htmlspecialchars($post['user_name']) ?></strong> posté le <?= htmlspecialchars($post['post_date_fr']) ?>
    </p>
    <p>
        <?= htmlspecialchars($post['content']) ?>
    </p>
    <p><a href="index.php">Retour</a></p>
</div>

    <p><a href="index.php?action=disconnect">Déconnexion</a></p>
    <p><a href="index.php">Retour à la home</a></p>

<?php 

$content = ob_get_clean();

require 'template.php';?>