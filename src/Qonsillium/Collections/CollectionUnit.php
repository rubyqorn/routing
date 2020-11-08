<?php 

namespace Qonsillium\Collections;

class CollectionUnit
{
    /**
     * Key which will be associated
     * with created unit
     * @var string
     */ 
    protected string $unitKey;

    /**
     * Unit parameters from array
     * @var mixed
     */
    protected $unitParameter;

    /**
     * Initiate CollectionUnit constructor method
     * @param string $unitKey
     * @param mixed $unitParameter
     * @return void 
     */ 
    public function __construct(string $unitKey, $unitParameter)
    {
        $this->unitKey = $unitKey;
        $this->unitParameter = $unitParameter;
    }

    /**
     * Return name of created unit
     * @return string  
     */ 
    public function getUnitKey()
    {
        return $this->unitKey;
    }

    /**
     * Return parameters from created 
     * unit
     * @return mixed  
     */ 
    public function getUnitParameter()
    {
        return $this->unitParameter;
    }
}
