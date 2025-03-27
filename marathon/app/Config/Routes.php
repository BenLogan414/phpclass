<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/play/(:any)', 'Home::play/$1');
$routes->get('/admin', 'Admin::index');