<?php

$container = require __DIR__  . '/../app/code/Core/bootstrap.php';

use Core\App;

/** @var App $app */
$app = $container->get(\Core\AppInterface::class);

// Sets container against app
$app->container($container);

$app->run();