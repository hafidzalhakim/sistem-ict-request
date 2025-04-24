<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Halaman Login
$routes->get( 'login', 'LoginController::login');

//Halaman Logout
$routes->get( 'logout',  'LoginController::logout');
