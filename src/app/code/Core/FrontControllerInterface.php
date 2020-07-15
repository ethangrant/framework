<?php

namespace Core;

use Core\Http\RequestInterface;

interface FrontControllerInterface
{
    public function process(RequestInterface $request);
}