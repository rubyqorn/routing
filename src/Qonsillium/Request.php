<?php

namespace Qonsillium;

class Request extends RequestFacade
{
    /**
     * List of parameters with keys 
     * and values
     * @var array 
     */ 
    protected array $parameters = [];

    /**
     * Initialize Request constructor method
     * and set superglobal arrays with data
     * @return void 
     */ 
    public function __construct() 
    {
        parent::__construct(
            $_GET,
            $_POST,
            $_SERVER,
            $_COOKIE,
            $_FILES,
            [],
            []
        );
    }

    /**
     * Return list of GET parameters which 
     * was setted in query string or in 
     * superglobal array $_GET 
     * @return array 
     */ 
    public function get(): array
    {
        $list = $this->getUnitsList($this->requestGetParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    /**
     * Return list of POST parameters which
     * was sent by POST request or from 
     * superglobal array $_POST 
     * @return array 
     */ 
    public function post(): array
    {
        $list = $this->getUnitsList($this->requestPostParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    /**
     * Return an associative array of items uploaded
     * to the current script via HTTP POST method.
     * @return array
     */ 
    public function files(): array
    {
        $list = $this->getUnitsList($this->requestFilesParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    /**
     * Return an associative array with existent cookies
     * @return array 
     */ 
    public function cookie(): array
    {
        $list = $this->getUnitsList($this->requestCookieParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    /**
     * Return list of server attributes 
     * @return array 
     */ 
    public function serverAttributes(): array
    {
        $list = $this->getUnitsList($this->requestServerParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    public function headers(): array 
    {
        //TODO: Not implemented yet
    }

    public function body(): array
    {
        //TODO: Not implemented yet
    }
}
