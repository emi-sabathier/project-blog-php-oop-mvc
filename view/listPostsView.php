<?php $title = 'Liste des derniers billets';?>

<?php ob_start();?>
<h1>Bienvenue !</h1>

<div class="content">
    <h3>Liste des billets</h3>

    <?php
foreach ($posts as $post) {?>

    <p>
        <strong><?=htmlspecialchars($post['title'])?></strong>
        écrit par
        <?=htmlspecialchars($post['author'])?>
        le
        <?=htmlspecialchars($post['date_fr'])?>
    </p>
    <p><a href="index.php?action=post&idPost=<?=$post['id']?>">Voir l'article</a></p>
    <?php
}
?>
</div>


<?php $content = ob_get_clean();?>

<?php require 'template.php';?>