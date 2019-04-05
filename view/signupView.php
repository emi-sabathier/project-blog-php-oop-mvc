<?php $title = 'Inscription'?>

<?php ob_start();?>
<div>
    <h3>Inscrivez-vous</h3>
    <form action="index.php?action=signup" method="post" class="form-group needs-validation" novalidate>
        <label for="signupLogin">Login désiré</label>
        <div class="input-group mb-3 col-md-3 pl-0">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
            </div>
            <input type="text" id="signupLogin" name="signupLogin" class="form-control form-control-md" aria-describedby="inputGroupPrepend" placeholder="Votre login" required/>
            <div class="invalid-feedback">
                Champ incorrect
            </div>
        </div>
        <div>
            <label for="signupUsername">Votre nom et prénom</label><br />
            <div class="col-md-3 mb-3 pl-0">
                <input type="text" id="signupUsername" name="signupUsername" class="form-control form-control-md" placeholder="Vos nom et prénom" required>
                <div class="invalid-feedback">
                    Champ incorrect
                </div>
            </div>
        </div>
        <div>
            <label for="signupPassword">Mot de passe</label><br />
            <div class="col-md-3 mb-3 pl-0">
                <input type="password" id="signupPassword" name="signupPassword" rows="10" placeholder="Votre mot de passe" class="form-control form-control-md" placeholder="Votre mot de passe" required>
                    <div class="invalid-feedback">
                        Champ incorrect
                    </div>
            </div>
        </div>
        <?php if ($error): ?>
            <p><?=$msg?></p>
        <?php endif;?>
        <div>
            <input type="submit" value="Envoyer" class="btn btn-primary p-1" />
        </div>
    </form>
</div>

<a href="index.php" class="btn btn-secondary  p-1">Retour</a>

<?php $content = ob_get_clean();?>
<?php require 'template.php';?>