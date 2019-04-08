<?php
namespace Blog\controller;

use Blog\model\CommentsManager;
use Blog\model\PostsManager;

require_once 'model/CommentsManager.php';
require_once 'model/PostsManager.php';
class CommentsController
{
    /**
     * Control if a comment is valid, before posting it >
     * Session active (member can post a comment) +
     * Not an empty comment
     * Not only white spaces
     * Call addComment() from CommentsManager @param mixed $_GET['postId'], $_SESSION['id'], $_GET['comment']
     */
    public function postComment()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (isset($_SESSION['login']) && !empty($_POST['comment']) && strlen(trim($_POST['comment'])) > 0) {
                $commentsManager = new CommentsManager();
                $postsManager = new PostsManager();
                $post = $postsManager->getPost($_GET['postId']);
                if(!empty($post)) {
                    $newComment = $commentsManager->addComment($_GET['postId'], $_SESSION['id'], $_POST['comment']);
                    header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                    exit;
                } else {
                    header('Location: index.php');
                    exit;
                }                
            } else {
                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
    /**
     * List the comments of a post (admin)
     * Call getListsComments from CommentsManager @param int $_GET['postId']
     * Display the view with every comments
     */
    public function listCommentsAdmin()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            $commentsManager = new CommentsManager();
            $comments = $commentsManager->getListComments($_GET['postId']);
            require 'view/adminListCommentsView.php';
        } else {
            header('Location: index.php?action=adminPanel');
            exit;
        }
    }
    /**
     * Delete a comment (admin)
     * Call deleteCommentAdmin() from CommentsManager @param int $_GET['commentId']
     */
    public function deleteCommentAdmin()
    {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            $commentsManager = new CommentsManager();
            $deleteComment = $commentsManager->deleteCommentAdmin($_GET['commentId']);
            header('Location: index.php?action=adminPanel');
            exit;
        } else {
            header('Location: index.php?action=adminPanel');
            exit;
        }
    }
    /**
     * Report a comment
     * Call reportComment() from CommentsManager @param int $_POST['reportNb'], $_GET['commentId']
     */
    public function reportComment()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                $commentsManager = new CommentsManager();
                $reportComment = $commentsManager->reportComment($_POST['reportNb'], $_GET['commentId']);
                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
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
    /**
     * Reset the reported comments
     * Call resetReportAdmin from CommentsManager @param int $_GET['commentId']
     */
    public function resetReportAdmin() 
    {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            $commentsManager = new CommentsManager();
            $reportComment = $commentsManager->resetReportAdmin($_GET['commentId']);
            header('Location: index.php?action=adminPanel');
            exit;
        } else {
            header('Location: index.php?action=adminPanel');
            exit;
        }
    }
}
