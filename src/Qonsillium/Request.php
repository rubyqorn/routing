<?php

namespace Qonsillium;

use Qonsillium\Collections\BodyStream;
use Qonsillium\Collections\BodyParsedStream;

class Request extends RequestFacade implements Communicable
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
        $body = new BodyParsedStream();

        parent::__construct(
            $_GET,
            $_POST,
            $_SERVER,
            $_COOKIE,
            $_FILES,
            $body->getContent(),
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

    /**
     * Validate cookie name existence in list
     * @param string $cookieName
     * @return bool
     */ 
    public function cookieExists(string $cookieName): bool
    {
        if (!isset($this->cookie()[$cookieName])) {
            return false;
        }

        return true;
    }

    /**
     * Return cookie by specified name or false
     * data type
     * @param string $cookieName
     * @return bool|mixed
     */ 
    public function getCookieByName(string $cookieName)
    {
        if (!isset($this->cookie()[$cookieName])) {
            return false;
        }

        return $this->cookie()[$cookieName];
    }

    /**
     * The IP address of the server under which 
     * the current script is executing 
     * @return bool|string
     */ 
    public function getIP()
    {
        $address = $this->serverAttributes()['REMOTE_ADDR'];

        if (!$address) {
            return false;
        }

        return $address;
    }

    /**
     * The port being used on the user's machine to 
     * communicate with the web server 
     * @return bool|string
     */ 
    public function getPort()
    {
        $port = $this->serverAttributes()['REMOTE_PORT'];

        if (!$port) {
            return false;
        }

        return $port;
    }

    /**
     * Name and revision of the information protocol via 
     * which the page was requested; e.g. 'HTTP/1.1' 
     */ 
    public function getProtocol()
    {
        $protocol = $this->serverAttributes()['SERVER_PROTOCOL'];

        if (!$protocol) {
            return false;
        }

        return $protocol;
    }

    /**
     * Name of the information protocol via which 
     * the page was requested; e.g. 'http' or 'https' 
     * @return bool|string
     */ 
    public function getProtocolName()
    {
        $protocol = $this->getProtocol();

        if (!$protocol) {
            return false;
        }

        return explode('/', strtolower($protocol))['0'];
    }

    /**
     * Protocol version via which the page was requested;
     * e.g. '1.1' 
     * @return bool|string
     */ 
    public function getProtocolVersion()
    {
        $protocol = $this->getProtocol();

        if (!$protocol) {
            return false;
        }

        return explode('/', strtolower($protocol))['1'];
    }

    /**
     * The name of the server host under which the 
     * current script is executing. If the script is running 
     * on a virtual host, this will be the value defined 
     * for that virtual host
     * @return bool|string 
     */ 
    public function getServerName()
    {
        $serverName = $this->serverAttributes()['SERVER_NAME'];

        if (!$serverName) {
            return false;
        }

        return $serverName;
    }

    /**
     * The port on the server machine being used by the web server 
     * for communication. For default setups, this will be '80'; 
     * using SSL, for instance, will change this to whatever your 
     * defined secure HTTP port is
     * @return bool|string
     */ 
    public function getServerPort()
    {
        $serverPort = $this->serverAttributes()['SERVER_PORT'];

        if (!$serverPort) {
            return false;
        }

        return $serverPort;
    }

    /**
     * The URI which was given in order to access this page; for instance, 
     * '/index.php'
     * @return bool|string 
     */ 
    public function getUri()
    {
        $uri = $this->serverAttributes()['REQUEST_URI'];

        if (!$uri) {
            return false;
        }

        return $uri;
    }

    /**
     * Contents of the Host: header from the current request, 
     * if there is one. 
     * @return bool|string
     */ 
    public function getHost()
    {
        $host = $this->serverAttributes()['HTTP_HOST'];

        if (!$host) {
            return false;
        }

        return $host;
    }

    /**
     * Return full path way where script was executed
     * 'http://localhost/index.php'
     * @return bool|string 
     */ 
    public function getFullPath()
    {
        $protocol = $this->getProtocol();
        $host = $this->getHost();
        $uri = $this->getUri();

        if (!$protocol || !$host || !$uri) {
            return false;
        }

        return "{$protocol}://{$host}{$uri}";
    }

    /**
     * Which request method was used to access the page; 
     * e.g. 'GET', 'HEAD', 'POST', 'PUT'
     * @return bool|string 
     */ 
    public function getMethod()
    {
        $httpMethod = $this->serverAttributes()['REQUEST_METHOD'];

        if (!$httpMethod) {
            return false;
        }

        return $httpMethod;
    }

    /**
     * Compare specified method name with REQUEST_METHOD.
     * Must set 'GET','POST'. Another methods doesn't 
     * implemented yes
     * @return bool 
     */ 
    public function isMethod(string $methodName): bool 
    {
        $httpMethod = $this->getMethod();

        if ($httpMethod !== $methodName) {
            return false;
        }

        return true;
    }

    /**
     * Contents of the Connection: header from the current 
     * request, if there is one. Example: 'Keep-Alive'
     * @return bool|string 
     */ 
    public function getConnectionStatus()
    {
        $connection = $this->serverAttributes()['HTTP_CONNECTION'];

        if (!$connection) {
            return false;
        }

        return $connection;
    }

    /**
     * Contents of the User-Agent: header from the current request, 
     * if there is one
     * @return bool|string
     */ 
    public function getUserAgent()
    {
        $userAgent = $this->serverAttributes()['HTTP_USER_AGENT'];

        if (!$userAgent) {
            return false;
        }

        return $userAgent;
    }

    /**
     * Validate if protocol was executed on HTTPS
     * host
     * @return bool
     */ 
    public function isSecure(): bool
    {
        $secureStatus = $this->getProtocolName();

        if (!$secureStatus) {
            return false;
        }

        return true;
    }
}
