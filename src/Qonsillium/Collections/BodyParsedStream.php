<?php 

namespace Qonsillium\Collections;

class BodyParsedStream extends Body
{
    /**
     * List of body parameters
     * @var array 
     */ 
    private array $list = [];

    /**
     * Return HTTP body stream in array
     * format 
     * @return array 
     */ 
    public function getContent()
    {
        $withoutAmpersands = explode('&', $this->bodyContent);
        
        foreach($withoutAmpersands as $content) {
            $withoutEquals = explode('=', $content);
            $this->list[$withoutEquals['0']] = $withoutEquals['1'];
        }

        return $this->list;
    }
}
