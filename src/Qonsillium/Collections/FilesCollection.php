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

    /**
     * Create new collection with file name and
     * its size
     * @param string $filename
     * @return bool
     */ 
    public function attachFileCollection(string $filename)
    {
        $this->collectionList->addCollectionUnit(
            new CollectionUnit($filename, [
                'size' => filesize($filename)
            ])
        );

        return true;
    }

    /**
     * Remove file name with size from collection list
     * @param string $filename
     * @return bool 
     */ 
    public function detachFileCollection(string $filename)
    {
        $this->collectionList->removeCollectionUnit($filename);
        return true;
    }
}
