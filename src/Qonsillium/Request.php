<?php

namespace Qonsillium;

use Qonsillium\Collections\BodyStream;
use Qonsillium\Collections\BodyParsedStream;

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
            getallheaders()
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

    /**
     * Return list of HTTP headers  
     * @return array
     */ 
    public function headers(): array 
    {
        $list = $this->getUnitsList($this->requestHeadersParameters());

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter(); 
        }

        return $this->parameters;
    }

    /**
     * Return list of body parameters in array
     * format. Also realized string format, but
     * doesn't exists in this class
     * 
     * \Qonstillium\Collections\BodyStream - string format
     * \Qonstillium\Collections\BodyParsedStream - array format
     * 
     *  @return array
     */ 
    public function bodyInArrayFormat(): array
    {
        $body = new BodyParsedStream();
        $list = $this->getUnitsList($this->requestBodyParameters($body));

        foreach($list as $unit) {
            $this->parameters[$unit->getUnitKey()] = $unit->getUnitParameter(); 
        }

        return $this->parameters;
    }
}
