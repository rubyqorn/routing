<?php 

namespace Qonsillium\Collections;

class CollectionUnitList
{
    /**
     * Collection of CollectionUnit classes
     * @var array 
     */ 
    protected array $units;

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
     * Return unit collection associated with passed
     * unit key 
     * @param string $unitKey
     * @return \Qonsillium\Collections\CollectionUnit
     */ 
    public function getUnitByKey(string $unitKey): CollectionUnit
    {
        return $this->units[$unitKey];
    }
}
