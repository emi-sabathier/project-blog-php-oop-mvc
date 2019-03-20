<?php $title = 'Panneau d\'administration';?>

<?php ob_start(); ?>
<h1>Panneau d'administration</h1>

<?php if (isset($_SESSION)): ?>
<?php if ($_SESSION['role'] == 'admin'): ?>

<p>Bonjour
    <?=$_SESSION['login'];?>
</p>
<a href="index.php?action=addPost" class="btn btn-primary">Créer un article</a>
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
        <td><strong>
                <?=$post['title']?></strong></td>
        <td>
            <?=$post['user_name']?>
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

<?php elseif ($_SESSION['role'] == 'member'):
    header('Location: index.php?action=listPosts');
    exit;
else:
    header('Location: index.php?action=listPosts');
    exit;
    endif;
endif;
$content = ob_get_clean();

require 'template.php';?>