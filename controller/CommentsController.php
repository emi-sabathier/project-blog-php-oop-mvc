<?php
namespace Blog\controller;

use Blog\model\CommentsManager;

require_once 'model/CommentsManager.php';

class CommentsController
{
    public function postComment()
    {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $commentsManager = new CommentsManager();
                $newComment = $commentsManager->addComment($_GET['postId'], $_POST['author'], $_POST['comment']);

                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                exit;

            } else {
                header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
                exit;
            }

        } else {
            header('Location: index.php?action=displayPost&postId=' . $_GET['postId']);
            exit;
        }
    }
    public function listCommentsAdmin(){
        $commentsManager = new CommentsManager();
        $comments = $commentsManager->getListComments($_GET['postId']);
        require 'view/adminListCommentsView.php';
    }
}
