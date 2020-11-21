<?php 

namespace Qonsillium\Parsers;

abstract class Parser
{
    protected string $pattern;

    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    abstract public function parse($subject): array;
}
