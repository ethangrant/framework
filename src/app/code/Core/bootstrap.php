<?php

require __DIR__ . '/../../../vendor/autoload.php';

use DI\Container;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->addDefinitions(__DIR__ . '/etc/config.php');

/** @var Container $container */
$container = $containerBuilder->build();

return $container;