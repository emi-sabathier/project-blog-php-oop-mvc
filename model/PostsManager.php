<?php

namespace Blog\model;

require_once 'Manager.php'; 

class PostsManager extends Manager 
{

    public function getListPosts() {

        $db = $this->dbconnect(); 
        $q = $db->query('SELECT posts.id, posts.title, posts.author_id, posts.content, users.user_name, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr FROM posts INNER JOIN users ON posts.author_id = users.id ORDER BY post_date DESC');
        $posts = $q->fetchAll();
        
        return $posts;
    }

    public function getPost($postId) {

        $db = $this->dbConnect();
        $q = $db->prepare('SELECT posts.id, posts.title, posts.author_id, users.user_name, posts.content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id = ?');
        $q->execute(array($postId));
        $post = $q->fetch(); 

        return $post;
    }

    public function deletePostAdmin($postId) {

        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute(array($postId));
        $deletePost = $q->fetch(); 

        return $deletePost;
    }
    public function deleteCommentsAdmin($postId) {

        $db = $this->dbConnect();     
        $q = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $q->execute(array($postId));
        $deleteComments = $q->fetch(); 

        return $deleteComments;
    }

    public function createPostAdmin($title, $content) {

        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO posts(title, content, author_id, post_date) VALUES(?, ?, 1, NOW())');
        $q->execute(array($title, $content));
        $createdPost = $q->fetch();

        return $createdPost;
    }

    public function updatePostAdmin($postId){
        $db = $this->dbConnect();
        $q = $db->prepare();
        $q->execute(array());
        $updatedPost = $q->fetch();

        return $updatePost;
    }
}



