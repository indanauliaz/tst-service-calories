<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Halaman depan diarahkan ke fungsi index()
$routes->get('/', 'CaloriesController::index');

// Endpoint hitung kalori diarahkan ke fungsi create()
$routes->post('calculate', 'CaloriesController::create');