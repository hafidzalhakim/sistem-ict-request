<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// halaman login
$routes->get('login', 'LoginController::login');
// log out
$routes->get('logout', 'LoginController::logout');
// validasi masuk
$routes->post('auth', 'LoginController::validasimasuk');

$routes->get('manager', 'Manager1::tampildata');