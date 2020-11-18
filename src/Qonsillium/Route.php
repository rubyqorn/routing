<?php 

namespace Qonsillium;

class Route extends Router
{
    protected string $path;

    protected string $method;

    protected $handler;

    public function setRoute(string $route)
    {
        $this->path = $route;
    }

    public function getRoute(): string
    {
        return $this->path;
    }

    public function setMethod(string $methodName)
    {
        $this->method = $methodName;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    public function getHandler()
    {
        return $this->handler;
    }
}
