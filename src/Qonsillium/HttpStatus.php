<?php 

namespace Qonsillium;

class HttpStatus
{
    /**
     * List of available HTTP status codes
     * @var array
     */ 
    protected $httpStatuses = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
    ];

    /**
     * HTTP status code
     * @var int 
     */ 
    protected int $httpCode;

    /**
     * HTTP status message 
     * @var string 
     */ 
    protected string $message;

    /**
     * Initiate HttpStatus constructor method and set HTTP
     * status code and message values
     * @param int $code 
     * @param string|null $message 
     * @return void
     */ 
    public function __construct(int $code, ?string $message = null)
    {
        $this->setCode($code);

        if (is_null($message)) {
            return $this->setMessage($this->httpStatuses[$this->httpCode]);
        }

        $this->message = $message;
    }

    /**
     * Set HTTP status code 
     * @param int $httpCode
     * @return void 
     */ 
    public function setCode(int $httpCode)
    {
        $codes = array_keys($this->httpStatuses); 

        if (!array_keys($codes, $httpCode)) {
            throw new \Exception("Status code {$this->httpCode} doesn't exists in list");
        }

        $this->httpCode = $httpCode;
    }
    
    /**
     * Return HTTP status code
     * @return int  
     */ 
    public function getCode(): int
    {
        return $this->httpCode;
    }

    /**
     * Set HTTP status message 
     * @param string $message
     * @return void 
     */ 
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * Return HTTP status message
     * @return string 
     */ 
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Return formatted HTTP status message
     * with code 
     * @return string 
     */ 
    public function getHttpStatus(): string
    {
        $intCodeToStringFormated = (string) $this->httpCode;

        return "{$intCodeToStringFormated} {$this->message}";
    }
}
