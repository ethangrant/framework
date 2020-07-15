<?php

namespace Core;

use Core\Http\RequestInterface;

class FrontController implements FrontControllerInterface
{
    const DEFAULT_CONTROLLER_NAME = 'index';

    const DEFAULT_ACTION_NAME = 'index';

    const BASE_CONTROLLERS_PATTERN = '../app/code/*/Controller/';

    const MODULE_NAME_PATTERN = '/code\/(.*)\/Controller/';

    /**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * FrontController constructor.
     *
     * @param ActionFactory $actionFactory
     */
    public function __construct(
        ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }

    public function process(RequestInterface $request)
    {
        $actionName = '';
        $parts = $this->parseRequestUri($request->getUri());

        $request->setControllerName(ucfirst($parts['controllerName']))
            ->setActionName(ucwords($parts['actionName']))
            ->setParams($parts['params']);

        $controllerPathPattern = self::BASE_CONTROLLERS_PATTERN .
            $request->getControllerName() . '/' . $request->getActionName() . '*.php';

        $matchingActions = glob($controllerPathPattern, GLOB_NOSORT);

        if (empty($matchingActions))
        {
            $actionName = '\\Core\\Controller\\NotFound';
        }

        if (!$actionName)
        {
            preg_match(self::MODULE_NAME_PATTERN, $matchingActions[0], $matches);
            $moduleName = isset($matches[1]) ? $matches[1] : '';

            $class = [
                '',
                $moduleName,
                'Controller',
                $request->getControllerName(),
                $request->getActionName()
            ];

            $actionName = implode('\\', $class);
        }

        $actionInstance = $this->actionFactory->create($actionName);

        $actionInstance->execute();
        // Execute action and return and render result.
    }

    /**
     * @param string $uri
     * @return array
     */
    private function parseRequestUri(string $uri)
    {
        $parts = [];
        $splitUri = explode('/', $uri);

        $parts['controllerName'] = !empty($splitUri[0]) ? $splitUri[0] : self::DEFAULT_CONTROLLER_NAME;
        $parts['actionName'] = !empty($splitUri[1]) ? $splitUri[1] : self::DEFAULT_ACTION_NAME;

        if (count($splitUri) > 2)
        {
            unset($splitUri[0], $splitUri[1]);
            $parts['params'] = $splitUri;
        }

        return $parts;
    }
}