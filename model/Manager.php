<?php

namespace Blog\model;

class Manager
{

    protected function dbconnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p4_blog;charset=utf8', 'root', '');
        return $db;
    }

}
