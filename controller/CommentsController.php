<?php
namespace Blog\controller;
use Blog\model\CommentsManager;

require_once 'model/CommentsManager.php';
class CommentsController
{
    public function postComment()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (isset($_SESSION['login']) && !empty($_POST['comment']) && strlen(trim($_POST['comment'])) > 0) {
                $commentsManager = new CommentsManager();
                $newComment = $commentsManager->addComment($_GET['postId'], $_SESSION['id'], $_POST['comment']);

                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                exit;
            } else {
                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
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
    public function deleteCommentAdmin()
    {
        $commentsManager = new CommentsManager();
        $deleteComment = $commentsManager->deleteCommentAdmin($_GET['commentId']);
        header('Location: index.php?action=adminPanel');
        exit;
    }
    public function reportCommentAdmin()
    {        
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                $commentsManager = new CommentsManager();
                $reportComment = $commentsManager->reportComment($_POST['reportNb'], $_GET['commentId']);
                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
            } else {
                header('Location: index.php');
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }
        
    }
}
