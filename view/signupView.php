<?php $title = 'Inscription' ?>

<?php ob_start(); ?>
<div>
    <p>Inscrivez-vous</p>

    <form action="index.php?action=signup" method="post">
        <div>
            <label for="signupLogin">Login désiré</label><br />
            <input type="text" id="signupLogin" name="signupLogin" />
        </div>
        <div>
            <label for="signupUsername">Votre nom et prénom</label><br />
            <input type="text" id="signupUsername" name="signupUsername" />
        </div>
        <div>
            <label for="signupPassword">Mot de passe</label><br />
            <input type="password" id="signupPassword" name="signupPassword" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer" class="btn btn-primary p-1" />
        </div>
        <?php if($error) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </form>
</div>

<a href="index.php" class="btn btn-secondary">Retour</a>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>