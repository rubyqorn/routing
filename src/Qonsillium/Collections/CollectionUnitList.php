<?php 

namespace Qonsillium\Collections;

class CollectionUnitList
{
    /**
     * Collection of CollectionUnit classes
     * @var array 
     */ 
    protected array $units = [];

    /**
     * Add new unit in collection 
     * @param \Qonsillium\Collections\CollectionUnit
     * @return void 
     */ 
    public function addCollectionUnit(CollectionUnit $unit)
    {
        $this->units[$unit->getUnitKey()] = $unit;
    }

    /**
     * Delete collection unit by name from list
     * of collections
     * @param string $collectionUnitName
     * @throws \Exception
     * @return void 
     */ 
    public function removeCollectionUnit(string $collectionUnitName)
    {   
        if (!isset($this->units[$collectionUnitName])) {
            throw new \Exception("Collection with {$collectionUnitName} name doesn't exists");
        }

        unset($this->units[$collectionUnitName]);
    }

    /**
     * Return unit collection associated with passed
     * unit key 
     * @param string $unitKey
     * @return \Qonsillium\Collections\CollectionUnit
     */ 
    public function getUnitByKey(string $unitKey): CollectionUnit
    {
        return $this->units[$unitKey];
    }

    /**
     * Return array with created collection
     * units
     * @return array 
     */ 
    public function getUnitsList(): array
    {
        return $this->units;
    }
}
