<?php 

namespace Qonsillium;


use Qonsillium\Collections\CollectionsFactory;
use Qonsillium\Collections\CollectionUnitList;

class RequestFacade
{
    private ?CollectionsFactory $collectionsFactory;

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
     * @param array $body,
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
        $this->collectionsFactory = new CollectionsFactory(
            $get, $post, $cookie, $files, $headers, $body, $server
        );
    }

    /**
     * Return collection list of GET parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestGetParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getGetParametersCollection()->getCollection();
    }

    /**
     * Return collection list of POST parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestPostParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getPostParametersCollection()->getCollection();
    }

    /**
     * Return collection list of server parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestServerParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getServerParametersCollection()->getCollection();
    }
    
    /**
     * Return collection list of cookie parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestCookieParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getCookieParametersCollection()->getCollection();
    }

    /**
     * Return colletion list of files parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestFilesParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getFilesParametersCollection()->getCollection();
    }

    /**
     * Return colletion list of HTTP body parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestBodyParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getBodyParametersCollection()->getCollection();
    }

    /**
     * Return colletion list of HTTP headers parameters
     * @return \Qonsillium\Collections\CollectionUnitList  
     */ 
    public function requestHeadersParameters(): CollectionUnitList
    {
        return $this->collectionsFactory->getHeadersParametersCollection()->getCollection();
    }

    /**
     * Return list of created collection units
     * @param \Qonsillium\Collections\CollectionUnitList
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
