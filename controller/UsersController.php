<?php

namespace Blog\controller;

use Blog\model\UsersManager;
use Blog\model\PostsManager;

session_start();

require_once 'model/UsersManager.php';
require_once 'model/PostsManager.php';

class UsersController
{

    public function login()
    {
        
        if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
            header('Location: index.php?action=adminPanel');
            exit;
            
        } else {
            
            require 'view/loginView.php';
    
            if (isset($_POST['userlogin'], $_POST['password'])) {
    
                $usersManager = new UsersManager();
                $userInfos = $usersManager->getUser($_POST['userlogin']);
    
                if (($_POST['userlogin'] !== $userInfos['user_login']) || ($_POST['password'] !== $userInfos['user_password'])) {
                    echo 'Un des 2 champs est incorrect';
                } else {
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['login'] = $userInfos['user_name'];
                    header('Location: index.php?action=adminPanel');
                    exit;
                }
            }
        }

    }
    public function adminPanel()
    {

        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();
        
        require 'view/adminView.php';

        return $posts;
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
