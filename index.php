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

    switch ($_GET['action']) {
        case 'listPosts':
            $postsController->listPosts();
            break;
        case 'displayPost':
            $postsController->displayPost();
            break;
        case 'postComment':
            $commentsController->postComment();
            break;
        case 'listComments':
            $commentsController->listComments();
            break;
        case 'login':
            $usersController->login();
            break;
        case 'disconnect':
            $usersController->disconnect();
            break;
        case 'adminPanel':
            $usersController->adminPanel();
            break;
        case 'deletePost':
            $postsController->deletePostAdmin();
            break;
        case 'viewPost':
            $postsController->displayPostAdmin();
            break;
        case 'addPost':
            $postsController->tinyMcePost();
            break;
        case 'createPost':
            $postsController->createPostAdmin();
            break;
        case 'editPost':
            $postsController->editPost();
            break;
        case 'updatePost':
            $postsController->updatePostAdmin();
            break;
        default:
            header('Location: index.php');
            exit;
    }
} else {
    $postsController = new PostsController();
    $postsController->listPosts();
}
