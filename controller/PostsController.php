<?php
namespace Blog\controller;
use Blog\model\PostsManager;

require_once 'model/PostsManager.php';

class PostsController
{
    public function listPosts()
    {

        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();

        require 'view/listPostsView.php';

    }
    public function displayPost($idPost)
    {

        if ($_GET['idPost'] && $_GET['idPost'] > 0) {

            $postsManager = new PostsManager();
            $post = $postsManager->getPost($idPost);

            require 'view/postView.php';

        } else {

            header('Location: index.php');
            exit;
        }
    }
}
