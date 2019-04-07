<?php
namespace Blog\model;

require_once 'Manager.php';

class CommentsManager extends Manager
{
    /**
     * Post a comment in a post
     *
     * @param [int] $postId
     * @param [int] $authorId
     * @param [string] $comment
     */
    public function addComment($postId, $authorId, $comment)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('INSERT INTO comments (post_id, author_id, content, comment_date) VALUES (?, ?, ?, NOW())');
        $q->execute(array($postId, $authorId, $comment));
    }
    /**
     * Get comments infos from table "comments" + user_name from "users" + post title from "posts"
     *
     * @param [int] $postId
     * @return array
     */
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
    /**
     * reportComment() send + 1 in comments table field "report"
     *
     * @param [int] $reportNb
     * @param [int] $commentId
     */
    public function reportComment($reportNb, $commentId)
    {
        $db = $this->dbconnect();
        $q = $db->prepare('UPDATE comments SET report = report + ? WHERE id = ?');
        $q->execute(array($reportNb, $commentId));
    }
    /**
     * Get reported comment(s) infos (admin)
     *
     * @return array
     */
    public function getReportedCommentsAdmin()
    {
        $db = $this->dbConnect();
        $q = $db->query
        ('SELECT comments.id, comments.author_id, comments.content, comments.post_id, comments.report, users.user_name, posts.title
        FROM comments
        INNER JOIN users ON comments.author_id = users.id
        INNER JOIN posts ON posts.id = comments.post_id
        WHERE report > 0
        ORDER BY report DESC ');
        $reportedComments = $q->fetchAll();
        return $reportedComments;
    }
    /**
     * Delete comments list of a post (admin)
     *
     * @param [int] $postId
     */
    public function deleteCommentsAdmin($postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $q->execute(array($postId));
    }
    /**
     * Delete a single comment (admin)
     *
     * @param [int] $commentId
     */
    public function deleteCommentAdmin($commentId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM comments WHERE id = ?');
        $q->execute(array($commentId));
    }
}
