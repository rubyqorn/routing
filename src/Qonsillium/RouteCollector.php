<?php 

namespace Qonsillium;

class RouteCollector
{
    protected array $routes = [];

    public function setRoute(Route $route)
    {
        if (in_array($route->getRoute(), array_keys($this->routes))) {
            return false;
        }

        $this->routes[$route->getRoute()] = $route;
    }

    public function getRoute(string $route)
    {
        if (!in_array($route, array_keys($this->routes))) {    
            return false;
        }
        
        return $this->routes[$route];
    }
}
