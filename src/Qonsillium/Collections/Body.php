<?php 

namespace Qonsillium\Collections;

abstract class Body
{
    /**
     * Stream content
     * @var string 
     */ 
    protected string $bodyContent;

    /**
     * Initiate Body constructor method and get 
     * body stream using file_get_contents function
     * @return void 
     */ 
    public function __construct()
    {
        $this->bodyContent = file_get_contents('php://input');
    }

    /**
     * Return body stream data in string 
     * or array fromat 
     */ 
    abstract public function getContent();
}
