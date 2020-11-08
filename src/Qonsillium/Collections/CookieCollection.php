<?php 

namespace Qonsillium\Collections;

class CookieCollection extends Collection
{
    /**
     * Return collection list with existence cookies
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}
