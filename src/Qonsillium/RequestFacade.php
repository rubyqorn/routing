<?php 

namespace Qonsillium;

use Qonsillium\Collections\BodyCollection;
use Qonsillium\Collections\CollectionUnitList;
use Qonsillium\Collections\FilesCollection;
use Qonsillium\Collections\CookieCollection;
use Qonsillium\Collections\ServerCollection;
use Qonsillium\Collections\HeadersCollection;
use Qonsillium\Collections\ParametersCollection;

class RequestFacade
{
    /**
     * Parameters from $_GET superglobal
     * array 
     * @var array 
     */ 
    protected array $getParameters;

    /**
     * Parameters from $_POST superglobal
     * array 
     * @var array 
     */
    protected array $postParameters;

    /**
     * Parameters from $_COOKIE superglobal
     * array 
     * @var array 
     */
    protected array $cookieParameters;

    /**
     * Parameters from $_SERVER superglobal
     * array 
     * @var array 
     */
    protected array $serverParameters;

    /**
     * Parameters from $_FILES superglobal
     * array 
     * @var array 
     */
    protected array $filesParameters;

    /**
     * Parameters from HTTP body
     * @var array 
     */
    protected array $bodyParameters;

    /**
     * Parameters from HTTP headers 
     * @var array 
     */
    protected array $headersParameters;

    /**
     * Initiate Request constructor method and
     * set $_GET, $_POST, $_SERVER, $_COOKIE,
     * $_FILES and data from HTTP header and 
     * body
     * @param array $get 
     * @param array $post
     * @param array $server
     * @param array $cookie,
     * @param array $files,
     * @param array $body 
     * @param array $headers
     * @return void 
     */ 
    public function __construct(
        array $get,
        array $post,
        array $server,
        array $cookie,
        array $files,
        array $body, 
        array $headers
    ){
        $this->getParameters = $get;
        $this->postParameters = $post;
        $this->serverParameters = $server;
        $this->cookieParameters = $cookie;
        $this->filesParameters = $files;
        $this->bodyParameters = $body;
        $this->headersParameters = $headers;
    }

    /**
     * Return collection list of GET parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestGetParameters(): CollectionUnitList
    {
        $collection = new ParametersCollection($this->getParameters);
        return $collection->getCollection();
    }

    /**
     * Return collection list of POST parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestPostParameters(): CollectionUnitList
    {
        $collection = new ParametersCollection($this->postParameters);
        return $collection->getCollection();
    }

    /**
     * Return collection list of server parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestServerParameters(): CollectionUnitList
    {
        $collection = new ServerCollection($this->serverParameters);
        return $collection->getCollection();
    }
    
    /**
     * Return collection list of cookie parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestCookieParameters(): CollectionUnitList
    {
        $collection = new CookieCollection($this->cookieParameters);
        return $collection->getCollection();
    }

    /**
     * Return colletion list of files parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestFilesParameters(): CollectionUnitList
    {
        $collection = new FilesCollection($this->filesParameters);
        return $collection->getCollection();
    }

    /**
     * Return colletion list of HTTP body parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestBodyParameters(): CollectionUnitList
    {
        $collection = new BodyCollection($this->bodyParameters);
        return $collection->getCollection();
    }

    /**
     * Return colletion list of HTTP headers parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestHeadersParameters(): CollectionUnitList
    {
        $collection = new HeadersCollection($this->headersParameters);
        return $collection->getCollection();
    }
}
