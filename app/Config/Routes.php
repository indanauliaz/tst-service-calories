<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/setup', 'Home::setup');
$routes->post('calculate', 'CaloriesController::calculate', ['filter' => 'auth']);