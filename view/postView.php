<?php $title = $post['title'] ;?>

<?php ob_start();?>
<h1>Bienvenue !</h1>

<div class="content">
    <h3>
        <?=htmlspecialchars($post['title'])?>
    </h3>
    <p>Par
        <?=htmlspecialchars($post['author'])?>
        posté le
        <?=htmlspecialchars($post['date_fr'])?>
    </p>
    <p><?= htmlspecialchars($post['content']) ?></p>
    <p><a href="index.php">Retour</a></p>
</div>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>