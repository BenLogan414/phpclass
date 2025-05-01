<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Homepage
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->post('/create', 'Home::create');

// Member Area
$routes->get('/admin', 'Admin::index');
$routes->get('/marathon', 'Admin::manage_marathon');
$routes->get('/add', 'Admin::add_marathon');
$routes->get('/runners', 'Admin::manage_runners');
$routes->get('/registration', 'Admin::registration_form');

// Add new race
$routes->post('/add_race', 'Admin::add_race');

// Delete a race
$routes->get('/delete_race/(:any)', 'Admin::delete_race/$1');

// Update a race
$routes->get('/update_race/(:any)', 'Admin::update_race/$1');
$routes->post('/edit_race', 'Admin::edit_race');

// Public API
$routes->get('/api/get_races/(:any)', 'Api::get_races/$1');
$routes->get('/api/get_runners/(:any)/(:any)', 'Api::get_runners/$1/$2');

$routes->post('/api/runner', 'Api::add_runner');
//$routes->put('/api/runner', 'Api::update_runner');
$routes->delete('/api/runner', 'Api::delete_runner');