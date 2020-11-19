<?php 

namespace Qonsillium;

class ServiceProvider
{
    /**
     * @var \Qonsillium\Request 
     */ 
    protected ?Request $request = null;

    /**
     * @var \Qonsillium\Response 
     */
    protected ?Response $response = null;

    /**
     * List of registered services
     * @param array 
     */ 
    protected array $services = [];

    /**
     * Initiate ServiceProvider constructor method 
     * and register response and request handlers
     * @param \Qonsillium\Request
     * @param \Qonsillium\Response
     * @return void 
     */ 
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;

        $this->register('request', $this->request);
        $this->register('response', $this->response);
    }

    /**
     * Register new service with specific name 
     * @param string $serviceName
     * @param mixed $handler 
     * @return void 
     */ 
    public function register(string $serviceName, $handler)
    {
        $this->services[$serviceName] = $handler;
    }

    /**
     * Return service handler by registered name 
     * @param string $serviceName
     * @return bool|mixed 
     */ 
    public function getService(string $serviceName)
    {
        if (isset($$tis->services[$serviceName])) {
            return $this->services[$serviceName];
        }

        return false;
    }
}
