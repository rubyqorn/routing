<?php 

namespace Qonsillium\Collections;

class FilesCollection extends Collection
{
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
