<?php

namespace Acme\Controller\Index;

use Core\ActionInterface;

class Index implements ActionInterface
{
    public function execute()
    {
        echo '<h1>Homepage</h1>';
    }
}