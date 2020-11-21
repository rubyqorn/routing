<?php 

namespace Qonsillium;

class QonsilliumRouter
{
    /**
     * @var \Qonsillium\ServiceProvider 
     */ 
    protected ?ServiceProvider $serviceProvider = null;

    /**
     * List of registered routes
     * @param array 
     */ 
    protected array $routes = [];

    /**
     * Initiate QonsilliumRouter contrutor method 
     * and ServiceProvider class 
     * @return void 
     */ 
    public function __construct()
    {
        $this->serviceProvider = new ServiceProvider();
    }

    /**
     * Return HTTP request handler
     * @return \Qonsillium\Request  
     */ 
    public function getRequest(): Request
    {
        $request = $this->serviceProvider->getService('request');
        return new $request;
    }

    /**
     * Return HTTP response handler
     * @return \Qonsillium\Response 
     */ 
    public function getResponse(): Response
    {
        $response = $this->serviceProvider->getService('response');
        return new $response;
    }

    /**
     * Return route handler
     * @return \Qonsillium\Route 
     */ 
    public function getRoute(): Route
    {
        $route = $this->serviceProvider->getService('route');
        return new $route;
    }

    /**
     * Set HTTP method, path and handler in Route instance
     * @param string $method 
     * @param string $path 
     * @param callback $handler 
     * @return \Qonsillium\Route
     */ 
    protected function setDefinitions(string $method, string $path, $handler): Route
    {
        $route = $this->getRoute();
        $route->setMethod($method);
        $route->setRoute($path);
        $route->setHandler($handler);

        return $route;
    }

    /**
     * Register new route and validate availability in routes
     * list and if exists throw exception
     * @param \Qonsillium\Route
     * @throws \Exception 
     * @return bool 
     */ 
    protected function addRoute(Route $route)
    {
        if (in_array($route->getRoute(), array_keys($this->routes))) {
            throw new \Exception("Route with path '{$route->getRoute()}' already exists");
        }

        return $this->routes[$route->getRoute()] = $route;
    }

    /**
     * Validate exisetence of route and register it
     * with GET HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */ 
    public function get(string $path, $handler)
    {
        $route = $this->setDefinitions('GET', $path, $handler);

        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }

    /**
     * Validate exisetence of route and register it
     * with POST HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */
    public function post(string $path, $handler)
    {
        $route = $this->setDefinitions('POST', $path, $handler);
        
        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }

    /**
     * Validate exisetence of route and register it
     * with PUT HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */
    public function put(string $path, $handler)
    {
        $route = $this->setDefinitions('PUT', $path, $handler);
        
        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }

    /**
     * Validate exisetence of route and register it
     * with PATCH HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */
    public function patch(string $path, $handler)
    {
        $route = $this->setDefinitions('PATCH', $path, $handler);
        
        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }

    /**
     * Validate exisetence of route and register it
     * with HEAD HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */
    public function head(string $path, $handler)
    {
        $route = $this->setDefinitions('HEAD', $path, $handler);
        
        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }

    /**
     * Validate exisetence of route and register it
     * with DELETE HTTP method
     * @param string $path 
     * @param callback $handler 
     * @return bool 
     */
    public function delete(string $path, $handler)
    {
        $route = $this->setDefinitions('DELETE', $path, $handler);
        
        if (!$this->addRoute($route)) {
            return false;
        }

        if ($route->validateAndCallRoute($route)) {
            return true;
        }

        return false;
    }
}
