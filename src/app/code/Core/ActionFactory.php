<?php

namespace Core;

use Core\AppInterface;

class ActionFactory
{
    /**
     * @param $actionName
     * @return ActionInterface
     */
    public function create($actionName)
    {
        if (!is_subclass_of($actionName, ActionInterface::class)) {
            throw new \InvalidArgumentException(
                'The action name provided is invalid. Verify the action name and try again.'
            );
        }

        return new $actionName();
    }
}