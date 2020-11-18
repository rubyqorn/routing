<?php 

namespace Qonsillium;

class RouteMatcher
{
    public function matchMethod(string $specifiedMethod, string $requestMethod): bool
    {
        if ($specifiedMethod == $requestMethod) {
            return true;
        }

        return false;
    }

    public function matchPath(string $specifiedPath, string $requestPath): bool
    {
        if ($specifiedPath == $requestPath) {
            return true;
        }

        return false;
    }
}
