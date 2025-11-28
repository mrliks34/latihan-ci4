<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- ROUTE PUBLIK (Bisa diakses siapa saja) ---
$routes->get('/', 'Auth::login');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// Berita (Publik)
$routes->get('/news', 'News::index');
$routes->get('/news/(:segment)', 'News::viewNews/$1');

// Pegawai (Publik - Hanya tampil data)
$routes->get('pegawai', 'Pegawai::index');

// --- ROUTE AUTH (Login/Register) ---
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::auth');
$routes->get('register', 'Auth::register');
$routes->post('register/save', 'Auth::save');
$routes->get('logout', 'Auth::logout');


// --- ROUTE ADMIN (Harus Login & Role Admin) ---
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // 1. Kelola Berita
    $routes->get('news', 'NewsAdmin::index');
    $routes->get('news/create', 'NewsAdmin::create');
    $routes->post('news/create', 'NewsAdmin::create');
    $routes->get('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->post('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');

    // 2. Kelola User
    $routes->get('users', 'UserAdmin::index');
    $routes->get('users/(:num)/delete', 'UserAdmin::delete/$1');

    // 3. Kelola Pegawai (Tugas Baru)
    $routes->get('pegawai', 'Pegawai::adminList');
    $routes->get('pegawai/create', 'Pegawai::create');
    $routes->post('pegawai/store', 'Pegawai::store');
    $routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
    $routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
    $routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1');
});
