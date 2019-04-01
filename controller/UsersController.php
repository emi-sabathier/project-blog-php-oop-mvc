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
    public function signIn()
    {
        // redirection après login
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == '1') {
                header('Location: index.php?action=adminPanel');
                exit;

            } elseif ($_SESSION['role'] == '0') {
                header('Location: index.php?action=listPosts');
                exit;
            }
        } else {
            require 'view/signinView.php';
            if (isset($_POST['signinLogin'], $_POST['signinPassword'])) {
                $usersManager = new UsersManager();
                $userInfos = $usersManager->getUser($_POST['signinLogin']);
                $hashCheck = password_verify($_POST['signinPassword'], $userInfos['user_password']);
                if (($_POST['signinLogin'] !== $userInfos['user_login']) || ($hashCheck == false)) {
                    echo 'Un des 2 champs est incorrect';
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
        }
    }
    public function signUp()
    {
        require 'view/signupView.php';

        if (isset($_POST['signupLogin'], $_POST['signupUsername'], $_POST['signupPassword'])) {

            if (!empty($_POST['signupLogin'] && !empty($_POST['signupPassword']) && !empty($_POST['signupUsername']))) {

                $usersManager = new UsersManager();
                $userLogin = $usersManager->getUser($_POST['signupLogin']);

                if ($_POST['signupLogin'] == $userLogin['user_login']) {
                    echo "login déjà pris";
                } else {
                    $hash = password_hash($_POST['signupPassword'], PASSWORD_DEFAULT);
                    $userCreation = $usersManager->signUp(htmlspecialchars($_POST['signupLogin']), htmlspecialchars($_POST['signupUsername']), $hash);
                    header('Location: index.php');
                    exit;
                }
            } else {
                echo "Un des champs est vide";
            }
        } 
    }
    public function adminPanel()
    {
        $postsManager = new PostsManager();
        $commentsManager = new CommentsManager();
        $posts = $postsManager->getListPostsAdmin();
        $reportedComments = $commentsManager->getReportedComments();
        require 'view/adminView.php';
    }
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
