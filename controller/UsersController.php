<?php

namespace Blog\controller;

session_start();
use Blog\model\PostsManager;
use Blog\model\UsersManager;


require_once 'model/UsersManager.php';
require_once 'model/PostsManager.php';

class UsersController
{
    public function login()
    {
        // Check if member or admin sessions exists
        if (isset($_SESSION['role'])) {

            if ($_SESSION['role'] == 'admin') {
                header('Location: index.php?action=adminPanel');
                exit;
                
            } elseif ($_SESSION['role'] == 'member') {
                header('Location: index.php?action=listPosts');
                exit;
            }
        } else {
            require 'view/loginView.php';
            if (isset($_POST['userlogin'], $_POST['password'])) {

                $usersManager = new UsersManager();
                $userInfos = $usersManager->getUser($_POST['userlogin']);

                if (($_POST['userlogin'] !== $userInfos['user_login']) || ($_POST['password'] !== $userInfos['user_password'])) {
                    echo 'Un des 2 champs est incorrect';
                } else {
                    if ($userInfos['user_role'] == 'admin') {
                        // adminPanel
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['login'] = $userInfos['user_name'];
                        $_SESSION['role'] = $userInfos['user_role']; 
                        header('Location: index.php?action=adminPanel');
                        exit;

                    } elseif ($userInfos['user_role'] == 'member') {                        
                        
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['login'] = $userInfos['user_name']; 
                        $_SESSION['role'] = $userInfos['user_role']; 

                        header('Location: index.php?action=listPosts');
                        exit;
                    }
                }
            }
        }
    }
    public function adminPanel()
    {
        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();
        require 'view/adminView.php';
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
