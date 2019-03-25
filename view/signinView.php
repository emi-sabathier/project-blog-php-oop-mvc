<?php $title = 'Identification' ?>

<?php ob_start(); ?>
<div>
    <p>Identifiez-vous</p>
    <form action="index.php?action=signin" method="post">
        <div>
            <label for="signinLogin">Login</label><br />
            <input type="text" id="signinLogin" name="signinLogin" />
        </div>
        <div>
            <label for="signinPassword">Mot de passe</label><br />
            <input type="password" id="signinPassword" name="signinPassword" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer" class="btn btn-primary" />
        </div>
    </form>
</div>

<a href="index.php" class="btn btn-secondary">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>