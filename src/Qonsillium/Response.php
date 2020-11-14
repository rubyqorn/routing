<?php 

namespace Qonsillium;

class Response extends ResponseFacade implements Communicable
{
    /**
     * @var \Qonsillium\HttpStatus 
     */ 
    protected ?HttpStatus $httpStatus = null;

    public function __construct()
    {
        parent::__construct(
            $_GET,
            $_COOKIE,
            $_FILES,
            []
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
    public function getHttpStatus()
    {
        if (is_null($this->httpStatus)) {
            $this->httpStatus = new HttpStatus(200);
        }

        return $this->httpStatus->getHttpStatus();
    }
}
