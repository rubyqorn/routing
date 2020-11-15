<?php 

namespace Qonsillium;

use Qonsillium\Collections\CollectionUnit;
use Qonsillium\Collections\CollectionUnitList;
use Qonsillium\Collections\HeadersCollection;
use Qonsillium\Collections\CookieCollection;
use Qonsillium\Collections\FilesCollection;

class ResponseFacade
{
    /**
     * @var \Qonsillium\Collections\HeadersCollection 
     */ 
    protected ?HeadersCollection $headersCollection = null;

    /**
     * @var \Qonsillium\Collections\CookieCollection 
     */ 
    protected ?CookieCollection $cookieCollection = null;

    /**
     * @var \Qonsillium\Collections\FilesCollection 
     */ 
    protected ?FilesCollection $filesCollection = null;

    /**
     * Initiate ResponseFacade costructor method
     * with GET parameters, cookies, files and HTTP
     * headers
     * @return void 
     */ 
    public function __construct(
        array $cookie,
        array $files,
        array $headers
    ){
        $this->headersCollection = new HeadersCollection($headers);
        $this->cookieCollection = new CookieCollection($cookie);
        $this->filesCollection = new FilesCollection($files);
    }

    /**
     * Return list of cookies 
     * @return \Qonsillium\Collections\CollectionUnitList
     */ 
    public function requestCookieParameters(): CollectionUnitList
    {
        return $this->cookieCollection->getCollection();
    }

    /**
     * Return list of files parameters 
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestFilesParameters(): CollectionUnitList
    {
        return $this->filesCollection->getCollection();
    }

    /**
     * Return HTTP headers list
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestHeadersParameters(): CollectionUnitList
    {
        return $this->headersCollection->getCollection();
    }

    /**
     * Return specified unit by key value 
     * @param \Qonsillium\Collections\CollectionUnitList 
     * @return \Qonsillium\Collections\CollectionUnit
     */ 
    protected function getUnitByKey(CollectionUnitList $unitList, string $key): ?CollectionUnit
    {
        return $unitList->getUnitByKey($key);
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
