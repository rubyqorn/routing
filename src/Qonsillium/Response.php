<?php 

namespace Qonsillium;

class Response extends ResponseFacade implements Communicable
{
    /**
     * List of files, headers, cookies or
     * GET parameters
     * @var array 
     */ 
    protected array $parameters = [];

    /**
     * @var \Qonsillium\HttpStatus 
     */ 
    protected ?HttpStatus $httpStatus = null;

    public function __construct()
    {
        parent::__construct(
            $_COOKIE,
            $_FILES,
            headers_list()
        );
    }

    /**
     * Set HTTP status code and optionaly its message
     * @param int $httpCode
     * @param string|null $message 
     * @return void 
     */ 
    public function setHttpStatus(int $httpCode = 200, ?string $message = null)
    {
        $this->httpStatus = new HttpStatus($httpCode, $message);
    }

    /**
     * Return formated HTTP status code and message
     * values 
     * @return string 
     */ 
    public function getHttpStatus(): string
    {
        if (is_null($this->httpStatus)) {
            $this->httpStatus = new HttpStatus(200);
        }

        return $this->httpStatus->getHttpStatus();
    }

    /**
     * Return list of response headers in array
     * format
     * @return array
     */ 
    public function getResponseHeaders(): array
    {
        $list = $this->getUnitsList($this->requestHeadersParameters());

        foreach($list as $unit) {
            $this->parameters[] = $unit->getUnitParameter();
        }

        return $this->parameters;
    }

    /**
     * Set new HTTP header in headers list
     * @param string $headerName  | Content-Type
     * @param string $headerValue | application/json
     * @return void 
     */ 
    public function setHeader(string $headerName, string $headerValue)
    {
        return $this->headersCollection->attachHeaderCollection($headerName, $headerValue);
    }

    /**
     * Remove HTTP header from headers list 
     * @param string $headerName | Content-Type: application/json
     * @return bool 
     */ 
    public function removeHeader(string $headerName)
    {
        return $this->headersCollection->detachHeaderCollection($headerName);
    }

    /**
     * Set cookie using setcookie function and
     * create new cookie in collection 
     * @param string $name 
     * @param mixed $value
     * @param string $path
     * @param string $domain
     * @param bool $secure 
     * @param bool $httponly
     * @return bool
     */ 
    public function setCookie(
        string $name, 
        $value, 
        int $expire, 
        string $path = '/', 
        string $domain = '',
        bool $secure = false,
        bool $httponly = false
    ){
        $status = $this->cookieCollection->attachCookieCollection($name, [
            'value' => $value,
            'expire' => $expire,
            'path' => $path,
            'domain' => $domain,
            'secure' => $secure,
            'httponly' => $httponly
        ]);

        if (!$status) {
            return false;
        }

        return true;
    }

}
