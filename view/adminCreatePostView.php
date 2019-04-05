<?php $title = 'Panneau d\'administration';?>

<?php
ob_start();
?>
<h2 class="text-center">Panneau d'administration</h2>
<h3>Créer un post</h3>
<div>
    <form action="index.php?action=createPost" method="post" class="form-group">
        <label for="title">Titre du post :</label><br />
        <input type="text" id="title" name="title" class="form-control form-control-md"><br />
        <label for="content">Votre texte : </label><br />
        <textarea id="postArea" name="content" class="form-control form-control-md"></textarea>
        <input type="submit" value="Envoyer" class="btn btn-primary p-1 my-2" />
    </form>
    <p><a href="index.php?action=adminPanel" class="btn btn-secondary p-1">Retour</a></p>
</div>
<?php

$content = ob_get_clean();

require 'template.php';?>