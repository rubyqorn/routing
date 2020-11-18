<?php 

namespace Qonsillium;

class ServiceProvider
{
    protected ?Request $request = null;

    protected ?Response $response = null;

    protected array $services = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;

        $this->register('request', $this->request);
        $this->register('response', $this->response);
    }

    public function register(string $serviceName, $handler)
    {
        $this->services[$serviceName] = $handler;
    }

    public function request(): Request
    {
        return $this->request;
    }

    public function response(): Response
    {
        return $this->response;
    }
}
