<?php $title = 'Administration du site';?>

<?php
ob_start();
session_start();
?>

<?php 
if (isset($_SESSION['id']) && isset($_SESSION['login'])): ?>

    <h1>Admin Jambon</h1>
    <p>Bonjour <?=$_SESSION['login'];?></p>
    <h3>Liste des posts</h3>

<? else:
    echo "jambon";
endif;

$content = ob_get_clean();?>

<?php require 'template.php';?>