<?php 

namespace Qonsillium\Collections;

class ParametersCollection extends Collection
{
    /**
     * Return collection list with GET or POST parameters
     * @return \Qonsillium\Collections\CollectionUnitList
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}
