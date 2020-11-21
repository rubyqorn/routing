<?php 

namespace Qonsillium;

class RouteMatcher
{
    /**
     * Match specified route HTTP method with 
     * request HTTP method. Can be POST, GET, DELETE,
     * PATCH, HEAD
     * @param string $specifiedMethod
     * @param string $requestMethod
     * @return bool
     */ 
    public function matchMethod(string $specifiedMethod, string $requestMethod): bool
    {
        if ($specifiedMethod == $requestMethod) {
            return true;
        }

        return false;
    }

    /**
     * Match specified route path with path 
     * from request string
     * @param string $specifiedPath
     * @param string $requestPath
     * @return bool 
     */ 
    public function matchPath(string $specifiedPath, string $requestPath): bool
    {
        if (preg_match("#$specifiedPath#", $requestPath)) {
            return true;
        }

        return false;
    }
}
