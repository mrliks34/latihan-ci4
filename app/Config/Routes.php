<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- ROUTE PUBLIK 
$routes->get('/', 'News::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

$routes->get('/activities', 'Page::activities'); // Akses: domain.com/activities
$routes->get('/education', 'Page::education');   // Akses: domain.com/education
$routes->get('/biodata', 'Page::biodata');

// Berita (Publik)
$routes->get('/news', 'News::index');
$routes->get('/news/(:segment)', 'News::viewNews/$1');

// Pegawai (Publik - Hanya tampil data)
$routes->get('pegawai', 'Page::pegawai');

// --- ROUTE AUTH (Login/Register) ---
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::auth');
$routes->get('register', 'Auth::register');
$routes->post('register/save', 'Auth::save');
$routes->get('logout', 'Auth::logout');

// Taruh di bagian User Logged In
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'Profile::index');
    $routes->post('profile/update', 'Profile::update');
});


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
    $routes->get('users/create', 'UserAdmin::create');
    $routes->post('users/store', 'UserAdmin::store');

    $routes->get('users/(:num)/edit', 'UserAdmin::edit/$1');
    $routes->post('users/(:num)/update', 'UserAdmin::update/$1');

    $routes->get('users/(:num)/delete', 'UserAdmin::delete/$1');

    // 3. Kelola Pegawai (Tugas Baru)
    $routes->get('pegawai', 'Pegawai::adminList');
    $routes->get('pegawai/create', 'Pegawai::create');
    $routes->post('pegawai/store', 'Pegawai::store');
    $routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
    $routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
    $routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1');

    // A. Aktivitas
    $routes->get('activities', 'Activities::index');
    $routes->get('activities/create', 'Activities::create');
    $routes->post('activities/store', 'Activities::store');
    $routes->get('activities/edit/(:num)', 'Activities::edit/$1');
    $routes->post('activities/update/(:num)', 'Activities::update/$1');
    $routes->get('activities/delete/(:num)', 'Activities::delete/$1');

    // B. Pendidikan (Kalau sudah buat controller)
    $routes->get('education', 'Education::index');
    $routes->get('education/create', 'Education::create');
    $routes->post('education/store', 'Education::store');
    $routes->get('education/delete/(:num)', 'Education::delete/$1');

    // C. Biodata (Kalau sudah buat controller)
    $routes->get('biodata', 'Biodata::index');
    $routes->get('biodata/create', 'Biodata::create');
    $routes->post('biodata/store', 'Biodata::store');
    $routes->get('biodata/delete/(:num)', 'Biodata::delete/$1');
});
