<?php $title = 'Panneau d\'administration';?>

<?php ob_start(); ?>
<h1>Panneau d'administration</h1>
<h3>Liste des commentaires</h3>
<table class="text-center w-75 p-3">
    <tr>
        <th>Auteur</th>
        <th>Date</th>
        <th>Commentaire</th>
        <th>Signalements</th>
        <th>Action</th>
    </tr>   
    <?php foreach ($comments as $comment): ?> 
    <tr>
        <td><?=$comment['author']?></td>
        <td><?=$comment['comment_date_fr']?></td>
        <td><?=$comment['content']?></td>
        <td></td>
        <td><a href="index.php?action=deleteComment&commentId=<?=$comment['id']?>" class="btn btn-danger">Effacer</a></td>
    </tr>
    <?php endforeach;?>
</table>

<p><a href="index.php?action=adminPanel">Retour au panel</a></p>

<?php
$content = ob_get_clean();
require 'template.php';?>