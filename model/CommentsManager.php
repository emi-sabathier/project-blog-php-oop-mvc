<?php
namespace Blog\model;

require_once 'Manager.php';
class CommentsManager extends Manager
{
    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('INSERT INTO comments(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $q->execute(array($postId, $author, $comment));
        $comment = $q->fetch();
        return $comment;
    }
    public function getListComments($postId)
    {
        $db = $this->dbconnect();
        $q = $db->prepare
        ('SELECT comments.id, comments.author, comments.content, comments.post_id, posts.title,
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')
        AS comment_date_fr
        FROM comments
        LEFT JOIN posts
        ON comments.post_id = posts.id
        WHERE post_id = ?
        ORDER BY comment_date DESC');
        $q->execute(array($postId));
        $comments = $q->fetchAll();
        return $comments;
    }
    public function reportComment($reportNb, $commentId)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('UPDATE comments SET report = ? WHERE id = ?');
        $q->execute(array($reportNb, $commentId));
    }
    public function getReportedComments(){
        $db = $this->dbConnect();
        $q = $db->query('SELECT id, author, content, post_id, report FROM comments WHERE report = "1" ');
        $reportedComments = $q->fetchAll();
        return $reportedComments;
    }
    public function deleteCommentsAdmin($postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $q->execute(array($postId));
    }
    public function deleteCommentAdmin($commentId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM comments WHERE id = ?');
        $q->execute(array($commentId));
    }
}
