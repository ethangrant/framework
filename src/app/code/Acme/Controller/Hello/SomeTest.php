<?php

namespace Acme\Controller\Hello;

use Core\ActionInterface;

class SomeTest implements ActionInterface
{
    public function execute()
    {
        echo '<h1>SomeTest</h1>';
    }
}