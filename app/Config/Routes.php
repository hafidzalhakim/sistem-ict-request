<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('ict-request', function () {
    return view('user/request');
});
$routes->get('login', function () {
    return view('admin/login');
});
$routes->get('ict-request-admin', function () {
    return view('admin/requestadmin');
});
$routes->get('ict-request-admin', function () {
    return view('admin/requestadmintech');
});


