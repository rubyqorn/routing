<?php 

namespace Qonsillium;

class ServiceProvider extends ServiceContainer
{
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
        if (isset($this->services[$serviceName])) {
            return $this->services[$serviceName];
        }

        return false;
    }
}
