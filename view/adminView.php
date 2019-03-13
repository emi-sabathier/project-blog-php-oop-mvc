<?php $title = 'Administration du site';?>

<?php
ob_start();
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['login'])): ?>
    
    <h1>Admin Jambon</h1>
    <p>Bonjour <?=$_SESSION['login'];?></p>
    <h3>Liste des posts</h3>

    <p><a href="../index.php?action=disconnect">Déconnexion</a></p>
    <p><a href="../index.php?action=listposts">Retour à la home</a></p>

<?php 
else:
    header('Location: ../index.php');
endif;

$content = ob_get_clean();

require 'template.php';?>