<?php 

namespace Qonsillium\Collections;

class HeadersCollection extends Collection
{
    /**
     * Return collection list with HTTP headers
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}
