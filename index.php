<?php

use Blog\controller\PostsController;
use Blog\controller\CommentsController;

require 'controller/PostsController.php';
require 'controller/CommentsController.php';

if (isset($_GET['action'])) {

    $postsController = new PostsController();
    $commentsController = new CommentsController();

    if ($_GET['action'] == 'listposts') {
        $postsController->listPosts();
    } elseif ($_GET['action'] == 'post') {
        $postsController->displayPost($_GET['idPost']);
    } elseif ($_GET['action'] == "addComment") {
        $commentsController->postComment($_GET['idPost'], $_POST['author'], $_POST['comment']);
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    $postsController = new PostsController();
    $postsController->listPosts();
}
