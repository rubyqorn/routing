<?php 

namespace Qonsillium;

abstract class Router
{
    abstract public function setRoute($route);

    abstract public function getRoute();
}
