<?php

namespace Blog\controller;
use Blog\model\UsersManager; 

require_once 'model/UsersManager.php';

class UsersController {

    public function displayLogin() {
        
        require 'view/loginView.php';

        if(isset($_POST['userlogin'], $_POST['password'])) {

            $usersManager = new UsersManager();
            $userInfos = $usersManager->getUser($_POST['userlogin']);

            if (($_POST['userlogin'] !== $userInfos['user_login']) || ($_POST['password'] !== $userInfos['user_password'])) {
                echo 'Un des 2 champs est incorrect';          

            } elseif (($_POST['userlogin'] == $userInfos['user_login']) && ($_POST['password'] == $userInfos['user_password'])) {

                session_start();
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['login'] = $userInfos['user_name'];
                
                header('Location: view/adminView.php');
                exit;               
            
        } else {
            header('Location: view/loginView.php');
            exit;
            }
        }
    }
}