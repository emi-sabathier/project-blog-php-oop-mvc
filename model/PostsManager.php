<?php

namespace Blog\model;

require_once 'Manager.php';

class PostsManager extends Manager
{
    /**
     * Get posts infos
     *
     * @return array
     */
    public function getListPosts()
    {
        $db = $this->dbconnect();
        $q = $db->query
        ('SELECT id, title,content,
        DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') 
        AS post_date_fr
        FROM posts
        ORDER BY post_date DESC');
        $posts = $q->fetchAll();
        return $posts;
    }
    /**
     * Get infos of a single post
     *
     * @param [int] $postId
     * @return array
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare
        ('SELECT id, title, content, 
        DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\')
        AS post_date_fr
        FROM posts
        WHERE id = ?');
        $q->execute(array($postId));
        $post = $q->fetch();
        return $post;
    }
    /**
     * Get the posts list (admin)
     *
     * @return array
     */
    public function getListPostsAdmin()
    {
        $db = $this->dbconnect();
        $q = $db->query
        ('SELECT posts.id, posts.title, posts.content,
        DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr,
        COUNT(comments.id) AS nb_comments
        FROM posts
        LEFT JOIN comments
        ON posts.id = comments.post_id
        GROUP BY posts.id
        ORDER BY post_date DESC');
        $posts = $q->fetchAll();
        return $posts;
    }
    /**
     * Delete a single post (admin)
     *
     * @param [int] $postId
     */
    public function deletePostAdmin($postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute(array($postId));
    }
    /**
     * Create a post (admin)
     *
     * @param [string] $title
     * @param [string] $content
     */
    public function createPostAdmin($title, $content)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO posts(title, content, post_date) VALUES(?, ?, NOW())');
        $q->execute(array($title, $content));
    }
    /**
     * Update a post (admin)
     *
     * @param [string] $title
     * @param [string] $content
     * @param [int] $postId
     */
    public function updatePostAdmin($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $q->execute(array($title, $content, $postId));
    }
}
