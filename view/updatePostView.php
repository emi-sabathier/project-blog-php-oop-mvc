<?php $title = 'Panneau d\'administration';?>

<?php ob_start(); ?>
        
<h2>Panneau d'administration</h2>
<h3>Modifier le post</h3>
<div>
    <form action="index.php?action=updatePost&postId=<?= $post['id'] ?>" method="post">
        <label for="title">Titre du post :</label><br />
        <input type="text" id="title" name="title" value="<?= $post['title'] ?>"><br />
        <label for="content">Votre texte : </label><br />
        <textarea id="postArea" name="content"><?= $post['content'] ?></textarea>
        <input type="submit" value="Envoyer" class="btn btn-primary p-1" />
    </form>
    <p><a href="index.php?action=adminPanel">Retour</a></p>
</div>
<?php

$content = ob_get_clean();

require 'template.php';?>