<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start();?>

<div>
    <h3 class="title is-3">
        <strong>
            <?= htmlspecialchars($post['title']) ?></strong>
    </h3>
    <p>Par
        <strong><?= htmlspecialchars($post['username']) ?></strong> posté le <?= htmlspecialchars($post['post_date_fr']) ?>
    </p>
    <p>
        <?= htmlspecialchars($post['content']) ?>
    </p>
    <p><a href="index.php">Retour</a></p>
</div>

<form action="index.php?action=addComment&amp;postId=<?=$post['id']?>" method="post">
    <div class="control">
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" class="input" />
    </div>
    <div class="control">
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" rows="10" class="textarea is-hovered"></textarea>
    </div>
    <div class="control">
        <input type="submit" value="Envoyer" class="button is-primary" />
    </div>
</form>

<?php foreach($postComments as $comment) :?>
<p>
    <strong>
        <?= htmlspecialchars($comment['author']); ?></strong>
    Le
    <?= htmlspecialchars($comment['comment_date_fr']); ?>
</p>
<p>
    <?= htmlspecialchars($comment['content']); ?>
</p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>