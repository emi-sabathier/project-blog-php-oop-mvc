<?php

namespace Blog\model;

require_once 'Manager.php';

class UsersManager extends Manager {

    public function getUser($userLogin){
        $db = $this->dbconnect();
        $q = $db->prepare('SELECT id, user_name, user_login, user_password, user_role FROM users WHERE user_login = ?');
        $q->execute(array($userLogin));
        $userInfos = $q->fetch();

        return $userInfos;
    }

}