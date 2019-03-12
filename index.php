<?php

use Blog\controller\CommentsController;
use Blog\controller\PostsController;

require 'controller/PostsController.php';
require 'controller/CommentsController.php';

if (isset($_GET['action'])) {

    $postsController = new PostsController();
    $commentsController = new CommentsController();

    if ($_GET['action'] == 'listPosts') {
        $postsController->listPosts();
    } elseif ($_GET['action'] == 'displayPost') {
        
        $postsController->displayPost($_GET['postId']);

    } elseif ($_GET['action'] == "addComment") {
        $commentsController->postComment($_GET['postId'], $_POST['author'], $_POST['comment']);
    } 
    else {
        header('Location: index.php');
        exit;
    }
} else {
    $postsController = new PostsController();
    $postsController->listPosts();
}
