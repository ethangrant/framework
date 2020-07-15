<?php

namespace Core;

use Core\Http\RequestInterface;
use DI\Container;

class App implements AppInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var FrontControllerInterface
     */
    private $frontController;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * App constructor.
     *
     * @param FrontControllerInterface $frontController
     * @param RequestInterface $request
     */
    public function __construct(
        FrontControllerInterface $frontController,
        RequestInterface $request
    ) {
        $this->frontController = $frontController;
        $this->request = $request;
    }

    public function run()
    {
        $this->frontController->process($this->request);
    }

    public function container($container = null)
    {
        if ($container)
        {
            $this->container = $container;
        }

        return $this->container;
    }
}