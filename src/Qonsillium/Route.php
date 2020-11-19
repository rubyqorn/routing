<?php 

namespace Qonsillium;

class Route extends Router
{
    /**
     * Route path name 
     * @var string  
     */ 
    protected string $path;

    /**
     * Route HTTP method 
     * @var string  
     */
    protected string $method;

    /**
     * Route handler. Can be only callback
     * function 
     * @var callback  
     */
    protected $handler;

    /**
     * Route path setting
     * @param string $route
     * @return void 
     */ 
    public function setRoute(string $route)
    {
        $this->path = $route;
    }

    /**
     * Return specified route path
     * @return string 
     */
    public function getRoute(): string
    {
        return $this->path;
    }

    /**
     * Route HTTP method setting
     * @param string $methodName
     * @return void 
     */ 
    public function setMethod(string $methodName)
    {
        $this->method = $methodName;
    }

    /**
     * Return specified route HTTP method 
     * @return string 
     */ 
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Route handler setting. While can be only
     * callback function, lately will can set class
     * handlers
     * @param callback $handler
     * @return void 
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Return route handler. While can be only
     * callback function, lately will can get class
     * handlers 
     * @return callback
     */
    public function getHandler()
    {
        return $this->handler;
    }
}
