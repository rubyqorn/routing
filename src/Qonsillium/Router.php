<?php 

namespace Qonsillium;

abstract class Router
{
    private $matcher;

    private $collector;

    private $request;

    public function __construct()
    {
        $this->matcher = new RouteMatcher();
        $this->collector = new RouteCollector();
        $this->request = new Request();
    }

    private function getURI()
    {
        return $this->request->getUri();
    }

    private function getMethodName()
    {
        return $this->request->getMethod();
    }
    

    private function validatePath(string $specificPath, string $requestPath)
    {
        if ($this->matcher->matchPath($specificPath, $requestPath)) {
            return true;
        }

        return false;
    }

    private function validateMethod(string $specificMethod, string $requestMethod)
    {
        if ($this->matcher->matchMethod($specificMethod, $requestMethod)) {
            return true;
        }

        return false;
    }

    public function addRouter(Route $route)
    {
        if (!$this->validatePath($route->getRoute(), $this->getURI())) {
            return false;
        }

        if (!$this->validateMethod($route->getMethod(), $this->getMethodName())) {
            return false;
        }

        $this->collector->setRoute($route);
        return true;
    }

    abstract public function setRoute(string $route);

    abstract public function getRoute(): string;

    abstract public function setMethod(string $methodName);

    abstract public function getMethod(): string;

    abstract public function setHandler($handler);

    abstract public function getHandler();
}
