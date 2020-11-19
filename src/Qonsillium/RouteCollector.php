<?php 

namespace Qonsillium;

class RouteCollector
{
    /**
     * List of available routes
     * @param array 
     */ 
    protected array $routes = [];

    /**
     * Validate route existence in list and set it
     * @param \Qonsillium\Route
     * @return bool 
     */ 
    public function setRoute(Route $route)
    {
        if (in_array($route->getRoute(), array_keys($this->routes))) {
            return false;
        }

        $this->routes[$route->getRoute()] = $route;
        return true;
    }

    /**
     * Validate route existence by path name in list 
     * and return it
     * @param string $route 
     * @return \Qonsillium\Route 
     */ 
    public function getRoute(string $route)
    {
        if (!in_array($route, array_keys($this->routes))) {    
            return false;
        }
        
        return $this->routes[$route];
    }
}
