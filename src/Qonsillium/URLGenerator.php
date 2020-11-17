<?php 

namespace Qonsillium;

class URLGenerator extends Route
{
    /**
     * @var \Qonsillium\Request 
     */ 
    protected ?Request $request = null;

    /**
     * Current URI name 
     * @var string  
     */ 
    protected string $uri;

    /**
     * Current host name
     * @var string  
     */ 
    protected string $host;

    /**
     * Current HTTP protocol name e.g. http, https
     * @var string 
     */ 
    protected string $protocol;

    /**
     * Initiate URLGenerator constructor method and
     * HTTP requests handler
     * @param \Qonsillium\Request 
     * @return void 
     */ 
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return current URI 
     * @return string 
     */ 
    protected function getCurrentUri(): string
    {
        return $this->request->getUri();
    }

    /**
     * Return current host
     * @return string 
     */ 
    protected function getCurrentHost(): string
    {
        return $this->request->getHost();
    }

    /**
     * Return current HTTP protocol name e.g. http or
     * https
     * @return string 
     */ 
    protected function getCurrentProtocol(): string
    {
        return $this->request->getProtocolName();
    }

    /**
     * Generate current host with protocol
     * and URI name
     * @return string
     */ 
    public function generate(): string
    {
        $this->uri = $this->getCurrentUri();
        $this->host = $this->getCurrentHost();
        $this->protocol = $this->getCurrentProtocol();

        return "{$this->protocol}://{$this->host}{$this->uri}";
    }
}
