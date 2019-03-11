<?php
namespace Blog\controller;

use Blog\model\CommentsManager;

require_once 'model/CommentsManager.php';

class CommentsController
{

    public function postComment($postId, $author, $comment)
    {
        if (isset($_GET['idPost']) && $_GET['idPost'] > 0){

            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $commentsManager = new CommentsManager();
                $comments = $commentsManager->addComment($postId, $author, $comment);   

                header('Location: index.php?action=post&idPost=' . $postId);
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
}