<?php

namespace Core\Controller;

use Core\ActionInterface;

class NotFound implements ActionInterface
{
    public function execute()
    {
        echo '<h1>404 Page Not Found</h1>';
    }
}