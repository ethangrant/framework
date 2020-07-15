<?php

namespace Acme\Controller\Hello;

use Core\ActionInterface;

class World implements ActionInterface
{
    public function execute()
    {
        echo '<h1>Hello World</h1>';
    }
}