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

// Delete a reace
$routes->get('/delete_race/(:any)', 'Admin::delete_race/$1');

// Update a race
$routes->get('/update_race/(:any)', 'Admin::update_race/$1');
$routes->post('/edit_race', 'Admin::edit_race');
