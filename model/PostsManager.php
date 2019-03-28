<?php

namespace Blog\model;

require_once 'Manager.php'; 

class PostsManager extends Manager 
{
    public function getListPosts() {
        $db = $this->dbconnect(); 
        $q = $db->query
        ('SELECT id, title,content, 
        DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr
        FROM posts
        ORDER BY post_date DESC');
        $posts = $q->fetchAll();        
        return $posts; 
    }

    public function getPost($postId) {
        $db = $this->dbConnect();
        $q = $db->prepare
        ('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr FROM posts WHERE id = ?');
        $q->execute(array($postId));
        $post = $q->fetch(); 
        return $post; 
    }
    public function getListPostsAdmin() {
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
    public function deletePostAdmin($postId) {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute(array($postId));
    }

    public function createPostAdmin($title, $content) {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO posts(title, content, post_date) VALUES(?, ?, NOW())');
        $q->execute(array($title, $content));
    }

    public function updatePostAdmin($title, $content, $postId){
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $q->execute(array($title, $content, $postId));
    }
}