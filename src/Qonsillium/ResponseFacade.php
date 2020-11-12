<?php 

namespace Qonsillium;

use Qonsillium\Collections\ParametersCollection;
use Qonsillium\Collections\CollectionUnitList;
use Qonsillium\Collections\HeadersCollection;
use Qonsillium\Collections\CookieCollection;
use Qonsillium\Collections\FilesCollection;

class ResponseFacade
{
    /**
     * List of GET HTTP parameters
     * @var array 
     */ 
    protected array $getParameters;

    /**
     * List of existence cookie 
     * @var array 
     */ 
    protected array $cookieParameters;

    /**
     * List of files
     * @var array 
     */ 
    protected array $filesParameters;

    /**
     * List of HTTP headers
     * @var array 
     */ 
    protected array $headersParameters;

    /**
     * Initiate ResponseFacade costructor method
     * with GET parameters, cookies, files and HTTP
     * headers
     * @return void 
     */ 
    public function __construct(
        array $get,
        array $cookie,
        array $files,
        array $headers
    ){
        $this->getParameters = $get;
        $this->cookieParameters = $cookie;
        $this->filesParameters = $files;
        $this->headersParameters = $headers;
    }

    /**
     * Return list of GET HTTP parameters from
     * query string 
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestGetParameters(): CollectionUnitList
    {
        $collection = new ParametersCollection($this->getParameters);
        return $collection->getCollection();
    }

    /**
     * Return list of cookies 
     * @return \Qonsillium\Collections\CollectionUnitList
     */ 
    public function requestCookieParameters(): CollectionUnitList
    {
        $collection = new CookieCollection($this->cookieParameters);
        return $collection->getCollection();
    }

    /**
     * Return list of files parameters 
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestFilesParameters(): CollectionUnitList
    {
        $collection = new FilesCollection($this->filesParameters);
        return $collection->getCollection();
    }

    /**
     * Return HTTP headers list
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestHeadersParameters(): CollectionUnitList
    {
        $collection = new HeadersCollection($this->headersParameters);
        return $collection->getCollection();
    }

    /**
     * Retrive collection and return in array represent
     * @param \Qonsillium\Collections\CollectionUnitList  $collection
     * @return array
     */ 
    protected function getUnitsList(CollectionUnitList $collection): array
    {
        $list = $collection->getUnitsList();

        if (!$list) {
            return [];
        }

        return $list;
    }
}
