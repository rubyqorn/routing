<?php 

namespace Qonsillium\Collections;

class ServerCollection extends Collection
{
    /**
     * Return collection list with server attributes
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}
