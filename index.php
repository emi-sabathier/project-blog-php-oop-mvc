<?php

use Blog\controller\PostsController;

require 'controller/PostsController.php';

if (isset($_GET['action'])) {

    $postsController = new PostsController();

    if ($_GET['action'] == 'listposts') {
        $postsController->listPosts();
    } 
    elseif ($_GET['action'] == 'post') {
        $postsController->displayPost($_GET['idPost']);
    } 
    else {
        header('Location: index.php');
    }
} else {
    $postsController = new PostsController();
    $postsController->listPosts();
}
