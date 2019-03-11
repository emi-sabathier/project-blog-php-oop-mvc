<?php $title = htmlspecialchars($post['title']);?>

<?php ob_start();?>
<h1><?php $title = htmlspecialchars($post['title']); ?></h1>

<div>
    <h3>
        <?= htmlspecialchars($post['title'])?>
    </h3>
    <p>Par
        <?= htmlspecialchars($post['username'])?>
        posté le
        <?= htmlspecialchars($post['post_date_fr'])?>
    </p>
    <p><?= htmlspecialchars($post['content']) ?></p>
    <p><a href="index.php">Retour</a></p>
</div>

<form action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" rows ="10" cols ="50"></textarea>
    </div>
    <div>
        <input type="submit" value ="Envoyer" />
    </div>
</form>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>