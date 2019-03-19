<?php $title = 'Panneau d\'administration';?>

<?php ob_start();?>
<h1>Panneau d'administration</h1>

<?php if (isset($_SESSION)): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>

<p>Bonjour
    <?=$_SESSION['login'];?>
</p>
<a href="index.php?action=addPost" class="btn btn-primary">Créer</a>
<h3>Liste des posts</h3>

<?php foreach ($posts as $post): ?>
<p>
    <strong>
        <?=$post['title']?></strong>
    écrit par
    <strong>
        <?=$post['user_name']?></strong>
    le
    <?=$post['post_date_fr']?>
    <a href="index.php?action=viewPost&postId=<?=$post['id']?>" class="btn btn-primary">Voir</a>
    <a href="index.php?action=editPost&postId=<?=$post['id']?>" class="btn btn-secondary">Modifier</a>
    <a href="index.php?action=deletePost&postId=<?=$post['id']?>" class="btn btn-danger">Effacer</a>
</p>
<?php endforeach;?>

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