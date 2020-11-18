<?php 

namespace Qonsillium;

class QonsilliumRouter
{
    protected $serviceProvider;

    public function __construct()
    {
        $this->serviceProvider = new ServiceProvider(new Request, new Response);
    }

    public function getRequest(): Request
    {
        return $this->serviceProvider->request();
    }

    public function getResponse(): Response
    {
        return $this->serviceProvider->response();
    }

    protected function setDefinitions($method, string $path, $handler): Route
    {
        $route = new Route();
        $route->setMethod($method);
        $route->setRoute($path);
        $route->setHandler($handler);

        return $route;
    }

    public function get(string $path, $handler)
    {
        $route = $this->setDefinitions('GET', $path, $handler);
        
        if ($route->addRouter($route)) {
            return true;
        }

        return false;
    }
}
