<?php

namespace Blog\model;

require_once 'Manager.php'; 

class PostsManager extends Manager 
{

    public function getListPosts() {

        $db = $this->dbconnect(); 
        $q = $db->query('SELECT posts.id, posts.title, posts.author_id, users.username, DATE_FORMAT(post_date, \'%d/%m/%Y %H:%i:%s\') AS post_date_fr FROM posts INNER JOIN users ON posts.author_id = users.id ORDER BY post_date DESC');
        $posts = $q->fetchAll();
        
        return $posts;
    }

    public function getPost($idPost) {

        $db = $this->dbConnect();
        $q = $db->prepare('SELECT posts.id, posts.title, posts.author_id, users.username, posts.content, DATE_FORMAT(post_date, \'%d/%m/%Y %H:%i:%s\') AS post_date_fr FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id = ?');
        $q->execute(array($idPost));
        $post = $q->fetch(); 

        return $post;
    }
}



