<?php $title = 'Liste des derniers billets';?>
<?php ob_start();
?>

<div class="row">
    <div class="card-deck">

<?php 
$imagesDir = 'public/img/';
$images = glob($imagesDir . '*.{jpg,jpeg}', GLOB_BRACE);
foreach ($posts as $post): ?>
<div class="col-sm-6 col-md-4 col-lg-4 mx-auto"> 
        <article class="bg-light card mb-4">
            <img src="<?= $images[array_rand($images)] ?>" class="card-img-top img-fluid" alt="paysage alaska">
            <div class="card-body">
                <h4 class="card-title">
                    <?=$post['title']?>
                </h4>
                <p class="card-text">
                    <?= substr($post['content'], 0, 100)?> ...
                </p>
                <p class="text-muted">
                    <strong>Jean Forteroche</strong>
                    le
                    <?=$post['post_date_fr']?>
                </p>
                <p class="text-center"><a href="index.php?action=displayPost&postId=<?=$post['id']?>" class="btn btn-primary">Voir l'article</a></p>
            </div>
        </article>
        </div>
<?php endforeach;?>   

    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require 'template.php';?>
