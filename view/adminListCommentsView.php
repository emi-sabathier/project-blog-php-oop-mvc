<?php $title = 'Panneau d\'administration';?>

<?php ob_start(); ?>
<h2>Panneau d'administration</h2>
<h3>Liste des commentaires</h3>
<table class="text-center table-striped table-borderless table-responsive table w-100 d-block d-sm-table d-md-table">
    <thead class="thead-dark">  
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Commentaire</th>
            <th>Action</th>
        </tr>   
    </thead>
    <?php foreach ($comments as $comment): ?>
    <tr>
        <td><strong><?=$comment['title'] ?></strong></td>
        <td><?=$comment['user_name']?></td>
        <td><?=$comment['comment_date_fr']?></td>
        <td><?=$comment['content']?></td>
        <td><a href="index.php?action=deleteComment&commentId=<?=$comment['id']?>" class="btn btn-danger p-1">Effacer</a></td>
    </tr>
    <?php endforeach;?>
</table>

<p><a href="index.php?action=adminPanel">Retour au panel</a></p>

<?php
$content = ob_get_clean();
require 'template.php';?>