<?php

use Blog\controller\CommentsController;
use Blog\controller\PostsController;
use Blog\controller\UsersController;

require 'controller/PostsController.php';
require 'controller/CommentsController.php';
require 'controller/UsersController.php';

if (isset($_GET['action'])) {

    $postsController = new PostsController();
    $commentsController = new CommentsController();
    $usersController = new UsersController();

    if ($_GET['action'] == 'listPosts') {
        $postsController->listPosts();

    } elseif ($_GET['action'] == 'displayPost') {        
        $postsController->displayPost();

    } elseif ($_GET['action'] == "addComment") {
        $commentsController->postComment();

    } elseif ($_GET['action'] == "login") {
        $usersController->login();       

    } elseif ($_GET['action'] == "adminPanel") {
        $usersController->adminPanel();

    } elseif ($_GET['action'] == "deletePost") {
        $postsController->deletePost();

    } elseif ($_GET['action'] == "disconnect") {
        $usersController->disconnect();
    }
    else {
        header('Location: index.php');
        exit;
    }
} else {
    $postsController = new PostsController();   
    $postsController->listPosts();
}