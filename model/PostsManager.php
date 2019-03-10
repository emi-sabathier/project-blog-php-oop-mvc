<?php

namespace Blog\model;

require_once 'Manager.php'; 

class PostsManager extends Manager 
{

    public function getListPosts() {

        $db = $this->dbconnect(); // this.dbConnect()
        $q = $db->query('SELECT id, title, author, DATE_FORMAT(creation_date, \'%d/%m/%Y %H:%i:%s\') AS date_fr FROM posts ORDER BY creation_date DESC');
        $posts = $q->fetchAll();
        
        return $posts;
    }

    public function getPost($idPost) {

        $db = $this->dbConnect();
        $q = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y %H:%i:%s\') AS date_fr FROM posts WHERE id = ?');
        $q->execute(array($idPost));
        $post = $q->fetch(); 

        return $post;
    }
}



