<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes);

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('student/details/(:num)', 'Student::details/$1'); // if needed
