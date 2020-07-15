<?php

namespace Core\Http;

interface RequestInterface
{
    public function getServer();

    public function setServer(array $server);

    public function getUri();

    public function setUri(string $requestUri);

    public function getControllerName();

    public function setControllerName($controllerName);

    public function getActionName();

    public function setActionName($actionName);

    public function getParams();

    public function setParams($params);
}