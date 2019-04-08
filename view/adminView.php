<?php $title = 'Panneau d\'administration';?>

<?php ob_start();?>
<section class="admin-create text-center  mb-4">
    <h2>Panneau d'administration</h2>

    <?php if (isset($_SESSION)): ?>
    <?php if ($_SESSION['role'] == '1'): ?>

    <p>Bonjour Jean Forteroche</p>
    <a href="index.php?action=addPost" class="btn btn-primary p-1">Créer un article</a>
</section>

<section class="admin-report text-center mb-4">
    <h3>Commentaires signalés</h3>
    
    <?php if (empty($reportedComments)): ?>
    
        <p>Aucun commentaire signalé</p>
    
    <?php else: ?>
        <table class="text-center table-striped table-borderless table-responsive table w-100 d-block d-sm-table d-md-table">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th>Signalement</th>
                    <th>Action</th>
                </tr>
            </thead>
        
            <?php foreach ($reportedComments as $report): ?>
        
            <tr>
                <td><?= htmlspecialchars($report['title'])?></td>
                <td><?=$report['user_name']?></td>
                <td><?= htmlspecialchars($report['content'])?></td>
                <td><?=$report['report']?></td>
                <td class="btn-group" role="group" aria-label="actions">
                    <a href="index.php?action=deleteComment&commentId=<?=$report['id']?>" class="btn btn-danger p-1">Effacer</a>
                    <a href="index.php?action=resetReport&commentId=<?=$report['id']?>" class="btn btn-secondary p-1">Annuler</a>
                </td>
            </tr>
        
            <?php endforeach;?>
        <?php endif;?>
        
        </table>
</section>
<section class="admin-posts text-center mb-4">
    <h3>Liste des posts</h3>
    <div class="table-responsive">
        <table class="text-center table-striped table-borderless table w-100 d-block d-sm-table d-md-table">
            <thead class="thead-dark">
                <tr>            
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($post['title'])?>
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
                <td class="btn-group" role="group" aria-label="actions">
                    <a href="index.php?action=viewPost&postId=<?=$post['id']?>" class="btn btn-primary">Voir</a>
                    <a href="index.php?action=editPost&postId=<?=$post['id']?>" class="btn btn-secondary">Modifier</a>
                    <a href="index.php?action=deletePost&postId=<?=$post['id']?>" class="btn btn-danger">Effacer</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</section>

<p><a href="index.php?action=disconnect" class="btn btn-danger p-1">Déconnexion</a></p>
<p><a href="index.php" class="btn btn-secondary p-1">Retour à la home</a></p>

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