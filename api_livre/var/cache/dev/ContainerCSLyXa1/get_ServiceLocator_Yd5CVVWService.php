<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.yd5CVVW' shared service.

return $this->privates['.service_locator.yd5CVVW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'App\\Controller\\ApiGenreController::list' => ['privates', '.service_locator.qaoVO5q', 'get_ServiceLocator_QaoVO5qService.php', true],
    'App\\Controller\\ApiGenreController::show' => ['privates', '.service_locator.Fg1zQj6', 'get_ServiceLocator_Fg1zQj6Service.php', true],
    'App\\Controller\\ApiGenreController:list' => ['privates', '.service_locator.qaoVO5q', 'get_ServiceLocator_QaoVO5qService.php', true],
    'App\\Controller\\ApiGenreController:show' => ['privates', '.service_locator.Fg1zQj6', 'get_ServiceLocator_Fg1zQj6Service.php', true],
], [
    'App\\Controller\\ApiGenreController::list' => '?',
    'App\\Controller\\ApiGenreController::show' => '?',
    'App\\Controller\\ApiGenreController:list' => '?',
    'App\\Controller\\ApiGenreController:show' => '?',
]);
