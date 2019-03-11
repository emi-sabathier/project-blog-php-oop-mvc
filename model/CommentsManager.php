<?php

namespace Blog\model;

require_once 'Manager.php'; 

class CommentsManager extends Manager {

    public function addComment($postId, $author, $comment) {
        $db = $this->dbconnect();
        $q = $db->prepare('INSERT INTO comments(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $q->execute(array($postId, $author, $comment));
        $comment = $q->fetch();

        return $comment;
    }

}