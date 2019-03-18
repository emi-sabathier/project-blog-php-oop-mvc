<?php $title = htmlspecialchars($post['title']);?>

<?php ob_start();?>

<div>
    <h3>
        <strong>
            <?=htmlspecialchars($post['title'])?></strong>
    </h3>
    <p>Par
        <strong>
            <?=htmlspecialchars($post['user_name'])?></strong> posté le
        <?=htmlspecialchars($post['post_date_fr'])?>
    </p>
    <p>
        <?=htmlspecialchars($post['content'])?>
    </p>
    <p><a href="index.php" class="btn btn-secondary">Retour</a></p>
</div>


<form action="index.php?action=postComment&amp;postId=<?=$post['id']?>" method="post">

    <?php if (isset($_SESSION['role'])): ?>
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?= $_SESSION['login'] ?>" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" cols="50" rows="5" required></textarea>
        </div>
    <?php else: ?>
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" disabled />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" cols="50" rows="5" disabled></textarea>
        </div>
        <p>Vous devez vous connecter pour poster un commentaire</p>
    <?php endif; ?>
        <div>
            <input type="submit" value="Envoyer" class="btn btn-primary" />
        </div>
        
</form>

<?php foreach ($postComments as $comment): ?>
    <p>
        <strong>
            <?=htmlspecialchars($comment['author']);?></strong>
        Le
        <?=htmlspecialchars($comment['comment_date_fr']);?>
    </p>
    <p>
        <?=htmlspecialchars($comment['content']);?>
    </p>
<?php endforeach;?>
<?php $content = ob_get_clean();
require 'template.php';?>