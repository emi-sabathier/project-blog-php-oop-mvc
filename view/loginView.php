<?php $title = 'Login' ?>

<?php ob_start(); ?>

<form action="index.php?action=login" method="post">
    <div>
        <label for="username">Login</label><br />
        <input type="text" id="userlogin" name="userlogin" />
    </div>
    <div>
        <label for="password">Mot de passe</label><br />
        <input type="password" id="password" name="password" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer" />
    </div>
</form>

<a href="index.php">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>