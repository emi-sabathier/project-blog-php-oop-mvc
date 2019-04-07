<?php

namespace Blog\model;

require_once 'Manager.php';

class UsersManager extends Manager {
    /**
     * Get a user infos
     *
     * @param [string] $userLogin
     * @return array
     */
    public function getUser($userLogin){
        $db = $this->dbconnect();
        $q = $db->prepare('SELECT id, user_name, user_login, user_password, user_role FROM users WHERE user_login = ?');
        $q->execute(array($userLogin));
        $userInfos = $q->fetch();
        return $userInfos;
    }
    /**
     * Insert a new user inside the table "users", with infos
     *
     * @param [string] $userLogin
     * @param [string] $userName
     * @param [string] $hash
     */
    public function signUp($userLogin, $userName, $hash) {
        $db = $this->dbconnect();
        $q = $db->prepare('INSERT INTO users(user_login, user_name, user_password, user_role) VALUES(?, ?, ?, 0)');
        $q->execute(array($userLogin, $userName, $hash));
    }
}