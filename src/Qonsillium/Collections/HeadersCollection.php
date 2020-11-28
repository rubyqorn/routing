<?php 

namespace Qonsillium\Collections;

class HeadersCollection extends Collection
{
    /**
     * Initiate HeadersCollection constructor method and
     * flip array with parameters 
     * @param array $parametersCollection
     * @return void 
     */ 
    public function __construct(array $parametersCollection)
    {
        $parameters = array_combine(
            $parametersCollection, $parametersCollection
        );

        parent::__construct($parameters);
    }

    /**
     * Set new HTTP header in headers list 
     * @param string $headerName    | Content-type
     * @param string $headerValue   | plain/text
     * @return bool
     */ 
    public function attachHeaderCollection(string $headerName, string $headerValue)
    {
        $headerName = "{$headerName}: $headerValue";
        header($headerName);

        $this->collectionList->addCollectionUnit(
            new CollectionUnit($headerName, $headerValue)
        );

        return true;
    }

    /**
     * Remove HTTP header from headers list 
     * @param string $headerName | Content-type: plain/text
     * @return bool 
     */ 
    public function detachHeaderCollection(string $headerName)
    {
        header_remove($headerName);
        $this->collectionList->removeCollectionUnit($headerName);

        return true;
    }
}
