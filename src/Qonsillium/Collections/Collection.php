<?php 

namespace Qonsillium\Collections;

abstract class Collection
{
    /**
     * Associative or not array
     * with parameters
     * @var array  
     */ 
    protected array $collection;

    /**
     * List with collections which contains
     * parameters 
     * @var \Qonsillium\Collections\CollectionUnitList
     */ 
    protected ?CollectionUnitList $collectionList;

    /**
     * Initiate Collection constructor method
     * and retrive data passed and pack in 
     * collection list
     * @param array $parametersCollection
     * @return void 
     */ 
    public function __construct(array $parametersCollection)
    {
        $this->collection = $parametersCollection;
        $this->retrieveData();
    }

        /**
     * Retrive data from passed array in pack
     * in units which brings in collection list
     * @return void
     */ 
    protected function retrieveData()
    {
        $this->collectionList = new CollectionUnitList();

        foreach($this->collection as $unitKey => $unitParameter) {
            $this->collectionList->addCollectionUnit(
                new CollectionUnit($unitKey, $unitParameter)
            );
        }
    }

    /**
     * Return list of created collections
     * @return \Qonsillium\Collections\CollectionUnitList 
     */ 
    abstract public function getCollection(): CollectionUnitList;
}
