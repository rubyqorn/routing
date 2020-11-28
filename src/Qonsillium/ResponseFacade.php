<?php 

namespace Qonsillium;

use Qonsillium\Collections\CollectionsFactory;
use Qonsillium\Collections\CollectionUnitList;
use Qonsillium\Collections\CollectionUnit;

class ResponseFacade
{
    /**
     * @var \Qonsillium\Collections\CollectionsFactory 
     */ 
    private ?CollectionsFactory $collectionFactory;

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
        //Restricted access for GET, POST, HTTP body, server
        // parameters 
        $this->collectionFactory = new CollectionsFactory(
            [], [], $cookie, $files, $headers, [], []
        );
    }

    /**
     * Return list of cookies 
     * @return \Qonsillium\Collections\CollectionUnitList
     */ 
    public function requestCookieParameters(): CollectionUnitList
    {
        return $this->collectionFactory->getCookieParametersCollection()->getCollection();
    }

    /**
     * Return list of files parameters 
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestFilesParameters(): CollectionUnitList
    {
        return $this->collectionFactory->getFilesParametersCollection()->getCollection();
    }

    /**
     * Return HTTP headers list
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function requestHeadersParameters(): CollectionUnitList
    {
        return $this->collectionFactory->getHeadersParametersCollection()->getCollection();
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
