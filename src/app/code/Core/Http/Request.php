<?php

namespace Core\Http;

class Request implements RequestInterface
{
    protected $actionName;

    protected $controllerName;

    protected $cookie;

    protected $env;

    protected $get;

    protected $params;

    protected $post;

    protected $server;

    protected $uri;

    public function __construct(
    ) {
        //$this->setEnv($_ENV);

        if ($_GET) {
            //$this->setQuery($_GET);
        }
        if ($_POST) {
            //$this->setPost($_POST);
        }
        if ($_COOKIE) {
            //$this->setCookies($_COOKIE);
        }

        $this->setServer($_SERVER);
    }

    public function getServer()
    {
        if ($this->server === null)
        {
            $this->server = $this->setServer($_SERVER);
        }

        return $this->server;
    }

    public function setServer(array $server)
    {
        $this->server = $server;

        $this->setUri($server['REQUEST_URI']);

        return $this;
    }

    public function getUri()
    {
        if($this->uri === null)
        {
            $this->uri = $this->getServer()['REQUEST_URI'];
        }

        return trim($this->uri, '/');
    }

    public function setUri(string $requestUri)
    {
        $this->uri = $requestUri;

        return $this;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;

        return $this;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function setActionName($actionName)
    {
        $this->actionName = $actionName;

        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}