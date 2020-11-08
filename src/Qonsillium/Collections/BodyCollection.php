<?php 

namespace Qonsillium\Collections;

class BodyCollection extends Collection
{
    /**
     * Get HTTP body collections
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}

