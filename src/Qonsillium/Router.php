<?php 

namespace Qonsillium;

abstract class Router
{
    /**
     * @var \Qonsillium\RouteMatcher 
     */ 
    private ?RouteMatcher $matcher = null;

    /**
     * @var \Qonsillium\RouteCollector 
     */
    private ?RouteCollector $collector = null;

    /**
     * @var \Qonsillium\Request 
     */
    private ?Request $request = null;

    /**
     * Initiate Router contructor method 
     * and set dependencies which will be
     * resolver lately
     * @return void 
     */ 
    public function __construct()
    {
        // TODO: Resolve dependencies
        $this->matcher = new RouteMatcher();
        $this->collector = new RouteCollector();
        $this->request = new Request();
    }

    /**
     * Return current URI from query string 
     * @return string
     */ 
    private function getURI()
    {
        return $this->request->getUri();
    }

    /**
     * Return HTTP method from request
     * @return string 
     */ 
    private function getMethodName()
    {
        return $this->request->getMethod();
    }

    /**
     * Compare path from query string with path from specified
     * route
     * @param string $specificPath
     * @param string $requestPath
     * @return bool 
     */ 
    private function validatePath(string $specificPath, string $requestPath)
    {
        if ($this->matcher->matchPath($specificPath, $requestPath)) {
            return true;
        }

        return false;
    }

    /**
     * Compare method from HTTP request with specified method
     * from route 
     * @param string $specificMethod
     * @param string $requestMethod
     * @return bool 
     */ 
    private function validateMethod(string $specificMethod, string $requestMethod)
    {
        if ($this->matcher->matchMethod($specificMethod, $requestMethod)) {
            return true;
        }

        return false;
    }

    /**
     * Compare route path and HTTP method and call
     * specified user handler. While it can be only
     * callback function
     * @param \Qonsillium\Route
     * @return bool|null 
     */ 
    public function validateAndCallRoute(Route $route)
    {
        if (!$this->validatePath($route->getRoute(), $this->getURI())) {
            return false;
        }

        if (!$this->validateMethod($route->getMethod(), $this->getMethodName())) {
            return false;
        }

        if (!$this->collector->setRoute($route)) {
            return false;
        }
        
        call_user_func($route->getHandler());
    }

    /**
     * Route path setting
     * @param string $route
     * @return void 
     */ 
    abstract public function setRoute(string $route);

    /**
     * Return specified route path
     * @return string 
     */ 
    abstract public function getRoute(): string;

    /**
     * Route HTTP method setting
     * @param string $methodName
     * @return void 
     */ 
    abstract public function setMethod(string $methodName);

    /**
     * Return specified route HTTP method 
     * @return string 
     */ 
    abstract public function getMethod(): string;

    /**
     * Route handler setting. While can be only
     * callback function, lately will can set class
     * handlers
     * @param callback $handler
     * @return void 
     */ 
    abstract public function setHandler($handler);

    /**
     * Return route handler. While can be only
     * callback function, lately will can get class
     * handlers 
     * @return callback
     */ 
    abstract public function getHandler();
}
