<?php 

namespace Qonsillium;

abstract class ServiceContainer
{
    /**
     * Registered and available service handlers
     * @var array 
     */ 
    protected array $services = [
        'route' => Route::class,
        'request' => Request::class,
        'response' => Response::class,
        'route_matcher' => RouteMatcher::class,
        'route_collector' => RouteCollector::class,
    ];
}
