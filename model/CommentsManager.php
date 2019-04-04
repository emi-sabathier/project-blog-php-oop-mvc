<?php
namespace Blog\model;

require_once 'Manager.php';
class CommentsManager extends Manager
{
    public function addComment($postId, $authorId, $comment)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('INSERT INTO comments (post_id, author_id, content, comment_date) VALUES (?, ?, ?, NOW())');
        $q->execute(array($postId, $authorId, $comment));
        $comment = $q->fetch();
        return $comment;
    }
    public function getListComments($postId)
    {
        $db = $this->dbconnect();
        $q = $db->prepare
        ('SELECT comments.id, comments.author_id, comments.content, comments.post_id, posts.title, users.user_name, 
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') 
        AS comment_date_fr 
        FROM comments 
        INNER JOIN posts ON comments.post_id = posts.id 
        INNER JOIN users ON comments.author_id = users.id WHERE post_id = ?
        ORDER BY comment_date DESC');
        $q->execute(array($postId));
        $comments = $q->fetchAll();
        return $comments;
    }
    public function reportComment($reportNb, $commentId)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('UPDATE comments SET report = report + ? WHERE id = ?');
        $q->execute(array($reportNb, $commentId));
    }
    public function getReportedComments(){
        $db = $this->dbConnect();
        $q = $db->query
        ('SELECT comments.id, comments.author_id, comments.content, comments.post_id, comments.report, users.user_name, posts.title
        FROM comments
        INNER JOIN users ON comments.author_id = users.id
        INNER JOIN posts ON posts.id = comments.post_id
        WHERE report > 0 ');
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
