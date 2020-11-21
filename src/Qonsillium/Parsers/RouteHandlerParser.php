<?php 

namespace Qonsillium\Parsers;

class RouteHandlerParser extends Parser
{
    /**
     * Parse controller and action name
     * by specific pattern value
     * @param string $subject 
     * @return array 
     */ 
    public function parse($subject): array
    {
        $subject = explode($this->pattern, $subject);

        return [
            'controller' => $subject['0'],
            'action' => $subject['1']
        ];
    }
}
