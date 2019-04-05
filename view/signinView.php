<?php $title = 'Identification' ?>

<?php ob_start(); ?>
<div>
    <h3>Identifiez-vous</h3>
    <form action="index.php?action=signin" method="post" class="form-group needs-validation" novalidate>
        <label for="signinLogin">Login</label><br />
        <div class="col-md-3 mb-3 pl-0">
            <input type="text" id="signinLogin" name="signinLogin" class="form-control form-control-md"
                placeholder="Votre login" required />
            <div class="invalid-feedback">
                Champ incorrect
            </div>
        </div>
        <div>
            <label for="signinPassword">Mot de passe</label><br />
            <div class="col-md-3 mb-3 pl-0">
                <input type="password" id="signinPassword" name="signinPassword" rows="10"
                    class="form-control form-control-md " placeholder="Votre mot de passe" required></textarea>
                <div class="invalid-feedback">
                    Champ incorrect
                </div>
            </div>
        </div>
        <?php if($error) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
            <p>Pas encore inscrit ? <a href="index.php?action=signup">c'est par ici</a></p>
        <div>
            <input type="submit" value="Envoyer" class="btn btn-primary p-1" />
        </div>
    </form>
</div>

<a href="index.php" class="btn btn-secondary p-1">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>