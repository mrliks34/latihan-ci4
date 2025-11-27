<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/news', 'News::index');
$routes->get('/news/(:segment)', 'News::viewNews/$1');

// Route untuk auth
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::auth');
$routes->get('register', 'Auth::register');
$routes->post('register/save', 'Auth::save');
$routes->get('logout', 'Auth::logout');


$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('news', 'NewsAdmin::index');
    $routes->get('news/create', 'NewsAdmin::create');
    $routes->post('news/create', 'NewsAdmin::create');
    $routes->get('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->post('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->get('users', 'UserAdmin::index');
    $routes->get('users/(:num)/delete', 'UserAdmin::delete/$1');
});
