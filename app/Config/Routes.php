<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes);

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('student/details/(:num)', 'Student::details/$1'); // if needed

// Routes for student management
$routes->get('student/add', 'Student::add');
$routes->post('student/store', 'Student::store');

// New route for deleting a student
$routes->get('student/delete/(:num)', 'Student::delete/$1');

// Route for displaying the student list (assuming you have a Student::index() method)
$routes->get('student', 'Student::index');