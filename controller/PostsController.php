<?php
namespace Blog\controller;

use Blog\model\CommentsManager;
use Blog\model\PostsManager;

require_once 'model/PostsManager.php';
require_once 'model/CommentsManager.php';

class PostsController
{
    /**
     * List the posts
     * Call getListPosts from PostsManager
     * Display the view with every posts
     * Display the view
     */
    public function listPosts()
    {
        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();
        require 'view/listPostsView.php';
    }
    /**
     * Display the view of a single post
     * Check if the parameter postId, and the post exist
     * Call getListComments from PostsManager @param int $_GET['postId']
     * Display the view
     */
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
    /**
     * Display a post (admin)
     * Call getPost() from PostsManager @param int $_GET['postId']
     * Check if the parameter postId, and the post exist
     * Display the view
     */
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
    /**
     * Display the create post view
     */
    public function addPostAdmin()
    {        
        require 'view/adminCreatePostView.php';
    }
    /**
     * Create a post (admin)
     * Check if : 
     * title, content are not empty or with white space + if the admin session is ACTIVE (role = 1)
     * Call createPostAdmin() from PostsManager : @param string $_POST['title'], $_POST['content']
     * Display the view
     */
    public function createPostAdmin()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && strlen(trim($_POST['content'])) > 0 && $_SESSION['role'] == 1) {
            $postsManager = new PostsManager();
            $postCreated = $postsManager->createPostAdmin($_POST['title'], $_POST['content']);
            header('Location: index.php?action=addPost');
            exit;
        } else {
            header('Location: index.php?action=addPost');
            exit;
        }
    }
    /**
     * Edit a post (admin)
     * Check if : 
     * PostId exists + if the admin session is ACTIVE (role = 1)
     * Call getPost() from PostsManager @param int $_GET['postId']
     * Display the view
     */
    public function editPostAdmin(){
        
        if (isset($_GET['postId']) && ($_GET['postId'] > 0) && $_SESSION['role'] == 1) {
            $postsManager = new PostsManager();
            $post = $postsManager->getPost($_GET['postId']);
            require 'view/adminUpdatePostView.php';

        } else {
            header('Location: index.php');
            exit;
        }
    }
    /**
     * Update a post (admin)
     * Check if PostId exists + if the admin session is ACTIVE (role = 1)
     * Then, if title, content are filled and without only white spaces
     * Call updatePosstAdmin from PostsManager @param mixed $_POST['title'], $_POST['content'], $_GET['postId']
     */
    public function updatePostAdmin(){
        if (isset($_GET['postId']) && ($_GET['postId'] > 0) && $_SESSION['role'] == 1) {
            if(!empty($_POST['title']) && !empty($_POST['content']) && strlen(trim($_POST['content'])) ) {   
                $postsManager = new PostsManager();             
                $updatedPost = $postsManager->updatePostAdmin($_POST['title'], $_POST['content'], $_GET['postId']);
                header('Location: index.php?action=editPost&postId=' . $_GET['postId']);
                exit;
            } else {
                header('Location: index.php?action=editPost&postId=' . $_GET['postId']);
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
    /**
     * Delete a post (admin)
     * Check if PostId exists + if the admin session is ACTIVE (role = 1)
     * Call deletePostAdmin from PostsManager @param int $_GET['postId']
     * Call deleteCommentsAdmin from CommentsManager @param int $_GET['postId']
     */
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
