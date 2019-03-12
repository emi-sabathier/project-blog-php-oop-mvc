<?php $title = 'Liste des derniers billets';?>

<?php ob_start();?>
<h1 class="title is-1">Bienvenue !</h1>

<div>
    <h3 class="title is-3">Liste des billets</h3>

    <?php foreach ($posts as $post) :?>
        <p>
            <strong><?=htmlspecialchars($post['title'])?></strong>
            écrit par
            <?=htmlspecialchars($post['username'])?>
            le
            <?=htmlspecialchars($post['post_date_fr'])?>
        </p>
        <p><a href="index.php?action=displayPost&postId=<?=$post['id']?>">Voir l'article</a></p>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean();?>

<?php require 'template.php';?>