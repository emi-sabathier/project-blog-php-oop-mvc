<?php
namespace Blog\controller;

use Blog\model\PostsManager;

require_once 'model/PostsManager.php';

class PostsController
{
    public function listPosts()
    {

        $postsManager = new PostsManager();
        $posts = $postsManager->getListPosts();

        require 'view/listPostsView.php';

    }

}
