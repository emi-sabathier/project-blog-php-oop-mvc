<?php
namespace Blog\controller;

use Blog\model\CommentsManager;
use Blog\model\PostsManager;

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

    public function displayPost()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {

            $postsManager = new PostsManager();
            $commentsManager = new CommentsManager();
            $post = $postsManager->getPost($_GET['postId']);
            $postComments = $commentsManager->getListComments($_GET['postId']);
            if (empty($post)) {
                header('Location: index.php');
                exit;
            } else {
                require 'view/postView.php';
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
    public function displayPostAdmin()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            $postsManager = new PostsManager();
            $post = $postsManager->getPost($_GET['postId']);

            require 'view/adminPostView.php';

        } else {
            header('Location: index.php');
            exit;
        }
    }
    public function addPost()
    {
        
        require 'view/createPostView.php';
    }
    public function createPostAdmin()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && $_SESSION['role'] == 1) {
            $postsManager = new PostsManager();
            $postCreated = $postsManager->createPostAdmin($_POST['title'], $_POST['content']);

            header('Location: index.php?action=addPost');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
    public function editPost(){
        
        if (isset($_GET['postId']) && ($_GET['postId'] > 0) && $_SESSION['role'] == 1) {
            $postsManager = new PostsManager();
            $post = $postsManager->getPost($_GET['postId']);
            require 'view/updatePostView.php';

        } else {
            header('Location: index.php');
            exit;
        }
    }
    public function updatePostAdmin(){
        if (isset($_GET['postId']) && ($_GET['postId'] > 0) && $_SESSION['role'] == 1) {
            if(!empty($_POST['title']) && !empty($_POST['content'])) {   
                $postsManager = new PostsManager();             
                $updatedPost = $postsManager->updatePostAdmin($_POST['title'], $_POST['content'], $_GET['postId']);
                header('Location: index.php?action=editPost&postId=' . $_GET['postId']);
                exit;
            } else {
                header('Location: index.php');
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
    public function deletePostAdmin()
    {
        if (isset($_GET['postId']) && ($_GET['postId'] > 0) && $_SESSION['role'] == 1) {
            $postsManager = new PostsManager();
            $commentsManager = new CommentsManager();
            $deletePost = $postsManager->deletePostAdmin($_GET['postId']);
            $deleteComments = $commentsManager->deleteCommentsAdmin($_GET['postId']);
            header('Location:index?action=adminPanel');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
}
