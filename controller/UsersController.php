<?php
namespace Blog\controller;

use Blog\model\PostsManager;
use Blog\model\UsersManager;
use Blog\model\CommentsManager;

require_once 'model/UsersManager.php';
require_once 'model/PostsManager.php';
require_once 'model/CommentsManager.php';
class UsersController
{
    public function login()
    {
        // Check if member or admin sessions exists
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == '1') {
                header('Location: index.php?action=adminPanel');
                exit;
                
            } elseif ($_SESSION['role'] == '0') {
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
                    if ($userInfos['user_role'] == '1') {
                        // adminPanel
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['login'] = $userInfos['user_name'];
                        $_SESSION['role'] = $userInfos['user_role']; 
                        header('Location: index.php?action=adminPanel');
                        exit;
                    } elseif ($userInfos['user_role'] == '0') {                        
                        
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