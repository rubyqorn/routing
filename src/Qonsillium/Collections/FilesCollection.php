<?php 

namespace Qonsillium\Collections;

class FilesCollection extends Collection
{
    /**
     * Return list of collection with files
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    public function getCollection(): CollectionUnitList
    {
        return $this->collectionList;
    }
}
