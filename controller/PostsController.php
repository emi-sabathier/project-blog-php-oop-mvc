<?php
namespace Blog\controller;
use Blog\model\PostsManager; 
use Blog\model\CommentsManager; 

require_once 'model/PostsManager.php';
require_once 'model/CommentsManager.php';

class PostsController
{
    public function listPosts()
    {

        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();

        require 'view/listPostsView.php';

    }
    public function displayPost($postId)
    {

        if (isset($_GET['postId']) && $_GET['postId'] > 0) {

            $postsManager = new PostsManager();
            $commentsManager = new CommentsManager();
            $post = $postsManager->getPost($postId);
            $postComments = $commentsManager->getListComments($postId);

            require 'view/postView.php';

        } else {

            header('Location: index.php');
            exit;
        }
    }
    public function listPostsAdmin() {

    }
}
