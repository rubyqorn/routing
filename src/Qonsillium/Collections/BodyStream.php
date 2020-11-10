<?php

namespace Qonsillium\Collections;

class BodyStream extends Body
{
    /**
     * Return data from HTTP body stream
     * @return string 
     */ 
    public function getContent()
    {
        return $this->bodyContent;
    }
}
