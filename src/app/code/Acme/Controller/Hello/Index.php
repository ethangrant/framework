<?php

namespace Acme\Controller\Hello;

use Core\ActionInterface;

class Index implements ActionInterface
{
    public function execute()
    {
        echo '<h1>Hello Index</h1>';
    }
}