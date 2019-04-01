<?php $title = 'Panneau d\'administration';?>

<?php ob_start();?>
<h1>Panneau d'administration</h1>

<?php if (isset($_SESSION)): ?>
<?php if ($_SESSION['role'] == '1'): ?>

<p>Bonjour
    <?=$_SESSION['login'];?>
</p>
<a href="index.php?action=addPost" class="btn btn-primary">Créer un article</a>

<h3>Commentaires signalés</h3>

<?php if (empty($reportedComments)): ?>

    <p>Aucun commentaire signalé</p>

<?php else: ?>

<table class="text-center w-75 p-3">
    <tr>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Action</th>
    </tr>

    <?php foreach ($reportedComments as $report): ?>

    <tr>
        <td><?=$report['user_name']?></td>
        <td><?=$report['content']?></td>
        <td>
            <a href="index.php?action=deleteComment&commentId=<?=$report['id']?>" class="btn btn-danger">Effacer</a>
        </td>
    </tr>

    <?php endforeach;?>
<?php endif;?>

</table>
<h3>Liste des posts</h3>
<table class="text-center w-75 p-3">
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
        <th>Commentaires</th>
        <th colspan="3">Actions</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <strong><?=$post['title']?></strong>
        </td>
        <td>
            Jean Forteroche
        </td>
        <td>
            <?=$post['post_date_fr']?>
        </td>
        <td>
            <?php if($post['nb_comments'] == 0) : ?>
                <?= $post['nb_comments']?>               
            <?php else: ?>
                <a href="index.php?action=listComments&postId=<?=$post['id']?>"><?= $post['nb_comments']?></a>            
            <?php endif; ?>
        </td>
        <td><a href="index.php?action=viewPost&postId=<?=$post['id']?>" class="btn btn-primary">Voir</a></td>
        <td><a href="index.php?action=editPost&postId=<?=$post['id']?>" class="btn btn-secondary">Modifier</a></td>
        <td><a href="index.php?action=deletePost&postId=<?=$post['id']?>" class="btn btn-danger">Effacer</a></td>
    </tr>
    <?php endforeach;?>
</table>

<p><a href="index.php?action=disconnect">Déconnexion</a></p>
<p><a href="index.php">Retour à la home</a></p>

<?php elseif ($_SESSION['role'] == '0'):
    header('Location: index.php?action=listPosts');
    exit;
else:
    header('Location: index.php?action=listPosts');
    exit;
endif;
endif;
$content = ob_get_clean();

require 'template.php';?>