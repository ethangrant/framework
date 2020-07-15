<?php

use function DI\autowire;

use Core\App;
use Core\AppInterface;
use Core\FrontController;
use Core\FrontControllerInterface;
use Core\Http\Request;
use Core\Http\RequestInterface;

return [
    AppInterface::class => autowire(App::class),
    FrontControllerInterface::class => autowire(FrontController::class),
    RequestInterface::class => autowire(Request::class),
];