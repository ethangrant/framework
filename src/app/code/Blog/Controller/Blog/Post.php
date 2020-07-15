<?php

namespace Blog\Controller\Blog;

use Core\ActionInterface;

class Post implements ActionInterface
{
    public function execute()
    {
        echo '<h1>Blog Post</h1>';
    }
}