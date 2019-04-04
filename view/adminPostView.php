<?php $title = 'Panneau d\'administration';?>

<?php
ob_start();
?>
<h2>Panneau d'administration</h2>
<div>
    <h3>
        <strong>
            <?= $post['title'] ?></strong>
    </h3>
    <p>Par
        <strong>Jean Forteroche</strong> posté le
        <?= $post['post_date_fr'] ?>
    </p>
    <p>
        <?= $post['content'] ?>
    </p>
    <p><a href="index.php?action=adminPanel">Retour</a></p>
</div>
<?php 

$content = ob_get_clean();
require 'template.php';?>