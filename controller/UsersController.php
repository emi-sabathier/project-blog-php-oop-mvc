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
    /**
     * Sign in
     * Call getUser from UsersManager @param string $_POST['signinLogin']
     * Verify the hashed password @param string $_POST['signinPassword'], $userInfos['user_password']
     * If all is ok, creating session infos (getting id, user_name and user_role from the db)
     * display the signin view
     */
    public function signIn()
    {        
            $error = false;
            $msg = "";
            if (isset($_POST['signinLogin'], $_POST['signinPassword'])) {
                $usersManager = new UsersManager();
                $userInfos = $usersManager->getUser($_POST['signinLogin']);
                $hashCheck = password_verify($_POST['signinPassword'], $userInfos['user_password']);   

                if (($_POST['signinLogin'] !== $userInfos['user_login']) || ($hashCheck == false)) {
                    $error = true;
                    $msg = 'Un des 2 champs est incorrect';
                } else {
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['login'] = $userInfos['user_name'];
                    $_SESSION['role'] = $userInfos['user_role'];

                    if ($userInfos['user_role'] == '1') {
                        header('Location: index.php?action=adminPanel');
                        exit;
                    } elseif ($userInfos['user_role'] == '0') {
                        header('Location: index.php?action=listPosts');
                        exit;
                    }
                }
            }         
            require 'view/signinView.php';
    }
    /**
     * Sign Up Create a user
     * Check if signupLogin, signupUsername, signupPassword exists
     * If all is not empty,
     * Call getUser() from UsersManager @param string $_POST['signupLogin'] : to verify is the user already exists
     * If not, Call signUp from UsersManager @param string $_POST['signupLogin']),$_POST['signupUsername']
     * Display the view
     */
    public function signUp()
    {
        $error = false;
        $msg = "";
        if (isset($_POST['signupLogin'], $_POST['signupUsername'], $_POST['signupPassword'])) {            
            if (!empty($_POST['signupLogin']
            && !empty($_POST['signupPassword'])
            && !empty($_POST['signupUsername'])
            && strlen(trim($_POST['signupLogin'])) > 0
            && strlen(trim($_POST['signupPassword'])) > 0)) {
                $usersManager = new UsersManager();
                $userLogin = $usersManager->getUser($_POST['signupLogin']);                
                if ($_POST['signupLogin'] == $userLogin['user_login']) {
                    $error = true;
                    $msg = "Pseudo déjà utilisé";
                } else {
                    $hash = password_hash($_POST['signupPassword'], PASSWORD_DEFAULT);
                    $userCreation = $usersManager->signUp(htmlspecialchars($_POST['signupLogin']), htmlspecialchars($_POST['signupUsername']), $hash);
                    header('Location: index.php');
                    exit;
                }
            } 
        } else {
            $error = true;
            $msg = 'Pas d\'espace dans les champs';
        }
        require 'view/signupView.php';
    }
    /**
     * adminPanel
     * If a $_SESSION['role'] == 1 (admin)
     * Call getListPostsAdmin() from PostsManager + getReportedCommentsAdmin from CommentsManager
     * Display the admin view with these infos
     * If role == 0 or SESSION not set, redirect to the index
     */
    public function adminPanel()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == '1') {
                $postsManager = new PostsManager();
                $commentsManager = new CommentsManager();
                $posts = $postsManager->getListPostsAdmin();
                $reportedComments = $commentsManager->getReportedCommentsAdmin();
                require 'view/adminView.php';

            } elseif ($_SESSION['role'] == '0') {
                header('Location: index.php?action=listPosts');
                exit;
            }
        } else {
            header('Location: index.php?action=listPosts');
            exit;
        }
    }
    /**
     * Disconnect
     * Delete the current session
     */
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
